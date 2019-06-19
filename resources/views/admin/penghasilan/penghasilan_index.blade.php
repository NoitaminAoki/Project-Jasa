@extends('temp.main')

@section('title-page', 'E-Bina | Admin - Pengaturan Fee')

@section('css')
<link rel="stylesheet" href="{{ asset('plugins/datatables/dataTables.bootstrap4.css') }}">
@endsection

@section ('title-body', 'Pengaturan Fee')

@section('content')
	@if (Session::has('success_message') || Session::has('failed_message'))
		<div class="col-12 message-session">
			<div class="alert alert-{{(Session::has('success_message'))? 'success' : 'danger'}} text-center">
				{{ (Session::has('success_message'))? Session::get('success_message') : Session::get('failed_message') }}
			</div>
		</div>
	@endif
	@foreach ($penghasilan as $value)
		<div class="col-12">
			<div class="invoice p-3 mb-3">
				<div class="row invoice-info">
					<div class="col-sm-4 invoice-col">
						<p class="mb-0 text-capitalize"><span class="font-weight-bold">Tingkat: </span> {{ $value->harga->tingkat }}</p>
						<p class="mb-0 text-capitalize"><span class="font-weight-bold">Harga: </span>  {{ $value->harga->harga }}rb/bulan</p>
					</div>
					<div class="col-sm-4 invoice-col">
						<p class="mb-0 text-capitalize"><span class="font-weight-bold">Point:</span> {{ $value->point . 'pt'}}</p>
						<p class="mb-0 text-capitalize"><span class="font-weight-bold">Fee / Pendapatan:</span> {{ number_format($value->fee, 0, ',', '.') }}</p>
					</div>
					<div class="col-sm-4">
						<form action="{{ route('admin.penghasilan.destroy', ['id'=> $value->id]) }}" method="post">
							@csrf	@method('DELETE')
							<button type="submit" class="btn btn-sm btn-danger float-right"><i class="fa fa-trash"></i></button>
						</form>
							<a href="{{ route('admin.penghasilan.edit', ['id'=> $value->id]) }}" class="btn btn-sm btn-warning float-right mr-3">
								<i class="fa fa-edit"></i>
							</a>
					</div>
				</div>
			</div>
		</div>
	@endforeach
	@if (count($penghasilan) < 3)
		<div class="col-12">
			<a href="{{ route('admin.penghasilan.create') }}" class="btn btn-primary float-right">Tambah Konfigurasi</a>
		</div>
	@endif
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
