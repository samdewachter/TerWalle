@extends('layouts.admin')

@section('content')

	<div class="presales-wrapper">
		<div class="admin-header">
			<h1><i class="fa fa-ticket"></i>Voorverkoop</h1>
			<p>Hier heb je een overzicht van alle voorverkoop mogelijkheden voor een evenement.</p>
		</div>
		<div class="admin-body">
			<h3 class="table-title pull-left">{{ $presales->total() }} Voorverkoop momenten</h3>
			<table class="table">
				<thead>
					<tr>
						<!-- <th class="table-checkbox"><input type="checkbox" id="checkbox" name=""><label class="checkbox-label" for="checkbox"></label></th> -->
						<th class="table-event">EVENT</th>
						<th class="table-deadline">DEADLINE</th>
						<th class="table-price-member">PRIJS LID</th>
						<th class="table-price-non-member">PRIJS NON LID</th>
						<th class="table-actions text-right">ACTIONS</th>
					</tr>
				</thead>
				<tbody>
					@foreach($presales as $presale)
						<tr>
							<td>{{ $presale->Event->title }}</td>
							<td>{{ $presale->deadline }}</td>
							<td>€{{ $presale->member_price }}</td>
							<td>€{{ $presale->non_member_price }}</td> <!-- <a class="btn-custom-default"><i class="fa fa-edit"></i></a> -->
							<td class="text-right">
								<ul>
									<li class="custom-tooltip custom-tooltip-arrow-bottom details-btn"><a href="{{ url('/admin/voorverkoop', [$presale->id]) }}" class="btn-custom btn-round"><i class="fa fa-info"></i></a><span class="tooltip-text tooltip-text-arrow-bottom">details</span></li>
									<li class="custom-tooltip custom-tooltip-arrow-bottom edit-btn"><a href="{{ url('/admin/voorverkoop', [$presale->id, 'edit']) }}" class="btn-custom btn-round"><i class="fa fa-edit"></i></a><span class="tooltip-text tooltip-text-arrow-bottom">Aanpassen</span></li>
									<!-- <li class="custom-tooltip custom-tooltip-arrow-bottom"><a class="btn-custom btn-round"><i class="fa fa-trash"></i></a><span class="tooltip-text tooltip-text-arrow-bottom">Verwijderen</span></li> -->
									<li class="custom-tooltip custom-tooltip-arrow-bottom">
										<form action="{{ url('/admin/voorverkoop', [$presale->id, 'delete']) }}" method="POST">
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
			<div class="text-center"> 
				{{ $presales->links() }}
			</div>
		</div>
		<div class="footer-buttons">
			<ul>
				<li class="custom-tooltip custom-tooltip-arrow-bottom"><a href="{{ url('/admin/voorverkoop/add') }}" class="btn-custom btn-round btn-custom-primary"><i class="fa fa-plus"></i></a><span class="tooltip-text tooltip-text-arrow-bottom">Nieuw item</span></li>
			</ul>
		</div>
	</div>

@endsection