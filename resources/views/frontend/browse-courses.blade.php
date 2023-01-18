@extends('layouts.app')

@section('title', 'Ionic LMS')
@section('content')
	<section class=" bg-light mt-5" id="popular-courses">
		<div class=" container-fluid">
			<div class="row min-vh-100 justify-content-center align-items-center  align-content-center slide-down">
				<div class="col-12 text-center slide-down">
					<h4 class=" text-uppercase mt-4 cus-font "> Courses of Ionic Solutions</h4>
					<div class="col-md-3  mx-auto my-5">
						<div class="input-group mb-3">
							<input class="form-control" id="" name="" type="text">
							<span class="input-group-text p-0 overflow-hidden " id="basic-addon2">
								<a class="btn btn-outline-primary search-btn" href="#">
									<i class="fa-solid fa-magnifying-glass"></i>
								</a>
							</span>
						</div>

					</div>
				</div>
				<div class="row slide-down">
					@foreach ($courses as $course)
						<div class="col-12 col-md-6 col-lg-3">
							<div class=" card mx-3 img-card my-5 border-0 shadow">
								<div class="">
									<img class="  item-img" src="{{ asset('images/courses-cover/' . $course->cover_url) }}" alt="">
								</div>
								<div class=" card-body">
									<p class=" my-3">
										{!! $course->overview !!}
									</p>
								</div>
								<div class=" card-footer bg-white d-flex justify-content-between align-items-center py-3">
									<div class="d-flex justify-content-between align-items-center">
										<img class="avater-img" src="{{ asset('assets/backend/images/profile.jpg') }}" alt="">
										<p class=" mb-0 ms-2">{{ $user->find($course->instructor_id)->name }} </p>
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
						</div>
					@endforeach
				</div>
			</div>
		</div>
	</section>
@endsection
@push('js')
	<script>
		document.querySelector('.enroll').addEventListener('click', () => {
			document.querySelector('#enroll-form').submit();
		});
	</script>
@endpush
