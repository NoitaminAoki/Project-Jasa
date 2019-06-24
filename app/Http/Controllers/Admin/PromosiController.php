<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Promosi;
use Illuminate\Support\Str;
use Auth;
use App\Models\Member;
use Carbon\Carbon;
use DateTime;
use Storage;

class PromosiController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
      $promos = Promosi::where('endDate', '>=', Carbon::now())->paginate(10);
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
    $gambarName = $uploadGambar->getClientOriginalName();
    $request->file('gambar')->move('assets/img', $gambarName);

    $tambahPromo = new Promosi;
    $tambahPromo->slug = Str::slug($request->title);
    $tambahPromo->title = $request->title;
    $tambahPromo->gambar = $gambarName;
    $tambahPromo->isi = $request->isi;
    $tambahPromo->kode = url()->current() . '/' . Str::slug(strtolower($request->title)) . '/' . Str::slug(strtolower(Auth::user()->name));
    $tambahPromo->startDate = new DateTime($request->startDate);
    $tambahPromo->endDate = new DateTime($request->endDate);
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
    $updatePromosi->slug = Str::slug($request->title);
    $updatePromosi->title = $request->title;
    $updatePromosi->isi = $request->isi;
    if ($request->hasFile('gambar') && $request->file('gambar')->isValid()) {
      $this->validate($request, ['gambar' => 'file|max:2000']);
      $uploadGambar = $request->file('gambar');
      $gambarName = $uploadGambar->getClientOriginalName();
      $request->file('gambar')->move('assets/img', $gambarName);
      $updatePromosi->gambar = $gambarName;
    }
    $updatePromosi->startDate = new DateTime($request->startDate);
    $updatePromosi->endDate = new DateTime($request->endDate);
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
