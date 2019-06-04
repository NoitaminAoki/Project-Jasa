@extends('temp.main')
@section('title-page', 'Edit Aturan')
@section('css')
  <link rel="stylesheet" href="{{ asset('plugins/trumbowyg/dist/ui/trumbowyg.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/trumbowyg/dist/plugins/colors/ui/trumbowyg.colors.css') }}">
  <style media="screen">
    .trumbowyg-box .trumbowyg-editor {
      background-color: #fff;
    }
  </style>
@endsection
@section('title-body', 'Edit Aturan')
@section('content')
<main class="col-12">
  <form action="{{ route('admin.aturan.update', $edit_aturan->id) }}" method="post">
    @csrf @method('PUT')
    <input type="text" name="judul" class="form-control mb-3" placeholder="Judul Peraturan" value="{{ $edit_aturan->judul }}">
    <textarea name="deskripsi" rows="10" placeholder="Deskripsi Peraturan">{{ $edit_aturan->deskripsi }}</textarea>
    <button type="submit" class="btn btn-success float-right mt-3">Update Peraturan</button>
  </form>
</main>
@endsection
@section('script')
  <script src="{{ asset('plugins/trumbowyg/dist/trumbowyg.min.js') }}" charset="utf-8"></script>
  <script src="{{ asset('plugins/trumbowyg/dist/plugins/cleanpaste/trumbowyg.cleanpaste.min.js') }}"></script>
  <script>
    $("textarea[name='deskripsi']").trumbowyg();
  </script>
@endsection
