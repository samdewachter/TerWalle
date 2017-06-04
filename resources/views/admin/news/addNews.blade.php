@extends('layouts.admin')

@section('content')

	<div class="admin-wrapper">

		<div class="admin-header">
			<h1>Nieuwtje toevoegen</h1>
			<p></p>
		</div>
		<div class="admin-body">
			<div class="col-md-8 col-md-offset-2">
				<div class="well white admin-form">
					<form action="{{ url('/admin/nieuwtjes/add') }}" method="POST" enctype="multipart/form-data">
						{{ csrf_field() }}
						<div class="form-group">
							<input type="text" name="title" class="form-control input-label-float">
							<label class="label-float ">Titel</label>
						</div>
						<div class="form-group">
							<textarea rows="5" class="form-control input-label-float" name="subtitle"></textarea>
							<label class="label-float">Sub titel</label>
						</div>
						<div class="form-group">
							<textarea rows="10" class="form-control input-label-float" name="text"></textarea>
							<label class="label-float">Tekst</label>
						</div>
						<div class="form-group">
							<label class="">Cover foto</label>
							<input type="file" class="form-control input-label-float" name="cover_photo">							
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