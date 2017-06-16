@extends('layouts.admin')

@section('content')

	<div class="taplist-graphic-wrapper admin-wrapper">

		<div class="admin-header">
			<h1>Grafiek</h1>
			<p>Hier heb je een overzicht van het aantal getapte dagen van de kernleden.</p>
			<div class="chart-filter">
				<form>
					<div class="form-group input-group">
						<input type="date" value="{{ date('Y-m-d', strtotime('-7 days')) }}" class="form-control input-label-float" id="start-date"><div class="input-group-addon">-</div><input type="date" value="{{ date('Y-m-d', strtotime('+7 days')) }}" class="form-control input-label-float" id="end-date">
					</div>
					<div class="filter-info"></div>
					<button type="button" class="btn-custom btn-fat btn-custom-primary apply-chart-filter">Pas filter Toe</button>
				</form>				
			</div>
		</div>
		<div class="admin-body">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<div id="taplist-chart"></div>
					</div>
				</div>
			</div>
		</div>
	</div>

	@section('scripts')
		<script type="text/javascript" src="{{ asset('/js/taplistChart.js') }}"></script>
	@endsection

@endsection