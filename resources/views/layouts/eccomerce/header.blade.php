<!DOCTYPE html>
<html lang="en">
<head>
	<title>@yield('title')</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('') }}/eccomerce/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('') }}/eccomerce/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('') }}/eccomerce/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('') }}/eccomerce/fonts/linearicons-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('') }}/eccomerce/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{ asset('') }}/eccomerce/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('') }}/eccomerce/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('') }}/eccomerce/vendor/slick/slick.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('') }}/eccomerce/vendor/MagnificPopup/magnific-popup.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('') }}/eccomerce/vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('') }}/eccomerce/css/util.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('') }}/eccomerce/css/main.css">
<!--===============================================================================================-->
	<link rel="stylesheet" href="{{ asset('') }}/eccomerce/css/extra.css">

	@yield('css')
</head>
<body class="animsition">
	
	<!-- Header -->
	<header>
		<!-- Header desktop -->
		<div class="container-menu-desktop">
			<!-- Topbar -->
			<div class="top-bar">
				<div class="content-topbar flex-sb-m h-full container">
					<div class="right-top-bar flex-w h-full">
						<a href="https://instagram.com/sidik_221" class="flex-c-m trans-04 p-lr-10">
							<i class="fa fa-instagram"></i>
						</a>

						<a href="https://facebook.com/sidikali11" class="flex-c-m trans-04 p-lr-10">
							<i class="fa fa-facebook"></i>
						</a>

						<a href="https://twitter.com/alisidik221" class="flex-c-m trans-04 p-lr-10">
							<i class="fa fa-twitter"></i>
						</a>
					</div>
					<div class="topbar-right">
						
						@auth
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="z-index: 999;">
							  Hello, {{ Auth::user()->name }}
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" style="z-index: 999">
							  <a class="dropdown-item" href="{{ route('user.profil') }}">Account Profile</a>
							  <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
								Logout
							  </a>
							</div>
						  </li>
						<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
							@csrf
						</form>
						@endauth
						@guest	
							<a href="{{ route('login') }}">Sign In</a> / <a href="{{ route('register') }}">Sign Up</a>
						@endguest
					</div>
				</div>
			</div>

			<div class="wrap-menu-desktop" style="z-index: 1">
				<nav class="limiter-menu-desktop container">
					
					<!-- Logo desktop -->		
					<a href="{{ route('eccomerce.index') }}" class="logo text-uppercase text-dark">
						<h3><span class="font-weight-bold">Rea</span>Book</h3>
					</a>

					<!-- Menu desktop -->
					<div class="menu-desktop">
						<ul class="main-menu">
							<li class="{{ request()->is('books') ? "active-menu" : "" }}">
								<a href="{{ route('eccomerce.product') }}">All Books</a>
							</li>
							<li class="{{ request()->is('category*') ? "active-menu" : "" }}">
								<a href="#">Categories</a>
								<ul class="sub-menu">
									@foreach($categories as $category)
									<li><a href="{{ route('eccomerce.category', $category->slug) }}">{{ $category->name }}</a></li>
									@endforeach
								</ul>
							</li>
							<li class="{{ request()->is('request') ? "active-menu" : "" }}">
								<a href="{{ route('eccomerce.request') }}">Request a Book</a>
							</li>
							<li class="{{ request()->is('about') ? "active-menu" : "" }}">
								<a href="{{ route('eccomerce.about') }}">About</a>
							</li>

						</ul>
					</div>

					
					<!-- Icon header -->
					<div class="wrap-icon-header chart-icon flex-w flex-r-m">
						<a href="{{ route('cart.index') }}" class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11">
							<i class="fa fa-shopping-cart" aria-hidden="true"></i>
							@auth
							<span class="chart-number"> {{ App\Cart::where('users_id', Auth::user()->id)->get()->count() }} </span>
							@endauth
							@guest
							<span class="chart-number"> 0 </span>
							@endguest
						</a>
					</div>
				</nav>
			</div>	
		</div>

		<!-- Header Mobile -->
		<div class="wrap-header-mobile">
			<!-- Logo moblie -->		
			<div class="logo-mobile">
				<a href="{{ route('eccomerce.index') }}" class="logo text-uppercase text-dark">
					<h3><span class="font-weight-bold">Rea</span>Book</h3>
				</a>
			</div>

			<!-- Icon header -->
			<div class="wrap-icon-header flex-w flex-r-m m-r-15">
				<a href="{{ route('cart.index') }}" class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10">
					<i class="zmdi zmdi-shopping-cart"></i>
				</a>

				<li class="nav-item dropdown">
			        <a class="nav-link icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			          <i class="zmdi zmdi-account"></i>
			        </a>
			        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
			          @auth
			          <a class="dropdown-item" href="{{ route('user.index') }}">Account Profile</a>
			          <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
			          @endauth

			          @guest
			          <a class="dropdown-item" href="{{ route('login') }}">Sign In</a>
			          <a class="dropdown-item" href="{{ route('register') }}">Sign Up</a>
			          @endguest
			        </div>
			    </li>
			</div>

			<!-- Button show menu -->
			<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</div>
		</div>


		<!-- Menu Mobile -->
		<div class="menu-mobile">

			<ul class="main-menu-m">
				<li>
					<a href="index.html">Categories</a>
					<ul class="sub-menu-m">
						@foreach($categories as $category)
						<li><a href="{{ route('eccomerce.category', $category->slug) }}">{{ $category->name }}</a></li>
						@endforeach
					</ul>
					<span class="arrow-main-menu-m">
						<i class="fa fa-angle-right" aria-hidden="true"></i>
					</span>
				</li>

				<li>
					<a href="{{ route('eccomerce.product') }}">All Books</a>
				</li>
				
				<li>
					<a href="{{ route('eccomerce.request') }}">Request a Book</a>
				</li>

				<li>
					<a href="{{ route('eccomerce.about') }}">About</a>
				</li>

			</ul>
		</div>
	</header>
