@extends('layouts.admin')

@section('content')
	<div class="add-grocery-wrapper admin-wrapper">
		<div class="admin-header">
			<h1>Boodschappenlijst toevoegen</h1>
			<p>Hier kan je een boodschappenlijst toevoegen.</p>
		</div>
		<div class="admin-body clearfix">
			<div class="col-md-8 col-md-offset-2">
				<div class="well white admin-form">
					<form action="{{ url('/admin/boodschappen/add') }}" method="POST">
						{{ csrf_field() }}
						<div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
							<input type="text" name="name" value="{{ old('name') }}" class="form-control input-label-float <?= ($errors->has('name'))? 'input-error' : ''; ?>">
							<label class="label-float">Naam boodschappenlijst</label>
							@if ($errors->has('name'))
		                        <span class="help-block">
		                            <strong>{{ $errors->first('name') }}</strong>
		                        </span>
		                    @endif
						</div>
						<div class="form-group {{ $errors->has('needed_at') ? ' has-error' : '' }}">
							<input type="date" name="needed_at" value="{{ old('needed_at') }}" class="form-control input-label-float <?= ($errors->has('needed_at'))? 'input-error' : ''; ?>">
							<label class="label-float label-float-date ">Tenlaatste nodig op</label>
							@if ($errors->has('needed_at'))
		                        <span class="help-block">
		                            <strong>{{ $errors->first('needed_at') }}</strong>
		                        </span>
		                    @endif
						</div>
						<div class="grocery-items">
							<div class="form-group {{ $errors->has('quantity.*') ? ' has-error' : '' }} {{ $errors->has('items.*') ? ' has-error' : '' }} clearfix">
								<div class="col-md-2">
									<input type="number" name="quantity[]" value="{{ old('quantity.0') }}" class="form-control input-label-float <?= ($errors->has('quantity.*'))? 'input-error' : ''; ?>">
									<label class="label-float">Hoeveel</label>
									@if ($errors->has('quantity.*'))
				                        <span class="help-block">
				                            <strong>{{ $errors->first('quantity.*') }}</strong>
				                        </span>
				                    @endif
								</div>
								<div class="col-md-10">
									<input type="text" name="items[]" value="{{ old('items.0') }}" class="form-control input-label-float <?= ($errors->has('items.*'))? 'input-error' : ''; ?>">
									<label class="label-float">Item 1</label>
									@if ($errors->has('items.*'))
				                        <span class="help-block">
				                            <strong>{{ $errors->first('items.*') }}</strong>
				                        </span>
				                    @endif
								</div>
							</div>
						</div>
						<div class="form-group custom-tooltip custom-tooltip-arrow-bottom">
							<button type="button" class="btn-custom btn-round btn-custom-primary btn-fat extra-grocery-item"><i class="fa fa-plus"></i></button><span class="tooltip-text tooltip-text-arrow-bottom">Extra item</span>
						</div>
						<div class="form-group custom-tooltip custom-tooltip-arrow-bottom">
							<button type="button" class="btn-custom btn-round btn-custom-danger btn-fat delete-grocery-item"><i class="fa fa-minus"></i></button><span class="tooltip-text tooltip-text-arrow-bottom">verwijder item</span>
						</div>
						<div class="form-group">
							<span class="btn-ripple-wrapper"><button type="submit" class="btn-custom btn-custom-primary btn-fat">voeg toe</button></span>
							<span class="btn-ripple-wrapper"><a href="{{ URL::previous() }}" class="btn-custom btn-fat">ga terug</a></span>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection