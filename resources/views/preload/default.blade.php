<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap 5 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <!-- Bootstrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css" />

    <!-- Custom Style -->
    <link rel="stylesheet" href="{{ URL('css/global_styling.css') }}">
  <link rel="stylesheet" type="text/css" href="css/global_styling.css">
  @yield('styling')

    <!-- Title -->
    <title>@yield('title') | BPS Lampung</title>
</head>

<body class="bg-light">
    @include('partials.header')

    <section class="bg-white">
        <div class="container-fluid">
            @yield('container')
        </div>
    </section>

    <section class="bg-white">
        <div class="container-fluid">
            @yield('container-fluid')
        </div>
    </section>

    <footer class="bg-primary text-white text-center p-2">
        <p>Created with <a href="/login"><i class="bi bi-suit-heart-fill text-danger"></i></a> by OJT Polstat STIS 59</p>
    </footer>
    
    <!-- jQuery 3 -->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
</body>

</html>