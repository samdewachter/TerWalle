@extends('layouts.mail')

@section('content')

	<div class="mail-heading">
		<h1>Jeugdhuis Ter Walle</h1>
		<p>Voorverkoop bevestiging voor {{ $ticket->Presale->Event->title }}</p>
	</div>

	<div class="card">
		<div class="card-body">
			<h2>Voorverkoop</h2>
			<p>
				Dag {{ $ticket->User->first_name }} u staat succesvol op de gastenlijst voor {{ $ticket->Presale->Event->title }}. U hoeft enkel en alleen
				maar naar de kassa te gaan op de dag van het evenement, uw naam zeggen en het bedrag van de voorverkoop betalen. Tot dan!
			</p>
		</div>
	</div>

@endsection