@extends('temp.main')
@section('title-page', 'Tambah Aturan')
@section('css')
  <link rel="stylesheet" href="{{ asset('plugins/trumbowyg/dist/ui/trumbowyg.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/trumbowyg/dist/plugins/colors/ui/trumbowyg.colors.css') }}">
  <style media="screen">
    .trumbowyg-box .trumbowyg-editor {
      background-color: #fff;
    }
  </style>
@endsection
@section('title-body', 'Tambah Aturan')
@section('content')
<main class="col-12">
  <form action="{{ route('admin.aturan.store') }}" method="post">
    @csrf
    <input type="text" class="form-control mb-3" name="judul" placeholder="Judul Aturan" autocomplete="off">
    <textarea name="deskripsi" rows="10" placeholder="Deskripsi Aturan"></textarea>
    <button type="submit" class="btn btn-success float-right mt-3">Tambah Aturan</button>
  </form>
</main>
@endsection
@section('script')
  <script src="{{ asset('plugins/trumbowyg/dist/trumbowyg.min.js') }}" charset="utf-8"></script>
  <script src="{{ asset('plugins/trumbowyg/dist/plugins/cleanpaste/trumbowyg.cleanpaste.min.js') }}"></script>
  <script src="{{ asset('plugins/trumbowyg/dist/plugins/colors/trumbowyg.colors.min.js') }}"></script>
  <script>
    $("textarea[name='deskripsi']").trumbowyg({
      semantic: true,
      removeformatPasted: false,
      minimalLinks: true
    });
    $("textarea[name='deskripsi']").trumbowyg({
      btns: [
        ['foreColor', 'backColor']
      ]
    });
  </script>
@endsection
