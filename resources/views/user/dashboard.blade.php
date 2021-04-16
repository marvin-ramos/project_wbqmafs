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
	    <div class="row">
	        <div class="col-lg-12 col-md-12 col-12 col-sm-12">
	          <div class="card">
	            <div class="card-header">
	              <h4>Parameters</h4>	
	            </div>
	            <div class="card-body">
	              	<canvas id="sensorData" height="245"></canvas>
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
	<script>
		var ctx = document.getElementById('sensorData').getContext('2d');
		var chart = new Chart(ctx, {
		type: 'line',
		data: {
		labels:  {!! json_encode($chart1->labels) !!} ,
		datasets: [
			{
			label: 'Water Level',
			backgroundColor: "rgba(71, 195, 99, 0.5)",
			data:  {!! json_encode($chart1->dataset)!!} ,
			borderColor: "#47c363",
        	fill: false,
			},{
			label: 'Temperature Level',
			backgroundColor: "rgba(252, 84, 75, 0.5)",
			data:  {!! json_encode($chart2->dataset)!!},
			borderColor: "#fc544b",
			fill: false,
			},{
			label: 'Turbidity Level',
			backgroundColor: "rgba(205, 211, 216, 0.5)",
			data:  {!! json_encode($chart3->dataset)!!},
			borderColor: "#cdd3d8",
        	fill: false,
			},{
			label: 'PH Level',
			backgroundColor: "rgba(103, 119, 239, 0.5)",
			data:  {!! json_encode($chart4->dataset)!!} ,
			borderColor: "#6777ef",
			fill: false,
			},

		]
		},
		options: {
			scales: {
				yAxes: [{
					ticks: {
						beginAtZero: true,
						callback: function(value) {
							if (value % 1 === 0) {
								return value;
							}
						}
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
@endsection