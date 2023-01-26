<section class="bg-white" id="Home">
	<div class="container">
		<div
			class="row min-vh-100 justify-content-center align-items-center d-flex flex-column-reverse flex-lg-row slide-down">
			<div class="col-12 col-lg-6">
				<div class="row mt-0 mt-lg-5 slide-down">
					<h1 class="display-5 fw-bold slide-down">
						Welcome to Online Learning Application
					</h1>
					<h3 class="text-black-50 mt-3 mb-3 mb-lg-4 slide-down">
						Hand-picked Instructor and expertly crafted courses, designed
						for the modern students and entrepreneur.
					</h3>
					<div class="slide-down">
						<a class="btn btn-success border-0 shadow-sm rounded-4 btn-lg Browse-Btn mb-2 mb-lg-0"
							href="{{ route('frontend.browseCourses') }}">
							Browse Courses
						</a>
						<button class="btn btn-primary border-0 shadow-sm rounded-4 btn-lg Instructor-Btn" data-bs-toggle="modal"
							data-bs-target="#instructorForm" type="button">
							Are You Instructor?
						</button>
					</div>
				</div>
			</div>
			<div class="col-12 col-lg-6">
				<div class="row mb-0 mb-lg-5 slide-down">
					<div class="slide-down">
						<div class="mb-0 mb-lg-5">
							<lottie-player src="https://assets9.lottiefiles.com/private_files/lf30_gcroxmlt.json"
								style="width: 100%; height: 500px" background="transparent" speed="1" loop autoplay></lottie-player>
						</div>
						<div class="pt-0 pt-lg-5"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- Instructor Modal -->
<div class="modal fade" id="instructorForm" aria-labelledby="instructorFormLabel" aria-hidden="true" tabindex="-1">
	<div class="modal-dialog modal-dialog-centered modal-sm">
		<div class="modal-content">
			<div class="modal-header bg-primary text-white">
				<h5 class="modal-title" id="instructorFormLabel">Instructor Request</h5>
				<button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<p>This feature will available soon!</p>
			</div>
			<div class="modal-footer">
				<button class="btn btn-secondary" data-bs-dismiss="modal" type="button">OK</button>

			</div>
		</div>
	</div>
</div>
@push('js')
	<script></script>
@endpush
