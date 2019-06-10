<?php

namespace App\Http\Controllers\Member;

use Auth;
use Session;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
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
        return view('member.profil.profil_index');
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
        $memberId =  Auth::guard('member')->user()->id;
        $request->validate([
            'name' => 'required|string|max:199|unique:members,name,'.$memberId,
            'noTelp' => 'required|string|max:25',
            'email' => 'required|string|email|max:255|unique:members,email,'.$memberId
        ]);

        $generateCode = 'id-'.Str::studly($request->name);

        Member::where('id', $memberId)->update([
            'code' => $generateCode,
            'name' => $request->name,
            'noTelp' => $request->noTelp,
            'email' => $request->email
        ]);
        $request->session()->flash('success_message', 'Success Changed Profil');
        return redirect()->route('member.profil.index');
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
        //
    }

    public function changePassword(Request $request)
    {
        $request->validate(['password' => 'required|string|min:6|confirmed']);
        Member::where('id', Auth::guard('member')->user()->id)->update(['password' => Hash::make($request->password)]);
        $request->session()->flash('success_message', 'Success Changed Password');
        return redirect()->route('member.profil.index');
    }

    public function UpdateProfile(Request $request)
    {
      $this->validate($request, ['profile_picture' => 'required|file|max:2000']);
      $uploadLogo = $request->file('profile_picture');
      $path = $uploadLogo->store('public/files');

      $profile_picture = Member::findOrFail(Auth::guard('member')->user()->id);
      $profile_picture->profile_picture = $path;
      $profile_picture->save();
      $request->session()->flash('success_message', 'Profile Picture Updated');
      return redirect()->back();
    }
}
