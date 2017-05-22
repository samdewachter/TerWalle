@extends('layouts.admin')

@section('content')

	<div class="add-report-wrapper admin-wrapper">

		<div class="admin-header">
			<h1>Verslag toevoegen</h1>
			<p>Hier kunt u een verslag toevoegen.</p>
		</div>
		<div class="admin-body">
			<div class="col-md-8 col-md-offset-2">
				<div class="well white admin-form">
					<form action="{{ url('/admin/verslagen/add') }}" method="POST" enctype="multipart/form-data">
						{{ csrf_field() }}
						<div class="form-group">
							<input type="text" name="name" class="form-control input-label-float">
							<label class="label-float label-float ">Naam verslag</label>
						</div>
						<div class="form-group">
							<input type="date" name="date" class="form-control input-label-float">
							<label class="label-float label-float-date">Datum vergadering</label>
						</div>
						<div class="form-group">
							<select name="kind_of_report" class="form-control input-label-float">
								<option value="kernverslag">Kernverslag</option>
								<option value="activiteitenverslag">Activiteitenverslag</option>
								<option value="ander">Ander</option>
							</select>
							<label class="label-float">Soort verslag</label>
						</div>
						<div class="form-group">
							<input type="file" name="report_file" class="form-control input-label-float">
							<label class="label-float label-float-date">Upload verslag</label>
						</div>
						<div class="form-group">
							<span class="btn-ripple-wrapper"><button type="submit" class="btn-custom btn-custom-primary btn-fat">voeg toe</button></span>
							<span class="btn-ripple-wrapper"><a href="{{ url('/admin/verslagen') }}" class="btn-custom btn-fat">ga terug</a></span>
						</div>
					</form>
				</div>
			</div>
		</div>

	</div>

@endsection