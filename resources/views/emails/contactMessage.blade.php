@extends('layouts.mail')

@section('content')

	<div class="mail-heading">
		<h1>Jeugdhuis Ter Walle</h1>
		<p>{{ $activity->subject->name }} heeft een contact bericht gestuurd.</p>
	</div>

	<div class="card">
		<div class="card-body">
			<h2>{{ $activity->subject->subject }}</h2>
			<p>{{ $activity->subject->message }}</p>
			<a href="http://eindwerk.local/TerWalle/public/admin/contactBerichten">Bekijk het contact bericht</a>
		</div>
	</div>

@endsection