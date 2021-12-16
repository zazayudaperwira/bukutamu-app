@extends('preload.default')

@section('title', 'Administrator')

@section('container-fluid')

  <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="css/global_styling.css" rel=stylesheet>

    <div class="m-t"> Space Kosong </div>
    <div class="row mt-5">
    <div class="col-3"></div>
    <div class="col-6 btn-group " role="group" aria-label="Basic mixed styles example">
        <a href="/admin?d=dashboard" role="button" class="btn btn-success bg-primary"> Dashboard </a>
        <a href="/admin?d=guestbooks" role="button" class="btn btn-success bg-warning"> Guestbooks </a>
        <a href="/admin?d=users" role="button" class="btn btn-success bg-succes "> Users </a>
        <a href="/admin?d=register" role="button" class="btn btn-success bg-primary"> Register </a>
    </div>
    <div class="col-3"></div>
    </div>


    <div class="row mt-2 mb-5">
       
        <div class="col-1"></div>
        <div class="col-md-10 bg-light text-dark">
            @if (session()->has('success'))
                <div class="alert alert-success mt-5 bg-light" role="alert">
                 {{ session('success') }}
                </div>
            @endif

            @if(request('d') == 'dashboard')
                <div class="container">
                    <h1>Dashboard</h1>
                    <!-- Barchart Start -->
                    <div class="mt-4">
                    <div id="bcbarangrusak"></div>
                    </div>
                    <!-- Barchart End -->
                </div>
            @endif

             @if(request('d') == 'register')
                <div class="container">
                    <h1>Register</h1>
                <div class="container w-50 mt-1 text-light" style="margin-bottom: 15vw">
                <form action="/register" method="post">
                @csrf

            {{-- <h1 class="h3 mb-3 fw-normal">Silahkan Register</h1> --}}

                    <div class="form-floating mb-5 text-dark">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="inputFullName" placeholder="My name is..." value="{{ old('name') }}">
                        <label for="inputFullName">Full Name</label>

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
                </div>
            @endif


            @if(request('d') == 'users')
                <div class="">
                    <h1>Users</h1>

                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped table-hover table-bordered header-fixed mt-4" style="width:100%">
                            <thead>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Username</th>
                                <th>Email</th>
                                {{-- <th>Password</th> --}}
                                <th>Created At</th>
                                <th>Actions</th>
                            </thead>

                            @php $i=0 @endphp
                            @foreach($gb_users as  $data)
                                <tr>
                                    <td> {{ ++$i }} </td>
                                    <td> {{ $data->name }} </td>
                                    <td> {{ $data->username }} </td>
                                    <td> {{ $data->email }} </td>
                                    {{-- <td> {{ $data->password }} </td> --}}
                                    <td> {{ $data->created_at }} </td>
                                    <td>
                                        {{-- Modal Delete --}}
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-danger mb-2 w-100" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Delete
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Apakah anda yakin akan menghapus data tamu ini? data yang telah dihapus akan hilang secara permanen
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <form action="/delete" method="post">
                                            @csrf

                                            <input type="hidden" name="delete" value="{{$data->id}}">
                                            <input type="hidden" name="d" value="{{ request('d') }}">

                                            <button type="submit" class="btn btn-danger w-100"> Delete </button>
                                        </form>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                    {{-- End of Modal Delete --}}

                                        

                                        <form action="/update" method="get">
                                            @csrf

                                            <input type="hidden" name="update" value="{{$data->id}}">
                                            <input type="hidden" name="d" value="{{ request('d') }}">

                                            <button type="submit" class="btn btn-primary w-100"> Update </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            @endif

            @if(request('d') == 'guestbooks')
                <div class="container">
                    <h1>Guestbooks</h1>

                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped table-hover table-bordered header-fixed" style="width:100%">
                            <thead>
                                <th>Id</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Instansi</th>
                                <th>Jumlah</th>
                                <th>Tujuan</th>
                                <th>Keperluan</th>
                                <th>No. Hp</th>
                                <th>Email</th>
                                <th>Jam Datang</th>
                                <th>Jam Pulang</th>
                                <th>Keterangan</th>
                                <th>Paraf</th>
                                <th>Actions</th>
                            </thead>

                           @php $i=0 @endphp
                            @foreach($gb_guestbooks as  $data)
                                <tr>
                                    <td> {{ ++$i }} </td>
                                    <td> {{ $data->name }} </td>
                                    <td> {{ $data->address }} </td>
                                    <td> {{ $data->instansi }} </td>
                                    <td> {{ $data->jumlah }} </td>
                                    <td> {{ $data->tujuan }} </td>
                                    <td> {{ $data->keperluan }} </td>
                                    <td> {{ $data->phone }} </td>
                                    <td> {{ $data->email }} </td>
                                   <td> {{ $data->created_at }} </td>
                                    <td>{{ $data->jamkeluar }} </td>
                                    <td>{{($data->message)}}</td>
                                    <td>  <img src="images/ttd/{{substr($data->sign,-21)}}"  width="200" /></td>
                                    <td>

                                    {{-- Modal Delete --}}
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-danger mb-2 w-100" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Delete
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Apakah anda yakin akan menghapus data tamu ini? data yang telah dihapus akan hilang secara permanen
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <form action="/delete" method="post">
                                            @csrf

                                            <input type="hidden" name="delete" value="{{$data->id}}">
                                            <input type="hidden" name="d" value="{{ request('d') }}">

                                            <button type="submit" class="btn btn-danger w-100"> Delete </button>
                                        </form>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                    {{-- End of Modal Delete --}}
                                        
                                        
                                        

                                        <form action="/update" method="get">
                                            @csrf

                                            <input type="hidden" name="update" value="{{$data->id}}">
                                            <input type="hidden" name="d" value="{{ request('d') }}">

                                            <button type="submit" class="btn btn-primary w-100"> Update </button>
                                        </form>
                                    </td>
                                </tr>
                            
                            @endforeach
                        </table>
                    </div>
                </div>
            @endif
        </div>
        <div class="col-1"></div>
</div>


<script>
$('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})
</script>


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
<script>
$(document).ready(function() {
    var table = $('#datatable').DataTable( {
        lengthChange: false,
        buttons: [ 'copy', 'excel', 'pdf', 'colvis' ]
    } );
 
    table.buttons().container()
        .appendTo( '#datatable_wrapper .col-md-6:eq(0)' );
} );
</script>




<!-- Barchart -->
<script>
    Highcharts.chart('bcbarangrusak', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Jumlah Pengunjung Per Fungsi'
    },
    subtitle: {
        text: 'Berdasarkan Fungsi/Bagian'
    },
    xAxis: {
        categories: [
            'Umum',
            'Nerwilis',
            'IPDS',
            'Sosial',
            'Distribusi',
            'Produksi',
            'PST'
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Banyak'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} </b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Fungsi',
        data: [6, 12, 5, 3, 8, 15,24]

    }]
});</script>



@endsection
