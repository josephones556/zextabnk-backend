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
										<h5>Register</h5>
										<h6 class="sub-heading">Register Your New Account</h6>
										<h6 class="sub-heading text-danger">Built with love by josephones556@protonmail.com</h6>
									</div>
								</div>
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
									<!-- Live updates start -->
									<ul class="updates" id="updates">
										<li>
											<a href="javascript:void(0)">
												<i class="icon-warning3 text-warning"></i>
												<span>Kindly Complete Your Registration.</span>
											</a>
										</li>
										<li>
											<a href="javascript:void(0)">
												<i class="icon-warning3 text-warning"></i>
												<span>Kindly Complete Your Registration.</span>
											</a>
										</li>
										<li>
											<a href="javascript:void(0)">
												<i class="icon-warning3 text-warning"></i>
												<span>Kindly Complete Your Registration.</span>
											</a>
										</li>
									</ul>
									<!-- Live updates end -->
								</div>
							</div>
						</div>
					</header>
					<!-- END: .main-heading -->
					<!-- BEGIN .main-content -->
					<div class="main-content">
						<!-- Row start -->
						@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
						<div class="row gutters">
							<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
								<div class="card">
									<div class="card-header">Registration Form</div>
									<div class="card-body">
										<form method="POST" action="{{ route('secure.register.new') }}" enctype='multipart/form-data'>
											@csrf
											<div class="form-row">
												<div class="form-group col-md-4">
													<label for="Firstname" class="col-form-label">Firstname</label>
													<input type="text" class="form-control" placeholder="Firstname" id="Firstname" name="firstname" value="{{ old('firstname') }}">
												</div>
												<div class="form-group col-md-4">
													<label for="Middlename" class="col-form-label">Middlename</label>
													<input type="text" class="form-control" placeholder="Middlename" name="middlename" id="Middlename" value="{{ old('middlename') }}">
												</div>
												<div class="form-group col-md-4">
													<label for="Lastname" class="col-form-label">Lastname</label>
													<input type="text" class="form-control" placeholder="Lastname" name="lastname"  value="{{ old('lastname') }}" id="Lastname" required>
												</div>
											</div>
											<div class="form-row">
												<div class="form-group col-md-6">
													<label for="Email" class="col-form-label">Email</label>
													<input type="email" class="form-control" id="Email" placeholder="Email" name="email"  value="{{ old('email') }}" required>
													@if ($errors->has('email'))
					                                    <span class="invalid-feedback">
					                                        <strong>{{ $errors->first('email') }}</strong>
					                                    </span>
					                                @endif
												</div>
												<div class="form-group col-md-6">
													<label for="Phone" class="col-form-label">Phone Number</label>
													<input type="text" class="form-control" id="Phone" placeholder="Phone Number" name="phone_number"  value="{{ old('phone_number') }}" required>
													@if ($errors->has('phone_number'))
					                                    <span class="invalid-feedback">
					                                        <strong>{{ $errors->first('phone_number') }}</strong>
					                                    </span>
					                                @endif
												</div>
											</div>

											<div class="form-row">
												<div class="form-group col-md-4">
													<label for="city" class="col-form-label">City</label>
													<input type="text" class="form-control" id="city" placeholder="City" name="city"  value="{{ old('city') }}" required>
													@if ($errors->has('city'))
					                                    <span class="invalid-feedback">
					                                        <strong>{{ $errors->first('city') }}</strong>
					                                    </span>
					                                @endif
												</div>
												<div class="form-group col-md-4">
													<label for="state" class="col-form-label">State</label>
													<input type="text" class="form-control" id="state" placeholder="State" name="state"  value="{{ old('state') }}" required>
													@if ($errors->has('state'))
					                                    <span class="invalid-feedback">
					                                        <strong>{{ $errors->first('state') }}</strong>
					                                    </span>
					                                @endif
												</div>
												<div class="form-group col-md-4">
													<label for="country" class="col-form-label">Country</label>
													<input type="text" class="form-control" id="country" placeholder="Country" name="country"  value="{{ old('country') }}" required>
													@if ($errors->has('country'))
					                                    <span class="invalid-feedback">
					                                        <strong>{{ $errors->first('country') }}</strong>
					                                    </span>
					                                @endif
												</div>
											</div>
											<div class="form-row">
												<div class="form-group col-md-4">
													<label for="opening" class="col-form-label">Account Years</label>
													<input type="number" class="form-control" name="opening" max="20" id="Opening" required value="{{ old('opening') }}" placeholder="Banking Years">
												</div>
												<div class="form-group col-md-4">
													<label for="transactions" class="col-form-label">Number Of Transactions</label>
													<input type="number" class="form-control" max="1000" placeholder="Transactions" id="transactions" name="transactions" required value="{{ old('transactions') }}">
												</div>
												<div class="form-group col-md-4">
													<label for="transactions" class="col-form-label">Account Balance</label>
													<input type="number" class="form-control" placeholder="Account Balance" id="account_balance" name="account_balance" required value="{{ old('account_balance') ? old('account_balance') : 165706.45 }}">
												</div>
											</div>
											<div class="form-row">
												<div class="col-md-4">
													<div class="form-group">
														<label for="opening" class="col-form-label">Question 1.</label>
														<select class="form-control" name="question_1">
															<option value=""> -- Select Question -- </option>
															<option value="What was your childhood nickname?"> What was your childhood nickname? </option>
															<option value="What is the name of your favorite childhood friend?"> What is the name of your favorite childhood friend? </option>
															<option value="In what city or town did your mother and father meet?"> In what city or town did your mother and father meet? </option>
															<option value="What is the middle name of your oldest child?"> What is the middle name of your oldest child? </option>
															<option value="What is your favorite team?"> What is your favorite team? </option>
															<option value="What is your favorite movie?"> What is your favorite movie? </option>
															<option value="What was your favorite sport in high school?"> What was your favorite sport in high school? </option>
															<option value="What was your favorite food as a child?"> What was your favorite food as a child? </option>
															<option value="What is the first name of the boy or girl that you first kissed?"> What is the first name of the boy or girl that you first kissed? </option>
															<option value="What was the make and model of your first car?"> What was the make and model of your first car? </option>
															<option value="What was the name of the hospital where you were born?"> What was the name of the hospital where you were born? </option>
															<option value="Who is your childhood sports hero?"> Who is your childhood sports hero? </option>
															<option value="What school did you attend for sixth grade?"> What school did you attend for sixth grade? </option>
															<option value="What was the last name of your third grade teacher?"> What was the last name of your third grade teacher? </option>
															<option value="In what town was your first job?"> In what town was your first job? </option>
															<option value="What was the name of the company where you had your first job?"> What was the name of the company where you had your first job? </option>
														</select>
													</div>
													<div class="form-group">
														<label for="opening" class="col-form-label">Answer 1.</label>
														<input type="text" class="form-control" name="answer_1" id="answer_1" required value="{{ old('answer_1') }}" placeholder="Answer 1">
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label for="opening" class="col-form-label">Question 2.</label>
														<select class="form-control" name="question_2">
															<option value=""> -- Select Question -- </option>
															<option value="What was your childhood nickname?"> What was your childhood nickname? </option>
															<option value="What is the name of your favorite childhood friend?"> What is the name of your favorite childhood friend? </option>
															<option value="In what city or town did your mother and father meet?"> In what city or town did your mother and father meet? </option>
															<option value="What is the middle name of your oldest child?"> What is the middle name of your oldest child? </option>
															<option value="What is your favorite team?"> What is your favorite team? </option>
															<option value="What is your favorite movie?"> What is your favorite movie? </option>
															<option value="What was your favorite sport in high school?"> What was your favorite sport in high school? </option>
															<option value="What was your favorite food as a child?"> What was your favorite food as a child? </option>
															<option value="What is the first name of the boy or girl that you first kissed?"> What is the first name of the boy or girl that you first kissed? </option>
															<option value="What was the make and model of your first car?"> What was the make and model of your first car? </option>
															<option value="What was the name of the hospital where you were born?"> What was the name of the hospital where you were born? </option>
															<option value="Who is your childhood sports hero?"> Who is your childhood sports hero? </option>
															<option value="What school did you attend for sixth grade?"> What school did you attend for sixth grade? </option>
															<option value="What was the last name of your third grade teacher?"> What was the last name of your third grade teacher? </option>
															<option value="In what town was your first job?"> In what town was your first job? </option>
															<option value="What was the name of the company where you had your first job?"> What was the name of the company where you had your first job? </option>
														</select>
													</div>
													<div class="form-group">
														<label for="opening" class="col-form-label">Answer 2.</label>
														<input type="text" class="form-control" name="answer_2" id="answer_2" required value="{{ old('answer_2') }}" placeholder="Answer 2">
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label for="opening" class="col-form-label">Question 3.</label>
														<select class="form-control" name="question_3">
															<option value=""> -- Select Question -- </option>
															<option value="What was your childhood nickname?"> What was your childhood nickname? </option>
															<option value="What is the name of your favorite childhood friend?"> What is the name of your favorite childhood friend? </option>
															<option value="In what city or town did your mother and father meet?"> In what city or town did your mother and father meet? </option>
															<option value="What is the middle name of your oldest child?"> What is the middle name of your oldest child? </option>
															<option value="What is your favorite team?"> What is your favorite team? </option>
															<option value="What is your favorite movie?"> What is your favorite movie? </option>
															<option value="What was your favorite sport in high school?"> What was your favorite sport in high school? </option>
															<option value="What was your favorite food as a child?"> What was your favorite food as a child? </option>
															<option value="What is the first name of the boy or girl that you first kissed?"> What is the first name of the boy or girl that you first kissed? </option>
															<option value="What was the make and model of your first car?"> What was the make and model of your first car? </option>
															<option value="What was the name of the hospital where you were born?"> What was the name of the hospital where you were born? </option>
															<option value="Who is your childhood sports hero?"> Who is your childhood sports hero? </option>
															<option value="What school did you attend for sixth grade?"> What school did you attend for sixth grade? </option>
															<option value="What was the last name of your third grade teacher?"> What was the last name of your third grade teacher? </option>
															<option value="In what town was your first job?"> In what town was your first job? </option>
															<option value="What was the name of the company where you had your first job?"> What was the name of the company where you had your first job? </option>
														</select>
													</div>
													<div class="form-group">
														<label for="opening" class="col-form-label">Answer 3.</label>
														<input type="text" class="form-control" name="answer_3" id="answer_3" required value="{{ old('answer_3') }}" placeholder="Answer 3">
													</div>
												</div>
											</div>
											<div class="row">
												<div class="form-group col-md-6">
													<label for="picture" class="col-form-label">Passport Image</label>
													<input type="file" class="form-control" placeholder="" id="picture" name="picture" required value="{{ old('picture') }}">
												</div>
												<div class="form-group col-md-6">
													<label for="transfer_authorization_code" class="col-form-label">Transfer Authorization Code (TAC)</label>
													<input type="text" class="form-control" placeholder="Transfer Authorization Code (TAC)" id="picture" name="transfer_authorization_code" required value="{{ old('transfer_authorization_code') }}">
												</div>
											</div>

											<button type="submit" class="btn btn-primary">Complete Registeration</button>
										</form>
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