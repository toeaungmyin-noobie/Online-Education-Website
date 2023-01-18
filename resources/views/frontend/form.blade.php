<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Sign up</title>
	<style>
		* {
			padding: 0;
			margin: 0;
			box-sizing: border-box;
		}

		body {
			background: rgb(63, 63, 63) !important;
		}

		/* .row{
								background-color: #fff;
							} */
	</style>
</head>

<body>
	<section class=" form my-5 mx-5">
		<div class="container">
			<div class="row bg-white g-0 py-5 px-3 rounded-5">
				<div class="col-lg-6  mb-5 mb-lg-0 ">
					<img class=" w-100" src="./images/login.png" alt="">
				</div>
				<div class="col-lg-6 ps-5">
					<form action="">
						<div class="form-row ms-5">
							<div class=" mb-5 text-center text-lg-start">
								<h1 class=" mb-4 fw-bold">Sign Up</h1>
								<h4 class=" fw-bold">Sign up to your account</h4>
							</div>
							<div class=" col-lg-7 mb-3">
								<input class=" form-control" type="text" placeholder="Username" required>
							</div>
							<div class=" col-lg-7 mb-3">
								<input class=" form-control" type="email" placeholder="Email" required>
							</div>
							<div class=" col-lg-7 mb-3">
								<input class=" form-control" type="password" placeholder="password" required>
							</div>
							<div class="col-lg-7 mb-5">
								<input class=" btn btn-primary w-100 fw-bold fs-5" type="submit" value="Submit">
							</div>
							<div class="">
								<a class=" me-3 text-decoration-none" href="#">Do you have an account?</a>
								<a class=" btn btn-lg btn-primary" href="#">Login in</a>
							</div>
						</div>

					</form>
				</div>
			</div>
		</div>
	</section>
	<script type="module" src="{{ asset('assets/frontend/js/main.js') }}"></script>
</body>

</html>
