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
        $tambahHarga = new Harga;
        $tambahHarga->harga = $request->harga;
        $tambahHarga->tingkat = $request->tingkat;
        $tambahHarga->save();

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
      $ubahHarga = Harga::findOrFail($id);
      $ubahHarga->harga = $request->harga;
      $ubahHarga->tingkat = $request->tingkat;
      $ubahHarga->save();
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
      $deleteHarga = Harga::findOrFail($id);
      $deleteHarga->delete();
      return redirect()->back();
    }
}
