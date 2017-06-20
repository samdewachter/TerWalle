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
						<div class="form-group {{ $errors->has('first_name') ? ' has-error' : '' }}">
							<input type="text" name="first_name" value="{{ old('first_name') }}" class="form-control input-label-float <?= ($errors->has('first_name'))? 'input-error' : ''; ?>">
							<label class="label-float">Voornaam</label>
							@if ($errors->has('first_name'))
			                    <span class="help-block">
			                        <strong>{{ $errors->first('first_name') }}</strong>
			                    </span>
			                @endif
						</div>
						<div class="form-group {{ $errors->has('last_name') ? ' has-error' : '' }}">
							<input type="text" name="last_name" value="{{ old('last_name') }}" class="form-control input-label-float <?= ($errors->has('last_name'))? 'input-error' : ''; ?>">
							<label class="label-float">Achternaam</label>
							@if ($errors->has('last_name'))
			                    <span class="help-block">
			                        <strong>{{ $errors->first('last_name') }}</strong>
			                    </span>
			                @endif
						</div>
						<div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
							<input type="text" name="email" value="{{ old('email') }}" class="form-control input-label-float <?= ($errors->has('email'))? 'input-error' : ''; ?>">
							<label class="label-float">Email</label>
							@if ($errors->has('email'))
			                    <span class="help-block">
			                        <strong>{{ $errors->first('email') }}</strong>
			                    </span>
			                @endif
						</div>
						<div class="form-group {{ $errors->has('birth_year') ? ' has-error' : '' }}">
							<input type="date" name="birth_year" value="{{ old('birth_year') }}" class="form-control input-label-float <?= ($errors->has('birth_year'))? 'input-error' : ''; ?>">
							<label class="label-float label-float-date">Geboortedatum</label>
							@if ($errors->has('birth_year'))
			                    <span class="help-block">
			                        <strong>{{ $errors->first('birth_year') }}</strong>
			                    </span>
			                @endif
						</div>
						<div class="form-group">
							<label>Foto</label>
							<input type="file" class="form-control input-label-float" name="photo">							
						</div>
						<div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
							<input type="text" name="password" class="form-control input-label-float <?= ($errors->has('password'))? 'input-error' : ''; ?>">
							<label class="label-float">Paswoord</label>
							@if ($errors->has('password'))
			                    <span class="help-block">
			                        <strong>{{ $errors->first('password') }}</strong>
			                    </span>
			                @endif
						</div>
						<div class="form-group {{ $errors->has('role_id') ? ' has-error' : '' }}">
							<select name="role_id" class="form-control input-label-float <?= ($errors->has('role_id'))? 'input-error' : ''; ?>">
								@foreach($roles as $role)
									@if($role->id != 1 || Auth::user()->role_id == 1)
										<option <?= (old('role_id') == $role->id)? 'selected' : ''; ?> value="{{ $role->id }}">{{ $role->display_name }}</option>
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
							<span class="btn-ripple-wrapper"><button type="submit" class="btn-custom btn-custom-primary btn-fat">Voeg toe</button></span>
							<span class="btn-ripple-wrapper"><a href="{{ URL::previous() }}" class="btn-custom btn-fat">ga terug</a></span>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

@endsection