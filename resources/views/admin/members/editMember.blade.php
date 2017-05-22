@extends('layouts.admin')

@section('content')

	<div class="edit-member-wrapper admin-wrapper">

		<div class="admin-header">
			<h1><i class="fa fa-user"></i>{{ $user->first_name }} {{ $user->last_name }} bewerken</h1>
			<p>Hier kan je het account van {{ $user->first_name }} bewerken.</p>
		</div>
		<div class="admin-body">
		<div class="col-md-8 col-md-offset-2">
			<div class="well white admin-form">
				<form action="{{ url('/admin/leden', [$user->id, 'edit']) }}" method="POST">
					{{ csrf_field() }}
					<div class="form-group">
						<input type="text" name="first_name" value="{{ $user->first_name }}" class="form-control input-label-float">
						<label class="label-float">Voornaam</label>
					</div>
					<div class="form-group">
						<input type="text" name="last_name" value="{{ $user->last_name }}" class="form-control input-label-float">
						<label class="label-float">Achternaam</label>
					</div>
					<div class="form-group">
						<input type="text" name="email" value="{{ $user->email }}" class="form-control input-label-float">
						<label class="label-float">Email</label>
					</div>
					<div class="form-group">
						<input type="text" name="birth_year" value="{{ $user->birth_year }}" class="form-control input-label-float">
						<label class="label-float">Geboortedatum</label>
					</div>
					<div class="form-group">
						<input type="text" name="photo" value="{{ $user->photo }}" class="form-control input-label-float">
						<label class="label-float">Foto</label>
					</div>
					<div class="form-group">
						<select name="role_id" class="form-control input-label-float">
							@foreach($roles as $role)
								@if($role->id != 1 || Auth::user()->role_id == 1)
									<option value="{{ $role->id }}" <?= ($role->id == $user->role_id)? 'selected' : ''; ?>>{{ $role->display_name }}</option>
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

@endsection