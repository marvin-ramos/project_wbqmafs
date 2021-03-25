@extends('layouts.user-master')

@section('title')
Dashboard
@endsection

@section('content')
<section class="section">
  <div class="section-header">
    <h1>User Dashboard</h1>
  </div>

<div class="section-body">
	<h2 class="section-title">
		Hi, {{ optional($user->employee)->firstname }} {{ optional($user->employee)->lastname }}!
	</h2>
	<p class="section-lead">
		Personal information about yourself on this page.
	</p>

	<div class="row mt-sm-4">
		<div class="col-12 col-md-12 col-lg-5">
			<div class="card profile-widget">
				<div class="profile-widget-header">
					<img alt="image" src="{{ URL::to(($user->employee)->profile) }}" class="rounded-circle profile-widget-picture" style="width:100px;height:100px;border: 10px solid white;">
					<div class="profile-widget-items" style="text-align: left;">
						<div class="profile-widget-item">
						  <div class="profile-widget-item-label"></div>
						  <div class="profile-widget-item-value"></div>
						</div>
					</div>
				</div>
				<div class="profile-widget-description">
					<div class="profile-widget-name">

						{{ optional($user->employee)->firstname }} {{ optional($user->employee)->middlename }} {{ optional($user->employee)->lastname }} 

						<div class="text-muted d-inline font-weight-normal">
							<div class="slash"></div> Hired Employee
						</div>
					</div>

					Hello I'm <span>{{ optional($user->employee)->firstname }} {{ optional($user->employee)->middlename }} {{ optional($user->employee)->lastname }}</span>, <span>{{ optional($user->employee)->age }}</span> yrs old of age <span>{{ optional($user->employee->gender)->gender }}</span> and i live in a wonderful city of <span>{{ optional($user->employee)->address }}</span> where i was born on <span>{{ optional($user->employee)->birthday }}</span>. By the way, i'm <span>{{ optional($user->employee->status)->status }}</span> Please, keep in touch and you can email me at <span>{{ optional($user)->email }}</span> or call me at <span>{{ optional($user->employee)->contact_number }}</span> happy to serve you.
				</div>
			</div>
		</div>
		<div class="col-12 col-md-12 col-lg-7">
			<div class="card">
				<form class="needs-validation">
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