@extends('layouts.admin')

@section('content')

	<div class="add-presale-wrapper admin-wrapper">

		<div class="admin-header">
			<h1>Voorverkoop moment toevoegen</h1>
			<p>Hier kan je een nieuw voorverkoop moment aanmaken</p>
		</div>
		<div class="admin-body">
			<div class="col-md-8 col-md-offset-2">
				<div class="well white admin-form">
					@if(count($events) != 0)
						<form action="{{ url('/admin/voorverkoop/add') }}" method="POST">
							{{ csrf_field() }}
							<div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
								<input type="text" name="description" value="{{ old('description') }}" class="form-control input-label-float <?= ($errors->has('description'))? 'input-error' : ''; ?>">
								<label class="label-float">Korte beschrijving</label>
								@if ($errors->has('description'))
			                        <span class="help-block">
			                            <strong>{{ $errors->first('description') }}</strong>
			                        </span>
			                    @endif
							</div>
							<div class="form-group {{ $errors->has('event_id') ? ' has-error' : '' }}">
								<select name="event_id" class="form-control input-label-float <?= ($errors->has('event_id'))? 'input-error' : ''; ?>">
									@foreach($events as $event)
										<option <?= (old('event_id') == $event->id)? 'selected' : ''; ?> value="{{ $event->id }}">{{ $event->title }}</option>
									@endforeach								
								</select>
								<label class="label-float">Evenement</label>
								@if ($errors->has('event_id'))
			                        <span class="help-block">
			                            <strong>{{ $errors->first('event_id') }}</strong>
			                        </span>
			                    @endif
							</div>
							<div class="form-group {{ $errors->has('member_price') ? ' has-error' : '' }} filled-static">
								<label class="control-label">Prijs lid</label>
								<div class="input-group">
									<div class="input-group-addon">€</div>
									<input type="number" name="member_price" value="{{ old('member_price') }}" class="form-control <?= ($errors->has('member_price'))? 'input-error' : ''; ?>">
									<div class="input-group-addon">.00</div>
								</div>
								@if ($errors->has('member_price'))
			                        <span class="help-block">
			                            <strong>{{ $errors->first('member_price') }}</strong>
			                        </span>
			                    @endif
							</div>
							<div class="form-group {{ $errors->has('non_member_price') ? ' has-error' : '' }} filled-static">
								<label class="control-label">Prijs non-lid</label>
								<div class="input-group">
									<div class="input-group-addon">€</div>
									<input type="number" name="non_member_price" value="{{ old('non_member_price') }}" class="form-control <?= ($errors->has('non_member_price'))? 'input-error' : ''; ?>">
									<div class="input-group-addon">.00</div>
								</div>
								@if ($errors->has('non_member_price'))
			                        <span class="help-block">
			                            <strong>{{ $errors->first('non_member_price') }}</strong>
			                        </span>
			                    @endif
							</div>
							<div class="form-group {{ $errors->has('deadline') ? ' has-error' : '' }} filled-static">
								<label class="control-label">Deadline</label>
								<input type="date" value="{{ old('deadline') }}" class="form-control <?= ($errors->has('deadline'))? 'input-error' : ''; ?>" name="deadline">
								@if ($errors->has('deadline'))
			                        <span class="help-block">
			                            <strong>{{ $errors->first('deadline') }}</strong>
			                        </span>
			                    @endif
							</div>
							<div class="form-group">
								<span class="btn-ripple-wrapper"><button type="submit" class="btn-custom btn-custom-primary btn-fat">TOEVOEGEN</button></span>
								<span class="btn-ripple-wrapper"><a href="{{ URL::previous() }}" class="btn-custom btn-fat">ga terug</a></span>
							</div>
						</form>
					@else
						<p>Er zijn geen aankomende evenementen. Maak eerst een evenement aan voor je een voorverkoop moment aanmaakt.</p>
						<span class="btn-ripple-wrapper"><a href="{{ URL::previous() }}" class="btn-custom btn-fat">ga terug</a></span>
					@endif
				</div>
			</div>
		</div>
	</div>

@endsection