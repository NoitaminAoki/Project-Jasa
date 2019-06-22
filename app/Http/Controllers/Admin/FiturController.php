<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Fitur;

class FiturController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.fitur_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $tambahFitur = new Fitur;

      $tambahFitur->fitur = $request->fitur;
      $tambahFitur->harga_id = $request->kategori;
      $tambahFitur->ada = $request->ada;
      if ($request->menu == 'besar') {
        $tambahFitur->menu = $request->menu;
      }
      else {
        $tambahFitur->menu = $request->menu;
      }
      if ($request->tampilkan == 'iya') {
        $tambahFitur->tampilkan = $request->tampilkan;
      }
      else {
        $tambahFitur->tampilkan = 'tidak';
      }

      $tambahFitur->save();
      return redirect()->route('admin.landing-page.index')->with('success_message', 'Berhasil Menambah Fitur');
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
      $updateFitur = Fitur::findOrFail($id);

      $updateFitur->fitur = $request->fitur;
      $updateFitur->harga_id = $request->harga_id;
      $updateFitur->menu = $request->menu;
      $updateFitur->ada = $request->ada;
      if ($request->has('ubahTampilkan')) {
        $updateFitur->tampilkan = $request->ubahTampilkan;
      }
      else {
        $updateFitur->tampilkan = 'tidak';
      }
      $updateFitur->save();
      return redirect()->back()->with('success_message', 'Berhasil Mengubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $hapusFitur = Fitur::findOrFail($id);
      $hapusFitur->truncate();
      return redirect()->back()->with("success_message", "Berhasil Menghapus Uraian Pekerjaan");
    }
}
