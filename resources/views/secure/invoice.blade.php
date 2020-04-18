@extends('secure.layouts.app')

@section('content')
		<div class="app-main">
			<!-- BEGIN .main-heading -->
			<header class="main-heading">
				<div class="container-fluid">
					<div class="row">
						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
							<div class="page-icon">
								<i class="icon-swap"></i>
							</div>
							<div class="page-title">
								<h5>Invoice</h5>
								<h6 class="sub-heading">Invoice #{{ $invoice->reference }}</h6>
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
				<div class="row justify-content-md-center gutters">
					<div class="col-xl-9 col-lg-9 col-md-9 col-sm-12">
						<div class="card" id="invoicePrint">
							<div class="card-body">
								<div class="invoice-container">
									<!-- Row start -->
									<div class="row gutters">
										<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
											<img src="img/unify.png" class="invoice-logo" alt="">
										</div>
										<div class="col-lg-6 col-md-6 col-sm-6">
											<h4 class="text-right text-secondary">Transaction - {{ strlen($invoice->id) < 5 ? str_repeat(0, 5 - strlen($invoice->id)) . $invoice->id : $invoice->id }}</h4>
										</div>
									</div>
									<!-- Row end -->
									
									<div class="spacer30"></div>

									<!-- Row start -->
									<div class="row gutters">
										<div class="col-lg-6 col-md-6 col-sm-6">
											<p>Hello, {{ $user->account->firstname }} {{ $user->account->middlename }} {{ $user->account->lastname }}.</p>
											@if($invoice->type == 'Credit')
												<p><strong>Credit Notification.</strong></p>
											@elseif($invoice->type == 'Debit')
												<p><strong>Debit Notification.</strong></p>
											@endif
										</div>
										<div class="col-lg-6 col-md-6 col-sm-6">
											<p class="text-right">Reference <span class="text-primary">#{{ $invoice->reference }}</span></p>
											<p class="text-right"><small>{{ $invoice->date->format('jS F Y') }}</small></p>
										</div>
									</div>
									<!-- Row end -->

									<div class="spacer50"></div>

									<!-- Row start -->
									<div class="row gutters">
										<div class="col">
											<table class="table plain">
												<tbody><tr>
													<td>
														<p class="text-">Subtotal</p>
														<p class="{{ $invoice->type == 'Credit' ? 'text-success' : 'text-secondary' }}"><strong>Grand Total (Incl.Tax)</strong></p>
														<p class="text-">Tax / VAT</p>
													</td>
													<td>
														<p class="text-right">$ {{ number_format($invoice->amount - (0.002 * $invoice->amount), 2) }}</p>
														<p class="text-right {{ $invoice->type == 'Credit' ? 'text-success' : 'text-secondary' }}"><strong>$ {{ number_format($invoice->amount, 2) }}</strong></p>
														<p class="text-right">$ {{ number_format(0.002 * $invoice->amount, 2) }}</p>
													</td>
												</tr>
											</tbody></table>
										</div>
									</div>
									<!-- Row end -->

									<div class="spacer20"></div>

									<!-- Row start -->
									<div class="row gutters">
										<div class="col-lg-6 col-md-6 col-sm-6">
											<p class="text-uppercase">
												<strong>Billing Information</strong>
											</p>
											<address>
												<strong>{{ $invoice->account_name }}</strong><br>
												Bank: {{ $invoice->bank_name }}

												@if($invoice->type == 'Debit')<br>
												{{ $invoice->email }}
												@endif
												<br>
												{{ $invoice->country }}
												<br>
											</address>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-6">
											<p class="text-uppercase">
												<strong>Payment Type</strong>
											</p>
											<address>
												<strong>{{ $invoice->type == 'Credit' ? 'Credit' : 'Debit' }}</strong><br>
												Method: Bank Transfer<br>
												Transaction ID: #{{ $invoice->reference }}<br>
											</address>
										</div>
									</div>
									<!-- Row end -->
{{--
									<div class="spacer30"></div>

									<!-- Row start -->
									<div class="row gutters">
										<div class="col-lg-6 col-md-6 col-sm-6">
											<p class="text-uppercase">
												<strong>Shipping Information</strong>
											</p>
											<address>
												<strong>Unify INC.</strong><br>
												Another Location, Somewhere<br>
												New York NY,4468, United States<br>
												Tel: 000-000-6666<br>
											</address>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-6">
											<p class="text-uppercase">
												<strong>Shipping Method</strong>
											</p>
											<p class="m-0">UPS: U.S. Shipping Services</p>
										</div>
									</div>
									<!-- Row end -->
--}}
								</div>
							</div>
						</div>
					</div>

					<div class="col-xl-9 col-lg-9 col-md-9 col-sm-12">
						<a href="{{ route('secure.transactions') }}" class="btn btn-primary float-left">Transactions </a>
						<button onclick="printDiv('invoicePrint')" class="btn btn-primary float-right">Print Invoice </button>
					</div>
				</div>
				<!-- Row end -->
			</div>
			<!-- END: .main-content -->
		</div>
@endsection('content')

@push('js')
<script type="text/javascript">
	function printDiv(divName){
		var printContents = document.getElementById(divName).innerHTML;
		var originalContents = document.body.innerHTML;
		document.body.innerHTML = printContents;
		window.print();
		document.body.innerHTML = originalContents;
	}
</script>
@endpush