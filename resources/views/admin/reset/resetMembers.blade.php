@extends('layouts.admin')

@section('content')

	<div class="admin-wrapper">

		<div class="admin-header">
			<h1>Leden omzetten</h1>
			<p>Hier kan je een evenement met een voorverkoop moment aanduiden zodat alle leden die een ticket hebben gekocht omgezet kunnen worden naar een betalend lid. Dit is enkel voor Nieuwjaarsfuif bedoeld.</p>
		</div>
		<div class="admin-body">
			<div class="col-md-8 col-md-offset-2">
				<div class="well white admin-form">
					<form action="{{ url('/admin/resetLeden') }}" method="POST">
						{{ csrf_field() }}
						<div class="form-group">
							<label>Evenement</label>
							<select class="form-control" name="event_id">
								@foreach($presales as $presale)
									<option value="{{ $presale->Event->id }}">{{ $presale->Event->title }}</option>
								@endforeach
								@if(count($presales) == 0 )
									<option value="0">Er zijn geen voorverkoop momenten om leden om te zetten</option>
								@endif
							</select>
						</div>
						<div class="form-group">
							<span class="btn-ripple-wrapper"><button type="submit" class="btn-custom btn-custom-primary btn-fat">Zet om</button></span>
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