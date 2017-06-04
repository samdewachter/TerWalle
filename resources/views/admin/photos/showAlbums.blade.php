@extends('layouts.admin')

@section('content')

	<div class="albums-wrapper admin-wrapper">

		<div class="admin-header clearfix">
			<div class="pull-left">
				<h1>Foto's</h1>
				<p>Hier kan je foto's aanmaken, aanpassen en verwijderen.</p>
			</div>
			<div class="pull-right search search-admin">
				<form action="{{ url('/admin/albums/zoeken') }}" method="GET">
					<i class="fa fa-search search-button"></i><input placeholder="Zoeken" class="input-label-float" type="text" name="search_album">
				</form>
			</div>
		</div>
		<div class="admin-body">
			<div class="grid">
				@foreach($albums as $album)
					<div class="grid-item col-md-4">
						<div class="card bordered white">
							<div class="card-body">
								<img src="{{ url('uploads/photos', [$album->id, $album->Photos[0]->photo]) }}">
								<h4 class="album-title">{{ $album->album_name }}</h4>
							</div>
							<div class="card-footer clearfix">
								<p class="pull-left">Foto's van {{ $album->date }}</p>
								<ul class="pull-right">
									<li><span class="btn-ripple-wrapper"><a href="{{ url('/admin/album', [$album->id]) }}" class="btn-custom btn-round btn-fat btn-custom-primary"><i class="fa fa-edit"></i></a></span></li>
									<li>
										<form action="{{ url('/admin/album', [$album->id, 'delete']) }}" method="POST">
											{{ csrf_field() }}
											<input type="hidden" name="_method" value="DELETE" />
			                                <button class="btn-custom btn-round btn-fat btn-custom-danger"><i class="fa fa-trash"></i></button>
										</form>
									</li>
								</ul>
							</div>
						</div>
					</div>
				@endforeach
			</div>
		</div>
		<div class="footer-buttons">
			<ul>
				<li class="custom-tooltip custom-tooltip-arrow-bottom"><a href="{{ url('/admin/albums/add') }}" class="btn-custom btn-round btn-custom-primary"><i class="fa fa-plus"></i></a><span class="tooltip-text tooltip-text-arrow-bottom">Nieuw item</span></li>
			</ul>
		</div>
	</div>

@endsection