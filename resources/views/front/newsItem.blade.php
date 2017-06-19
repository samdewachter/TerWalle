@extends('layouts.app')

@section('meta')

	<meta name="description" content="{{ (strlen($news->subtitle) > 100)? substr($news->subtitle, 0, 100) . '...': $news->subtitle }}">
	<title>Jeugdhuis Ter Walle | Nieuws: {{ $news->title }}</title>
	
	<script type="application/ld+json">
    {
      "@context": "http://schema.org",
      "@type": "NewsArticle",
      "mainEntityOfPage": {
        "@type": "WebPage"
      },
      "headline": "{{ $news->title }}",
      "image": {
        "@type": "ImageObject",
        "url": "{{ url('/uploads/newsPhotos', [$news->cover_photo]) }}",
        "height": 800,
        "width": 800
      },
      "datePublished": "{{ $news->created_at }}",
      "dateModified": "{{ $news->updated_at }}",
      "author": {
        "@type": "Person",
        "name": "Jeugdhuis Ter Walle"
      },
       "publisher": {
        "@type": "Organization",
        "name": "Jeugdhuis",
        "logo": {
          "@type": "ImageObject",
          "url": "http://terwalle.be/images/TW_logo.png",
          "width": 60,
          "height": 60
        }
      },
      "description": "{{ $news->subtitle }}"
    }
    </script>

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