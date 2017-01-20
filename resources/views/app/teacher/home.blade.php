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
                @foreach($data['courses'] as $course)
                    <div class="col-md-6">
                        <a class="no-effect" href="klasse/{{ $course->course_id }}-{{$course['CourseInfo']['subject']->name}}-{{$course['CourseInfo']->level}}-{{$course['CourseInfo']->track}}">
                            <div class="box box-widget widget-user">
                                <!-- Add the bg color to the header using any of the bg-* classes -->
                                <div class="widget-user-header bg-black" style="background:  url({{asset('/img/subject/'. $course['CourseInfo']['subject']->name .'.png')}}) center center;">
                                    <h3 class="widget-user-username">{{$course['CourseInfo']['subject']->name}}</h3>
                                    <h5 class="widget-user-desc">{{$course['CourseInfo']->level}}{{$course['CourseInfo']->track}}</h5>
                                </div>

                                @foreach($course['CourseInfo']['CourseAdministration'] as $indexKey => $CourseAdministration)
                                <div class="widget-user-image" style="left: {{ 80/count($course['CourseInfo']['CourseAdministration'])*++$indexKey}}%;">
                                    <img class="img-circle"  src="{{asset('/img/user/'.$CourseAdministration['UserInfo']->id.'.jpg')}}" alt="{{ $CourseAdministration['UserInfo']->name }}">
                                </div>
                                @endforeach
                                <div class="box-footer">
                                    <div class="row">
                                        <div class="col-sm-4 border-right">
                                            <div class="description-block">
                                                <h5 class="description-header">Elever</h5>
                                                <span class="description-text">{{count($course->CourseStudents)}}</span>
                                            </div>
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-sm-4 border-right">
                                            <div class="description-block">
                                                <h5 class="description-header">Aktive cases</h5>
                                                <span class="description-text">ANTAL</span>
                                            </div>
                                            <!-- /.description-block -->
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-sm-4">
                                            <div class="description-block">
                                                <h5 class="description-header">Afsluttede cases</h5>
                                                <span class="description-text">ANTAL</span>
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

