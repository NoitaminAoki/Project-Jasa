@extends('temp.main')
@section('title-page', 'E-Bina | Admin - Tambah Harga')
@section ('title-body', 'Tambah Harga')
@section('content')
<div class="col-12">
  <form action="{{ route('admin.landing-page.store', $price->id) }}" method="post">
    @csrf
    <select class="custom-select mb-3" name="tingkat">
      <option disabled>Kategori Harga</option>
      <option value="bisnis" @if ($price->tingkat == 'bisnis') selected @endif>bisnis</option>
      <option value="profesional" @if ($price->tingkat == 'profesional') selected @endif>profesional</option>
      <option value="pemula" @if ($price->tingkat == 'pemula') selected @endif>pemula</option>
    </select>
    <input type="number" name="harga" max="999" min="1" class="form-control mb-3" placeholder="Harga" value="{{ $price->harga }}">
    <button type="submit" class="btn btn-success float-right">Update Harga</button>
  </form>
</div>
@endsection
