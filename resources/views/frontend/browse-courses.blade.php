@extends('layouts.app')

@section('title', 'Ionic LMS')
@section('content')
	<section class=" bg-light " id="popular-courses">
		<div class=" container-fluid">
			<div class="row min-vh-100 justify-content-center align-items-center  align-content-center slide-down">
				<div class="col-12 text-center slide-down">
					<h4 class=" text-uppercase mt-4 cus-font">Courses</h4>
				</div>
				<div class="row slide-down AllCourse-Row">
					@foreach ($courses as $course)
						<div class="col-11 col-md-6 col-lg-3">
							<div class=" card me-3 img-card my-5 border-0 shadow">
								<div class="">
									<img class="  item-img" src="{{ asset('images/courses-cover/' . $course->cover_url) }}" alt="">
								</div>
								<div class=" card-body">
									<p class=" my-3">
										{!! $course->overview !!}
									</p>
								</div>
								<div class=" card-footer bg-white d-flex justify-content-between align-items-center py-3">
									<div class=" d-flex justify-content-between align-items-center">
										<img class="avater-img" src="{{ asset('assets/backend/images/profile.jpg') }}" alt="">
										<p class=" mb-0 ms-2">{{ $users->find($course->instructor_id)->name }} </p>
									</div>
									@if ($course->user->contains(Auth::user()))
										<a class="FullCourse-Btn btn btn-primary" href="{{ route('frontend.course.outline', ['id' => $course->id]) }}">
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
