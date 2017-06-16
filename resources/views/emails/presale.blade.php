@extends('layouts.mail')

@section('content')

	<div class="mail-heading">
		<h1>Jeugdhuis Ter Walle</h1>
		<p>{{ $activity->user->first_name }} heeft een nieuw voorverkoop moment aangemaakt.</p>
	</div>

	<div class="card">
		<div class="card-body">
			<h2>Voorverkoop voor {{ $activity->subject->Event->title }}</h2>
			<p><span style="display: block;"><strong>Beschrijving</strong>:</span> {{ $activity->subject->description }}</p>
			<p><span style="display: block;"><strong>Deadline</strong>:</span> {{ $activity->subject->deadline }}</p>
			<p><span style="display: block;"><strong>Betalend lid prijs</strong>:</span> €{{ $activity->subject->member_price }}</p>
			<p><span style="display: block;"><strong>Niet betalend lid prijs</strong>:</span> €{{ $activity->subject->non_member_price }}</p>
			<a href="http://eindwerk.local/TerWalle/public/admin/polls">Bekijk het nieuwe voorverkoop moment</a>
		</div>
	</div>

@endsection