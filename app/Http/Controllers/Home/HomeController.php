<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function landing()
    {
        return view('landing');
    }
    public function about()
    {
        return view('about');
    }
    public function mitra()
    {
        return view('mitra');
    }
    public function support()
    {
        return view('support');
    }
    public function promosi()
    {
        return view('promosi');
    }
    public function peraturan()
    {
        return view('peraturan');
    }
    public function profil()
    {
        return view('profil');
    }
}
