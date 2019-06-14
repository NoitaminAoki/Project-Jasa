@extends('temp.main')
@section('title-page', 'Tambah Promo Baru')
@section('css')
  <link rel="stylesheet" href="{{ asset('plugins/air-datepicker/dist/css/datepicker.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/trumbowyg/dist/ui/trumbowyg.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/trumbowyg/dist/plugins/colors/ui/trumbowyg.colors.css') }}">
  <style media="screen">
    .trumbowyg-box .trumbowyg-editor {
      background-color: #fff;
    }
  </style>
@endsection
@section('title-body', 'Tambah Promo Baru')
@section('content')
<main class="col-12">
  <form action="{{ route('admin.promosi.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <input type="text" class="form-control" name="title" placeholder="Judul Promosi" autofocus>
    </div>
    <div class="form-row">
      <div class="col-12 col-md-6">
        <input type="text" name="startDate" class="form-control datepicker-here" placeholder="Start Date">
      </div>
      <div class="col-12 col-md-6">
        <input type="text" name="endDate" class="form-control datepicker-here" placeholder="End Date">
      </div>
    </div>
    <textarea name="isi" rows="10" placeholder="Jelaskan Detail Promonya"></textarea>
    <div class="custom-file">
      <input type="file" class="custom-file-input" name="gambar" id="gambarPromo">
      <label class="custom-file-label" for="gambarPromo">Tambahkan Gambar Promo</label>
    </div>
    <button type="submit" class="btn btn-success float-right mt-3">Buat Promosi</button>
  </form>
</main>
@endsection
@section('script')
  <script src="{{ asset('plugins/bootstrap/js/bs-inputfile.js') }}" charset="utf-8"></script>
  <script src="{{ asset('plugins/trumbowyg/dist/trumbowyg.min.js') }}" charset="utf-8"></script>
  <script src="{{ asset('plugins/trumbowyg/dist/plugins/cleanpaste/trumbowyg.cleanpaste.min.js') }}"></script>
  <script src="{{ asset('plugins/trumbowyg/dist/plugins/colors/trumbowyg.colors.min.js') }}"></script>
  <script src="{{ asset('plugins/air-datepicker/dist/js/datepicker.min.js') }}" charset="utf-8"></script>
  <script src="{{ asset('plugins/air-datepicker/dist/js/i18n/datepicker.en.js') }}" charset="utf-8"></script>
  <script>
    bsCustomFileInput.init();
    $("input, textarea").prop("required", true);
    $("textarea[name='isi']").trumbowyg({
      semantic: true,
      removeformatPasted: false,
      minimalLinks: true
    });
    $("textarea[name='isi']").trumbowyg({
      btns: [
        ['foreColor', 'backColor']
      ]
    });
    $(".datepicker-here").datepicker({
      language: 'en',
      dateFormat: 'dd MM yyyy',
      minDate: new Date()
    });
  </script>
@endsection
