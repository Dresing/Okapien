@extends('layouts.teacher')

@section('page_title', 'Hjem')

@section('content')
	<div id="app" class="page control" >

		<div class="container spark-screen" style="margin-left:0px; width: 100%;padding-top: 75px; max-width: 2000px;">
			<div class="option-panel box-header" style="left: 0px;width: 100%">
				<h1><i class="fa fa-lg fa-fw fa-home"></i></h1>
				<span style="vertical-align: 1px;"> > Hjem</span>

				@include('layouts/partials/add-button')
			</div>

			<div class="row">
			<div class="col-md-12">
				@foreach($user->userable->teams as $team)
						<div class="col-md-6">
							<a clas	s="no-effect" href="hold/{{$team->id}}">
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
