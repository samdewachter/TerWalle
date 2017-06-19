@extends('layouts.admin')

@section('content')

	<div class="taplist-wrapper admin-wrapper">
		<div class="admin-header">
			<h1><i class="fa fa-beer"></i>Taplijst</h1>
			<p>Hier kan je de taplijst aanpassen. Door de linker muisknop ingedrukt te houden op een tapper kan je de tapper slepen naar de gewenste datum. Indien je de tapper wilt aanpassen hou je de linker muisknop weer ingedrukt op diegene die je wilt aanpassen en versleep je hem/haar naar de gewenste datum. Als je het uur wilt verlengen ga je naar de week "view" van de taplijst en kan je door onderaan op de tapper links te klikken, in te houden en naar beneden te slapen het uur vergroten en verkleinen. Als je een tapper wilt verwijderen klik je één keer links op de tapper en druk je op OK. Op smartphone is het juist hetzelfde, maar je moet eerst 2 seconden drukken op de tapper voor hem aan te passen.</p>
		</div>
		<div class="admin-body">
			<div class="calendar-wrapper clearfix">
				<div class="col-lg-3 col-md-12">
					<div class="draggable-events">
						<h3>Tappers</h3>
						@foreach($users as $user)
							<div class="fc-event" user_id="{{ $user->id }}">{{ $user->first_name }} {{ $user->last_name }}</div>
						@endforeach
					</div>
				</div>
				<div class="col-lg-9 col-md-12">
					<div id="calendar"></div>
				</div>
			</div>
		</div>
	</div>

@endsection