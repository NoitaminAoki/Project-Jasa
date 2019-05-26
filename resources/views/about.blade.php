@extends('layouts.master_static')
@section('title', 'Tentang Kami')
@section('header')
  <header id="aboutPage">
    <div class="overlay">
      @include('temp.nav')
      <div class="header__caption">
        <h1>Tentang Kami</h1>
      </div>
    </div>
  </header>
@endsection
@section('content')
  <main>
    <section>
      <div class="container">
        <h1>PT Jaya Bina Konsultan Group</h1>
        <p>Adalah PT yang bekerja untuk Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed accumsan ante a dapibus auctor.
          Morbi sit amet sollicitudin arcu.</p>
      </div>
    </section>
    <section>
      <div class="container">
        <h1>Team Kami</h1>
        <div class="row justify-content-center">
          <figure class="col-12 col-md-4">
            <img src="assets/img/team/achmad.jpeg" height="200" alt="our team">
            <figcaption>
              <p>Achmad Ridwan</p>
              <p><small>komisaris</small></p>
            </figcaption>
          </figure>
          <figure class="col-12 col-md-4">
            <img src="assets/img/team/adhitya.jpg" height="200" alt="our team">
            <figcaption>
              <p>Helmi Faizal</p>
              <p><small>Direktur Operasional</small></p>
            </figcaption>
          </figure>
          <figure class="col-12 col-md-4">
            <img src="assets/img/team/eti.jpg" height="200" alt="our team">
            <figcaption>
              <p>M. Adhitya Arjanggi</p>
              <p><small>Direktur</small></p>
            </figcaption>
          </figure>
          <figure class="col-12 col-md-4">
            <img src="assets/img/team/helmi.jpeg" height="200" alt="our team">
            <figcaption>
              <p>Eti</p>
              <p><small>Tim Support</small></p>
            </figcaption>
          </figure>
          <figure class="col-12 col-md-4">
            <img src="assets/img/team/nurtiyas.jpg" height="200" alt="our team">
            <figcaption>
              <p>Nurtiyas</p>
              <p><small>Direktur Utama</small></p>
            </figcaption>
          </figure>
        </div>
      </div>
    </section>
  </main>
@endsection
