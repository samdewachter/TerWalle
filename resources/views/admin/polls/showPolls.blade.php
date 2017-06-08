@extends('layouts.admin')

@section('content')

	<div class="admin-wrapper polls-wrapper">

		<div class="admin-header">
			<h1><i class="fa fa-pencil-square-o"></i>Polls</h1>
			<p>Hier heb je een overzicht van alle polls.</p>
		</div>
		<div class="admin-body clearfix">
			@foreach($polls as $poll)
				<div class="col-md-12">
					<div class="card bordered white">
						<div class="card-header">
							<span class="card-title">{{ $poll->title }}</span>
						</div>
						<div class="card-body clearfix">
							<a class="extra-info" data-toggle="modal" data-target="#poll{{ $poll->id }}">Extra info</a>
							<div class="col-lg-4 col-md-12">
								<h3>Antwoorden</h3>
								<form action="{{ url('/admin/polls', [$poll->id, 'answer']) }}" method="POST">
									{{ csrf_field() }}
									@foreach($poll->Answers as $answer)
										<div class="form-group clearfix">
											<div class="col-md-2"><div class="radio-btn-wrapper"><input {{ Test(Auth::user()->id, $poll->id, $answer->id) }} type="radio" id="{{ $answer->id }}" class="regular-radio vote" value="{{ $answer->id }}" name="poll_answer_id" /><label for="{{ $answer->id }}"></label></div></div><div class="col-md-10 poll-answer"><label for="{{ $answer->id }}">{{ $answer->answer }}</label></div>
										</div>
									@endforeach
									<div class="form-group">
										<button class="btn-custom btn-fat btn-custom-primary" type="submit">Stem!</button>
									</div>
								</form>
							</div>
							<div class="col-lg-8 col-md-12">
								<h3>Resultaten</h3>
								<div class="chart-wrapper">
									<div class="chart" id="chart{{ $poll->id }}">
									</div>
								</div>
							</div>
							<div class="action-buttons">
								<ul>
									<li>
										<span class="btn-ripple-wrapper pull-right"><a href="{{ url('/admin/polls', [$poll->id, 'edit']) }}" class="btn-custom btn-round btn-custom-primary btn-fat"><i class="fa fa-edit"></i></a></span>
									</li>
									<li>
										<form class="pull-right" action="{{ url('/admin/polls', [$poll->id, 'delete']) }}" method="POST">
											{{ csrf_field() }}
											<input type="hidden" name="_method" value="DELETE" />
			                                <button class="btn-custom btn-round btn-fat btn-custom-danger"><i class="fa fa-trash"></i></button>
										</form>
									</li>
								</ul>
							</div>
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
			@endforeach
		</div>
		<div class="footer-buttons">
			<ul>
				<li class="custom-tooltip custom-tooltip-arrow-bottom"><a href="{{ url('/admin/polls/add') }}" class="btn-custom btn-round btn-custom-primary"><i class="fa fa-plus"></i></a><span class="tooltip-text tooltip-text-arrow-bottom">Nieuw item</span></li>
			</ul>
		</div>
	</div>

@endsection