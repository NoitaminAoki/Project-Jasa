@extends('temp.main')

@section('title-page', 'E-Bina | Member - Minta Bantuan')
@section('css')
	<link rel="stylesheet" href="{{ asset('plugins/trumbowyg/dist/ui/trumbowyg.min.css') }}">
	<link rel="stylesheet" href="{{ asset('plugins/datatables/dataTables.bootstrap4.css') }}">
	<style media="screen">
		.trumbowyg-box .trumbowyg-editor {
			background-color: #fff;
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
	<form action="{{ route('member.bantuan.store') }}" class="row flex-column mx-0" method="post">
		@csrf
		<input type="hidden" value="{{ Auth::user()->email }}" name="email_pengirim">
		<textarea name="pertanyaan_pengirim" class="form-control mb-4" rows="8" placeholder="Apa Yang Ingin Kamu Tanyakan Ke Admin?"></textarea>
		<button type="submit" name="button" class="btn btn-success col-md-auto align-self-end">
			Kirim Pertanyaanmu <i class="fas fa-paper-plane ml-2"></i>
			<box-icon name='send' type='solid' color="white"></box-icon>
		</button>
	</form>
</div>
@endsection

@section('script')
<script src="{{ asset('plugins/trumbowyg/dist/trumbowyg.min.js') }}" charset="utf-8"></script>
<script src="{{ asset('plugins/trumbowyg/dist/plugins/cleanpaste/trumbowyg.cleanpaste.min.js') }}"></script>
<script>
	$(document).ready(function() {
		$('.message-session').delay(3000).slideUp(600);
		$("textarea[name='pertanyaan_pengirim']").trumbowyg({
      semantic: true,
      removeformatPasted: false,
      minimalLinks: true
    });
	});
</script>
@endsection
