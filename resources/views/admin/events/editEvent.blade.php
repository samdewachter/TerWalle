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
						<div class="form-group">
							<input type="text" name="title" value="{{ $event->title }}" class="form-control input-label-float">
							<label class="label-float">Titel</label>
						</div>
						<div class="form-group clearfix">
							<div class="row">
								<label class="col-md-12">Startuur</label>
								<div class="col-md-5">
									<input placeholder="Datum" class="form-control" value="<?php $date = strtotime($event->start_time); $date = date('Y-m-d',$date); ;echo $date; ?>" type="date" name="start_date">
								</div>
								<div class="col-md-2">
									<input placeholder="Uur" class="form-control" value="<?php $date = strtotime($event->start_time); $date = date('H:i',$date); ;echo $date; ?>" type="time" name="start_time">
								</div>
							</div>
						</div>
						<div class="form-group clearfix">
							<div class="row">
								<label class="col-md-12">Einduur</label>
								<div class="col-md-5">
									<input placeholder="Datum" class="form-control" value="<?php $date = strtotime($event->end_time); $date = date('Y-m-d',$date); ;echo $date; ?>" type="date" name="end_date">
								</div>
								<div class="col-md-2">
									<input placeholder="Uur" class="form-control" value="<?php $date = strtotime($event->end_time); $date = date('H:i',$date); ;echo $date; ?>" type="time" name="end_time">
								</div>
							</div>
						</div>
						<div class="form-group">
							<textarea rows="10" class="form-control input-label-float" name="description">{{ $event->description }}</textarea>
							<label class="label-float">Beschrijving</label>
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
							<span class="btn-ripple-wrapper"><button type="submit" class="btn-custom btn-custom-primary btn-fat">voeg toe</button></span>
							<span class="btn-ripple-wrapper"><a href="{{ url('/admin/evenementen') }}" class="btn-custom btn-fat">ga terug</a></span>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

@endsection