@extends('secure.layouts.app')

@section('content')

				<!-- BEGIN .app-main -->
				<div class="app-main">
					<!-- BEGIN .main-heading -->
					<header class="main-heading">
						<div class="container-fluid">
							<div class="row">
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
									<div class="page-icon">
										<i class="icon-credit-card"></i>
									</div>
									<div class="page-title">
										<h5>Manage Credit Card</h5>
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
							<div class="col-xl-5 col-lg-5 col-md-6 col-sm-12">
								<div class="row">
									<div class="col-12">
										<style type="text/css">
											.jp-card {
												width: unset;
											}
										</style>
										<div class="card">
											<div class="card-body">
												@if($card->blocked)
													<div class="alert alert-danger">
														<button type="button" class="close" data-dismiss="alert" aria-label="Close">
															<span aria-hidden="true">×</span>
														</button>
														<i class="icon-warning2"></i><strong>Warning</strong> For Security Reasons, This Card Has Been Temporarily Disabled, Contact Customer Care For More Information
													</div>
												@endif
												<style type="text/css">
													.jp-card .jp-card-front .jp-card-lower .jp-card-number {
													    font-size: 20px;
													}
												</style>


												<div class="text-center mt-2 mb-2">
													<h4>Card Control</h4>
												</div>

												<div class="card-wrapper" data-jp-card-initialized="true">
												    <div class="jp-card-container" style="transform: scale(0.857143);">
												        <div class="jp-card jp-card-mastercard jp-card-identified">
												            <div class="jp-card-front">
																<img src="/img/cb-logo.png" alt="" class="card-logo">
												                <div class="jp-card-logo jp-card-mastercard">Mastercard</div>
												                <div class="jp-card-lower">
												                    <div class="jp-card-cvc jp-card-display">•••</div>
												                    <div class="jp-card-number jp-card-display jp-card-invalid">{{ substr($card->card_number, 0, 4) }} •••• •••• {{ substr($card->card_number, -4) }}</div>
												                    <div class="jp-card-name jp-card-display">{{ ucfirst($card->name) }}</div>
												                    <div class="jp-card-expiry jp-card-display" data-before="month/year" data-after="valid thru">{{ $card->expiry }}</div>
												                </div>
												            </div>
												            <div class="jp-card-back">
												                <div class="jp-card-bar"></div>
												                <div class="jp-card-cvc jp-card-display">•••</div>
												                <div class="jp-card-shiny"></div>
												            </div>
												        </div>
												    </div>
												</div>

												<div class="clearfix mb-2">
													<span class="float-left">
	                                    				<h6 style="margin-top: 8px;">Lock Card</h6>
													</span>
													<span class="float-right">
	                                    				<input type="checkbox" data-lock="card" class="m_switch_check" value="{{ unserialize($user->account->card_options)['card'] }}">	
													</span>
												</div>

												<div class="clearfix mb-2">
													<span class="float-left">
	                                    				<h6 style="margin-top: 8px;">Lock Online Payments</h6>
													</span>
													<span class="float-right">
	                                    				<input type="checkbox" data-lock="online" class="m_switch_check" value="{{ unserialize($user->account->card_options)['online'] }}">	
													</span>
												</div>

												<div class="clearfix mb-2">
													<span class="float-left">
	                                    				<h6 style="margin-top: 8px;">Lock Foreign Transactions</h6>
													</span>
													<span class="float-right">
	                                    				<input type="checkbox" data-lock="foreign" class="m_switch_check" value="{{ unserialize($user->account->card_options)['foreign'] }}">	
													</span>
												</div>
											</div>
										</div>	
									</div>
								</div>	
							</div>	
							<div class="col-xl-7 col-lg-7 col-md-6 col-sm-12">
								<div class="card">
									<div class="card-body">
										<div class="card">
										    <div class="card-header">Card Activities</div>
										    <div class="card-body">
								        		<table class="table table-striped table-bordered">
										            <thead>
										                <tr>
										                    <th>Date</th>
										                    <th>Amount</th>
										                    <th>Action</th>
										                    <th>Location</th>
										                </tr>
										            </thead>
										            <tbody>
										            	@foreach($activities as $activity)
											                <tr class="">
											                    <td>{{ $activity->date->format('d M, Y') }}</td>
											                    <td>$ {{ number_format($activity->amount, 2) }}</td>
											                    @if($activity->action == "Approved")
											                    <td><strong class="text-success">{{ $activity->action }}</strong></td>
											                    @else
											                    <td><strong class="text-danger">{{ $activity->action }}</strong></td
											                    @endif
											                    <td>{{ $activity->country }}</td>
											                </tr>
											            @endforeach
										            </tbody>
										        </table>
										    </div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- Row end -->

					</div>
					<!-- END: .main-content -->
				</div>
				<!-- END: .app-main -->
@endsection('content')


@push('js')
<script src="/secure/js/jquery.basictable.min.js"></script>
<script src="/secure/js/jquery.mswitch.js" type="text/javascript"></script>
<script src="/secure/card/card.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
    	$('.table').basictable({
		    breakpoint: 768,
		});

        $(".m_switch_check:checkbox").mSwitch({
                onRender:function(elem){
                    if (elem.val() == 0){
                        $.mSwitch.turnOff(elem);
                    }else{
                        $.mSwitch.turnOn(elem);
                    }
                },
                onTurnOn:function(elem){
                	console.log(elem.data().lock)

                	axios.post('{{ route('secure.card_action') }}', {
                		action: 'lock',
                		type: elem.data().lock
                	})
                },
                onTurnOff:function(elem){
                	console.log(elem.data().lock)

                	axios.post('{{ route('secure.card_action') }}', {
                		action: 'unlock',
                		type: elem.data().lock
                	})
                }
        });
		//$('.jp-card-shiny').replaceWith($( ".main-logo" ));
    });
</script>
@endpush

@push('styles')
		<link href="/secure/css/basictable.css" rel="stylesheet" />
        <link href="/secure/css/jquery.mswitch.css" rel="stylesheet" type="text/css">
		<style type="text/css">
			 .card-logo {
			    position: absolute;
			    top: 10px;
			    left: 15px;
			    height: 60px;
			}
		</style>
@endpush

