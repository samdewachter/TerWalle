@extends('layouts.admin')

@section('content')

	<div class="album-wrapper admin-wrapper">

		<div class="admin-header">
			<h1>{{ $album->album_name }} aanpassen.</h1>
			<p>Hier heb je een overzicht van het album waar je foto's kunt toevoegen of verwijderen.</p>
		</div>
		<div class="album-info admin-form">
			<form action="{{ url('/admin/album', [$album->id, 'edit']) }}" method="POST">
				{{ csrf_field() }}
				<div class="form-group {{ $errors->has('album_name') ? ' has-error' : '' }}">
					<input type="text" value="{{ $album->album_name }}" name="album_name" class="form-control input-label-float <?= ($errors->has('album_name'))? 'input-error' : ''; ?>">
					<label class="label-float label-float ">Naam album</label>
					@if ($errors->has('album_name'))
	                    <span class="help-block">
	                        <strong>{{ $errors->first('album_name') }}</strong>
	                    </span>
	                @endif
				</div>
				<div class="form-group {{ $errors->has('date') ? ' has-error' : '' }} filled-static">
					<label>Datum</label>
					<input type="date" value="{{ $album->date }}" class="form-control <?= ($errors->has('date'))? 'input-error' : ''; ?>" name="date">
					@if ($errors->has('date'))
	                    <span class="help-block">
	                        <strong>{{ $errors->first('date') }}</strong>
	                    </span>
	                @endif
				</div>
				<div class="form-group {{ $errors->has('event_id') ? ' has-error' : '' }}">
					<select name="event_id" class="form-control input-label-float <?= ($errors->has('event_id'))? 'input-error' : ''; ?>">
					<option value="0" <?= (count($album->Events) == 0)? 'selected' : ''; ?> >Geen evenement</option>
						@if(count($album->Events) != 0)
							@foreach($events as $event)
								<option <?= ($event->id == $album->Events[0]->id)? 'selected' : '' ; ?> value="{{ $event->id }}">{{ $event->title }}</option>
							@endforeach
						@else
							@foreach($events as $event)
								<option value="{{ $event->id }}">{{ $event->title }}</option>
							@endforeach
						@endif
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
					<input type="checkbox" id="publish_check" class="regular-checkbox publish" name="publish" <?= ($album->publish)? 'checked' : ''; ?> /><label for="publish_check"><i class="fa fa-check"></i></label>
				</div>
			  	<div class="form-group">
					<span class="btn-ripple-wrapper"><button type="submit" class="btn-custom btn-custom-primary btn-fat">Aanpassen</button></span>
					<span class="btn-ripple-wrapper"><a href="{{ url('/admin/albums') }}" class="btn-custom btn-fat">ga terug</a></span>
				</div>
			</form>
			<form action="{{ url('/admin/album', [$album->id, 'delete']) }}" method="POST">
				{{ csrf_field() }}
				<input type="hidden" name="_method" value="DELETE" />
				<div class="form-group">
                	<span class="btn-ripple-wrapper"><button class="btn-custom btn-fat btn-custom-danger">Album verwijderen</button></span>
                </div>
			</form>
		</div>
		<div class="admin-body">
			<div class="grid">
				@foreach($album->Photos as $photo)
					<div class="<?= (getimagesize(url('uploads/photos', [$album->id, $photo->photo]))[0] > getimagesize(url('uploads/photos', [$album->id, $photo->photo]))[1])? 'grid-item--width2' : 'grid-item--width1'; ?> grid-item">
						<div class="card bordered white">
							<div class="card-body">
								<img src="{{ url('uploads/photos', [$album->id, $photo->photo]) }}">
								<div class="photo-delete">
									<form action="{{ url('/admin/foto', [$photo->id, 'delete']) }}" method="POST">
										{{ csrf_field() }}
										<input type="hidden" name="_method" value="DELETE" />
		                                <button class="btn-custom btn-round btn-fat btn-custom-danger"><i class="fa fa-trash"></i></button>
									</form>
								</div>
							</div>
							
						</div>
					</div>
				@endforeach
			</div>
		</div>
		<div class="footer-buttons">
			<ul>
				<li class="custom-tooltip custom-tooltip-arrow-bottom"><a href="{{ url('/admin/album', [$album->id, 'fotos', 'add']) }}" class="btn-custom btn-round btn-custom-primary"><i class="fa fa-plus"></i></a><span class="tooltip-text tooltip-text-arrow-bottom">Foto's toevoegen</span></li>
			</ul>
		</div>
	</div>

@endsection