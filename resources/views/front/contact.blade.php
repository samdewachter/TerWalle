@extends('layouts.app')

@section('meta')

	<meta name="description" content="Heb je vragen in verband met ons jeugdhuis? Stel ze dan gerust op deze pagina!">
	<title>Ter Walle | Contact</title>

@endsection

@section('content')

	<div class="contact-wrapper clearfix">
		<div class="col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
			<div class="contact-header">
				<h1>Contacteer ons</h1>
				<p>Als je vragen hebt over het jeugdhuis, stuur ons dan!</p>
			</div>
			<div class="contact-body">
				<div class="panel">
					<div class="panel-body">
						<form action="{{ url('/contact') }}" method="POST">
							{{ csrf_field() }}
							<div class="input-group form-group {{ $errors->has('name') ? ' has-error' : '' }} {{ $errors->has('email') ? ' has-error' : '' }}">
								<input placeholder="Naam" value="{{ old('name') }}" class="form-control <?= ($errors->has('name'))? 'input-error' : ''; ?>" type="text" name="name">
								@if ($errors->has('name'))
				                    <span class="help-block">
				                        <strong>{{ $errors->first('name') }}</strong>
				                    </span>
				                @endif
								<span class="input-group-addon"></span>
								<input placeholder="Email" value="{{ old('email') }}" class="form-control <?= ($errors->has('email'))? 'input-error' : ''; ?>" type="email" name="email">
								@if ($errors->has('email'))
				                    <span class="help-block">
				                        <strong>{{ $errors->first('email') }}</strong>
				                    </span>
				                @endif
							</div>
							<div class="form-group {{ $errors->has('subject') ? ' has-error' : '' }}">
								<input placeholder="Onderwerp" value="{{ old('subject') }}" class="form-control <?= ($errors->has('subject'))? 'input-error' : ''; ?>" type="text" name="subject">
								@if ($errors->has('subject'))
				                    <span class="help-block">
				                        <strong>{{ $errors->first('subject') }}</strong>
				                    </span>
				                @endif
							</div>
							<div class="form-group {{ $errors->has('subject') ? ' has-error' : '' }}">
								<textarea rows="8" placeholder="Typ uw bericht" class="form-control <?= ($errors->has('subject'))? 'input-error' : ''; ?>" name="message">{{ old('subject') }}</textarea>
								@if ($errors->has('subject'))
				                    <span class="help-block">
				                        <strong>{{ $errors->first('subject') }}</strong>
				                    </span>
				                @endif
							</div>
							<div class="form-group submit-btn">
								<button type="submit">Verzend bericht</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="page-heading">
				<h1>Ligging</h1>
				<p>Kattestraat 47, 9150 Kruibeke</p>
			</div>
			
		</div>
	</div>
<div id="map"></div>
	
    <script>
      var map;
      function initMap() {
      	var myLatLng = {lat: 51.17204, lng: 4.305032};
        map = new google.maps.Map(document.getElementById('map'), {
          center: myLatLng,
          zoom: 15
        });

        var marker = new google.maps.Marker({
          position: myLatLng,
          map: map,
          title: 'Kattestraat 47, 9150 Kruibeke'
        });
      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDSk4jsiXRNMgyDd5C0AFHhTPdaJLm7yCQ&callback=initMap"
    async defer></script>

	@section('scripts')
<!-- 
		<script type="text/javascript">
			function myMap() {
			    var mapOptions = {
			        center: new google.maps.LatLng(51.5, -0.12),
			        zoom: 10,
			        mapTypeId: google.maps.MapTypeId.HYBRID
			    }
			var map = new google.maps.Map(document.getElementById("map"), mapOptions);
			}
		</script>

		<scrip -->t src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDSk4jsiXRNMgyDd5C0AFHhTPdaJLm7yCQ&callback=myMap"></script>
	@endsection
@endsection