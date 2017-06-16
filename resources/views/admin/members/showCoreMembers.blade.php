@extends('layouts.admin')

@section('content')

	<div class="core-members-wrapper admin-wrapper">

		<div class="admin-header">
			<h1>Kernleden</h1>
			<p>Een overzicht van de kernleden.</p>
		</div>
		<div class="admin-body">
			@foreach($core_members as $core_member)
				<div class="col-lg-6">
					<div class="card core-member">
						<div class="card-body clearfix">
							<div class="col-md-4">
								<img class="pull-left" src="{{ asset('/uploads/profilePhotos/' . $core_member->User->photo) }}">
							</div>
							<div class="col-md-8">
								<p><strong>Naam</strong>: {{ $core_member->User->first_name . ' ' . $core_member->User->last_name }}</p>
								<p><strong>Functie</strong>: {{ $core_member->function }}</p>
							</div>
						</div>
						<div class="action-buttons">
							<span class="btn-ripple-wrapper"><a class="btn-custom btn-custom-primary btn-fat" href="{{ url('/admin/kernleden', [$core_member->id, 'edit']) }}"><i class="fa fa-edit"></i></a>
						</div>
					</div>
				</div>
			@endforeach
		</div>
	</div>

@endsection