<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <!-- bootstrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css" />
    
    {{--        <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">--}}
    {{--        <!-- Font Awesome -->--}}
    {{--        <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">--}}
    {{--        <!-- Ionicons -->--}}
    {{--        <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">--}}
    {{--        <!-- Theme style -->--}}
    {{--        <link rel="stylesheet" href="dist/css/AdminLTE.min.css">--}}
    {{--        <!-- AdminLTE Skins. We have chosen the skin-blue for this starter--}}
    {{--              page. However, you can choose any other skin. Make sure you--}}
    {{--              apply the skin class to the body tag so the changes take effect. -->--}}
    {{--        <link rel="stylesheet" href="dist/css/skins/skin-blue.min.css">--}}

    {{--        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->--}}
    {{--        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->--}}
    {{--        <!--[if lt IE 9]>--}}
    {{--        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>--}}
    {{--        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>--}}
    {{--        <![endif]-->--}}

    {{--        <!-- Google Font -->--}}
    {{--        <link rel="stylesheet"--}}
    {{--              href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">--}}

    <link rel="stylesheet" href="{{ URL('css/global_styling.css') }}">
    {{-- <title> {{ $title }} | BPS Lampung</title> --}}

    <!-- Title -->
    <title>@yield('title') | BPS Lampung</title>


    <style>
        @yield('styling');

        @media (max-width: 768px) {
            .navbar-brand {
                font-size: 0.8rem;
            }
            
            * {
                font-size: 0.9rem;
            }
        }
    </style>
</head>

    @include('partials.header')
    
<body class="bg-light">
     
    @yield('body-content')

    <section class="bg-white">
        <div class="container  bg-white">
            @yield('container')
        </div>
    <section>

    {{-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#e2edff" fill-opacity="1" d="M0,96L40,101.3C80,107,160,117,240,133.3C320,149,400,171,480,176C560,181,640,171,720,138.7C800,107,880,53,960,53.3C1040,53,1120,107,1200,117.3C1280,128,1360,96,1400,80L1440,64L1440,0L1400,0C1360,0,1280,0,1200,0C1120,0,1040,0,960,0C880,0,800,0,720,0C640,0,560,0,480,0C400,0,320,0,240,0C160,0,80,0,40,0L0,0Z"></path></svg> --}}
    
    <div class="container-fluid">
        @yield('container-fluid')
    </div>

    <footer class="bg-primary text-white text-center fixed-bottom width-100">
    {{-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path
            fill="#0d6efd"
            fill-opacity="1"
            d="M0,192L21.8,202.7C43.6,213,87,235,131,208C174.5,181,218,107,262,106.7C305.5,107,349,181,393,192C436.4,203,480,149,524,144C567.3,139,611,181,655,176C698.2,171,742,117,785,112C829.1,107,873,149,916,144C960,139,1004,85,1047,96C1090.9,107,1135,181,1178,202.7C1221.8,224,1265,192,1309,176C1352.7,160,1396,160,1418,160L1440,160L1440,320L1418.2,320C1396.4,320,1353,320,1309,320C1265.5,320,1222,320,1178,320C1134.5,320,1091,320,1047,320C1003.6,320,960,320,916,320C872.7,320,829,320,785,320C741.8,320,698,320,655,320C610.9,320,567,320,524,320C480,320,436,320,393,320C349.1,320,305,320,262,320C218.2,320,175,320,131,320C87.3,320,44,320,22,320L0,320Z"
            ></path>
        </svg> --}}
        <p>Created with <a href="/login"><i class="bi bi-suit-heart-fill text-danger"></i></a> by OJT Polstat STIS 59</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- jQuery 3 -->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    
</body>
</html>
