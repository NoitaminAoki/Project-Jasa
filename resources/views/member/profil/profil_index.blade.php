@extends('temp.main')

@section('title-page') E-Bina | Member - Profil  @endsection

@section('css')
@endsection

@section ('title-body') Profil @endsection

@section('content')
@if (Session::has('success_message') || Session::has('failed_message'))
<div class="col-12 message-session">
	<div class="alert alert-{{(Session::has('success_message'))? 'success' : 'danger'}} text-center">
		{{(Session::has('success_message'))? Session::get('success_message') : Session::get('failed_message')}}
	</div>
</div>
{{-- <div class="col-12 message-session">
	<div class="card card-{{(Session::has('success_message'))? 'success' : 'danger'}} card-outline">
		<div class="card-header">
			{{(Session::has('success_message'))? Session::get('success_message') : Session::get('failed_message')}}
		</div>
	</div>
</div> --}}
@endif
<div class="col-md-3">
	
	<!-- Profile Image -->
	<div class="card card-primary card-outline">
		<div class="card-body box-profile">
			<div class="text-center">
				<img class="profile-user-img img-fluid img-circle"
				src="../../dist/img/avatar5.png"
				alt="User profile picture">
			</div>
			
			<h3 class="profile-username text-center">{{ Auth::guard('member')->user()->name }}</h3>
			
			<p class="text-muted text-center">Member</p>
			
			<ul class="list-group list-group-unbordered mb-3">
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
				<li class="nav-item"><a class="nav-link {{ ($errors->any())? '' : 'active' }}" href="#aboutMe" data-toggle="tab">About Me</a></li>
				<li class="nav-item"><a class="nav-link {{ ($errors->has('name') || $errors->has('noTelp') || $errors->has('email'))? 'active' : '' }}" href="#settings" data-toggle="tab">Settings</a></li>
				<li class="nav-item"><a class="nav-link {{ ($errors->has('password'))? 'active' : '' }}" href="#changePassword" data-toggle="tab">Change Password</a></li>
			</ul>
		</div><!-- /.card-header -->
		<div class="card-body">
			<div class="tab-content">
				<div class="tab-pane {{ ($errors->any())? '' : 'active' }}" id="aboutMe">
					<div class="col-12">
						<strong># My ID</strong>
						
						<p class="text-muted">
							{{ Auth::guard('member')->user()->code }}
						</p>
						
						<hr>
						<strong><i class="fa fa-phone mr-1"></i> No Whatsapp</strong>
						
						<p class="text-muted">
							{{ Auth::guard('member')->user()->noTelp }}
						</p>
						
						<hr>
						
						<strong><i class="fa fa-envelope mr-1"></i> E-Mail</strong>
						
						<p class="text-muted">
							{{ Auth::guard('member')->user()->email }}
						</p>
					</div>
				</div>
				<!-- /.tab-pane -->
				<div class="tab-pane {{ ($errors->has('name') || $errors->has('noTelp') || $errors->has('email'))? 'active' : '' }}" id="settings">
					<form class="form-horizontal" method="POST" action="{{ route('member.profil.update', ['profil' => 'update']) }}">
						@csrf
						@method('PUT')
						<div class="form-group">
							<label for="name" class="col-sm-4 control-label">Name</label>
							
							<div class="col-sm-10">
								<input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ Auth::guard('member')->user()->name }}" required>
								
								@if ($errors->has('name'))
								<span class="text-danger">
									<strong>{{ $errors->first('name') }}</strong>
								</span>
								@endif
							</div>
						</div>
						<div class="form-group">
							<label for="noTelp" class="col-sm-4 control-label">No Whatsapp</label>
							
							<div class="col-sm-10">
								<input type="text" class="form-control" id="noTelp" name="noTelp" placeholder="No Whatsapp" value="{{ Auth::guard('member')->user()->noTelp }}" required>
								
								@if ($errors->has('noTelp'))
								<span class="text-danger">
									<strong>{{ $errors->first('noTelp') }}</strong>
								</span>
								@endif
							</div>
						</div>
						<div class="form-group">
							<label for="email" class="col-sm-4 control-label">Email</label>
							
							<div class="col-sm-10">
								<input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{ Auth::guard('member')->user()->email }}" required>
								
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
				<div class="tab-pane {{ ($errors->has('password'))? 'active' : '' }}" id="changePassword">
					<form class="form-horizontal" method="POST" action="{{ route('member.profil.change.password') }}">
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
								<input type="password" class="form-control" id="password-confirm" name="password_confirmation" placeholder="Confirm New Password" required>
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
<script>
	$(document).ready(function() {
		$('.message-session').delay(3000).slideUp(600);
	});
</script>
@endsection