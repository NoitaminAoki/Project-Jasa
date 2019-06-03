<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Peraturan;
use App\Models\Harga;
use App\Models\Partner;

class HomeController extends Controller
{
    public function landing()
    {
        $price = Harga::all();
        $partners = Partner::all();
        return view('landing', compact('price', 'partners'));
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
        $peraturan = Peraturan::all();
        return view('peraturan', ['peraturan' => $peraturan]);
    }
    public function profil()
    {
        return view('profil');
    }
}
