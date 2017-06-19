@extends('layouts.mail')

@section('content')

	<div class="mail-heading">
		<h1>Jeugdhuis Ter Walle</h1>
		<p>Dag {{ $member->first_name . ' ' . $member->last_name }} we, de kernleden van Jeugdhuis Ter Walle, hebben een account voor je gemaakt.</p>
	</div>

	<div class="card">
		<div class="card-body">
			<h2>Account informatie</h2>
			<p><span style="display: block;"><strong>Voornaam</strong>:</span> {{ $member->first_name }}</p>
			<p><span style="display: block;"><strong>Achtenaam</strong>:</span> {{ $member->last_name }}</p>
			<p><span style="display: block;"><strong>Geboortedatum</strong>:</span> {{ $member->birth_year }}</p>
			<p><span style="display: block;"><strong>paswoord</strong>:</span> {{ $password }}</p>
			<p><span style="display: block;"><strong>login/email</strong>:</span> {{ $member->email }}</p>
			<p>Dit zijn je account gegevens, probeer eens in te loggen en verander zo snel mogelijk je paswoord.</p>
			<a href="http://terwalle.be/login">Log nu in</a>
		</div>
	</div>

@endsection