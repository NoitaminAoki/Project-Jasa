@extends('temp.main')

@section('title-page', 'E-Bina | Admin - Penghasilan')

@section('css')
<link rel="stylesheet" href="{{ asset('plugins/datatables/dataTables.bootstrap4.css') }}">
@endsection

@section ('title-body', 'Tambah Konfigurasi Penghasilan')

@section('content')
@if (Session::has('success_message') || Session::has('failed_message'))
<div class="col-12 message-session">
    <div class="alert alert-{{(Session::has('success_message'))? 'success' : 'danger'}} text-center">{{(Session::has('success_message'))? Session::get('success_message') : Session::get('failed_message')}}</div>
</div>
@endif
<div class="col-md-8 mx-auto">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.penghasilan.store') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <label>Tingkat</label>  
                        <select class="custom-select" name="idHarga" required>
                            <option value="" selected disabled>Tingkat Harga</option>
                            @foreach ($harga as $item)
                            <option value="{{ $item->id }}">{{ $item->tingkat }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('idHarga'))
                        <span class="text-danger">
                            <strong>Tingkat harga sudah dipakai.</strong>
                        </span>
                        @endif   
                        <small id="hargaHelpBlock" class="form-text text-muted">
                            Satu tingkat harga hanya boleh memiliki satu konfigurasi
                        </small>
                    </div>
                    <div class="col-12">
                        <label>Point</label>  
                        <input type="number" name="point" class="form-control" required autocomplete="off">
                        @if ($errors->has('point'))
                        <span class="text-danger">
                            <strong>{{ $errors->first('point') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="col-12">
                        <label>Fee / Pendapatan</label>  
                        <input type="number" name="fee" class="form-control" required autocomplete="off">
                        @if ($errors->has('fee'))
                        <span class="text-danger">
                            <strong>{{ $errors->first('fee') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="col-12 mt-3">
                        <button type="submit" class="btn btn-primary float-right">Submit</button>
                        <a href="{{ route('admin.penghasilan.index') }}" class="btn btn-secondary float-right mr-2">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="{{ asset('plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('plugins/datatables/dataTables.bootstrap4.js') }}"></script>
<script>
    $(document).ready(function() {
        $('.message-session').delay(3000).slideUp(600);
    });
</script>
@endsection
