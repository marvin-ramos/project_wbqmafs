@extends('layouts.admin-master')

@section('title')
Edit Employee
@endsection

@section('content')
<section class="section">
	<div class="section-header">
	    <h1>Update Details</h1>
	</div>

  	<div class="section-body">
	  	<div class="row mt-sm-4">
		    <div class="col-8 col-md-8 col-lg-8">
		      <div class="card">
		          <div class="card-header">
		            <h4>Update Profile</h4>
		          </div>
		          <form method="post" class="needs-validation" novalidate="" action="" enctype="multipart/form-data">
		            <div class="card-body">
		                <div class="row">
		                  <div class="form-group col-md-5 col-12">
		                    <label for="firstname">{{ __('Firstname') }}</label>
		                    <input type="text" name="firstname" id="firstname" class="form-control @error('firstname') is-invalid @enderror" value="{{ $employeeData->firstname }}" disabled="">
		                    @error('address')
		                      <span class="invalid-feedback" role="alert">
		                        <strong>{{ $message }}</strong>
		                      </span>
		                    @enderror
		                  </div>
		                  <div class="form-group col-md-5 col-12">
		                    <label for="lastname">{{ __('Lastname') }}</label>
		                    <input type="text" name="lastname" id="lastname" class="form-control @error('lastname') is-invalid @enderror" value="{{ $employeeData->lastname }}" disabled="">
		                    @error('address')
		                      <span class="invalid-feedback" role="alert">
		                        <strong>{{ $message }}</strong>
		                      </span>
		                    @enderror
		                  </div>
		                  <div class="form-group col-md-2 col-12">
		                    <label for="middlename">{{ __('M.I.') }}</label>
		                    <input type="text" name="middlename" id="middlename" class="form-control @error('middlename') is-invalid @enderror" value="{{ $employeeData->middlename }}" disabled="">
		                    @error('address')
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
		                      <select name="gender_id" id="gender_id" class="form-control @error('gender_id') is-invalid @enderror" disabled="">
		                        <option  value="{{ $employeeData->gender_id }}">{{ $employeeData->gender }}</option>
		                        @foreach($genderData as $gender)
		                          <option value="{{ $gender->id }}">{{ $gender->gender }}</option>
		                        @endforeach
		                      </select>
		                      @error('address')
		                        <span class="invalid-feedback" role="alert">
		                          <strong>{{ $message }}</strong>
		                        </span>
		                      @enderror
		                    </div>
		                  </div>
		                  <div class="form-group col-md-2 col-12">
		                    <label for="age">{{ __('Age') }}</label>
		                    <input type="text" name="age" id="age" class="form-control @error('age') is-invalid @enderror" value="{{ $employeeData->age }}" disabled="">
		                    @error('address')
		                      <span class="invalid-feedback" role="alert">
		                        <strong>{{ $message }}</strong>
		                      </span>
		                    @enderror
		                  </div>
		                  <div class="form-group col-md-5 col-12">
		                    <div class="form-group">
		                      <label for="birthday">Birthday</label>
		                      <input type="date" class="form-control @error('birthday') is-invalid @enderror" name="birthday" id="birthday" placeholder="MM/DD/YYYY" value="{{ $employeeData->birthday }}" disabled="">
		                      @error('address')
		                        <span class="invalid-feedback" role="alert">
		                          <strong>{{ $message }}</strong>
		                        </span>
		                      @enderror
		                    </div>
		                  </div>
		                </div>
		                 <div class="row">
		                  <div class="form-group col-md-7 col-12">
		                    <label for="contact_number">{{ __('Contact Number') }}</label>
		                    <input type="text" class="form-control @error('contact_number') is-invalid @enderror" name="contact_number" id="contact_number" value="{{ $employeeData->contact_number }}" disabled="">
		                    @error('address')
		                      <span class="invalid-feedback" role="alert">
		                        <strong>{{ $message }}</strong>
		                      </span>
		                    @enderror
		                  </div>
		                  <div class="form-group col-md-5 col-12">
		                    <div class="form-group">
		                      <label for="status_id">{{ __('Civil Status') }}</label>
		                      <select class="form-control @error('status_id') is-invalid @enderror" id="status_id" name="status_id" disabled="">
		                        <option  value="{{ $employeeData->status_id }}">{{ $employeeData->status }}</option>
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
		                    <textarea class="form-control summernote-simple @error('address') is-invalid @enderror" name="address" id="address" style="height: 100%;" disabled="">{{ $employeeData->address }}</textarea>
		                    @error('address')
		                      <span class="invalid-feedback" role="alert">
		                        <strong>{{ $message }}</strong>
		                      </span>
		                    @enderror
		                  </div>
		                </div>
		            </div>
		          </form>
		      </div>
		    </div>
		    <div class="col-4 col-md-4 col-lg-4">
		      <div class="card">
		        <div class="card-header">
		          <h4>Profile Picture</h4>
		        </div>
		        <div class="card card-user">
		          <div class="card-body" style="text-align:center;">
		            <div class="author">
		              <a href="#">
		                <img class="avatar border-gray" id="staffPic" style="width:200px;height:200px;" src="{{ URL::to($employeeData->profile) }}">
		                <input type="hidden" name="old_profile" value="{{ $employeeData->profile }}">
		                <script type="text/javascript">
		                  function previewFile(input) {
		                    var file = $("input[type=file]").get(0).files[0];
		                    if(file) {
		                      var reader = new FileReader();
		                      reader.onload = function() {
		                        $("#staffPic").attr("src", reader.result);
		                      }
		                      reader.readAsDataURL(file);
		                    }
		                  }
		                </script>
		              </a>
		            </div>
		          </div>
		        </div>
		        <div class="form-group col-lg-12 col-md-12 col-12">
					<script src="{{ asset('js/sweetalert.min.js') }}"></script>
					<a class="btn btn-danger" style="width:100%;color:white;" onclick="return confirmation()">Back</a>
					<script type="text/javascript">
						function confirmation() {
						  swal({
						    title: "Alert",
						    text: "Are you sure you want to go back ??",
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
		</div>
  	</div>
</section>
@endsection