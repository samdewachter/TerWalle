@extends('layouts.admin')

@section('content')

	<div class="reports-wrapper admin-wrapper">
		<div class="admin-header">
			<h1><i class="fa fa-upload"></i>Verslagen</h1>
			<p>Hier heb je een overzicht van alle verslagen.</p>
		</div>
		<div class="admin-body">
			<div class="core-reports row">
				<h3>Kernverslagen <a href="{{ url('/admin/verslagen/kernverslag/all') }}">Bekijk alle kernverslagen</a></h3>
				@foreach($core_reports as $core_report)
					<div class="col-md-6 col-lg-3 report core-report">
						<div class="card bordered white">
							<div class="card-body">
								<div class="card-body-header">										
									{{ $core_report->name }}: <span class="report-date">{{ $core_report->date }}</span>
								</div>
								<div class="card-body-hover">
									<div class="hover-footer">
										<ul>
											<li>
												<span class="btn-ripple-wrapper"><a href="{{ url('/admin/verslagen', [$core_report->id, 'edit']) }}" class="btn-custom btn-round btn-custom-primary btn-fat"><i class="fa fa-edit"></i></a></span>
											</li>
											<li>
												<span class="btn-ripple-wrapper"><a href="{{ url('/admin/verslagen', [$core_report->id, 'download']) }}" class="btn-custom btn-round btn-custom-grey btn-fat"><i class="fa fa-download"></i></a></span>
											</li>
											<li>
												<form action="{{ url('/admin/verslagen', [$core_report->id, 'delete']) }}" method="POST">
													{{ csrf_field() }}
													<input type="hidden" name="_method" value="DELETE" />
					                                <span class="btn-ripple-wrapper"><button type="submit" class="btn-custom btn-round btn-fat btn-custom-danger"><i class="fa fa-trash"></i></button></span>
												</form>
											</li>
										</ul>
									</div>
								</div>
								<img class="report-photo" src="{{ asset('images/wordlogo.png') }}">
							</div>
						</div>
					</div>
				@endforeach
			</div>
			<div class="activity-reports row">
				<h3>Activiteitenverslagen <a href="{{ url('/admin/verslagen/activiteitenverslag/all') }}">Bekijk alle activiteitenverslagen</a></h3>
				@foreach($activity_reports as $activity_report)
					<div class="col-md-6 col-lg-3 report activity-report">
						<div class="card bordered white">
							<div class="card-body">
								<div class="card-body-header">										
									{{ $activity_report->name }}: <span class="report-date">{{ $activity_report->date }}</span>
								</div>
								<div class="card-body-hover">
									<div class="hover-footer">
										<ul>
											<li>
												<span class="btn-ripple-wrapper"><a href="{{ url('/admin/verslagen', [$activity_report->id, 'edit']) }}" class="btn-custom btn-round btn-custom-primary btn-fat"><i class="fa fa-edit"></i></a></span>
											</li>
											<li>
												<span class="btn-ripple-wrapper"><a href="{{ url('/admin/verslagen', [$activity_report->id, 'download']) }}" class="btn-custom btn-round btn-custom-grey btn-fat"><i class="fa fa-download"></i></a></span>
											</li>
											<li>
												<form action="{{ url('/admin/verslagen', [$activity_report->id, 'delete']) }}" method="POST">
													{{ csrf_field() }}
													<input type="hidden" name="_method" value="DELETE" />
					                                <span class="btn-ripple-wrapper"><button type="submit" class="btn-custom btn-round btn-fat btn-custom-danger"><i class="fa fa-trash"></i></button></span>
												</form>
											</li>
										</ul>
									</div>
								</div>
								<img class="report-photo" src="{{ asset('images/wordlogo.png') }}">
							</div>
						</div>
					</div>
				@endforeach
			</div>
			<div class="other-reports row">
				<h3>Andere verslagen <a href="{{ url('/admin/verslagen/ander/all') }}">Bekijk alle andere verslagen</a></h3>
				@foreach($other_reports as $other_report)
					<div class="col-md-6 col-lg-3 report other-report">
						<div class="card bordered white">
							<div class="card-body">
								<div class="card-body-header">										
									{{ $other_report->name }}: <span class="report-date">{{ $other_report->date }}</span>
								</div>
								<div class="card-body-hover">
									<div class="hover-footer">
										<ul>
											<li>
												<span class="btn-ripple-wrapper"><a href="{{ url('/admin/verslagen', [$other_report->id, 'edit']) }}" class="btn-custom btn-round btn-custom-primary btn-fat"><i class="fa fa-edit"></i></a></span>
											</li>
											<li>
												<span class="btn-ripple-wrapper"><a href="{{ url('/admin/verslagen', [$other_report->id, 'download']) }}" class="btn-custom btn-round btn-custom-grey btn-fat"><i class="fa fa-download"></i></a></span>
											</li>
											<li>
												<form action="{{ url('/admin/verslagen', [$other_report->id, 'delete']) }}" method="POST">
													{{ csrf_field() }}
													<input type="hidden" name="_method" value="DELETE" />
					                                <span class="btn-ripple-wrapper"><button type="submit" class="btn-custom btn-round btn-fat btn-custom-danger"><i class="fa fa-trash"></i></button></span>
												</form>
											</li>
										</ul>
									</div>
								</div>
								<img class="report-photo" src="{{ asset('images/wordlogo.png') }}">
							</div>
						</div>
					</div>
				@endforeach
			</div>
		</div>
		<div class="footer-buttons">
			<ul>
				<li class="custom-tooltip custom-tooltip-arrow-bottom"><a href="{{ url('/admin/verslagen/add') }}" class="btn-custom btn-round btn-custom-primary"><i class="fa fa-plus"></i></a><span class="tooltip-text tooltip-text-arrow-bottom">Nieuw item</span></li>
			</ul>
		</div>
	</div>
@endsection