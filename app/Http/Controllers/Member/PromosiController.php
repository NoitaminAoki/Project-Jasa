<?php

namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Promosi;
use Carbon\Carbon;

class PromosiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $promos = Promosi::paginate(12);
        return view('member.promosi.promosi_index', ['promos' => $promos]);
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
        return view('member.promosi.show_promo', ['promo' => $promo]);
    }

}
