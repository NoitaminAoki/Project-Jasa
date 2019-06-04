@extends('temp.main')
@section('title-page', 'E-Bina | Admin - Aturan')
@section('css')
	<link rel="stylesheet" href="{{ asset('plugins/datatables/dataTables.bootstrap4.css') }}">
	<style>
		#menuPeraturan div {
			border-radius: 5px 0 0 5px;
			overflow: hidden;
			border-top: 1px solid #c8c8c8;
			border-left: 1px solid #c8c8c8;
		}
		#menuPeraturan div a {
			border-radius: 5px 0 0 5px !important;
			text-transform: capitalize;
		}
		#menuPeraturan div a:last-of-type {
			border-bottom: 1px solid #c8c8c8;
		}
		#menuPeraturan div a[aria-selected='true']{
			background-color: #e7ebf0 !important;
			color: #5C8EC7 !important;
		}
		#listPeraturan .tab-content {
			border: 1px solid #c8c8c8;
		}
		#listPeraturan h2 {
			display: flex;
			align-items: center;
		}
		#listPeraturan h2 small:first-of-type {
			margin-left: auto;
		}
		#listPeraturan h2 small {
			font-size: 16px;
		}
	</style>
@endsection
@section ('title-body', 'Aturan')
@section('content')
	@if (Session::has('success_message') || Session::has('failed_message'))
	<div class="col-12 message-session">
		<div class="alert alert-{{(Session::has('success_message'))? 'success' : 'danger'}} text-center">
			{{(Session::has('success_message'))? Session::get('success_message') : Session::get('failed_message')}}
		</div>
	</div>
	@endif
	<main class="col-12">
	  <div class="row">
			<div class="col-3 pr-0" id="menuPeraturan">
		    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
					@foreach ($peraturan as $each)
						<a class="nav-link" id="v-pills-peraturan{{ $each->id }}-tab" data-toggle="pill" href="#v-pills-peraturan{{ $each->id }}" role="tab"
						aria-controls="v-pills-peraturan{{ $each->id }}" aria-selected="false">{{ $each->judul }}</a>
					@endforeach
		    </div>
		  </div>
		  <div class="col-9 pl-0" id="listPeraturan">
		    <div class="tab-content px-4 py-3" id="v-pills-tabContent">
					@foreach ($peraturan as $each)
		      <div class="tab-pane fade" id="v-pills-peraturan{{ $each->id }}" role="tabpanel" aria-labelledby="v-pills-peraturan{{ $each->id }}-tab">
						<h2 class="text-capitalize">{{ $each->judul }}
							<small>
								<form action="{{ route('admin.aturan.destroy', $each->id) }}" method="post">
									@csrf @method('DELETE')
									<button type="submit" value="{{ $each->id }}" class="text-danger pl-0 py-0 btn btn-link">
										<i class="text-danger fas fa-trash-alt"></i>
									</button>
								</form>
							</small>
							<small><a href="{{ route('admin.aturan.edit', $each->id) }}"><i class="fas fa-edit"></i></a></small>
						</h2>
		      	{!! $each->deskripsi !!}
		      </div>
					@endforeach
		    </div>
				<a href="{{ route('admin.aturan.create') }}" class="btn btn-info mt-3 float-right">Tambah Aturan</a>
		  </div>
	  </div>
	</main>
@endsection
@section('script')
	<script src="{{ asset('plugins/datatables/jquery.dataTables.js') }}"></script>
	<script src="{{ asset('plugins/datatables/dataTables.bootstrap4.js') }}"></script>
	<script>
		$(document).ready(function() {
			$('.message-session').delay(3000).slideUp(600);
			$("#menuPeraturan .nav-pills .nav-link:first-of-type").addClass("active").attr("aria-selected", "true")
			$(".tab-content .tab-pane.fade:first-of-type").addClass("show active");
		});
	</script>
@endsection
