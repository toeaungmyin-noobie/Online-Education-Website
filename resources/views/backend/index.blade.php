@extends('layouts.admin')

@section('title', 'Dashboard')
@section('content')
	<div class="container shadow-sm">
		<div class="row justify-content-around mb-3">
			<div class="col-lg-8 bg-white p-5  rounded text-center">
				<canvas id="course-student" style="width: 100%;height:100%;"></canvas>
			</div>
			<div class="col-lg-4">
				<div class="row justify-content-between align-items-stretch mb-3">
					<div class="col-lg-12 bg-white p-5 rounded text-center">
						<h3 class="mb-3">Total Users</h3>
						<h2>{{ collect($users)->count() }} <i class="fa-solid fa-users ms-3"></i></h2>
					</div>
					<div class="col-lg-12 bg-white p-5 rounded text-center">
						<h3 class="mb-3">Total Courses</h3>
						<h2>{{ collect($courses)->count() }} <i class="fa-solid fa-book-bookmark ms-3"></i></h2>
					</div>
				</div>
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
