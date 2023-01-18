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
			z-index: 2000000 !important;
		}
	</style>
	<!-- Scripts -->
	@vite(['resources/js/app.js'])
</head>

<body>
	<div id="loader"></div>
	<div id="app">
		<div class="container-fluid p-0 ">
			<div class="row g-0 ">
				<div class="col-lg-2">
					<nav class="navbar navbar-expand-lg navbar-dark bg-dark align-items-baseline vh-100 m-0" style="z-index: 20">
						<div class="container-fluid p-0 flex-column">
							<a class="navbar-brand" href="#" aria-current="page">ionic solutions</a>
							<div class="container mx-auto">
								<ul class="navbar-nav flex-column">
									<li class="nav-item">
										<a class="nav-link active" href="{{ route('dashboard.index') }}"><i
												class="fa-solid fa-gauge-high me-3"></i>Dashboard</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="{{ route('dashboard.users') }}"><i class="fa-solid fa-users me-3"></i>Users</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false"
											aria-controls="collapseExample">
											<i class="fa-solid fa-list me-3"></i>Courses
										</a>
										<div class="collapse border-start border-2 ms-3 text-muted" id="collapseExample">
											<ul class="navbar-nav flex-column">
												<li class="nav-item">
													<a class="nav-link" href="{{ route('dashboard.courses') }}">
														<small><i class=" fas fa-th me-3"></i>Course</small></a>
												</li>
												<li class="nav-item">
													<a class="nav-link" href="{{ route('dashboard.courses.create') }}">
														<small><i class="fa-solid fa-circle-plus me-3"></i>Create Course</small>
													</a>
												</li>
											</ul>
										</div>
									</li>
								</ul>
							</div>
						</div>
					</nav>
				</div>
				<div class="col-lg-10 overflow-scroll vh-100 bg-secondary top-nav-con position-relative shadow">

					<nav class="navbar navbar-expand-lg navbar-white bg-white p-0 shadow-sm position-fixed top-0 col-lg-10"
						style="z-index: 10">
						<div class="container-fluid my-2">

							<button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" type="button"
								aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
								<span class="navbar-toggler-icon"></span>
							</button>

							<div class="collapse navbar-collapse" id="navbarSupportedContent">
								<!-- Left Side Of Navbar -->

								<!-- Right Side Of Navbar -->
								<ul class="navbar-nav ms-auto">
									<!-- Authentication Links -->

									<li class="nav-item dropdown">
										<a class="nav-link dropdown-toggle border border-2 rounded-pill" id="navbarDropdown" data-bs-toggle="dropdown"
											href="#" role="button" aria-haspopup="true" aria-expanded="false" v-pre>
											<i class="bi bi-person-circle me-2"></i>{{ Auth::user()->name }}
										</a>

										<div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
											<a class="dropdown-item" href="{{ route('frontend.home') }}">
												<i class="fa-solid fa-home me-2"></i>{{ __('home') }}
											</a>
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

								</ul>
							</div>
						</div>
					</nav>
					<main class="main-section mt-5 p-5">
						<section class="h-100 ">
							@yield('content')
						</section>
					</main>

				</div>
			</div>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.6.1.min.js"
		integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

	<script src="https://cdn.tiny.cloud/1/yz5ufmqb3jje51894s3euots7qm8ita6zk7fwodrs5fipaik/tinymce/6/tinymce.min.js"
		referrerpolicy="origin"></script>
	<script>
		let loader = document.getElementById("loader");
		window.addEventListener("load", function() {
			loader.style.display = "none";
		});
	</script>
	@stack('js')
</body>

</html>
