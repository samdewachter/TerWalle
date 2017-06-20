@extends('layouts.mail')

@section('content')

	<div class="mail-heading">
		<h1>Jeugdhuis Ter Walle</h1>
		<p>Nieuwsbrief</p>
	</div>

	<div class="card">
		<div class="card-body">
			<h2>{{ $subject }}</h2>
			<p>{{ $text }}</p>
		</div>
	</div>

@endsection