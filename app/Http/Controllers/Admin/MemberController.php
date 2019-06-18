<?php

namespace App\Http\Controllers\Admin;

use App\Models\Member;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['member'] = Member::all();
        $data['jumlah_active_member'] = Member::where('status', 'active')->count();
        $data['jumlah_unactive_member'] = Member::where('status', 'unactive')->count();
        return view('admin.member.member_index')->with($data);
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
      $tambahMember = new Member;

      $tambahMember->code = 'id-'.Str::studly($request->name);
      $tambahMember->name = $request->name;
      $tambahMember->noTelp = $request->noTelp;
      $tambahMember->email = $request->email;

      $this->validate($request, ['profile_picture' => 'required|file|max:2000']);
      $uploadLogo = $request->file('profile_picture');
      $path = $uploadLogo->store('public/files');
      // $tambahMember->profile_picture = $path;

      $tambahMember->password = Hash::make($request->password);

      $tambahMember->save();
      return redirect()->back()->with('success_message', 'Berhasil Menambah Member');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        Member::where('id', $id)->update(['status' => 'unactive']);
        $request->session()->flash('success_message', 'Success ...');
        return redirect()->route('admin.member.index');
    }

    public function activating(Request $request, $id)
    {
        Member::where('id', $id)->update(['status' => 'active']);
        $request->session()->flash('success_message', 'Success ...');
        return redirect()->route('admin.member.index');
    }
}
