@extends('layouts.admin')

@section('title', 'Dashboard')
@section('content')
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-5 p-0 bg-white overflow-hidden shadow-sm rounded">
				<img class="img-fluid w-100" src="{{ asset('images/courses-cover/' . $course->cover_url) }}" alt="">
				<form class=" p-3" action="{{ route('dashboard.lessons.store', ['course_id' => $course->id]) }}" method="post"
					enctype="multipart/form-data">
					@csrf
					<div class="mb-3">
						<label class="form-label" for="title">Title</label>
						<input class="form-control" id="title" name="title" type="text" aria-describedby="helpId" placeholder="">
						<small class="text-muted" id="helpId">Help text</small>
					</div>
					<div class="mb-3">
						<label class="form-label" for="video"></label>
						<input class="form-control" id="video" name="video" type="file" aria-describedby="helpId" placeholder="">
						<small class="text-muted" id="helpId">Help text</small>
					</div>
					<div class="mb-3">
						<label class="form-label" for="description">Description</label>
						<textarea class="form-control" id="description" name="description" type="text" aria-describedby="helpId"></textarea>
						<small class="text-muted" id="helpId">Help text</small>
					</div>
					<button class="btn btn-primary d-flex ms-auto" type="submit">Create</button>
				</form>
			</div>
		</div>
	</div>
@endsection
