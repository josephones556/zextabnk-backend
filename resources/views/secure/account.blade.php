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
										<i class="icon-user3"></i>
									</div>
									<div class="page-title">
										<h5>Account</h5>
										<h6 class="sub-heading">Account Manager</h6>
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
						<!-- Row start -->
						<div class="row gutters">
							@include('secure.layouts.notification')
							<div class="col-xl-4 col-lg-3 col-md-6 col-sm-6">
								<div class="row">
									<div class="col">
										<a class="block-300 center-text">
											<div class="user-profile">
												<img src="{{  auth()->user()->account->picture }}" class="profile-thumb" alt="User Thumb">
												<h5 class="profile-name">{{ auth()->user()->isAn('active') ? auth()->user()->account->firstname . ' ' . auth()->user()->account->middlename. ' ' . auth()->user()->account->lastname : auth()->user()->username }}</h5>
												<p class="profile-location">{{ auth()->user()->account->city . ' ' . auth()->user()->account->state. '. ' . auth()->user()->account->country }}</p>
												<div class="ml-5 mr-5 chartist custom-two">
													<div class="team-act"></div>
												</div>
											</div>
										</a>
									</div>
								</div>
							</div>
								<style type="text/css">
									a.block-140 {
									    height: unset;
									}
								</style>
							<div class="col">
								<div class="row">
									<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
										<a href="#" class="block-140">
											<h5>{{ auth()->user()->account->account_number }}</h5>
											<p>Account Number</p>
										</a>
									</div>
									<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
										<a href="#" class="block-140">
											<h5>$ {{ number_format(auth()->user()->account->balance, 2) }}</h5>
											<p>Balance</p>
										</a>
									</div>
									<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
										<a href="#" class="block-140">
											<h5>{{ auth()->user()->username }}</h5>
											<p>Username</p>
										</a>
									</div>
									<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
										<a href="#" class="block-140">
											<h5>{{ auth()->user()->account->opening->format('d M, Y') }}</h5>
											<p>Account Opened</p>
										</a>
									</div>
									<div class="col-xl-12 col-lg-12 col-md-12 col-sm- col">
										
										<div class="card">
											<div class="card-header">Change Password</div>
											<div class="card-body">
												<div class="form-group row gutters">
													<label for="inputEmail3" class="col-sm-3 col-form-label">Current Password</label>
													<div class="col-sm-9">
														<input type="password" class="form-control" id="inputEmail3" placeholder="Current Password">
													</div>
												</div>
												<div class="form-group row gutters">
													<label for="inputPassword3" class="col-sm-3 col-form-label">New Password</label>
													<div class="col-sm-9">
														<input type="password" class="form-control" id="inputPassword3" placeholder="New Password">
													</div>
												</div>
												<div class="form-group row gutters">
													<label for="inputPassword3" class="col-sm-3 col-form-label">Confirm Password</label>
													<div class="col-sm-9">
														<input type="password" class="form-control" id="inputPassword3" placeholder="Confirm Password">
													</div>
												</div>
												<div class="form-group row gutters">
													<div class="col-sm-10">
														<button disabled type="submit" class="btn btn-primary">Sign in</button>
													</div>
												</div>
											</div>
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
@endpush














@push('styles')

@endpush