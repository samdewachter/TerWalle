@extends('layouts.mail')

@section('content')

	<div class="mail-heading">
		<h1>Jeugdhuis Ter Walle</h1>
		<p>{{ $activity->user->first_name }} heeft een nieuw album aangemaakt.</p>
	</div>

	<div class="card">
		<div class="card-body">
			<h2>{{ $activity->subject->album_name }}</h2>
			<a href="http://eindwerk.local/TerWalle/public/admin/album/{{ $album->id }}">Bekijk het nieuwe album</a>
		</div>
	</div>

@endsection