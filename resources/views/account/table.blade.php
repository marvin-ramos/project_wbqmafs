@extends('layouts.admin-master')

@section('title')
Account
@endsection

@section('content')
<section class="section">
  <div class="section-header">
    <h1 style="text-transform: uppercase;">Account Details</h1>
  </div>

  <div class="section-body">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-12 col-sm-12">
        <div class="card">
          <div class="card-header">
            <h4>Account Details</h4>
          </div>
          <div class="card-body">
            <table class="table" style="margin-top: 10px;">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Firstname</th>
                  <th scope="col">Lastname</th>
                  <th scope="col">Middlename</th>
                  <th scope="col">Picture</th>
                  <th scope="col" style="text-align: center;">Action</th>
                </tr>
              </thead>
              <tbody>                
                @foreach($employeeTable as $employee)
                <tr>
                  <td scope="row">{{ $employee->id}}</td>
                  <td>{{ $employee->firstname }}</td>
                  <td>{{ $employee->lastname }}</td>
                  <td>{{ $employee->middlename }}</td>
                  <td><img src="{{ URL::to($employee->profile) }}" style="width: 50px;height: 50px;border-radius: 50%;"></td>
                  <td style="text-align: center;">
                    <a href="{{ URL::to('/admin/account/add/'.$employee->id) }}" class="btn btn-icon icon-right btn-success">
                      <i class="fa fa-plus"></i> Add
                    </a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
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