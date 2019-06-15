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
        $data['jumlah_member'] = Member::count();
        $data['jumlah_klien'] = Klien::count();
        return view('admin.profil.profil_index')->with($data);
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
        $adminId =  Auth::guard('web')->user()->id;
        $request->validate([
            'name' => 'required|string|max:199|unique:users,name,' . $adminId,
            'email' => 'required|string|email|max:255|unique:users,email,' . $adminId
        ]);

        User::where('id', $adminId)->update([
          'name' => $request->name,
          'email' => $request->email
        ]);
        $request->session()->flash('success_message', 'Success Changed Profil');
        return redirect()->back();
    }

    public function changePassword(Request $request)
    {
        $request->validate(['password' => 'required|string|min:6|confirmed']);
        User::where('id', Auth::guard('web')->user()->id)->update(['password' => Hash::make($request->password)]);
        $request->session()->flash('success_message', 'Success Changed Password');
        return redirect()->route('admin.profil.index');
    }

    public function UpdateProfile(Request $request)
    {
      $this->validate($request, ['profile_picture' => 'required|file|max:2000']);
      $uploadLogo = $request->file('profile_picture');
      $path = $uploadLogo->store('public/files');

      $profile_picture = User::findOrFail(Auth::guard('web')->user()->id);
      Storage::delete($profile_picture->profile_picture);
      $profile_picture->profile_picture = $path;
      $profile_picture->save();
      $request->session()->flash('success_message', 'Profile Picture Updated');
      return redirect()->back();
    }
}
