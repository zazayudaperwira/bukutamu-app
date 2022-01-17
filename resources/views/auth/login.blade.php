@extends('preload.default')

@section('title', 'Login Page')

@section('container')

<section class="jumbotron text-center pt-5 bg-#5bc0de mt-5">
    <img src="images/bps.png" alt="Badan Pusat statistik" width="200" />
    <h1 class="display-4 pt-1">Buku Tamu</h1>
    <p class="lead">Badan Pusat Statistik Provinsi Lampung</p>
    <svg class="mb-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#ffffff" fill-opacity="1" d="M0,128L30,133.3C60,139,120,149,180,170.7C240,192,300,224,360,234.7C420,245,480,235,540,202.7C600,171,660,117,720,85.3C780,53,840,43,900,37.3C960,32,1020,32,1080,42.7C1140,53,1200,75,1260,80C1320,85,1380,75,1410,69.3L1440,64L1440,320L1410,320C1380,320,1320,320,1260,320C1200,320,1140,320,1080,320C1020,320,960,320,900,320C840,320,780,320,720,320C660,320,600,320,540,320C480,320,420,320,360,320C300,320,240,320,180,320C120,320,60,320,30,320L0,320Z"></path>
    </svg>
</section>

<div class="row ">
    <div class=col-3> </div>
    <div class=col-6> 
    <div class="container rounded w-50 mt-5 bg-white" style="margin-bottom: 15vw">
        <form action="{{ route('login') }}" method="post" class="p-3">
            @csrf
            <h1 class="h3 mb-3 fw-normal">Login</h1>

            <div class="mb-5 mx-5">
                <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>
                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                @error('username')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="mb-5 mx-5">
                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <button class="w-30 mt-2 btn btn-lg btn-primary" name="inputLogin" value="inputLogin" type="submit">login</button>
        </form>
    </div></div>
    <div class=col-3> </div>
</div>
@endsection