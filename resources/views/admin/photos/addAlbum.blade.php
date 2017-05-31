@extends('layouts.admin')

@section('content')
	<div class="add-photo-wrapper admin-wrapper">
		<div class="admin-header">
			<h1>Foto's toevoegen</h1>
			<p>Hier kan je foto's toevoegen.</p>
		</div>
		<div class="admin-body clearfix">
			<div class="col-md-8 col-md-offset-2">	
				<div class="well white admin-form">			
					<!-- Nav tabs -->
					<ul class="nav nav-tabs" role="tablist">
						<li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Foto's</a></li>
					</ul>
					
					<!-- Tab panes -->
					<div class="tab-content">
						<div role="tabpanel" class="tab-pane active" id="home">
							<form action="{{ url('/admin/fotos/add') }}" method="POST" enctype="multipart/form-data">
								{{ csrf_field() }}
								<div class="form-group">
									<input type="text" name="album_name" class="form-control input-label-float">
									<label class="label-float label-float ">Naam album</label>
								</div>
								<div class="form-group filled-static">
									<label class="control-label">Datum</label>
									<input type="date" class="form-control" name="date">
								</div>
								<div class="form-group">
									<select name="event_id" class="form-control input-label-float">
										@foreach($events as $event)
											<option value="{{ $event->id }}">{{ $event->title }}</option>
										@endforeach
										
									</select>
									<label class="label-float label-float ">Evenement</label>
								</div>
								<div class="form-group">
							  		<div id="my-awesome-dropzone" class="dropzone">
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
		</div>
	</div>
@endsection