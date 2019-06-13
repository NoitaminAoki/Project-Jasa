@extends('temp.main')

@section('title-page', 'E-Bina | Admin - Tambah Harga')

@section('css')
<link rel="stylesheet" href="{{ asset('plugins/datatables/dataTables.bootstrap4.css') }}">
@endsection

@section ('title-body', 'Tambah Harga')

@section('content')
<div class="col-12">
  <form action="{{ route('admin.landing-page.store') }}" method="post">
    @csrf
    <select class="custom-select" name="tingkat" required>
      <option value="" selected disabled>Kategori Harga</option>
      <option value="bisnis">bisnis</option>
      <option value="profesional">profesional</option>
      <option value="pemula">pemula</option>
    </select>
    <input type="number" class="form-control my-3" max="999" min="1" name="harga" placeholder="Harga" required>
    <small id="hargaHelpBlock" class="form-text text-muted">
      Harga sudah dalam bentuk ribuan. Contoh: Rp. 350 dibaca Rp. 350.000
    </small>
    <button type="submit" class="btn btn-success float-right">Tambah Harga</button>
  </form>
</div>
@endsection
