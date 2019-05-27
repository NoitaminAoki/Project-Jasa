@extends('layouts.master_static')
@section('title', 'Profil Kamu')
@section('header')
  <header id="profilPage">
    @include('temp.nav')
    <div class="container">
      <figure>
        <img src="{{ asset('assets/img/team/helmi_profil.svg') }}" height="150" class="d-block mx-auto" alt="Profile Page">
        <figcaption>
          <h1>Helmi Faizal</h1>
          <small><a href=""><box-icon name='mail-send' color="#dd4343"></box-icon><span class="ml-2">helmi@faizal.me</span></a></small>
          <small><a href=""><box-icon name='edit-alt' type='solid' color="orange"></box-icon> Ubah Profilmu</a></small>
        </figcaption>
      </figure>
    </div>
  </header>
@endsection
@section('content')
  <section>
    <div class="container">
      <ul>
        <li class="px-0 col-md-6">
          <span class="d-block">Alamat</span>
          <address>Jalan Swadaya Gudang Baru No.11, RT.6/RW.4, Ciganjur, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta</address>
        </li>
        <li>
          <span class="d-block">Nomor Telephone</span>
          <a href="tel:087xxxxxxxxx">087xxxxxxxxx</a>
        </li>
      </ul>
    </div>
  </section>
@endsection
