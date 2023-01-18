@extends('layouts.app')

@section('title', 'Ionic LMS')
@section('content')
	<section class="">
		<div class=" container">
			<div class="row min-vh-100 align-items-start mt-100 bg-white">
				<div class="col-12 col-md-12 col-lg-9">
					<div class="row mb-4 mb-lg-0">
						<div class=" mb-3">
							<video class=" w-100" src="{{ asset('/video/lessons_video/' . $course->lesson->find($active_lesson)->link) }}"
								style="background-color: rgb(17, 14, 14);" controls autoplay height="500px">
							</video>
						</div>
						<div class="d-flex justify-content-between align-items-center ">
							<div class="">
								<h3 class=" cus-font text-black">{{ $course->lesson->find($active_lesson)->title }}</h3>
								<p class=" text-black-50">{{ $course->lesson->find($active_lesson)->description }}
								</p>
							</div>
							<!-- <button class=" btn btn-light btn-lg">Buy</button> -->
						</div>
					</div>
				</div>
				<div class="col-12 col-md-12 col-lg-3">
					<div class="row mx-2 mx-lg-0 w-100 shadow">
						<ul class=" list-group p-0 " style="height: 500px;">
							<li class=" list-group-item movie-li list-style-none px-0 bg-light">
								<h5 class=" text-black text-center">Courses Overview</h4>
							</li>
							<ul class=" list-group listItemGp overflow-auto rounded-0 border-0">
								@foreach ($course->lesson as $lesson)
									<li class=" list-group-item movie-li list-style-none ">
										<a class=" text-decoration-none d-flex align-items-center"
											href="{{ route('frontend.lesson-show', ['id' => $course->id, 'active_lesson' => $lesson->id]) }}">
											<img class="cover-fit-lesson" src="{{ asset('/images/courses-cover/' . $course->cover_url) }}"
												alt="{{ $lesson->title }}" width="50px" height="50px">
											<p class=" mb-0 text-black-50 ms-3">
												{{ $lesson->title }}
											</p>
										</a>
									</li>
								@endforeach

							</ul>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection
