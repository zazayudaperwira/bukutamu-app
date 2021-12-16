@extends('preload.default')

@section('title', 'Administrator')

@section('container')
    <div class="row d-flex justify-content-center">
        <div class="col-md-8 bg-light">
            <div class="mt-5"> SPACE </div>
            <h2 class="text-primary mt-3 mb-3"> Update {{ $d }} </h2>

            <div class="container w-50 text-dark mb-4">

{{--                Users--}}

                @if( request('d') == 'users')
                    <form action="/update" method="post">
                        @csrf

                        <input type="hidden" name="update" value="{{ request('update') }}">
                        <input type="hidden" name="d" value="{{ request('d') }}">

                        <div class="form-group mb-5">
                            <label for="name"> Nama </label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ DB::table('users')->where('id', '=', request('update') )->value('name') }}">
                        </div>

                        <div class="form-group mb-5">
                            <label for="username"> Username </label>
                            <input type="text" name="username" id="username" class="form-control" value="{{ DB::table('users')->where('id', '=', request('update') )->value('username') }}">
                        </div>

                        <div class="form-group mb-5">
                            <label for="email" > Alamat Email </label>
                            <input type="email" name="email" id="email" class="form-control" value="{{ DB::table('users')->where('id', '=', request('update') )->value('email') }}">
                        </div>

                        <div class="form-group mb-5">
                            <label for="password"> Password </label>
                            <input type="password" name="password" id="password" class="form-control" value="{{ DB::table('users')->where('id', '=', request('update') )->value('password') }}" disabled>
                        </div>

                        <div class="form-group mb-5">
                            <button type="submit" name="inputSubmit" value="submit" class="btn btn-outline-primary"> Submit </button>
                        </div>
                    </form>
                @endif

{{--                Guestbooks--}}

                @if( request('d') == 'guestbooks')
                    <form action="/update" method="post">
                        @csrf

                        <input type="hidden" name="update" value="{{ request('update') }}">
                        <input type="hidden" name="d" value="{{ request('d') }}">

                        <div class="form-group mb-5">
                            <label for="name"> Nama </label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ DB::table('guestbooks')->where('id', '=', request('update') )->value('name') }}">
                        </div>

                        <div class="form-group mb-5">
                            <label for="address"> Alamat </label>
                            <input type="text" name="address" id="address" class="form-control" value="{{ DB::table('guestbooks')->where('id', '=', request('update') )->value('address') }}">
                        </div>

                        <div class="form-group mb-5">
                            <label for="instansi"> Instansi </label>
                            <input type="text" name="instansi" id="instansi" class="form-control" value="{{ DB::table('guestbooks')->where('id', '=', request('update') )->value('instansi') }}">
                        </div>

                        <div class="form-group mb-5">
                            <label for="jumlah"> Jumlah </label>
                            <input type="number" name="jumlah" id="jumlah" class="form-control" value="{{ DB::table('guestbooks')->where('id', '=', request('update') )->value('jumlah') }}">
                        </div>

                        <div class="form-group mb-5">
                            <label for="guest_tujuan" >  Tujuan</label>
                            <select  class="form-control" name="tujuan" id="guest_tujuan"  >
                            <option selected >{{ DB::table('guestbooks')->where('id', '=', request('update') )->value('tujuan') }}</option>
                            <option value="Keperluan bertemu Kepala BPS Provinsi">Keperluan bertemu Kepala BPS Provinsi</option>
                            <option value="Pelayanan Statistik Terpadu">Pelayanan Statistik Terpadu (Mencari Data, dan Konsultasi data)</option>
                            <option value="Keperluan berkaitan Statistik Neraca">Keperluan berkaitan Statistik Neraca</option>
                            <option value="Keperluan berkaitan Statistik Produksi">Keperluan berkaitan Statistik Produksi</option>
                            <option value="Keperluan berkaitan Statistik Distribusi">Keperluan berkaitan Statistik Distribusi</option>
                            <option value="Keperluan berkaitan Statistik Sosial">Keperluan berkaitan Statistik Sosial</option>
                            <option value="Keperluan berkaitan Statistik Neraca">Keperluan berkaitan Statistik Neraca</option>
                            <option value="Keperluan berkaitan Bagian Umum">Keperluan berkaitan Bagian Umum</option>
                            <option value="Keperluan berkaitan Bagian Umum">Lainnya</option> 
                        </select> 
                        </div>

                        <div class="form-group mb-5">
                            <label for="guest_status" >  Status</label>
                            <select  class="form-control" name="status" id="guest_status"  >
                            <option selected >{{ DB::table('guestbooks')->where('id', '=', request('update') )->value('status') }}</option>
                            <option value="0" >Masih di Kantor</option>
                            <option value="1">Sudah Keluar dari Kantor</option>
                        </select> 
                        </div>

                        <div class="form-group mb-5">
                            <label for="keperluan"> Keperluan </label>
                            <input type="text" name="keperluan" id="keperluan" class="form-control" value="{{ DB::table('guestbooks')->where('id', '=', request('update') )->value('keperluan') }}">
                        </div>

                        <div class="form-group mb-5">
                            <label for="phone"> No. Hp </label>
                            <input type="text" name="phone" id="phone" class="form-control" value="{{ DB::table('guestbooks')->where('id', '=', request('update') )->value('phone') }}">
                        </div>

                        <div class="form-group mb-5">
                            <label for="email" > Alamat Email </label>
                            <input type="email" name="email" id="email" class="form-control" value="{{ DB::table('guestbooks')->where('id', '=', request('update') )->value('email') }}">
                        </div>
                        


                        <div class="form-group mb-5">
                            <label for="jamkeluar" > Jam Keluar </label>
                            <input type="time" name="jamkeluar" id="jamkeluar" class="form-control" value="{{ DB::table('guestbooks')->where('id', '=', request('update') )->value('jamkeluar') }}">
                        </div>

                        <div class="form-group mb-5">
                            <label for="message"> Keterangan </label>
                            <input type="text" name="message" id="message" class="form-control" value="{{ DB::table('guestbooks')->where('id', '=', request('update') )->value('message') }}">
                        </div>

                        <div class="form-group mb-5">
                            <button type="submit" name="inputSubmit" value="submit" class="btn btn-outline-primary"> Submit </button>
                        </div>
                    </form>
                @endif


            </div>
        </div>
    </div>
@endsection
