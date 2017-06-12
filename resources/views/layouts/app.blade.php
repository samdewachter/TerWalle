<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/frontStyle.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/libs/lightbox.css') }}">
    @yield('css')


    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
    <div class="page-wrapper" id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="{{ asset('/images/TW_logo.png') }}">
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li><a href="{{ url('/nieuws') }}">Nieuws</a></li>
                        <li><a href="{{ url('/evenementen') }}">Evenementen</a></li>
                        <li><a href="{{ url('/fotos') }}">Foto's</a></li>
                        <li><a href="{{ url('/contact') }}">Contact</a></li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Registreer</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->first_name .' '. Auth::user()->last_name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                    <li>
                                        <a href="{{ url('/account', [Auth::User()->id]) }}">Account</a>
                                    </li>
                                    @if(Auth::user()->isHeadAdmin() || Auth::user()->isSubAdmin())
                                        <li>
                                            <a href="{{ url('/admin') }}">Admin dashboard</a>
                                        </li>
                                    @endif
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
            <div class="alert-wrapper">
                @if(Session::has('message'))
                    <div class="alert alert-{{ Session::get('message')[0] }}">
                        <button type="button" class="close">×</button>
                        <h4>{{ Session::get('message')[0] }}!</h4>
                        {{ Session::get('message')[1] }}
                    </div>
                @endif
            </div>
            @yield('content')
    </div>
    <div class="footer-wrapper">
            <div class="social-media">
                <img src="{{ asset('/images/socialMediaIcons.png') }}">
                <!-- <ul>
                    <li></li>
                    <li></li>
                    <li></li>
                </ul> -->
            </div>
            <div class="made-by">
                <p>This website is powered by Samdewachter</p>
            </div>
        </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/libs/masonry.pkgd.min.js') }}" type="text/javascript"></script>
    <script type="text/javascript" src="{{ asset('js/frontScript.js') }}"></script>
    @yield('scripts')
</body>
</html>
