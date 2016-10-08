@extends('layouts.app')

@section('htmlheader_title')
    Home
@endsection
@section('page-style')
    <link href="{{ asset('/plugins/taginput/dist/bootstrap-tagsinput.css') }}" rel="stylesheet"  type="text/css" >
@endsection


@section('main-content')
    <div class="page control double-sidebar" >
        <div class="box full-height left">
            <div class="box-header seperation-border" style="height: 50px;">
                <i class="fa fa-users" style="line-height: 30px; display:block;text-align:center;"></i>
            </div>
            <div class="slimScrollDiv" style="position: relative; ovreflow:hidden; width: auto;"><div class="box-body chat" id="chat-box" style="overflow: auto; padding-right: 15px;width: auto;">
                    <!-- chat item -->

                    @foreach($case->team->collection->students as $student)
                    <div class="item seperation-border offline">
                        <img src="{{asset('/img/user1-128x128.jpg')}}" alt="user image"><div class="status"></div></img>

                        <p class="message">
                                        <span class="name">
                                            <a href="#">{{$student->user->name}}</a>
                                            <span class="pull-right text-muted small" style="margin-top: 5px;">11:33</span>
                                        </span>

                            4 <i class="fa fa-trophy text-blue"></i>
                        </p>
                    </div>
                    @endforeach
                    <!-- /.item -->

                </div><div class="slimScrollBar" style="width: 7px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 184.911px; background: rgb(0, 0, 0);"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; opacity: 0.2; z-index: 90; right: 1px; background: rgb(51, 51, 51);"></div></div>
            <!-- /.chat -->
        </div>

        <div class="option-panel box-header">
            <h1>{{$case->name}}</h1>
            <button  type="button" class="btn btn-block btn-success pull-right" data-toggle="modal" data-target="#newCaseModal" data-url="{{URL::to('/ajax/case/add')}}"><i class="fa fa-plus" aria-hidden="true"></i> Opret ny</button>
        </div>
        <div class="container spark-screen">
            <div class="row">
                <div class="col-lg-1 col-lg-push-11 col-md-1 col-md-push-11 col-sm-12 col-xs-12">
                    <h2 class="hidden-title" style="margin-bottom: 0px;">Indstillinger</h2>
                    <div class="box full-height right">
                        <div class="box simple-box smooth-rounding" style="padding: 5px;">
                            <div class="box-body">
                                <h3>Tags</h3>
                                <input id="tags" type="text" value="Geometri, Aritmetik" data-role="tagsinput">
                                <button type="button" class="btn btn-block btn-primary">Tilføj</button>
                            </div>
                        </div>
                        <div class="box simple-box smooth-rounding" style="padding: 5px;">
                            <div class="box-body">
                                <h3>Lektionens mål</h3>
                                <span class="text text-muted">Eleven lærer om cirkler og hvordan man udregner omkreds.</span>
                            </div>
                        </div>
                        <div class="box simple-box smooth-rounding" style="padding: 5px;">
                            <div class="box-body">
                                <span class="text text-muted"><b>22</b> ud af <b>29</b> elever har besvaret evalueringen.</span>
                                <button id="closeCase" type="button" class="btn btn-block btn-primary transition">Afslut <i class="fa fa-refresh fa-spin button-text"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-11 col-lg-pull-1 col-md-11 col-md-pull-1 col-sm-12 col-xs-12">
                    <h2 class="hidden-title" style="margin-bottom: 30px;">Besvarelser</h2>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="case-message">
                                <img src="{{asset('/img/user1-128x128.jpg')}}" class="profile-img"></img>
                                <span class="text text-muted name" style="padding: 0px 30px;margin-bottom: 5px;">Andreas Olesen</span>
                                <div class="message">
                                    <b>Det har jeg lært</b>
                                    <p>Donec cursus ante a massa vestibulum commodo. Quisque gravida sed quam vitae eleifend. Phasellus maximus purus eu bibendum gravida. Sed ut aliquam ligula. Duis congue scelerisque sapien, nec scelerisque felis volutpat vel. Donec maximus volutpat magna, at blandit tellus. Aliquam vel egestas eros, non aliquam diam. Vivamus congue sapien in nibh tristique faucibus. Quisque ultricies, massa ut pretium laoreet, mauris nibh vestibulum augue, eget mollis odio nibh sed leo. Maecenas rutrum ac purus eu scelerisque. Curabitur efficitur purus id porta faucibus. Sed a nisl neque. Pellentesque ut quam quis nunc rutrum maximus.</p>
                                    <b>Det har jeg svært ved</b>
                                    <p>Aenean pretium condimentum magna at porttitor. Pellentesque hendrerit, odio ac varius ornare, elit nulla fermentum libero, convallis egestas ante nulla a elit. Nam lacinia ac mi fringilla elementum. Cras aliquam ipsum ut neque sodales varius. Phasellus a libero eros. Sed at nibh at justo sagittis laoreet. Vestibulum at hendrerit risus. Nulla facilisi. Donec eget justo nibh.</p>
                                </div>
                                <div class="actions">
                                    <button  type="button" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i> Afvis</button>
                                    <button  type="button" class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i> Godkend</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="case-message">
                                <img src="{{asset('/img/user1-128x128.jpg')}}" class="profile-img"></img>
                                <span class="text text-muted name" style="padding: 0px 30px;margin-bottom: 5px;">Andreas Olesen</span>
                                <div class="message">
                                    <b>Det har jeg lært</b>
                                    <p>Donec cursus ante a massa vestibulum commodo. Quisque gravida sed quam vitae eleifend. Phasellus maximus purus eu bibendum gravida. Sed ut aliquam ligula. Duis congue scelerisque sapien, nec scelerisque felis volutpat vel. Donec maximus volutpat magna, at blandit tellus. Aliquam vel egestas eros, non aliquam diam. Vivamus congue sapien in nibh tristique faucibus. Quisque ultricies, massa ut pretium laoreet, mauris nibh vestibulum augue, eget mollis odio nibh sed leo. Maecenas rutrum ac purus eu scelerisque. Curabitur efficitur purus id porta faucibus. Sed a nisl neque. Pellentesque ut quam quis nunc rutrum maximus.</p>
                                    <b>Det har jeg svært ved</b>
                                    <p>Aenean pretium condimentum magna at porttitor. Pellentesque hendrerit, odio ac varius ornare, elit nulla fermentum libero, convallis egestas ante nulla a elit. Nam lacinia ac mi fringilla elementum. Cras aliquam ipsum ut neque sodales varius. Phasellus a libero eros. Sed at nibh at justo sagittis laoreet. Vestibulum at hendrerit risus. Nulla facilisi. Donec eget justo nibh.</p>
                                </div>
                                <div class="actions">
                                    <button  type="button" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i> Afvis</button>
                                    <button  type="button" class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i> Godkend</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>
    <form id="closeCaseForm">
        <input type="hidden" name="target" value="{{URL::route('api') . '/case/close'}}">
        <input type="hidden" name="caseId" value="{{$case->id}}">
        {{ csrf_field() }}
    </form>
@endsection

@section('page-scripts')
            <script src="{{ asset('/plugins/taginput/dist/typeahead.bundle.min.js') }}"></script>
            <script src="{{ asset('/plugins/taginput/dist/bootstrap-tagsinput.min.js') }}"></script>
            <script>
                var citynames = new Bloodhound({
                    datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
                    queryTokenizer: Bloodhound.tokenizers.whitespace,
                    prefetch: {
                        url: '{{URL::to('/api/test')}}',
                        filter: function(list) {
                            return $.map(list, function(cityname) {
                                return { name: cityname }; });
                        }
                    }
                });
                citynames.initialize();

                $('#tags').tagsinput({
                    typeaheadjs: {
                        name: 'citynames',
                        displayKey: 'name',
                        valueKey: 'name',
                        source: citynames.ttAdapter()
                    }
                });
                $(function() {
                    $('#closeCase').click(function(){
                        var button = $(this);
                        button.addClass('disabled thinking');
                        formPost('#closeCaseForm', {}, function(){

                            //Success
                            button.removeClass('disabled thinking');

                        }, function(){

                            //Failed
                            button.removeClass('disabled thinking');
                        });



                    });
                });
            </script>
@endsection
