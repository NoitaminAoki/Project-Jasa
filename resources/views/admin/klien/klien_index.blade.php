@extends('temp.main')

@section('title-page', 'E-Bina | Admin - Klien')

@section('css')
<link rel="stylesheet" href="{{ asset('plugins/datatables/dataTables.bootstrap4.css') }}">
@endsection

@section ('title-body', 'Klien')

@section('content')
@if (Session::has('success_message') || Session::has('failed_message'))
<div class="col-12 message-session">
	<div class="alert alert-{{(Session::has('success_message'))? 'success' : 'danger'}} text-center">{{(Session::has('success_message'))? Session::get('success_message') : Session::get('failed_message')}}</div>
</div>
@endif
<div class="col-md-3 col-sm-6 col-12">
	<div class="info-box bg-success-gradient">
		<span class="info-box-icon"><i class="fa fa-money-bill-wave-alt"></i></span>

		<div class="info-box-content">
			<span class="info-box-text">Pendapatan</span>
			<span class="info-box-number">Rp {{number_format($pendapatan, 0, ',', '.')}}</span>

			<div class="progress">
				<div class="progress-bar" style="width: {{$percentage['pendapatan']}}%"></div>
			</div>
			<span class="progress-description">
				{{(is_float($percentage['pendapatan']))? number_format((float)$percentage['pendapatan'], 1) : $percentage['pendapatan']}}% from total
			</span>
		</div>
		<!-- /.info-box-content -->
	</div>
	<!-- /.info-box -->
</div>
<div class="col-md-3 col-sm-6 col-12">
	<div class="info-box bg-warning-gradient">
		<span class="info-box-icon"><i class="fa fa-money-bill-wave-alt"></i></span>

		<div class="info-box-content">
			<span class="info-box-text">Potensi Pendapatan</span>
			<span class="info-box-number">Rp {{number_format($potensi_pendapatan, 0, ',', '.')}}</span>

			<div class="progress">
				<div class="progress-bar" style="width: {{$percentage['potensi_pendapatan']}}%"></div>
			</div>
			<span class="progress-description">
				{{(is_float($percentage['potensi_pendapatan']))? number_format((float)$percentage['potensi_pendapatan'], 1) : $percentage['potensi_pendapatan']}}% from total
			</span>
		</div>
		<!-- /.info-box-content -->
	</div>
	<!-- /.info-box -->
</div>
<div class="col-12">
	<div class="card">
		<div class="card-body">
			<div class="card-title text-center">List Member</div>
			<div class="card-subtitle text-center">lorem ipsum dolor set amet</div>
			<div class="table-responsive">
				<table class="table table-bordered table-hover datatables">
					<thead>
						<tr>
							<th>No</th>
							<th>Name</th>
							<th>Tempat Tinggal</th>
							<th>No Whatsapp</th>
							<th>Email</th>
							<th>Paket Harga</th>
							<th>Member</th>
							<th>Status</th>
							<th class="text-left">Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($klien as $key => $value)
						<tr>
							<td>{{ ($key+1) }}</td>
							<td>{{ $value->nama }}</td>
							<td>{{ $value->tempatTinggal }}</td>
							<td>{{ $value->noTelp }}</td>
							<td>{{ $value->email }}</td>
							<td>{{ $value->harga->tingkat }}</td>
							<td>{{ $value->member->name }}</td>
							@if ($value->status == "pending")
							<td><small class="badge badge-secondary text-uppercase">{{$value->status}}</small></td>
							@elseif ($value->status == "negosiasi")
							<td><small class="badge badge-warning text-uppercase">{{$value->status}}</small></td>
							@elseif ($value->status == "deal")
							<td><small class="badge badge-success text-uppercase">{{$value->status}}</small></td>
							@endif
							<td style="width: 90px !important;">
								<button data-id="{{$value->id}}" data-toggle="custom-modal" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></button>
								<form action="{{ route('admin.klien.destroy', ['id'=>$value->id]) }}" onsubmit="return confirm('are you sure?')" method="POST" style="display: inline-block !important;">
									@csrf
									@method('DELETE')
									<button class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="bottom" title="Delete Klien"><i class="fa fa-trash"></i></button>
								</form>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalEditKlien" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="titleModalEditKlien">Klien</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="javascript:void(0)" id="formEditKlien" method="post">
				<div class="modal-body">
					<div class="row">
						@csrf
						<div class="col-12 mb-3">
							<label>Paket Harga</label>
							<select name="harga" class="form-control" required>
								<option value="" disabled>Paket Yang Kamu Pilih</option>
								@foreach ($price as $item)
								<option value="{{$item->id}}">{{ucwords($item->tingkat)}}</option>
								@endforeach
							</select>
						</div>
						<div class="col-12 mb-3">
							<label>Status</label>
							<select name="status" class="form-control" required>
								<option value="" disabled>Status</option>
								<option value="pending">Pending</option>
								<option value="negosiasi">Negosiasi</option>
								<option value="deal">Deal</option>
							</select>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Update</button>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection

@section('script')
<script src="{{ asset('plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('plugins/datatables/dataTables.bootstrap4.js') }}"></script>
<script>
	$(document).ready(function() {
		$('.datatables').dataTable();
		$('.message-session').delay(3000).slideUp(600);

		$('[data-toggle="custom-modal"]').on('click', function() {
			let getId = $(this).data('id');
			let route = '{{route("admin.klien.editAjax")}}/'+getId;
			let updateRoute = "{{ route('admin.klien.updateAjax') }}/"+getId;
			$.ajax({
				url: route,
				type: "GET",
				dataType: "json",
				success: function (result) {
					let form = $('#formEditKlien');
					form.attr("action", updateRoute);
					$("#titleModalEditKlien").text("Klien "+result.klien.nama);
					$('#formEditKlien select[name="harga"]').val(result.klien.idHarga);
					$('#formEditKlien select[name="status"]').val(result.klien.status);
					$('#modalEditKlien').modal('show');
				},
				error: function (xhr, status, message) {
					alert("Not found!");
				}
			});
		});
	});
</script>
@endsection
