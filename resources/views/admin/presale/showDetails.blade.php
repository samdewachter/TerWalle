@extends('layouts.admin')

@section('content')

	<div class="presale-details-wrapper admin-wrapper">

		<div class="admin-header">
			<h1>'{{ $presale->description }}' voorverkoop details</h1>
			<p>Hier heb je een overzicht van de gastenlijst.</p>
		</div>
		<div class="admin-body clearfix">
			<div class="col-lg-5">
				<h2>Betalende leden <a class="pull-right btn-custom btn-custom-primary btn-fat download-btn" href="{{ url('/admin/voorverkoop', [$presale->id, 'downloadPaidMember']) }}"><i class="fa fa-download"></i></a></h2>
				<table class="table">
					<thead>
						<tr>
							<th>Naam</th>
						</tr>
					</thead>
					<tbody>
						@foreach($presale->Tickets as $ticket)
							@if($ticket->paid_member)
								<tr>
									<td>{{ $ticket->User->first_name . ' ' . $ticket->User->last_name}}</td>
								</tr>
							@endif
						@endforeach
					</tbody>
				</table>
			</div>
			<div class="col-lg-5 col-lg-offset-2">
				<h2>Niet betalende leden <a class="pull-right btn-custom btn-custom-primary btn-fat download-btn" href="{{ url('/admin/voorverkoop', [$presale->id, 'downloadNonPaidMember']) }}"><i class="fa fa-download"></i></a></h2>
				<table class="table">
					<thead>
						<tr>
							<th>Naam</th>
						</tr>
					</thead>
					<tbody>
						@foreach($presale->Tickets as $ticket)
							@if(!$ticket->paid_member)
								<tr>
									<td>{{ $ticket->User->first_name . ' ' . $ticket->User->last_name}}</td>
								</tr>
							@endif
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>

@endsection