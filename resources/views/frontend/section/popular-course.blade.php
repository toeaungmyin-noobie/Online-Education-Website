{{-- <section class="bg-light" id="popular-courses">
	<div class="container">
		<div class="row min-vh-100 justify-content-center align-items-center slide-down">
			<div class="col-12 col-lg-12">
				<div class="glider-contain">
					<div class="mb-4 text-center text-lg-start">
						<h3>Most Popular Courses</h3>
					</div>
					<div class="glider-width">
						<button class="glider-prev">
							<i class="fa-solid fa-angle-left"></i>
						</button>
					</div>
					<div class="glider-1">
						@foreach ($courses as $course)
							<div class="card mx-3 img-card border-0 shadow-sm">
								<div class=" position-relative">
									<img class="item-img" src="{{ asset('images/courses-cover/' . $course->cover_url) }}" alt="" />
									<div class=" bg-danger text-white px-3 py-2 position-absolute top-0 start-0">
										{{ $course->price }}
									</div>
								</div>
								<div class="card-body">
									<p class="my-3">
										{!! $course->overview !!}
									</p>
								</div>
								<div class="card-footer bg-white d-flex justify-content-between align-items-center py-3">
									<div class="d-flex justify-content-between align-items-center">
										<img class="avater-img" src="{{ asset('assets/backend/images/profile.jpg') }}" alt="" />
										<p class="mb-0 ms-2">{{ $user->find($course->instructor_id)->name }}</p>
									</div>
									@if ($course->user->contains(Auth::user()))
										<a class="FullCourse-Btn btn btn-primary" href="{{ route('frontend.course-detail', ['id' => $course->id]) }}">
											View
										</a>
									@else
										<form id="enroll-form" action="{{ route('frontend.enroll-request', ['id' => $course->id]) }}" method="get">
										</form>
										<button class="FullCourse-Btn btn btn-primary enroll" type="button">
											Entroll
										</button>
									@endif
								</div>
							</div>
						@endforeach

					</div>
					<div class="glider-width">
						<button class="glider-next">
							<i class="fa-solid fa-angle-right"></i>
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</section> --}}
<section class="bg-light" id="popular-courses">
	<div class="container">
		<div class="row min-vh-100 justify-content-center align-items-center slide-down">
			<div class="col-12 col-lg-12">
				<div class="glider-contain">
					<div class="mb-4 text-center text-lg-start">
						<h3>Most Popular</h3>
					</div>
					<div class="glider-width">
						<button class="glider-prev">
							<i class="bi bi-arrow-left-short"></i>
						</button>
					</div>
					<div class="glider">
						@foreach ($popular_courses as $course)
							<div class="card mx-3 img-card border-0 shadow">
								<div class="">
									<img class="item-img" src="{{ asset('images/courses-cover/' . $course->cover_url) }}" alt="" />
								</div>
								<div class="card-body">
									<p class="my-3">
										{!! $course->overview !!}
									</p>
								</div>
								<div class="card-footer bg-white d-flex justify-content-between align-items-center py-3">
									<div class="d-flex justify-content-between align-items-center">
										<img class="avater-img" src="{{ asset('assets/backend/images/profile.jpg') }}" alt="" />
										<p class="mb-0 ms-2">{{ $users->find($course->instructor_id)->name }}</p>
									</div>
									@if ($course->user->contains(Auth::user()))
										<a class="FullCourse-Btn btn btn-primary"
											href="{{ route('frontend.course.outline', ['id' => $course->id]) }}">
											View
										</a>
									@else
										<button class="FullCourse-Btn btn btn-primary enroll" data-bs-toggle="modal" data-bs-target="#enrollModel"
											type="button" onclick="enroll({{ $course->id }})">
											Entroll
										</button>
									@endif
								</div>
							</div>
						@endforeach

					</div>
					<div class="glider-width">
						<button class="glider-next">
							<i class="bi bi-arrow-right-short"></i>
						</button>
					</div>
					<div class="dots"></div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="bg-white" id="free-courses">
	<div class="container">
		<div class="row min-vh-100 justify-content-center align-items-center align-content-center slide-down">
			<div class="col-12">
				<div class="text-center my-5 slide-down">
					<h3 class="">Free Courses</h3>
				</div>
			</div>
			<div class="col-12 col-lg-12">
				<div class="d-flex justify-content-center align-items-center">
					<div class="glider-width">
						<button class="glider-pre">
							<i class="bi bi-arrow-left"></i>
						</button>
					</div>
					<div class="Glider">
						@foreach ($free_courses as $course)
							<div class="card mx-3 img-card border-0 shadow">
								<div class="">
									<img class="item-img" src="{{ asset('images/courses-cover/' . $course->cover_url) }}" alt="" />
								</div>
								<div class="card-body">
									<p class="my-3">
										{!! $course->overview !!}
									</p>
								</div>
								<div class="card-footer bg-white d-flex justify-content-between align-items-center py-3">
									<div class="d-flex justify-content-between align-items-center">
										<img class="avater-img" src="{{ asset('assets/backend/images/profile.jpg') }}" alt="" />
										<p class="mb-0 ms-2">{{ $users->find($course->instructor_id)->name }}</p>
									</div>

									@if ($course->user->contains(Auth::user()))
										<a class="FullCourse-Btn btn btn-primary"
											href="{{ route('frontend.course.outline', ['id' => $course->id]) }}">
											View
										</a>
									@else
										<button class="FullCourse-Btn btn btn-primary" data-bs-toggle="modal" data-bs-target="#enrollModel"
											type="button" onclick="enroll({{ $course->id }})">
											Entroll
										</button>
									@endif
								</div>
							</div>
						@endforeach

					</div>
					<div class="glider-width">
						<button class="glider-nex">
							<i class="bi bi-arrow-right"></i>
						</button>
					</div>
					<div class="dots"></div>
				</div>
			</div>
		</div>
	</div>
</section>
