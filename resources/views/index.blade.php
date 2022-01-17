@extends('preload.default')

@section('title', 'Home')

@section('styling')
<style>
  label {
    cursor: pointer;
    filter: grayscale(100%);
    transition: 1s
  }

  label:hover {
    filter: grayscale(0);
    transform: scale(1.5);

  }

  input[type="radio"]:checked+label {
    filter: grayscale(0);
  }
</style>
@endsection

@section('container')
<section class="jumbotron text-center bg-#5bc0de">
  <img src="images/bps.png" alt="Badan Pusat statistik" width="200" />
  <h1 class="display-4 pt-1">Buku Tamu</h1>
  <p class="lead">Badan Pusat Statistik Provinsi Lampung</p>
  <svg class="mb-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
    <path fill="#ffffff" fill-opacity="1" d="M0,128L30,133.3C60,139,120,149,180,170.7C240,192,300,224,360,234.7C420,245,480,235,540,202.7C600,171,660,117,720,85.3C780,53,840,43,900,37.3C960,32,1020,32,1080,42.7C1140,53,1200,75,1260,80C1320,85,1380,75,1410,69.3L1440,64L1440,320L1410,320C1380,320,1320,320,1260,320C1200,320,1140,320,1080,320C1020,320,960,320,900,320C840,320,780,320,720,320C660,320,600,320,540,320C480,320,420,320,360,320C300,320,240,320,180,320C120,320,60,320,30,320L0,320Z"></path>
  </svg>
</section>

<div class="m-3 ">
  @if (session()->has('sent'))
  <div class="alert alert-success mt-5" role="alert">
    {{ session('sent') }}
  </div>
  @endif
</div>

<div class="m-3 ">
  @if ($message = Session::get('success'))
  <div class="alert alert-success  alert-dismissible">
    <button type="button" class="close" data- dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
  </div>
  @endif
</div>

<div class="container bg-white text-dark">
  <h1> Buku Tamu </h1>

  
  <h2> BPS Provinsi Lampung </h2>
  <div class=row>
    <div class=col-1></div>
    <div class=col-10>
      <p class=""> Halo sahabat data, selamat datang di BPS Provinsi lampung. Badan Pusat Statistik merupakan Lembaga Pemerintah Non Kementerian yang bertugas menyediakan kebutuhan data bagi mpemerintah dan masyarakat. </p>
    </div>
    <div class=col-1></div>
  </div>

  <div class="container bg-white pt-2 pb-5 mb-5 rounded-3 word-wrap text-break">
    <div class="container d-lg-flex flex-grow justify-content-center">
      <div class=row>
        <div class=col-2></div>

        <div class=col-4>
          <a href="/guestbook" class="text-decoration-none text-white">
            <p class="text-dark"> <b>Silahkan Mengisi</b> </p>
            <div class="card me-2 mt-2 bg-primary">
              <img src="images/skep1.png" class="card-img-top img-fluid">
              <div class="card-body">
                <h5 class="card-title">Buku Tamu</h5>
              </div>
            </div>
          </a>
        </div>

        <div class=col-4>
          <a href="/tamu?d=guestbooks" class="text-decoration-none text-white">
            <p class="text-dark"> <b>Silahkan Mengisi</b> </p>
            <div class="card me-2 mt-2 bg-primary">
              <img src="images/skep.png" class="card-img-top img-fluid">
              <div class="card-body">
                <h5 class="card-title">Survei Kepuasan</h5>
              </div>
            </div>
          </a>
        </div>

        {{-- SURVEY KEPUASAN DIRECT TO CHECKOUT --}}
        {{-- <div class=col-4>
          <a href="" class="text-decoration-none text-white" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <p class="text-dark"> <b>Silahkan Mengisi </b> </p>
            <div class="card me-2 mt-2 bg-primary">
              <img src="images/skep.png" class="card-img-top img-fluid">
              <div class="card-body">
                <h5 class="card-title">Survei Kepuasan</h5>
              </div>
            </div>
          </a>
        </div> --}}

        <!-- modal survei kepuasan -->
        {{-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">

              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Survey Kepuasan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>

              <div class="modal-body">
                Sebelum melakukan survei kepuasan, pastikan anda telah menerima pelayanan dari BPS Provinsi lampung dan telah melakukan <b> checkout tamu </b>. <br> Untuk Melanjutkan silahkan tekan tombol <b>checkout</b>
              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <a href="/tamu?d=guestbooks">
                  <button type="submit" class="btn btn-primary"> Checkout</button>
                </a>
              </div>

            </div>
          </div>
        </div> --}}
        <!-- modal survei kepuasan end -->

        <div class=col-2></div>
      </div>
    </div>
  </div>
</div>

<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
  <path fill="#e2edff" fill-opacity="1" d="M0,96L40,101.3C80,107,160,117,240,133.3C320,149,400,171,480,176C560,181,640,171,720,138.7C800,107,880,53,960,53.3C1040,53,1120,107,1200,117.3C1280,128,1360,96,1400,80L1440,64L1440,320L1400,320C1360,320,1280,320,1200,320C1120,320,1040,320,960,320C880,320,800,320,720,320C640,320,560,320,480,320C400,320,320,320,240,320C160,320,80,320,40,320L0,320Z"></path>
</svg>
</section>

<section id="kepuasan">
  <div class="container">
    <div class="row text-center mb-3">
      <div class="col">
        <img class="rounded" src="/images/talita.jpeg" alt="" width="200">
        <h1>Talita</h1>
        <h2>Tanya Online Tentang Data</h2>
      </div>
    </div>
    <div class="row justify-content-center text-center md-4">
      <div class="col-5 md-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet reiciendis officiis molestiae esse aut? Ducimus consequuntur asperiores ratione tenetur dignissimos!</div>
      <div class="col-5 md-4">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolore error porro reiciendis similique, voluptate quam? Quibusdam rem maiores voluptatum harum? Omnis, cum ut. Voluptatum, ipsam.</div>
    </div>
  </div>
  
  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
    <path fill="#ffffff" fill-opacity="1" d="M0,96L40,101.3C80,107,160,117,240,133.3C320,149,400,171,480,176C560,181,640,171,720,138.7C800,107,880,53,960,53.3C1040,53,1120,107,1200,117.3C1280,128,1360,96,1400,80L1440,64L1440,320L1400,320C1360,320,1280,320,1200,320C1120,320,1040,320,960,320C880,320,800,320,720,320C640,320,560,320,480,320C400,320,320,320,240,320C160,320,80,320,40,320L0,320Z"></path>
  </svg>
</section>

<script>
  $('#myModal').on('shown.bs.modal', function() {
    $('#myInput').trigger('focus')
  })
</script>


<script>
var alertPlaceholder = document.getElementById('liveAlertPlaceholder')
var alertTrigger = document.getElementById('liveAlertBtn')

function alert(message, type) {
  var wrapper = document.createElement('div')
  wrapper.innerHTML = '<div class="alert alert-' + type + ' alert-dismissible" role="alert">' + message + '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>'

  alertPlaceholder.append(wrapper)
}

if (alertTrigger) {
  alertTrigger.addEventListener('click', function () {
    alert('Nice, you triggered this alert message!', 'success')
  })
}
</script>
@endsection