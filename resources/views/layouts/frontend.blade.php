<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('frontend/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link href="{{ asset('frontend/css/fontawesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/font-awesome.min.css') }}" rel="stylesheet">
	<link href="{{ asset('frontend/css/main.css') }}" rel="stylesheet">
	<link href="{{ asset('frontend/css/responsive.css') }}" rel="stylesheet">

    {{-- Font Awesome --}}
    <script src="https://kit.fontawesome.com/e0e5d17da7.js" crossorigin="anonymous"></script>
    <title>@yield('title') | Pundok Anglo</title>
    @include('layouts.style-frontend')
</head>
<body>
    <header id="header">
        <div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-md-4 clearfix">
						<div class="logo pull-left">
							{{-- <a href="index.html"><img src="{{ asset('frontend/images/home/logo.png') }}" alt="" /></a> --}}
                            <h3>Pundok Kopi Anglo</h4>
						</div>

					</div>
				</div>
			</div>
		</div><!--/header-middle-->
        <div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								{{-- <li><a href="" class="active">Home</a></li>
								<li><a href="">Contact</a></li>
								<li><a href="">Confirm</a></li> --}}
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="search_box pull-left">
							{{-- <input type="text" placeholder="Search"/> --}}
                            <h4>
                                {{-- @if (auth()->user()) --}}
                                    {{-- Username: {{ auth()->user()->name }} --}}
                                {{-- @else --}}

                                {{-- @endif --}}

                            </h4>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
    </header>

    <section id="slider">
        @yield('slider')
    </section>

    <section id="content" style="margin-bottom: 50px">
        @yield('content')
    </section>

    <script src="{{ asset('bootstrap/jquery/jquery.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    @yield('footer-scripts')
</body>
</html>
