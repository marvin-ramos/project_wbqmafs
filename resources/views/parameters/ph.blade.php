@extends('layouts.admin-master')

@section('title')
Temperature Parameters
@endsection

@section('content')
<section class="section">
	<div class="section-header">
		<h1>Temperature Parameters</h1>
	</div>

	<div class="section-body">
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
	              <canvas id="phChart" class="rounded shadow"></canvas>
	              <script src="{{ asset('vendor/chart.js/dist/Chart.min.js') }}"></script>
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
	              <h4>Parameters</h4>
	            </div>
	            <div class="card-body">
	              <ul class="list-unstyled list-unstyled-border">
	                <li class="media">
	                	<a href="{{ route('parameter.turbidity') }}" class="card card-statistic-1">
	                		<div class="card-icon bg-secondary">
		                      <i class="far fa-user"></i>
		                    </div>
		                    <div class="card-wrap">
		                      <div class="card-header">
		                        <h4>Turbidity Level</h4>
		                      </div>
		                      <div class="card-body">
		                        10
		                      </div>
		                    </div>
	                	</a>
	                </li>
	                <li class="media">
	                	<a href="{{ route('parameter.water') }}" class="card card-statistic-1">
	                		<div class="card-icon bg-success">
		                      <i class="far fa-user"></i>
		                    </div>
		                    <div class="card-wrap">
		                      <div class="card-header">
		                        <h4>Water Level</h4>
		                      </div>
		                      <div class="card-body">
		                        10
		                      </div>
		                    </div>
	                	</a>
	                </li>
	                <li class="media">
	                	<a href="{{ route('parameter.temperature') }}" class="card card-statistic-1">
	                		<div class="card-icon bg-danger">
		                      <i class="far fa-user"></i>
		                    </div>
		                    <div class="card-wrap">
		                      <div class="card-header">
		                        <h4>Temperature Level</h4>
		                      </div>
		                      <div class="card-body">
		                        10
		                      </div>
		                    </div>
	                	</a>
	                </li>
	              </ul>
	            </div>
	          </div>
	        </div>
	    </div>
	</div>

	<script>
		var ctx = document.getElementById('phChart').getContext('2d');
		var chart = new Chart(ctx, {
		type: 'line',
		data: {
		labels:  {!! json_encode($chart->labels) !!} ,
		datasets: [
			{
			label: 'PH Level',
			backgroundColor: {!! json_encode($chart->colours)!!} ,
			data:  {!! json_encode($chart->dataset)!!} ,
			},
		]
		},
		options: {
			scales: {
				yAxes: [{
					ticks: {
					beginAtZero: true,
					callback: function(value) {if (value % 1 === 0) {return value;}}
					},
					scaleLabel: {
					display: false
					}
				}]
			},
			legend: {
				labels: {
				fontColor: '#122C4B',
				fontFamily: "'Muli', sans-serif",
				padding: 25,
				boxWidth: 25,
				fontSize: 14,
				}
			},
			layout: {
				padding: {
					left: 10,
					right: 10,
					top: 0,
					bottom: 10
				}
			}
		}
		});
	</script>
</section>
@endsection
