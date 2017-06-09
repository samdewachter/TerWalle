@extends('layouts.admin')

@section('content')
	
	<div class="dashboard-wrapper admin-wrapper clearfix">
		<div class="dashboard col-md-12 col-lg-9">
			<div class="row">
				<div class="col-lg-8 grocery-widget">
					<div class="card bordered white">
						<div class="card-header">
							<span class="card-title" id="{{ $grocery->id . $grocery->name }}">
								Boodschappenlijst
								<div class="dropdown pull-right">
								  <button class="btn-custom more-btn-color btn-round dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
								    <img class="more-btn" src="{{ asset('/images/more.png') }}">
								  </button>
								  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
								  	<li class="dropdown-header">Acties</li>
								    <li>
								    	<form action="{{ url('/admin/boodschappen', [$grocery->id, 'delete']) }}" method="POST">
											{{ csrf_field() }}
											<input type="hidden" name="_method" value="DELETE" />
			                                <button class="dropdown-btn">Verwijderen</button>
										</form>
								    </li>
								    <li><a href="{{ url('/admin/boodschappen', [$grocery->id, 'edit']) }}">Aanpassen</a></li>
								    <li><a href="{{ url('/admin/boodschappen') }}">Ga naar boodschappenlijsten</a></li>
								  </ul>
								</div>
							</span>
							<p>Tenlaatste nodig op: {{ $grocery->needed_at }}</p>
						</div>
						<div class="card-body clearfix">
							<ul>
								@foreach($grocery->items as $item)
									<li>
										<input type="checkbox" id="{{ $item->id }}" <?= ($item->done)? 'checked' : ''; ?> class="regular-checkbox grocery-done" /><label for="{{ $item->id }}"><i class="fa fa-check"></i></label><label for="{{ $item->id }}">{{ $item->quantity }} {{ $item->item }}</label>
									</li>
								@endforeach
							</ul>
						</div>
						<div class="card-footer admin-form clearfix">
							<form action="{{ url('admin/boodschappen', [$grocery->id, 'addItem']) }}" method="POST">
								{{ csrf_field() }}
								<div class="col-lg-3">
									<div class="form-group">
										<input type="number" class="form-control input-label-float" name="quantity">
										<label class="label-float">Hoeveel</label>
									</div>
								</div>
								<div class="col-lg-7">
									<div class="form-group">
										<input type="text" class="form-control input-label-float" name="item">
										<label class="label-float">Item</label>
									</div>
								</div>
								<div class="col-lg-2">
									<div class="form-group">
										<button class="btn-custom btn-fat btn-custom-grey">ADD</button>
									</div>
								</div>
							</form>						
						</div>
					</div>
				</div>
				<div class="col-lg-4 weather-widget">
					<div class="card bordered">
						<div class="card-body">
							<div class="weather-header clearfix">
								<div class="celcius pull-left">
									{{ $weather['celcius'] }}°C
								</div>
								<div class="place pull-right">
									Kruibeke
								</div>
							</div>
							<div class="weather-body">
								<i class="wi {{ $weather['icon'] }}"></i>
							</div>
							<div class="weather-footer">
								{{ $weather['description'] }}
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-4 report-widget">
					<div class="report">
						<div class="card bordered white">
							<div class="card-header">
								<div class="card-title"> {{ $report->name }}
									<div class="dropdown pull-right">
									  <button class="btn-custom more-btn-color btn-round dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
									    <img class="more-btn" src="{{ asset('/images/more.png') }}">
									  </button>
									  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
									  	<li class="dropdown-header">Acties</li>
									  	<!-- <li class="divider"></li> -->
									    <li>
									    	<form action="{{ url('/admin/verslagen', [$report->id, 'delete']) }}" method="POST">
												{{ csrf_field() }}
												<input type="hidden" name="_method" value="DELETE" />
				                                <button class="dropdown-btn">Verwijderen</button>
											</form>
									    </li>
									    <li><a href="{{ url('/admin/verslagen', [$report->id, 'edit']) }}">Aanpassen</a></li>
									    <li><a href="{{ url('/admin/verslagen', [$report->id, 'download']) }}">Downloaden</a></li>
									    <li><a href="{{ url('/admin/verslagen') }}">Ga naar verslagen</a></li>
									  </ul>
									</div>
									<p class="report-date">{{ $report->date }}</p>
								</div>
							</div>
							<div class="card-body">
								<img class="report-photo" src="{{ asset('images/wordlogo.png') }}">
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4 poll-widget">
					<div class="card bordered white">
						<div class="card-header">
							<div class="card-title">
								<div class="dropdown pull-right">
								  <button class="btn-custom more-btn-color btn-round dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
								    <img class="more-btn" src="{{ asset('/images/more.png') }}">
								  </button>
								  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
								  	<li class="dropdown-header">Acties</li>
								  	<li><a class="extra-info" data-toggle="modal" data-target="#poll{{ $poll->id }}">Resultaten</a></li>
								    <li>
								    	<form action="{{ url('/admin/polls', [$poll->id, 'delete']) }}" method="POST">
											{{ csrf_field() }}
											<input type="hidden" name="_method" value="DELETE" />
			                                <button class="dropdown-btn">Verwijderen</button>
										</form>
								    </li>
								    <li><a href="{{ url('/admin/polls', [$poll->id, 'edit']) }}">Aanpassen</a></li>
								    <li><a href="{{ url('/admin/polls') }}">Ga naar polls</a></li>
								  </ul>
								</div>
								{{ $poll->title }}
							</div>
						</div>
						<div class="card-body clearfix">
							<h3>Antwoorden</h3>
							<form action="{{ url('/admin/polls', [$poll->id, 'answer']) }}" method="POST">
								{{ csrf_field() }}
								@foreach($poll->Answers as $answer)
									<div class="form-group clearfix">
										<div class="col-md-2"><div class="radio-btn-wrapper"><input {{ Test(Auth::user()->id, $poll->id, $answer->id) }} type="radio" id="answer{{ $answer->id }}" class="regular-radio vote" value="{{ $answer->id }}" name="poll_answer_id" /><label for="answer{{ $answer->id }}"></label></div></div><div class="col-md-10 poll-answer"><label for="answer{{ $answer->id }}">{{ $answer->answer }}</label></div>
									</div>
								@endforeach
								<div class="form-group">
									<button class="btn-custom btn-fat btn-custom-primary" type="submit">Stem!</button>
								</div>
							</form>
							<!-- Modal -->
							<div class="modal fade" id="poll{{ $poll->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
							  <div class="modal-dialog" role="document">
								<div class="modal-content">
								  <div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h4 class="modal-title" id="myModalLabel">Stemmen op poll '{{ $poll->title }}'</h4>
								  </div>
								  <div class="modal-body">
								  	<ul>
										@foreach($poll->answers as $answer)
											<li>{{$answer->answer}}:
											@foreach($answer->Results as $result)
												<img data-toggle="tooltip" title="{{ $result->User->first_name . ' ' . $result->User->last_name }}" src="{{ asset('/uploads/profilePhotos/' . $result->User->photo) }}">
											@endforeach
											@if(count($answer->Results) == 0)
												Geen stemmen
											@endif
											</li>
										@endforeach
									</ul>
								  </div>
								</div>
							  </div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4 tap-widget">
					<div class="card bordered white">
						<div class="card-header">
							<div class="card-title">
								Taplijst
								<div class="dropdown pull-right">
								  <button class="btn-custom more-btn-color btn-round dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
								    <img class="more-btn" src="{{ asset('/images/more.png') }}">
								  </button>
								  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
								  	<li class="dropdown-header">Acties</li>
								    <li><a href="{{ url('/admin/taplijst') }}">Ga naar taplijst</a></li>
								  </ul>
								</div>
								<p>De 3 volgende tappers</p>
							</div>
						</div>
						<div class="card-body">
							@foreach($tappers as $tapper)
								<div class="tapper">
									<img class="pull-left tapper-photo" src="{{ asset('/uploads/profilePhotos/default.png') }}">
									<div class="tap-date">
										<?php
											$numberOfDays = floor((time() - strtotime($tapper->start)) / (60*60*24));
											if ($numberOfDays == 0) {
												$numberOfDays = " (vandaag)";
											} elseif ($numberOfDays == -1) {
												$numberOfDays = " (morgen)";
											} elseif ($numberOfDays == -2) {
												$numberOfDays == " (overmorgen)";
											} else {
												$numberOfDays = " (over ". abs($numberOfDays) ." dagen)";
											}
										?>
										{{ date("d/m/Y", strtotime($tapper->start)) . $numberOfDays}}
									</div>
									<div class="tapper-name">
										{{ $tapper->User->first_name . ' ' . $tapper->User->last_name }}
									</div>
								</div>
							@endforeach
							@if(count($tappers) < 3)
								<div class="tapper">
									<a href="{{ url('/admin/taplijst') }}">
										Taplijst moet aangevuld worden.
									</a>
								</div>
							@endif
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-4 event-widget">
					@foreach($events as $event)
						<div class="card bordered white">
							<div class="card-header">
								<div class="card-title">
									{{ $event->title }}
									<div class="dropdown pull-right">
									  <button class="btn-custom more-btn-color btn-round dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
									    <img class="more-btn" src="{{ asset('/images/more.png') }}">
									  </button>
									  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
									  	<li class="dropdown-header">Acties</li>
									    <li>
									    	<form action="{{ url('/admin/evenementen', [$event->id, 'delete']) }}" method="POST">
												{{ csrf_field() }}
												<input type="hidden" name="_method" value="DELETE" />
				                                <button class="dropdown-btn">Verwijderen</button>
											</form>
									    </li>
									    <li><a href="{{ url('/admin/evenementen', [$event->id, 'edit']) }}">Aanpassen</a></li>
									    <li><a href="{{ url('/admin/evenementen') }}">Ga naar evenementen</a></li>
									  </ul>
									</div>
									<p>Start: {{ $event->start_time }}</p>
									<p>Einde: {{ $event->end_time }}</p>
								</div>
							</div>
							<div class="card-body">
								<img class="event-widget-photo" src="{{ asset('/uploads/eventPhotos') . '/' . $event->cover }}">
							</div>
						</div>
					@endforeach
				</div>
				<div class="col-lg-8 member-widget">
					<div class="card bordered white">
						<div class="card-header">
							Nieuwe leden
							<div class="dropdown pull-right">
							  <button class="btn-custom more-btn-color btn-round dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
							    <img class="more-btn" src="{{ asset('/images/more.png') }}">
							  </button>
							  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
							  	<li class="dropdown-header">Acties</li>
							    <li><a href="{{ url('/admin/leden') }}">Ga naar evenementen</a></li>
							  </ul>
							</div>
							<p>De laatste 6 nieuwe leden.</p>
						</div>
						<div class="card-body">
							<table class="table">
								<thead>
									<tr>
										<th class="member-widget-th-photo">PHOTO</th>
										<th class="member-widget-th-name">NAME</th>
										<th class="member-widget-th-last">LAST</th>
										<th class="member-widget-th-email">EMAIL</th>
									</tr>
								</thead>
								<tbody>
									@foreach($members as $member)
										<tr class="member">
											<td><img class="member-photo" src="{{ asset('/uploads/profilePhotos') . '/' . $member->photo }}"></td>
											<td>{{ $member->first_name }}</td>
											<td>{{ $member->last_name }}</td>
											<td>{{ $member->email }}</td>
										</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="action-feed-wrapper col-md-12 col-lg-3">
			<div class="action-feed-timeline">
				<!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist">
					<li role="presentation" class="active"><a href="#timeline" aria-controls="timeline" role="tab" data-toggle="tab">Tijdlijn</a></li>
				</ul>
				
				<!-- Tab panes -->
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane active" id="timeline">
						<ul id="feed">
							@foreach($activities->data as $activity)
								<li>
									<div class="timeline-panel">
										<div class="timeline-heading">
											<h4 class="timeline-title">{{ $activity->title }}</h4>
										</div>
										<div class="timeline-body">
											<p>{{ $activity->description }}</p>
											<small>
												<i class="fa fa-clock-o"></i>
												{{ $activity->lapse }}
											</small>
										</div>
									</div> 
								</li>
							@endforeach
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	@section('scripts')
		<script src="https://js.pusher.com/4.0/pusher.min.js"></script>
		<script src="{{ asset('/js/pusher.js') }}" type="text/javascript"></script>
	@endsection
@endsection