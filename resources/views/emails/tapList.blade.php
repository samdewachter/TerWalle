@extends('layouts.mail')

@section('content')

	<div class="mail-heading">
		<h1>Jeugdhuis Ter Walle</h1>
		<p>{{ $activity->user->first_name }} heeft <?= ($activity->user->first_name == $activity->subject->User->first_name)? 'zichzelf': $activity->subject->User->first_name; ?> op de taplijst gezet.</p>
	</div>

	<div class="card">
		<div class="card-body">
			<h2>Taplijst</h2>
			<p>{{ $activity->subject->User->first_name }} moet op {{ $activity->subject->start }} tappen.</p>
			<a href="http://eindwerk.local/TerWalle/public/admin/taplijst">Bekijk de taplijst</a>
		</div>
	</div>

@endsection