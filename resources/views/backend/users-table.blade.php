@extends('layouts.admin')

@section('title', 'Dashboard')
@section('content')
	<div class="container ">
		<div class="col-md-12 bg-white px-5 py-3 shadow-sm rounded mb-3">
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
			</div>
		</div>
		<div class="col-md-12 bg-white px-4 py-2 shadow-sm rounded">
			@if (session()->has('update-success'))
				<div class="col-lg-12 my-3">
					<div class="alert alert-success" role="alert">
						{{ session('update-success') }}
					</div>
				</div>
			@endif
			@if (session()->has('delete-success'))
				<div class="col-lg-12 my-3">
					<div class="alert alert-danger" role="alert">
						{{ session('delete-success') }}
					</div>
				</div>
			@endif
			<table class=" table table-borderless table-hover align-middle m-0 " id="user-table">
				<thead class="">
					<th scope="col">#</th>
					<th scope="col">NAME</th>
					<th scope="col">ROLE</th>
					@can('edit user')
						<th scope="col">EMAIL</th>
						<th scope="col">Created_at</th>
						<th scope="col">Updated_at</th>
						<th scope="col">ACTION</th>
					@endcan
				</thead>
				<tbody>
					@foreach ($users as $user)
						<tr>
							<th scope="row">{{ $loop->iteration }}</th>
							<td>{{ $user->name }}</td>
							<td>
								@foreach ($user->roles as $role)
									@if ($user->hasRole('admin'))
										<i class="fa-solid fa-user-secret me-1"></i>
									@elseif ($user->hasRole('instructor'))
										<i class="fa-solid fa-user-graduate me-1"></i>
									@else
										<i class="fa-solid fa-user"></i>
									@endif
									{{ $user->roles[0]->name }}
								@endforeach
							</td>
							<td>{{ $user->email }}</td>
							<td>{{ Carbon\Carbon::parse($user->created_at)->format('Y-m-d') }}</td>
							<td>{{ Carbon\Carbon::parse($user->updated_at)->format('Y-m-d') }}</td>
							@can('edit user')
								<td>
									<div class="d-flex justify-content-around">
										<div class="dropdown">
											<button class="btn btn-outline-dark border border-3 rounded-circle px-3" data-bs-toggle="dropdown"
												type="button" aria-expanded="false">
												<i class="fa-solid fa-ellipsis-vertical mt-1"></i></i>
											</button>
											<ul class="dropdown-menu">
												<li>
													<!-- Button trigger modal -->
													<a class="dropdown-item" href="{{ route('dashboard.users.edit', $user->id) }}">
														<i class="fa-solid fa-pen me-3"></i>Edit
													</a>
												</li>
												<li>
													<a class="dropdown-item" href="{{ route('dashboard.users.delete', $user->id) }}">
														<i class="fa-solid fa-trash me-3"></i>Delete
													</a>
												</li>
												<li>
													<a class="dropdown-item" href="#">
														<i class="fa-solid fa-ellipsis-vertical ms-1 me-4"></i></i>Detail
													</a>
												</li>
											</ul>
										</div>
									</div>
								</td>
							@endcan
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>

@endsection
@push('js')
	<script>
		// const edit = (id) => {
		// 	const row = document.querySelector(`tr.userID${id}`);
		// 	username = row.children[1].innerText;
		// 	userRole = row.children[2].id;
		// 	email = row.children[3].innerText;

		// 	document.querySelector('#updateform #username').value = username;
		// 	document.querySelector('#updateform #email').value = email;
		// 	const roles = document.querySelector('#updateform #role').children;
		// 	const keys = Object.keys(roles)
		// 	keys.forEach((key, index) => {
		// 		if (roles[key].value == userRole) {
		// 			roles[key].selected = true;
		// 		}
		// 	});
		// }
	</script>
@endpush
