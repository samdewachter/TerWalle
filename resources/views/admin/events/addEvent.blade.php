@extends('layouts.admin')

@section('content')

	<div class="add-event-wrapper admin-wrapper">

		<div class="admin-header">
			<h1>Evenemten toeveogen</h1>
			<p>Hier kan je een evenement toevoegen</p>
		</div>
		<div class="admin-body clearfix">
			<div class="col-md-8 col-md-offset-2">	
				<div class="well white admin-form">			
					<!-- Nav tabs -->
					<ul class="nav nav-tabs" role="tablist">
						<li role="presentation" class="active"><a href="#event" aria-controls="event" role="tab" data-toggle="tab">Event</a></li>
						<li role="presentation"><a href="#fbevent" aria-controls="fbevent" role="tab" data-toggle="tab">Facebook events</a></li>
					</ul>
					
					<!-- Tab panes -->
					<div class="tab-content">
						<div role="tabpanel" class="tab-pane active" id="event">
							<form action="{{ url('/admin/evenementen/add') }}" method="POST" enctype="multipart/form-data">
								{{ csrf_field() }}
								<div class="form-group">
									<input type="text" name="title" class="form-control input-label-float">
									<label class="label-float">Titel</label>
								</div>
								<div class="form-group clearfix">
									<div class="row">
										<label class="col-md-12">Startuur</label>
										<div class="col-md-5">
											<input placeholder="Datum" class="form-control" type="text" onfocus="(this.type='date')" name="start_date">
										</div>
										<div class="col-md-2">
											<input placeholder="Uur" class="form-control" type="text" onfocus="(this.type='time')" name="start_time">
										</div>
									</div>
								</div>
								<div class="form-group clearfix">
									<div class="row">
										<label class="col-md-12">Einduur</label>
										<div class="col-md-5">
											<input placeholder="Datum" class="form-control" type="text" onfocus="(this.type='date')" name="end_date">
										</div>
										<div class="col-md-2">
											<input placeholder="Uur" class="form-control" type="text" onfocus="(this.type='time')" name="end_time">
										</div>
									</div>
								</div>
								<div class="form-group">
									<textarea rows="10" class="form-control input-label-float" name="description"></textarea>
									<label class="label-float">Beschrijving</label>
								</div>
								<div class="form-group">
									<label class="col-md-12">Publish</label>
									<input type="checkbox" id="publish_check" class="regular-checkbox publish" name="publish" /><label for="publish_check"><i class="fa fa-check"></i></label>
								</div>
								<div class="form-group">
									<label>Cover foto</label>
									<input type="file" class="form-control input-label-float" name="cover_photo">							
								</div>
							  	<div class="form-group">
									<span class="btn-ripple-wrapper"><button type="submit" class="btn-custom btn-custom-primary btn-fat">voeg toe</button></span>
									<span class="btn-ripple-wrapper"><a href="{{ url('/admin/evenementen') }}" class="btn-custom btn-fat">ga terug</a></span>
								</div>
							</form>  
						</div>
						<div role="tabpanel" class="tab-pane" id="fbevent">
							<form action="{{ url('/admin/fotos/add') }}" method="POST" enctype="multipart/form-data">
								{{ csrf_field() }}
								<div class="form-group">
									<p>Door op de download knop te drukken gaan er evenementen van Facebook gehaald worden. Eens ze zijn opgehaald heb je nog de keuze welke evenementen je wilt publishen. Evenementen die reeds zijn opgehaald van Facebook worden geen tweede maal opgehaald.</p>
								</div>
							  	<div class="form-group">
									<span class="btn-ripple-wrapper"><a href="{{ url('/admin/evenementen/facebook') }}" class="btn-custom btn-fat btn-custom-primary"><i class="fa fa-download"></i></a></span>
									<span class="btn-ripple-wrapper"><a href="{{ url('/admin/evenementen') }}" class="btn-custom btn-fat">ga terug</a></span>
								</div>
							</form>						        
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection