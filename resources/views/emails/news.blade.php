@extends('layouts.mail')

@section('content')

	<div class="mail-heading">
		<h1>Jeugdhuis Ter Walle</h1>
		<p>{{ $activity->user->first_name }} heeft een nieuw nieuwsartikel aangemaakt.</p>
	</div>

	<div class="card">
		<div class="card-body">
			<h2>{{ $activity->subject->title }}</h2>
			<p><span style="display: block;"><strong>Subtitel</strong>:</span> {{ $activity->subject->subtitle }}</p>
			<p><span style="display: block;"><strong>text</strong>:</span> {{ $activity->subject->text }}</p>
			<a href="http://eindwerk.local/TerWalle/public/admin/nieuwtjes">Bekijk het nieuw nieuwsartikel</a>
		</div>
	</div>

@endsection