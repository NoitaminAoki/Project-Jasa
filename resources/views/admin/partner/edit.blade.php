@extends('temp.main')
@section('title-page', 'Edit Partner')
@section('title-body', 'Edit Partner')
@section('content')
  <div class="col-12">
    <img src="{{ Storage::url($partner->logo) }}" height="100" class="card-img-top mb-3" alt="{{ $partner->nama }}">
    <form action="{{ route('admin.partner.update', $partner->id) }}" method="post" enctype="multipart/form-data">
      @csrf @method('PUT')
      <div class="form-group">
        <input type="text" name="nama" class="form-control" placeholder="Nama Partner" value="{{ $partner->nama }}">
      </div>
      <div class="form-group">
        <div class="custom-file">
          <input type="file" name="logo" class="custom-file-input" id="logoPartner" value="{{ $partner->logo }}">
          <label class="custom-file-label" for="logoPartner">{{ $partner->logo ?? '' }}</label>
        </div>
      </div>
      <button type="submit" class="btn btn-success float-right">Edit Partner</button>
    </form>
  </div>
@endsection
