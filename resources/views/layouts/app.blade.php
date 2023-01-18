<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>@yield('title')</title>
	<style>
		#loader {
			background: rgb(255, 255, 255) url('http://127.0.0.1:8000/assets/frontend/images/preloader.gif') no-repeat center center !important;
			min-width: 100% !important;
			min-height: 100vh !important;
			position: fixed !important;
			top: 0;
			z-index: 2000000 !important;
			overflow: hidden;
		}
	</style>
	@vite(['resources/js/app.js'])
</head>

<body>
	<div id="loader"></div>
	<div id="app">
		{{-- top navgation  --}}
		<nav class="navbar navbar-expand-md navbar-dark bg-primary p-0 fixed-top position-fixed">
			<div class="container">
				<a class="navbar-brand" href="{{ url('/') }}">
					Ionic
				</a>
				<button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" type="button"
					aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<!-- Left Side Of Navbar -->
					<ul class="navbar-nav me-auto mb-2 mb-lg-0">
						<li class="nav-item">
							<a class="nav-link active" href="{{ route('frontend.home') }}">Home</a>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#page" role="button"
								aria-expanded="false">
								Courses
							</a>
							<ul class="dropdown-menu">
								<li><a class="dropdown-item" href="{{ route('frontend.browseCourses') }}">All Courses</a></li>
								<li>
									<hr class="dropdown-divider" />
								</li>
								<li>
									<a class="dropdown-item" href="{{ route('frontend.browseCourses') }}">Popular Courses</a>
								</li>
								<li>
									<hr class="dropdown-divider" />
								</li>
								<li><a class="dropdown-item" href="{{ route('frontend.browseCourses') }}">Free Courses</a></li>
							</ul>
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
	</div>
	<script>
		let loader = document.getElementById("loader");
		window.addEventListener("load", function() {
			loader.style.display = "none";
		});
	</script>
	<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
	@stack('js')
</body>

</html>
