@extends('layouts.app')

@section('title') Loan Banking @endsection

@section('content')
        <style type="text/css">
            #theme-main-banner .camera_caption>div {
                background: #52371382;
                position: absolute;
                width: 100%;
                height: 100%;
                top: 0;
                text-shadow: none;
                left: 0;
                padding: 0;
            }
        </style>			
			<!-- 
			=============================================
				Theme Main Banner
			============================================== 
			-->
			<div class="home-two-banner">
				<div id="theme-main-banner" class="banner-two">
					<div data-src="/front/images/home/slide-3.jpg">
						<div class="camera_caption">
							<div class="container">
								<h1 class="wow fadeInUp animated"><h1>Personal Bank Loan <br>From $12,500</h1></h1>
								<p class="wow fadeInUp animated" data-wow-delay="0.2s">We have wide range of loans selection for our customers. <br>It’s start low to high with low interest.</p>
								<a href="{{ route('about') }}" class="button-one wow fadeInLeft animated" data-wow-delay="0.3s">About CB</a>
								
							</div> <!-- /.container -->
						</div> <!-- /.camera_caption -->
					</div>
				</div> <!-- /#theme-main-banner -->

				<div class="get-loan-form wow fadeInUp" data-wow-delay="0.2s">
	            	<div class="clearfix">
	            		<form action="#">
	            			<h3>Get Your loan</h3>
	            			<input type="text" placeholder="AMOUNT OF MONEY ($)">
	            			<input type="text" placeholder="HOW LONG FOR?">
	            			<input type="text" placeholder="Installment amount">
	            			<input type="submit" value="GET YOUR LOAN NOW!">
	            		</form>
	            	</div> <!-- /.clearfix -->
	            </div> <!-- /.get-loan-form -->
			</div> <!-- /.home-two-banner -->


			<!-- 
			=============================================
				Our Service
			============================================== 
			-->
			<div class="our-service">
				<div class="container">
					<div class="row">
						<div class="col-lg-3 col-6">
							<div class="single-service">
								<div class="icon"><img src="/front/images/icon/7.png" alt=""></div>
								<div class="text">
									<h4><a href="service-details.html">Lowest Interest in Business loan</a></h4>
									<div class="interest">9.60%</div>
									<p>Lowest Interest</p>
								</div> <!-- /.text -->
							</div> <!-- /.single-service -->
						</div> <!-- /.col- -->
						<div class="col-lg-3 col-6">
							<div class="single-service">
								<div class="icon"><img src="/front/images/icon/8.png" alt=""></div>
								<div class="text">
									<h4><a href="service-details.html">Easy Personal Loan by Anyone</a></h4>
									<div class="interest">11.30%</div>
									<p>Lowest Interest</p>
								</div> <!-- /.text -->
							</div> <!-- /.single-service -->
						</div> <!-- /.col- -->
						<div class="col-lg-3 col-6">
							<div class="single-service">
								<div class="icon"><img src="/front/images/icon/9.png" alt=""></div>
								<div class="text">
									<h4><a href="service-details.html">Credit &amp; Debit Card with 0 interest</a></h4>
									<div class="interest">7.55%</div>
									<p>Lowest Interest</p>
								</div> <!-- /.text -->
							</div> <!-- /.single-service -->
						</div> <!-- /.col- -->
						<div class="col-lg-3 col-6">
							<div class="single-service">
								<div class="icon"><img src="/front/images/icon/10.png" alt=""></div>
								<div class="text">
									<h4><a href="service-details.html">New &amp; Recondition Car laon </a></h4>
									<div class="interest">10.66%</div>
									<p>Lowest Interest</p>
								</div> <!-- /.text -->
							</div> <!-- /.single-service -->
						</div> <!-- /.col- -->
					</div> <!-- /.row -->
				</div> <!-- /.container -->
			</div> <!-- /.our-service -->


			<!--
			=====================================================
				Loan Section
			=====================================================
			-->
			<div class="loan-section">
				<div class="container">
					<div class="row">
						<div class="col-lg-7 col-12">
							<div class="loan-calculation-wrapper">
								<div class="theme-title">
									<h2>Check loan status, interest &amp; Installment.</h2>
								</div> <!-- /.theme-title -->
								<div class="loan-filter-form">
									<label>Loan Amount</label>
									<div class="price-ranger">
										<div class="ranger-min-max-block">
											<ul class="clearfix">
												<li class="float-left"><input type="text" class="min" readonly> </li>
												<li class="float-left">To</li>
												<li class="float-left"><input type="text" class="max" readonly></li>
												<li class="float-right">$35,600</li>
											</ul>
										</div>
										<div id="slider-range"></div>
									</div> <!-- /price-ranger -->
									<label>Select Installment Months</label>
									<ul class="duration-filter clearfix">
										<li class="float-left">
											<select class="theme-selectpicker">
											  <option>18</option>
											  <option>20</option>
											  <option>22</option>
											</select>
										</li>
										<li class="float-right">18 Months / 7.60% <span>APR</span></li>
									</ul>
								</div> <!-- /.loan-filter-form -->
							</div> <!-- /.loan-calculation-wrapper -->
						</div> <!-- /.col- -->

						<div class="col-lg-5 col-12">
							<div class="loan-confirm-form">
								<h6>Total Amount</h6>
								<h2>$37,500</h2>
								<ul class="clearfix">
									<li class="float-left">
										<h6>Installment</h6>
										<h3>$2750</h3>
									</li>
									<li class="float-right">
										<h6>Interest Rate</h6>
										<h3>7.21%</h3>
									</li>
								</ul>
								<button class="tran3s apply-button">APPLY FOR LOAN</button>
							</div> <!-- /.loan-confirm-form -->
						</div> <!-- /.col- -->
					</div> <!-- /.row -->
				</div> <!-- /.container -->
			</div> <!-- /.loan-section -->

@endsection