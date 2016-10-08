@extends('layouts.app')

@section('htmlheader_title')
    {{$team->collection->name}}
@endsection


@section('main-content')
    <div class="page no-control" >
        <div class="container spark-screen">
            <h3>Aktive</h3>
            <div class="row">

                @foreach($team->cases->filter(function($case){return $case->active;})->sortByDesc('created_at') as $case)
                    <div class="col-lg-4- col-md-4 col-sm-6 col-xs-12">
                        <div class="box simple-box">
                            <div class="box-body">
                                <h4 class="title">{{$case->name}}</h4>
                                <span class="text text-muted">{{$case->created_at->format('d. F Y')}}</span>
                                <button onclick='location.href="{{$case->uniquecase->getUrl()}}"' type="button" class="btn btn-block btn-primary">Se aktivitet</button>
                            </div>
                        </div>
                    </div>

                @endforeach
            </div>
            <h3>Afslutede</h3>
            <div class="row">
                @foreach($team->cases->reject(function($case){return $case->active;})->sortByDesc('created_at') as $case)
                    <div class="col-lg-4- col-md-4 col-sm-6 col-xs-12">
                        <div class="box simple-box">
                            <div class="box-body">
                                <h4 class="title">{{$case->name}}</h4>
                                <span class="text text-muted">11. december 2016</span>
                                <button onclick='location.href="{{$case->uniquecase->getUrl()}}"' type="button" class="btn btn-block btn-primary">Se case</button>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>



            </div>
        </div>
    </div>




@endsection

@section('page-scripts')

@endsection