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
						<div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
							<input type="text" name="name" value="{{ old('name') }}" class="form-control input-label-float <?= ($errors->has('name'))? 'input-error' : ''; ?>">
							<label class="label-float label-float ">Naam verslag</label>
							@if ($errors->has('name'))
		                        <span class="help-block">
		                            <strong>{{ $errors->first('name') }}</strong>
		                        </span>
		                    @endif
						</div>
						<div class="form-group {{ $errors->has('date') ? ' has-error' : '' }}">
							<input type="date" name="date" value="{{ old('date') }}" class="form-control input-label-float <?= ($errors->has('date'))? 'input-error' : ''; ?>">
							<label class="label-float label-float-date">Datum vergadering</label>
							@if ($errors->has('date'))
		                        <span class="help-block">
		                            <strong>{{ $errors->first('date') }}</strong>
		                        </span>
		                    @endif
						</div>
						<div class="form-group {{ $errors->has('kind_of_report') ? ' has-error' : '' }}">
							<select name="kind_of_report" value="{{ old('kind_of_report') }}" class="form-control input-label-float <?= ($errors->has('kind_of_report'))? 'input-error' : ''; ?>">
								<option <?= (old('kind_of_report') == 'kernverslag')? 'selected': ''; ?> value="kernverslag">Kernverslag</option>
								<option <?= (old('kind_of_report') == 'activiteitenverslag')? 'selected': ''; ?> value="activiteitenverslag">Activiteitenverslag</option>
								<option <?= (old('kind_of_report') == 'ander')? 'selected': ''; ?> value="ander">Ander</option>
							</select>
							<label class="label-float">Soort verslag</label>
							@if ($errors->has('kind_of_report'))
		                        <span class="help-block">
		                            <strong>{{ $errors->first('kind_of_report') }}</strong>
		                        </span>
		                    @endif
						</div>
						<div class="form-group {{ $errors->has('report_file') ? ' has-error' : '' }}">
							<input type="file" name="report_file" class="form-control input-label-float <?= ($errors->has('report_file'))? 'input-error' : ''; ?>">
							<label class="label-float label-float-date">Upload verslag</label>
							@if ($errors->has('report_file'))
		                        <span class="help-block">
		                            <strong>{{ $errors->first('report_file') }}</strong>
		                        </span>
		                    @endif
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