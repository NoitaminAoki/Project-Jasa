<?php

namespace App\Http\Controllers\Member;

use Auth;
use App\Models\Klien;
use App\Models\Penghasilan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KlienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['klien'] = Klien::where('idMember', Auth::guard('member')->user()->id)->orderBy('created_at', 'DESC')->get();
        $data['pendapatan'] = 0;
        $data['point'] = 0;
        $data['potensi_pendapatan'] = 0;
        foreach ($data['klien'] as $value) {
            $getFee = Penghasilan::where('idHarga', $value->idHarga)->select(['point', 'fee'])->first();
            if ($value->status == "pending" || $value->status == "negosiasi") {
                $data['potensi_pendapatan'] += $getFee['fee'];
            }
            elseif ($value->status == "deal") {
                $data['pendapatan'] += $getFee['fee'];
                $data['point'] += $getFee['point'];
            }
        }
        $totalFee = $data['pendapatan'] + $data['potensi_pendapatan'];
        $data['percentage'] = [
            'pendapatan' => ($totalFee > 0)?($data['pendapatan']/$totalFee*100) : 0,
            'potensi_pendapatan' => ($totalFee > 0)?($data['potensi_pendapatan']/$totalFee*100) : 0
        ];
        return view('member.klien.klien_index')->with($data);
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
