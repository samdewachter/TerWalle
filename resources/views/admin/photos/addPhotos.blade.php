@extends('layouts.admin')

@section('content')

	<div class="add-photos-wrapper admin-wrapper">

		<div class="admin-header">
			<h1>Foto's toevoegen aan album {{ $album->album_name }}</h1>
			<p>Hier kan je extra foto's toevoegen.</p>
		</div>
		<div class="admin-body">
			<div class="col-md-8 col-md-offset-2">
				<div class="well white admin-form">
					<form action="{{ url('/admin/fotos/add') }}" method="POST" enctype="multipart/form-data">
						{{ csrf_field() }}
						<div class="form-group">
					  		<div id="add-photos-dropzone" class="dropzone">
					  		</div>
					  	</div>
					  	<div class="form-group">
							<span class="btn-ripple-wrapper"><button id="submit-all" type="submit" class="btn-custom btn-custom-primary btn-fat">voeg toe</button></span>
							<span class="btn-ripple-wrapper"><a href="{{ URL::previous() }}" class="btn-custom btn-fat">ga terug</a></span>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

@endsection