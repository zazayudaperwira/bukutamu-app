@extends('preload.default')

@section('container')
    <link rel="stylesheet" href="css/global_styling.css">
 <style>
    label {
      cursor: pointer;
      filter: grayscale(100%);
      transition: 1s
    }

    label:hover {
      filter: grayscale(0);
      transform:  scale(1.5);
 
    }
    input[type="radio"]:checked + label {
      filter: grayscale(0);
    }
    </style>

<section class="jumbotron text-center pt-5 bg-#5bc0de mt-5">
     <img src="images/bps.png" alt="Badan Pusat statistik" width="200" />
      <h1 class="display-4 pt-1">Buku Tamu</h1>
      <p class="lead">Badan Pusat Statistik Provinsi Lampung</p>
      <svg class="mb-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path
          fill="#ffffff"
          fill-opacity="1"
          d="M0,128L30,133.3C60,139,120,149,180,170.7C240,192,300,224,360,234.7C420,245,480,235,540,202.7C600,171,660,117,720,85.3C780,53,840,43,900,37.3C960,32,1020,32,1080,42.7C1140,53,1200,75,1260,80C1320,85,1380,75,1410,69.3L1440,64L1440,320L1410,320C1380,320,1320,320,1260,320C1200,320,1140,320,1080,320C1020,320,960,320,900,320C840,320,780,320,720,320C660,320,600,320,540,320C480,320,420,320,360,320C300,320,240,320,180,320C120,320,60,320,30,320L0,320Z"
        ></path>
      </svg>
</section>

<div class="m-3 ">
 @if (session()->has('sent'))
                <div class="alert alert-success mt-5" role="alert">
                    {{ session('sent') }}
                </div>
            @endif
</div>

    <div class="row d-flex justify-content-center">
        <div class="col-md-8 bg-light">

            {{-- <h2 class="text-primary mt-3 mb-3"> Update {{ $d }} </h2> --}}
            <h1 class="mt-5"> Halaman Checkout </h1>
            <h5> Sebelum anda meninggalkan Kanto BPS Provinsi Lampung </h5>
            <h5>Mohon perkenannya untuk mengisi survey kepuasan singkat berikut </h5>

            <div class="container w-50 text-dark mb-4">
{{--                Guestbooks--}}

                @if( request('d') == 'guestbooks')
                    <form class="needs-validation" action="/tamu/update" method="post">
                        @csrf

                        {{-- Kepuasan --}}

                         <fieldset required>
                        <legend class="mt-5 mb-5">
                            Seberapa Puas Anda Dengan Pelayanan Kami?
                        </legend>
                        <div class="row justify-content-center">
                                    <div   div class="col-3"></div>
                                    <div class="col-2">
                                            <b> Tidak Puas </b>
                                    </div>
                                    <div class="col-2">
                                            <b> Cukup Puas </b>
                                    </div>
                                    <div class="col-2">
                                            <b> Sangat Puas </b>
                                    </div>
                                    <div class="col-3"></div>
                            </div>
                        <div class="row">
                        <div class="col-3"></div>
                            <div class="col-2">
                                        <input type="radio" name="tingkatkepuasan" class="form-control sr-only" id="stpuas" value="Tidak Puas" required>
                                        <label for="stpuas" value="1">
                                        <img class="mt-3" src="/images/s1.png" alt="male" width="100px">
                                        </label>
                            </div>
                            {{-- <div class="col">
                                    <input type="radio" name="tingkatkepuasan" class="form-control sr-only" id="tpuas" value="Tidak Puas">
                                    <label for="tpuas" value="2">
                                    <img src="/images/s2.png" alt="female" width="75px">
                                    </label>
                            </div> --}}
                            {{-- <div class="col">
                                    <input type="radio" name="tingkatkepuasan" class="form-control sr-only" id="cpuas" value="Cukup Puas">
                                    <label for="cpuas" value="3">
                                        <img src="/images/s3.png" alt="female" width="75px">
                                    </label>
                            </div> --}}
                            <div class="col-2">
                                    <input type="radio" name="tingkatkepuasan" class="form-control sr-only" id="cpuas" value="Cukup Puas" required>
                                    <label for="cpuas" value="4">
                                        <img class="mt-3" src="/images/s4.png" alt="female" width="100px">
                                    </label>
                            </div>
                            <div class="col-2">
                                    <input type="radio" name="tingkatkepuasan" class="form-control sr-only" id="spuas" value="Sangat Puas" required>
                                    <label for="spuas" value="5">
                                        <img class="mt-3" src="/images/s5.png" alt="female" width="100px">
                                    </label>
                            </div>
                            <div class="col-3"></div>
                        </div>

                            
                        
                        </fieldset>

                        {{-- <div class="form-group row">
                                        <label for="tingkatkepuasan" class="col-sm-2 col-form-label"> <b>Tkepuasann</b></label>
                                        <div class="col-sm-10">
                                        <input type="text" class="form-control" name="tingkatkepuasan" id="tingkatkepuasan"  placeholder="Nama Lengkap">
                                        </div> --}}

                        </div>
                        <div class="row mt-5 mb-5">
                            <div class="col-3"></div>
                            <div class="col-6">
                            <div class="form-group mb-1">
                                <b class="mt-5"> Apa yang dapat kami perbaiki dari pelayanan kami?</b>
                                <input type="text" name="feedback" id="feedback" class="form-control mt-3" placeholder="Tuliskan saran dan masukan anda disini" required>
                            </div>
                                  <div class="invalid-feedback">
                                        Tidak Boleh Kosong.
                                    </div>
                            </div>
                            <div class="col-3"></div>
                        </div>

                        {{-- end of kepuasan --}}



                        <input type="hidden" name="update" value="{{ request('update') }}">
                        <input type="hidden" name="d" value="{{ request('d') }}">

                            <input type="hidden" name="status" id="status" class="form-control" value="1">
                            <input type="hidden" name="jamkeluar" id="jamkeluar" class="form-control" value="{{ date("H:i") }}">

                        <div class="form-group mt-4 mb-5">
                            <button  type="submit" name="inputSubmit" value="submit" class="btn btn-outline-primary"> Submit </button>
                        </div>
                    </form>
                @endif


            </div>
        </div>
    </div>
@endsection
