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

@section ('title-body')
	{{ $promo->title }}
@endsection

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
			<div class="d-flex align-items-center justify-content-between my-4">
				<time class="text-info py-2">
					{{ $promo->startDate->format('d F Y') . " - " . $promo->endDate->format('d F Y') }}
				</time>
				<button type="button" class="btn btn-success" data-clipboard-text="{{ route('member.promosi.show', $promo->slug) }}"
					data-toggle="tooltip" data-placement="top" data-trigger="click" title="Copied!">
					Copy This Link <i class="far fa-copy" style="margin-left: 10px;"></i>
				</button>
			</div>
		</figcaption>
		<a href="{{ route('member.promosi.index') }}">
			<i class="fas fa-long-arrow-alt-left" style="margin-right: 10px"></i>Kembali Ke Halaman Sebelumya
		</a>
	</figure>
@endsection

@section('script')
<script src="{{ asset('plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('plugins/datatables/dataTables.bootstrap4.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.4/clipboard.min.js"></script>
<script>
	$(document).ready(function() {
		$('.message-session').delay(3000).slideUp(600);
		var clipboard = new ClipboardJS(".btn-success");
		$('[data-toggle="tooltip"]').tooltip();
		$('[data-toggle="tooltip"]').mouseleave(function() {
			$(this).tooltip("hide");
		});
		$("[data-toggle='tooltip']").click(function() {
			$(this).parent().prev().find("input").select();
		});
	});
</script>
@endsection
