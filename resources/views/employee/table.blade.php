@extends('layouts.admin-master')

@section('title')
Employee
@endsection

@section('content')
<section class="section">
  <div class="section-header">
    <h1 style="text-transform: uppercase;">Employee Details</h1>
  </div>

  <div class="section-body">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-12 col-sm-12">
        <div class="card">
          <div class="card-header">
            <h4>Employee Details</h4>
          </div>
          <div class="card-body">
            <a href="{{ route('employee.add') }}" class="btn btn-icon icon-right btn-success" style="width: 15%;">Add</a>
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
                  <th scope="row">{{ $employee->id}}</th>
                  <td>{{ $employee->firstname }}</td>
                  <td>{{ $employee->lastname }}</td>
                  <td>{{ $employee->middlename }}</td>
                  <td><img src="{{ URL::to($employee->profile) }}" style="width: 50px;height: 50px;border-radius: 50%;"></td>
                  <td style="text-align: center;">
                    <a href="{{ URL::to('/admin/employee/edit/'.$employee->id) }}" class="btn btn-icon icon-left btn-info" style="width: 32%;">
                      <i class="fa fa-edit"></i> Update
                    </a>
                    <a href="{{ URL::to('/admin/employee/view/'.$employee->id) }}" class="btn btn-icon icon-left btn-warning" style="width: 32%;">
                      <i class="fa fa-eye"></i> Show
                    </a>
                    <a class="btn btn-icon icon-left btn-danger"  onclick="return confirmationDeleteEmployee();" style="width:32%;color:#fff;">
                      <i class="fa fa-trash-alt"></i> Delete
                    </a>
                      <script src="{{ asset('js/sweetalert.min.js') }}"></script>
                      <script type="text/javascript">
                        function confirmationDeleteEmployee() {
                          swal({
                            title: "Alert",
                            text: "Are you sure you want to Delete the records?",
                            icon: "warning",
                            buttons: true,
                            dangerMode: true,
                          }).then(okay => {
                            if(okay) {
                              window.location.href = "{{ URL::to('/admin/employee/delete/'.$employee->id) }}";
                            }
                          });
                        }
                      </script>
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