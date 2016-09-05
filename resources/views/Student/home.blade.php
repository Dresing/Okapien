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
			@foreach($teachers as $teacher)
											<div class="col-md-12">
												<div class="box box-widget widget-user">
													<!-- Add the bg color to the header using any of the bg-* classes -->
													<div class="widget-user-header bg-black" style="background: url({{asset('/img/photo1.png')}}) center center;">
														<h3 class="widget-user-username">{{$teacher->user->name}}</h3>
														<h5 class="widget-user-desc">{{$teacher->user->email}}</h5>
													</div>
													<div class="widget-user-image">
														<img class="img-circle" src="{{asset('/img/user4-128x128.jpg')}}" alt="User Avatar">
													</div>
													<div class="box-footer">
														<div class="row">
															<div class="col-sm-4 border-right">
																<div class="description-block">
																	<h5 class="description-header">3,200</h5>
																	<span class="description-text">SALES</span>
																</div>
															</div>
															<!-- /.col -->
															<div class="col-sm-4 border-right">
																<div class="description-block">
																	<h5 class="description-header">13,000</h5>
																	<span class="description-text">FOLLOWERS</span>
																</div>
																<!-- /.description-block -->
															</div>
															<!-- /.col -->
															<div class="col-sm-4">
																<div class="description-block">
																	<h5 class="description-header">35</h5>
																	<span class="description-text">PRODUCTS</span>
																</div>
																<!-- /.description-block -->
															</div>
															<!-- /.col -->
														</div>
													</div>
												</div>
											</div>
			@endforeach
		</div>
	</div>
@endsection
