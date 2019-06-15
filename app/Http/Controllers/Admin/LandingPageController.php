<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Harga;

class LandingPageController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $price = Harga::limit(3)->oldest()->get();
    return view('admin.landingPage.landing_page_index', ['price' => $price]);
  }
  
  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    $price = Harga::all();
    if (count($price) < 3) {
      return view('admin.landingPage.create_harga');
    }
    else {
      return redirect()->route('admin.landing-page.index');
    }
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
      'tingkat' => 'required|unique:harga'
    ]);
    $tambah_harga = new Harga;
    $tambah_harga->harga = $request->harga;
    $tambah_harga->tingkat = $request->tingkat;
    $tambah_harga->save();
    
    return redirect()->route('admin.landing-page.index');
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
    $price = Harga::findOrFail($id);
    return view('admin.landingPage.edit_harga', ['price' => $price]);
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
      'tingkat' => 'required|unique:harga,tingkat,'.$id
    ]);
    $ubah_harga = Harga::findOrFail($id);
    $ubah_harga->harga = $request->harga;
    $ubah_harga->tingkat = $request->tingkat;
    $ubah_harga->save();
    return redirect()->route('admin.landing-page.index');
  }
  
  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function destroy($id)
  {
    $delete_harga = Harga::findOrFail($id);
    $delete_harga->delete();
    return redirect()->back();
  }
}
