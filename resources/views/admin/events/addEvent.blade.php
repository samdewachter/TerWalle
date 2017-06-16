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
								<div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
									<input type="text" name="title" value="{{ old('title') }}" class="form-control input-label-float <?= ($errors->has('title'))? 'input-error' : ''; ?>">
									<label class="label-float">Titel</label>
									@if ($errors->has('title'))
				                        <span class="help-block">
				                            <strong>{{ $errors->first('title') }}</strong>
				                        </span>
				                    @endif
								</div>
								<div class="form-group {{ $errors->has('start_date') ? ' has-error' : '' }} {{ $errors->has('start_time') ? ' has-error' : '' }} clearfix">
									<div class="row">
										<label class="col-md-12">Startuur</label>
										<div class="col-md-5">
											<input placeholder="Datum" value="{{ old('start_date') }}" class="form-control <?= ($errors->has('start_date'))? 'input-error' : ''; ?>" type="text" onfocus="(this.type='date')" name="start_date">
											@if ($errors->has('start_date'))
						                        <span class="help-block">
						                            <strong>{{ $errors->first('start_date') }}</strong>
						                        </span>
						                    @endif
										</div>
										<div class="col-md-2">
											<input placeholder="Uur" value="{{ old('start_time') }}" class="form-control <?= ($errors->has('start_time'))? 'input-error' : ''; ?>" type="text" onfocus="(this.type='time')" name="start_time">
											@if ($errors->has('start_time'))
						                        <span class="help-block">
						                            <strong>{{ $errors->first('start_time') }}</strong>
						                        </span>
						                    @endif
										</div>
									</div>
								</div>
								<div class="form-group {{ $errors->has('end_date') ? ' has-error' : '' }} {{ $errors->has('end_time') ? ' has-error' : '' }} clearfix">
									<div class="row">
										<label class="col-md-12">Einduur</label>
										<div class="col-md-5">
											<input placeholder="Datum" value="{{ old('end_date') }}" class="form-control <?= ($errors->has('end_date'))? 'input-error' : ''; ?>" type="text" onfocus="(this.type='date')" name="end_date">
											@if ($errors->has('end_date'))
						                        <span class="help-block">
						                            <strong>{{ $errors->first('end_date') }}</strong>
						                        </span>
						                    @endif
										</div>
										<div class="col-md-2">
											<input placeholder="Uur" value="{{ old('end_time') }}" class="form-control <?= ($errors->has('end_time'))? 'input-error' : ''; ?>" type="text" onfocus="(this.type='time')" name="end_time">
											@if ($errors->has('end_time'))
						                        <span class="help-block">
						                            <strong>{{ $errors->first('end_time') }}</strong>
						                        </span>
						                    @endif
										</div>
									</div>
								</div>
								<div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
									<textarea rows="10" class="form-control input-label-float <?= ($errors->has('description'))? 'input-error' : ''; ?>" name="description">{{ old('description') }}</textarea>
									<label class="label-float">Beschrijving</label>
									@if ($errors->has('description'))
				                        <span class="help-block">
				                            <strong>{{ $errors->first('description') }}</strong>
				                        </span>
				                    @endif
								</div>
								<div class="form-group">
									<label class="col-md-12">Publish</label>
									<input type="checkbox" id="publish_check" class="regular-checkbox publish" name="publish" /><label for="publish_check"><i class="fa fa-check"></i></label>
								</div>
								<div class="form-group {{ $errors->has('cover_photo') ? ' has-error' : '' }}">
									<label>Cover foto</label>
									<input type="file" class="form-control input-label-float <?= ($errors->has('cover_photo'))? 'input-error' : ''; ?>" name="cover_photo">	
									@if ($errors->has('cover_photo'))
				                        <span class="help-block">
				                            <strong>{{ $errors->first('cover_photo') }}</strong>
				                        </span>
				                    @endif						
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