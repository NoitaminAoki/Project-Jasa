@extends('temp.main')

@section('title-page', 'E-Bina | Admin - Pengaturan Fee')

@section('css')
<link rel="stylesheet" href="{{ asset('plugins/datatables/dataTables.bootstrap4.css') }}">
@endsection

@section ('title-body', 'Pengaturan Fee')

@section('content')
@if (Session::has('success_message') || Session::has('failed_message'))
<div class="col-12 message-session">
	<div class="alert alert-{{(Session::has('success_message'))? 'success' : 'danger'}} text-center">{{(Session::has('success_message'))? Session::get('success_message') : Session::get('failed_message')}}</div>
</div>
@endif
@foreach ($penghasilan as $value)
<div class="col-12">
	<div class="invoice p-3 mb-3">
		<!-- info row -->
		<div class="row invoice-info">
			<div class="col-sm-4 invoice-col">
				<b>Tingkat:</b> {{ $value->harga->tingkat }}<br>
				<b>Harga:</b>  {{ $value->harga->harga }}rb/bulan<br>
			</div>
			<div class="col-sm-4 invoice-col">
				<b>Point:</b> {{ $value->point }}pt<br>
				<b>Fee/Pendapatan:</b> {{ number_format($value->fee, 0, ',', '.') }}<br>
			</div>
			<div class="col-sm-4">
				<form action="{{ route('admin.penghasilan.destroy', ['id'=> $value->id]) }}" method="post">
					@csrf
					@method('DELETE')
					<button type="submit" class="btn btn-sm btn-danger float-right">
						<i class="fa fa-trash"></i>
					</button>
				</form>
				<a href="{{ route('admin.penghasilan.edit', ['id'=> $value->id]) }}" class="btn btn-sm btn-warning float-right" style="margin-right: 5px;"><i class="fa fa-edit"></i>
				</a>
			</div>
			<!-- /.col -->
		</div>
		<!-- /.row -->
	</div>
</div>
@endforeach
<div class="col-12">
	<a href="{{ route('admin.penghasilan.create') }}" class="btn btn-primary float-right">Tambah Konfigurasi</a>
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
