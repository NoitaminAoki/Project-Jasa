@extends('layouts.master_static')
@section('title', 'Bantuan Untukmu')
@section('header')
  <header id="supportPage">
    @include('temp.nav')
    <div class="overlay">
      <div class="header__caption">
        <h1 class="mb-3 mb-md-4">Kamu Membutuhkan Bantuan?</h1>
        <h4 class="mr-5">Hubungi WhatsApp kami:&nbsp;<a href="https://wa.me/6281280029849">081280029849</a></h4>
        <h4>atau isi form dibawah ini</h4>
      </div>
      @if (Session::has('success_message'))
      <div class="col-6 alert-success message-session">
      		Bantuanmu telah terkirim dan akan dibalas dalam 2x24 jam
      </div>
      @endif
    </div>
  </header>
@endsection
@section('content')
  <section>
    <div class="container">
      <h1>kirim pertanyaanmu melalui form ini</h1>
      <form action="{{ route('home.support.store') }}" class="row flex-column mx-0" method="post">
        @csrf
        <div class="col-12 px-0 mb-4">
          @auth ('member')
            <input type="email" name="email_pengirim" placeholder="Email Kamu" value="{{ Auth::guard('member')->user()->email }}" readonly>
          @else
            <input type="email" name="email_pengirim" placeholder="Email Kamu">
          @endauth
        </div>
        <div class="col-12 px-0 mb-3">
          <input type="text" name="subjek" placeholder="Subjek Pertanyaan Kamu">
        </div>
        <div class="col-12 px-0 mb-3">
          <textarea name="pertanyaan_pengirim" rows="12" placeholder="Apa yang ingin kamu tanyakan?"></textarea>
        </div>
        <button type="submit" name="button" class="btn-secondary col-md-auto align-self-end">
          kirim pertanyaanmu
          <box-icon name='send' type='solid' color="white"></box-icon>
        </button>
      </form>
    </div>
  </section>
@endsection
