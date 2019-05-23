<?php

namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __construct() {
        
    }

    public function index()
    {
        return view('member.member_dashboard');
    }
}
