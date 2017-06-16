@extends('layouts.mail')

@section('content')

	<div class="mail-heading">
		<h1>Jeugdhuis Ter Walle</h1>
		<p>{{ $activity->user->first_name }} heeft een '{{ $activity->subject->kind_of_report }}' <?= ($activity->subject->kind_of_report)? 'verslag' : '';?> aangemaakt.</p>
	</div>

	<div class="card">
		<div class="card-body">
			<h2>{{ $activity->subject->name }}</h2>
			<p><span style="display: block;"><strong>Datum verslag</strong>:</span> {{ $activity->subject->date }}</p>
			<a href="http://eindwerk.local/TerWalle/public/admin/verslagen/{{ $activity->subject->id }}/download">Download het verslag</a>
		</div>
	</div>

@endsection