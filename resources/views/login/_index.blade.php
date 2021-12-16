@extends('preload.default')

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
    <div class="col-2"></div>
    <div class="col-8 ">
        <div class="container rounded w-50 mt-5 bg-white" style="margin-bottom: 15vw">
            <form action="/login" method="post" class="p-3">
                @csrf

                <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

                <div class="form-floating mb-5 text-dark">
                    <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" id="inputName" placeholder="My name is...">
                    <label for="inputName">Username</label>

                    @error('username')
                    <div class="invalid-feedback">
                        Please provide the correct username
                    </div>
                    @enderror
                </div>

                <div class="form-floating mb-5 text-dark">
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Password</label>

                    @error('password')
                    <div class="invalid-feedback">
                        Please provide the correct password
                    </div>
                    @enderror
                </div>

                <div class="checkbox mb-3">
                    <label>
                        <input type="checkbox" value="remember-me"> Remember me
                    </label>
                </div>

                <button class="w-30 mt-2 btn btn-lg btn-primary" name="inputLogin" value="inputLogin" type="submit">Sign in</button>
            </form>
            <div class="container mt-3">
                <small> Not registered yet? <a class="text-decoration-none" href="/register"> Go here. </a> </small>
            </div>
        </div>
    </div>
    <div class="col-2"></div>
</div>

@endsection