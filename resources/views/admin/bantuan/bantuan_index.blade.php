@extends('temp.main')
@section('title-page') E-Bina | Admin - Bantuan  @endsection
@section('css')
	<link rel="stylesheet" href="{{ asset('plugins/datatables/dataTables.bootstrap4.css') }}">
@endsection
@section ('title-body', 'Bantuan')
@section('content')
	@if (Session::has('success_message') || Session::has('failed_message'))
		<div class="col-12 message-session">
			<div class="alert alert-{{(Session::has('success_message'))? 'success' : 'danger'}} text-center">{{(Session::has('success_message'))? Session::get('success_message') : Session::get('failed_message')}}</div>
		</div>
	@endif
	<div class="col-12 px-3">
		<div class="accordion" id="accordionExample">
			@foreach ($support as $bantuan)
				<div class="card">
			    <div class="card-header" id="heading{{ $bantuan->id }}">
			      <h2 class="mb-0">
			        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse{{ $bantuan->id }}" aria-expanded="false" aria-controls="collapse{{ $bantuan->id }}">
			          Dari Pengirim Dengan Email <br class="d-block d-md-none"> {{ $bantuan->email }}
			        </button>
			      </h2>
			    </div>
			    <div id="collapse{{ $bantuan->id }}" class="collapse" aria-labelledby="heading{{ $bantuan->id }}" data-parent="#accordionExample">
			      <div class="card-body">
			        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.<br>
			      </div>
						<div class="card-footer">
							<form action="" method="post">
								<textarea name="balasan" class="form-control" rows="8" placeholder="Balas Ke Email {{ $bantuan->email }}"></textarea>
								<button type="submit" class="btn btn-success float-right mt-3">Balas <i class="fas fa-paper-plane ml-2"></i></button>
							</form>
						</div>
			    </div>
			  </div>
			@endforeach
			{{ $support->links('vendor.pagination.bootstrap-4') }}
		</div>
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
