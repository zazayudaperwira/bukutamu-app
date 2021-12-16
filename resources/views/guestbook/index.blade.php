@extends('preload.default')

@section('title', 'Guestbook Page')

@section('container')

<link rel="stylesheet" type="text/css" 
       href="https://cdnjs.cloudflare.com/ajax/libs/twitter- 
       bootstrap/4.3.1/css/bootstrap.css">

    <script type="text/javascript" 
     src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <link type="text/css" 
      href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/south- 
             street/jquery-ui.css" rel="stylesheet">
    <script type="text/javascript" 
       src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"> 
    </script>
    <script type="text/javascript" src="http://keith-wood.name/js/jquery.signature.js"> 
    </script>

    <link rel="stylesheet" type="text/css" href="http://keith- 
     wood.name/css/jquery.signature.css">
    <style>
        .kbw-signature { width: 100%; height: 200px;}
        #sig canvas{
            width: 100% !important;
            height: auto;
            resize: none;
        }

        textarea {
                width: 50%;
                height: 150px;
                padding: 12px 20px;
                box-sizing: border-box;
                border: 2px solid #ccc;
                border-radius: 4px;
                background-color: #f8f8f8;
                font-size: 16px;
                resize: none;
        }

        #sketchpadapp {
            /* Prevent nearby text being highlighted when accidentally dragging mouse outside confines of the canvas */
            -webkit-touch-callout: none;
            -webkit-user-select: none;
            -khtml-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }


        #sketchpad {
            float:left;
            border:2px solid #888;
            border-radius:4px;
            position:relative; /* Necessary for correct mouse co-ords in Firefox */
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


    <div class="row d-flex justify-content-center bg-white">
        <div class="col-md-8 bg-white rounded">

            <h2 class="text-primary mt-3"> Buku Tamu </h2>

            @if (session()->has('sent'))
                <div class="alert alert-success mt-5" role="alert">
                    {{ session('sent') }}
                </div>
            @endif

            <div class="container mt-5 align-left">
                <form action="/guestbook" method="post">
                    @csrf

                    <div class="form-group row">
                        <label for="full_name" class="col-sm-2 col-form-label"> <b>Nama</b></label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" name="name" id="full_name"  placeholder="Nama Lengkap">
                        </div>
                    </div>

                    <div class="form-group row mt-5">
                        <label for="guest_instansi" class="col-sm-2 col-form-label"> <b>Instansi</b></label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control"name="instansi" id="guest_instansi"   placeholder="Asal Instansi/Universitas">
                        </div>
                    </div>

                    <div class="form-group row mt-5">
                        <label for="guest_jumlah" class="col-sm-2 col-form-label"> <b>Jumlah Pengunjung</b></label>
                        <div class="col-sm-10">
                        <input type="number" class="form-control"name="jumlah" id="guest_jumlah"   placeholder="Jumlah Pengunjung">
                        </div>
                    </div>

                    <div class="form-group row mt-5">
                        <label for="guest_address" class="col-sm-2 col-form-label"> <b>Alamat</b></label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" name="address" id="guest_address"   placeholder="Alamat asal">
                        </div>
                    </div>
     
                    <div class="form-group row mt-5">
                        
                            <label for="guest_tujuan" class="col-sm-2 col-form-label">  <b>Tujuan</b></label>
                       
                        <div class="col-sm-10">
                        <select  class="form-control" name="tujuan" id="guest_tujuan"  >
                            <option selected>Pilih...</option>
                            <option value="Keperluan bertemu Kepala BPS Provinsi">Keperluan bertemu Kepala BPS Provinsi</option>
                            <option value="Pelayanan Statistik Terpadu">Pelayanan Statistik Terpadu (Mencari Data, dan Konsultasi data)</option>
                            <option value="Keperluan berkaitan Statistik Neraca">Keperluan berkaitan Statistik Neraca</option>
                            <option value="Keperluan berkaitan Statistik Produksi">Keperluan berkaitan Statistik Produksi</option>
                            <option value="Keperluan berkaitan Statistik Distribusi">Keperluan berkaitan Statistik Distribusi</option>
                            <option value="Keperluan berkaitan Statistik Sosial">Keperluan berkaitan Statistik Sosial</option>
                            <option value="Keperluan berkaitan Statistik Neraca">Keperluan berkaitan Statistik Neraca</option>
                            <option value="Keperluan berkaitan Bagian Umum">Keperluan berkaitan Bagian Umum</option>
                            <option value="Lainnya">Lainnya</option>
                            
                        </select>
                        </div>
                    </div>

                    <div class="form-group row mt-5">
                        <label for="guest_keperluan" class="col-sm-2 col-form-label">  <b>Keperluan</b></label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" name="keperluan" id="guest_keperluan"   placeholder="Tuliskan Keperluan kunjungan">
                        </div>
                    </div>

                     <div class="form-group row mt-5">
                        <label for="phone_number" class="col-sm-2 col-form-label">  <b>No. Hp</b></label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" name="phone" id="phone_number"  placeholder="No Hp aktif">
                        </div>
                    </div>
 
                    <div class="form-group row mt-5">
                        <label for="email_address"class="col-sm-2 col-form-label"> <b>Email</b></label>
                        <div class="col-sm-10">
                        <input type="email" class="form-control" name="email" id="email_address"   placeholder="Alamat Email">
                        </div>
                    </div>

                    {{-- Signature Input --}}
                    {{-- <div class="form-group row mt-5">
                    <div class="col-md-8 mt-3">
                            <label class="" for="sig"> Silahkan bubuhkan tanda tangan :
                            </label>
                            
                            <div id="sig" tabindex="-1" ></div>
                            
                            <button id="clear" class="btn btn-danger btn-sm">Hapus 
                                 Tandatangan
                            </button>
                            <textarea  id="signature64" name="signed" style="display:none" action="onclick">
                            </textarea>
                        </div>
                    </div> --}}
                    {{-- Pusing banget gabisa bisa nih --}}
                    <div class="tools">
                        <a href="#sig" data-tool="marker">Marker</a> <a href="#sig" data-tool="eraser">
                            Eraser</a>
                    </div>
                    <br />
                    
                    <div id="sig" width="500" height="200" style="border: 1px solid #ccc">
                    </div> 

                    <textarea  id="signature64" name="signed" style="display:none"  action="onclick">
                            </textarea>

                    <input type="hidden" class="form-control" name="sign" id="sign" value="2323">


                    
                    {{-- End Signature Input --}}

                    
                    

                    <div class="form-group mb-5 mt-5">
                        <button type="submit" name="inputSubmit" value="submit" class="btn btn-outline-primary"> Submit </button>
                    </div>
                </form>

            </div>
        </div>
    </div>





<script type="text/javascript">
    
    var sig = $('#sig').signature({syncField: '#signature64', syncFormat: 'PNG'});
    $('#clear').click(function(e) {
        e.preventDefault();
        sig.signature('clear');
        $("#signature64").val('');
    });
</script>



<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="https://cdn.rawgit.com/mobomo/sketch.js/master/lib/sketch.min.js" type="text/javascript"></script>
<script type="text/javascript">
    $(function () {
        $('#sig').sketch();
        $(".tools a").eq(0).attr("style", "color:#000");
        $(".tools a").click(function () {
            $(".tools a").removeAttr("style");
            $(this).attr("style", "color:#000");
        });
    });
</script>

{{-- <script>
document.getElementById('#signature64').focus();
</script> --}}


@endsection









