@extends('layouts.admin')

@section('content')
	<div class="edit-grocery-wrapper admin-wrapper">
		<div class="admin-header">
			<h1>Boodschappenlijst aanpassen</h1>
			<p>Hier kan je een boodschappenlijst aanpassen.</p>
		</div>
		<div class="admin-body">
			<div class="col-md-8 col-md-offset-2">
				<div class="well white admin-form">
					<form action="{{ url('/admin/boodschappen', [$grocery->id,  'edit']) }}" method="POST">
						{{ csrf_field() }}
						<div class="form-group">
							<input type="date" name="needed_at" value="{{ $grocery->needed_at }}" class="form-control input-label-float">
							<label class="label-float label-float-date ">Tenlaatste nodig op</label>
						</div>
						<div class="grocery-items">
							@foreach($grocery->items as $key => $item)
								<div class="form-group">
									<input type="text" name="items[]" value="{{ $item }}" class="form-control input-label-float">
									<label class="label-float">Item <?= $key + 1 ?></label>
								</div>
							@endforeach
						</div>
						<div class="form-group custom-tooltip custom-tooltip-arrow-bottom">
							<button type="button" class="btn-custom btn-round btn-custom-primary btn-fat extra-grocery-item"><i class="fa fa-plus"></i></button><span class="tooltip-text tooltip-text-arrow-bottom">Extra item</span>
						</div>
						<div class="form-group">
							<span class="btn-ripple-wrapper"><button type="submit" class="btn-custom btn-custom-primary btn-fat">aanpassen</button></span>
							<span class="btn-ripple-wrapper"><a href="{{ url('/admin/boodschappen') }}" class="btn-custom btn-fat">ga terug</a></span>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection