<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Support;
use App\Models\Member;
use App\Models\Klien;
use App\Models\Partner;
use App\Models\Promosi;
use App\Models\Peraturan;
use App\Models\Harga;
use DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $support = Support::all();
        $data['startDate'] = Date('d/m/Y', strtotime('-6 days'));
        $data['endDate'] = Date('d/m/Y');
        $data['memberActive'] = Member::where('status', 'active')->count();
        $data['memberUnactive'] = Member::where('status', 'unactive')->count();
        $data['popularMember'] = Klien::select(DB::raw('members.id, members.profile_picture, members.name, members.noTelp, sum(penghasilans.fee) as pendapatan'))
        ->where("kliens.status", 'deal')
        ->leftJoin('penghasilans', 'kliens.idHarga', '=', 'penghasilans.idHarga')
        ->leftJoin('members', 'kliens.idMember', '=', 'members.id')
        ->where('kliens.idMember', '<>', null)
        ->groupBy('members.id', 'members.profile_picture', 'members.name', 'members.noTelp')
        ->orderBy('pendapatan', 'desc')
        ->take(5)
        ->get();
        $data['pendapatan'] = Klien::where("kliens.status", 'deal')
        ->leftJoin('penghasilans', 'kliens.idHarga', '=', 'penghasilans.idHarga')
        ->sum("penghasilans.fee");
        $data['potensi_pendapatan'] = Klien::where("kliens.status", 'pending')
        ->orWhere("kliens.status", 'negosiasi')
        ->leftJoin('penghasilans', 'kliens.idHarga', '=', 'penghasilans.idHarga')
        ->sum("penghasilans.fee");
        $data['totalPendapatan'] = $data['pendapatan'] + $data['potensi_pendapatan'];
        $data['percentage'] = [
            'pendapatan' => ($data['totalPendapatan'] > 0)?($data['pendapatan']/$data['totalPendapatan']*100): 0,
            'potensi_pendapatan' => ($data['totalPendapatan'] > 0)?($data['potensi_pendapatan']/$data['totalPendapatan']*100) : 0
        ];
        $data['deal_klien'] = Klien::where("kliens.status", 'deal')->count();
        $data['negosiasi_klien'] = Klien::where("kliens.status", 'negosiasi')->count();
        $data['pending_klien'] = Klien::where("kliens.status", 'pending')->count();
        $data['all_klien'] = $data['deal_klien'] + $data['negosiasi_klien'] + $data['pending_klien'];
        $data['chartPending'] = [];
        $data['chartNegosiasi'] = [];
        $data['chartDeal'] = [];
        $data['xAxis'] = [];
        $data['pendapatanChart'] = 0;
        $data['pendapatanChartPending'] = 0;
        $data['pendapatanChartNegosiasi'] = 0;
        $data['pendapatanChartDeal'] = 0;
        $intRow = 0;
        for ($i=6; $i >= 0; $i--) {
            $data['xAxis'][($intRow)] =  Date('M d', strtotime('-'.$i.' days'));
            $data['chartPending'][($intRow)] = Klien::where('kliens.status', 'pending')
            ->whereDate('kliens.created_at', Date('Y-m-d', strtotime('-'.$i.' days')))
            ->leftJoin('penghasilans', 'kliens.idHarga', '=', 'penghasilans.idHarga')
            ->sum('penghasilans.fee');
            $data['pendapatanChartPending'] += $data['chartPending'][($intRow)];
            $data['chartNegosiasi'][($intRow)] = Klien::where('kliens.status', 'negosiasi')
            ->whereDate('kliens.created_at', Date('Y-m-d', strtotime('-'.$i.' days')))
            ->leftJoin('penghasilans', 'kliens.idHarga', '=', 'penghasilans.idHarga')
            ->sum('penghasilans.fee');
            $data['pendapatanChartNegosiasi'] += $data['chartNegosiasi'][($intRow)];
            $data['chartDeal'][($intRow)] = Klien::where('kliens.status', 'deal')
            ->whereDate('kliens.created_at', Date('Y-m-d', strtotime('-'.$i.' days')))
            ->leftJoin('penghasilans', 'kliens.idHarga', '=', 'penghasilans.idHarga')
            ->sum('penghasilans.fee');
            $data['pendapatanChartDeal'] += $data['chartDeal'][($intRow)];
            $data['pendapatanChart'] += $data['chartPending'][($intRow)] + $data['chartNegosiasi'][($intRow)] + $data['chartDeal'][($intRow)];
            $intRow += 1;
        }
        // dd($data);
        return view('admin.admin_dashboard')->with($data);
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
