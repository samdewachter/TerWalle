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
					<div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
						<input type="text" name="title" value="{{ $poll->title }}" class="form-control input-label-float <?= ($errors->has('title'))? 'input-error' : ''; ?>">
						<label class="label-float">Titel</label>
						@if ($errors->has('title'))
	                        <span class="help-block">
	                            <strong>{{ $errors->first('title') }}</strong>
	                        </span>
	                    @endif
					</div>
					<div class="form-group {{ $errors->has('deadline') ? ' has-error' : '' }}">
						<input type="date" name="deadline" value="{{ $poll->deadline }}" class="form-control input-label-float <?= ($errors->has('deadline'))? 'input-error' : ''; ?>">
						<label class="label-float label-float-date ">Deadline</label>
						@if ($errors->has('deadline'))
	                        <span class="help-block">
	                            <strong>{{ $errors->first('deadline') }}</strong>
	                        </span>
	                    @endif
					</div>
					<div class="poll-answers">
						@foreach($poll->Answers as $key => $answer)
							<div class="form-group {{ $errors->has('oldAnswers.*') ? ' has-error' : '' }}">
								<input type="text" name="oldAnswers[{{ $answer->id }}]" value="{{ $answer->answer }}" class="form-control input-label-float <?= ($errors->has('oldAnswers.*'))? 'input-error' : ''; ?>">
								<label class="label-float">Antwoord {{ $key + 1 }}</label>
								@if ($errors->has('oldAnswers.*'))
			                        <span class="help-block">
			                            <strong>{{ $errors->first('oldAnswers.*') }}</strong>
			                        </span>
			                    @endif
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