@extends('layouts.admin')

@section('content')

	<div class="events-wrapper">

		<div class="admin-header">
			<h1>Evenementen</h1>
			<p>Hier heb je een overzicht van alle evenementen.</p>
		</div>
		<div class="admin-body">
			<h3 class="table-title pull-left">{{ $events->total() }} Evenementen</h3>
			<div class="pull-right search search-admin">
				<form action="{{ url('/admin/evenementen/zoeken') }}" method="GET">
					<i class="fa fa-search search-button"></i><input placeholder="Zoeken" class="input-label-float" type="text" name="search_event">
				</form>
			</div>
			<table class="table">
				<thead>
					<tr>
						<!-- <th class="table-checkbox"><input type="checkbox" id="checkbox" name=""><label class="checkbox-label" for="checkbox"></label></th> -->
						<th class="table-photo">PHOTO</th>
						<th class="table-name">TITLE</th>
						<th class="table-description">DESCRIPTION</th>
						<th class="table-start">START TIME</th>
						<th class="table-end">END TIME</th>
						<th class="table-publish">PUBLISH</th>
						<th class="table-actions text-right">ACTIONS</th>
					</tr>
				</thead>
				<tbody>
					@foreach($events as $event)
						<tr>
							<td>
								<?php $cover = substr($event->cover, 0, 4); ?>
								@if($cover == 'http')
									<img src="{{ $event->cover }}">
								@else
									<img src="{{ asset('/uploads/eventPhotos') . '/' . $event->cover }}">
								@endif
							</td>
							<td>{{ $event->title }}</td>
							<td>{{ substr($event->description, 0, 100) . '...' }}</td>
							<td>{{ $event->start_time }}</td>
							<td>{{ $event->end_time }}</td>
							<td class="table-publish"><input type="checkbox" id="{{ $event->id }}" class="regular-checkbox publish-event" name="publish_check" <?= ($event->publish)? 'checked' : ''; ?> /><label for="{{ $event->id }}"><i class="fa fa-check"></i></label></td>
							<td class="text-right">
								<ul>
									<li class="custom-tooltip custom-tooltip-arrow-right"><a href="{{ url('/admin/evenementen', [$event->id, 'edit']) }}" class="btn-custom btn-round"><i class="fa fa-edit"></i></a><span class="tooltip-text tooltip-text-arrow-right">Aanpassen</span></li>
									<li class="custom-tooltip custom-tooltip-arrow-bottom">
										<form action="{{ url('/admin/evenementen', [$event->id, 'delete']) }}" method="POST">
											{{ csrf_field() }}
											<input type="hidden" name="_method" value="DELETE" />
			                                <button class="btn-custom btn-round"><i class="fa fa-trash"></i></button><span class="tooltip-text tooltip-text-arrow-bottom">Verwijderen</span>
										</form>
									</li>
								</ul>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
			<div class="text-center">
				{{ $events->links() }}
			</div>
		</div>
		<div class="footer-buttons">
			<ul>
				<li class="custom-tooltip custom-tooltip-arrow-bottom"><a href="{{ url('/admin/evenementen/add') }}" class="btn-custom btn-round btn-custom-primary"><i class="fa fa-plus"></i></a><span class="tooltip-text tooltip-text-arrow-bottom">Nieuw item</span></li>
			</ul>
		</div>
	</div>

@endsection