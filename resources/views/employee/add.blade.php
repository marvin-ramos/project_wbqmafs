@extends('layouts.admin-master')

@section('title')
Dashboard
@endsection

@section('content')
<section class="section">
  <div class="section-header">
    <h1>Admin Dashboard</h1>
  </div>

  <div class="section-body">
  	<div class="row mt-sm-4">
	    <div class="col-12 col-md-12 col-lg-12">
	      <div class="card">
	        <form action="{{ url('admin/employee/store') }}" method="POST" class="needs-validation" novalidate="" enctype="multipart/form-data">
	          <div class="card-header">
	            <h4>Register Employee</h4>
	          </div>
	          <div class="card-body">
	              {{ csrf_field() }}
	              <div class="row">
	                <div class="form-group col-md-5 col-12">                    
	                  <label for="firstname">{{ __('Firstname') }}</label>
	                  <input type="text" id="firstname" name="firstname" class="form-control  @error('firstname') is-invalid @enderror" value="{{ old('firstname') }}">
	                  @error('firstname')
	                    <span class="invalid-feedback" role="alert">
	                      <strong>{{ $message }}</strong>
	                    </span>
	                  @enderror
	                </div>
	                <div class="form-group col-md-5 col-12">
	                  <label for="lastname">{{ __('Lastname') }}</label>
	                  <input type="text" name="lastname" id="lastname" class="form-control @error('lastname') is-invalid @enderror" value="{{ old('lastname') }}">
	                  @error('lastname')
	                    <span class="invalid-feedback" role="alert">
	                      <strong>{{ $message }}</strong>
	                    </span>
	                  @enderror
	                </div>
	                <div class="form-group col-md-2 col-12">
	                  <label for="middlename">{{ __('M.I.') }}</label>
	                  <input type="text" name="middlename" class="form-control @error('middlename') is-invalid @enderror" value="{{ old('middlename') }}" id="middlename">
	                  @error('middlename')
	                    <span class="invalid-feedback" role="alert">
	                      <strong>{{ $message }}</strong>
	                    </span>
	                  @enderror
	                </div>
	              </div>
	              <div class="row">
	                <div class="form-group col-md-5 col-12">
	                  <div class="form-group">
	                    <label for="gender_id">{{ __('Gender') }}</label>
	                    <select class="form-control @error('gender_id') is-invalid @enderror" name="gender_id" id="gender_id">
	                        <option  value="" disabled selected>Select Gender</option>
	                      @foreach($genderData as $gender)
	                        <option value="{{ $gender->id }}">{{ $gender->gender }}</option>
	                      @endforeach
	                    </select>
	                    @error('gender_id')
	                      <span class="invalid-feedback" role="alert">
	                        <strong>{{ $message }}</strong>
	                      </span>
	                    @enderror
	                  </div>
	                </div>
	                <div class="form-group col-md-2 col-12">
	                  <label for="age">{{ __('Age') }}</label>
	                  <input type="text" class="form-control @error('age') is-invalid @enderror" value="{{ old('age') }}" id="age" name="age">
	                  @error('age')
	                    <span class="invalid-feedback" role="alert">
	                      <strong>{{ $message }}</strong>
	                    </span>
	                  @enderror
	                </div>
	                <div class="form-group col-md-5 col-12">
	                  <label for="birthday">{{ __('Birthdate') }}</label>
	                  <input type="date" name="birthday" id="birthday" class="form-control @error('birthdate') is-invalid @enderror" value="{{ old('birthday') }}">
	                  @error('birthday')
	                    <span class="invalid-feedback" role="alert">
	                      <strong>{{ $message }}</strong>
	                    </span>
	                  @enderror
	                </div>
	              </div>
	               <div class="row">
	                <div class="form-group col-md-7 col-12">
	                  <label for="contact_number">{{ __('Contact Number') }}</label>
	                  <input type="text" id="contact_number" name="contact_number" class="form-control @error('contact_number') is-invalid @enderror" value="{{ old('contact_number') }}">
	                  @error('contact_number')
	                    <span class="invalid-feedback" role="alert">
	                      <strong>{{ $message }}</strong>
	                    </span>
	                  @enderror
	                </div>
	                <div class="form-group col-md-5 col-12">
	                  <div class="form-group">
	                    <label for="status_id">{{ __('Civil Status') }}</label>
	                    <select class="form-control @error('status_id') is-invalid @enderror" name="status_id" id="status_id">
	                      <option  value="" disabled selected>Select Civil Status</option>
	                      @foreach($statusData as $status)
	                        <option value="{{ $status->id }}">{{ $status->status }}</option>
	                      @endforeach
	                    </select>
	                    @error('status_id')
	                    <span class="invalid-feedback" role="alert">
	                      <strong>{{ $message }}</strong>
	                    </span>
	                  @enderror
	                  </div>
	                </div>
	              </div>
	              <div class="row">
	                <div class="form-group col-md-12 col-12">
	                  <label for="address">{{ __('Address') }}</label>
	                  <textarea name="address" id="address" class="form-control summernote-simple @error('address') is-invalid @enderror">{{ old('address') }}</textarea>
	                  @error('address')
	                    <span class="invalid-feedback" role="alert">
	                      <strong>{{ $message }}</strong>
	                    </span>
	                  @enderror
	                </div>
	              </div>
	          </div>
	          <div class="card-footer text-right">
	            <div class="row">
	              <div class="form-group col-lg-12 col-md-12 col-12">
	                <input type="file" name="profile" class="form-control">
	              </div>
	            </div>
	            <div class="row">
	              <div class="form-group col-lg-2 col-md-12 col-12">
	                <button type="submit" class="btn btn-primary pr" style="width:100%;">Register</button>
	              </div>
	              <div class="form-group col-md-2 col-12">
	                <script src="{{ asset('js/sweetalert.min.js') }}"></script>
	                <a class="btn btn-danger" style="width:100%;color: white;" onclick="return confirmation()">Cancel</a>
	                <script type="text/javascript">
	                  function confirmation() {
	                    swal({
	                      title: "Alert",
	                      text: "Are you sure you want to cancel Registration of Employee",
	                      icon: "warning",
	                      buttons: true,
	                      dangerMode: true,
	                    }).then(okay => {
	                      if(okay) {
	                        window.location.href = "{{ route('table.employee') }}";
	                      }
	                    });
	                  }
	                </script>
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
