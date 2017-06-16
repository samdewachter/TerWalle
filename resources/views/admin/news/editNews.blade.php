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
						<div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
							<input type="text" value="{{ $news->title }}" name="title" class="form-control input-label-float <?= ($errors->has('title'))? 'input-error' : ''; ?>">
							<label class="label-float ">Titel</label>
							@if ($errors->has('title'))
				                <span class="help-block">
				                    <strong>{{ $errors->first('title') }}</strong>
				                </span>
				            @endif
						</div>
						<div class="form-group {{ $errors->has('subtitle') ? ' has-error' : '' }}">
							<textarea rows="5" class="form-control input-label-float <?= ($errors->has('subtitle'))? 'input-error' : ''; ?>" name="subtitle">{{ $news->subtitle }}</textarea>
							<label class="label-float">Sub titel</label>
							@if ($errors->has('subtitle'))
				                <span class="help-block">
				                    <strong>{{ $errors->first('subtitle') }}</strong>
				                </span>
				            @endif
						</div>
						<div class="form-group {{ $errors->has('text') ? ' has-error' : '' }}">
							<textarea rows="10" class="form-control input-label-float <?= ($errors->has('text'))? 'input-error' : ''; ?>" name="text">{{ $news->text }}</textarea>
							<label class="label-float">Tekst</label>
							@if ($errors->has('text'))
				                <span class="help-block">
				                    <strong>{{ $errors->first('text') }}</strong>
				                </span>
				            @endif
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
							<label class="col-md-12">Publish</label>
							<input type="checkbox" id="publish_check" class="regular-checkbox publish" name="publish" <?= ($news->publish)? 'checked' : ''; ?> /><label for="publish_check"><i class="fa fa-check"></i></label>
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