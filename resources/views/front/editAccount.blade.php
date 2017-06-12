@extends('layouts.app')

@section('content')

	<div class="edit-account-wrapper">
		<div class="container">
			<div class="page-heading">
				<h1>Account bewerken</h1>
				<p>Hier kan je je account wijzigen.</p>
			</div>
			<div class="col-md-12 account">
				<div class="panel">
					<div class="panel-body">
						<div class="col-md-12">
							<form action="{{ url('/account', [$user->id, 'wijzigdetails']) }}" method="POST" enctype="multipart/form-data">
								{{ csrf_field() }}
								<div class="form-group">
									<label>Voornaam</label>
									<input value="{{ $user->first_name }}" placeholder="Voornaam" class="form-control" type="text" name="first_name">
								</div>
								<div class="form-group">
									<label>Achternaam</label>
									<input value="{{ $user->last_name }}" placeholder="Achternaam" class="form-control" type="text" name="last_name">
								</div>
								<div class="form-group">
									<label>Email</label>
									<input value="{{ $user->email }}" placeholder="Email" class="form-control" type="text" name="email">
								</div>
								<div class="form-group">
									<label>Verjaardag</label>
									<input value="{{ $user->birth_year }}" placeholder="Verjaardag" class="form-control" type="date" name="birth_year">
								</div>
								<div class="form-group current-cover-wrapper">
									<label class="form-control-label">Huidige profiel foto</label>
									<img class="current-cover-photo" src="{{ asset('/uploads/profilePhotos') . '/' . $user->photo }}">
								</div>
								<div class="form-group">
									<div class="new-cover-photo">
										<label>Profiel foto</label>
										<input type="file" class="form-control input-label-float" name="profile_photo">
									</div>
									<span class="btn-ripple-wrapper"><button type="button" class="btn-custom btn-custom-primary btn-fat new-cover-btn">Nieuwe profiel foto</button></span>
									<span class="btn-ripple-wrapper cancel-cover-photo"><button type="button" class="btn-custom btn-fat">Annuleer</button></span>						
								</div>
								<div class="form-group">
									<ul class="account-actions">
										<li><div class="read-more"><button class="change-account-btn">Account wijzigen</button></div></li>
										<li><div class="read-more"><a href="{{ url('/account', [$user->id]) }}">Ga terug</a></div></li>
									</ul>
								</div>
							</form>						
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection