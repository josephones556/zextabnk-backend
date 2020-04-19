<!doctype html>
<html lang="en">
<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<meta name="author" content="http://buildwithben.co" />        
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
		<title>Chartered Bank Online Banking Portal</title>
		
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
		
		<!-- Common CSS -->
		<link rel="stylesheet" href="/secure/css/bootstrap.min.css" />
		<link rel="stylesheet" href="/secure/fonts/icomoon/icomoon.css" />
		<link rel="stylesheet" href="/secure/css/main.css" />

		<!-- Other CSS includes plugins - Cleanedup unnecessary CSS -->
		<!-- Chartist css -->
		<link href="/secure/vendor/chartist/css/chartist.min.css" rel="stylesheet" />
		<link href="/secure/vendor/chartist/css/chartist-custom.css" rel="stylesheet" />
		<style type="text/css">
			.header-actions > li > a.user-settings img.avatar {
			    max-width: 40px;
			    max-height: 40px;
			    -webkit-border-radius: 20px;
			    -moz-border-radius: 20px;
			    border-radius: 20px;
			}
		</style>
		@stack('styles')

	</head>
	<body>

		<!-- Loading starts -->
		<div class="loading-wrapper">
			<div class="loading">
				<span></span>
			</div>
		</div>
		<!-- Loading ends -->

		<!-- BEGIN .app-wrap -->
		<div class="app-wrap">
			<!-- BEGIN .app-heading -->
			<header class="app-header">
				<div class="container-fluid">
					<div class="row ">
						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-8 col-8">
							<div class="logo-block">
								<a href="{{ route('secure.index' )}}" class="logo">
									<img src="/img/cb-logo.png" alt="" class="main-logo">
								</a>
								<a class="mini-nav-btn" href="#" id="app-side-mini-toggler">
									<i class="icon-th-menu"></i>
								</a>
								<a href="#app-side" data-toggle="onoffcanvas" class="onoffcanvas-toggler" aria-expanded="true">
									<i class="icon-th-menu"></i>
								</a>
							</div>
						</div>
						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-4 col-4">
							<ul class="header-actions">
								<li class="dropdown">
									<a href="#" id="userSettings" class="user-settings" data-toggle="dropdown" aria-haspopup="true">
										<span class="user-name text-truncate">{{ auth()->user()->isAn('active') ? auth()->user()->account->firstname . ' ' . auth()->user()->account->lastname : auth()->user()->username }}</span>
										@if($user->isAn('active'))
										<img class="avatar" style="" src="/storage/{{  auth()->user()->account->picture }}" alt="User Thumb">
										@endif 
										<i class="icon-chevron-small-down"></i>
									</a>
									<div class="dropdown-menu lg dropdown-menu-right" aria-labelledby="userSettings">
										<ul class="user-settings-list">
											<li>
												<a href="{{ route('secure.account') }}">
													<div class="icon">
														<i class="icon-account_circle"></i>
													</div>
													<p>Account</p>
												</a>
											</li>
											<li>
												<a href="{{ route('secure.card') }}">
													<div class="icon red">
														<i class="icon-credit-card"></i>
													</div>
													<p>Manage Card</p>
												</a>
											</li>
											<li>
												<a href="{{ route('secure.transactions') }}">
													<div class="icon yellow">
														<i class="icon-schedule"></i>
													</div>
													<p>Transactions</p>
												</a>
											</li>
										</ul>
										<div class="logout-btn">
											<a href="{{ route('logout') }}"
	                               				onclick="event.preventDefault();
	                                            document.getElementById('logout-form').submit();"
	                                            class="btn btn-primary">{{ __('Logout') }}
	                                        </a>
										</div>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</header>
			<!-- END: .app-heading -->
			<!-- BEGIN .app-container -->
			<div class="app-container">
				<!-- BEGIN .app-side -->
				<aside class="app-side fixed" id="app-side">
					<!-- BEGIN .side-content -->
					<div class="side-content ">
						<!-- BEGIN .user-profile -->
						<div class="user-profile">
							@if($user->isAn('active'))
							<img src="/storage/{{  auth()->user()->account->picture }}" class="profile-thumb" alt="User Thumb">
							@endif
							<h6 class="profile-name">{{ auth()->user()->isAn('active') ? auth()->user()->account->firstname . ' ' . auth()->user()->account->lastname : auth()->user()->username }}</h6>
							<ul class="profile-actions">
								<li>
									<a href="{{ route('secure.account') }}">
										<i class="icon-account_circle"></i>
									</a>
								</li>
								<li>
									<a href="{{ route('logout') }}"
	                               				onclick="event.preventDefault();
	                                            document.getElementById('logout-form').submit();">
										<i class="icon-export"></i>
									</a>
								</li>
							</ul>
						</div>
						<!-- END .user-profile -->
						<!-- BEGIN .side-nav -->
						<div class="sidebarNavScroll">
							<nav class="side-nav">
								<!-- BEGIN: side-nav-content -->
								<ul class="unifyMenu" id="unifyMenu">
									<li class="{{ \Route::currentRouteName() == 'secure.index' ? 'selected' : '' }}">
										<a href="{{ route('secure.index') }}">
											<span class="has-icon">
												<i class="icon-home"></i>
											</span>
											<span class="nav-title">Home</span>
										</a>
									</li>
									<li class="{{ \Route::currentRouteName() == 'secure.transfer' ? 'selected' : '' }}">
										<a href="{{ route('secure.transfer') }}">
											<span class="has-icon">
												<i class="icon-swap"></i>
											</span>
											<span class="nav-title">Transfer</span>
										</a>
									</li>
									<li class="{{ \Route::currentRouteName() == 'secure.card' ? 'selected' : '' }}">
										<a href="{{ route('secure.card') }}">
											<span class="has-icon">
												<i class="icon-credit-card"></i>
											</span>
											<span class="nav-title">Manage Card</span>
										</a>
									</li>
									<li class="{{ \Route::currentRouteName() == 'secure.transactions' || \Route::currentRouteName() == 'secure.invoice' ? 'selected' : '' }}">
										<a href="{{ route('secure.transactions') }}">
											<span class="has-icon">
												<i class="icon-watch_later"></i>
											</span>
											<span class="nav-title">Transactions</span>
										</a>
									</li>
									<li class="{{ \Route::currentRouteName() == 'secure.account' ? 'selected' : '' }}">
										<a href="{{ route('secure.account') }}">
											<span class="has-icon">
												<i class="icon-user3"></i>
											</span>
											<span class="nav-title">Account</span>
										</a>
									</li>
								</ul>
								<!-- END: side-nav-content -->
							</nav>
						</div>
						<!-- END: .side-nav -->
					</div>
					<!-- END: .side-content -->
				</aside>
				<!-- END: .app-side -->

				@yield('content')
                @guest
                @else
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @endguest
			</div>
			<!-- END: .app-container -->
			<!-- BEGIN .main-footer -->
			<footer class="main-footer fixed-btm">
				Copyright Chartered Bank {{ date('Y') }}.
			</footer>
			<!-- END: .main-footer -->
		</div>
		<!-- END: .app-wrap -->

		<!-- jQuery first, then Tether, then other JS. -->
		<script src="/secure/js/jquery.js"></script>
		<script src="/secure/js/tether.min.js"></script>
		<script src="/secure/js/bootstrap.min.js"></script>
		<script src="/secure/vendor/unifyMenu/unifyMenu.js"></script>
		<script src="/secure/vendor/onoffcanvas/onoffcanvas.js"></script>
		<script src="/secure/js/moment.js"></script>

		<!-- News ticker -->
		<script src="/secure/vendor/newsticker/newsTicker.min.js"></script>
		<script src="/secure/vendor/newsticker/custom-newsTicker.js"></script>

		<!-- Slimscroll JS -->
		<script src="/secure/vendor/slimscroll/slimscroll.min.js"></script>
		<script src="/secure/vendor/slimscroll/custom-scrollbar.js"></script>

		<!-- Chartist JS -->
		<script src="/secure/vendor/chartist/js/chartist.min.js"></script>
		<script src="/secure/vendor/chartist/js/chartist-tooltip.js"></script>

		<!-- Common JS -->
		<script src="/secure/js/common.js"></script>

		@stack('js')
		
	</body>
</html>