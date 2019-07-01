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
      <div class="form-row mx-0 justify-content-between">
        <a href="{{ route('admin.partner.index') }}" class="btn btn-link text-warning"><i class="fas fa-long-arrow-alt-left"></i> Tidak Jadi</a>
        <button type="submit" class="btn btn-success">Tambah Partner</button>
      </div>
    </form>
  </div>
@endsection
@section('script')
  <script src="{{ asset('plugins/bootstrap/js/bs-inputfile.js') }}" charset="utf-8"></script>
  <script>
    $(document).ready(function() {
      $("input").prop("required", true);
      bsCustomFileInput.init();
    });
  </script>
@endsection
