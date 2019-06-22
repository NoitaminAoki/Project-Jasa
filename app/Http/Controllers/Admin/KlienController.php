<?php

namespace App\Http\Controllers\Admin;

use App\Models\Penghasilan;
use App\Models\Klien;
use App\Models\Harga;
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
        $data['klien'] = Klien::orderBy('created_at', 'DESC')->get();
        $data['price'] = Harga::all();
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
        return view('admin.klien.klien_index')->with($data);
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
     * Return json data from the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editApi($id)
    {
        $data['klien'] = Klien::where('id', $id)->firstOrfail();
        return response()->json($data);
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateApi(Request $request, $id)
    {
        $request->validate([
            'harga' => 'required',
            'status' => 'required'
        ]);

        Klien::where('id', $id)->update([
            'idHarga' => $request->harga,
            'status' => $request->status
        ]);
        $request->session()->flash('success_message', 'Success Changed Klien');
        return redirect()->route('admin.klien.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        Klien::where('id', $id)->delete();
        $request->session()->flash('success_message', 'Success Deleting Klien');
        return redirect()->route('admin.klien.index');
    }
}
