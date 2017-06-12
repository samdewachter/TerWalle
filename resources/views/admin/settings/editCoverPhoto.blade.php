@extends('layouts.admin')

@section('content')

	<div class="admin-wrapper">

		<div class="admin-header">
			<h1>Cover foto veranderen</h1>
			<p>Hier kan je de cover foto van de homepage veranderen.</p>
		</div>
		<div class="admin-body">
			<div class="col-md-8 col-md-offset-2">
				<div class="well white admin-form">
					<form action="{{ url('/admin/websitesettings/coverphoto') }}" method="POST" enctype="multipart/form-data">
						{{ csrf_field() }}
						<div class="form-group">
							<label class="">Cover foto</label>
							<input type="file" class="form-control input-label-float" name="cover_photo">					
						</div>
						
						<div class="form-group">
							<span class="btn-ripple-wrapper"><button type="submit" class="btn-custom btn-custom-primary btn-fat">BEWERK</button></span>
							<span class="btn-ripple-wrapper"><a href="{{ URL::previous() }}" class="btn-custom btn-fat">ga terug</a></span>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="footer-buttons">
			<ul>
				<li class="custom-tooltip custom-tooltip-arrow-bottom"><a href="{{ url('') }}" class="btn-custom btn-round btn-custom-primary"><i class="fa fa-plus"></i></a><span class="tooltip-text tooltip-text-arrow-bottom">Nieuw item</span></li>
			</ul>
		</div>
	</div>

@endsection