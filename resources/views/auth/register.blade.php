@extends('preload.default')

@section('title', 'Register Page')

@section('container')
    <div class="container w-50 mt-5 mx-5 text-light" style="margin-bottom: 15vw">
        <form action="{{ route('register') }}" method="post">
            @csrf
            <h1 class="h3 mb-3 fw-normal">Register</h1>

            <div class="form-floating mb-5 text-dark">
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="inputFullName" placeholder="My name is..." value="{{ old('name') }}">
                <label for="inputFullName">Nama Lengkap</label>

                @error('name')
                    <div class="invalid-feedback">
                        Please provide your full name
                    </div>
                @enderror
            </div>

            <div class="form-floating mb-5 text-dark">
                <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" id="inputName" placeholder="My name is..." value="{{ old('username') }}">
                <label for="inputName">Username</label>

                @error('username')
                    <div class="invalid-feedback">
                        Please provide your username
                    </div>
                @enderror
            </div>

            <div class="form-floating mb-5 text-dark">
                <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="inputEmail" placeholder="My name is..." value="{{ old('email') }}">
                <label for="inputEmail">Email Address</label>

                @error('email')
                    <div class="invalid-feedback">
                        Please provide your email address
                    </div>
                @enderror
            </div>

            <div class="form-floating mb-5 text-dark">
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password</label>

                @error('password')
                    <div class="invalid-feedback">
                        Please provide your password, must be at least 3 characters.
                    </div>
                @enderror
            </div>

            <button class="w-30 mt-2 btn btn-lg btn-primary" name="inputLogin" value="inputLogin" type="submit">Register</button>
        </form>
        {{-- <div class="container mt-3">
            <small> Have an account? <a class="text-decoration-none" href="/login"> Go here. </a> </small>
        </div> --}}
    </div>
@endsection

{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
