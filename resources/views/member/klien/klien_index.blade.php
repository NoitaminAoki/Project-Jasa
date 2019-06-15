@extends('temp.main')

@section('title-page', 'E-Bina | Member - Klien')

@section('css')
<link rel="stylesheet" href="{{ asset('plugins/datatables/dataTables.bootstrap4.css') }}">
@endsection

@section ('title-body', 'Klien')

@section('content')
@if (Session::has('success_message') OR Session::has('failed_message'))
<div class="col-12 message-session">
	<div class="alert alert-{{(Session::has('success_message'))? 'success' : 'danger'}} text-center">
		{{ (Session::has('success_message'))? Session::get('success_message') : Session::get('failed_message') }}
	</div>
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
							<th>Status</th>
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
							@if ($value->status == "pending")
							<td><small class="badge badge-secondary text-uppercase">{{$value->status}}</small></td>
							@elseif ($value->status == "negosiasi")
							<td><small class="badge badge-warning text-uppercase">{{$value->status}}</small></td>
							@elseif ($value->status == "deal")
							<td><small class="badge badge-success text-uppercase">{{$value->status}}</small></td>
							@endif
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
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
	});
</script>
@endsection
