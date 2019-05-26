@extends('layouts.master_static')
@section('title', 'Dapatkan Promo Menarik Dari Kami')
@section('header')
  <header id="promosiPage">
    @include('temp.nav')
    <div class="overlay">
      <div class="header__caption">
        <h1>Cari Promo Yang <br> Pas Untukmu</h1>
      </div>
    </div>
  </header>
@endsection
@section('content')
  <section>
    <div class="container">
      <div class="row">
        <div class="col-12 col-md-4">
            <figure>
              <a href="">
                <img src="{{ asset('assets/img/contoh_promo.svg') }}" height="200" alt="Gambar Promosi">
                <figcaption>
                  <h2>Judul promo lumayan panjaaaaang banget kan yaa</h2>
                  <time>20 Mei - 30 Mei 2019</time>
                </figcaption>
              </a>
            </figure>
        </div>
        <div class="col-12 col-md-4">
          <figure>
            <a href="">
              <img src="{{ asset('assets/img/contoh_promo.svg') }}" height="200" alt="Gambar Promosi">
              <figcaption>
                <h2>Judul promo lumayan panjaaaaang banget kan yaa</h2>
                <time>20 Mei - 30 Mei 2019</time>
              </figcaption>
            </a>
          </figure>
        </div>
        <div class="col-12 col-md-4">
          <figure>
            <a href="">
              <img src="{{ asset('assets/img/contoh_promo.svg') }}" height="200" alt="Gambar Promosi">
              <figcaption>
                <h2>Judul promo lumayan panjaaaaang banget kan yaa</h2>
                <time>20 Mei - 30 Mei 2019</time>
              </figcaption>
            </a>
          </figure>
        </div>
        <div class="col-12 col-md-4">
          <figure>
            <a href="">
              <img src="{{ asset('assets/img/contoh_promo.svg') }}" height="200" alt="Gambar Promosi">
              <figcaption>
                <h2>Judul promo lumayan panjaaaaang banget kan yaa</h2>
                <time>20 Mei - 30 Mei 2019</time>
              </figcaption>
            </a>
          </figure>
        </div>
        <div class="col-12 col-md-4">
          <figure>
            <a href="">
              <img src="{{ asset('assets/img/contoh_promo.svg') }}" height="200" alt="Gambar Promosi">
              <figcaption>
                <h2>Judul promo lumayan panjaaaaang banget kan yaa</h2>
                <time>20 Mei - 30 Mei 2019</time>
              </figcaption>
            </a>
          </figure>
        </div>
      </div>
    </div>
  </section>
@endsection
