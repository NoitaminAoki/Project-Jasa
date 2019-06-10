@extends('temp.main')

@section('title-page') E-Bina | Admin - Profil  @endsection

@section('css')
	<style media="screen">
		label[for='upload_profil'] .fa-upload {
			position: absolute;
			bottom: 0;
			right: 0;
		}
		label[for='upload_profil'] {
			cursor: pointer;
		}
	</style>
@endsection

@section ('title-body') Profil @endsection

@section('content')
@if (Session::has('success_message') || Session::has('failed_message'))
<div class="col-12 message-session">
	<div class="alert alert-{{(Session::has('success_message'))? 'success' : 'danger'}} text-center">
		{{(Session::has('success_message'))? Session::get('success_message') : Session::get('failed_message')}}
	</div>
</div>
@endif
<div class="col-md-3">

	<!-- Profile Image -->
	<div class="card card-primary card-outline">
		<div class="card-body box-profile">
			<div class="text-center">
				<img class="profile-user-img img-fluid img-circle" id="picture_profile"
				src="{{ Storage::url(Auth::guard('web')->user()->profile_picture) }}" alt="User profile picture">
			</div>

			<h3 class="profile-username text-center">{{ Auth::guard('web')->user()->name }}</h3>

			<p class="text-muted text-center">Admin</p>

			<ul class="list-group list-group-unbordered mb-3">
				<li class="list-group-item">
					<b>Member</b> <a class="float-right">322</a>
				</li>
				<li class="list-group-item">
					<b>Klien</b> <a class="float-right">1,322</a>
				</li>
			</ul>
		</div>
		<!-- /.card-body -->
	</div>
	<!-- /.card -->
</div>
<!-- /.col -->
<div class="col-md-9">
	<div class="card">
		<div class="card-header p-2">
			<ul class="nav nav-pills">
				<li class="nav-item">
					<a class="nav-link active" href="#aboutMe" data-toggle="tab">About Me</a>
				</li>
				<li class="nav-item">
					<a class="nav-link"
					href="#settings" data-toggle="tab">Settings</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#changePassword" data-toggle="tab">
						Change Password
					</a>
				</li>
			</ul>
		</div><!-- /.card-header -->
		<div class="card-body">
			<div class="tab-content">
				<div class="tab-pane active" id="aboutMe">
					<div class="col-12">
						<strong class="d-block mb-1"><i class="fa fa-envelope mr-1"></i> E-Mail</strong>
						<span class="text-muted d-block mb-2">{{ Auth::guard('web')->user()->email }}</span>
						<strong class="d-block mb-2" title="upload your profile picture"><i class="fas fa-upload"></i> Change Profile Picture</strong>
						<form id="profile_update" action="{{ route('admin.profil.picture_update') }}" method="POST" enctype="multipart/form-data">
							@csrf @method('PUT')
							<div class="custom-file" title="upload your profile picture">
						    <input type="file" class="custom-file-input" name="profile_picture" id="profile_picture" aria-describedby="profile_picture">
						    <label class="custom-file-label" for="profile_picture">Choose To Change Your Profile</label>
						  </div>
						</form>
					</div>
				</div>
				<!-- /.tab-pane -->
				<div class="tab-pane" id="settings">
					<form class="form-horizontal" method="POST" action="{{ route('admin.profil.update', ['profil' => 'update']) }}">
						@csrf
						@method('PUT')
						<div class="form-group">
							<label for="name" class="col-sm-4 control-label">Name</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="name" name="name" placeholder="Name"
								value="{{ Auth::guard('web')->user()->name }}" required>
								@if ($errors->has('name'))
								<span class="text-danger">
									<strong>{{ $errors->first('name') }}</strong>
								</span>
								@endif
							</div>
						</div>
						<div class="form-group">
							<label for="email" class="col-sm-4 control-label">Email</label>
							<div class="col-sm-10">
								<input type="email" class="form-control" id="email" name="email" placeholder="Email"
								value="{{ Auth::guard('web')->user()->email }}" required>
								@if ($errors->has('email'))
								<span class="text-danger">
									<strong>{{ $errors->first('email') }}</strong>
								</span>
								@endif
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<button type="submit" class="btn btn-danger">Update</button>
							</div>
						</div>
					</form>
				</div>
				<!-- /.tab-pane -->
				<div class="tab-pane" id="changePassword">
					<form class="form-horizontal" method="POST" action="{{ route('admin.profil.change.password') }}">
						@csrf
						@method('PUT')
						<div class="form-group">
							<label for="password" class="col-sm-4 control-label">New Password</label>

							<div class="col-sm-10">
								<input type="password" class="form-control" id="password" name="password" placeholder="New Password" required>

								@if ($errors->has('password'))
								<span class="text-danger">
									<strong>{{ $errors->first('password') }}</strong>
								</span>
								@endif
							</div>
						</div>
						<div class="form-group">
							<label for="password-confirm" class="col-sm-4 control-label">Confirm New Password</label>
							<div class="col-sm-10">
								<input type="password" class="form-control" id="password-confirm" name="password_confirmation"
								placeholder="Confirm New Password" required>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<button type="submit" class="btn btn-danger">Submit</button>
							</div>
						</div>
					</form>
				</div>
				<!-- /.tab-pane -->
			</div>
			<!-- /.tab-content -->
		</div><!-- /.card-body -->
	</div>
	<!-- /.nav-tabs-custom -->
</div>
<!-- /.col -->
@endsection

@section('script')
	<script src="{{ asset('plugins/bootstrap/js/bs-inputfile.js') }}" charset="utf-8"></script>
	<script>
		$(document).ready(function() {
			bsCustomFileInput.init();
			$('.message-session').delay(3000).slideUp(600);
			function readURL(input) {
				if (input.files && input.files[0]) {
						var reader = new FileReader();

						reader.onload = function (e) {
								$('#picture_profile').attr('src', e.target.result);
						}
						reader.readAsDataURL(input.files[0]);
				}
			}
			$("#profile_picture").change(function(){
					readURL(this);
			});
			$("#profile_picture").change(function() {
				$("#profile_update").submit();
			});
		});
	</script>
@endsection
