<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Support;

class SupportController extends Controller
{
    public function kirimsupport(Request $request)
    {
      $support = new Support;

      $support->email = $request->email_pengirim;
      $support->pertanyaan = $request->pertanyaan_pengirim;

      $support->save();
      return redirect()->route('support.thanks');
    }
}
