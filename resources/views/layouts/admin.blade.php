<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400" rel="stylesheet">
		
</head>
<body>
	<div class="tester">
	</div>
	<aside>
		<div class="brand-logo">
			<div id="logo">
				<img src="{{ asset('images/tw_logo.png') }}">
				
			</div>
			Ter Walle
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
					<a href="">settings</a>
					<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">logout</a>
					<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
				</div>
			</div>
		</div>
		<ul>
			<li><a class="active"><i class="fa fa-dashboard"></i>Dashboard</a></li>
			<li>
				<a class="treeview"><i class="fa fa-beer"></i>Taplijst<i class="fa fa-angle-down"></i></a>
				<ul class="treeview-menu">
					<li><a>Overzicht</a></li>
					<li><a>Grafieken</a></li>
				</ul>
			</li>
			<li><a><i class="fa fa-pencil-square-o"></i>Polls</a></li>
			<li><a><i class="fa fa-upload"></i>Uploads</a></li>
			<li><a><i class="fa fa-list"></i>Boodschappenlijstjes</a></li>
			<li>
				<a class="treeview"><i class="fa fa-archive"></i>CRUD<i class="fa fa-angle-down"></i></a>
				<ul class="treeview-menu">
					<li><a>Evenementen</a></li>
					<li><a>Nieuwtjes</a></li>
					<li><a>Foto's</a></li>
					<li><a href="{{ url('/admin/leden') }}">Leden</a></li>
				</ul>
			</li>
		</ul>
	</aside>
	<nav class="dashboard-nav">
		<div class="navbar">
			<div class="navbar-left pull-left">
				<div class="hamburger-button pull-left"><a><img src="{{ asset('images/hamburger_icon.png') }}"></a></div>
				<ul class="breadcrumb">
					<li>Dashboard</li>
					<li>test</li>
				</ul>
			</div>
			<div class="navbar-right">
				<ul>
					<li>Test</li>
					<li>Test</li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="admin-content">
		@yield('content')
	</div>
	<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
	<script type="text/javascript" src="{{ asset('js/script.js') }}"></script>
</body>
</html>