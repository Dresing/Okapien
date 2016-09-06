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
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">Home</div>

					<div class="panel-body">
						@role('admin')
							Du er admin
						@endrole
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
