@extends('temp.main')
@section('title-page', 'Ubah Detail Promo')
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
@section('title-body', 'Ubah Detail')
@section('content')
<main class="col-12">
  <form action="{{ route('admin.promosi.update', $updatePromosi->id) }}" method="post" enctype="multipart/form-data">
    @csrf @method("PUT")
    <div class="form-group">
      <input type="text" class="form-control" name="title" placeholder="Judul Promosi" value="{{ $updatePromosi->title }}" autofocus>
    </div>
    <div class="form-row">
      <div class="col-12 col-md-6">
        <input type="text" name="startDate" class="form-control datepicker-here"
        placeholder="Start Date">
      </div>
      <div class="col-12 col-md-6">
        <input type="text" name="endDate" class="form-control datepicker-here" placeholder="End Date" autocomplete="off">
      </div>
    </div>
    <textarea name="isi" rows="10" placeholder="Jelaskan Detail Promonya">{{ $updatePromosi->isi }}</textarea>
    <div class="custom-file">
      <input type="file" class="custom-file-input" name="gambar" id="gambarPromo" value="{{ $updatePromosi->gambar }}">
      <label class="custom-file-label" for="gambarPromo">{{ $updatePromosi->gambar }}</label>
    </div>
    @error ('gambar')
      <span class="text-danger">{{ $message }}</span>
    @enderror
    <button type="submit" class="btn btn-success float-right mt-3">Ubah Promosi</button>
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
    $("input:not([type='file']), textarea").prop("required", true);
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
    $("input[name='startDate']").datepicker().data('datepicker').selectDate(new Date("{{ $updatePromosi->startDate }}"));
    $("input[name='endDate']").datepicker().data('datepicker').selectDate(new Date("{{ $updatePromosi->endDate }}"));
    $(".datepicker-here").datepicker({
      language: 'en',
      dateFormat: 'dd MM yyyy',
      minDate: new Date()
    });
  </script>
@endsection
