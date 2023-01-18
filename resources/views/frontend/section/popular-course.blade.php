<section class="bg-light" id="popular-courses">
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
</section>
