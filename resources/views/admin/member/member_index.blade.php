@extends('temp.main')

@section('title-page', 'E-Bina | Admin - Member')

@section('css')
<link rel="stylesheet" href="{{ asset('plugins/datatables/dataTables.bootstrap4.css') }}">
@endsection

@section ('title-body', 'Member')

@section('content')
	@if (Session::has('success_message') || Session::has('failed_message'))
		<div class="col-12 message-session">
			<div class="alert alert-{{(Session::has('success_message'))? 'success' : 'danger'}} text-center">{{(Session::has('success_message'))? Session::get('success_message') : Session::get('failed_message')}}</div>
		</div>
	@endif
	<div class="col-md-4 col-sm-6 col-12">
		<div class="info-box">
			<span class="info-box-icon bg-info"><i class="fa fa-users"></i></span>

			<div class="info-box-content">
				<span class="info-box-text">Active Member(s)</span>
				<span class="info-box-number">{{ $jumlah_active_member }}</span>
			</div>
			<!-- /.info-box-content -->
		</div>
		<!-- /.info-box -->
	</div>
	<div class="col-md-4 col-sm-6 col-12">
		<div class="info-box">
			<span class="info-box-icon bg-danger"><i class="fa fa-users"></i></span>

			<div class="info-box-content">
				<span class="info-box-text">Unactive Member(s)</span>
				<span class="info-box-number">{{ $jumlah_unactive_member }}</span>
			</div>
			<!-- /.info-box-content -->
		</div>
		<!-- /.info-box -->
	</div>
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<div class="card-title text-center mb-4">
					<h3>List Member</h3>
					<button type="button" class="btn btn-link text-info" data-toggle="modal" data-target="#tambahMember">
					  <i class="nav-icon fa fa-users"></i> Tambah Member
					</button>
					<div class="modal fade" id="tambahMember" tabindex="-1" role="dialog" aria-labelledby="tambahMemberLabel" aria-hidden="true">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h5 class="modal-title" id="exampleModalLabel">Tambah Member</h5>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">&times;</span>
					        </button>
					      </div>
					      <div class="modal-body">
					        <form class="" action="{{ route('admin.member.store') }}" method="post">
					        	@csrf
										<div class="form-group">
											<input type="text" class="form-control" name="name" placeholder="Name">
										</div>
										<div class="form-group">
											<input type="text" class="form-control" name="noTelp" placeholder="No Telephone">
										</div>
										<div class="form-group">
											<input type="email" class="form-control" name="email" placeholder="Email">
										</div>
										<div class="form-group">
											<div class="custom-file">
											  <input type="file" class="custom-file-input" name="profile_picture" id="profile_picture">
											  <label class="custom-file-label text-left" for="profile_picture" style="font-size: 16px;">Upload Profil Picture</label>
											</div>
										</div>
										<div class="form-group">
											<input type="password" class="form-control" name="password" placeholder="Password">
										</div>
										<button type="submit" class="btn btn-success">Tambah Member</button>
					        </form>
					      </div>
					    </div>
					  </div>
					</div>
				</div>
				<div class="table-responsive">
					<table class="table table-bordered table-hover datatables">
						<thead>
							<tr>
								<th>No</th>
								<th>Id Member</th>
								<th>Name</th>
								<th>No Whatsapp</th>
								<th>Email</th>
								<th>Status</th>
								<th class="text-left">Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($member as $key => $value)
							<tr>
								<td>{{ ($key+1) }}</td>
								<td>{{ $value->code }}</td>
								<td>{{ $value->name }}</td>
								<td>{{ $value->noTelp }}</td>
								<td>{{ $value->email }}</td>
								@if ($value->status == 'active')
								<td>
									<span class="badge badge-success">On</span>
								</td>
								<td>
									{{-- <a href="" class="btn btn-warning"><i class="fa fa-edit"></i>Edit</a> --}}
									<form action="{{ route('admin.member.destroy', ['id' => $value->id]) }}" method="POST">
										@csrf
										@method('DELETE')
										<button class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="bottom" title="Turn off member"><i class="fa fa-power-off"></i></button>
									</form>
								</td>
								@else
								<td>
									<span class="badge badge-secondary">Off</span>
								</td>
								<td>
									<form action="{{ route('admin.member.activating', ['id' => $value->id]) }}" method="POST">
										@csrf
										@method('PUT')
										<button class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="bottom" title="Turn on member"><i class="fa fa-power-off"></i></button>
									</form>
								</td>
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
		bsCustomFileInput.init();
		$('input, textarea, select').prop("required", true);
		$('.datatables').dataTable();
		$('.message-session').delay(3000).slideUp(600);
		$('[data-toggle="tooltip"]').tooltip();
	});
</script>
@endsection
