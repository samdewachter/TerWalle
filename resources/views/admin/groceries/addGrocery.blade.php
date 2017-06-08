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
						<div class="form-group">
							<input type="text" name="name" class="form-control input-label-float">
							<label class="label-float">Naam boodschappenlijst</label>
						</div>
						<div class="form-group">
							<input type="date" name="needed_at" class="form-control input-label-float">
							<label class="label-float label-float-date ">Tenlaatste nodig op</label>
						</div>
						<div class="grocery-items">
							<div class="form-group clearfix">
								<div class="col-md-2">
									<input type="number" name="quantity[]" class="form-control input-label-float">
									<label class="label-float">Hoeveel</label>
								</div>
								<div class="col-md-10">
									<input type="text" name="items[]" class="form-control input-label-float">
									<label class="label-float">Item 1</label>
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