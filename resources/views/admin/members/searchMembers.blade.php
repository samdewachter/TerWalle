@extends('layouts.admin')

@section('content')

	<div class="members-wrapper">
		<div class="admin-header">
			<h1><i class="fa fa-users"></i>Leden</h1>
			<p>Hier kan je leden zoeken, aanpassen of verwijderen.</p>
		</div>
		<div class="admin-body">
			<h3 class="table-title pull-left">{{ $users->total() }} Leden gevonden op '{{ $keyword }}'</h3>
			<div class="pull-right search search-admin">
				<form action="{{ url('/admin/leden/zoeken') }}" method="GET">
					<a href="{{ url('/admin/leden') }}"><i class="fa fa-times"></i></a><i class="fa fa-search search-button"></i><input value="{{ $keyword }}" placeholder="Zoeken" class="input-label-float search-active" type="text" name="search_member">
				</form>
			</div>
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
							<td>{{ $user->Role->display_name }}</td> <!-- <a class="btn-custom-default"><i class="fa fa-edit"></i></a> -->
							<td class="text-right">
								<ul>
									<li class="custom-tooltip custom-tooltip-arrow-right"><a href="{{ url('/admin/leden', [$user->id, 'edit']) }}" class="btn-custom btn-round"><i class="fa fa-edit"></i></a><span class="tooltip-text tooltip-text-arrow-right">Aanpassen</span></li>
									<!-- <li class="custom-tooltip custom-tooltip-arrow-bottom"><a class="btn-custom btn-round"><i class="fa fa-trash"></i></a><span class="tooltip-text tooltip-text-arrow-bottom">Verwijderen</span></li> -->
									<li class="custom-tooltip custom-tooltip-arrow-bottom">
										<form action="{{ url('/admin/leden', [$user->id, 'delete']) }}" method="POST">
											{{ csrf_field() }}
											<input type="hidden" name="_method" value="DELETE" />
			                                <button class="btn-custom btn-round"><i class="fa fa-trash"></i></button><span class="tooltip-text tooltip-text-arrow-bottom">Verwijderen</span>
										</form>
									</li>
								</ul>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
			{{ $users->links() }}
			<!-- {{ $users->appends(request()->input())->links() }} -->
		</div>
	</div>

@endsection