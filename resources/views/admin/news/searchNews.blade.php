@extends('layouts.admin')

@section('content')
	<div class="news-wrapper">

		<div class="admin-header">
			<h1>Niewtjes</h1>
			<p>Hier heb je een overzicht van de nieuwtjes.</p>
		</div>
		<div class="admin-body">
			<h3 class="table-title pull-left">{{ $news->total() }} nieuwtjes gevonden op '{{ $keyword }}'</h3>
			<div class="pull-right search search-admin">
				<form action="{{ url('/admin/nieuwtjes/zoeken') }}" method="GET">
					<a href="{{ url('/admin/nieuwtjes') }}"><i class="fa fa-times"></i></a><i class="fa fa-search search-button"></i><input value="{{ $keyword }}" placeholder="Zoeken" class="input-label-float search-active" type="text" name="search_news">
				</form>
			</div>
			<table class="table">
				<thead>
					<tr>
						<th class="table-photo">PHOTO</th>
						<th class="table-event-title">TITLE</th>
						<th class="table-subtitle">SUBTITLE</th>
						<th class="table-text">TEXT</th>
						<th class="table-written">WRITTEN</th>
						<th class="table-publish">PUBLISH</th>
						<th class="table-actions text-right">ACTIONS</th>
					</tr>
				</thead>
				<tbody>
					@foreach($news as $new)
						<tr>
							<td><img src="{{ asset('uploads/newsPhotos/' . $new->cover_photo) }}"></td>
							<td>{{ $new->title }}</td>
							<td>{{ substr($new->subtitle, 0, 100) . '...' }}</td>
							<td>{{ substr($new->text, 0, 100) . '...' }}</td>
							<td>{{ $new->created_at }}</td>
							<td class="table-publish"><input type="checkbox" id="{{ $new->id }}" class="regular-checkbox publish-news" name="publish_check" <?= ($new->publish)? 'checked' : ''; ?> /><label for="{{ $new->id }}"><i class="fa fa-check"></i></label></td>
							<td class="text-right">
								<ul>
									<li class="custom-tooltip custom-tooltip-arrow-right"><a href="{{ url('/admin/nieuwtjes', [$new->id, 'edit']) }}" class="btn-custom btn-round"><i class="fa fa-edit"></i></a><span class="tooltip-text tooltip-text-arrow-right">Aanpassen</span></li>
									<li class="custom-tooltip custom-tooltip-arrow-bottom">
										<form action="{{ url('/admin/nieuwtjes', [$new->id, 'delete']) }}" method="POST">
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
		</div>
		<div class="footer-buttons">
			<ul>
				<li class="custom-tooltip custom-tooltip-arrow-bottom"><a href="{{ url('/admin/nieuwtjes/add') }}" class="btn-custom btn-round btn-custom-primary"><i class="fa fa-plus"></i></a><span class="tooltip-text tooltip-text-arrow-bottom">Nieuw item</span></li>
			</ul>
		</div>
	</div>

@endsection