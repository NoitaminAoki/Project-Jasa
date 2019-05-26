@extends('layouts.master_static')
@section('title', 'Bantuan Untukmu')
@section('header')
  <header id="supportPage">
    @include('temp.nav')
    <div class="overlay">
      <div class="header__caption">
        <h1 class="mb-3 mb-md-4">Kamu Membutuhkan Bantuan?</h1>
        <h4 class="mr-5">Hubungi WhatsApp kami: <a href="https://wa.me/628xxxxxxxx">08xxxxxxxx</a></h4>
        <h4>atau isi form dibawah ini</h4>
      </div>
    </div>
  </header>
@endsection
@section('content')
  <section>
    <div class="container">
      <h1>kirim pertanyaanmu melalui form ini</h1>
      <form action="" class="row flex-column mx-0" method="post">
        <div class="col-12 px-0 mb-4">
          <input type="text" name="" placeholder="Email Kamu">
        </div>
        <div class="col-12 px-0 mb-3">
          <textarea name="name" rows="12" placeholder="Apa yang ingin kamu tanyakan?"></textarea>
        </div>
        <button type="submit" name="button" class="btn-secondary col-md-auto align-self-end">kirim pertanyaanmu <box-icon name='send' type='solid' color="white"></box-icon></button>
      </form>
    </div>
  </section>
@endsection
