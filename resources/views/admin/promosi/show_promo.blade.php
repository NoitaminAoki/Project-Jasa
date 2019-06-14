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

@section ('title-body') {{ $promo->title }}  @endsection

@section('content')
	@if (Session::has('success_message') || Session::has('failed_message'))
  	<div class="col-12 message-session">
  		<div class="alert alert-{{(Session::has('success_message'))? 'success' : 'danger'}} text-center">
        {{(Session::has('success_message'))? Session::get('success_message') : Session::get('failed_message')}}
      </div>
  	</div>
	@endif
		<div class="col-12 col-md-4 mb-3">
			<div class="card">
				<img src="{{ Storage::url($promo->gambar) }}" class="card-img-top" height="180" alt="Promo {{ $promo->title }}">
				<div class="card-body">
					<h2>{{ $promo->title }}</h2>
					<p class="card-text">{!! $promo->isi !!}</p>
				</div>
				<div class="card-footer justify-content-between d-flex">
					<time><span>{{ $promo->startDate }}</span> s/d <span>{{ $promo->endDate }}</span></time>
					<a href="#" class="card-link">Share This Promo</a>
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
		// $("time").replace(' 00:00:00', '');
    // $("time").replace(' 59:59:59', '');
		// $('time').each(function() {
		// 	var startDate = $(this).find("span:first-of-type").text();
		// 	var endDate = $(this).find("span:last-of-type").text();
		// 	$(this).find("span:first-of-type").text(startDate.replace(' 00:00:00', ' '));
		// 	$(this).find("span:last-of-type").text(endDate.replace(' 59:59:59', ' '));
		// });
	});
</script>
@endsection
