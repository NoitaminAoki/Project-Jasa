<?php

namespace App\Http\Controllers\Member;

use DB;
use Auth;
use DateTime;
use App\Models\Klien;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PenghasilanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['pendapatan'] = Klien::where('idMember', Auth::guard('member')->user()->id)
        ->where("kliens.status", 'deal')
        ->leftJoin('penghasilans', 'kliens.idHarga', '=', 'penghasilans.idHarga')
        ->sum("penghasilans.fee");
        $data['potensi_pendapatan'] = Klien::where('idMember', Auth::guard('member')->user()->id)
        ->where("kliens.status", 'pending')
        ->orWhere([
            ['kliens.idMember', '=',  Auth::guard('member')->user()->id],
            ['kliens.status', '=', 'negosiasi']
        ])
        ->leftJoin('penghasilans', 'kliens.idHarga', '=', 'penghasilans.idHarga')
        ->sum("penghasilans.fee");
        $data['totalPendapatan'] = $data['pendapatan'] + $data['potensi_pendapatan'];
        $data['percentage'] = [
            'pendapatan' => ($data['pendapatan']/$data['totalPendapatan']*100),
            'potensi_pendapatan' => ($data['potensi_pendapatan']/$data['totalPendapatan']*100)
        ];
        $data['chartPending'] = [];
        $data['chartNegosiasi'] = [];
        $data['chartDeal'] = [];
        $data['xAxis'] = [];
        $data['pendapatanChart'] = 0;
        $data['pendapatanChartPending'] = 0;
        $data['pendapatanChartNegosiasi'] = 0;
        $data['pendapatanChartDeal'] = 0;
        $intRow = 0;
        
        $getDiffDay = 6;
        if (!empty($request->daterange)) {
            $getDaterange = explode(" - ", $request->daterange);
            $getStartDate = DateTime::createFromFormat("m/d/Y", $getDaterange[0]);
            $getEndDate = DateTime::createFromFormat("m/d/Y", $getDaterange[1]);
            $interval = date_diff($getStartDate, $getEndDate);
            $getDiffDay = $interval->days;
            $data['startDate'] = $getStartDate->format("m/d/Y");
            $data['endDate'] = $getEndDate->format("m/d/Y");
        }
        else {
            $data['startDate'] = Date('m/d/Y', strtotime('-6 days'));
            $data['endDate'] = Date('m/d/Y');
        }
        for ($i=0; $i <= $getDiffDay; $i++) {
            $data['xAxis'][($intRow)] =  date("M d", strtotime("+".$i." day", strtotime($data['startDate'])));
            $data['chartPending'][($intRow)] = Klien::where('idMember', Auth::guard('member')->user()->id)
            ->where('kliens.status', 'pending')
            ->whereDate('kliens.created_at', Date('Y-m-d', strtotime("+".$i." day", strtotime($data['startDate']))))
            ->leftJoin('penghasilans', 'kliens.idHarga', '=', 'penghasilans.idHarga')
            ->sum('penghasilans.fee');
            $data['pendapatanChartPending'] += $data['chartPending'][($intRow)];
            $data['chartNegosiasi'][($intRow)] = Klien::where('idMember', Auth::guard('member')->user()->id)
            ->where('kliens.status', 'negosiasi')
            ->whereDate('kliens.created_at', Date('Y-m-d', strtotime("+".$i." day", strtotime($data['startDate']))))
            ->leftJoin('penghasilans', 'kliens.idHarga', '=', 'penghasilans.idHarga')
            ->sum('penghasilans.fee');
            $data['pendapatanChartNegosiasi'] += $data['chartNegosiasi'][($intRow)];
            $data['chartDeal'][($intRow)] = Klien::where('idMember', Auth::guard('member')->user()->id)
            ->where('kliens.status', 'deal')
            ->whereDate('kliens.created_at', Date('Y-m-d', strtotime("+".$i." day", strtotime($data['startDate']))))
            ->leftJoin('penghasilans', 'kliens.idHarga', '=', 'penghasilans.idHarga')
            ->sum('penghasilans.fee');
            $data['pendapatanChartDeal'] += $data['chartDeal'][($intRow)];
            $data['pendapatanChart'] += $data['chartPending'][($intRow)] + $data['chartNegosiasi'][($intRow)] + $data['chartDeal'][($intRow)];
            $intRow += 1;
        }
        return view('member.penghasilan.penghasilan_index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
