@extends('temp.main')

@section('title-page') E-Bina | Member - Klien  @endsection

@section('css')
<link rel="stylesheet" href="{{ asset('plugins/datatables/dataTables.bootstrap4.css') }}">
@endsection

@section ('title-body') Klien @endsection

@section('content')
@if (Session::has('success_message') || Session::has('failed_message'))
<div class="col-12 message-session">
	<div class="alert alert-{{(Session::has('success_message'))? 'success' : 'danger'}} text-center">{{(Session::has('success_message'))? Session::get('success_message') : Session::get('failed_message')}}</div>
</div>
@endif
<div class="col-12">

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