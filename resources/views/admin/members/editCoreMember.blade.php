@extends('layouts.admin')

@section('content')

	<div class="edit-member-wrapper admin-wrapper clearfix">

		<div class="admin-header">
			<h1><i class="fa fa-user"></i>Details kernlid '{{ $core_member->User->first_name }} {{ $core_member->User->last_name }}'' bewerken</h1>
			<p>Hier kan je de details van {{ $core_member->User->first_name }} bewerken.</p>
		</div>
		<div class="admin-body">
			<div class="col-md-8 col-md-offset-2">
				<div class="well white admin-form">
					<form action="{{ url('/admin/kernleden', [$core_member->id, 'edit']) }}" method="POST">
						{{ csrf_field() }}
						<div class="form-group {{ $errors->has('function') ? ' has-error' : '' }}">
							<input type="text" name="function" value="{{ $core_member->function }}" class="form-control input-label-float <?= ($errors->has('function'))? 'input-error' : ''; ?>">
							<label class="label-float">Functie</label>
							@if ($errors->has('function'))
		                        <span class="help-block">
		                            <strong>{{ $errors->first('function') }}</strong>
		                        </span>
		                    @endif
						</div>
						<div class="form-group {{ $errors->has('role_id') ? ' has-error' : '' }}">
							<select name="role_id" class="form-control input-label-float <?= ($errors->has('role_id'))? 'input-error' : ''; ?>">
								@foreach($roles as $role)
									@if($role->id != 1 || Auth::user()->role_id == 1)
										<option value="{{ $role->id }}" <?= ($role->id == $core_member->User->role_id)? 'selected' : ''; ?>>{{ $role->display_name }}</option>
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