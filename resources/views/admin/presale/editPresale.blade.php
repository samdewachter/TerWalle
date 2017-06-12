@extends('layouts.admin')

@section('content')

	<div class="add-presale-wrapper admin-wrapper">

		<div class="admin-header">
			<h1>Voorverkoop moment aanpassen</h1>
			<p>Hier kan je een voorverkoop moment aanpassen</p>
		</div>
		<div class="admin-body">
			<div class="col-md-8 col-md-offset-2">
				<div class="well white admin-form">
					<form action="{{ url('/admin/voorverkoop', [$presale->id, 'edit']) }}" method="POST">
						{{ csrf_field() }}
						<div class="form-group">
							<input value="{{ $presale->description }}" type="text" name="description" class="form-control input-label-float">
							<label class="label-float">Korte beschrijving</label>
						</div>
						<div class="form-group">
							<select name="event_id" class="form-control input-label-float">
								@foreach($events as $event)
									<option <?= ($event->id == $presale->event_id)? 'selected' : ''; ?> value="{{ $event->id }}">{{ $event->title }}</option>
								@endforeach								
							</select>
							<label class="label-float label-float ">Evenement</label>
						</div>
						<div class="form-group filled-static">
							<label class="control-label">Prijs lid</label>
							<div class="input-group">
								<div class="input-group-addon">€</div>
								<input value="{{ $presale->member_price }}" type="number" name="member_price" class="form-control">
								<div class="input-group-addon">.00</div>
							</div>
						</div>
						<div class="form-group filled-static">
							<label class="control-label">Prijs non-lid</label>
							<div class="input-group">
								<div class="input-group-addon">€</div>
								<input value="{{ $presale->non_member_price }}" type="number" name="non_member_price" class="form-control">
								<div class="input-group-addon">.00</div>
							</div>
						</div>
						<div class="form-group filled-static">
							<label class="control-label">Deadline</label>
							<input value="{{ $presale->deadline }}" type="date" class="form-control" name="deadline">
						</div>
						<div class="form-group">
							<span class="btn-ripple-wrapper"><button type="submit" class="btn-custom btn-custom-primary btn-fat">aanpassen</button></span>
							<span class="btn-ripple-wrapper"><a href="{{ URL::previous() }}" class="btn-custom btn-fat">ga terug</a></span>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

@endsection