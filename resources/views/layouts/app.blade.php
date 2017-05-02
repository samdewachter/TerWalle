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
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
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
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
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

        @yield('content')
    </div>

    <!-- Modal -->
    <div class="modal fade login" id="myLogin" tabindex="-1" role="dialog" aria-labelledby="myModalLogin">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    TER WALLE
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="body-header">
                        <div class="body-title">
                            Login
                        </div>
                        <span class="body-info">Welkom! Gelieve je hieronder aan te melden.</span>
                    </div>
                        <form method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <input type="text" name="email" placeholder="Email" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" placeholder="Paswoord" class="form-control">
                            </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn-custom">LOGIN</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade register" id="myRegister" tabindex="-1" role="dialog" aria-labelledby="myModalRegister">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    TER WALLE
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="body-header">
                        <div class="body-title">
                            Registreer
                        </div>
                        <span class="body-info">Welkom! Gelieve je hieronder te registreren.</span>
                    </div>
                        <form method="POST" action="{{ route('register') }}">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <input type="text" name="first_name" placeholder="Voornaam" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="text" name="last_name" placeholder="Achternaam" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="text" name="email" placeholder="Email" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="date" name="birth_year" placeholder="Geboortedatum" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="text" name="photo" placeholder="Foto" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" placeholder="Paswoord" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Bevestig paswoord" name="password_confirmation">
                            </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn-custom">REGISTREER</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/script.js') }}"></script>
</body>
</html>
