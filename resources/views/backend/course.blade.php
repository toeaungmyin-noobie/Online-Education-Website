@extends('layouts.admin')

@section('title', 'Dashboard')
@section('content')
	<div class="container ">
		<div class="col-md-12 mb-3 bg-white p-4 shadow-sm rounded">
			<div class="row">
				<div class="col-lg-4">
					@can('edit course')
						<a class="btn btn-dark" href="{{ route('dashboard.courses.create') }}">Create New Course</a>
					@endcan
				</div>
				<div class="col-lg-8">
					<form action="">
						@csrf
						<div class="col-lg-6 ms-auto ">
							<div class="input-group">
								<input class="form-control" id="" name="" type="text" aria-describedby="helpId"
									placeholder="">
								<button class="btn btn-dark"><i class="fa-solid fa-magnifying-glass"></i></button>
							</div>
						</div>
					</form>
				</div>
				@if (session()->has('success'))
					<div class="col-lg-12 mt-3">
						<div class="alert alert-success" role="alert">
							{{ session('success') }}
						</div>
					</div>
				@endif
			</div>
		</div>

		<div class="row">
			@foreach ($courses as $course)
				<div class="col-lg-4 mb-3 ">
					<div class="bg-white p-0 shadow rounded overflow-hidden">
						<a class=" text-decoration-none" href="{{ route('dashboard.courses.show', ['id' => $course->id]) }}">
							<div class="row h-100">
								<div class="col-lg-6 p-0 bg-black ">
									<img class="cover-fit img-fluid d-block ms-auto" src="{{ asset('images/courses-cover/' . $course->cover_url) }}"
										alt="" style="max-height: 100px">
								</div>
								<div class="col-lg-6 pt-3 ">
									<b class="text-muted ">{{ $course->title }}</b><br>
									<span class="d-block mt-2">
										<small class="text-muted">
											<i class="fa-solid fa-user-graduate me-2"></i>{{ $users->find($course->instructor_id)->name }}
										</small><br>
										<small class="text-muted">
											<i class="fa-solid fa-circle-play me-2"></i>23
										</small>
									</span>
								</div>
							</div>
						</a>
					</div>
				</div>
			@endforeach
		</div>
	</div>
@endsection
