<nav class="navbar navbar-expand-md navbar-dark bg-primary sticky-top">
    <div class="container px-5">
        <a class="navbar-brand" href="{{ url('/') }}">
            Buku Tamu BPS Provinsi Lampung
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navigationCenter" aria-controls="navigationCenter" aria-expanded="false" aria-label="Navbar on smol">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navigationCenter">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">
                @guest
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="{{ url('/') }}">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ Request::is('guestbook') ? 'active' : '' }}" href="guestbook">Buku Tamu</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ Request::is('tamu') ? 'active' : '' }}" href="tamu?d=guestbooks">Tamu</a>
                </li>
                @endguest
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @guest
                @if (Route::has('login'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @endif

                @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>