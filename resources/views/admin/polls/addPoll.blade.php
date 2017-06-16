@extends('layouts.admin')

@section('content')

	<div class="admin-wrapper">

		<div class="admin-header">
			<h1>Poll toevoegen</h1>
			<p>Hier kan je een poll toevoegen</p>
		</div>
		<div class="admin-body">
			<div class="col-md-8 col-md-offset-2">
				<div class="well white admin-form">
					<form action="{{ url('/admin/polls/add') }}" method="POST">
						{{ csrf_field() }}
						<div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
							<input type="text" name="title" value="{{ old('title') }}" class="form-control input-label-float <?= ($errors->has('title'))? 'input-error' : ''; ?>">
							<label class="label-float label-float ">Titel poll</label>
							@if ($errors->has('title'))
		                        <span class="help-block">
		                            <strong>{{ $errors->first('title') }}</strong>
		                        </span>
		                    @endif
						</div>
						<div class="form-group {{ $errors->has('deadline') ? ' has-error' : '' }}">
							<input type="date" name="deadline" value="{{ old('deadline') }}" class="form-control input-label-float <?= ($errors->has('deadline'))? 'input-error' : ''; ?>">
							<label class="label-float label-float-date ">Deadline</label>
							@if ($errors->has('deadline'))
		                        <span class="help-block">
		                            <strong>{{ $errors->first('deadline') }}</strong>
		                        </span>
		                    @endif
						</div>
						<div class="poll-answers">
							<div class="form-group {{ $errors->has('answers.*') ? ' has-error' : '' }} clearfix">
								<input type="text" name="answers[]" value="{{ old('answers.0') }}" class="form-control input-label-float <?= ($errors->has('answers.*'))? 'input-error' : ''; ?>">
								<label class="label-float">Antwoord 1</label>
								@if ($errors->has('answers.*'))
			                        <span class="help-block">
			                            <strong>{{ $errors->first('answers.*') }}</strong>
			                        </span>
			                    @endif
							</div>
						</div>
						<div class="form-group custom-tooltip custom-tooltip-arrow-bottom">
							<button type="button" class="btn-custom btn-round btn-custom-primary btn-fat extra-poll-answer"><i class="fa fa-plus"></i></button><span class="tooltip-text tooltip-text-arrow-bottom">Extra antwoord</span>
						</div>
						<div class="form-group custom-tooltip custom-tooltip-arrow-bottom">
							<button type="button" class="btn-custom btn-round btn-custom-danger btn-fat delete-poll-answer"><i class="fa fa-minus"></i></button><span class="tooltip-text tooltip-text-arrow-bottom">verwijder antwoord</span>
						</div>
						<div class="form-group">
							<span class="btn-ripple-wrapper"><button type="submit" class="btn-custom btn-custom-primary btn-fat">voeg toe</button></span>
							<span class="btn-ripple-wrapper"><a href="{{ url('/admin/polls') }}" class="btn-custom btn-fat">ga terug</a></span>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

@endsection