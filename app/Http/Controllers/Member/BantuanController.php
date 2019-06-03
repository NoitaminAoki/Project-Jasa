<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Support;
use App\Models\Member;
use Auth;

class BantuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $supports = Support::where('email', Auth::user()->email)->paginate(10);
      return view('member.bantuan.bantuan_index', ['supports' => $supports]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('member.bantuan.bantuan_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $support = new Support;
      $support->email = $request->email_pengirim;
      $support->pertanyaan = $request->pertanyaan_pengirim;
      $support->save();

      return redirect()->route('support.thanks');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $support = Support::findOrFail($id);
      $support->delete();
      return redirect()->back();
    }
}
