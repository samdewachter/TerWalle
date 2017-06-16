@extends('layouts.mail')

@section('content')

	<div class="mail-heading">
		<h1>Jeugdhuis Ter Walle</h1>
		<p>{{ $activity->user->first_name }} heeft een nieuwe poll aangemaakt.</p>
	</div>

	<div class="card">
		<div class="card-body">
			<h2>{{ $activity->subject->title }}</h2>
			<p><span style="display: block;"><strong>Deadline</strong>:</span> {{ $activity->subject->deadline }}</p>
			<a href="http://eindwerk.local/TerWalle/public/admin/polls">Bekijk de nieuwe poll</a>
		</div>
	</div>

@endsection