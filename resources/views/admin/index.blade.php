@extends('preload.default')

@section('title', 'Administrator')

@section('container-fluid')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="css/global_styling.css" rel=stylesheet>



{{-- Login as IPDS --}}
@if(Auth::user()->role == "1") 





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
            <div class="row ms-3" >
            <div class="col-2"></div>
                <div class="col-4">
                    <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                    <div class="card-header">Rating Pengunjung</div>
                    <div class="card-body">
                        <h2 class="card-title">{{ $rate }}/10</h2>
                        <p class="card-text">{{ $ntamu }} Pengunjung memberikan rating</p>
                    </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card text-white bg-warning mb-3" style="max-width: 18rem;">
                    <div class="card-header">Rata rata waktu berkunjung</div>
                    <div class="card-body">
                        <h2 class="card-title">{{ $diffjam }} Jam {{ $diffmenit }} menit</h2>
                        <p class="card-text">per pengunjung yang datang</p>
                    </div>
                    </div>
                </div>
                <div class="col-2"></div>
            </div>
            

            

            <!-- barchart -->
            <div class="mt-4">
                <div id="barchart1"></div>
            </div>
            <div class="mt-4">
                <div id="barchart2"></div>
            </div>
            <!-- barchart end -->
        </div>
        @endif

        @if(request('d') == 'register')
        <div class="container">
            <h1>Register</h1>
            <div class="container w-50 mt-1 text-light" style="margin-bottom: 15vw">
                <form action="/register" method="post">
                    @csrf
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
                    <select class="form-control" name="role" id="inputRole" required>
                        <option selected>Pilih Role ll...</option>
                        <option value="1">IPDS</option>
                        <option value="2">Admin</option>
                        <option value="3">Supervisor</option>
                        <option value="4">User</option>
                    </select>
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
            </div>
        </div>
        @endif


        @if(request('d') == 'users')
        <div class="container">
            <h1>Users</h1>
            <div class="table-responsive">
                        <table id="datatable" class="table table-striped table-hover table-bordered header-fixed mt-4" style="width:100%">
                    <thead>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Role</th>
                        <th>Email</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </thead>
                    
                        @php $i=0 @endphp
                        @foreach($gb_users->sortByDesc('id') as $data)
                        <tr>
                            <td> {{ ++$i }} </td>
                            <td> {{ $data->name }} </td>
                            <td> {{ $data->username }} </td>
                            <td> {{ $data->role }} </td>
                            <td> {{ $data->email }} </td>
                            <td> {{ $data->created_at }} </td>
                            <td>

                                <!-- button delete -->
                                <button type="button" class="btn btn-danger mb-2 w-100" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Delete
                                </button>
                                <!-- button delete end -->

                                <!-- modal delete -->
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
                                <!-- modal delete end -->

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
        
        <div class="d-flex justify-content-end mt-2">
        {{-- Modal Checkout All --}}

                    <a href="/admin/checkoutall">
                        <button type="submit" class="btn btn-danger"> Checkout</button>
                    </a>
        {{-- Modal Checkout All --}}
        </div>

            
            {{-- Filter Bulan --}}
            <div class="col-3"></div>
            <div class="col-6 btn-group mb-2 " role="group" aria-label="Basic mixed styles example">
                <a href="/admin?d=guestbooks&b=01" role="button" class="btn btn-success bg-secondary"> jan </a>
                <a href="/admin?d=guestbooks&b=02" role="button" class="btn btn-success bg-secondary"> feb </a>
                <a href="/admin?d=guestbooks&b=03" role="button" class="btn btn-success bg-secondary "> mar </a>
                <a href="/admin?d=guestbooks&b=04" role="button" class="btn btn-success bg-secondary"> apr </a>
                <a href="/admin?d=guestbooks&b=05" role="button" class="btn btn-success bg-secondary"> mar </a>
                <a href="/admin?d=guestbooks&b=06" role="button" class="btn btn-success bg-secondary"> jun </a>
                <a href="/admin?d=guestbooks&b=07" role="button" class="btn btn-success bg-secondary "> jul </a>
                <a href="/admin?d=guestbooks&b=08" role="button" class="btn btn-success bg-secondary"> aug </a>
                <a href="/admin?d=guestbooks&b=09" role="button" class="btn btn-success bg-secondary"> sep </a>
                <a href="/admin?d=guestbooks&b=10" role="button" class="btn btn-success bg-secondary"> oct </a>
                <a href="/admin?d=guestbooks&b=11" role="button" class="btn btn-success bg-secondary"> nov </a>
                <a href="/admin?d=guestbooks&b=12" role="button" class="btn btn-success bg-secondary">des</a>
            </div>
            <div class="col-3"></div>

            @if(request('b')== '01')            
            <h1>Guestbooks bulan Januari</h1>
            @elseif(request('b')== '02')
            <h1>Guestbooks bulan Februari</h1>
            @elseif(request('b')== '03')
            <h1>Guestbooks bulan Maret</h1>
            @elseif(request('b')== '04')
            <h1>Guestbooks bulan April</h1>
            @elseif(request('b')== '05')
            <h1>Guestbooks bulan Mei</h1>
            @elseif(request('b')== '06')
            <h1>Guestbooks bulan Juni</h1>
            @elseif(request('b')== '07')
            <h1>Guestbooks bulan Juli</h1>
            @elseif(request('b')== '08')
            <h1>Guestbooks bulan Agustus</h1>
            @elseif(request('b')== '09')
            <h1>Guestbooks bulan September</h1>
            @elseif(request('b')== '10')
            <h1>Guestbooks bulan Oktober</h1>
            @elseif(request('b')== '11')
            <h1>Guestbooks bulan November</h1>
            @elseif(request('b')== '12')
            <h1>Guestbooks bulan Desember</h1>
            @endif
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
                        <th>Kepuasan</th>
                        <th>Keterangan</th>
                        <th>Paraf</th>
                        <th>Actions</th>
                    </thead>
                    
                        @php $i=0 @endphp
                        @foreach($gb_guestbooks->sortByDesc('id') as $data)
                        @if(substr($data->created_at ,5,2) == request('b'))
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
                            <td> {{ $data->jammasuk }}, {{substr($data->created_at ,0,10)}}</td>
                            <td> {{ $data->jamkeluar }} </td>
                            <td> {{ $data->kep }} </td>
                            <td> {{ $data->message }} </td>
                            <td> <img src="images/ttd/{{substr($data->sign,-21)}}" width="200" /> </td>
                            <td>
                                <!-- button delete -->
                                <button type="button" class="btn btn-danger mb-2 w-100" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Delete
                                </button>
                                <!-- button delete end -->

                                <!-- modal delete -->
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
                                <!-- modal delete end -->

                                <!-- button update -->
                                <form action="/update" method="get">
                                    @csrf
                                    <input type="hidden" name="update" value="{{$data->id}}">
                                    <input type="hidden" name="d" value="{{ request('d') }}">
                                    <button type="submit" class="btn btn-primary w-100"> Update </button>
                                </form>
                                <!-- button update delete -->
                            </td>
                        </tr>
                      @endif
                    @endforeach
                </table>
            </div>
        </div>
        @endif
    </div>
    <div class="col-1"></div>
</div>
@endif 
{{-- End Login as IPDS  --}}



{{-- Login as Admin --}}
@if(Auth::user()->role == 2)
<div class="row mt-5">
    <div class="col-3"></div>
    <div class="col-6 btn-group " role="group" aria-label="Basic mixed styles example">
        <a href="/admin?d=dashboard" role="button" class="btn btn-success bg-primary"> Dashboard </a>
        <a href="/admin?d=guestbooks" role="button" class="btn btn-success bg-warning"> Guestbooks </a>
        <a href="/admin?d=users" role="button" class="btn btn-success bg-succes "> Users </a>
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
            <div class="row ms-3" >
            <div class="col-2"></div>
                <div class="col-4">
                    <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                    <div class="card-header">Rating Pengunjung</div>
                    <div class="card-body">
                        <h2 class="card-title">{{ $rate }}/10</h2>
                        <p class="card-text">{{ $ntamu }} Pengunjung memberikan rating</p>
                    </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card text-white bg-warning mb-3" style="max-width: 18rem;">
                    <div class="card-header">Rata rata waktu berkunjung</div>
                    <div class="card-body">
                        <h2 class="card-title">{{ $diffjam }} Jam {{ $diffmenit }} menit</h2>
                        <p class="card-text">per pengunjung yang datang</p>
                    </div>
                    </div>
                </div>
                <div class="col-2"></div>
            </div>
            

            

            <!-- barchart -->
            <div class="mt-4">
                <div id="barchart1"></div>
            </div>
            <div class="mt-4">
                <div id="barchart2"></div>
            </div>
            <!-- barchart end -->
        </div>
        @endif

        @if(request('d') == 'users')
        <div class="container">
            <h1>Users</h1>
            <div class="table-responsive">
                        <table id="datatable" class="table table-striped table-hover table-bordered header-fixed mt-4" style="width:100%">
                    <thead>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </thead>
                    
                        @php $i=0 @endphp
                        @foreach($gb_users->sortByDesc('id') as $data)
                        <tr>
                            <td> {{ ++$i }} </td>
                            <td> {{ $data->name }} </td>
                            <td> {{ $data->username }} </td>
                            <td> {{ $data->email }} </td>
                            <td> {{ $data->created_at }} </td>
                            <td>

                                <!-- button delete -->
                                <button type="button" class="btn btn-danger mb-2 w-100" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Delete
                                </button>
                                <!-- button delete end -->

                                <!-- modal delete -->
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
                                <!-- modal delete end -->

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
        
        <div class="d-flex justify-content-end mt-2">
        {{-- Modal Checkout All --}}

                    <a href="/admin/checkoutall">
                        <button type="submit" class="btn btn-danger"> Checkout</button>
                    </a>
        {{-- Modal Checkout All --}}
        </div>

            <h1>Guestbooks</h1>

            {{-- Filter Bulan --}}
            <div class="col-3"></div>
            <div class="col-6 btn-group mb-2 " role="group" aria-label="Basic mixed styles example">
                <a href="/admin?d=guestbooks&b=01" role="button" class="btn btn-success bg-secondary"> jan </a>
                <a href="/admin?d=guestbooks&b=02" role="button" class="btn btn-success bg-secondary"> feb </a>
                <a href="/admin?d=guestbooks&b=03" role="button" class="btn btn-success bg-secondary "> mar </a>
                <a href="/admin?d=guestbooks&b=04" role="button" class="btn btn-success bg-secondary"> apr </a>
                <a href="/admin?d=guestbooks&b=05" role="button" class="btn btn-success bg-secondary"> mar </a>
                <a href="/admin?d=guestbooks&b=06" role="button" class="btn btn-success bg-secondary"> jun </a>
                <a href="/admin?d=guestbooks&b=07" role="button" class="btn btn-success bg-secondary "> jul </a>
                <a href="/admin?d=guestbooks&b=08" role="button" class="btn btn-success bg-secondary"> aug </a>
                <a href="/admin?d=guestbooks&b=09" role="button" class="btn btn-success bg-secondary"> sep </a>
                <a href="/admin?d=guestbooks&b=10" role="button" class="btn btn-success bg-secondary"> oct </a>
                <a href="/admin?d=guestbooks&b=11" role="button" class="btn btn-success bg-secondary"> nov </a>
                <a href="/admin?d=guestbooks&b=12" role="button" class="btn btn-success bg-secondary">des</a>
            </div>
            <div class="col-3"></div>

            @if(request('b')== '01')            
            <h1>Guestbooks bulan Januari</h1>
            @elseif(request('b')== '02')
            <h1>Guestbooks bulan Februari</h1>
            @elseif(request('b')== '03')
            <h1>Guestbooks bulan Maret</h1>
            @elseif(request('b')== '04')
            <h1>Guestbooks bulan April</h1>
            @elseif(request('b')== '05')
            <h1>Guestbooks bulan Mei</h1>
            @elseif(request('b')== '06')
            <h1>Guestbooks bulan Juni</h1>
            @elseif(request('b')== '07')
            <h1>Guestbooks bulan Juli</h1>
            @elseif(request('b')== '08')
            <h1>Guestbooks bulan Agustus</h1>
            @elseif(request('b')== '09')
            <h1>Guestbooks bulan September</h1>
            @elseif(request('b')== '10')
            <h1>Guestbooks bulan Oktober</h1>
            @elseif(request('b')== '11')
            <h1>Guestbooks bulan November</h1>
            @elseif(request('b')== '12')
            <h1>Guestbooks bulan Desember</h1>
            @endif

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
                        <th>Actions</th>
                    </thead>
                    
                        @php $i=0 @endphp
                        @foreach($gb_guestbooks->sortByDesc('id') as $data)
                        @if(substr($data->created_at ,5,2) == request('b'))
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
                            <td> {{ $data->jammasuk }}, {{substr($data->created_at ,0,10)}} </td>
                            <td> {{ $data->jamkeluar }} </td>
                            <td> {{ $data->message }} </td>
                            <td>
                                <!-- button delete -->
                                <button type="button" class="btn btn-danger mb-2 w-100" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Delete
                                </button>
                                <!-- button delete end -->

                                <!-- modal delete -->
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
                                <!-- modal delete end -->

                                <!-- button update -->
                                <form action="/update" method="get">
                                    @csrf
                                    <input type="hidden" name="update" value="{{$data->id}}">
                                    <input type="hidden" name="d" value="{{ request('d') }}">
                                    <button type="submit" class="btn btn-primary w-100"> Update </button>
                                </form>
                                <!-- button update delete -->
                            </td>
                        </tr>
                    @endif
                    @endforeach
                </table>
            </div>
        </div>
        @endif
    </div>
    <div class="col-1"></div>
 </div>
@endif 
{{-- End Login as Admin  --}}

{{-- Login as User --}}
@if(Auth::user()->role == 4)
<div class="row mt-5">
    <div class="col-3"></div>
    <div class="col-6 btn-group " role="group" aria-label="Basic mixed styles example">
        <a href="/admin?d=dashboard" role="button" class="btn btn-success bg-primary"> Dashboard </a>
        <a href="/admin?d=guestbooks" role="button" class="btn btn-success bg-warning"> Guestbooks </a>
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
            <div class="row ms-3" >
            <div class="col-2"></div>
                <div class="col-4">
                    <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                    <div class="card-header">Rating Pengunjung</div>
                    <div class="card-body">
                        <h2 class="card-title">{{ $rate }}/10</h2>
                        <p class="card-text">{{ $ntamu }} Pengunjung memberikan rating</p>
                    </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card text-white bg-warning mb-3" style="max-width: 18rem;">
                    <div class="card-header">Rata rata waktu berkunjung</div>
                    <div class="card-body">
                        <h2 class="card-title">{{ $diffjam }} Jam {{ $diffmenit }} menit</h2>
                        <p class="card-text">per pengunjung yang datang</p>
                    </div>
                    </div>
                </div>
                <div class="col-2"></div>
            </div>
            

            

            <!-- barchart -->
            <div class="mt-4">
                <div id="barchart1"></div>
            </div>
            <div class="mt-4">
                <div id="barchart2"></div>
            </div>
            <!-- barchart end -->
        </div>
        @endif

        @if(request('d') == 'guestbooks')
        <div class="container">
        
        <div class="d-flex justify-content-end mt-2">
        {{-- Modal Checkout All --}}

                    <a href="/admin/checkoutall">
                        <button type="submit" class="btn btn-danger"> Checkout</button>
                    </a>
        {{-- Modal Checkout All --}}
        </div>

            <h1>Guestbooks</h1>

            {{-- Filter Bulan --}}
            <div class="col-3"></div>
            <div class="col-6 btn-group mb-2 " role="group" aria-label="Basic mixed styles example">
                <a href="/admin?d=guestbooks&b=01" role="button" class="btn btn-success bg-secondary"> jan </a>
                <a href="/admin?d=guestbooks&b=02" role="button" class="btn btn-success bg-secondary"> feb </a>
                <a href="/admin?d=guestbooks&b=03" role="button" class="btn btn-success bg-secondary "> mar </a>
                <a href="/admin?d=guestbooks&b=04" role="button" class="btn btn-success bg-secondary"> apr </a>
                <a href="/admin?d=guestbooks&b=05" role="button" class="btn btn-success bg-secondary"> mar </a>
                <a href="/admin?d=guestbooks&b=06" role="button" class="btn btn-success bg-secondary"> jun </a>
                <a href="/admin?d=guestbooks&b=07" role="button" class="btn btn-success bg-secondary "> jul </a>
                <a href="/admin?d=guestbooks&b=08" role="button" class="btn btn-success bg-secondary"> aug </a>
                <a href="/admin?d=guestbooks&b=09" role="button" class="btn btn-success bg-secondary"> sep </a>
                <a href="/admin?d=guestbooks&b=10" role="button" class="btn btn-success bg-secondary"> oct </a>
                <a href="/admin?d=guestbooks&b=11" role="button" class="btn btn-success bg-secondary"> nov </a>
                <a href="/admin?d=guestbooks&b=12" role="button" class="btn btn-success bg-secondary">des</a>
            </div>
            <div class="col-3"></div>

            @if(request('b')== '01')            
            <h1>Guestbooks bulan Januari</h1>
            @elseif(request('b')== '02')
            <h1>Guestbooks bulan Februari</h1>
            @elseif(request('b')== '03')
            <h1>Guestbooks bulan Maret</h1>
            @elseif(request('b')== '04')
            <h1>Guestbooks bulan April</h1>
            @elseif(request('b')== '05')
            <h1>Guestbooks bulan Mei</h1>
            @elseif(request('b')== '06')
            <h1>Guestbooks bulan Juni</h1>
            @elseif(request('b')== '07')
            <h1>Guestbooks bulan Juli</h1>
            @elseif(request('b')== '08')
            <h1>Guestbooks bulan Agustus</h1>
            @elseif(request('b')== '09')
            <h1>Guestbooks bulan September</h1>
            @elseif(request('b')== '10')
            <h1>Guestbooks bulan Oktober</h1>
            @elseif(request('b')== '11')
            <h1>Guestbooks bulan November</h1>
            @elseif(request('b')== '12')
            <h1>Guestbooks bulan Desember</h1>
            @endif
            <div class="table-responsive">
                        <table id="datatable1" class="table table-striped table-hover table-bordered header-fixed" style="width:100%">
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
                        <th>Actions</th>
                    </thead>
                    
                        @php $i=0 @endphp
                        @foreach($gb_guestbooks->sortByDesc('id') as $data)
                        @if(substr($data->created_at ,5,2) == request('b'))
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
                            <td> {{ $data->jammasuk }}, {{substr($data->created_at ,0,10)}} </td>
                            <td> {{ $data->jamkeluar }} </td>
                            <td> {{ $data->message }} </td>
                            <td>
                                <!-- button delete -->
                                <button type="button" class="btn btn-danger mb-2 w-100" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Delete
                                </button>
                                <!-- button delete end -->

                                <!-- modal delete -->
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
                                <!-- modal delete end -->

                                <!-- button update -->
                                <form action="/update" method="get">
                                    @csrf
                                    <input type="hidden" name="update" value="{{$data->id}}">
                                    <input type="hidden" name="d" value="{{ request('d') }}">
                                    <button type="submit" class="btn btn-primary w-100"> Update </button>
                                </form>
                                <!-- button update delete -->
                            </td>
                        </tr>
                    @endif
                    @endforeach
                </table>
            </div>
        </div>
        @endif
    </div>
    <div class="col-1"></div>
</div>
@endif 
{{-- End Login as Users  --}}

{{-- Login as Supervisor --}}
@if(Auth::user()->role == 3)
<div class="row mt-5">
    <div class="col-3"></div>
    <div class="col-6 btn-group " role="group" aria-label="Basic mixed styles example">
        <a href="/admin?d=dashboard" role="button" class="btn btn-success bg-primary"> Dashboard </a>
        <a href="/admin?d=guestbooks" role="button" class="btn btn-success bg-warning"> Guestbooks </a>
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
            <div class="row ms-3" >
            <div class="col-2"></div>
                <div class="col-4">
                    <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                    <div class="card-header">Rating Pengunjung</div>
                    <div class="card-body">
                        <h2 class="card-title">{{ $rate }}/10</h2>
                        <p class="card-text">{{ $ntamu }} Pengunjung memberikan rating</p>
                    </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card text-white bg-warning mb-3" style="max-width: 18rem;">
                    <div class="card-header">Rata rata waktu berkunjung</div>
                    <div class="card-body">
                        <h2 class="card-title">{{ $diffjam }} Jam {{ $diffmenit }} menit</h2>
                        <p class="card-text">per pengunjung yang datang</p>
                    </div>
                    </div>
                </div>
                <div class="col-2"></div>
            </div>
            

            

            <!-- barchart -->
            <div class="mt-4">
                <div id="barchart1"></div>
            </div>
            <div class="mt-4">
                <div id="barchart2"></div>
            </div>
            <!-- barchart end -->
        </div>
        @endif

        @if(request('d') == 'guestbooks')
        <div class="container">

            <h1>Guestbooks</h1>

            {{-- Filter Bulan --}}
            <div class="col-3"></div>
            <div class="col-6 btn-group mb-2 " role="group" aria-label="Basic mixed styles example">
                <a href="/admin?d=guestbooks&b=01" role="button" class="btn btn-success bg-secondary"> jan </a>
                <a href="/admin?d=guestbooks&b=02" role="button" class="btn btn-success bg-secondary"> feb </a>
                <a href="/admin?d=guestbooks&b=03" role="button" class="btn btn-success bg-secondary "> mar </a>
                <a href="/admin?d=guestbooks&b=04" role="button" class="btn btn-success bg-secondary"> apr </a>
                <a href="/admin?d=guestbooks&b=05" role="button" class="btn btn-success bg-secondary"> mar </a>
                <a href="/admin?d=guestbooks&b=06" role="button" class="btn btn-success bg-secondary"> jun </a>
                <a href="/admin?d=guestbooks&b=07" role="button" class="btn btn-success bg-secondary "> jul </a>
                <a href="/admin?d=guestbooks&b=08" role="button" class="btn btn-success bg-secondary"> aug </a>
                <a href="/admin?d=guestbooks&b=09" role="button" class="btn btn-success bg-secondary"> sep </a>
                <a href="/admin?d=guestbooks&b=10" role="button" class="btn btn-success bg-secondary"> oct </a>
                <a href="/admin?d=guestbooks&b=11" role="button" class="btn btn-success bg-secondary"> nov </a>
                <a href="/admin?d=guestbooks&b=12" role="button" class="btn btn-success bg-secondary">des</a>
            </div>
            <div class="col-3"></div>

            @if(request('b')== '01')            
            <h1>Guestbooks bulan Januari</h1>
            @elseif(request('b')== '02')
            <h1>Guestbooks bulan Februari</h1>
            @elseif(request('b')== '03')
            <h1>Guestbooks bulan Maret</h1>
            @elseif(request('b')== '04')
            <h1>Guestbooks bulan April</h1>
            @elseif(request('b')== '05')
            <h1>Guestbooks bulan Mei</h1>
            @elseif(request('b')== '06')
            <h1>Guestbooks bulan Juni</h1>
            @elseif(request('b')== '07')
            <h1>Guestbooks bulan Juli</h1>
            @elseif(request('b')== '08')
            <h1>Guestbooks bulan Agustus</h1>
            @elseif(request('b')== '09')
            <h1>Guestbooks bulan September</h1>
            @elseif(request('b')== '10')
            <h1>Guestbooks bulan Oktober</h1>
            @elseif(request('b')== '11')
            <h1>Guestbooks bulan November</h1>
            @elseif(request('b')== '12')
            <h1>Guestbooks bulan Desember</h1>
            @endif
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
                        <th>Jam Datang</th>
                        <th>Jam Pulang</th>
                    </thead>
                    
                        @php $i=0 @endphp
                        @foreach($gb_guestbooks->sortByDesc('id') as $data)
                        @if(substr($data->created_at ,5,2) == request('b'))
                        <tr>
                            <td> {{ ++$i }} </td>
                            <td> {{ $data->name }} </td>
                            <td> {{ $data->address }} </td>
                            <td> {{ $data->instansi }} </td>
                            <td> {{ $data->jumlah }} </td>
                            <td> {{ $data->tujuan }} </td>
                            <td> {{ $data->keperluan }} </td>
                            <td> {{ $data->jammasuk }}, {{substr($data->created_at ,0,10)}} </td>
                            <td> {{ $data->jamkeluar }} </td>
                        </tr>
                    @endif
                    @endforeach
                </table>
            </div>
        </div>
        @endif
    </div>
    <div class="col-1"></div>
</div>
@endif 
{{-- End Login as Supervisor  --}}


<script>
    $('#myModal').on('shown.bs.modal', function() {
        $('#myInput').trigger('focus')
    })

</script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-more.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>


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

<script>
$(document).ready(function() {
    $('#datatable1').DataTable();
} );
</script>

<!-- Barchart -->
<script>
    Highcharts.chart('barchart1', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Jumlah Pengunjung Tahun ' +
            <?php 
                echo \Carbon\Carbon::now()->format('Y');
            ?>
        },
        subtitle: {
            text: 'Berdasarkan Bulan'
        },
        xAxis: {
            categories: [
                'Januari',
                'Febuari',
                'Maret',
                'April',
                'Mei',
                'Juni',
                'Juli',
                'Agustus',
                'September',
                'Oktober',
                'November',
                'Desember',
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
            name: 'Bulan',
            data: [
                <?php 
                    for($i=1;$i<=12;$i++){
                        echo "$barchart[$i],";
                    } 
                ?>
            ]

        }]
    });
</script>

<script>
    Highcharts.chart('barchart2', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Jumlah Pengunjung per Hari'
        },
        subtitle: {
            text: 'Berdasarkan Hari'
        },
        xAxis: {
            categories: [
                'Senin',
                'Selasa',
                'Rabu',
                'Kamis',
                'Jumat',
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
            name: 'Hari',
            data: [
                <?php 
                    for($i=0;$i<=4;$i++){
                        echo "$barchart1[$i],";
                    } 
                ?>
            ]

        }]
    });
</script>
@endsection