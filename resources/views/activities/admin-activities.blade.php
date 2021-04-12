@extends('layouts.admin-master')

@section('title')
Activities
@endsection

@section('content')
<section class="section">
  <div class="section-header">
    <h1>Activities</h1>
  </div>

	<div class="section-body">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-12 col-sm-12">
		        <div class="card">
		          <div class="card-header">
		            <h4>Activities</h4>
		          </div>
		          <div class="card-body">
		            <table class="table">
		              <thead>
		                <tr>
		                  <th scope="col">#</th>
		                  <th scope="col">Employee Name</th>
		                  <th scope="col">Role</th>
		                  <th scope="col">Remarks</th>
		                  <th scope="col">Date</th>
		                </tr>
		              </thead>
		              <tbody>
		                @foreach($userActivities as $records)
		                <tr>
		                  <th scope="row">{{ $records->id }}</th>
		                  <td>{{ $records->firstname }} {{ $records->middlename }} {{ $records->lastname }}</td>
		                  <td>{{ $records->role_name }}</td>
		                  <td>{{ $records->remarks }}</td>
		                  <td>{{ $records->created_at }}</td>
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
