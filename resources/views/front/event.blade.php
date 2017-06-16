@extends('layouts.app')

@section('meta')

	<meta name="description" content="{{ (strlen($event->description) > 100)? substr($event->description, 0, 100) . '...': $event->description }}">
	<title>Ter Walle | Evenement: {{ $event->title }}</title>

@endsection

@section('content')

	<div class="event-wrapper clearfix">
		<div class="container">
			<div class="page-heading">
				<h1>{{ $event->title }}</h1>
			</div>
			<div class="col-md-12 event-item">
				<div class="panel">
					<?php $cover = substr($event->cover, 0, 4); ?>
					@if($cover == 'http')
						<div class="panel-heading" style="background-image: url('{{ $event->cover }}')"></div>
					@else
						<div class="panel-heading" style="background-image: url('{{ url('/uploads/eventPhotos', [$event->cover]) }}')"></div>
					@endif
					<div class="panel-body">
						<div class="subtitle">
							<?php $now = date('Y-m-d H:i:s') ?>
							<p>
								Evenement start op: {{ $event->start_time }}
								@if($event->start_time < $now && $event->end_time > $now)
                                    <span class="event-ongoing">(bezig)</span>
                                @elseif($event->end_time < $now)
                                    <span class="event-over">(afgelopen)</span>
                                @endif
							</p>
						</div>
						<div class="text">
							<p>{{ $event->description }}</p>
						</div>
						<?php $now = date('Y-m-d'); ?>
						@if(count($event->Presales) != 0)
							<div class="presale-buttons">
								<h3>Voorverkoop</h3>
								@foreach($event->Presales as $presale)
									<form action="{{ url('/voorverkoop', [$presale->id]) }}" method="POST">
										{{ csrf_field() }}
										<div class="<?= ($presale->deadline < $now)? 'disable-presale': ''; ?>">
											<button class="presale-btn" type="submit">{{ $presale->description }}</br>€{{ $presale->member_price }}/€{{ $presale->non_member_price }}: vvk tot {{ $presale->deadline }}</button>
										</div>
									</form>
								@endforeach
							</div>
						@endif
					</div>
				</div>
				@if(count($albums) > 0)
					<div class="album-wrapper">
						<div class="page-heading">
							<h1>Gerelateerde Albums</h1>
						</div>
						@foreach($albums as $album)
							<div class="col-md-4 album">
								<div class="panel">
									<div class="panel-heading" style="background-image: url('{{ url('/uploads/photos', [$album->id, $album->Photos[0]->photo]) }}')">
									</div>
									<div class="panel-body">
										<h3>{{ $album->album_name }}</h3>
										<div class="read-more"><a href="{{ url('/fotos', [$album->id . '-' . $album->title_url]) }}">Bekijk album</a></div>
									</div>
								</div>
							</div>
						@endforeach
					</div>
				@endif
			</div>
		</div>
	</div>

@endsection