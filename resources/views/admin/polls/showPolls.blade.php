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
							<a class="tztzetze" href="#">Extra info</a>
							<div class="col-lg-4 col-md-12">
								<h3>Antwoorden</h3>
								<form action="{{ url('/admin/polls', [$poll->id, 'answer']) }}" method="POST">
									{{ csrf_field() }}
									@foreach($poll->Answers as $answer)
										<div class="form-group">
											<input {{ Test(Auth::user()->id, $poll->id, $answer->id) }} type="radio" value="{{ $answer->id }}" name="poll_answer_id"><label>{{ $answer->answer }}</label>
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
							<div class="col-md-12">
								<ul>
									<li>Test: @foreach($poll->Answers[1]->Results as $result) {{var_dump($result->Users)}} @endforeach</li>
								</ul>
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