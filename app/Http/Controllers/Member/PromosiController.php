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
        $promos = Promosi::where('endDate', '>=', Carbon::now())->paginate(10);
        return view('member.promosi.promosi_index', ['promos' => $promos]);
    }
}
