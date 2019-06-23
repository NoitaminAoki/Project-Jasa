@extends('layouts.master_static')
@section('title', 'Dapatkan Promo Menarik Dari Kami')
@section('css')
  <style media="screen">
    nav {
      background-color: #4096c7;
    }
    figure img {
      width: 100%;
      display: block;
      margin: 0 auto;
    }
    figcaption h1 {
      text-align: center;
      font-size: 33px;
    }
    figcaption > p {
      margin-bottom: 20px;
    }
    figcaption > time {
      text-align: center;
      display: block;
      width: 80%;
      max-width: 350px;
      margin: 0 auto;
      border-radius: 20px;
      padding: 15px 0;
      color: #fff;
      background-color: #2fa7c2;
    }
  </style>
@endsection
@section('header')
    @include('temp.nav')
@endsection
@section('content')
  <section>
    <div class="container">
      <div class="row">
        <div class="col-12 col-md-6 mx-auto">
            <figure class="mt-5">
                <img src="{{ Storage::url($promo->gambar) }}" height="200" alt="Promo {{ $promo->title }}">
                <figcaption class="py-3">
                  <h1 class="col-12 px-0 mb-3">{{ $promo->title }}</h1>
                  <p class="card-text">{!! $promo->isi !!}</p>
                  <time>{{ $promo->startDate->format('d F Y') . " - " . $promo->endDate->format('d F Y') }}</time>
                </figcaption>
            </figure>
        </div>
      </div>
    </div>
  </section>
@endsection
