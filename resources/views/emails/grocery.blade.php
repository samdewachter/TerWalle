@extends('layouts.mail')

@section('content')

	<div class="mail-heading">
		<h1>Jeugdhuis Ter Walle</h1>
		<p>{{ $activity->user->first_name }} heeft een nieuwe boodschappenlijst aangemaakt.</p>
	</div>

	<div class="card">
		<div class="card-body">
			<h2>{{ $activity->subject->name }}</h2>
			<p><span style="display: block;"><strong>tenlaatste nodig op</strong>:</span> {{ $activity->subject->needed_at }}</p>
			<a href="http://eindwerk.local/TerWalle/public/admin/boodschappen">Bekijk de nieuwe boodschappenlijst</a>
		</div>
	</div>

@endsection