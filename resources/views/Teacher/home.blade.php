@extends('layouts.app')

@section('htmlheader_title')
	Home
@endsection


@section('main-content')
	<div class="container spark-screen">
		<div class="row bottom-buffer">
			<h1 class="text-center">Mine klasser</h1>
		</div>
		<div class="row">
			<div class="col-md-12">
				@foreach($user->userable->teams as $team)
						<div class="col-md-6">
							<a class="no-effect" href="hold/{{$team->id}}">
								<div class="box box-widget widget-user">
									<!-- Add the bg color to the header using any of the bg-* classes -->
									<div class="widget-user-header bg-black" style="background:  url({{asset('/img/photo1.png')}}) center center;">
										<h3 class="widget-user-username">{{$team->collection->name}}</h3>
										<h5 class="widget-user-desc"></h5>
									</div>
									<div class="widget-user-image">
										<img class="img-circle" src="{{asset('/img/user4-128x128.jpg')}}" alt="User Avatar">
									</div>
									<div class="box-footer">
										<div class="row">
											<div class="col-sm-4 border-right">
												<div class="description-block">
													<h5 class="description-header">Elever</h5>
													<span class="description-text">{{count($team->collection->name)}}</span>
												</div>
											</div>
											<!-- /.col -->
											<div class="col-sm-4 border-right">
												<div class="description-block">
													<h5 class="description-header">Aktive cases</h5>
													<span class="description-text">{{count($team->cases)}}</span>
												</div>
												<!-- /.description-block -->
											</div>
											<!-- /.col -->
											<div class="col-sm-4">
												<div class="description-block">
													<h5 class="description-header">Afsluttede cases</h5>
													<span class="description-text">0</span>
												</div>
												<!-- /.description-block -->
											</div>
											<!-- /.col -->
										</div>
									</div>
								</div>
							</a>
						</div>
				@endforeach
			</div>
		</div>
	</div>
@endsection
