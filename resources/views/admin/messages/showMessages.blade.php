@extends('layouts.admin')

@section('content')

	<div class="contact-messages-wrapper admin-wrapper">

		<div class="admin-header">
			<h1><i class="fa fa-envelope"></i>Contact berichten</h1>
			<p>Hier heb je een overzicht van alle contact berichten.</p>
		</div>
		<div class="admin-body">
			<div class="grid">
				@foreach($messages as $message)
					<div class="grid-item grid-item--width2">
						<div class="card bordered contact-message">
							<div class="card-header">
								<span class="card-title"> Bericht van {{ $message->name }}</span>
								<div class="pull-right">
									<input type="checkbox" id="message{{ $message->id }}" message_id="{{ $message->id }}" <?= ($message->answered)? 'checked': ''; ?> class="regular-checkbox message-answered" name="paid_check" /><label for="message{{ $message->id }}"><i class="fa fa-check"></i></label>
								</div>
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