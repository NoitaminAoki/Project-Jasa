<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Contracts\Queue\ShouldQueue;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Support;
use App\Mail\MailBantuan;
use Illuminate\Support\Facades\Mail;

class BantuanController extends Controller implements ShouldQueue
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supports = Support::where('status_terbalas', 'belum')->paginate(10);
        return view('admin.bantuan.bantuan_index', ['support' => $supports]);
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
      $toEmail = $request->pengirim;
      $data = array("balasan" => $request->balasan, "subject" => $request->subject);

      // Mail::to('admin.bantuan.template_mail', $data, function($message) use ($toEmail) {
      //     $message->to($toEmail)->subject("Balasan Dari Customer Service E-Bina")->queue;
      //     $message->from('support@e-bina.co.id', 'Artisans Web');
      // });
      Mail::to($request->pengirim)->queue(new MailBantuan);
      $ubah = Support::findOrFail($request->id);
      $ubah->status_terbalas = 'sudah';
      if ($request->tampilkan) {
        $ubah->tampilkan = $request->tampilkan;
      }
      $ubah->save();
      return redirect()->back()->with('berhasil', 'Berhasil Balas Ke Email' . $toEmail);
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
    public function destroy($id)
    {
        //
    }
}
