<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Peraturan as Peraturan;

class AturanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peraturan = Peraturan::all();
        return view('admin.aturan.aturan_index', ['peraturan' => $peraturan]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.aturan.aturan_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $tambah_aturan = new Peraturan;

      $tambah_aturan->judul = $request->judul;
      $tambah_aturan->deskripsi = $request->deskripsi;

      $tambah_aturan->save();
      return redirect()->route('admin.aturan.index');
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
        $edit_aturan = Peraturan::findOrFail($id);
        return view('admin.aturan.aturan_edit', ['edit_aturan' => $edit_aturan]);
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
      $update_peraturan = Peraturan::findOrFail($id);

      $update_peraturan->judul = $request->judul;
      $update_peraturan->deskripsi = $request->deskripsi;

      $update_peraturan->save();
      return redirect()->route('admin.aturan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $hapus_peraturan = Peraturan::findOrFail($id);
      $hapus_peraturan->delete();
      return redirect()->back();
    }
}
