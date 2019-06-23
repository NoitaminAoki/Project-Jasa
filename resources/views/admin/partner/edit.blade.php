@extends('temp.main')
@section('title-page', 'Edit Partner')
@section('title-body', 'Edit Partner')
@section('content')
  <div class="col-12">
    <img src="{{ asset('assets/img/' . $partner->logo) }}" height="100" class="mx-auto d-block mb-3" alt="{{ $partner->nama }}">
    <form action="{{ route('admin.partner.update', $partner->id) }}" method="post" enctype="multipart/form-data">
      @csrf @method('PUT')
      <div class="form-group">
        <input type="text" name="nama" class="form-control" placeholder="Nama Partner" value="{{ $partner->nama }}">
      </div>
      <button type="submit" class="btn btn-success float-right">Edit Partner</button>
    </form>
  </div>
@endsection
@section('script')
  <script>
    var inputan = $("input");
    $.trim(inputan);
    $("body").css("bakcground-color", "red");
  </script>
@endsection
