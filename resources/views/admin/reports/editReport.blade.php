@extends('layouts.admin')

@section('content')

	<div class="admin-wrapper edit-report-wrapper">

		<div class="admin-header">
			<h1>{{ $report->name }} bewerken</h1>
		</div>
		<div class="admin-body">
			<div class="col-md-8 col-md-offset-2">
				<div class="well white admin-form">
					<form action="{{ url('/admin/verslagen', [$report->id, 'edit']) }}" method="POST" enctype="multipart/form-data">
						{{ csrf_field() }}
						<div class="form-group">
							<input type="text" name="name" value="{{ $report->name }}" class="form-control input-label-float">
							<label class="label-float label-float ">Naam verslag</label>
						</div>
						<div class="form-group">
							<input type="date" name="date" value="{{ $report->date }}" class="form-control input-label-float">
							<label class="label-float label-float-date">Datum vergadering</label>
						</div>
						<div class="form-group">
							<select name="kind_of_report" class="form-control input-label-float">
								<option <?= ($report->kind_of_report == "kernverslag")? 'selected' : ''; ?> value="kernverslag">Kernverslag</option>
								<option <?= ($report->kind_of_report == "activiteitenverslag")? 'selected' : ''; ?> value="activiteitenverslag">Activiteitenverslag</option>
								<option <?= ($report->kind_of_report == "Ander")? 'selected' : ''; ?> value="ander">Ander</option>
							</select>
							<label class="label-float">Soort verslag</label>
						</div>
						<div class="form-group">
							<p>Bestand op dit moment: <a href="{{ url('/admin/verslagen', [$report->id, 'download']) }}">{{ $report->name }}</a></p>
							<button id="reupload-report" type="button" class="btn-custom btn-custom-primary btn-fat extra-grocery-item">Ander bestand uploaden</button>
						</div>
						<div class="form-group input-report-upload">
							<input type="file" name="report_file" class="form-control input-label-float">
							<label class="label-float label-float-date">Upload verslag</label>
						</div>
						<div class="form-group">
							<span class="btn-ripple-wrapper"><button type="submit" class="btn-custom btn-custom-primary btn-fat">pas aan</button></span>
							<span class="btn-ripple-wrapper"><a href="{{ URL::previous() }}" class="btn-custom btn-fat">ga terug</a></span>
						</div>
					</form>
				</div>
			</div>
		</div>
		
	</div>

@endsection