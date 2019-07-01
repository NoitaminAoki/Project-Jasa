<?php

namespace App\Http\Controllers\Admin;

use Storage;
use Auth;
use App\User;
use App\Models\Klien;
use App\Models\Member;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jumlah_member = Member::count();
        $jumlah_klien = Klien::count();
        return view('admin.profil.profil_index', ['jumlah_member' => $jumlah_member, 'jumlah_klien' => $jumlah_klien]);
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $adminId =  Auth::guard('web')->user()->id;
        $validation = $request->validate([
            'name' => 'required|string|max:199|unique:users,name,' . $adminId,
            'email' => 'required|string|email|max:255|unique:users,email,' . $adminId
        ]);
        User::where('id', $adminId)->update([
          'name' => $request->name,
          'email' => $request->email
        ]);
        return redirect()->back()->with('success_message', 'Success Changed Profil');
    }

    public function changePassword(Request $request)
    {
        $validation = $request->validate([
          'password' => 'required|string|min:6|confirmed'
        ]);
        User::where('id', Auth::guard('web')->user()->id)->update(['password' => Hash::make($request->password)]);
        return redirect()->route('admin.profil.index')->with('success_message', 'Success Changed Password');
    }

    public function UpdateProfile(Request $request)
    {
      $validation = $request->validate([
        'profile_picture' => 'required|file|max:2000'
      ]);
      $profile_picture = User::findOrFail(Auth::guard('web')->user()->id);
      if ($request->hasFile('profile_picture') && $request->file('profile_picture')->isValid()) {
        $uploadGambar = $request->file('profile_picture');
        $gambarName = $uploadGambar->getClientOriginalName();
        $request->file('profile_picture')->move('assets/img', $gambarName);
        $profile_picture->profile_picture = $gambarName;
      }
      $profile_picture->save();
      $request->session()->flash('success_message', 'Profile Picture Updated');
      return redirect()->back();
    }
}
