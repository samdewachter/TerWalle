@extends('layouts.app')

@section('meta')

	<meta name="description" content="Hier heb je een overzicht van de kernleden die op deze moment in het jeugdhuis zitten.">
	<title>Ter Walle | Kernleden</title>

@endsection

@section('content')

	<div class="core-members-wrapper">
		<div class="container">
			<div class="page-heading">
				<h1>Kernleden</h1>
				<p>Een overzicht van de kernleden</p>
			</div>
			<div class="grid">
				@foreach($core_members as $core_member)
					<div class="core-member grid-item">
						<div class="panel">
							<div class="panel-body">
								<img src="{{ asset('/uploads/profilePhotos/' . $core_member->User->photo) }}">
								<h3>{{ $core_member->User->first_name . ' ' .$core_member->User->last_name }}</h3>
								<p>{{ $core_member->function }}</p>
							</div>
						</div>
					</div>
				@endforeach
			</div>
		</div>
	</div>

@endsection