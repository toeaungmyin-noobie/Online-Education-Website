@extends('layouts.admin')

@section('title', 'Dashboard')
@section('content')
	<div class="container">
		<div class="row justify-content-around mb-3">
			<div class="col-lg-5 bg-white p-5 shadow-sm rounded text-center">
				<canvas id="course-student" style="width: 100%;height:100%;"></canvas>
			</div>
			<div class="col-lg-5 bg-white p-5 shadow-sm rounded text-center">
				<canvas id="student-regisater" style="width: 100%;height:100%;"></canvas>
			</div>
		</div>
		<div class="row justify-content-around mb-3">
			<div class="col-lg-4 bg-white p-5 shadow-sm rounded text-center">
				<h3 class="mb-3">User</h3>
				<h2>{{ collect($users)->count() }} <i class="fa-solid fa-users ms-3"></i></h2>
			</div>
			<div class="col-lg-4 bg-white p-5 shadow-sm rounded text-center">
				<h3 class="mb-3">Course</h3>
				<h2>{{ collect($courses)->count() }} <i class="fa-solid fa-book-bookmark ms-3"></i></h2>
			</div>
		</div>
	</div>
@endsection
@push('js')
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
	<script>
		$.ajax({
			url: '/admin/for-dashboard',
			type: 'GET',
			success: response => {
				new Chart($('#course-student'), {
					type: 'bar',
					data: {
						labels: response.courses.map(course => course.title),
						datasets: [{
							label: 'course by user',
							data: response.courses.map(course => course.user.length),
							borderWidth: 1
						}]
					},
					options: {
						scales: {
							y: {
								beginAtZero: true
							}
						}
					}
				});
				console.log(response.courses.map(course => course.user.name));
				new Chart($('#student-register'), {
					type: 'bar',
					data: {
						labels: response.courses.map(course => course.user),
						datasets: [{
							label: 'course by user',
							data: response.courses.map(course => course.user.length),
							borderWidth: 1
						}]
					},
					options: {
						scales: {
							y: {
								beginAtZero: true
							}
						}
					}
				});
			}

		})
	</script>
@endpush
