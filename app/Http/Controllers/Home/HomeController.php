<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Peraturan;
use App\Models\Partner;
use App\Models\Member;
use App\Models\Harga;
use App\Models\Klien;
use Auth;
use Str;
use Carbon\Carbon;
use App\Models\Support;
use App\Models\Faq;
use App\Models\Promosi;

class HomeController extends Controller
{
    public function landing()
    {
        $price = Harga::limit(3)->oldest()->with('GetFitur')->get();
        $fiturPemula = Harga::limit(3)->with('GetFitur')->where('id', 3)->get();
        $fiturBisnis = Harga::limit(3)->with('GetFitur')->where('id', 1)->get();
        $fiturProfesional = Harga::limit(3)->with('GetFitur')->where('id', 2)->get();
        $partners = Partner::all();
        $support = Support::where('tampilkan', 'iya')->get();
        return view('landing', compact('price', 'partners', 'support', 'fiturPemula', 'fiturProfesional', 'fiturBisnis'));
    }
    public function getPromo($promo, $member)
    {
        $price = Harga::limit(3)->get();
        $fiturPemula = Harga::limit(3)->with('GetFitur')->orderBy('harga', 'asc')->get();
        $fiturBisnis = Harga::limit(3)->with('GetFitur')->orderBy('harga', 'asc')->skip(1)->get();
        $fiturProfesional = Harga::limit(3)->with('GetFitur')->orderBy('harga', 'asc')->latest();
        $partners = Partner::all();
        $getPromo = Promosi::where('slug', $promo)->firstOrFail();
        $getMember = Member::where('name', str_replace('-', ' ', $member))->firstOrFail();
        $support = Support::where('tampilkan', 'iya')->get();
        return view('landing', compact('getMember', 'price', 'partners', 'fiturPemula', 'fiturBisnis', 'fiturProfesional', 'support'));
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
    public function supportStore(Request $request)
    {
        $support = new Support;
        $support->email = $request->email_pengirim;
        $support->subjek = $request->subjek;
        $support->pertanyaan = $request->pertanyaan_pengirim;
        $support->save();

        return redirect()->back()->with('success_message', 'Bantuanmu Telah Terkirim dan akan dibalas maksimal 2x24 jam');
    }
    public function promosi()
    {
        $promos = Promosi::where('endDate', '>=', Carbon::now())->paginate(10);
        return view('promosi', ['promos' => $promos]);
    }
    public function showPromo($slug)
    {
      $promo = Promosi::where('slug', $slug)->firstOrFail();
      return view('show_promosi', ['promo' => $promo]);
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

    public function klienStore(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'harga' => 'required',
            'tempatTinggal' => 'required',
            'email' => 'required',
            'noTelp' => 'required'
            ]);

            $getMember = Member::Where('code', $request->codeMember)->first();

            Klien::create([
                'nama' => $request->nama,
                'idHarga' => $request->harga,
                'idMember' => (!empty($getMember->id))? $getMember->id : null,
                'tempatTinggal' => $request->tempatTinggal,
                'noTelp' => $request->noTelp,
                'email' => $request->email,
                'status' => 'pending'
                ]);

                $request->session()->flash('success_daftar', 'Permintaan Anda akan segera kami proses.');
                return redirect(url('/'));
            }
        }
