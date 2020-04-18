@extends('layouts.app')

@section('title') Your Banking Partner @endsection

@section('content')

            
            <!-- 
            =============================================
                Theme Main Banner
            ============================================== 
            -->
            <div id="theme-main-banner" class="banner-one">
                <div data-src="/front/images/home/slide-1.jpg">
                    <div class="camera_caption">
                        <div class="container">
                            <h1 class="wow fadeInUp animated">Simplified banking </h1>
                            <p class="wow fadeInUp animated" data-wow-delay="0.2s">Everyday Checking provides convenience and fast access. Open in minutes. </p>
                            @guest
                                <a href="{{ route('login') }}" class="button-one wow fadeInLeft animated" data-wow-delay="0.3s">Online Banking</a>
                            @else
                                <a href="{{ route('secure.index') }}" class="button-one wow fadeInLeft animated" data-wow-delay="0.3s">View Account</a>
                            @endguest
                            <a href="{{ route('about') }}" class="button-two wow fadeInRight animated" data-wow-delay="0.3s">About CB</a>
                        </div> <!-- /.container -->
                    </div> <!-- /.camera_caption -->
                </div>
                <div data-src="/front/images/home/slide-2.jpg">
                    <div class="camera_caption">
                        <div class="container">
                            <h1 class="wow fadeInUp animated">Innovation. Security. <br>Convenience. </h1>
                            <p class="wow fadeInUp animated" data-wow-delay="0.2s">Building better every day. </p>
                            @guest
                                <a href="{{ route('login') }}" class="button-one wow fadeInLeft animated" data-wow-delay="0.3s">Online Banking</a>
                            @else
                                <a href="{{ route('secure.index') }}" class="button-one wow fadeInLeft animated" data-wow-delay="0.3s">View Account</a>
                            @endguest
                            <a href="{{ route('about') }}" class="button-two wow fadeInRight animated" data-wow-delay="0.3s">About CB</a>
                        </div> <!-- /.container -->
                    </div> <!-- /.camera_caption -->
                </div>
            </div> <!-- /#theme-main-banner -->
            

            
            
            <!-- 
            =============================================
                Top Feature
            ============================================== 
            -->
            <div class="top-feature">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-sm-4 col-12">
                            <div class="single-feature clearfix">
                                <img src="/front/images/icon/1.png" alt="" class="float-left tran3s">
                                <div class="text float-left">
                                    <p>Easy Savings</p>
                                    <h4><a href="#" class="tran3s">Make Savings A Habit</a></h4>
                                </div> <!-- /.text -->
                            </div> <!-- /.single-feature -->
                        </div> <!-- /.col- -->
                        <div class="col-lg-4 col-md-6 col-sm-4 col-12">
                            <div class="single-feature clearfix">
                                <img src="/front/images/icon/2.png" alt="" class="float-left tran3s">
                                <div class="text float-left">
                                    <p>From 5.60%</p>
                                    <h4><a href="#" class="tran3s">Offer Low Interest Loans</a></h4>
                                </div> <!-- /.text -->
                            </div> <!-- /.single-feature -->
                        </div> <!-- /.col- -->
                        <div class="col-lg-4 d-md-none d-lg-block col-sm-4 col-12">
                            <div class="single-feature clearfix">
                                <img src="/front/images/icon/3.png" alt="" class="float-left tran3s">
                                <div class="text float-left">
                                    <p>Business Bank</p>
                                    <h4><a href="#" class="tran3s">Protect your business</a></h4>
                                </div> <!-- /.text -->
                            </div> <!-- /.single-feature -->
                        </div> <!-- /.col- -->
                    </div> <!-- /.row -->
                </div> <!-- /.container -->
            </div> <!-- /.top-feature -->


            <!-- 
            =============================================
                Our Service
            ============================================== 
            -->
            <div class="our-service">
                <div class="container">
                    <div class="theme-title text-center">
                        <h2>We’re here to help you when you need <br> financial support</h2>
                        <p>We provide mortgages, savings accounts, credit cards & loans</p>
                    </div> <!-- /.theme-title -->
                    <div class="row">
                        <div class="col-lg-3 col-6">
                            <div class="single-service">
                                <div class="image-box"><img src="/front/images/service/1.jpg" alt=""></div>
                                <div class="text">
                                    <h4><a href="#">Handle payroll and benefits with ease</a></h4>
                                    <p>Spend more time running your business, and enjoy greater peace of mind, by trusting your payroll processing and employee benefits programs to Chartered Bank.</p>
                                </div> <!-- /.text -->
                            </div> <!-- /.single-service -->
                        </div> <!-- /.col- -->
                        <div class="col-lg-3 col-6">
                            <div class="single-service">
                                <div class="image-box"><img src="/front/images/service/2.jpg" alt=""></div>
                                <div class="text">
                                    <h4><a href="#">Build your business with smart financing</a></h4>
                                    <p>A sound strategy can help you get the credit you need. The right choice of financing tools can make the most of it for business success.</p>
                                </div> <!-- /.text -->
                            </div> <!-- /.single-service -->
                        </div> <!-- /.col- -->
                        <div class="col-lg-3 col-6">
                            <div class="single-service">
                                <div class="image-box"><img src="/front/images/service/3.jpg" alt=""></div>
                                <div class="text">
                                    <h4><a href="#">Streamline cash flow with payment and deposit options</a></h4>
                                    <p>Manage your cash flow using electronic payments, merchant services and convenient deposit options.</p>
                                </div> <!-- /.text -->
                            </div> <!-- /.single-service -->
                        </div> <!-- /.col- -->
                        <div class="col-lg-3 col-6">
                            <div class="single-service">
                                <div class="image-box"><img src="/front/images/service/4.jpg" alt=""></div>
                                <div class="text">
                                    <h4><a href="#">Get much more than a checking account </a></h4>
                                    <p>Customized financial services that offer convenience, value and flexibility for you and your business.</p>
                                </div> <!-- /.text -->
                            </div> <!-- /.single-service -->
                        </div> <!-- /.col- -->
                    </div> <!-- /.row -->
                </div> <!-- /.container -->
            </div> <!-- /.our-service -->

            <!--
            =====================================================
                Testimonial Slider
            =====================================================
            -->
            <div class="testimonial-section">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-8 col-12 offset-xl-4 wow fadeInUp">
                            <div class="theme-title">
                                <h6>Testimonials</h6>
                                <h2>Check what people say <br>About Chartered Bank</h2>
                            </div> <!-- /.theme-title-one -->
                        </div> <!-- /.col- -->
                    </div> <!-- /.row -->
                </div> <!-- /.container -->
                <div class="main-bg-wrapper">
                    <div class="overlay">
                        <div id="watch-video">
                        </div>
                        <div class="main-slider-wrapper">
                            <div class="testimonial-slider">
                                <div class="item">
                                    <i class="flaticon-close"></i>
                                    <p>“Chartered Bank has provided us with the support and service l can trust to operate a resilient and healthy farm.</p>
                                    <div class="clearfix">
                                        <img src="https://www.sccountybank.com/images/test_liveearthfarm.jpg" alt="" class="float-left">
                                        <div class="name float-left">
                                            <h6>Tom Broz, Owner,</h6>
                                            <span>Live Earth Farm</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <i class="flaticon-close"></i>
                                    <p>“We choose Chartered Bank because, not only do they make banking easy, we see them out volunteering and engaging their customers.</p>
                                    <div class="clearfix">
                                        <img src="https://www.sccountybank.com/images/test-volcenter.jpg" alt="" class="float-left">
                                        <div class="name float-left">
                                            <h6>Karen Delaney & Lois Connell</h6>
                                            <span>Volunteer Center of Santa Cruz County</span>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- /.testimonial-slider -->
                        </div> <!-- /.main-slider-wrapper -->
                    </div>
                </div> <!-- /.main-bg-wrapper -->
            </div> <!-- /.testimonial-section -->


{{--
            <!--
            =====================================================
                Loan Section
            =====================================================
            -->
            <div class="loan-section">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-7 col-12 wow fadeInLeft">
                            <div class="loan-calculation-wrapper">
                                <div class="theme-title">
                                    <h2>Check loan status, interest &amp; Installment.</h2>
                                    <p>Cum sociis natoque penatibus et magnis parturient. Pro vel nibh et elit mollis commodo et nec augue tristique sed</p>
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

                        <div class="col-lg-5 col-12 wow fadeInRight">
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
--}}


            <!-- 
            =============================================
                Feature Banner
            ============================================== 
            -->
            <div class="feature-banner bg-one" style="margin-top: 0;">
                <div class="opacity overlay-one">
                    <div class="container">
                        <div class="theme-title">
                            <h2>We’re all about helping you reach your next <br>financial goal and loan help.</h2>
                        </div> <!-- /.theme-title -->
                        <div class="row">
                            <div class="col-sm-4 col-12">
                                <div class="single-box">
                                    <h2 class="number"><span class="timer" data-from="0" data-to="15000" data-speed="1200" data-refresh-interval="5">0</span>+</h2>
                                    <p>Customers Empowered <br>$5 billion+</p>
                                </div> <!-- /.single-box -->
                            </div>  <!-- /.col- -->
                            <div class="col-sm-4 col-12">
                                <div class="single-box">
                                    <h2 class="number"><span class="timer" data-from="0" data-to="30" data-speed="1200" data-refresh-interval="5">0</span>+</h2>
                                    <p>Times International <br>Award Winner</p>
                                </div> <!-- /.single-box -->
                            </div>  <!-- /.col- -->
                            <div class="col-sm-4 col-12">
                                <div class="single-box">
                                    <h2 class="number"><span class="timer" data-from="0" data-to="37500" data-speed="1200" data-refresh-interval="5">0</span>+</h2>
                                    <p>Completed Projects <br>$18 billion+</p>
                                </div> <!-- /.single-box -->
                            </div>  <!-- /.col- -->
                        </div> <!-- /.row -->
                    </div> <!-- /.container -->
                </div> <!-- /.opacity -->
            </div> <!-- /.feature-banner -->

{{--
            <!--
            =====================================================
                Latest Update
            =====================================================
            -->
            <div class="latest-update">
                <div class="container">
                    <div class="theme-title">
                        <h2>Check what happen inside <br>our company.</h2>
                        <a href="blog-grid.html">GO TO NEWS</a>
                    </div> <!-- /.theme-title -->

                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-sm-4 col-12">
                            <div class="single-update-post">
                                <div class="count">01</div>
                                <h4><a href="blog-details.html">The Advantages Minimal Repair Technique.</a></h4>
                                <p>September 13, 2017</p>
                            </div> <!-- /.single-update-post -->
                        </div> <!-- /.col- -->
                        <div class="col-lg-4 col-md-6 col-sm-4 col-12">
                            <div class="single-update-post">
                                <div class="count">02</div>
                                <h4><a href="blog-details.html">Effective Ways To Quit Smoking Fast.</a></h4>
                                <p>October 27, 2017</p>
                            </div> <!-- /.single-update-post -->
                        </div> <!-- /.col- -->
                        <div class="col-lg-4 d-md-none d-lg-block col-sm-4 col-12">
                            <div class="single-update-post">
                                <div class="count">03</div>
                                <h4><a href="blog-details.html">How To Stop Living Your Life On Autopilot</a></h4>
                                <p>August 15, 2017</p>
                            </div> <!-- /.single-update-post -->
                        </div> <!-- /.col- -->
                    </div> <!-- /.row -->
                </div> <!-- /.container -->
            </div> <!-- /.latest-update -->

--}}

@endsection