@extends('layouts.app')

@section('meta')

	<meta name="description" content="{{ (strlen($news->subtitle) > 100)? substr($news->subtitle, 0, 100) . '...': $news->subtitle }}">
	<title>Ter Walle | Nieuws: {{ $news->title }}</title>

@endsection

@section('content')

	<div class="news-item-wrapper clearfix">
		<div class="container">
			<div class="news-item-title">
				<h1>{{ $news->title }}</h1>
			</div>
			<div class="col-md-12 news-item">
				<div class="panel">
					<div class="panel-heading" style="background-image: url('{{ url('/uploads/newsPhotos', [$news->cover_photo]) }}')">
					</div>
					<div class="panel-body">
						<div class="subtitle">
							<p>{{ $news->subtitle }}</p>
						</div>
						<div class="text">
							<p>{{ $news->text }}</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection