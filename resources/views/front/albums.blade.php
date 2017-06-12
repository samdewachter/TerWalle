@extends('layouts.app')

@section('content')

	<div class="albums-wrapper clearfix">
		<div class="container">
			<div class="page-heading">
				<h1>Albums</h1>
				<p>Hier heb je een overzicht van alle albums.</p>
			</div>
			<div class="grid">
				@foreach($albums as $album)
					<div class="grid-item album">
						<div class="panel">
							<div class="panel-heading" style="background-image: url('{{ url('/uploads/photos', [$album->id, $album->Photos[0]->photo]) }}')">
							</div>
							<div class="panel-body">
								<h3>{{ $album->album_name }}</h3>
								<div class="read-more"><a href="{{ url('/fotos', [$album->id]) }}">Bekijk album</a></div>
							</div>
						</div>
					</div>
				@endforeach
			</div>
		</div>
	</div>

@endsection