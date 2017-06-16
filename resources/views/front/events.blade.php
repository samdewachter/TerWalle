@extends('layouts.app')

@section('meta')

	<meta name="description" content="Hier heb je een overzicht van alle jeugdhuis evenementen die komende of afgelopen zijn.">
	<title>Ter Walle | Evenementen</title>

@endsection

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
								<?php $now = date('Y-m-d H:i:s') ?>
                                <span>
                                    {{ $event->start_time }}
                                    @if($event->start_time < $now && $event->end_time > $now)
                                        <span class="event-ongoing">(bezig)</span>
                                    @elseif($event->end_time < $now)
                                        <span class="event-over">(afgelopen)</span>
                                    @endif
                                </span>
								<p>
									@if( strlen($event->description) > 200)
										{{ substr($event->description, 0, 200) . '...' }}
									@else
										{{ $event->description }}
									@endif
								</p>
								<div class="read-more"><a href="{{ url('/evenementen', [$event->id . '-' . $event->title_url]) }}">Lees meer</a></div>
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