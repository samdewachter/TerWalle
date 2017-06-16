@extends('layouts.app')

@section('meta')

	<meta name="description" content="Hier vind je de foto's van het album {{ $album->album_name }}">
	<title>Ter Walle | Album: {{ $album->album_name }}</title>

@endsection

@section('content')

	<div class="album-wrapper clearfix">
		<div class="container">
			<div class="page-heading">
				<h1>{{ $album->album_name }}</h1>
			</div>
			<div class="col-md-12 album">
				<div class="grid">
					@foreach($album->Photos as $photo)
						<div class="<?= (getimagesize(url('uploads/photos', [$album->id, $photo->photo]))[0] > getimagesize(url('uploads/photos', [$album->id, $photo->photo]))[1])? 'grid-item--width2' : 'grid-item--width1'; ?> grid-item">
							<div class="photo">
								<a href="{{ url('/uploads/photos', [$album->id, $photo->photo]) }}" data-lightbox="{{ $album->album_name }}"><img src="{{ url('/uploads/photos', [$album->id, $photo->photo]) }}"></a>
							</div>
						</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
	@section('scripts')
		<script type="text/javascript" src="{{ asset('js/libs/lightbox.js') }}"></script>
	@endsection
@endsection