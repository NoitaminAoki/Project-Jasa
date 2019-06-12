@extends('temp.main')
@section('title-page', 'E-Bina | Admin - Ubah Harga')
@section ('title-body', 'Ubah Harga')
@section('content')
<div class="col-12">
  <form action="{{ route('admin.landing-page.update', $price->id) }}" class="needs-validation" method="post" novalidate>
    @csrf @method('PUT')
    <select class="custom-select mb-3 text-capitalize" name="tingkat">
      <option disabled>Kategori Harga</option>
      <option value="bisnis" @if ($price->tingkat == 'bisnis') selected @endif>bisnis</option>
      <option value="profesional" @if ($price->tingkat == 'profesional') selected @endif>profesional</option>
      <option value="pemula" @if ($price->tingkat == 'pemula') selected @endif>pemula</option>
    </select>
    <div class="input-group form-group">
      <div class="input-group-prepend">
        <span class="input-group-text" id="hargaPrepend">Rp.</span>
      </div>
      <input id="harga" type="number" name="harga" max="999" min="1" aria-describedby="hargaHelpBlock" class="form-control" placeholder="Harga" value="{{ $price->harga }}">
      <div class="invalid-feedback">
        Please fill the price
      </div>
    </div>
    <small id="hargaHelpBlock" class="form-text text-muted">
      Harga sudah dalam bentuk ribuan. Contoh: Rp. 350 dibaca Rp. 350.000
    </small>
    <button type="submit" class="btn btn-success float-right">Update Harga</button>
  </form>
</div>
@endsection
@section('script')
  <script>
    (function() {
    'use strict';
    window.addEventListener('load', function() {
      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      var forms = document.getElementsByClassName('needs-validation');
      // Loop over them and prevent submission
      var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
          if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
          }
          form.classList.add('was-validated');
        }, false);
      });
    }, false);
    })();
  </script>
@endsection
