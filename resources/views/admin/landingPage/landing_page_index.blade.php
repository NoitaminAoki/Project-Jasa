@extends('temp.main')

@section('title-page', 'E-Bina | Landing Page')

@section('css')
<link rel="stylesheet" href="{{ asset('plugins/datatables/dataTables.bootstrap4.css') }}">
@endsection

@section ('title-body', 'Harga Bisnis')

@section('content')
@if (Session::has('success_message') || Session::has('failed_message'))
<div class="col-12 message-session">
	<div class="alert alert-{{(Session::has('success_message'))? 'success' : 'danger'}} text-center">{{(Session::has('success_message'))? Session::get('success_message') : Session::get('failed_message')}}</div>
</div>
@endif
<main class="col-12">
	<ul class="list-group col">
		@if (count($price) > 0)
			@foreach ($price as $harga)
				<li class="list-group-item d-flex align-items-center">
					<span class="text-capitalize">Tingkat {{ $harga->tingkat }}</span>
					<var class="ml-auto mr-3 text-success font-weight-bold">{{ $harga->harga }}rb/bulan</var>
					<span>
						<a href="{{ route('admin.landing-page.edit', $harga->id) }}"><i class="fas fa-edit"></i></a>
						<form action="{{ route('admin.landing-page.destroy', $harga->id) }}" class="d-inline-block" method="post">
						 	@csrf @method("DELETE")
							<button type="submit" class="btn btn-link text-danger pr-0 py-0"><i class="fas fa-trash"></i></button>
						</form>
					</span>
				</li>
		 	@endforeach
		 @if (count($price) < 3)
		 	<a href="{{ route('admin.landing-page.create') }}" class="btn btn-info align-self-end mt-3">Tambah Kategori Harga</a>
		 @endif
		@else
			<div class="alert alert-warning text-capitalize" role="alert">
			 	tidak ada harga yang kamu buat
			</div>
		@endif
	</ul>
</main>
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
