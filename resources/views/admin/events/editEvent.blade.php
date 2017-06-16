@extends('layouts.admin')

@section('content')

	<div class="edit-event-wrapper admin-wrapper">

		<div class="admin-header">
			<h1>Event aanpassen</h1>
			<p></p>
		</div>
		<div class="admin-body clearfix">
			<div class="col-md-8 col-md-offset-2">
				<div class="well white admin-form">
					<form action="{{ url('/admin/evenementen', [$event->id, 'edit']) }}" method="POST" enctype="multipart/form-data">
						{{ csrf_field() }}
						<div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
							<input type="text" name="title" value="{{ $event->title }}" class="form-control input-label-float <?= ($errors->has('title'))? 'input-error' : ''; ?>">
							<label class="label-float">Titel</label>
							@if ($errors->has('title'))
		                        <span class="help-block">
		                            <strong>{{ $errors->first('title') }}</strong>
		                        </span>
		                    @endif
						</div>
						<div class="form-group {{ $errors->has('start_date') ? ' has-error' : '' }} {{ $errors->has('start_time') ? ' has-error' : '' }} clearfix">
							<div class="row">
								<label class="col-md-12">Startuur</label>
								<div class="col-md-5">
									<input placeholder="Datum" class="form-control <?= ($errors->has('start_date'))? 'input-error' : ''; ?>" value="<?php $date = strtotime($event->start_time); $date = date('Y-m-d',$date); ;echo $date; ?>" type="date" name="start_date">
									@if ($errors->has('start_date'))
				                        <span class="help-block">
				                            <strong>{{ $errors->first('start_date') }}</strong>
				                        </span>
				                    @endif
								</div>
								<div class="col-md-2">
									<input placeholder="Uur" class="form-control <?= ($errors->has('start_time'))? 'input-error' : ''; ?>" value="<?php $date = strtotime($event->start_time); $date = date('H:i',$date); ;echo $date; ?>" type="time" name="start_time">
									@if ($errors->has('start_time'))
				                        <span class="help-block">
				                            <strong>{{ $errors->first('start_time') }}</strong>
				                        </span>
				                    @endif
								</div>
							</div>
						</div>
						<div class="form-group {{ $errors->has('end_date') ? ' has-error' : '' }} {{ $errors->has('end_time') ? ' has-error' : '' }} clearfix">
							<div class="row">
								<label class="col-md-12">Einduur</label>
								<div class="col-md-5">
									<input placeholder="Datum" class="form-control <?= ($errors->has('end_date'))? 'input-error' : ''; ?>" value="<?php $date = strtotime($event->end_time); $date = date('Y-m-d',$date); ;echo $date; ?>" type="date" name="end_date">
									@if ($errors->has('end_date'))
				                        <span class="help-block">
				                            <strong>{{ $errors->first('end_date') }}</strong>
				                        </span>
				                    @endif
								</div>
								<div class="col-md-2">
									<input placeholder="Uur" class="form-control <?= ($errors->has('end_time'))? 'input-error' : ''; ?>" value="<?php $date = strtotime($event->end_time); $date = date('H:i',$date); ;echo $date; ?>" type="time" name="end_time">
									@if ($errors->has('end_time'))
				                        <span class="help-block">
				                            <strong>{{ $errors->first('end_time') }}</strong>
				                        </span>
				                    @endif
								</div>
							</div>
						</div>
						<div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
							<textarea rows="10" class="form-control input-label-float <?= ($errors->has('description'))? 'input-error' : ''; ?>" name="description">{{ $event->description }}</textarea>
							<label class="label-float">Beschrijving</label>
							@if ($errors->has('description'))
		                        <span class="help-block">
		                            <strong>{{ $errors->first('description') }}</strong>
		                        </span>
		                    @endif
						</div>
						<div class="form-group">
							<label class="col-md-12">Publish</label>
							<input type="checkbox" id="{{ $event->id }}" class="regular-checkbox publish" name="publish" <?= ($event->publish)? 'checked' : ''; ?> /><label for="{{ $event->id }}"><i class="fa fa-check"></i></label>
						</div>
						<div class="form-group current-cover-wrapper">
							<label>Huidige cover foto</label>
							<?php $cover = substr($event->cover, 0, 4); ?>
							@if($cover == 'http')
								<img class="current-cover-photo" src="{{ $event->cover }}">
							@else
								<img class="current-cover-photo" src="{{ asset('/uploads/eventPhotos') . '/' . $event->cover }}">
							@endif
						</div>
						<div class="form-group">
							<div class="new-cover-photo">
								<label class="">Cover foto</label>
								<input type="file" class="form-control input-label-float" name="cover_photo">
							</div>
							<span class="btn-ripple-wrapper"><button type="button" class="btn-custom btn-custom-primary btn-fat new-cover-btn">Nieuwe cover foto</button></span>
							<span class="btn-ripple-wrapper cancel-cover-photo"><button type="button" class="btn-custom btn-fat">Annuleer</button></span>						
						</div>
					  	<div class="form-group">
							<span class="btn-ripple-wrapper"><button type="submit" class="btn-custom btn-custom-primary btn-fat">pas aan</button></span>
							<span class="btn-ripple-wrapper"><a href="{{ url('/admin/evenementen') }}" class="btn-custom btn-fat">ga terug</a></span>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

@endsection