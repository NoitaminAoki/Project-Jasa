@extends('layouts.master_static')
@section('title', 'Dapatkan Promo Menarik Dari Kami')
@section('css')
  <style media="screen">
    figure figcaption a {
      color: #2d87df;
    }
  </style>
@endsection
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
                  <img src="{{ asset('assets/img/' . $promo->gambar) }}" height="200" alt="Promo {{ $promo->title }}">
                  <figcaption>
                    <h2 class="col-12 px-0">{{ $promo->title }}</h2>
                    <a href="{{ route('home.promo.show', $promo->slug) }}" class="col-12 px-0 mb-3" target="">Read More</a>
                    <time>{{ $promo->startDate->format('d F Y') . " - " . $promo->endDate->format('d F Y') }}</time>
                  </figcaption>
              </figure>
          </div>
        @endforeach
      </div>
    </div>
  </section>
@endsection
