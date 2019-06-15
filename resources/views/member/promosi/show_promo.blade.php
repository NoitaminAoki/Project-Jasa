@extends('temp.main')

@section('title-page', 'E-Bina | Admin - Promosi')

@section('css')
<link rel="stylesheet" href="{{ asset('plugins/datatables/dataTables.bootstrap4.css') }}">
<style media="screen">
	.card-body::after, .card-footer::after, .card-header::after {
		content: none !important;
	}
</style>
@endsection

@section ('title-body', 'Detail Promo')

@section('content')
	@if (Session::has('success_message') || Session::has('failed_message'))
  	<div class="col-12 message-session">
  		<div class="alert alert-{{(Session::has('success_message'))? 'success' : 'danger'}} text-center">
        {{(Session::has('success_message'))? Session::get('success_message') : Session::get('failed_message')}}
      </div>
  	</div>
	@endif
	<figure class="col-8 mx-auto mb-3 text-center">
		<img src="{{ Storage::url($promo->gambar) }}" height="300" alt="Promo {{ $promo->title }}">
		<figcaption class="text-left py-4">
			<h1 class="text-center mb-4 font-weight-bold">{{ $promo->title }}</h1>
			<p class="card-text">{!! $promo->isi !!}</p>
			<div class="d-flex justify-content-between my-4">
				<time class="text-info btn px-0"><span>{{ $promo->startDate->format('d F Y') }}</span> s/d <span>{{ $promo->endDate->format('d F Y') }}</span></time>
				<a href="#" class="btn btn-success" style="border-radius: 20px;">Copy This Link</a>
			</div>
		</figcaption>
	</figure>
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
