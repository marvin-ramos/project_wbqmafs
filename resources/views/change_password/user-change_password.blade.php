@extends('layouts.user-master')

@section('title')
Dashboard
@endsection

@section('content')
<section class="section">
  <div class="section-header">
    <h1>Admin Dashboard</h1>
  </div>

<div class="section-body">
	<h2 class="section-title">
		Hi, {{ optional($user->employee)->firstname }} {{ optional($user->employee)->lastname }}!
	</h2>
	<p class="section-lead">
		Personal information about yourself on this page.
	</p>

	<div class="row mt-sm-4">
		<div class="col-7 col-md-7 col-lg-7">
			<div class="card">
				<form>
					<div class="card-header">
						<h4>Account Details</h4>
					</div>
					<div class="card-body">
						<div class="row">
						  <div class="form-group col-md-5 col-12">
						    <label for="firstname">First Name</label>
						    <input type="text" class="form-control" name="firstname" id="firstname" value="{{ optional($user->employee)->firstname }}" disabled="">
						  </div>
						  <div class="form-group col-md-5 col-12">
						    <label>Last Name</label>
						    <input type="text" class="form-control" name="lastname" id="lastname" value="{{ optional($user->employee)->lastname }}" disabled="">
						  </div>
						  <div class="form-group col-md-2 col-12">
						    <label for="middlename">M.I.</label>
						    <input type="text" class="form-control" name="middlename" id="middlename" value="{{ optional($user->employee)->middlename }}" disabled="">
						  </div>
						</div>
						<div class="row">
						  <div class="form-group col-md-5 col-12">
						    <div class="form-group">
						      <label for="gender_id">Gender</label>
						      <select id="gender_id" name="gender_id" class="form-control" disabled="">
						        <option>{{ optional($user->employee->gender)->gender }}</option>
						      </select>
						    </div>
						  </div>
						  <div class="form-group col-md-2 col-12">
						    <label for="age">Age</label>
						    <input type="text" id="age" name="age" class="form-control" value="{{ optional($user->employee)->age }}" disabled="">
						  </div>
						  <div class="form-group col-md-5 col-12">
						    <label for="birthday">Date of Birth</label>
						    <input type="date" id="birthday" name="birthday" class="form-control" value="{{ optional($user->employee)->birthday }}" disabled="">
						  </div>
						</div>
						<div class="row">
						  <div class="form-group col-md-7 col-12">
						    <label for="contact_number">Contact Number</label>
						    <input type="text" id="contact_number" name="contact_number" class="form-control" value="{{ optional($user->employee)->contact_number }}" disabled="">
						  </div>
						  <div class="form-group col-md-5 col-12">
						    <div class="form-group">
						      <label for="status_id">Civil Status</label>
						      <select id="status_id" name="status_id" class="form-control" disabled="">
						        <option>{{ optional($user->employee->status)->status }}</option>
						      </select>
						    </div>
						  </div>
						</div>
						<div class="row">
						  <div class="form-group col-md-12 col-12">
						    <label for="address">Address</label>
						    <textarea name="address" id="address" class="form-control summernote-simple" disabled="">{{ optional($user->employee)->address }}</textarea>
						  </div>
						</div>
					</div>
				</form>
			</div>
		</div>
		<div class="col-5 col-md-5 col-lg-5">
			<div class="card">
				<form class="needs-validation" method="POST" action="{{ url('user/edit/password') }}">
					{{ csrf_field() }}
					<div class="card-header">
						<h4>Account Details</h4>
					</div>
					<div class="card-body">
						<div class="row">
						  <div class="form-group col-md-12 col-12 col-lg-12">
						    <label for="email">Email</label>
						    <input type="text" class="form-control" name="firstname" id="firstname" value="{{ Auth::user()->email }}" disabled="">
						  </div>
						</div>
						<div class="row">
						  <div class="form-group col-md-12 col-12 col-lg-12">
						    <label for="current_password">Current Password</label>
						    <input type="password" class="form-control" name="current_password" autocomplete="current_password" id="current_password">
						    @error('current_password')
			                    <span class="invalid-feedback" role="alert">
			                      <strong>{{ $message }}</strong>
			                    </span>
			                @enderror
						  </div>
						</div>
						<div class="row">
						  <div class="form-group col-md-12 col-12 col-lg-12">
						    <label for="new_password">New Password</label>
						    <input type="password" class="form-control" name="new_password" autocomplete="new_password" id="new_password">
						    @error('new_password')
			                    <span class="invalid-feedback" role="alert">
			                      <strong>{{ $message }}</strong>
			                    </span>
			                @enderror
						  </div>
						</div>
						<div class="row">
						  <div class="form-group col-md-12 col-12 col-lg-12">
						    <label for="new_confirm_password">New Confirm Password</label>
						    <input type="password" class="form-control" name="new_confirm_password" autocomplete="new_confirm_password" id="new_confirm_password">
						  </div>
						</div>
                        <div class="row">
                            <div class="form-group col-md-12 col-12 col-lg-12">
                                <button type="submit" class="btn btn-primary" style="width: 100%;">
                                    Update Password
                                </button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12 col-12 col-lg-12">
                            	<a href="#" class="btn btn-danger" style="width: 100%;">Cancel</a>
                            </div>
                        </div>
                    </div>
				</form>
			</div>
		</div>
	</div>
</div>
</section>
@endsection

@section('scripts')
	<script src="{{ asset('js/sweetalert.min.js') }}"></script>
	<script>
		@if(session('success'))
		  swal({
		    title: '{{ session('alertTitle') }}',
		    text:  '{{ session('success') }}',
		    icon:  '{{ session('alertIcon') }}',
		    button: "OK",
		  });
		@endif
	</script>
@endsection