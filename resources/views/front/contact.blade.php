@extends('layouts.app')

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
						<form>
							<div class="input-group form-group">
								<input placeholder="Naam" class="form-control" type="text" name="name">
								<span class="input-group-addon"></span>
								<input placeholder="Email" class="form-control" type="email" name="email">
							</div>
							<div class="form-group">
								<input placeholder="Onderwerp" class="form-control" type="text" name="subject">
							</div>
							<div class="form-group">
								<textarea rows="8" placeholder="Typ uw bericht" class="form-control" name="message"></textarea>
							</div>
							<div class="form-group submit-btn">
								<button type="submit">Verzend bericht</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection