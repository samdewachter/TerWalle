@extends('layouts.admin')

@section('content')

	<div class="contact-messages-wrapper admin-wrapper">

		<div class="admin-header">
			<h1>Contact berichten</h1>
			<p>Hier heb je een overzicht van alle contact berichten.</p>
		</div>
		<div class="admin-body">
			<div class="grid">
				@foreach($messages as $message)
					<div class="grid-item grid-item--width2">
						<div class="card bordered contact-message">
							<div class="card-header">
								<span class="card-title"> Bericht van {{ $message->name }}</span>
								<p>Verzonden op {{ $message->created_at }}</p>
							</div>
							<div class="card-body">
								{{ $message->message }}
							</div>
							<div class="card-footer">
								Antwoord sturen naar email adres "{{ $message->email }}"
							</div>
						</div>
					</div>
				@endforeach
			</div>
		</div>
	</div>

@endsection