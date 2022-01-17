@extends('preload.default')

@section('title', 'Administrator')

@section('container-fluid')
<div class="row d-flex justify-content-center">
    <div class="col-md-8 bg-light">
        <h2 class="text-danger mt-3 mb-3"> Checkout Semua Tamu </h2>
        <p> <b>Apakah anda yakin akan mencheckout semua tamu yang masih berada di BPS Provinsi Lampung? </b> <p>

        <div class="container w-50 text-dark mb-4">

           

            {{-- Guestbooks --}}
            <form action="/admin/checkoutall" method="post">
                @csrf
                <input type="hidden" name="status" id="status" class="form-control" value="2">
                <input type="hidden" name="jamkeluar" id="jamkeluar" class="form-control" value="{{ date("H:i") }}">
                <div class="form-group mb-5">
                    <input type="hidden" name="message" id="message" class="form-control" value="AUTO CHECKOUT">
                </div>

                <div class="form-group mb-5">
                    <button type="submit" name="inputSubmit" value="submit" class="btn btn-outline-danger"> Checkout </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection