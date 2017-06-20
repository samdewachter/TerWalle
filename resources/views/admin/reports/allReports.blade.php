@extends('layouts.admin')

@section('content')

	<div class="admin-wrapper all-reports-wrapper">
		<div class="admin-header">
			<h1>{{ $kind_of_report }}</h1>
			<p>Hier vind je alle {{ $kind_of_report }} terug.</p>
		</div>
		<div class="admin-body">
			<div class="reports">
				@foreach($reports as $report)
					<div class="col-md-6 col-lg-3 report core-report">
						<div class="card bordered white">
							<div class="card-body">
								<div class="card-body-header">										
									{{ $report->name }}: <span class="report-date">{{ $report->date }}</span>
								</div>
								<div class="card-body-hover">
									<div class="hover-footer">
										<ul>
											<li>
												<span class="btn-ripple-wrapper"><a href="{{ url('/admin/verslagen', [$report->id, 'edit']) }}" class="btn-custom btn-round btn-custom-primary btn-fat"><i class="fa fa-edit"></i></a></span>
											</li>
											<li>
												<span class="btn-ripple-wrapper"><a href="{{ url('/admin/verslagen', [$report->id, 'download']) }}" class="btn-custom btn-round btn-custom-grey btn-fat"><i class="fa fa-download"></i></a></span>
											</li>
											<li>
												<form action="{{ url('/admin/verslagen', [$report->id, 'delete']) }}" method="POST">
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
	</div>

@endsection