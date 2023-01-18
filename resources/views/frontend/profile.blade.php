@extends('layouts.app')

@section('title', 'Ionic LMS')
@section('content')
	<h1 class=" cus-font my-5 text-center animate__animated animate__tada">Your Profile</h1>
	<section class=" container mb-5">
		<div class="row ">
			<div class=" col-12 col-md-6 col-lg-4">
				<div class="card text-white border-0 shadow-sm">
					<div class=" my-3">
						<img class=" profile-img d-block mx-auto"
							src="./images/young-asia-businessman-using-computer-laptop-talk-colleagues-about-plan-video-call-meeting-while-working-from-home-living-room.jpg"
							alt="">
					</div>
					<div class=" card-body text-center px-0">
						<h2 class=" text-black cus-font">John Blier</h4>
							<h5 class=" text-black-50 my-3">
								Full Stack Developer
							</h5>
							<p class=" text-black-50">
								Lorem ipsum dolor, sit amet consectetur
							</p>
							<div class="mb-3">
								<button class=" btn btn-outline-primary">Follow</button>
								<button class=" btn btn-primary">Message</button>
							</div>
					</div>
				</div>
				<div class=" row  mt-3">
					<ul class=" list-group bg-white pe-0 border-0">
						<li class=" list-group-item profile-li d-flex justify-content-between align-items-center">
							<div class="">
								<i class=" bi bi-browser-chrome me-1" style="font-size: 20px;"></i>
								<span class=" h5 ">Website</span>
							</div>
							<a class=" text-decoration-none text-black-50" href="#">www.google.com</a>
						</li>
						<li class=" list-group-item profile-li d-flex justify-content-between align-items-center">
							<div class="">
								<i class=" bi bi-github me-1 " style="font-size: 20px;color: rgb(131, 145, 145);"></i>
								<span class=" h5 ">GitHub</span>
							</div>
							<a class=" text-decoration-none text-black-50" href="#">JohnBolt</a>
						</li>
						<li class=" list-group-item profile-li d-flex justify-content-between align-items-center">
							<div class="">
								<i class=" bi bi-instagram me-1" style="font-size: 20px;color: rgb(255, 0, 0);"></i>
								<span class=" h5 ">Instagram</span>
							</div>
							<a class=" text-decoration-none text-black-50" href="#">JohnBool</a>
						</li>
						<li class=" list-group-item profile-li d-flex justify-content-between align-items-center">
							<div class="">
								<i class=" bi bi-twitter me-1" style="font-size: 20px;color: rgb(3, 127, 127);"></i>
								<span class=" h5 ">Twitter</span>
							</div>
							<a class=" text-decoration-none text-black-50" href="#">JohnTwit</a>
						</li>
						<li class=" list-group-item profile-li d-flex justify-content-between align-items-center">
							<div class="">
								<i class=" bi bi-facebook me-1" style="font-size: 20px;color: rgb(33, 33, 145);"></i>
								<span class=" h5 ">Facebook</span>
							</div>
							<a class=" text-decoration-none text-black-50" href="#">JohnFace</a>
						</li>
					</ul>
				</div>
			</div>
			<div class=" col-12 col-md-6 col-lg-8">
				<div class="row mt-3 mt-lg-0">

					<table class=" bg-white shadow-sm rounded">
						<tr>
							<td class=" h6">Full Name</td>
							<td class=" text-black-50">JohnBolt Dollar</td>
						</tr>
						<tr>
							<td class="  h6">Email</td>
							<td class=" text-black-50">thihazawhaha@777.com</td>
						</tr>
						<tr>
							<td class=" h6">Phone</td>
							<td class=" text-black-50">Ph-000987678988</td>
						</tr>
						<tr>
							<td class=" h6">Address</td>
							<td class=" text-black-50">Manidalay,Patheingyi township,Dahattaw village</td>
						</tr>
						<tr>
							<td class=" h6">Attend Class</td>
							<td class=" text-black-50">Javascript and Php</td>
						</tr>
					</table>
					<div class="row mt-4 ms-2 bg-white rounded-3 shadow-sm">
						<div class="col-12">
							<div class="row">
								<div class=" p-3 ">
									<p class=" mb-0">Website design</p>
									<div class="progress">
										<div class="progress-bar progress-bg" role="progressbar" aria-label="Animated striped example"
											aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%;"></div>
									</div>
								</div>
								<div class=" p-3 ">
									<p class=" mb-0">Javascript</p>
									<div class="progress">
										<div class="progress-bar progress-bg" role="progressbar" aria-label="Animated striped example"
											aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 50%;"></div>
									</div>
								</div>
								<div class=" p-3 ">
									<p class=" mb-0">Php</p>
									<div class="progress">
										<div class="progress-bar progress-bg " role="progressbar" aria-label="Animated striped example"
											aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 40%;"></div>
									</div>
								</div>
								<div class=" p-3 ">
									<p class=" mb-0">HTML</p>
									<div class="progress">
										<div class="progress-bar progress-bg " role="progressbar" aria-label="Animated striped example"
											aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 80%;"></div>
									</div>
								</div>
								<div class=" p-3 ">
									<p class=" mb-0">CSS</p>
									<div class="progress">
										<div class="progress-bar progress-bg " role="progressbar" aria-label="Animated striped example"
											aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 90%;"></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</section>
@endsection
