@extends('layouts.admin')

@section('content')
	<div class="show-groceries-wrapper admin-wrapper">
		<div class="admin-header">
			<h1><i class="fa fa-list"></i>Boodschappen</h1>
			<p>Hier heb je een overzicht van alle boodschappenlijstjes.</p>
		</div>
		<div class="admin-body clearfix">
			<div class="grid">
				@foreach($groceries as $grocery)
					<div class="grid-item--width2 grid-item">
						<div class="card bordered white">
							<div class="card-header">
								<span class="card-title" id="{{ $grocery->id . $grocery->name }}">Boodschappenlijst<?= ($grocery->done)? '<i class="fa fa-check done pull-right custom-tooltip custom-tooltip-arrow-bottom"><span class="tooltip-text tooltip-text-arrow-bottom">Gedaan!</span></i>' : '<span class="not-done pull-right custom-tooltip custom-tooltip-arrow-bottom">×<span class="tooltip-text tooltip-text-arrow-bottom">Nog niet gedaan</span></span>'; ?></span>
								<p>Tenlaatste nodig op: {{ $grocery->needed_at }}</p>
							</div>
							<div class="card-body clearfix">
								<ul>
									@foreach($grocery->Items as $item)
										<li>
											<input type="checkbox" id="{{ $item->id }}" <?= ($item->done)? 'checked' : ''; ?> class="regular-checkbox grocery-done" /><label for="{{ $item->id }}"><i class="fa fa-check"></i></label>{{ $item->quantity }} {{ $item->item }}
										</li>
									@endforeach
								</ul>
								<form class="pull-right" action="{{ url('/admin/boodschappen', [$grocery->id, 'delete']) }}" method="POST">
									{{ csrf_field() }}
									<input type="hidden" name="_method" value="DELETE" />
	                                <button class="btn-custom btn-round btn-fat btn-custom-danger"><i class="fa fa-trash"></i></button>
								</form>
								<span class="btn-ripple-wrapper pull-right"><a href="{{ url('/admin/boodschappen', [$grocery->id, 'edit']) }}" class="btn-custom btn-round btn-custom-primary btn-fat"><i class="fa fa-edit"></i></a></span>
							</div>
							<div class="card-footer admin-form clearfix">
								<form action="{{ url('admin/boodschappen', [$grocery->id, 'addItem']) }}" method="POST">
									{{ csrf_field() }}
									<div class="col-lg-3">
										<div class="form-group {{ $errors->has('quantity') ? ' has-error' : '' }}">
											<input type="number" value="{{ old('quantity') }}" class="form-control input-label-float <?= ($errors->has('quantity'))? 'input-error' : ''; ?>" name="quantity">
											<label class="label-float">Hoeveelheid</label>
											@if ($errors->has('quantity'))
						                        <span class="help-block">
						                            <strong>{{ $errors->first('quantity') }}</strong>
						                        </span>
						                    @endif
										</div>
									</div>
									<div class="col-lg-7">
										<div class="form-group {{ $errors->has('item') ? ' has-error' : '' }}">
											<input type="text" value="{{ old('item') }}" class="form-control input-label-float <?= ($errors->has('item'))? 'input-error' : ''; ?>" name="item">
											<label class="label-float">Item</label>
											@if ($errors->has('item'))
						                        <span class="help-block">
						                            <strong>{{ $errors->first('item') }}</strong>
						                        </span>
						                    @endif
										</div>
									</div>
									<div class="col-lg-2">
										<div class="form-group">
											<button class="btn-custom btn-fat btn-custom-grey">ADD</button>
										</div>
									</div>
								</form>						
							</div>
						</div>
					</div>
				@endforeach
			</div>
			
		</div>
		<div class="footer-buttons">
			<ul>
				<li class="custom-tooltip custom-tooltip-arrow-bottom"><a href="{{ url('/admin/boodschappen/add') }}" class="btn-custom btn-round btn-custom-primary"><i class="fa fa-plus"></i></a><span class="tooltip-text tooltip-text-arrow-bottom">Nieuw item</span></li>
			</ul>
		</div>
	</div>
@endsection