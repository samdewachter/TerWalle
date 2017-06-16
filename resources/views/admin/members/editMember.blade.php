@extends('layouts.admin')

@section('content')

	<div class="edit-member-wrapper admin-wrapper clearfix">

		<div class="admin-header">
			<h1><i class="fa fa-user"></i>{{ $user->first_name }} {{ $user->last_name }} bewerken</h1>
			<p>Hier kan je het account van {{ $user->first_name }} bewerken.</p>
		</div>
		<div class="admin-body">
			<div class="col-md-8 col-md-offset-2">
				<div class="well white admin-form">
					<form action="{{ url('/admin/leden', [$user->id, 'edit']) }}" method="POST" enctype="multipart/form-data">
						{{ csrf_field() }}
						<div class="form-group {{ $errors->has('first_name') ? ' has-error' : '' }}">
							<input type="text" name="first_name" value="{{ $user->first_name }}" class="form-control input-label-float <?= ($errors->has('first_name'))? 'input-error' : ''; ?>">
							<label class="label-float">Voornaam</label>
							@if ($errors->has('first_name'))
			                    <span class="help-block">
			                        <strong>{{ $errors->first('first_name') }}</strong>
			                    </span>
			                @endif
						</div>
						<div class="form-group {{ $errors->has('last_name') ? ' has-error' : '' }}">
							<input type="text" name="last_name" value="{{ $user->last_name }}" class="form-control input-label-float <?= ($errors->has('last_name'))? 'input-error' : ''; ?>">
							<label class="label-float">Achternaam</label>
							@if ($errors->has('last_name'))
			                    <span class="help-block">
			                        <strong>{{ $errors->first('last_name') }}</strong>
			                    </span>
			                @endif
						</div>
						<div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
							<input type="text" name="email" value="{{ $user->email }}" class="form-control input-label-float <?= ($errors->has('email'))? 'input-error' : ''; ?>">
							<label class="label-float">Email</label>
							@if ($errors->has('email'))
			                    <span class="help-block">
			                        <strong>{{ $errors->first('email') }}</strong>
			                    </span>
			                @endif
						</div>
						<div class="form-group {{ $errors->has('birth_year') ? ' has-error' : '' }}">
							<input type="date" name="birth_year" value="{{ $user->birth_year }}" class="form-control input-label-float <?= ($errors->has('birth_year'))? 'input-error' : ''; ?>">
							<label class="label-float">Geboortedatum</label>
							@if ($errors->has('birth_year'))
			                    <span class="help-block">
			                        <strong>{{ $errors->first('birth_year') }}</strong>
			                    </span>
			                @endif
						</div>
						<div class="form-group current-cover-wrapper">
							<label>Huidige foto</label>
							<img class="current-cover-photo" src="{{ asset('/uploads/profilePhotos') . '/' . $user->photo }}">
						</div>
						<div class="form-group">
							<div class="new-cover-photo">
								<label class="">Foto</label>
								<input type="file" class="form-control input-label-float" name="photo">
							</div>
							<span class="btn-ripple-wrapper"><button type="button" class="btn-custom btn-custom-primary btn-fat new-cover-btn">Nieuwe foto</button></span>
							<span class="btn-ripple-wrapper cancel-cover-photo"><button type="button" class="btn-custom btn-fat">Annuleer</button></span>						
						</div>
						<div class="form-group {{ $errors->has('role_id') ? ' has-error' : '' }}">
							<select name="role_id" class="form-control input-label-float <?= ($errors->has('role_id'))? 'input-error' : ''; ?>">
								@foreach($roles as $role)
									@if($role->id != 1 || Auth::user()->role_id == 1)
										<option value="{{ $role->id }}" <?= ($role->id == $user->role_id)? 'selected' : ''; ?>>{{ $role->display_name }}</option>
									@endif
								@endforeach
							</select>
							<label class="label-float">Role</label>
							@if ($errors->has('role_id'))
			                    <span class="help-block">
			                        <strong>{{ $errors->first('role_id') }}</strong>
			                    </span>
			                @endif
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