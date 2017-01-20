@extends('layouts.teacher')

@section('page_title', $data['course']->CourseInfo->Subject->name .' i '. $data['course']->CourseInfo->level . $data['course']->CourseInfo->track .' ('. $data['course']->CourseInfo->class_initial.')')

@section('content')

    <div id="app" class="page control" >
        <div class="box full-height left">
            <div class="box-header seperation-border" style="height: 50px;">
                <i class="fa fa-users" style="line-height: 30px; display:block;text-align:center;"></i>
            </div>
            <div class="slimScrollDiv" style="position: relative; ovreflow:hidden; width: auto;">

                <div id="student-box" class="box-body chat" style="overflow: auto; padding-right: 15px;width: auto;">

                    <studentlist course_id="{{ $data['course']->course_id }}"></studentlist>

                </div>
                <div class="slimScrollBar" style="width: 7px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 184.911px; background: rgb(0, 0, 0);"></div>
                <div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; opacity: 0.2; z-index: 90; right: 1px; background: rgb(51, 51, 51);"></div></div>
            <!-- /.chat -->
        </div>
        <div  class="container spark-screen" >
            <div class="option-panel box-header">
                <h1>{{ $data['course']->CourseInfo->Subject->name }} {{ $data['course']->CourseInfo->level }}.{{ $data['course']->CourseInfo->track }}</h1>

                @include('layouts/partials/add-button')

            </div>

            <!-- Overblik -->
            <div class="row">
                <div class="col-md-12">
                    <h1>Overblik</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <!-- Widget: user widget style 1 -->
                    <div class="box box-widget widget-user-2">
                        <div class="widget-user-header" style="background: #3c1f5e; color: #ffffff">
                            <div class="widget-user-image">
                                <i class="fa fa-thumbs-o-up info-box-fa-icon" aria-hidden="true"></i>
                            </div>
                            <!-- /.widget-user-image -->
                            <h3 class="widget-user-username" style="margin-left:52px;">Opnået mål</h3>
                            <h5 class="widget-user-desc" style="margin-left:52px;">Antal elever indenfor intervallet</h5>
                        </div>
                        <div class="box-footer no-padding">
                            <ul class="nav nav-stacked">
                                <li><a href="#">0-30 %<span class="pull-right badge bg-blue">31</span></a></li>
                                <li><a href="#">30-60 %<span class="pull-right badge bg-aqua">5</span></a></li>
                                <li><a href="#">60-100 %<span class="pull-right badge bg-green">12</span></a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- /.widget-user -->
                </div>
                <div class="col-md-4">
                    <!-- Widget: user widget style 1 -->
                    <div class="box box-widget widget-user-2">
                        <div class="widget-user-header" style="background: #3c1f5e; color: #ffffff">
                            <div class="widget-user-image">
                                <i class="fa fa-plus info-box-fa-icon" aria-hidden="true"></i>
                            </div>
                            <!-- /.widget-user-image -->
                            <h3 class="widget-user-username" style="margin-left:52px;">Sidst oprettet mål</h3>
                            <h5 class="widget-user-desc" style="margin-left:52px;">Antal elever indenfor intervallet</h5>
                        </div>
                        <div class="box-footer no-padding">
                            <ul class="nav nav-stacked">
                                <li><a href="#">0-30 dage<span class="pull-right badge bg-blue">31</span></a></li>
                                <li><a href="#">30-90 dage<span class="pull-right badge bg-aqua">5</span></a></li>
                                <li><a href="#">90< dage<span class="pull-right badge bg-green">12</span></a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- /.widget-user -->
                </div>
                <div class="col-md-4">
                    <!-- Widget: user widget style 1 -->
                    <div class="box box-widget widget-user-2">
                        <div class="widget-user-header" style="background: #3c1f5e; color: #ffffff">
                            <div class="widget-user-image">
                                <i class="fa fa-clock-o info-box-fa-icon" aria-hidden="true"></i>
                            </div>
                            <!-- /.widget-user-image -->
                            <h3 class="widget-user-username" style="margin-left:52px;">Sidst opnået mål</h3>
                            <h5 class="widget-user-desc" style="margin-left:52px;">Antal elever indenfor intervallet</h5>
                        </div>

                        <div class="box-footer no-padding">
                            <ul class="nav nav-stacked">
                                <li><a href="#">0-30 dage<span class="pull-right badge bg-blue">31</span></a></li>
                                <li><a href="#">30-90 dage<span class="pull-right badge bg-aqua">5</span></a></li>
                                <li><a href="#">90< dage<span class="pull-right badge bg-green">12</span></a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- /.widget-user -->
                </div>
            </div>
            <!-- Visning af cases -->
            <div class="row">
                <div class="col-md-12">
                    <h1>Evaluering</h1>
                </div>
            </div>
            <div class="row">

                <div class="col-lg-4- col-md-4 col-sm-6 col-xs-12">
                    <div class="box simple-box"><div class="box-body">
                            <h4 class="title">HEJ</h4>
                            <span class="text text-muted"></span>
                            <button type="button" class="btn btn-block btn-primary">Se aktivitet</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4- col-md-4 col-sm-6 col-xs-12">
                    <div class="box simple-box"><div class="box-body">
                            <h4 class="title">HEJ</h4>
                            <span class="text text-muted"></span>
                            <button type="button" class="btn btn-block btn-primary">Se aktivitet</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4- col-md-4 col-sm-6 col-xs-12">
                    <div class="box simple-box"><div class="box-body">
                            <h4 class="title">HEJ</h4>
                            <span class="text text-muted"></span>
                            <button type="button" class="btn btn-block btn-primary">Se aktivitet</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4- col-md-4 col-sm-6 col-xs-12">
                    <div class="box simple-box"><div class="box-body">
                            <h4 class="title">HEJ</h4>
                            <span class="text text-muted"></span>
                            <button type="button" class="btn btn-block btn-primary">Se aktivitet</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4- col-md-4 col-sm-6 col-xs-12">
                    <div class="box simple-box"><div class="box-body">
                            <h4 class="title">HEJ</h4>
                            <span class="text text-muted"></span>
                            <button type="button" class="btn btn-block btn-primary">Se aktivitet</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4- col-md-4 col-sm-6 col-xs-12">
                    <div class="box simple-box"><div class="box-body">
                            <h4 class="title">HEJ</h4>
                            <span class="text text-muted"></span>
                            <button type="button" class="btn btn-block btn-primary">Se aktivitet</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4- col-md-4 col-sm-6 col-xs-12">
                    <div class="box simple-box"><div class="box-body">
                            <h4 class="title">HEJ</h4>
                            <span class="text text-muted"></span>
                            <button type="button" class="btn btn-block btn-primary">Se aktivitet</button>
                        </div>
                    </div>
                </div>


                <div class="col-lg-4- col-md-4 col-sm-6 col-xs-12" v-for="task in cases">
                    <case :name="task.name" :active="task.active" :url="task.url" :date="task.created_at"></case>
                </div>
            </div>

        </div>
    </div>

@endsection