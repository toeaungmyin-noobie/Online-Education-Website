@extends('layouts.app')

@section('title', 'Ionic LMS')
@section('content')

	<div class=" container">
		<div class=" row min-vh-100 justify-content-center mt-5">
			<div class=" col-lg-8">
				<div class=" bg-white shadow-sm rounded p-2">
					<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
						<li class="nav-item" role="presentation">
							<button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home"
								type="button" role="tab" aria-controls="pills-home" aria-selected="true">Course Outline</button>
						</li>
						<li class="nav-item" role="presentation">
							<button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile"
								type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Description</button>
						</li>
						<li class="nav-item" role="presentation">
							<button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact"
								type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Review</button>
						</li>
						<li class="nav-item" role="presentation">
							<button class="nav-link" id="pills-disabled-tab" data-bs-toggle="pill" data-bs-target="#pills-disabled"
								type="button" role="tab" aria-controls="pills-disabled" aria-selected="false">Transcript</button>
						</li>
					</ul>
					<div class="tab-content" id="pills-tabContent">
						<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab"
							tabindex="0">
							<div class="accordion accordion-flush" id="accordionFlushExample">
								@foreach ($course->lesson as $lesson)
									<div class="accordion-item">
										<h2 class="accordion-header" id="flush-headingOne">
											<button class="accordion-button collapsed font" data-bs-toggle="collapse"
												data-bs-target="#flush-collapse{{ $loop->index }}" type="button" aria-expanded="true"
												aria-controls="flush-collapse{{ $loop->index }}">
												{{ $lesson->title }}
											</button>
										</h2>
										<div class="accordion-collapse collapse " id="flush-collapse{{ $loop->index }}"
											data-bs-parent="#accordionFlushExample" aria-labelledby="flush-headingOne">
											<div class="accordion-body">
												<div>
													<a class="btn d-flex justify-content-between align-items-center course-link"
														href="{{ route('frontend.lesson-show', ['id' => $course->id, 'active_lesson' => $lesson->id]) }}">
														<p class=" mb-0 text">
															<span class=" me-2">
																<i class="bi bi-play-circle text-primary fs-5"></i>
															</span>{{ $lesson->description }}
														</p>
														<p class=" mb-0">4 min<span class=" ms-1">30 s</span></p>
													</a>
												</div>
											</div>
										</div>
									</div>
								@endforeach
								<div class="accordion-item">
									<h2 class="accordion-header" id="flush-headingOne">
										<button class="accordion-button collapsed font" data-bs-toggle="collapse" data-bs-target="#flush-collapseFinal"
											type="button" aria-expanded="true" aria-controls="flush-collapseFinal">
											Description
										</button>
									</h2>
									<div class="accordion-collapse collapse show" id="flush-collapseFinal" data-bs-parent="#accordionFlushExample"
										aria-labelledby="flush-headingOne">
										<div class="accordion-body">
											<div>
												<a class="btn d-flex justify-content-between align-items-center course-link" href="">
													<p class=" mb-0 text">
														{!! $course->overview !!}
													</p>
												</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class=" col-lg-4">
				<div class=" bg-white">
					<div class=" card video-card bg-white shadow-sm border-0 rounded-2">
						<div class="m-2">
							<video class=" w-100 rounded" id="video" muted>
								<source src="{{ asset('/video/lessons_video/' . $course->lesson->find($active_lesson)->link) }}"
									type="video/mp4">
							</video>
						</div>
						<div class=" card-body">
							<h3 class=" fw-bold mb-3">
								@if ($course->price == 0)
									{{ 'FREE' }}
								@else
									{{ $course->price . 'MMK' }}
								@endif
							</h3>
							<div class=" text-center">
								<a class=" btn btn-primary w-75 btn-lg py-2" href="{{ route('frontend.course-detail', ['id' => $course->id]) }}">
									Start
								</a>
								<a class=" btn btn-outline-primary w-75 btn-lg my-3 py-2" href="#">
									Get Full Course
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection
@push('js')
	<script></script>
@endpush
