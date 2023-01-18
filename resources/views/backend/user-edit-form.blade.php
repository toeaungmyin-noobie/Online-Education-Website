@extends('layouts.admin')

@section('title', 'Dashboard')
@section('content')
	<div class="container bg-white p-5 shadow-sm rounded">
		<div class="row">
			<div class="col-md-12">

				<div class="row">
					<form action="{{ route('dashboard.users.update') }}" method="post">
						@csrf
						<div class="row mb-3">
							<label class="col-md-4 col-form-label text-md-end" for="name">{{ __('Name') }}</label>

							<div class="col-md-6">
								<input class="form-control @error('name') is-invalid @enderror" id="name" name="name" type="text"
									value="{{ $user->name }}" required autocomplete="name" autofocus>

								@error('name')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>
						</div>

						<div class="row mb-3">
							<label class="col-md-4 col-form-label text-md-end" for="email">{{ __('Email Address') }}</label>

							<div class="col-md-6">
								<input class="form-control @error('email') is-invalid @enderror" id="email" name="email" type="email"
									value="{{ $user->email }}" required autocomplete="email">

								@error('email')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>
						</div>
						<div class="row mb-3">
							<label class="col-md-4 col-form-label text-md-end" for="email">User's Role</label>

							<div class="col-md-6">
								<select class="form-select @error('email') is-invalid @enderror" id="role" name="role">
									@foreach ($roles as $role)
										<option value="{{ $role->id }}" @if ($user->roles[0]->id == $role->id) selected @endif>
											{{ $role->name }}</option>
									@endforeach
								</select>

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
									type="password" autocomplete="new-password">

								@error('password')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>
						</div>

						<div class="row mb-0">
							<div class="col-md-6 offset-md-4">
								<input name="id" type="hidden" value="{{ $user->id }}">
								<button class="btn btn-dark" type="submit">
									Save Changes
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

@endsection
