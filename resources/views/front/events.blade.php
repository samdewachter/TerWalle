@extends('layouts.app')

@section('content')

	<div class="events-wrapper clearfix">
		<div class="container">
			<div class="page-heading">
				<h1>Evenementen</h1>
				<p>Hier heb je een overzicht van alle evenementen.</p>
			</div>
			<div class="grid">
				@foreach($events as $event)
					<div class="grid-item event">
						<div class="panel">
							<?php $cover = substr($event->cover, 0, 4); ?>
							@if($cover == 'http')
								<div class="panel-heading" style="background-image: url('{{ $event->cover }}')"></div>
							@else
								<div class="panel-heading" style="background-image: url('{{ url('/uploads/eventPhotos', [$event->cover]) }}')"></div>
							@endif						
							<div class="panel-body">
								<h3>{{ $event->title }}</h3>
								<span>{{ $event->start_time }}</span>
								<p>
									@if( strlen($event->description) > 200)
										{{ substr($event->description, 0, 200) . '...' }}
									@else
										{{ $event->description }}
									@endif
								</p>
								<div class="read-more"><a href="{{ url('/evenementen', [$event->id]) }}">Lees meer</a></div>
							</div>
						</div>
					</div>
				@endforeach
			</div>
			<div class="text-center">
				{{ $events->links() }}
			</div>
		</div>
	</div>

@endsection