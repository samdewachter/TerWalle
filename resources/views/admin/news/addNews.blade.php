@extends('layouts.admin')

@section('content')

	<div class="add-news-wrapper admin-wrapper">

		<div class="admin-header">
			<h1>Nieuwtje toevoegen</h1>
			<p></p>
		</div>
		<div class="admin-body">
			<div class="col-md-8 col-md-offset-2">
				<div class="well white admin-form">
					<form action="{{ url('/admin/nieuwtjes/add') }}" method="POST" enctype="multipart/form-data">
						{{ csrf_field() }}
						<div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
							<input type="text" name="title" value="{{ old('title') }}" class="form-control input-label-float <?= ($errors->has('title'))? 'input-error' : ''; ?>">
							<label class="label-float ">Titel</label>
							@if ($errors->has('title'))
				                <span class="help-block">
				                    <strong>{{ $errors->first('title') }}</strong>
				                </span>
				            @endif
						</div>
						<div class="form-group {{ $errors->has('subtitle') ? ' has-error' : '' }}">
							<textarea rows="5" class="form-control input-label-float <?= ($errors->has('subtitle'))? 'input-error' : ''; ?>" name="subtitle">{{ old('subtitle') }}</textarea>
							<label class="label-float">Sub titel</label>
							@if ($errors->has('subtitle'))
				                <span class="help-block">
				                    <strong>{{ $errors->first('subtitle') }}</strong>
				                </span>
				            @endif
						</div>
						<div class="form-group {{ $errors->has('text') ? ' has-error' : '' }}">
							<textarea rows="10" class="form-control input-label-float <?= ($errors->has('text'))? 'input-error' : ''; ?>" name="text">{{ old('text') }}</textarea>
							<label class="label-float">Tekst</label>
							@if ($errors->has('text'))
				                <span class="help-block">
				                    <strong>{{ $errors->first('text') }}</strong>
				                </span>
				            @endif
						</div>
						<div class="form-group {{ $errors->has('cover_photo') ? ' has-error' : '' }}">
							<label class="">Cover foto</label>
							<input type="file" class="form-control input-label-float <?= ($errors->has('cover_photo'))? 'input-error' : ''; ?>" name="cover_photo">	
							@if ($errors->has('cover_photo'))
				                <span class="help-block">
				                    <strong>{{ $errors->first('cover_photo') }}</strong>
				                </span>
				            @endif						
						</div>
						<div class="form-group">
							<label class="col-md-12">Publish</label>
							<input type="checkbox" id="publish_check" class="regular-checkbox publish" name="publish" /><label for="publish_check"><i class="fa fa-check"></i></label>
						</div>
						<div class="form-group">
							<span class="btn-ripple-wrapper"><button type="submit" class="btn-custom btn-custom-primary btn-fat">voeg toe</button></span>
							<span class="btn-ripple-wrapper"><a href="{{ URL::previous() }}" class="btn-custom btn-fat">ga terug</a></span>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

@endsection