<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400" rel="stylesheet">	
</head>
<body>
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
					SamDeWachter
					<span>admin</span>
				</div>
				<div class="user-email">
					samdewachter@gmail.com
				</div>
				<div class="user-actions">
					<a href="">settings</a>
					<a href="">logout</a>
				</div>
			</div>
		</div>
		<ul>
			<li><a class="active" href=""><i class="fa fa-dashboard"></i>Dashboard</a></li>
			<li><a href=""><i class="fa fa-beer"></i>Taplijst<i class="fa fa-angle-right"></i></a></li>
			<li><a href=""><i class="fa fa-pencil-square-o"></i>Polls</a></li>
			<li><a href=""><i class="fa fa-upload"></i>Uploads</a></li>
			<li><a href=""><i class="fa fa-list"></i>Boodschappenlijstjes</a></li>
            <li><a href=""><i class="fa fa-archive"></i>CRUD<i class="fa fa-angle-right"></i></a></li>
		</ul>
	</aside>
</body>
</html>