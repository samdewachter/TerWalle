@extends('layouts.admin')

@section('content')

	<div class="admin-wrapper">

		<div class="admin-header">
			<h1>Evenementen</h1>
			<p>Hier heb je een overzicht van alle evenementen.</p>
		</div>
		<div class="admin-body">
			
		</div>
		<div class="footer-buttons">
			<ul>
				<li class="custom-tooltip custom-tooltip-arrow-bottom"><a href="{{ url('') }}" class="btn-custom btn-round btn-custom-primary"><i class="fa fa-plus"></i></a><span class="tooltip-text tooltip-text-arrow-bottom">Nieuw item</span></li>
				<li class="custom-tooltip custom-tooltip-arrow-bottom"><a href="{{ url('/admin/evenementen/facebook') }}" class="btn-custom btn-round btn-custom-grey"><i class="fa fa-download"></i></a><span class="tooltip-text tooltip-text-arrow-bottom">Facebook events</span></li>
			</ul>
		</div>
	</div>

@endsection