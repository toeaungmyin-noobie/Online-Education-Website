@extends('layouts.admin')

@section('title', 'Dashboard')
@section('content')
	<div class="container p-0  ">
		<div class="row justify-content-center">
			<div class="col-lg-10 p-0 ">
				<div class="col-lg-12 mb-2 bg-white shadow-sm rounded text-center overflow-hidden">
					<div class="row">
						<div class="col-lg-5">
							<img class="img-fluid w-100" src="{{ asset('images/courses-cover/' . $course->cover_url) }}" alt="">
						</div>
						<div class="col-lg-7 pe-5 position-relative">

							<h4 class="pt-3 p-1 pb-0 text-start">{{ $course->title }}</h4>
							<div class="p-1 text-muted text-start">{!! $course->overview !!}</div>
							<div class="dropdown position-absolute top-0 end-0 me-3 mt-1">
								<button class="btn btn-outline-primary border border-3 rounded-circle p-3 text-primary" data-bs-toggle="dropdown"
									type="button" aria-expanded="false">
									<i class="fa-solid fa-ellipsis-vertical mt-1"></i></i>
								</button>
								<ul class="dropdown-menu">
									<li>
										<!-- Button trigger modal -->
										<a class="dropdown-item" href="">
											<i class="fa-solid fa-pen me-3"></i>Edit
										</a>
									</li>
									<li>
										<a class="dropdown-item" href="{{ route('dashboard.courses.delete', ['id' => $course->id]) }}">
											<i class="fa-solid fa-trash me-3"></i>Delete
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-12 bg-white px-5 py-3 shadow-sm rounded mb-2">
					<div class="row">
						<div class="col-lg-4">
							@can('edit course')
								<a class="btn btn-dark" href="{{ route('dashboard.lessons.create', ['id' => $course->id]) }}">Add New lesson</a>
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
					</div>
				</div>
				@if (session()->has('delete-success'))
					<div class="col-lg-12 my-3">
						<div class="alert alert-danger" role="alert">
							{{ session('delete-success') }}
						</div>
					</div>
				@endif
				<div class="col-lg-12 mb-3 bg-white shadow-sm rounded text-center">
					<table class="table m-0 table-borderless table-hover align-middle text-center">
						<thead>
							<tr>
								<th>#</th>
								<th>Title</th>
								<th>watched</th>
								<th>Created_at</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($lessons as $item)
								<tr class="">
									<td scope="row">{{ $item->id }}</td>
									<td>{{ $item->title }}</td>
									<td><i class="fa-solid fa-eye me-2"></i>22</td>
									<td>{{ $item->created_at }}</td>
									<td>
										<div class="d-flex justify-content-around">
											<div class="dropdown">
												<button class="btn btn-outline-primary border border-3 rounded-circle p-3 " data-bs-toggle="dropdown"
													type="button" aria-expanded="false">
													<i class="fa-solid fa-ellipsis-vertical mt-1"></i></i>
												</button>
												<ul class="dropdown-menu">
													<li>
														<!-- Button trigger modal -->
														<a class="dropdown-item"
															href="{{ route('dashboard.lessons.edit', ['course_id' => $course->id, 'lesson_id' => $item->id]) }}">
															<i class="fa-solid fa-pen me-3"></i>Edit
														</a>
													</li>
													<li>
														<a class="dropdown-item" href="{{ route('dashboard.lessons.delete', ['lesson_id' => $item->id]) }}">
															<i class="fa-solid fa-trash me-3"></i>Delete
														</a>
													</li>
													<li>
														<a class="dropdown-item"
															href="{{ route('frontend.lesson-show', ['id' => $course->id, 'active_lesson' => $item->id]) }}">
															<i class="fa-solid fa-ellipsis-vertical  me-3"></i>Detail
														</a>
													</li>

												</ul>
											</div>
										</div>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
				<div class="col-lg-12 mb-3 bg-white shadow-sm rounded text-center">
					<table class=" table table-borderless table-hover align-middle m-0 " id="user-table">
						<thead class="">
							<th scope="col">#</th>
							<th scope="col">NAME</th>
							@can('edit user')
								<th scope="col">EMAIL</th>
								<th scope="col">Created_at</th>
								<th scope="col">ACTION</th>
							@endcan
						</thead>
						<tbody>
							@foreach ($course->user as $user)
								@if ($user->getRoleNames() == 'admin')
								@break
							@endif
							<tr>
								<td>{{ $user->id }}</td>
								<td>{{ $user->name }}</td>
								<td>{{ $user->email }}</td>
								<td>{{ $user->created_at }}</td>
								<td>
									<a class="btn btn-outline-danger"
										href="{{ route('dashboard.courses.remove.user', ['course_id' => $course->id, 'user_id' => $user->id]) }}">Remove</a>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
</div>

@endsection
