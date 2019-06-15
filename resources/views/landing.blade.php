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
        <img src="{{ Storage::url($partner->logo) }}" height="100" alt="{{ $partner->nama }}">
        <figcaption>
          {{ $partner->nama }}
        </figcaption>
      </figure>
      @endforeach
    </div>
    <div class="row mx-0 klienSlideshow" id="slideshowDesktop">
      @foreach ($partners as $partner)
      <figure>
        <img src="{{ Storage::url($partner->logo) }}" height="100" alt="{{ $partner->nama }}">
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
          <p><sup>Rp.</sup><var>{{$bisnis['harga']}}</var><sub>rb/bulan</sub></p>
          @else
          <small>(belum tersedia)</small>
          @endif
        </div>
        <details>
          <summary>Lihat Fitur</summary>
          <ul>
            <li>Rekap Transaksi</li>
            <li class="no">Jurnal</li>
            <li class="no">Laporan Buku Besar</li>
            <li>Laporan daftar aset</li>
            <li class="submenu">
              <b>Laporan Keuangan :</b>
              <ul>
                <li>Laporan Posisi Keuangan</li>
                <li>Laporan Laba Rugi Komprehensif</li>
                <li>Laporan Perubahan ekuitas</li>
                <li>Laporan Arus Kas</li>
                <li class="no">Catatan Laporan Keuangan</li>
              </ul>
            </li>
            <li class="submenu">
              <b>laporan perpajakan :</b>
              <ul>
                <li>PPh Pasal 21</li>
                <li>PPh Pasal 22</li>
                <li>PPh Pasal 23</li>
                <li>PPh Pasal 25</li>
                <li>PPh Pasal 26</li>
                <li>PPh Pasal 29</li>
                <li>PPh Pasal 4 (2)</li>
                <li>PPh Final</li>
                <li>PPN</li>
                <li>Dll</li>
              </ul>
            </li>
            <li>Membuat e-billing</li>
            <li>Membayarkan Pajak</li>
            <li>Membuat & Melapor SPT PPh Masa</li>
            <li class="no">Membuat & Melapor SPT Tahunan</li>
            <li>Perencanaan Keuangan</li>
            <li>Perencanaan Pajak</li>
            <li>Print Laporan</li>
            <li>Backup Laporan</li>
            <li class="no">Pengarsipan Laporan</li>
            <li>Visit Perusahaan</li>
          </ul>
        </details>
      </div>
      <div class="col-12 col-md-4 px-md-0">
        <div class="profesional">
            <h2>{{$profesional['tingkat']}}</h2>
            @if ($profesional['harga'] > 0)
            <p><sup>Rp.</sup><var>{{$profesional['harga']}}</var><sub>rb/bulan</sub></p>
            @else
            <small>(belum tersedia)</small>
            @endif
        </div>
        <details>
          <summary>Lihat Fitur</summary>
          <ul>
            <li>Rekap Transaksi</li>
            <li>Jurnal</li>
            <li>Laporan Buku Besar</li>
            <li>Laporan daftar aset</li>
            <li class="submenu">
              <b>Laporan Keuangan :</b>
              <ul>
                <li>Laporan Posisi Keuangan</li>
                <li>Laporan Laba Rugi Komprehensif</li>
                <li>Laporan Perubahan ekuitas</li>
                <li>Laporan Arus Kas</li>
                <li>Catatan Laporan Keuangan</li>
              </ul>
            </li>
            <li class="submenu">
              <b>laporan perpajakan :</b>
              <ul>
                <li>PPh Pasal 21</li>
                <li>PPh Pasal 22</li>
                <li>PPh Pasal 23</li>
                <li>PPh Pasal 25</li>
                <li>PPh Pasal 26</li>
                <li>PPh Pasal 29</li>
                <li>PPh Pasal 4 (2)</li>
                <li>PPh Final</li>
                <li>PPN</li>
                <li>Dll</li>
              </ul>
            </li>
            <li>Membuat e-billing</li>
            <li>Membayarkan Pajak</li>
            <li>Membuat & Melapor SPT PPh Masa</li>
            <li>Membuat & Melapor SPT Tahunan</li>
            <li>Perencanaan Keuangan</li>
            <li>Perencanaan Pajak</li>
            <li>Print Laporan</li>
            <li>Backup Laporan</li>
            <li>Pengarsipan Laporan</li>
            <li>Visit Perusahaan</li>
          </ul>
        </details>
      </div>
      <div class="col-12 col-md-4 px-md-0">
        <div class="pemula">
            <h2>{{$pemula['tingkat']}}</h2>
            @if ($pemula['harga'] > 0)
            <p><sup>Rp.</sup><var>{{$pemula['harga']}}</var><sub>rb/bulan</sub></p>
            @else
            <small>(belum tersedia)</small>
            @endif
        </div>
        <details>
          <summary>Lihat Fitur</summary>
          <ul>
            <li>Rekap Transaksi</li>
            <li class="no">Jurnal</li>
            <li class="no">Laporan Buku Besar</li>
            <li class="no">Laporan daftar aset</li>
            <li class="submenu">
              <b>Laporan Keuangan :</b>
              <ul>
                <li>Laporan Posisi Keuangan</li>
                <li>Laporan Laba Rugi Komprehensif</li>
                <li>Laporan Perubahan ekuitas</li>
                <li>Laporan Arus Kas</li>
                <li class="no">Catatan Laporan Keuangan</li>
              </ul>
            </li>
            <li class="submenu">
              <b>laporan perpajakan :</b>
              <ul>
                <li>PPh Pasal 21</li>
                <li>PPh Pasal 22</li>
                <li>PPh Pasal 23</li>
                <li>PPh Pasal 25</li>
                <li>PPh Pasal 26</li>
                <li>PPh Pasal 29</li>
                <li>PPh Pasal 4 (2)</li>
                <li>PPh Final</li>
                <li class="no">PPN</li>
                <li class="no">Dll</li>
              </ul>
            </li>
            <li>Membuat e-billing</li>
            <li class="no">Membayarkan Pajak</li>
            <li>Membuat & Melapor SPT PPh Masa</li>
            <li class="no">Membuat & Melapor SPT Tahunan</li>
            <li>Perencanaan Keuangan</li>
            <li class="no">Perencanaan Pajak</li>
            <li>Print Laporan</li>
            <li class="no">Backup Laporan</li>
            <li class="no">Pengarsipan Laporan</li>
            <li class="no">Visit Perusahaan</li>
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
            <p><sup>Rp.</sup><var>{{$bisnis['harga']}}</var><sub>rb/bulan</sub></p>
            @else
            <small>(belum tersedia)</small>
            @endif
          </div>
          <div class="col-12 col-md-4">
            <h2>{{ $profesional['tingkat'] }}</h2>
            @if ($profesional['harga'] > 0)
            <p><sup>Rp.</sup><var>{{$profesional['harga']}}</var><sub>rb/bulan</sub></p>
            @else
            <small>(belum tersedia)</small>
            @endif
          </div>
          <div class="col-12 col-md-4">
            <h2>{{ $pemula['tingkat'] }}</h2>
            @if ($pemula['harga'] > 0)
            <p><sup>Rp.</sup><var>{{$pemula['harga']}}</var><sub>rb/bulan</sub></p>
            @else
            <small>(belum tersedia)</small>
            @endif
          </div>
        </div>
        <div class="row mx-0">
          <div class="col-md-4 pl-0">
            <ul>
              <li>Rekap Transaksi</li>
              <li class="no">Jurnal</li>
              <li class="no">Laporan Buku Besar</li>
              <li>Laporan daftar aset</li>
              <li class="submenu">
                <b>Laporan Keuangan :</b>
                <ul>
                  <li>Laporan Posisi Keuangan</li>
                  <li>Laporan Laba Rugi Komprehensif</li>
                  <li>Laporan Perubahan ekuitas</li>
                  <li>Laporan Arus Kas</li>
                  <li class="no">Catatan Laporan Keuangan</li>
                </ul>
              </li>
              <li class="submenu">
                <b>laporan perpajakan :</b>
                <ul>
                  <li>PPh Pasal 21</li>
                  <li>PPh Pasal 22</li>
                  <li>PPh Pasal 23</li>
                  <li>PPh Pasal 25</li>
                  <li>PPh Pasal 26</li>
                  <li>PPh Pasal 29</li>
                  <li>PPh Pasal 4 (2)</li>
                  <li>PPh Final</li>
                  <li>PPN</li>
                  <li>Dll</li>
                </ul>
              </li>
              <li>Membuat e-billing</li>
              <li>Membayarkan Pajak</li>
              <li>Membuat & Melapor SPT PPh Masa</li>
              <li class="no">Membuat & Melapor SPT Tahunan</li>
              <li>Perencanaan Keuangan</li>
              <li>Perencanaan Pajak</li>
              <li>Print Laporan</li>
              <li>Backup Laporan</li>
              <li class="no">Pengarsipan Laporan</li>
              <li>Visit Perusahaan</li>
            </ul>
          </div>
          <div class="col-md-4">
            <ul>
              <li>Rekap Transaksi</li>
              <li>Jurnal</li>
              <li>Laporan Buku Besar</li>
              <li>Laporan daftar aset</li>
              <li class="submenu">
                <b>Laporan Keuangan :</b>
                <ul>
                  <li>Laporan Posisi Keuangan</li>
                  <li>Laporan Laba Rugi Komprehensif</li>
                  <li>Laporan Perubahan ekuitas</li>
                  <li>Laporan Arus Kas</li>
                  <li>Catatan Laporan Keuangan</li>
                </ul>
              </li>
              <li class="submenu">
                <b>laporan perpajakan :</b>
                <ul>
                  <li>PPh Pasal 21</li>
                  <li>PPh Pasal 22</li>
                  <li>PPh Pasal 23</li>
                  <li>PPh Pasal 25</li>
                  <li>PPh Pasal 26</li>
                  <li>PPh Pasal 29</li>
                  <li>PPh Pasal 4 (2)</li>
                  <li>PPh Final</li>
                  <li>PPN</li>
                  <li>Dll</li>
                </ul>
              </li>
              <li>Membuat e-billing</li>
              <li>Membayarkan Pajak</li>
              <li>Membuat & Melapor SPT PPh Masa</li>
              <li>Membuat & Melapor SPT Tahunan</li>
              <li>Perencanaan Keuangan</li>
              <li>Perencanaan Pajak</li>
              <li>Print Laporan</li>
              <li>Backup Laporan</li>
              <li>Pengarsipan Laporan</li>
              <li>Visit Perusahaan</li>
            </ul>
          </div>
          <div class="col-md-4 pr-0">
            <ul>
              <li>Rekap Transaksi</li>
              <li class="no">Jurnal</li>
              <li class="no">Laporan Buku Besar</li>
              <li class="no">Laporan daftar aset</li>
              <li class="submenu">
                <b>Laporan Keuangan :</b>
                <ul>
                  <li>Laporan Posisi Keuangan</li>
                  <li>Laporan Laba Rugi Komprehensif</li>
                  <li>Laporan Perubahan ekuitas</li>
                  <li>Laporan Arus Kas</li>
                  <li class="no">Catatan Laporan Keuangan</li>
                </ul>
              </li>
              <li class="submenu">
                <b>laporan perpajakan :</b>
                <ul>
                  <li>PPh Pasal 21</li>
                  <li>PPh Pasal 22</li>
                  <li>PPh Pasal 23</li>
                  <li>PPh Pasal 25</li>
                  <li>PPh Pasal 26</li>
                  <li>PPh Pasal 29</li>
                  <li>PPh Pasal 4 (2)</li>
                  <li>PPh Final</li>
                  <li class="no">PPN</li>
                  <li class="no">Dll</li>
                </ul>
              </li>
              <li>Membuat e-billing</li>
              <li class="no">Membayarkan Pajak</li>
              <li>Membuat & Melapor SPT PPh Masa</li>
              <li class="no">Membuat & Melapor SPT Tahunan</li>
              <li>Perencanaan Keuangan</li>
              <li class="no">Perencanaan Pajak</li>
              <li>Print Laporan</li>
              <li class="no">Backup Laporan</li>
              <li class="no">Pengarsipan Laporan</li>
              <li class="no">Visit Perusahaan</li>
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
        <input type="text" name="codeMember" placeholder="kode referal">
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
      <div>
        <h3>Apa yang saya perlukan?</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed accumsan ante a dapibus auctor.
          Morbi sit amet sollicitudin arcu. Etiam facilisis, elit et
        </p>
      </div>
      <div>
        <h3>Apa yang saya perlukan</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed accumsan ante a dapibus auctor.
          Morbi sit amet sollicitudin arcu. Etiam facilisis, elit et
        </p>
      </div>
      <div>
        <h3>Apa yang saya perlukan</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed accumsan ante a dapibus auctor.
          Morbi sit amet sollicitudin arcu. Etiam facilisis, elit et
        </p>
      </div>
      <div>
        <h3>Apa yang saya perlukan</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed accumsan ante a dapibus auctor.
          Morbi sit amet sollicitudin arcu. Etiam facilisis, elit et
        </p>
      </div>
    </div>
    <div id="faqDesktop" class="d-none d-md-block">
      <div>
        <h3>Apa yang saya perlukan?</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed accumsan ante a dapibus auctor.
          Morbi sit amet sollicitudin arcu. Etiam facilisis, elit et
        </p>
      </div>
      <div>
        <h3>Apa yang saya perlukan</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed accumsan ante a dapibus auctor.
          Morbi sit amet sollicitudin arcu. Etiam facilisis, elit et
        </p>
      </div>
      <div>
        <h3>Apa yang saya perlukan</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed accumsan ante a dapibus auctor.
          Morbi sit amet sollicitudin arcu. Etiam facilisis, elit et
        </p>
      </div>
      <div>
        <h3>Apa yang saya perlukan</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed accumsan ante a dapibus auctor.
          Morbi sit amet sollicitudin arcu. Etiam facilisis, elit et
        </p>
      </div>
    </div>
  </div>
</section>
@endsection
