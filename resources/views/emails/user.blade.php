@extends('layouts.mail')

@section('content')

	<div class="mail-heading">
		<h1>Jeugdhuis Ter Walle</h1>
		<p>{{ $activity->user->first_name }} heeft een nieuw lid aangemaakt.</p>
	</div>

	<div class="card">
		<div class="card-body">
			<h2>Nieuw lid '{{ $activity->subject->first_name . ' ' . $activity->subject->last_name }}'</h2>
			<p><span style="display: block;"><strong>Email</strong>:</span> {{ $activity->subject->email }}</p>
			<p><span style="display: block;"><strong>Geboortedatum</strong>:</span> {{ $activity->subject->birth_year }}</p>
			<a href="http://eindwerk.local/TerWalle/public/admin/leden">Bekijk het nieuwe lid</a>
		</div>
	</div>

@endsection