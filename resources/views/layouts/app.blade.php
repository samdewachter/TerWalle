<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield('meta')

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
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
                        <li class="{{ Request::is('/') ? 'nav-active' : '' }}"><a href="{{ url('/') }}">Home</a></li>
                        <li class="{{ (Request::is('nieuws') || Request::is('nieuws/*')) ? 'nav-active' : '' }}"><a href="{{ url('/nieuws') }}">Nieuws</a></li>
                        <li class="{{ (Request::is('evenementen') || Request::is('evenementen/*')) ? 'nav-active' : '' }}"><a href="{{ url('/evenementen') }}">Evenementen</a></li>
                        <li class="{{ (Request::is('fotos') || Request::is('fotos/*')) ? 'nav-active' : '' }}"><a href="{{ url('/fotos') }}">Foto's</a></li>
                        <li class="{{ (Request::is('contact') || Request::is('contact/*')) ? 'nav-active' : '' }}"><a href="{{ url('/contact') }}">Contact</a></li>
                        <li class="{{ (Request::is('kernleden') || Request::is('kernleden/*')) ? 'nav-active' : '' }}"><a href="{{ url('/kernleden') }}">Kernleden</a></li>
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
                                        <a href="{{ url('/account', [Auth::User()->id . '-' . Auth::User()->title_url]) }}">Account</a>
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
                <!-- <img src="{{ asset('/images/socialMediaIcons.png') }}"> -->
                <ul class="social-media-icons">
                    <li><a href="https://www.facebook.com/terwalle" target="_blank"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="https://www.instagram.com/jh_ter_walle" target="_blank"><i class="fa fa-instagram"></i></a></li>
                    <li><a href=""><i class="fa fa-twitter"></i></a></li>
                </ul>
            </div>
            <div class="made-by">
                <p>This website is powered by Samdewachter</p>
            </div>
        </div>

    <!-- Scripts -->
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-90325820-3', 'auto');
      ga('send', 'pageview');

    </script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/libs/masonry.pkgd.min.js') }}" type="text/javascript"></script>
    <script type="text/javascript" src="{{ asset('js/frontScript.js') }}"></script>
    @yield('scripts')
</body>
</html>
