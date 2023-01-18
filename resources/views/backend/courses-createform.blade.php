@extends('layouts.admin')

@section('title', 'Dashboard')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="row">
					<form action="{{ route('dashboard.courses.store') }}" method="post" enctype="multipart/form-data">
						@csrf
						<div class="row">
							<div class="col-lg-4 pe-1">
								<div class="bg-white p-3 h-100 shadow-sm rounded">
									<div class="col-lg-12 mb-3 ">
										<img class=" img-thumbnail d-block mx-auto" id="output"
											src="{{ asset('assets/backend/images/default.jpg') }}" style="width:300px;min-height:200px" />
									</div>
									<div class="col-lg-12 h-100 mb-3">
										<div class="row justify-content-center">
											<div class="col-lg-12 col-12 mt-2">
												<div class="form-group mb-3">
													<input class="form-control" id="fileElem" name="image" type="file" accept="image/*"
														onchange="loadFile(event)">
												</div>
												@error('image')
													<small class="text-danger">{{ $message }}</small>
												@enderror
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-8 ">
								<div class="p-3 bg-white shadow-sm rounded">
									<div class="col-lg-12 mb-3">
										<div class="row justify-content-center">
											<div class="col-lg-8 col-12 my-auto">

												<input class="form-control" id="course-title" name="title" type="text" aria-describedby="helpId"
													placeholder="Title">
												@error('title')
													<small class="text-danger">{{ $message }}</small>
												@enderror
											</div>
											<div class="col-lg-4 col-12 my-auto">
												<input class="form-control" id="course-price" name="price" type="number" value="0"
													aria-describedby="helpId" placeholder="Price">
												@error('price')
													<small class="text-danger">{{ $message }}</small>
												@enderror
											</div>
										</div>
									</div>
									<div class="col-lg-12 mb-3">
										<div class="col-lg-12 col-12 my-auto">

											<textarea class="form-control" id="course-overview" name="overview" aria-describedby="helpId"></textarea>
											@error('overview')
												<small class="text-danger">{{ $message }}</small>
											@enderror
										</div>
									</div>
									<div class="col-lg-12">
										<input class=" btn btn-dark d-block ms-auto px-5 py-3" type="submit" value="Create">
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

@endsection
@push('js')
	<script>
		tinymce.init({
			selector: '#course-overview',
		})

		var loadFile = function(event) {
			var output = document.getElementById('output');
			output.src = URL.createObjectURL(event.target.files[0]);
			output.onload = function() {
				URL.revokeObjectURL(output.src) // free memory
			}
		};
		const fileSelect = document.getElementById("output");
		const fileElem = document.getElementById("fileElem");

		fileSelect.addEventListener("click", (e) => {
			if (fileElem) {
				fileElem.click();
			}
		}, false);
	</script>
@endpush
