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
        @foreach ($promos as $promo)
          <div class="col-12 col-md-4">
              <figure>
                <a href="#!">
                  <img src="{{ Storage::url($promo->gambar) }}" height="200" alt="Promo {{ $promo->title }}">
                  <figcaption>
                    <h2>{{ $promo->title }}</h2>
                    <time>{{ $promo->startDate->format('d F Y') . " - " . $promo->endDate->format('d F Y') }}</time>
                  </figcaption>
                </a>
              </figure>
          </div>
        @endforeach
      </div>
    </div>
  </section>
@endsection
