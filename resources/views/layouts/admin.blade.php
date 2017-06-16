<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" id="csrf_token" content="{{ csrf_token() }}" />
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="{{ asset('css/weather-icons.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/weather-icons-wind.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/libs/fullcalendar.min.css') }}" >
	<link rel="stylesheet" type="text/css" href="{{ asset('css/libs/c3.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/libs/dropzone.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/libs/jquery-ui.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">

		
</head>
<body>
	<div class="background-fade">
	</div>
	<aside>
		<div class="brand-logo">
			<a href="{{ url('/') }}">
				<div id="logo">
					<img src="{{ asset('images/tw_logo.png') }}">
					
				</div>
				Ter Walle
			</a>
		</div>
		<div class="user-logged-in">
			<div class="content">
				<div class="user-name">
					{{ Auth::user()->first_name }}
					<span>{{ Auth::user()->Role->display_name }}</span>
				</div>
				<div class="user-email">
					{{ Auth::user()->email }}
				</div>
				<div class="user-actions">
					<a href="{{ url('/account', [Auth::User()->id]) }}">account</a>
					<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">logout</a>
					<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
				</div>
			</div>
		</div>
		<ul>
			<li><a href="{{ url('/admin') }}" class="active"><i class="fa fa-dashboard"></i>Dashboard</a></li>
			@if(Auth::User()->role_id == 1)
				<li>
					<a class="treeview"><i class="fa fa-beer"></i>Taplijst<i class="fa fa-angle-down"></i></a>
					<ul class="treeview-menu">
						<li><a href="{{ url('/admin/taplijst') }}">Overzicht</a></li>
						<li><a href="{{ url('/admin/taplijst/grafiek') }}">Grafiek</a></li>
					</ul>
				</li>
			@else
				<li><a href="{{ url('/admin/taplijst') }}"><i class="fa fa-beer"></i>Taplijst</a></li>
			@endif
			<li><a href="{{ url('/admin/polls') }}"><i class="fa fa-pencil-square-o"></i>Polls</a></li>
			<li>
				<a href="{{ url('/admin/verslagen') }}"><i class="fa fa-upload"></i>Verslagen</a>
			</li>
			<li><a href="{{ url('/admin/boodschappen') }}"><i class="fa fa-list"></i>Boodschappenlijstjes</a></li>
			<li><a href="{{ url('/admin/voorverkoop') }}"><i class="fa fa-ticket"></i>Voorverkoop</a></li>
			<li><a href="{{ url('/admin/kernleden') }}"><i class="fa fa-users"></i>Kernleden</a></li>
			<li><a href="{{ url('/admin/contactBerichten') }}"><i class="fa fa-envelope"></i>Contact berichten</a></li>
			<li><a href="{{ url('/admin/mailLeden') }}"><i class="fa fa-address-book"></i>Mail leden</a></li>
			@if(Auth::User()->role_id == 1)
				<li><a href="{{ url('/admin/resetLeden') }}"><i class="fa fa-repeat"></i>Leden omzetten</a></li>
			@endif
			<li>
				<a class="treeview"><i class="fa fa-archive"></i>CRUD<i class="fa fa-angle-down"></i></a>
				<ul class="treeview-menu">
					<li><a href="{{ url('/admin/evenementen') }}">Evenementen</a></li>
					<li><a href="{{ url('/admin/nieuwtjes') }}">Nieuwtjes</a></li>
					<li><a href="{{ url('/admin/albums') }}">Foto's</a></li>
					<li><a href="{{ url('/admin/leden') }}">Leden</a></li>
				</ul>
			</li>
		</ul>
	</aside>
	<nav class="dashboard-nav">
		<div class="navbar">
			<div class="navbar-left pull-left">
				<div class="hamburger-button pull-left"><a><img src="{{ asset('images/hamburger_icon.png') }}"></a></div>
				<!-- <ul class="breadcrumb">
					<li>Dashboard</li>
					<li>test</li>
				</ul> -->
				{!! Breadcrumbs::render() !!}
			</div>
			<div class="navbar-right">
				<ul>
					<li><a href="{{ url('admin/websitesettings') }}"><i class="fa fa-cog"></i></a></li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="admin-content">
		<div class="alert-wrapper">
			@if(Session::has('message'))
			    <div class="alert alert-{{ Session::get('message')[0] }}">
			    	<button type="button" class="close">×</button>
			    	<h4>{{ Session::get('message')[0] }}!</h4>
			        {{ Session::get('message')[1] }}
			    </div>
			@endif
		</div>
		<!-- <div class="alert alert-success">
			<button type="button" class="close">×</button>
			<h4>Success!</h4>
	        Profiel succesvol aangepast
	    </div> -->
		@yield('content')
	</div>
	<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
	@yield('scripts')
	<!-- <script src="{{ asset('js/libs/pusher.min.js') }}" type="text/javascript" data-pusher-app-key="0a8fcbf6da321a3ef863"></script> -->
	<!-- <script src="https://js.pusher.com/4.1/pusher.min.js" data-pusher-app-key="0a8fcbf6da321a3ef863"></script> -->
	<script type="text/javascript" src="{{ asset('js/script.js') }}"></script>
	<script src="{{ asset('js/libs/moment.min.js') }}"></script>
	<script src="{{ asset('js/libs/fullcalendar.min.js') }}"></script>
	<script src="{{ asset('js/libs/d3.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('js/libs/c3.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('js/libs/dropzone.js') }}" type="text/javascript"></script>
	<script type="text/javascript">// Immediately after the js include
	  Dropzone.autoDiscover = false;
	</script>
	<script src="{{ asset('js/libs/masonry.pkgd.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('js/libs/bootstrap.min.js') }}" type="text/javascript"></script>

</body>
</html>