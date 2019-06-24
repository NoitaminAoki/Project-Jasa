@php
$bisnis = ['tingkat' => 'bisnis', 'harga' => 0];
$profesional = ['tingkat' => 'profesional', 'harga' => 0];
$pemula = ['tingkat' => 'pemula', 'harga' => 0];
foreach ($price as $harga) {
  if ($harga->tingkat == 'bisnis') {
    $bisnis = ['tingkat' => $harga->tingkat, 'harga' => $harga->harga];
  }
  elseif ($harga->tingkat == 'profesional') {
    $profesional = ['tingkat' => $harga->tingkat, 'harga' => $harga->harga];
  }
  elseif ($harga->tingkat == 'pemula') {
    $pemula = ['tingkat' => $harga->tingkat, 'harga' => $harga->harga];
  }
}
@endphp

@extends('layouts.master_static')

@section('title', 'Konsultan Manajemen Keuangan')

@section('header')
<header id="landingPage">
  <div class="overlay">
    @include('temp.nav')
    <div class="header__caption">
      <h1>Konsultan Manajemen dan Keuangan <br> #1 Di Indonesia</h1>
      <ul>
        <li>SDM Profesional</li>
        <li>Ditangani ahlinya</li>
        <li>Pengerjaan Cepat</li>
        <li>Biaya Super Hemat</li>
      </ul>
    </div>
    <a href="#diskonSection" id="goContent">ambil diskon sekarang <box-icon name='chevrons-down' color="white"></box-icon></a>
  </div>
</header>
@endsection
@section('content')
<section id="jasaSection">
  <div class="container">
    <h1>Apa yang kami sediakan</h1>
    <div class="row">
      <div class="col-12 col-md-6">
        <figure>
          <img src="{{ asset('assets/img/calculator.svg') }}" height="50">
          <figcaption>
            <h2>Jasa Akuntansi</h2>
            <p>Membuat laporan keuangan dimulai dari pencatatan transaksi sampai dengan penyajian laporan keuangan sesuai dengan Standar Akuntansi.</p>
          </figcaption>
        </figure>
      </div>
      <div class="col-12 col-md-6">
        <figure>
          <img src="{{ asset('assets/img/dollar.svg') }}" height="50">
          <figcaption>
            <h2>Jasa Perpajakan</h2>
            <p>Melakukan perencanaan pajak, menghitung,membuat e-SPT, sampai dengan pelaporan pajak PPh, PPn & lainnya.</p>
          </figcaption>
        </figure>
      </div>
      <div class="col-12 col-md-6">
        <figure>
          <img src="{{ asset('assets/img/list.svg') }}" height="50">
          <figcaption>
            <h2>Jasa Perencanaan</h2>
            <p>Melakukan perencanaan keuangan dan perpajakan demi lancarnya bisnis</p>
          </figcaption>
        </figure>
      </div>
      <div class="col-12 col-md-6">
        <figure>
          <img src="{{ asset('assets/img/idcard.svg') }}" height="50">
          <figcaption>
            <h2>Jasa Administrasi</h2>
            <p>Melakukan dokumentasi laporan dan backup data perusahaam</p>
          </figcaption>
        </figure>
      </div>
    </div>
  </div>
</section>
<section id="klienSection">
  <div class="container">
    <h1>E-Bina telah dipercaya oleh partner partner di seluruh Indonesia</h1>
    <div class="row mx-0 klienSlideshow" id="slideshowMobile">
      @foreach ($partners as $partner)
      <figure style="margin-bottom: 30px;">
        <img src="{{ asset('assets/img/' . $partner->logo) }}" height="100" alt="{{ $partner->nama }}">
        <figcaption>
          {{ $partner->nama }}
        </figcaption>
      </figure>
      @endforeach
    </div>
    <div class="row mx-0 klienSlideshow" id="slideshowDesktop">
      @foreach ($partners as $partner)
      <figure>
        <img src="{{ asset('assets/img/' . $partner->logo) }}" height="100" alt="{{ $partner->nama }}">
        <figcaption>
          {{ $partner->nama }}
        </figcaption>
      </figure>
      @endforeach
    </div>
  </div>
</section>
<section id="hargaSection">
  <div class="container">
    <h1>harga</h1>
    <div class="row mx-0" id="hargaMobile">
      <div class="col-12 col-md-4 px-md-0">
        <div class="bisnis">
          <h2>{{$bisnis['tingkat']}}</h2>
          @if ($bisnis['harga'] > 0)
          <p><sup>Rp.</sup><var>{{$bisnis['harga']}}</var><sub>k/bulan</sub></p>
          @else
          <small>(belum tersedia)</small>
          @endif
        </div>
        <details>
          <summary>Lihat Fitur</summary>
          <ul>
            @foreach ($fiturBisnis as $harga)
              @foreach ($harga->GetFitur->where('tampilkan', 'iya') as $fitur)
                <li class=""
                style="@if ($fitur->menu == 'sub') text-indent: 15px;
                       @elseif ($fitur->menu == 'besar') font-weight: bolder; font-size: 1.1em; @endif">
                  {{ $fitur->fitur }}
                    <img src="@if ($fitur->ada == 'iya') {{ asset('assets/img/yes.svg') }}
                    @elseif ($fitur->ada == 'tidak'){{ asset('assets/img/no.svg') }} @endif "
                      height="17" class="position-relative" style="bottom: 3px;left: 5px;">
                </li>
              @endforeach
            @endforeach
          </ul>
        </details>
      </div>
      <div class="col-12 col-md-4 px-md-0">
        <div class="profesional">
          <h2>{{$profesional['tingkat']}}</h2>
          @if ($profesional['harga'] > 0)
          <p><sup>Rp.</sup><var>{{$profesional['harga']}}</var><sub>k/bulan</sub></p>
          @else
          <small>(belum tersedia)</small>
          @endif
        </div>
        <details>
          <summary>Lihat Fitur</summary>
          <ul>
            @foreach ($fiturProfesional as $harga)
              @foreach ($harga->GetFitur->where('tampilkan', 'iya') as $fitur)
                <li class=""
                style="@if ($fitur->menu == 'sub') text-indent: 15px;
                       @elseif ($fitur->menu == 'besar') font-weight: bolder; font-size: 1.1em; @endif">
                  {{ $fitur->fitur }}
                    <img src="@if ($fitur->ada == 'iya') {{ asset('assets/img/yes.svg') }}
                    @elseif ($fitur->ada == 'tidak'){{ asset('assets/img/no.svg') }} @endif "
                      height="17" class="position-relative" style="bottom: 3px;left: 5px;">
                </li>
              @endforeach
            @endforeach
          </ul>
        </details>
      </div>
      <div class="col-12 col-md-4 px-md-0">
        <div class="pemula">
          <h2>{{$pemula['tingkat']}}</h2>
          @if ($pemula['harga'] > 0)
          <p><sup>Rp.</sup><var>{{$pemula['harga']}}</var><sub>k/bulan</sub></p>
          @else
          <small>(belum tersedia)</small>
          @endif
        </div>
        <details>
          <summary>Lihat Fitur</summary>
          <ul>
            @foreach ($fiturPemula as $harga)
              @foreach ($harga->GetFitur->where('tampilkan', 'iya') as $fitur)
                <li class=""
                style="@if ($fitur->menu == 'sub') text-indent: 15px;
                       @elseif ($fitur->menu == 'besar') font-weight: bolder; font-size: 1.1em; @endif">
                  {{ $fitur->fitur }}
                    <img src="@if ($fitur->ada == 'iya') {{ asset('assets/img/yes.svg') }}
                    @elseif ($fitur->ada == 'tidak'){{ asset('assets/img/no.svg') }} @endif "
                      height="17" class="position-relative" style="bottom: 3px;left: 5px;">
                </li>
              @endforeach
            @endforeach
          </ul>
        </details>
      </div>
    </div>

    @if (count($price) > 0)
    <div class="row mx-0 justify-content-center" id="hargaDesktop">
      <div class="col-10 px-0">
        <div class="row mx-0">
          <div class="col-12 col-md-4">
            <h2>{{ $bisnis['tingkat'] }}</h2>
            @if ($bisnis['harga'] > 0)
            <p><sup>Rp.</sup><var>{{$bisnis['harga']}}</var><sub>k/bulan</sub></p>
            @else
            <small>(belum tersedia)</small>
            @endif
          </div>
          <div class="col-12 col-md-4">
            <h2>{{ $profesional['tingkat'] }}</h2>
            @if ($profesional['harga'] > 0)
            <p><sup>Rp.</sup><var>{{$profesional['harga']}}</var><sub>k/bulan</sub></p>
            @else
            <small>(belum tersedia)</small>
            @endif
          </div>
          <div class="col-12 col-md-4">
            <h2>{{ $pemula['tingkat'] }}</h2>
            @if ($pemula['harga'] > 0)
            <p><sup>Rp.</sup><var>{{$pemula['harga']}}</var><sub>k/bulan</sub></p>
            @else
            <small>(belum tersedia)</small>
            @endif
          </div>
        </div>
        <div class="row mx-0">
          <div class="col-md-4 pl-0">
            <ul>
              @foreach ($fiturBisnis as $harga)
                @foreach ($harga->GetFitur->where('tampilkan', 'iya') as $fitur)
  								<li class=""
  								style="@if ($fitur->menu == 'sub') text-indent: 15px;
  								       @elseif ($fitur->menu == 'besar') font-weight: bolder; font-size: 1.1em; @endif">
  									{{ $fitur->fitur }}
  										<img src="@if ($fitur->ada == 'iya') {{ asset('assets/img/yes.svg') }}
  										@elseif ($fitur->ada == 'tidak'){{ asset('assets/img/no.svg') }} @endif "
  											height="17" class="position-relative" style="bottom: 3px;left: 5px;">
  								</li>
  							@endforeach
              @endforeach
						</ul>
          </div>
          <div class="col-md-4">
            <ul>
              @foreach ($fiturProfesional as $harga)
                @foreach ($harga->GetFitur->where('tampilkan', 'iya') as $fitur)
  								<li class=""
  								style="@if ($fitur->menu == 'sub') text-indent: 15px;
  								       @elseif ($fitur->menu == 'besar') font-weight: bolder; font-size: 1.1em; @endif">
  									{{ $fitur->fitur }}
  										<img src="@if ($fitur->ada == 'iya') {{ asset('assets/img/yes.svg') }}
  										@elseif ($fitur->ada == 'tidak'){{ asset('assets/img/no.svg') }} @endif "
  											height="17" class="position-relative" style="bottom: 3px;left: 5px;">
  								</li>
  							@endforeach
              @endforeach
						</ul>
          </div>
          <div class="col-md-4 pr-0">
            <ul>
              @foreach ($fiturPemula as $harga)
                @foreach ($harga->GetFitur->where('tampilkan', 'iya') as $fitur)
  								<li class=""
  								style="@if ($fitur->menu == 'sub') text-indent: 15px;
  								       @elseif ($fitur->menu == 'besar') font-weight: bolder; font-size: 1.1em; @endif">
  									{{ $fitur->fitur }}
  										<img src="@if ($fitur->ada == 'iya') {{ asset('assets/img/yes.svg') }}
  										@elseif ($fitur->ada == 'tidak'){{ asset('assets/img/no.svg') }} @endif "
  											height="17" class="position-relative" style="bottom: 3px;left: 5px;">
  								</li>
  							@endforeach
              @endforeach
						</ul>
          </div>
        </div>
        <div id="showDetails" class="col-12">
          <span class="d-flex align-items-center">Lihat Perbandingan <box-icon name='chevron-down' color="white"></box-icon></span>
        </div>
      </div>
    </div>
    @endif

  </div>
</section>
<section id="diskonSection">
  <div class="container">
    <h1>diskon untukmu</h1>
    <p>Jika kamu tertarik menggunakan layanan kami <br> dan ingin mendapatkan diskon terbaru silahkan isi form dibawah ini</p>
    <form action="{{ route('home.klien.store') }}" class="row mx-0" method="post">
      @csrf
      <div class="col-12 mb-3">
        <input type="text" name="nama" placeholder="Nama Lengkap" required>
      </div>
      <div class="col-12 mb-3">
        <select name="harga" required>
          <option value="" selected disabled>Paket Yang Kamu Pilih</option>
          @foreach ($price as $item)
          <option value="{{$item->id}}">{{ucwords($item->tingkat)}}</option>
          @endforeach
        </select>
      </div>
      <div class="col-12 col-md-6 mb-3">
        <input type="text" name="tempatTinggal" placeholder="kota tinggal" required>
      </div>
      <div class="col-12 col-md-6 mb-3">
        <input type="text" name="noTelp" placeholder="no. whatsapp" required>
      </div>
      <div class="col-12 mb-3">
        <input type="text" name="email" placeholder="email aktif" required>
      </div>
      <div class="col-12 mb-3">
        <input type="text" name="codeMember" placeholder="kode referal" value=" @if (isset($getMember)){{$getMember->code}}@endif" readonly>
      </div>
      <div class="col-12 d-flex justify-content-end">
        <button type="submit" name="button" class="btn-secondary">ya aku tertarik <box-icon name='send' type='solid' color="white"></box-icon></button>
      </div>
    </form>
  </div>
</section>
<section id="faqSection">
  <div class="container">
    <h1>tanya jawab</h1>
    <div id="faqMobile" class="d-md-none">
      @foreach ($support as $pertanyaan)
        <div>
          <h3 style="text-transform: capitalize;">{{ $pertanyaan->subjek }}</h3>
          <p style="text-transform: capitalize;">{{ $pertanyaan->pertanyaan }}</p>
        </div>
      @endforeach
    </div>
    <div id="faqDesktop" class="d-none d-md-block">
      @foreach ($support as $pertanyaan)
        <div>
          <h3 style="text-transform: capitalize;">{{ $pertanyaan->subjek }}</h3>
          <p style="text-transform: capitalize;">{{ $pertanyaan->pertanyaan }}</p>
        </div>
      @endforeach
    </div>
  </div>
</section>
@if (Session::has('success_daftar'))
<div id="myNav" class="overlays">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <div class="overlays-content">
    <h5>Terima Kasih!</h5>
    <small class="small-title">{{Session::get('success_daftar')}}</small>
  </div>
</div>
@endif
@endsection

@if (Session::has('success_daftar'))
@section('css')
<style>
  .overlays {
    height: 100%;
    width: 100%;
    display: none;
    position: fixed;
    z-index: 1050;
    top: 0;
    left: 0;
    background-color: rgb(0,0,0);
    background-color: rgba(0,0,0, 0.9);
  }

  .overlays-content {
    position: relative;
    top: 25%;
    width: 100%;
    text-align: center;
    margin-top: 30px;
  }

  .overlays h5, .overlays .small-title, .overlays a {
    padding-right: 8px;
    padding-left: 8px;
    text-decoration: none;
    font-size: 36px;
    color: #818181;
    display: block;
    transition: 0.3s;
  }
  .small-title {
    font-size: 20px !important;
  }

  .overlays h5, .overlays .small-title, .overlays a:hover, .overlay a:focus {
    color: #f1f1f1;
  }

  .overlays .closebtn {
    position: absolute;
    top: 20px;
    right: 45px;
    font-size: 60px;
  }

  @media screen and (max-height: 450px) {
    .overlays a, .overlays h5 {font-size: 20px !important}
    .overlays .small-title {font-size: 18px !important}
    .overlays .closebtn {
      font-size: 40px;
      top: 15px;
      right: 35px;
    }
  }
</style>
@endsection
@section('footer-landing')
<script>
  $(document).ready(function () {
    document.getElementById("myNav").style.display = "block";
  });

  function closeNav() {
    document.getElementById("myNav").style.display = "none";
  }
</script>
@endsection
@endif
@section('footer-landing')
@if (isset($getMember))
<script>
  $(document).ready(function () {
    $('html,body').animate({
      scrollTop: $("#diskonSection").offset().top},
      'slow');
      document.getElementById("myNav").style.display = "block";
    });

    function closeNav() {
      document.getElementById("myNav").style.display = "none";
    }
  </script>
  @endif
  @endsection
