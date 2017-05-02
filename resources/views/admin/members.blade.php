@extends('layouts.admin')

@section('content')

	<div class="members-wrapper">
		<div class="admin-header">
			<h1><i class="fa fa-users"></i>Leden</h1>
			<p>Hier kan je leden zoeken, aanpassen of verwijderen.</p>
		</div>
		<div class="admin-body">
			<h3 class="table-title">{{ count($users) }} Leden</h3>
			<table class="table">
				<thead>
					<tr>
						<!-- <th class="table-checkbox"><input type="checkbox" id="checkbox" name=""><label class="checkbox-label" for="checkbox"></label></th> -->
						<th class="table-photo">PHOTO</th>
						<th class="table-name">NAME</th>
						<th class="table-last">LAST</th>
						<th class="table-email">EMAIL</th>
						<th class="table-role">ROLE</th>
						<th class="table-actions text-right">ACTIONS</th>
					</tr>
				</thead>
				<tbody>
					@foreach($users as $user)
						<tr>
							<!-- <td><input type="checkbox" id="checkbox{{ $user->id }}" name=""><label class="checkbox-label" for="checkbox{{ $user->id }}"></label></td> -->
							<td><img src="{{ asset('images/user.png') }}"></td>
							<td>{{ $user->first_name }}</td>
							<td>{{ $user->last_name }}</td>
							<td>{{ $user->email }}</td>
							<td>{{ $user->Role->display_name }}</td> <!-- <a class="btn-custom"><i class="fa fa-edit"></i></a> -->
							<td class="text-right">
								<ul>
									<li><a class="btn-custom btn-round"><i class="fa fa-edit"></i></a></li>
									<li><a class="btn-custom btn-round"><i class="fa fa-trash"></i></a></li>
								</ul>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>

		</div>
	</div>

@endsection