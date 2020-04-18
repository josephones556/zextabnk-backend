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
										<i class="icon-swap"></i>
									</div>
									<div class="page-title">
										<h5>Make Transfer</h5>
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
														<h4 class="total">{{ \Auth::user()->account->account_number }}</h4>
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
														<h4 class="total">$ {{ number_format(\Auth::user()->account->balance, 2) }}</h4>
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
									<div class="card-header">Initiate Transfer</div>
									<div class="card-body">
										<form method="POST" action="{{ route('secure.transfer.new') }}">
											@csrf
											<style type="text/css">
												.invalid-feedback {
												    display: unset;
												    margin-top: .25rem;
												    font-size: .875rem;
												    color: #dc3545;
												}
											</style>
											<div class="form-row">
												<div class="form-group col-md-6">
													<label for="AccountName" class="col-form-label">Account Name</label>
													<input type="text" class="form-control" placeholder="Account Name" id="AccountName" name="account_name" value="{{ old('account_name') }}" required>
													@if ($errors->has('account_name'))
					                                    <span class="invalid-feedback">
					                                        <strong>{{ $errors->first('account_name') }}</strong>
					                                    </span>
					                                @endif
												</div>
												<div class="form-group col-md-6">
													<label for="AccountNumber" class="col-form-label">Account Number</label>
													<input type="text" class="form-control" placeholder="Account Name" id="AccountNumber" name="account_number" value="{{ old('account_number') }}" required>
													@if ($errors->has('account_number'))
					                                    <span class="invalid-feedback">
					                                        <strong>{{ $errors->first('account_number') }}</strong>
					                                    </span>
					                                @endif
												</div>
												<div class="form-group col-md-6">
													<label for="BankName" class="col-form-label">Bank Name</label>
													<input type="text" class="form-control" placeholder="Bank Name" id="BankName" name="bank_name" value="{{ old('bank_name') }}" required>
													@if ($errors->has('bank_name'))
					                                    <span class="invalid-feedback">
					                                        <strong>{{ $errors->first('bank_name') }}</strong>
					                                    </span>
					                                @endif
												</div>
												<div class="form-group col-md-6">
													<label for="SwiftCode" class="col-form-label">Swift Code</label>
													<input type="text" class="form-control" placeholder="Swift Code" id="SwiftCode" name="swift_code" value="{{ old('swift_code') }}" required>
													@if ($errors->has('swift_code'))
					                                    <span class="invalid-feedback">
					                                        <strong>{{ $errors->first('swift_code') }}</strong>
					                                    </span>
					                                @endif
												</div>


												<div class="form-group col-md-6">
													<label for="Email" class="col-form-label">Email</label>
													<input type="email" class="form-control" placeholder="Email" id="Email" name="email" value="{{ old('email') }}" required>
													@if ($errors->has('email'))
					                                    <span class="invalid-feedback">
					                                        <strong>{{ $errors->first('email') }}</strong>
					                                    </span>
					                                @endif
												</div>
												<div class="form-group col-md-6">
													<label for="Country" class="col-form-label">Country</label>
													<input type="text" class="form-control" placeholder="Country" id="Country" name="country" value="{{ old('country') }}" required>
													@if ($errors->has('country'))
					                                    <span class="invalid-feedback">
					                                        <strong>{{ $errors->first('country') }}</strong>
					                                    </span>
					                                @endif
												</div>

												<div class="form-group col-md-6">
													<label for="Amount" class="col-form-label">Amount <sup>(USD)</sup></label>
													<input type="number" class="form-control" id="Amount" placeholder="Amount In USD" name="amount"  value="{{ old('amount') }}" required>
													@if ($errors->has('amount'))
					                                    <span class="invalid-feedback">
					                                        <strong>{{ $errors->first('amount') }}</strong>
					                                    </span>
					                                @endif
												</div>
											</div>
											<div class="alert alert-danger">
												<button type="button" class="close" data-dismiss="alert" aria-label="Close">
													<span aria-hidden="true">×</span>
												</button><strong>Note: </strong> Kindly Review The Information Provided Above
											</div>
											<button type="submit" class="btn btn-primary">Send Transfer</button>
										</form>
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
<script type="text/javascript">
</script>


@endpush