@extends('layouts.app')

@section('meta')

	<meta name="description" content="Hier heb je een overzicht van alle nieuwtjes die te maken hebben met het jeugdhuis.">
	<title>Ter Walle | Nieuws</title>

@endsection

@section('content')

	<div class="news-wrapper clearfix">

		<div class="container">
			<div class="page-heading">
				<h1>Nieuwsartikelen</h1>
				<p>Hier heb je een overzicht van alle nieuwsartikelen.</p>
			</div>
			<div class="grid">
				@foreach($news as $newsItem)
					<div class="grid-item col-xs-12 news-item">
						<div class="panel">
							<div class="panel-heading" style="background-image: url('{{ url('/uploads/newsPhotos', [$newsItem->cover_photo]) }}')">
							</div>
							<div class="panel-body">
								<h3>{{ $newsItem->title }}</h3>
								<p>{{ $newsItem->subtitle }}</p>
								<div class="read-more"><a href="{{ url('/nieuws', [$newsItem->id . '-' . $newsItem->title_url]) }}">Lees meer</a></div>
							</div>
						</div>
					</div>
				@endforeach
			</div>
		</div>

	</div>

@endsection