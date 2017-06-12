@extends('layouts.app')

@section('content')

	<div class="account-wrapper">
		<div class="container">
			<div class="page-heading">
				<h1>Account</h1>
				<p>Hier heb je een overzicht van je account details.</p>
			</div>
			<div class="col-md-12 account">
				<div class="panel">
					<div class="panel-body">
						<div class="col-sm-12 col-md-4">
							<img class="profile-photo" src="{{ asset('/uploads/profilePhotos/' . $user->photo) }}">
						</div>
						<div class="col-sm-12 col-md-7 col-md-offset-1">
							<h3>Details</h3>
							<p><strong>Voornaam</strong>: {{ $user->first_name }}</p>
							<p><strong>Achternaam</strong>: {{ $user->last_name }}</p>
							<p><strong>Email</strong>: {{ $user->email }}</p>
							<p><strong>Verjaardag</strong>: {{ $user->birth_year }}</p>
							<ul class="account-actions">
								<li><div class="read-more"><a href="{{ url('/account', [$user->id, 'wijzigdetails']) }}">Account wijzigen</a></div></li>
								<li><div class="read-more"><a href="{{ url('/account', [$user->id, 'wijzigpaswoord']) }}">Paswoord wijzigen</a></div></li>
							</ul>							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection