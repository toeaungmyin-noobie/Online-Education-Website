@extends('layouts.app')

@section('title', 'Ionic LMS')
@section('content')
	<section id="profile">
		<div class=" container">
			<div class="row min-vh-100 justify-content-center align-items-center">
				<div class=" col-lg-6">
					<div class=" bg-white rounded shadow-sm p-4">
						<div class=" text-center">
							<img class=" profile-img" src="{{ asset('assets/backend/images/profile.jpg') }}" alt="">
						</div>
						<div>
							<h4 class=" text-center mt-4" id="name">{{ Auth::user()->name }}</h4>
							<div class=" d-flex justify-content-between align-items-center mt-4">
								<p class=" mb-0 ps-3">email</p>
								<p class=" mb-0" id="usermail">{{ Auth::user()->email }}</p>
							</div>
							<div class="accordion accordion-flush mt-3" id="accordionFlushExample">
								<div class="accordion-item">
									<h2 class="accordion-header" id="flush-headingOne">
										<button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne"
											type="button" aria-expanded="false" aria-controls="flush-collapseOne">
											Attended Course
										</button>
									</h2>
									<div class="accordion-collapse collapse show" id="flush-collapseOne" data-bs-parent="#accordionFlushExample"
										aria-labelledby="flush-headingOne">
										<div class="accordion-body">
											<ul>
												@foreach (Auth::user()->courses as $course)
													<li>{{ $course->title }}</li>
												@endforeach
											</ul>
										</div>
									</div>
								</div>
							</div>
							<div class=" text-center mt-3">
								<a class="btn btn-outline-primary" href="{{ route('password.request') }}">Password Reset</a>
								<a class=" btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" href="#">Edit
									Profile</a>
								<a class=" btn btn-outline-primary" href="{{ route('logout') }}"
									onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
									<i class="fa-solid fa-arrow-right-from-bracket me-2"></i>{{ __('Logout') }}
								</a>
								<form class="d-none" id="logout-form" action="{{ route('logout') }}" method="POST">
									@csrf
								</form>
							</div>
							<!-- Modal -->
							<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
								aria-labelledby="staticBackdropLabel" aria-hidden="true" tabindex="-1">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<h1 class="modal-title fs-5" id="staticBackdropLabel">Your Profile</h1>
											<button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close"></button>
										</div>
										<div class="modal-body">
											<form action="">
												<input class=" form-control mb-3 border-0 shadow" id="Username" type="text" placeholder="Username">
												<input class=" form-control mb-3 border-0 shadow" id="email" type="email" placeholder="email">
												<input class=" form-control mb-3 border-0 shadow" id="pw" type="password" placeholder="password">
												<div class=" form-check">
													<input class=" form-check-input" id="showPwBtn" type="checkbox">
													<label class=" form-check-label">show password</label>
												</div>
											</form>
										</div>
										<div class="modal-footer">
											<button class="btn btn-secondary" data-bs-dismiss="modal" type="button">Close</button>
											<button class="btn btn-primary" id="SaveChangeBtn" data-bs-dismiss="modal" type="button">Save
												Changes</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection
