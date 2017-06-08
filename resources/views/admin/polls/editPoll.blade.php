@extends('layouts.admin')

@section('content')

	<div class="edit-poll-wrapper admin-wrapper">

		<div class="admin-header">
			<h1>Poll '{{ $poll->title }}' aanpassen</h1>
			<p>Hier kan je de poll aanpassen.</p>
		</div>
		<div class="admin-body">
			<div class="col-md-8 col-md-offset-2">
			<div class="well white admin-form">
				<form action="{{ url('/admin/polls', [$poll->id, 'edit']) }}" method="POST">
					{{ csrf_field() }}
					<div class="form-group">
						<input type="text" name="title" value="{{ $poll->title }}" class="form-control input-label-float">
						<label class="label-float">Titel</label>
					</div>
					<div class="poll-answers">
						@foreach($poll->Answers as $key => $answer)
							<div class="form-group">
								<input type="text" name="oldAnswers[{{ $answer->id }}]" value="{{ $answer->answer }}" class="form-control input-label-float">

								<label class="label-float">Antwoord {{ $key + 1 }}</label>
							</div>
						@endforeach
					</div>
					<div class="form-group custom-tooltip custom-tooltip-arrow-bottom">
						<button type="button" class="btn-custom btn-round btn-custom-primary btn-fat extra-poll-answer"><i class="fa fa-plus"></i></button><span class="tooltip-text tooltip-text-arrow-bottom">Extra antwoord</span>
					</div>
					<div class="form-group custom-tooltip custom-tooltip-arrow-bottom">
						<button type="button" class="btn-custom btn-round btn-custom-danger btn-fat delete-poll-answer"><i class="fa fa-minus"></i></button><span class="tooltip-text tooltip-text-arrow-bottom">verwijder antwoord</span>
					</div>
					<div class="form-group">
						<span class="btn-ripple-wrapper"><button type="submit" class="btn-custom btn-custom-primary btn-fat">BEWERK</button></span>
						<span class="btn-ripple-wrapper"><a href="{{ URL::previous() }}" class="btn-custom btn-fat">ga terug</a></span>
					</div>
				</form>
			</div>
		</div>
		</div>
	</div>

@endsection