<!DOCTYPE html>
<html lang="en">
    
<head>
        <meta charset="UTF-8">
        <!-- For IE -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="robots" content="noindex,nofollow">

        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>Chartered Bank - @yield('title')</title>
        <link rel="apple-touch-icon" sizes="57x57" href="/favicons/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="/favicons/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="/favicons/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="/favicons/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="/favicons/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="/favicons/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="/favicons/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="/favicons/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="/favicons/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="/favicons/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicons/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="/favicons/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicons/favicon-16x16.png">
        <link rel="manifest" href="/favicons/manifest.json">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="/favicons/ms-icon-144x144.png">
        <meta name="theme-color" content="#ffffff">


        <!-- Main style sheet -->
        <link rel="stylesheet" type="text/css" href="/front/css/style.css">
        <!-- responsive style sheet -->
        <link rel="stylesheet" type="text/css" href="/front/css/responsive.css">


        <!-- Fix Internet Explorer ______________________________________-->

        <!--[if lt IE 9]>
            <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
            <script src="vendor/html5shiv.js"></script>
            <script src="vendor/respond.js"></script>
        <![endif]-->

            
    </head>

    <body>
        <div class="main-page-wrapper">

            <!-- ===================================================
                Loading Transition
            ==================================================== -->
            <div id="loader-wrapper">
                <div id="loader"></div>
            </div>

            

            <!-- 
            =============================================
                Theme Header
            ============================================== 
            -->
            <header class="theme-menu-wrapper">
                <div class="container">
                    <div class="top-header clearfix">
                        
                        @guest 
                        
                        @else
                            <div class="float-left greeting-text"><span>Hello,
                            </span> <p class="">{{ auth()->user()->isAn('active') ? auth()->user()->account->firstname : auth()->user()->username }}</p></div>

                        @endguest

                        <ul class="float-right">
                            <li>email customer-care@charteredbank.online</li>
                            {{--
                            <li><a href="#" class="tran3s"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="#" class="tran3s"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a href="#" class="tran3s"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                            <li><a href="#" class="tran3s"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                            --}}
                        </ul>
                    </div> <!-- /.top-header -->
                    <div class="main-header-menu-wrapper clearfix">
                        <!-- Logo -->
                        <div class="logo float-left"><a href="{{ route('welcome') }}"><img src="/img/cb-logo.png" alt="Logo" style="max-width: 30px; display: inline-block; margin-top: -10px;"> <h3 style="display: inline-block; color: #1455a6;">Chartered Bank</h3></a></div>

                        <!-- ============================ Theme Menu ========================= -->
                        <nav class="navbar-expand-lg float-right navbar-light" id="mega-menu-wrapper">
                            <button class="navbar-toggler float-right clearfix" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                                <i class="flaticon-menu-options"></i>
                            </button>
                            <div class="collapse navbar-collapse clearfix" id="navbarNav">
                              <ul class="navbar-nav nav">
                                <li class="nav-item dot-fix">
                                    <a class="nav-link" href="{{ route('welcome') }}">Home</a>
                                </li>
                                <li class="nav-item dot-fix">
                                    <a class="nav-link" href="{{ route('loans') }}">Loans</a>
                                </li>
                                @guest
                                <li class="nav-item dot-fix">
                                    <a class="nav-link" href="{{ route('login') }}">Secured Login</a>
                                </li>
                                @else
                                <li class="nav-item dot-fix">
                                    <a class="nav-link" href="{{ route('secure.index') }}">View Account</a>
                                </li>
                                @endguest
                                <li class="nav-item dot-fix">
                                    <a class="nav-link" href="{{ route('welcome') }}">About CB</a>
                                </li>
                              </ul>
                            </div>
                        </nav>
                    </div> <!-- /.main-header-menu-wrapper -->
                </div> <!-- /.container -->
            </header> <!-- /.theme-menu-wrapper -->

            @yield('content')


            <!--
            =====================================================
                Footer
            =====================================================
            -->
            <footer class="theme-footer mb-4">
                <div class="container">
                    <div class="content-wrapper">

                        <div class="footer-bottom-wrapper row">
                            <div class="col-lg-3 col-sm-6 col-12 footer-logo">
                                <div class="logo">
                                    <a href="index.html">
                                        <img src="/img/cb-logo.png" alt="Logo" style="max-width: 30px; display: inline-block; margin-top: -10px;">
                                        <h3 style="display: inline-block; color: #1455a6;">Chartered Bank</h3>
                                    </a>
                                </div>
                                <br>
                                customer-care@charteredbank.online
                            </div> <!-- /.footer-logo -->
                            <div class="col-lg-3 col-sm-6 col-12 footer-list">
                                <h4>Quick Links</h4>
                                <ul>
                                    <li><a href="#">How it Works</a></li>
                                    <li><a href="#">Guarantee</a></li>
                                </ul>
                            </div> <!-- /.footer-list -->
                            <div class="col-lg-3 col-sm-6 col-12 footer-list">
                                <h4>About Us</h4>
                                <ul>
                                    <li><a href="about-us.html">About Singleton</a></li>
                                    <li><a href="#">Jobs</a></li>
                                </ul>
                            </div> <!-- /.footer-list -->
                            <div class="col-lg-3 col-sm-6 col-12 footer-list">
                                <h4>Become A Member</h4>
                                <ul>
                                    <li><a href="#">Contributor</a></li>
                                    <li><a href="#">Union Member</a></li>
                                </ul>
                            </div> <!-- /.footer-list -->
                        </div> <!-- /.footer-bottom-wrapper -->


<!--                         <div class="copyright-wrapper row">
                            <div class="col-md-6 col-sm-8 col-12">
                                <p>© 2017 <a href="#">CreativeGigs.</a> All rights reserved</p>
                            </div>
                            <div class="col-md-6 col-sm-4 col-12">
                                <ul>
                                    <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div> --> <!-- /.copyright-wrapper -->
                    </div>
                </div> <!-- /.container -->
            </footer> <!-- /.theme-footer -->
            

            

            <!-- Scroll Top Button -->
            <button class="scroll-top tran3s">
                <i class="fa fa-angle-up" aria-hidden="true"></i>
            </button>
            


        <!-- Optional JavaScript _____________________________  -->

        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <!-- jQuery -->
        <script src="/front/vendor/jquery.2.2.3.min.js"></script>
        <!-- Popper js -->
        <script src="/front/vendor/popper.js/popper.min.js"></script>
        <!-- Bootstrap JS -->
        <script src="/front/vendor/bootstrap/js/bootstrap.min.js"></script>
        <!-- Camera Slider -->
        <script src='/front/vendor/Camera-master/scripts/jquery.mobile.customized.min.js'></script>
        <script src='/front/vendor/Camera-master/scripts/jquery.easing.1.3.js'></script> 
        <script src='/front/vendor/Camera-master/scripts/camera.min.js'></script>
        <!-- Select JS -->
        <script src="/front/vendor/select2-master/dist/js/select2.min.js"></script>
        <!-- Mega menu  -->
        <script src="/front/vendor/bootstrap-mega-menu/js/menu.js"></script>
        <!-- WOW js -->
        <script src="/front/vendor/WOW-master/dist/wow.min.js"></script>
        <!-- owl.carousel -->
        <script src="/front/vendor/owl-carousel/owl.carousel.min.js"></script>
        <!-- js count to -->
        <script src="/front/vendor/jquery.appear.js"></script>
        <script src="/front/vendor/jquery.countTo.js"></script>
        <!-- js ui -->
        <script src="/front/vendor/jquery-ui/jquery-ui.min.js"></script>
        <!-- Fancybox -->
        <script src="/front/vendor/fancybox/dist/jquery.fancybox.min.js"></script>

        <!-- Theme js -->
        <script src="/front/js/theme.js"></script>
        </div> <!-- /.main-page-wrapper -->
    </body>

</html>