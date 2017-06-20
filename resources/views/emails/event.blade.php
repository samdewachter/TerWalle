@extends('layouts.mail')

@section('content')

	<div class="mail-heading">
		<h1>Jeugdhuis Ter Walle</h1>
		<p>{{ $activity->user->first_name }} heeft een nieuw evenement aangemaakt.</p>
	</div>

	<div class="card">
		<div class="card-body">
			<h2>{{ $activity->subject->title }}</h2>
			<p><span style="display: block;"><strong>Beschrijving</strong>:</span> {{ $activity->subject->description }}</p>
			<p><span style="display: block;"><strong>Start</strong>:</span> {{ $activity->subject->start_time }}</p>
			<p><span style="display: block;"><strong>Einde</strong>:</span> {{ $activity->subject->end_time }}</p>
			<a href="http://eindwerk.local/TerWalle/public/admin/nieuwtjes">Bekijk het nieuw evenement</a>
		</div>
	</div>

@endsection