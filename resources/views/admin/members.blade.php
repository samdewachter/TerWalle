@extends('layouts.admin')

@section('content')

	<div class="members-wrapper">
		<div class="admin-header">
			<h1><i class="fa fa-users"></i>Leden</h1>
			<p>Hier kan je leden verwijderen of aanpassen.</p>
		</div>
		<div class="admin-body">

			<table class="table">
				<thead>
					<tr>
						<th></th>
						<th>PHOTO</th>
						<th>NAME</th>
						<th>LAST</th>
						<th>EMAIL</th>
						<th>ACTIONS</th>
					</tr>
				</thead>
			</table>

		</div>
	</div>

@endsection