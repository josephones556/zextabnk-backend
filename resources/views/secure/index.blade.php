@extends('secure.layouts.app')

@push('styles')
		<link href="/secure/css/basictable.css" rel="stylesheet" />
@endpush

@section('content')

				<!-- BEGIN .app-main -->
				<div class="app-main">
					<!-- BEGIN .main-heading -->
					<header class="main-heading">
						<div class="container-fluid">
							<div class="row">
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
									<div class="page-icon">
										<i class="icon-home"></i>
									</div>
									<div class="page-title">
										<h5>Welcome Back</h5>
										<h6 class="sub-heading"><strong>{{ \Auth::user()->account->firstname }} {{ \Auth::user()->account->middlename }} {{ \Auth::user()->account->lastname }} </strong></h6>
									</div>
								</div>
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
									@include('secure.layouts.update')
								</div>
							</div>
						</div>
					</header>
					<!-- END: .main-heading -->
					<!-- BEGIN .main-content -->
					<div class="main-content">
						<!-- Row start -->
						<div class="row gutters">
							@include('secure.layouts.notification')
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
								<div class="card">
									<div class="card-body">
										<div class="stats-widget">
											<div class="stats-widget-body">
												<!-- Row start -->
												<ul class="row no-gutters mb-3">
													<li class="col-12">
														<h6 class="title">Account Number</h6>
														<h4 class="total">{{ $data['account_number'] }}</h4>
													</li>
												</ul>
												<!-- Row end -->
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
								<div class="card">
									<div class="card-body">
										<div class="stats-widget">
											<div class="stats-widget-body">
												<!-- Row start -->
												<ul class="row no-gutters mb-3">
													<li class="col-12">
														<h6 class="title">Current Balance</h6>
														<h4 class="total">$ {{ number_format($data['balance'], 2) }}</h4>
													</li>
												</ul>
												<!-- Row end -->
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- Row end -->
						<!-- Row start -->
						<div class="row gutters">
							<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
								<div class="card">
									<div class="card-header">Overview</div>
									<div class="card-body">
										<!-- Row start -->
										<div class="row gutters">
											<div class="col-xl-5 col-lg-5 col-md-5 col-sm-12">
												<h6 class="card-title mt-0">Account Debits</h6>
												<div class="chartist custom-one">
													<div class="line-chart2 mb-2"></div>
												</div>
											</div>
											<div class="col-xl-2 col-lg-2 col-md-2 col-sm-12">
												<div class="monthly-avg">
													<h6>Average</h6>
													<div class="avg-block">
														<h4 class="avg-total text-secondary">$ {{ number_format($data['debits']->avg('amount'), 2) }}</h4>
														<h6 class="avg-label">
															Debit
														</h6>
													</div>
													<div class="avg-block">
														<h4 class="avg-total text-primary">$ {{ number_format($data['credits']->avg('amount'), 2) }}</h4>
														<h6 class="avg-label">
															Credit
														</h6>
													</div>
												</div>
											</div>
											<div class="col-xl-5 col-lg-5 col-md-5 col-sm-12">
												<h6 class="card-title mt-0">Account Credits</h6>
												<div class="chartist custom-two">
													<div class="line-chart"></div>
												</div>
											</div>
										</div>
										<!-- Row end -->
									</div>
								</div>
							</div>
						</div>
						<!-- Row end -->

						<!-- Row start -->
						<div class="row gutters">
							<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
								<div class="card">
								    <div class="card-header">Recent Transactions<a href="{{ route('secure.transactions') }}" class="link">View All</a></div>
								    <div class="card-body">
								        <table class="table table-striped table-bordered">
								            <thead>
								                <tr>
								                    <th>Type</th>
								                    <th>Reference</th>
								                    <th>Name</th>
								                    <th>Amount</th>
								                    <th>Bank Name</th>
								                    <th>Date</th>
								                </tr>
								            </thead>
								            <tbody>
								            	@foreach($data['transactions'] as $transaction)
									                <tr>
									                    <td class="{{ $transaction->type == 'Debit' ? 'text-danger' : 'text-success' }}">{{ $transaction->type }}</td>
									                    <td>{{ $transaction->reference }}</td>
									                    <td>{{ $transaction->account_name }}</td>
									                    <td>$ {{ number_format($transaction->amount, 2) }} </td>
									                    <td>{{ $transaction->bank_name }}</td>
									                    <td>{{ $transaction->date->format('d M, Y') }}</td>
									                </tr>
									            @endforeach
								            </tbody>
								        </table>
								    </div>
								</div>
							</div>
						</div>

					</div>
					<!-- END: .main-content -->
				</div>
				<!-- END: .app-main -->
@endsection('content')

@push('js')

<script src="/secure/js/jquery.basictable.min.js"></script>

<script type="text/javascript">
	var chart = new Chartist.Line('.line-chart', {
		labels: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10],
		series: [
			[
			@foreach($data['credits'] as $credits)
				{meta: '{{ $credits->date->format('d M, Y') }}', value: {{ $credits->amount }} },
			@endforeach
			]
		]
	}, {
		// Remove this configuration to see that chart rendered with cardinal spline interpolation
		// Sometimes, on large jumps in data values, it's better to use simple smoothing.
		lineSmooth: Chartist.Interpolation.simple({
			divisor: 2
		}),
		height: "190px",
		fullWidth: true,
		chartPadding: {
			right: 20,
			left: 10,
			top: 10,
			bottom: 0,
		},
		axisX: {
			offset: 0,
			showGrid: false,
			showLabel: false,
		}, 
		axisY: {
			offset: 0,
			showLabel: false,
		},
		plugins: [
			Chartist.plugins.tooltip()
		],
		low: 0,
	});

	chart.on('draw', function(data) {
	  if(data.type === 'line' || data.type === 'area') {
	    data.element.animate({
	      d: {
	        begin: 2000 * data.index,
	        dur: 2000,
	        from: data.path.clone().scale(1, 0).translate(0, data.chartRect.height()).stringify(),
	        to: data.path.clone().stringify(),
	        easing: Chartist.Svg.Easing.easeOutQuint
	      }
	    });
	  }
	});

	var chart2 = new Chartist.Line('.line-chart2', {
			labels: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10],
			series: [
				[
				@foreach($data['debits'] as $debits)
					{meta: '{{ $debits->date->format('d M, Y') }}', value: {{ $debits->amount }} },
				@endforeach
				]
			]

	}, {
		// Remove this configuration to see that chart rendered with cardinal spline interpolation
		// Sometimes, on large jumps in data values, it's better to use simple smoothing.
		lineSmooth: Chartist.Interpolation.simple({
			divisor: 2
		}),
		height: "190px",
		fullWidth: true,
		chartPadding: {
			right: 20,
			left: 10,
			top: 10,
			bottom: 0,
		},
		axisX: {
			offset: 0,
			showGrid: false,
			showLabel: false,
		}, 
		axisY: {
			offset: 0,
			showLabel: false,
		},
		plugins: [
			Chartist.plugins.tooltip()
		],
		low: 0,
	});

	chart2.on('draw', function(data) {
	  if(data.type === 'line' || data.type === 'area') {
	    data.element.animate({
	      d: {
	        begin: 2000 * data.index,
	        dur: 2000,
	        from: data.path.clone().scale(1, 0).translate(0, data.chartRect.height()).stringify(),
	        to: data.path.clone().stringify(),
	        easing: Chartist.Svg.Easing.easeOutQuint
	      }
	    });
	  }
	});
</script>

<script type="text/javascript">
    $(document).ready(function() {
    	$('.table').basictable({
		    breakpoint: 768,
		});
    });
</script>


@endpush

