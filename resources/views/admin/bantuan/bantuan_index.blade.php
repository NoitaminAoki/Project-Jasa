@extends('temp.main')
@section('title-page', 'E-Bina | Admin - Bantuan')
@section('css')
	<link rel="stylesheet" href="{{ asset('plugins/trumbowyg/dist/ui/trumbowyg.min.css') }}">
	<style media="screen">
    .trumbowyg-box .trumbowyg-editor {
      background-color: #fff;
    }
		.alert-success {
			color: #155724 !important;
			background-color: #d4edda !important;
			border-color: #c3e6cb !important;
		}
  </style>
@endsection
@section ('title-body', 'Bantuan')
@section('content')

	@if (session('berhasil'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('berhasil') }}
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			 <span aria-hidden="true">&times;</span>
			</button>
    </div>
	@endif

	<div class="col-12 px-3">
		<div class="accordion" id="accordionExample">
			@foreach ($support as $bantuan)
				<div class="card">
			    <div class="card-header" id="heading{{ $bantuan->id }}">
			      <h2 class="mb-0 d-flex align-items-center flex-column flex-md-row justify-content-between">
			        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse{{ $bantuan->id }}" aria-expanded="false" aria-controls="collapse{{ $bantuan->id }}">
			          <span>Dari Pengirim Dengan Email <br class="d-block d-md-none"> {{ $bantuan->email }}</span>
			        </button>
							<time style="font-size: 0.5em" class="text-info font-weight-bold">{{ $bantuan->created_at->format('d F Y H:i') }}</time>
			      </h2>
			    </div>
			    <div id="collapse{{ $bantuan->id }}" class="collapse" aria-labelledby="heading{{ $bantuan->id }}" data-parent="#accordionExample">
			      <div class="card-body">
							<h3>{{ $bantuan->subjek }}</h3>
			        {!! $bantuan->pertanyaan !!}
			      </div>
						<div class="card-footer">
							<form action="{{ route('admin.bantuan.store') }}" method="post">
								@csrf
								<input type="hidden" name="pengirim" value="{{ $bantuan->email }}">
								<input type="hidden" name="subject" value="Balasan Untuk Keluhanmu Tentang {{ $bantuan->subjek }}">
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
	<script src="{{ asset('plugins/trumbowyg/dist/trumbowyg.min.js') }}" charset="utf-8"></script>
  <script src="{{ asset('plugins/trumbowyg/dist/plugins/cleanpaste/trumbowyg.cleanpaste.min.js') }}"></script>
  <script src="{{ asset('plugins/trumbowyg/dist/plugins/colors/trumbowyg.colors.min.js') }}"></script>
	<script>
		$(document).ready(function() {
			$('.message-session').delay(3000).slideUp(600);
			$("textarea[name='balasan']").trumbowyg({
	      semantic: true,
	      removeformatPasted: false,
	      minimalLinks: true
	    });
			setTimeout(function(){
       $(".alert").remove();
		 	}, 3000 );
		});
	</script>
@endsection
