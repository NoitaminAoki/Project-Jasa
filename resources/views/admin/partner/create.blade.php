@extends('temp.main')
@section('title-page', 'Tambah Partner')
@section('title-body', 'Tambah Partner')
@section('content')
  <div class="col-12">
    <form action="{{ route('admin.partner.store') }}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="form-group">
        <input type="text" name="nama" class="form-control" placeholder="Nama Partner">
      </div>
      <div class="form-group">
        <div class="custom-file">
          <input type="file" name="logo" class="custom-file-input" id="logoPartner">
          <label class="custom-file-label" for="logoPartner">Pilih Gambar Perusahaan</label>
        </div>
      </div>
      <button type="submit" class="btn btn-success float-right">Tambah Partner</button>
    </form>
  </div>
@endsection
