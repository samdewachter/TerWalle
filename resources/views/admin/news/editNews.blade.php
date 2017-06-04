@extends('layouts.admin')

@section('content')

	<div class="edit-news-wrapper admin-wrapper">

		<div class="admin-header">
			<h1>Nieuwtje toevoegen</h1>
			<p></p>
		</div>
		<div class="admin-body clearfix">
			<div class="col-md-8 col-md-offset-2">
				<div class="well white admin-form">
					<form action="{{ url('/admin/nieuwtjes', [$news->id, 'edit']) }}" method="POST" enctype="multipart/form-data">
						{{ csrf_field() }}
						<div class="form-group">
							<input type="text" value="{{ $news->title }}" name="title" class="form-control input-label-float">
							<label class="label-float ">Titel</label>
						</div>
						<div class="form-group">
							<textarea rows="5" class="form-control input-label-float" name="subtitle">{{ $news->subtitle }}</textarea>
							<label class="label-float">Sub titel</label>
						</div>
						<div class="form-group">
							<textarea rows="10" class="form-control input-label-float" name="text">{{ $news->text }}</textarea>
							<label class="label-float">Tekst</label>
						</div>
						<div class="form-group current-cover-wrapper">
							<label>Huidige cover foto</label>
							<img class="current-cover-photo" src="{{ asset('/uploads/newsPhotos/' . $news->cover_photo) }}">
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
							<span class="btn-ripple-wrapper"><button type="submit" class="btn-custom btn-custom-primary btn-fat">aanpassen</button></span>
							<span class="btn-ripple-wrapper"><a href="{{ URL::previous() }}" class="btn-custom btn-fat">ga terug</a></span>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

@endsection