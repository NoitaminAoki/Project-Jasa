<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Promosi;
use Illuminate\Support\Str;
use Auth;
use App\Models\Member;

class PromosiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $promos = Promosi::paginate(10);
        return view('admin.promosi.promosi_index', ['promos' => $promos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.promosi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request, [
        'gambar' => 'required|file|max:2000'
      ]);
      $uploadGambar = $request->file('gambar');
      $gambar = $uploadGambar->store('public/files');

      $tambahPromo = new Promosi;
      $tambahPromo->slug = Str::slug($request->title);
      $tambahPromo->title = $request->title;
      $tambahPromo->gambar = $gambar;
      $tambahPromo->isi = $request->isi;
      $tambahPromo->kode = url()->current() . '/' . Str::slug(strtolower($request->title)) . '/' . Str::slug(strtolower(Auth::user()->name));
      $tambahPromo->startDate = $request->startDate;
      $tambahPromo->endDate = $request->endDate;
      $tambahPromo->save();

      return redirect()->route('admin.promosi.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $promo = Promosi::where('slug', $slug)->firstOrFail();
        return view('admin.promosi.show_promo', ['promo' => $promo]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $updatePromosi = Promosi::findOrFail($id);
      return view('admin.promosi.edit', ['updatePromosi' => $updatePromosi]);
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
      $updatePromosi = Promosi::findOrFail($id);
      $updatePromosi->title = $request->title;
      $updatePromosi->isi = $request->isi;

      $this->validate($request, ['gambar' => 'required|file|max:2000']);
      $uploadLogo = $request->file('gambar');
      $updateGambar = $uploadLogo->store('public/files');

      $updatePromosi->gambar = $updateGambar;
      $updatePromosi->startDate = $request->startDate;
      $updatePromosi->endDate = $request->endDate;

      $updatePromosi->save();
      return redirect()->route('admin.promosi.index')->with('success_message', 'Berhasil Mengubah Promosi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $hapusPromo = Promosi::findOrFail($id);
      $hapusPromo->delete();
      return redirect()->route('admin.promosi.index')->with('success_message', 'Berhasil Hapus Promosi');
    }
}
