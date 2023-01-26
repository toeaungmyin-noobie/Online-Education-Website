<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<link type="image/svg+xml" href="/vite.svg" rel="icon" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>@yield('title')</title>
	<style>
		#loader {
			background: rgb(255, 255, 255) url("http://127.0.0.1:8000/assets/frontend/images/preloader.gif") no-repeat center center !important;
			min-width: 100% !important;
			min-height: 100vh !important;
			position: fixed !important;
			z-index: 2000000 !important;
			scroll-behavior: none;
		}
	</style>
	<meta property="og:type" content="website" />
	<meta property="og:url" content="https://metatags.io/" />
	<meta property="og:title" content="LMS-fontend" />
	<meta property="og:description" content="Learning Management System" />
	<meta property="og:image"
		content="https://metatags.io/assets/meta-tags-16a33a6a8531e519cc0936fbba0ad904e52d35f34a46c97a2c9f6f7dd7d336f2.png" />
	@vite(['resources/js/app.js'])
</head>

<body>
	<div id="loader"></div>
	<div id="app">
		{{-- top navgation  --}}
		<nav class="navbar navbar-expand-lg bg-primary sticky-top">
			<div class="container-fluid">
				<a class="navbar-brand text-white cus-font pb-2 mx-3" href="{{ url('/') }}">
					OEP
				</a>
				<button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" type="button"
					aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<!-- Left Side Of Navbar -->
					<ul class="navbar-nav me-auto mb-2 mb-lg-0 text-center text-lg-start">
						<li class="nav-item">
							<a class="nav-link" href="{{ route('frontend.home') }}">Home</a>
						</li>
						<li>
							<a class="nav-link" href="{{ route('frontend.browseCourses') }}">Courses</a>
						</li>
						<li>
							<a class="nav-link" href="{{ route('frontend.browseCourses') }}">Popular Courses</a>
						</li>
						<li>
							<a class="nav-link" href="{{ route('frontend.freeCourse') }}">Free Courses</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#Blog">Blog</a>
						</li>
					</ul>

					<!-- Right Side Of Navbar -->
					<ul class="navbar-nav ms-auto">
						<!-- Authentication Links -->
						@guest
							@if (Route::has('login'))
								<li class="nav-item">
									<a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
								</li>
							@endif

							@if (Route::has('register'))
								<li class="nav-item">
									<a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
								</li>
							@endif
						@else
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" id="navbarDropdown" data-bs-toggle="dropdown" href="#" role="button"
									aria-haspopup="true" aria-expanded="false" v-pre>
									<i class="bi bi-person-circle me-2"></i>{{ Auth::user()->name }}
								</a>

								<div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
									@if (Auth::user()->hasRole(['admin', 'instructor']))
										<a class="dropdown-item" href="{{ route('dashboard.index') }}">
											<i class="fa-solid fa-gauge me-2"></i>Dashboard
										</a>
										<a class="dropdown-item" href="{{ route('frontend.profile') }}">
											<i class="fa-solid fa-gauge me-2"></i>Profile
										</a>
									@endif
									<a class="dropdown-item" href="{{ route('logout') }}"
										onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
										<i class="fa-solid fa-arrow-right-from-bracket me-2"></i>{{ __('Logout') }}
									</a>
									<form class="d-none" id="logout-form" action="{{ route('logout') }}" method="POST">
										@csrf
									</form>
								</div>
							</li>
						@endguest
					</ul>
				</div>
			</div>
		</nav>

		{{-- sections  --}}
		@yield('content')
		{{-- end-sections --}}
	</div>
	{{-- Enroll Form --}}
	<div class="modal fade" id="enrollModel" aria-labelledby="enrollForm" aria-hidden="true" tabindex="-1">
		<div class="modal-dialog modal-dialog-centered modal-sm">
			<div class="modal-content">
				<div class="modal-header bg-primary text-white">
					<h5 class="modal-title" id="enrollForm">Instructor Form</h5>
					<p class=" text-warning"></p>
					<button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close"></button>
				</div>
				<div class="modal-footer">
					<button class="btn btn-secondary" data-bs-dismiss="modal" type="button">Close</button>
					<form method="POST" action="{{ route('frontend.enroll-request') }}">
						@csrf
						<input id="idhidden" name="id" type="hidden" value="">
						<button class="btn btn-primary" id="requestbtn" type="submit">Send Request</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<script>
		let loader = document.getElementById("loader");
		window.addEventListener("load", function() {
			loader.style.display = "none";
			window.scrollTo(0, 0);
		});


		function enroll(id) {
			document.querySelector('#idhidden').value = id;
		}
	</script>
	<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
	@stack('js')
</body>

</html>
