@extends('layouts.admin')

@section('content')

	<div class="taplist-wrapper admin-wrapper">
		<div class="admin-header">
			<h1>Taplijst</h1>
			<p>Hier kan je de taplijst aanpassen</p>
		</div>
		<div class="admin-body">
			<div class="calendar-wrapper clearfix">
				<div class="col-lg-3 col-md-12">
					<div class="draggable-events">
						<h3>Tappers</h3>
						@foreach($users as $user)
							<div class="fc-event">{{ $user->first_name }} {{ $user->last_name }}</div>
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