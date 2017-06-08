@extends('layouts.admin')

@section('content')
	
	<div class="dashboard-wrapper admin-wrapper clearfix">
		<div class="dashboard col-md-12 col-lg-9">

		</div>
		<div class="action-feed-wrapper col-md-12 col-lg-3">
			<div class="action-feed-timeline">
				<!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist">
					<li role="presentation" class="active"><a href="#timeline" aria-controls="timeline" role="tab" data-toggle="tab">Tijdlijn</a></li>
				</ul>
				
				<!-- Tab panes -->
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane active" id="timeline">
						<ul id="feed">
							@foreach($activities->data as $activity)
								<li>
									<div class="timeline-panel">
										<div class="timeline-heading">
											<h4 class="timeline-title">{{ $activity->title }}</h4>
										</div>
										<div class="timeline-body">
											<p>{{ $activity->description }}</p>
											<small>
												<i class="fa fa-clock-o"></i>
												{{ $activity->lapse }}
											</small>
										</div>
									</div> 
								</li>
							@endforeach
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	@section('scripts')
		<script src="https://js.pusher.com/4.0/pusher.min.js"></script>
		<script src="{{ asset('/js/pusher.js') }}" type="text/javascript"></script>
	@endsection
@endsection