@extends('layouts.app')
@section('content')
	<section>
		<div class="container mt-5 pt-5">
			<div class="row bg-white g-5 py-md-5 px-3 rounded-5">
				<div class="col-md-6 mt-lg-5 mb-0 mb-lg-0 ">
					<img class="d-block mx-auto mt-md-5 img-fluid w-50" src="{{ asset('assets/frontend/images/login.png') }}"
						alt="">
				</div>
				<div class="col-md-6">
					<form method="POST" action="{{ route('login') }}">
						@csrf
						<div class="form-row">
							<div class=" mb-5 text-center text-lg-start">
								<h1 class=" mb-4 fw-bold">Login</h1>
								{{-- <h5 class=" fw-bold">to your account</h5> --}}
							</div>
							<div class="row mb-3">
								<div class="col-md-8">
									<input class="form-control @error('email') is-invalid @enderror" id="email" name="email" type="email"
										value="{{ old('email') }}" required autocomplete="email" placeholder="{{ __('Email Address') }}" autofocus>

									@error('email')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-md-8">
									<input class="form-control @error('password') is-invalid @enderror" id="password" name="password"
										type="password" required autocomplete="current-password" placeholder="{{ __('password') }}">

									@error('password')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-md-8 ">
									<div class="form-check">
										<input class="form-check-input" id="remember" name="remember" type="checkbox"
											{{ old('remember') ? 'checked' : '' }}>

										<label class="form-check-label" for="remember">
											{{ __('Remember Me') }}
										</label>
									</div>
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-md-8 ">
									<button class="btn btn-primary" type="submit">
										{{ __('Login') }}
									</button>

									@if (Route::has('password.request'))
										<a class="btn btn-link" href="{{ route('password.request') }}">
											{{ __('Forgot Your Password?') }}
										</a>
									@endif
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
	{{-- <div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="card">
					<div class="card-header">{{ __('Login') }}</div>

					<div class="card-body">
						<form method="POST" action="{{ route('login') }}">
							@csrf

							<div class="row mb-3">
								<label class="col-md-4 col-form-label text-md-end" for="email">{{ __('Email Address') }}</label>

								<div class="col-md-6">
									<input class="form-control @error('email') is-invalid @enderror" id="email" name="email" type="email"
										value="{{ old('email') }}" required autocomplete="email" autofocus>

									@error('email')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>

							<div class="row mb-3">
								<label class="col-md-4 col-form-label text-md-end" for="password">{{ __('Password') }}</label>

								<div class="col-md-6">
									<input class="form-control @error('password') is-invalid @enderror" id="password" name="password"
										type="password" required autocomplete="current-password">

									@error('password')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>

							<div class="row mb-3">
								<div class="col-md-6 offset-md-4">
									<div class="form-check">
										<input class="form-check-input" id="remember" name="remember" type="checkbox"
											{{ old('remember') ? 'checked' : '' }}>

										<label class="form-check-label" for="remember">
											{{ __('Remember Me') }}
										</label>
									</div>
								</div>
							</div>

							<div class="row mb-0">
								<div class="col-md-8 offset-md-4">
									<button class="btn btn-primary" type="submit">
										{{ __('Login') }}
									</button>

									@if (Route::has('password.request'))
										<a class="btn btn-link" href="{{ route('password.request') }}">
											{{ __('Forgot Your Password?') }}
										</a>
									@endif
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div> --}}
@endsection
