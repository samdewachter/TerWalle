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
								<div class="form-group {{ $errors->has('album_name') ? ' has-error' : '' }}">
									<input type="text" name="album_name" value="{{ old('album_name') }}" class="form-control input-label-float <?= ($errors->has('album_name'))? 'input-error' : ''; ?>">
									<label class="label-float label-float ">Naam album</label>
									@if ($errors->has('album_name'))
				                        <span class="help-block">
				                            <strong>{{ $errors->first('album_name') }}</strong>
				                        </span>
				                    @endif
								</div>
								<div class="form-group {{ $errors->has('date') ? ' has-error' : '' }} filled-static">
									<label class="control-label">Datum</label>
									<input type="date" value="{{ old('date') }}" class="form-control <?= ($errors->has('date'))? 'input-error' : ''; ?>" name="date">
									@if ($errors->has('date'))
				                        <span class="help-block">
				                            <strong>{{ $errors->first('date') }}</strong>
				                        </span>
				                    @endif
								</div>
								<div class="form-group {{ $errors->has('event_id') ? ' has-error' : '' }}">
									<select name="event_id" class="form-control input-label-float <?= ($errors->has('event_id'))? 'input-error' : ''; ?>">
											<option value="0" >Geen evenement</option>
										@foreach($events as $event)
											<option <?=  (old('event_id') == $event->id)? 'selected' : ''; ?> value="{{ $event->id }}">{{ $event->title }}</option>
										@endforeach
										
									</select>
									<label class="label-float label-float ">Evenement</label>
									@if ($errors->has('event_id'))
				                        <span class="help-block">
				                            <strong>{{ $errors->first('event_id') }}</strong>
				                        </span>
				                    @endif
								</div>
								<div class="form-group">
									<label class="col-md-12">Publish</label>
									<input type="checkbox" id="publish_check" class="regular-checkbox publish" name="publish" /><label for="publish_check"><i class="fa fa-check"></i></label>
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