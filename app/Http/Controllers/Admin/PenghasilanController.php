<?php

namespace App\Http\Controllers\Admin;

use App\Models\Harga;
use App\Models\Penghasilan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PenghasilanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['penghasilan'] = Penghasilan::all();
        return view('admin.penghasilan.penghasilan_index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['harga'] = Harga::all();
        return view('admin.penghasilan.penghasilan_create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'idHarga' => 'required|int|unique:penghasilans',
            'point' => 'required|int',
            'fee' => 'required|int'
        ]);

        Penghasilan::create([
            'idHarga' => $request->idHarga,
            'point' => $request->point,
            'fee' => $request->fee
        ]);
        $request->session()->flash('success_message', 'Success Adding Konfigurasi Penghasilan');
        return redirect()->route('admin.penghasilan.index');
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
        $data['harga'] = Harga::all();
        $data['penghasilan'] = Penghasilan::findOrfail($id);
        return view('admin.penghasilan.penghasilan_edit')->with($data);
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
        $request->validate([
            'idHarga' => 'required|int|unique:penghasilans,idHarga,' . $id,
            'point' => 'required|int',
            'fee' => 'required|int'
        ]);

        Penghasilan::where('id', $id)->update([
            'idHarga' => $request->idHarga,
            'point' => $request->point,
            'fee' => $request->fee
        ]);
        $request->session()->flash('success_message', 'Success Updating Konfigurasi Penghasilan');
        return redirect()->route('admin.penghasilan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        Penghasilan::where('id', $id)->delete();
        $request->session()->flash('success_message', 'Success Deleting Konfigurasi Penghasilan');
        return redirect()->route('admin.penghasilan.index');
    }
}
