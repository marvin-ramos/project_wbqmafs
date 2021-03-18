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
		<div class="row">
	        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
	          <div class="card card-statistic-1">
	            <div class="card-icon bg-primary">
	              <i class="fa fa-user"></i>
	            </div>
	            <div class="card-wrap">
	              <div class="card-header">
	                <h4>Employee</h4>
	              </div>
	              <div class="card-body">
	                10
	              </div>
	            </div>
	          </div>
	        </div>
	        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
	          <div class="card card-statistic-1">
	            <div class="card-icon bg-danger">
	              <i class="fa fa-newspaper"></i>
	            </div>
	            <div class="card-wrap">
	              <div class="card-header">
	                <h4>Accounts</h4>
	              </div>
	              <div class="card-body">
	                42
	              </div>
	            </div>
	          </div>
	        </div>
	        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
	          <div class="card card-statistic-1">
	            <div class="card-icon bg-warning">
	              <i class="fa fa-file"></i>
	            </div>
	            <div class="card-wrap">
	              <div class="card-header">
	                <h4>Feeder</h4>
	              </div>
	              <div class="card-body">
	                1,201
	              </div>
	            </div>
	          </div>
	        </div>
	        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
	          <div class="card card-statistic-1">
	            <div class="card-icon bg-success">
	              <i class="fa fa-circle"></i>
	            </div>
	            <div class="card-wrap">
	              <div class="card-header">
	                <h4>History</h4>
	              </div>
	              <div class="card-body">
	                47
	              </div>
	            </div>
	          </div>
	        </div>
	    </div>
	    <div class="row">
	        <div class="col-lg-8 col-md-12 col-12 col-sm-12">
	          <div class="card">
	            <div class="card-header">
	              <h4>Statistics</h4>
	              <div class="card-header-action">
	                <div class="btn-group">
	                  <a href="#" class="btn btn-primary">Week</a>
	                  <a href="#" class="btn">Month</a>
	                </div>
	              </div>
	            </div>
	            <div class="card-body">
	              <canvas id="myChart" height="182"></canvas>
	              <div class="statistic-details mt-sm-4">
	                <div class="statistic-details-item">
	                  <span class="text-muted"><span class="text-primary"><i class="fas fa-caret-up"></i></span> 7%</span>
	                  <div class="detail-value">$243</div>
	                  <div class="detail-name">Today's Sales</div>
	                </div>
	                <div class="statistic-details-item">
	                  <span class="text-muted"><span class="text-danger"><i class="fas fa-caret-down"></i></span> 23%</span>
	                  <div class="detail-value">$2,902</div>
	                  <div class="detail-name">This Week's Sales</div>
	                </div>
	                <div class="statistic-details-item">
	                  <span class="text-muted"><span class="text-primary"><i class="fas fa-caret-up"></i></span>9%</span>
	                  <div class="detail-value">$12,821</div>
	                  <div class="detail-name">This Month's Sales</div>
	                </div>
	                <div class="statistic-details-item">
	                  <span class="text-muted"><span class="text-primary"><i class="fas fa-caret-up"></i></span> 19%</span>
	                  <div class="detail-value">$92,142</div>
	                  <div class="detail-name">This Year's Sales</div>
	                </div>
	              </div>
	            </div>
	          </div>
	        </div>
	        <div class="col-lg-4 col-md-12 col-12 col-sm-12">
	          <div class="card">
	            <div class="card-header">
	              <h4>Recent Activities</h4>
	            </div>
	            <div class="card-body">
	              <ul class="list-unstyled list-unstyled-border">
	                @foreach($recentActivities as $activities)
	                <li class="media">
	                  <img class="mr-3 rounded-circle" width="50" src="{{ URL::to($activities->profile) }}" alt="avatar" style="width: 89px;height: 89px;">
	                  <div class="media-body">
	                    <div class="float-right text-primary" style="text-transform: uppercase;">{{ $activities->role_name }}</div>
	                    <div class="media-title">{{ $activities->firstname }} {{ $activities->middlename }} {{ $activities->lastname }}</div>
	                    <span class="text-small text-muted">{{ $activities->remarks }}.</span>
	                  </div>
	                </li>
	                @endforeach
	              </ul>
	              <div class="text-center pt-1 pb-1">
	                <a href="#" class="btn btn-primary btn-lg btn-round">
	                  View All
	                </a>
	              </div>
	            </div>
	          </div>
	        </div>
	    </div>
	    <div class="row">
	        <div class="col-lg-12 col-md-12 col-12">
	          <div class="card">
	            <div class="card-header">
	              <h4>Water Parameters</h4>
	            </div>
	            <div class="card-body">
	              <div class="mb-4">
	                <div class="text-small float-right font-weight-bold text-muted">2,100</div>
	                <div class="font-weight-bold mb-1">Temperature</div>
	                <div class="progress" data-height="3">
	                  <div class="progress-bar" role="progressbar" data-width="80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
	                </div>
	              </div>

	              <div class="mb-4">
	                <div class="text-small float-right font-weight-bold text-muted">1,880</div>
	                <div class="font-weight-bold mb-1">pH</div>
	                <div class="progress" data-height="3">
	                  <div class="progress-bar" role="progressbar" data-width="67%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
	                </div>
	              </div>

	              <div class="mb-4">
	                <div class="text-small float-right font-weight-bold text-muted">1,521</div>
	                <div class="font-weight-bold mb-1">Water</div>
	                <div class="progress" data-height="3">
	                  <div class="progress-bar" role="progressbar" data-width="58%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
	                </div>
	              </div>

	              <div class="mb-4">
	                <div class="text-small float-right font-weight-bold text-muted">884</div>
	                <div class="font-weight-bold mb-1">Turbidity</div>
	                <div class="progress" data-height="3">
	                  <div class="progress-bar" role="progressbar" data-width="36%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
	                </div>
	              </div>
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