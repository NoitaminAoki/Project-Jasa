<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Peraturan;

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
        $editAturan = Peraturan::findOrFail($id);
        return view('admin.aturan.aturan_edit', ['editAturan' => $editAturan]);
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
      $updatePeraturan = Peraturan::findOrFail($id);

      $updatePeraturan->judul = $request->judul;
      $updatePeraturan->deskripsi = $request->deskripsi;

      $updatePeraturan->save();
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
      $hapusPeraturan = Peraturan::findOrFail($id);
      $hapusPeraturan->delete();
      return redirect()->back();
    }
}
