@extends('temp.main')

@section('title-page', 'E-Bina | Admin - Dashboard')

@section('css')
<link rel="stylesheet" href="{{ asset('plugins/datatables/dataTables.bootstrap4.css') }}">
@endsection

@section ('title-body', 'Dashboard')

@section('content')
@if (Session::has('success_message') || Session::has('failed_message'))
<div class="col-12 message-session">
	<div class="alert alert-{{(Session::has('success_message'))? 'success' : 'danger'}} text-center">
		{{ (Session::has('success_message'))? Session::get('success_message') : Session::get('failed_message') }}
	</div>
</div>
@endif
<div class="col-12">
	<div class="card">
		<div class="card-header">
			<h1 class="text-capitalize h3">jumlah member</h1>
		</div>
	  <div class="card-body">
			<div class="row">
				<div class="col-12 col-md-6">
					<div class="info-box">
						<span class="info-box-icon bg-info"><i class="fa fa-users"></i></span>
						<div class="info-box-content">
							<span class="info-box-text">Active Member(s)</span>
							<span class="info-box-number">{{ $memberActive }}</span>
						</div>
					</div>
				</div>
				<div class="col-12 col-md-6">
					<div class="info-box">
						<span class="info-box-icon bg-danger"><i class="fa fa-users"></i></span>
						<div class="info-box-content">
							<span class="info-box-text">Unactive Member(s)</span>
							<span class="info-box-number">{{ $memberUnactive }}</span>
						</div>
					</div>
				</div>
			</div>
	  </div>
	</div>
	<div class="card">
		<div class="card-header">
			<h1 class="text-capitalize h3">Klien</h1>
		</div>
	  <div class="card-body">
			<table class="table table-bordered table-hover datatables">
				<thead>
					<tr>
						<th>Nama Klien</th>
						<th>Email</th>
						<th>Dari Member</th>
						<th class="text-left">Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($klien as $value)
					<tr>
						<td>{{ $value->nama }}</td>
						<td>{{ $value->email }}</td>
						<td>{{ $value->member->name }}</td>
						<td style="width: 90px !important;">
							<a href="{{ route('admin.member.index') }}" class="btn btn-link text-info">Lihat Lebih Lanjut</a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
	  </div>
	</div>
	<div class="card my-3">
		<div class="card-body">
			<h1 class="h3 mb-3">Detail Harga</h1>
			<ul class="list-group">
				@foreach ($price as $harga)
			  <li class="list-group-item d-flex justify-content-between align-items-center">
					<span class="font-weight-bold text-capitalize">{{ $harga->tingkat }}</span> <var>Harga: {{ $harga->harga . 'k' }} IDR</var>
				</li>
				@endforeach
				<a class="btn btn-outline-info align-self-start mx-auto mt-4" href="{{ route('admin.landing-page.index') }}">Lihat Lebih Lanjut</a>
			</ul>
		</div>
	</div>
	<div class="card my-3">
		<div class="card-body">
			<h1 class="h3">Partner</h1>
			<table class="table table-bordered bg-white my-3">
			  <thead>
			    <tr>
			      <th scope="col">Nama Partner</th>
			      <th scope="col">Bekerja Dari Tanggal</th>
			      <th scope="col">Detail Partner</th>
			    </tr>
			  </thead>
			  <tbody>
					@foreach ($partners as $partner)
				    <tr>
					      <td>{{ $partner->nama }}</td>
					      <td>{{ $partner->created_at }}</td>
					      <td><a href="{{ route('admin.partner.index') }}" class="btn btn-link text-info">Lihat Lebih Lanjut</a></td>
				    </tr>
					@endforeach
			  </tbody>
			</table>
		</div>
	</div>
	<div class="card my-3">
		<div class="card-body">
			<h1 class="h3">Bantuan</h1>
			<table class="table table-bordered bg-white my-3 datatables">
			  <thead>
			    <tr>
			      <th scope="col">Dari Email</th>
			      <th scope="col">Subjek</th>
			      <th scope="col">Detail Bantuan</th>
			    </tr>
			  </thead>
			  <tbody>
					@foreach ($support as $bantuan)
				    <tr>
					      <td>{{ $bantuan->email }}</td>
					      <td>{{ $bantuan->subjek }}</td>
					      <td><a href="{{ route('admin.bantuan.index') }}" class="btn btn-link text-info">Lihat Lebih Lanjut</a></td>
				    </tr>
					@endforeach
			  </tbody>
			</table>
		</div>
	</div>
	<div class="card my-3">
		<div class="card-body">
			<h1 class="h3">Aturan</h1>
			<table class="table table-bordered bg-white my-3 datatables">
			  <thead>
			    <tr>
			      <th scope="col">Judul Peraturan</th>
			      <th scope="col">Aksi</th>
			    </tr>
			  </thead>
			  <tbody>
					@foreach ($aturan as $per)
				    <tr>
					      <td>{{ $per->judul }}</td>
					      <td><a href="{{ route('admin.aturan.index') }}" class="btn btn-link text-info">Lihat Lebih Lanjut</a></td>
				    </tr>
					@endforeach
			  </tbody>
			</table>
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
