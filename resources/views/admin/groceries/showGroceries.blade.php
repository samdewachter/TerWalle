@extends('layouts.admin')

@section('content')
	<div class="show-groceries-wrapper admin-wrapper">
		<div class="admin-header">
			<h1>Boodschappen</h1>
			<p>Hier heb je een overzicht van alle boodschappenlijstjes.</p>
		</div>
		<div class="admin-body clearfix">
			
			@foreach($groceries as $key => $grocery)
				<?= (($key % 2) == 0)? '<div class="row">' : ''; ?>
					<div class="col-lg-6 col-md-6 col-sm-12" >
						<div class="card bordered white">
							<div class="card-header">
								<span class="card-title">Boodschappenlijst<?= ($grocery->done)? '<i class="fa fa-check done pull-right custom-tooltip custom-tooltip-arrow-bottom"><span class="tooltip-text tooltip-text-arrow-bottom">Gedaan!</span></i>' : '<span class="not-done pull-right custom-tooltip custom-tooltip-arrow-bottom">×<span class="tooltip-text tooltip-text-arrow-bottom">Nog niet gedaan</span></span>'; ?></span>
								<p>{{ $grocery->needed_at }}</p>
							</div>
							<div class="card-body clearfix">
								<ul>
									@foreach($grocery->items as $item)
										<li>{{ $item }}</li>
									@endforeach
								</ul>
								<form class="pull-right" action="{{ url('/admin/boodschappen', [$grocery->id, 'delete']) }}" method="POST">
									{{ csrf_field() }}
									<input type="hidden" name="_method" value="DELETE" />
	                                <button class="btn-custom btn-round btn-fat btn-custom-danger"><i class="fa fa-trash"></i></button>
								</form>
								<span class="btn-ripple-wrapper pull-right"><a href="{{ url('/admin/boodschappen', [$grocery->id, 'edit']) }}" class="btn-custom btn-round btn-custom-primary btn-fat"><i class="fa fa-edit"></i></a></span>
							</div>
							<div class="card-footer clearfix">
								<?= ($grocery->done)? '<span class="btn-ripple-wrapper"><a href="' . url("/admin/boodschappen", [$grocery->id, "toggledone"]) . '" class="btn-custom btn-custom-danger btn-fat">not done</a></span>' : '<span class="btn-ripple-wrapper pull-right"><a href="' . url("/admin/boodschappen", [$grocery->id, "toggledone"]) . '" class="btn-custom btn-custom-success btn-fat">Done</a></span>'; ?>								
							</div>
						</div>
					</div>
				<?= (($key % 2) == 1)? '</div>' : ''; ?>
			@endforeach
			
		</div>
		<div class="footer-buttons">
			<ul>
				<li class="custom-tooltip custom-tooltip-arrow-bottom"><a href="{{ url('/admin/boodschappen/add') }}" class="btn-custom btn-round"><i class="fa fa-plus"></i></a><span class="tooltip-text tooltip-text-arrow-bottom">Nieuw item</span></li>
			</ul>
		</div>
	</div>
@endsection