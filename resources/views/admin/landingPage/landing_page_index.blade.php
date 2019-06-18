@extends('temp.main')

@section('title-page', 'E-Bina | Landing Page')

@section('css')
<style media="screen">
	#harga-tabs .nav-item {
		flex-grow: 1;
		text-align: center;
	}
	#harga-tabs .nav-item.active {
		background-color: #17a2b8 !important;
		color: #fff !important;
	}
	ol {
		list-style-type: none;
	}
	.harga-details ol li, .harga-details .tab-pane .row > div:last-of-type .row {
		height: 30px;
	}
</style>
@endsection

@section ('title-body', 'Harga Bisnis')

@section('content')
@if (Session::has('success_message') || Session::has('failed_message'))
<div class="col-12 message-session">
	<div class="alert alert-{{(Session::has('success_message'))? 'success' : 'danger'}} text-center">
		{{ (Session::has('success_message'))? Session::get('success_message') : Session::get('failed_message') }}
	</div>
</div>
@endif
<main class="col-12">
	<div id="harga-tabs">
	  <div class="nav nav-tabs" id="nav-tab" role="tablist">
			@foreach ($price as $harga)
	    	<a class="nav-item nav-link text-capitalize" id="nav-{{ $harga->tingkat }}-tab" data-toggle="tab" href="#nav-{{ $harga->tingkat }}"
				role="tab" aria-controls="nav-{{ $harga->tingkat }}" aria-selected="false">{{ $harga->tingkat }}</a>
			@endforeach
	  </div>
	</div>
	<div class="tab-content harga-details" id="nav-tabContent">
		@foreach ($price as $harga)
		  <div class="tab-pane px-3 fade" id="nav-{{ $harga->tingkat }}" role="tabpanel" aria-labelledby="nav-{{ $harga->tingkat }}-tab">
				<ul class="list-group py-3">
					<li class="list-group-item px-0 bg-transparent border-0 d-flex align-items-center">
						<span class="text-capitalize" style="font-size: 20px;">Harga</span>
						<var class="ml-auto mr-3 text-success font-weight-bold">{{ $harga->harga }}k/bulan</var>
						<span>
							<a href="{{ route('admin.landing-page.edit', $harga->id) }}"><i class="fas fa-edit"></i></a>
						</span>
					</li>
				</ul>
				<div class="row mx-0">
					<div class="col-12 col-md-6 pl-0" style="border-right: 2px solid #b8b8b8;">
						<p class="text-uppercase text-center mb-4">uraian pekerjaan</p>
						<ol>
							@foreach ($harga->GetFitur as $fitur)
								<li class="mb-4"
								style="@if ($fitur->menu == 'sub') text-indent: 15px;
								       @elseif ($fitur->menu == 'besar') font-weight: bolder; font-size: 1.1em; @endif">
									{{ $fitur->fitur }}
										<img src="@if ($fitur->ada == 'iya') {{ asset('assets/img/yes.svg') }}
										@elseif ($fitur->ada == 'tidak'){{ asset('assets/img/no.svg') }} @endif "
											height="17" class="position-relative" style="bottom: 3px;left: 5px;">
								</li>
							@endforeach
						</ol>
					</div>
					<div class="col-12 col-md-6 pr-0">
						<p class="text-uppercase text-center mb-4">aksi</p>
						@foreach ($harga->GetFitur as $fitur)
							<div class="row px-3 align-items-center mb-4">
								<form class="align-items-center d-flex self-tampilkan" action="{{ route('admin.fitur.update', $fitur->id) }}"
								method="post" style="height: 100%;">
									@csrf @method("PUT")
									<input type="hidden" name="fitur" value="{{ $fitur->fitur }}">
									<input type="hidden" name="harga_id" value="{{ $fitur->harga_id }}">
									<input type="hidden" name="ada" value="{{ $fitur->ada }}">
									<input type="hidden" name="menu" value="{{ $fitur->menu }}">
									<div class="custom-control d-inline-block custom-checkbox">
										@if ($fitur->tampilkan == 'iya')
											<input type="checkbox" name="ubahTampilkan" value="iya" class="custom-control-input" id="selfTampilkanFitur{{ $fitur->id }}" checked>
										@else
											<input type="checkbox" name="ubahTampilkan" value="iya" class="custom-control-input" id="selfTampilkanFitur{{ $fitur->id }}">
										@endif
										<label class="custom-control-label" for="selfTampilkanFitur{{ $fitur->id }}">Tampilkan</label>
									</div>
								</form>
								<button type="button" class="ml-auto btn btn-link text-warning" data-toggle="modal" data-target="#editFitur{{ $fitur->id }}">
								  Edit
								</button>
								<div class="modal fade" id="editFitur{{ $fitur->id }}" tabindex="-1" role="dialog"
								aria-labelledby="editFitur{{ $fitur->id }}Label" aria-hidden="true">
								  <div class="modal-dialog" role="document">
								    <div class="modal-content">
								      <div class="modal-header">
								        <h5 class="modal-title text-capitalize">
													Ubah Uraian Pekerjaan {{ $fitur->GetHarga->tingkat }}
												</h5>
								        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
								      </div>
								      <div class="modal-body">
								        <form action="{{ route('admin.fitur.update', $fitur->id) }}" id="editFitur{{ $fitur->id }}" method="post">
								        	@csrf @method("PUT")
													<input type="hidden" name="harga_id" value="{{ $fitur->GetHarga->id }}">
													<input type="hidden" name="menu" value="{{ $fitur->menu }}">
													@if ($fitur->menu != 'besar')
														<div class="form-group form-row mx-0">
															<p class="col-12">Ada</p>
															@if ($fitur->ada == 'iya')
																<div class="custom-control custom-radio custom-control-inline">
																	<input type="radio" id="iya" name="menu" class="custom-control-input" value="iya" checked>
																	<label class="custom-control-label" for="iya">Iya</label>
																</div>
																<div class="custom-control custom-radio custom-control-inline">
																	<input type="radio" id="tidak" name="menu" class="custom-control-input" value="tidak">
																	<label class="custom-control-label" for="tidak">Tidak</label>
																</div>
															@else
																<div class="custom-control custom-radio custom-control-inline">
																	<input type="radio" id="iya" name="menu" class="custom-control-input" value="iya">
																	<label class="custom-control-label" for="iya">Iya</label>
																</div>
																<div class="custom-control custom-radio custom-control-inline">
																	<input type="radio" id="tidak" name="menu" class="custom-control-input" value="tidak" checked>
																	<label class="custom-control-label" for="tidak">Tidak</label>
																</div>
															@endif
														</div>
													@else
														<input type="hidden" name="ada" value="{{ $fitur->ada }}">
													@endif
													<div class="form-group">
														<label for="namaFitur">Nama Fitur</label>
														<input type="text" id="namaFitur" class="form-control" name="fitur" value="{{ $fitur->fitur }}">
													</div>
													<div class="custom-control d-inline-block custom-checkbox" style="margin-top: 7px;">
														@if ($fitur->tampilkan == 'iya')
															<input type="checkbox" name="ubahTampilkan" class="custom-control-input" id="tampilkanFitur{{ $fitur->id }}" checked>
														@else
															<input type="checkbox" name="ubahTampilkan" class="custom-control-input" id="tampilkanFitur{{ $fitur->id }}">
														@endif
														<label class="custom-control-label" for="tampilkanFitur{{ $fitur->id }}">Tampilkan</label>
													</div>
													<button type="submit" class="float-right btn btn-success">Simpan Perubahan</button>
								        </form>
								      </div>
								    </div>
								  </div>
								</div>

								<form action="{{ route('admin.fitur.destroy', $fitur->id) }}" method="post">
									@csrf @method("DELETE")
									<button type="submit" class="btn btn-link text-danger">Hapus</button>
								</form>
							</div>
						@endforeach
					</div>
				</div>
		  </div>
		@endforeach
	</div>
	<div class="row mx-0 justify-content-center mt-4">
		<button type="button" class="btn btn-link" data-toggle="modal" data-target="#tambahPekerjaan">
		  <i class="fas fa-plus mr-2"></i> Tambah Uraian Pekerjaan
		</button>
		<div class="modal fade" id="tambahPekerjaan" tabindex="-1" role="dialog" aria-labelledby="tambahPekerjaanLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-body">
		        <form action="{{ route('admin.fitur.store') }}" method="post">
							<div class="modal-header">
								<h5 class="modal-title">Tambah Uraian Pekerjaan</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							@csrf
							<div class="form-group">
								<select class="custom-select" name="kategori" style="-webkit-appearance: none;">
								  <option selected disabled>Kategori Harga</option>
									@foreach ($price as $kategoriHarga)
									<option class="text-capitalize" value="{{ $kategoriHarga->id }}">{{ $kategoriHarga->tingkat }}</option>
									@endforeach
									<button type="submit" class="btn btn-success">Tambah Uraian Pekerjaan</button>
								</select>
							</div>
							<div class="form-group">
								<input type="text" class="form-control" placeholder="Nama Fitur" name="fitur">
							</div>
							<div class="form-group">
								<p>Ada</p>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" id="iya" name="ada" class="custom-control-input" value="iya" checked>
									<label class="custom-control-label" for="iya">Iya</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" id="tidak" name="ada" class="custom-control-input" value="tidak">
									<label class="custom-control-label" for="tidak">Tidak</label>
								</div>
							</div>
							<div class="form-group">
								<p>Kategori Menu</p>
								<div class="custom-control custom-radio custom-control-inline">
								  <input type="radio" id="menuBiasa" name="menu" class="custom-control-input" value="biasa" checked>
								  <label class="custom-control-label" for="menuBiasa">Menu Biasa</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
								  <input type="radio" id="menuSub" name="menu" class="custom-control-input" value="sub">
								  <label class="custom-control-label" for="menuSub">Sub Menu</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
								  <input type="radio" id="menuBesar" name="menu" class="custom-control-input" value="besar">
								  <label class="custom-control-label" for="menuBesar">Menu Besar</label>
								</div>
							</div>
							<div class="custom-control d-inline-block custom-checkbox" style="margin-top: 7px;">
								<input type="checkbox" name="tampilkan" class="custom-control-input" value="iya" id="tambahTampilkan" checked>
								<label class="custom-control-label" for="tambahTampilkan">Tampilkan</label>
							</div>
							<button type="submit" class="btn btn-success float-right">Tambah Uraian</button>
		        </form>
		      </div>
		    </div>
		  </div>
		</div>
	</div>
</main>
@endsection

@section('script')
<script>
	$(document).ready(function() {
		$('.message-session').delay(3000).slideUp(600);
		$("#harga-tabs .nav-item:first-of-type").addClass("active").attr("aria-selected", "true");
		$(".tab-content .tab-pane:first-of-type").addClass("active show");
		$(".self-tampilkan input").change(function() {
			if ($(".self-tampilkan input").is(":checked")) {
				$(this).parents("form").submit();
			}
		});
	});
</script>
@endsection
