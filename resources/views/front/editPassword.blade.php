@extends('layouts.app')

@section('content')

	<div class="edit-password-wrapper">
		<div class="container">
			<div class="page-heading">
				<h1>Paswoord wijzigen</h1>
				<p>Hier kan je je paswoord wijzigen.</p>
			</div>
			<div class="col-md-12 account">
				<div class="panel">
					<div class="panel-body">
						<div class="col-md-12">
							<form action="{{ url('/account', [$user->id, 'wijzigpaswoord']) }}" method="POST">
								{{ csrf_field() }}
								<div class="form-group">
									<input placeholder="Nieuw paswoord" class="form-control" type="password" name="password">
								</div>
								<div class="form-group">
									<input placeholder="Nieuw paswoord herhalen" class="form-control" type="password" name="password_confirmation">
								</div>
								<div class="form-group">
									<ul class="account-actions">
										<li><div class="read-more"><button class="change-account-btn">Paswoord wijzigen</button></div></li>
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