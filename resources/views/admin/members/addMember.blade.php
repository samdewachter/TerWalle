@extends('layouts.admin')

@section('content')

	<div class="add-member-wrapper admin-wrapper">

		<div class="admin-header">
			<h1><i class="fa fa-user"></i>Nieuw lid toevoegen</h1>
			<p>Hier kan je een nieuw account aanmaken.</p>
		</div>
		<div class="admin-body">
			<div class="col-md-8 col-md-offset-2">
				<div class="well white admin-form">
					<form action="{{ url('/admin/leden/add') }}" method="POST" enctype="multipart/form-data">
						{{ csrf_field() }}
						<div class="form-group">
							<input type="text" name="first_name" class="form-control input-label-float">
							<label class="label-float">Voornaam</label>
						</div>
						<div class="form-group">
							<input type="text" name="last_name" class="form-control input-label-float">
							<label class="label-float">Achternaam</label>
						</div>
						<div class="form-group">
							<input type="text" name="email" class="form-control input-label-float">
							<label class="label-float">Email</label>
						</div>
						<div class="form-group">
							<input type="date" name="birth_year" class="form-control input-label-float">
							<label class="label-float label-float-date">Geboortedatum</label>
						</div>
						<div class="form-group">
							<label>Foto</label>
							<input type="file" class="form-control input-label-float" name="photo">							
						</div>
						<div class="form-group">
							<input type="text" name="password" class="form-control input-label-float">
							<label class="label-float">Paswoord</label>
						</div>
						<div class="form-group">
							<select name="role_id" class="form-control input-label-float">
								@foreach($roles as $role)
									@if($role->id != 1 || Auth::user()->role_id == 1)
										<option value="{{ $role->id }}">{{ $role->display_name }}</option>
									@endif
								@endforeach
							</select>
							<label class="label-float">Role</label>
						</div>
						<div class="form-group">
							<span class="btn-ripple-wrapper"><button type="submit" class="btn-custom btn-custom-primary btn-fat">BEWERK</button></span>
							<span class="btn-ripple-wrapper"><a href="{{ URL::previous() }}" class="btn-custom btn-fat">ga terug</a></span>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

@endsection