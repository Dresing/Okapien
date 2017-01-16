@extends('layouts.teacher')

@section('htmlheader_title')
    Hjem
@endsection

@section('content')
    <courses></courses>

    <div class="container spark-screen">
        <div class="row bottom-buffer">
            <h1 class="text-center">Mine klasser</h1>
        </div>
        <div class="row">
            <div class="col-md-12">
                @foreach($data['courses'] as $course)
                    <div class="col-md-6">
                        <a class="no-effect" href="hold/{{ $course->course_id }}">
                            <div class="box box-widget widget-user">
                                <!-- Add the bg color to the header using any of the bg-* classes -->
                                <div class="widget-user-header bg-black" style="background:  url({{asset('/img/subject/'. $course['CourseInfo']['subject']->name .'.png')}}) center center;">
                                    <h3 class="widget-user-username">{{$course['CourseInfo']['subject']->name}}: {{$course['CourseInfo']->level}}{{$course['CourseInfo']->track}}</h3>
                                    <h5 class="widget-user-desc"></h5>
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

