@extends('layouts.admin')

@section('content')

	<div class="admin-wrapper">

		<div class="admin-header">
			<h1>Mail leden</h1>
			<p>Hier kan je emails verzenden naar alle leden.</p>
		</div>
		<div class="admin-body">
			<div class="col-md-8 col-md-offset-2">
				<div class="well white admin-form">
					<form action="{{ url('/admin/mailLeden') }}" method="POST">
						{{ csrf_field() }}
						<div class="form-group">
							<label>Welke leden</label>
							<select class="form-control" name="kind_of_member">
								<option value="all-members">Alle leden</option>
								<option value="paid-members">Enkel betalende leden</option>
							</select>
						</div>
						<div class="form-group {{ $errors->has('subject') ? ' has-error' : '' }}">
							<input type="text" value="{{ old('subject') }}" class="form-control input-label-float <?= ($errors->has('subject'))? 'input-error' : ''; ?>" name="subject">
							<label class="label-float">Onderwerp</label>
							@if ($errors->has('subject'))
			                    <span class="help-block">
			                        <strong>{{ $errors->first('subject') }}</strong>
			                    </span>
			                @endif
						</div>
						<div class="form-group {{ $errors->has('message') ? ' has-error' : '' }}">
							<textarea name="message" rows="8" class="form-control input-label-float <?= ($errors->has('message'))? 'input-error' : ''; ?>">{{ old('subject') }}</textarea>
							<label class="label-float">Bericht</label>
							@if ($errors->has('message'))
			                    <span class="help-block">
			                        <strong>{{ $errors->first('message') }}</strong>
			                    </span>
			                @endif
						</div>
						<div class="form-group">
							<span class="btn-ripple-wrapper"><button type="submit" class="btn-custom btn-custom-primary btn-fat">Verstuur</button></span>
							<span class="btn-ripple-wrapper"><a href="{{ URL::previous() }}" class="btn-custom btn-fat">ga terug</a></span>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="footer-buttons">
			<ul>
				<li class="custom-tooltip custom-tooltip-arrow-bottom"><a href="{{ url('') }}" class="btn-custom btn-round btn-custom-primary"><i class="fa fa-plus"></i></a><span class="tooltip-text tooltip-text-arrow-bottom">Nieuw item</span></li>
			</ul>
		</div>
	</div>

@endsection