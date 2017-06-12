@extends('layouts.admin')

@section('content')

	<div class="settings-wrapper admin-wrapper">

		<div class="admin-header">
			<h1>Website settings</h1>
			<p>Hier kan je bepaalde settings veranderen van de website</p>
		</div>
		<div class="admin-body">
			<div class="card col-md-8 col-md-offset-2">
				<div class="card-body">
					<div class="change-cover-photo">
						<h3>Cover foto</h3>
						<img class="website-cover-photo" src="{{ asset('/images/' . $settings->cover_photo) }}">
						<span class="btn-ripple-wrapper"><a class="btn-custom btn-fat btn-custom-primary" href="{{ url('/admin/websitesettings/coverphoto') }}">Verander foto</a></span>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection