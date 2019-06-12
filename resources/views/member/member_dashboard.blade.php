@extends('temp.main')

@section('title-page', 'E-Bina | Member - Dashboard')

@section('css')
<link rel="stylesheet" href="{{ asset('plugins/datatables/dataTables.bootstrap4.css') }}">
@endsection

@section ('title-body', 'Dashboard')

@section('content')
	@if (Session::has('success_message') || Session::has('failed_message'))
	<div class="col-12 message-session">
		<div class="alert alert-{{(Session::has('success_message'))? 'success' : 'danger'}} text-center">{{(Session::has('success_message'))? Session::get('success_message') : Session::get('failed_message')}}</div>
	</div>
	@endif
	<div class="col-12">
		<div class="alert message-session alert-warning alert-dismissible fade show text-center" role="alert">
		  Please make sure your email can be access because in case we send you an email you can check your email from us!
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>
	</div>
@endsection

@section('script')
	<script src="{{ asset('plugins/datatables/jquery.dataTables.js') }}"></script>
	<script src="{{ asset('plugins/datatables/dataTables.bootstrap4.js') }}"></script>
	<script>
		$(document).ready(function() {
			$('.message-session').delay(7000).slideUp(600);
		});
	</script>
@endsection
