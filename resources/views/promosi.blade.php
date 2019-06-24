@extends('layouts.master_static')
@section('title', 'Dapatkan Promo Menarik Dari Kami')
@section('css')
  <style media="screen">
    figure figcaption a {
      color: #2d87df;
    }
    figure {
      border: 1px solid #a2a2a2;
    }
    .pagination {
      display: flex;
      justify-content: space-between;
      background-color: inherit;
      border: 1px solid #e2e2e2;
      border-radius: 5px;
    }
    .pagination li {
      transition: all 250ms;
      height: 35px;
      line-height: 35px;
      padding: 0 1rem;
    }
    .pagination li:not(:last-child) {
      border-right: 1px solid #e2e2e2;
    }
    .pagination .active {
      background-color: #3790c6;
      color: #fff;
    }
    .pagination li:not(.active):not(.disabled):hover {
      background-color: #ededed;
    }
    .pagination .disabled {
      color: #cccccc;
    }
    .pagination li:not(.active):not(.disabled) {
      color: #3790c6;
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
      <div class="row py-5 align-items-center justify-content-center">
        {{ $promos->links('vendor.pagination.mypaginate') }}
      </div>
    </div>
  </section>
@endsection
