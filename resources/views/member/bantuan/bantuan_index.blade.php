@extends('temp.main')

@section('title-page', 'E-Bina | Member - Minta Bantuan')
@section('css')
	<link rel="stylesheet" href="{{ asset('plugins/datatables/dataTables.bootstrap4.css') }}">
	<style media="screen">
		.fas {
			transition: all 250ms;
		}
		.deg-180 {
			transform: rotate(180deg);
		}
	</style>
@endsection

@section ('title-body', 'Minta Bantuan')

@section('content')
@if (Session::has('success_message') || Session::has('failed_message'))
<div class="col-12 message-session">
	<div class="alert alert-{{(Session::has('success_message'))? 'success' : 'danger'}} text-center">{{(Session::has('success_message'))? Session::get('success_message') : Session::get('failed_message')}}</div>
</div>
@endif
<div class="col-12 px-3">
	<ul class="list-group list-group-flush">
		@foreach ($supports as $bantuan)
		<div class="card">
			<div class="card-header" id="heading{{ $bantuan->id }}">
				<h2 class="mb-0 d-flex justify-content-between align-items-center">
					<button class="btn btn-link flex-grow-1 text-left px-0" type="button" data-toggle="collapse" data-target="#collapse{{ $bantuan->id }}" aria-expanded="false" aria-controls="collapse{{ $bantuan->id }}">
						<span>Pada Tanggal <time>{{ $bantuan->created_at->format('d F Y') }}</time><i class="fas fa-angle-down ml-2"></i></span>
					</button>
					<form class="d-inline" action="{{ route('member.bantuan.destroy', $bantuan->id) }}" method="post">
						@csrf @method("DELETE")
						<button type="submit" class="btn btn-link text-danger">unsent</button>
					</form>
				</h2>
			</div>
			<div id="collapse{{ $bantuan->id }}" class="collapse" aria-labelledby="heading{{ $bantuan->id }}" data-parent="#accordionExample">
				<div class="card-body">
					{!! $bantuan->pertanyaan !!}
				</div>
			</div>
		</div>
		@endforeach
		<div class="row mx-0 justify-content-between position-relative">
			{{ $supports->links('vendor.pagination.bootstrap-4') }}
			<a href="{{ route('member.bantuan.create') }}" class="btn btn-secondary ml-auto text-capitalize">minta bantuan <i class="ml-2 fas fa-question-circle"></i></a>
		</div>
	</ul>
</div>
@endsection

@section('script')
<script src="{{ asset('plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('plugins/datatables/dataTables.bootstrap4.js') }}"></script>
<script>
	$(document).ready(function() {
		$(".list-group .card-header button").click(function() {
			$(this).find("span i").toggleClass("deg-180");
		});
		$('.message-session').delay(3000).slideUp(600);
	});
</script>
@endsection
