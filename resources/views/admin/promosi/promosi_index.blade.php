@extends('temp.main')

@section('title-page', 'E-Bina | Promosi')

@section('css')
<link rel="stylesheet" href="{{ asset('plugins/datatables/dataTables.bootstrap4.css') }}">
<style media="screen">
	.card-body::after, .card-footer::after, .card-header::after {
		content: none !important;
	}
	.more-option-btn {
		color: #f4f0ea;
		position: absolute;
		right: 1.25rem;
		top: 10px;
	}
	.visible {
		opacity: 1 !important;
		visibility: visible !important;
	}
	.more-option {
		transition: all 250ms;
		list-style-type: none;
		position: absolute;
		opacity: 0;
		visibility: hidden;
		padding: 10px 2rem;
		right:  0;
		background-color: #f2f2f2;
		top: 0;
	}
	.more-option li {
		width: 100%;
		text-align: right;
	}
	.more-option li:first-child {
		margin-bottom: 10px;
	}
</style>
@endsection

@section ('title-body', 'Promosi')

@section('content')
	@if (Session::has('success_message') || Session::has('failed_message'))
	<div class="col-12 message-session">
		<div class="alert alert-{{(Session::has('success_message'))? 'success' : 'danger'}} text-center">
			{{(Session::has('success_message'))? Session::get('success_message') : Session::get('failed_message')}}
		</div>
	</div>
	@endif
	@foreach ($promos as $promo)
		<div class="col-12 col-md-4 mb-3">
			<div class="card">
				<a href="javascript:void(0);" class="more-option-btn">more option</a>
				<ul class="more-option">
					<li><a href="{{ route('admin.promosi.edit', $promo->id) }}" class="text-warning">Edit</a></li>
					<li>
						<form action="{{ route('admin.promosi.destroy', $promo->id) }}" method="post">
							@csrf @method("DELETE")
							<button type="submit" class="btn btn-link p-0 text-danger">Delete</button>
						</form>
					</li>
				</ul>
				<img src="{{ Storage::url($promo->gambar) }}" class="card-img-top" height="180" alt="Promo {{ $promo->title }}">
				<div class="card-body">
					<h2>{{ $promo->title }}</h2>
					<p class="card-text">{!! $promo->isi !!}</p>
				</div>
				<div class="card-footer justify-content-between d-flex">
					<time><span>{{ $promo->startDate }}</span> s/d <span>{{ $promo->endDate }}</span></time>
					<button type="button" class="card-link btn btn-link p-0" data-clipboard-text="{{ route('admin.promosi.show', $promo->slug) }}"
						data-toggle="tooltip" data-placement="top" data-trigger="click" title="Copied!">
						Copy This Link <i class="far fa-copy" style="margin-left: 5px;"></i>
					</button>
				</div>
			</div>
		</div>
	@endforeach
	<div class="col-12 d-flex mb-4 justify-content-between">
		<a href="{{ route('admin.promosi.create') }}" class="btn btn-info">Buat Promo</a>
		{{ $promos->links('vendor.pagination.bootstrap-4') }}
	</div>
@endsection

@section('script')
<script src="{{ asset('plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('plugins/datatables/dataTables.bootstrap4.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.4/clipboard.min.js"></script>
<script>
	$(document).ready(function() {
		$('.message-session').delay(3000).slideUp(600);
		var clipboard = new ClipboardJS(".card-link");
		$('[data-toggle="tooltip"]').tooltip();
		$('[data-toggle="tooltip"]').mouseleave(function() {
			$(this).tooltip("hide");
		});
		$("[data-toggle='tooltip']").click(function() {
			$(this).parent().prev().find("input").select();
		});
		$(".more-option-btn").click(function() {
			$(this).siblings(".more-option").addClass("visible");
		});
		$(".card img, .card-body, .card-footer").click(function(e) {
			if (e.target !== this)
			return;
			$(this).parents(".card").find(".more-option").removeClass("visible");
		});
		$("*").not(".more-optio, .more-option-btn").click(function(e) {
			if (e.target !== this)
			return;
			$(".more-option").removeClass("visible");
		});
	});
</script>
@endsection
