@extends('layouts.master_static')
@section('title', 'Mari Bermitra Dengan Kami')
@section('header')
  <header id="mitraPage">
    <div class="overlay">
      @include('temp.nav')
      <div class="header__caption">
        <h1>Ayo Bermitra Bersama Kami!</h1>
      </div>
      <a href="#caraBermitra" class="btn-secondary col-7 col-md-auto">Begini caranya <box-icon name='chevrons-down' color="white"></box-icon></a>
    </div>
  </header>
@endsection
@section('content')
  <section id="keuntunganSection">
    <div class="container">
      <h1>Apa Yang Akan Kamu Dapatkan?</h1>
      <div class="row">
        <figure class="col-12 col-md-4">
          <img src="{{ asset('assets/img/relasi.svg') }}" height="75" alt="Mitra Image">
          <figcaption>
            Relasi Dengan <br> Berbagai Jenis Bisnis
          </figcaption>
        </figure>
        <figure class="col-12 col-md-4">
          <img src="{{ asset('assets/img/support.svg') }}" height="75" alt="Mitra Image">
          <figcaption>Bantuan <br> Secara Real Time</figcaption>
        </figure>
        <figure class="col-12 col-md-4">
          <img src="{{ asset('assets/img/promosi.svg') }}" height="75" alt="Mitra Image">
          <figcaption>
            Promosi <br> Yang Menjanjikan
          </figcaption>
        </figure>
      </div>
    </div>
  </section>
  <section id="caraBermitra">
    <div class="container">
      <h1>Bagaimana Cara Menjadi Mitra?</h1>
      <div class="row mx-0 flex-column flex-md-row">
        <ol>
          <li>1) Klik tombol <strong>gabung sekarang</strong></li>
          <li>2) Isi form dengan penuh sukacita</li>
          <li>3) Kamu akan mendapatkan email dari kami dalam waktu 1 x 24 jam</li>
        </ol>
        <a href="javascript:void(0);" class="btn-secondary btn-modal">gabung sekarang</a>
        <div class="modal-overlay">
          <div class="modal">
            <div class="modal__header">
              <h1>Daftarkan Bisnismu Sekarang!</h1>
              <small>dan dapatkan keuntungannya</small>
              <span class="modal__close"><box-icon name='x' color="white"></box-icon></span>
            </div>
            <div class="modal__content">
              <form action="" method="post">
                @csrf
                <div class="row flex-column mx-0">
                  <div class="col px-0 mb-4">
                    <input type="text" name="" placeholder="Nama Bisnis">
                  </div>
                  <div class="col px-0 mb-4">
                    <input type="email" name="" placeholder="Email Bisnis">
                  </div>
                  <div class="col px-0 mb-4">
                    <input type="number" name="" placeholder="Nomor Handphone">
                  </div>
                  <div class="col px-0 mb-4">
                    <textarea name="name" rows="8" placeholder="Alamat Rumah"></textarea>
                  </div>
                  <button type="submit" name="button" class="btn-secondary col-md-auto align-self-end">
                    daftar sekarang
                    <box-icon name='send' type='solid' color="white"></box-icon>
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
