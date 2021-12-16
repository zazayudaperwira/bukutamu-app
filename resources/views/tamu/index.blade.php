

@extends('preload.default')


@section('container-fluid')
    {{-- Bootsteap css --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="css/global_styling.css" rel=stylesheet>


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

<div class="m-3">
 @if (session()->has('sent'))
                <div class="alert alert-success mt-5" role="alert">
                    {{ session('sent') }}
                </div>
@endif
</div>


<div class="row mt-2 mb-5">
       
        <div class="col-1"></div>
        <div class="col-md-10 bg-light text-dark"> 
        <h1>Daftar Tamu</h1>
                    {{-- <h2 class="text-primary mt-3 mb-3"> Update {{ $d }} </h2> --}}

                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped table-hover table-bordered header-fixed" style="width:100%">
                            <thead>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Instansi</th>
                                <th>Keperluan</th>
                                <th>Jam Datang</th>
                                <th>Actions</th>
                            </thead>

                            @php $i=0 @endphp
                            @foreach($gb_guestbooks as  $data)
                                <tr>
                                    <td> {{ ++$i }} </td>
                                    <td> {{ $data->name }} </td>
                                    <td> {{ $data->instansi }} </td>
                                    <td> {{ $data->keperluan }} </td>
                                   <td> {{ $data->created_at }} </td>
                                    <td>
                                        <form action="/tamu/update" method="get">
                                            @csrf

                                            <input type="hidden" name="update" value="{{$data->id}}">
                                            <input type="hidden" name="d" value="{{ request('d') }}">

                                            <button type="submit" class="btn btn-primary w-100"> Checkout </button>
                                        </form>
                                        
                                    </td>
                                </tr>
                            
                            @endforeach
                        </table>
                    </div>
        
        </div>
        <div class="col-1"></div>
</div>

<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#e2edff" fill-opacity="1" d="M0,96L40,101.3C80,107,160,117,240,133.3C320,149,400,171,480,176C560,181,640,171,720,138.7C800,107,880,53,960,53.3C1040,53,1120,107,1200,117.3C1280,128,1360,96,1400,80L1440,64L1440,320L1400,320C1360,320,1280,320,1200,320C1120,320,1040,320,960,320C880,320,800,320,720,320C640,320,560,320,480,320C400,320,320,320,240,320C160,320,80,320,40,320L0,320Z"></path></svg>



<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-more.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>


{{-- Bootstrap 5 --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<!-- script js untuk data table -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>

<script src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.bootstrap5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.colVis.min.js"></script>


 {{-- script js untuk data table  --}}
{{-- <script>
$(document).ready(function() {
    var table = $('#datatable').DataTable( {
        lengthChange: false,
        buttons: [ 'copy', 'excel', 'pdf', 'colvis' ]
    } );
 
    table.buttons().container()
        .appendTo( '#datatable_wrapper .col-md-6:eq(0)' );
} );
</script> --}}



@endsection