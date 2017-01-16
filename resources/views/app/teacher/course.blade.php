@extends('layouts.app')

@section('htmlheader_title')
    {{$team->collection->name}}
@endsection


@section('main-content')
    <div id="app" class="page control" >
        <div class="box full-height left">
            <div class="box-header seperation-border" style="height: 50px;">
                <i class="fa fa-users" style="line-height: 30px; display:block;text-align:center;"></i>
            </div>
            <div class="slimScrollDiv" style="position: relative; ovreflow:hidden; width: auto;">
                <div id="student-box" class="box-body chat" id="chat-box" style="overflow: auto; padding-right: 15px;width: auto;">
                    <div v-for="student in students">
                        <student :name="student.user.name"></student>
                    </div>
                </div>
                <div class="slimScrollBar" style="width: 7px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 184.911px; background: rgb(0, 0, 0);"></div>
                <div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; opacity: 0.2; z-index: 90; right: 1px; background: rgb(51, 51, 51);"></div></div>
            <!-- /.chat -->
        </div>
        <div  class="container spark-screen" >
            <div class="option-panel box-header">
                <h1>{{$team->collection->name}}</h1>
                <button  type="button" class="btn btn-block btn-success pull-right" data-toggle="modal" data-target="#newCaseModal" data-url="{{URL::to('/ajax/case/add')}}"><i class="fa fa-plus" aria-hidden="true"></i> Opret ny</button>
            </div>
                <h3>Aktive</h3>
                <div class="row">
                    <div class="col-lg-4- col-md-4 col-sm-6 col-xs-12" v-for="task in cases">
                        <case :name="task.name" :active="task.active" :url="task.url" :date="task.created_at"></case>
                    </div>
                </div>

        </div>
    </div>


    <div class="modal fade" id="newCaseModal" data-form="#createCaseForm" tabindex="-1" role="dialog" aria-labelledby="Ny Case" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="exampleModalLabel">New message</h4>
                </div>
                <div class="modal-body">
                    <form id="createCaseForm">
                        <div class="form-group">
                            <label id="tester" for="name" class="form-control-label">Navn: </label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-file-text-o"></i>
                                </div>
                                <input type="text" class="form-control" name="name" placeholder='Ikke angivet'>
                            </div>
                            <input type="hidden" name="teamId" value="{{$team->id}}">
                            <input type="hidden" name="target" value="{{URL::route('api') . '/case/add'}}">
                            {{ csrf_field() }}
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <div class="response"></div>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Luk</button>
                    <button type="button" class="btn btn-primary action" data-target="#newCaseModal">Opret</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal modal-danger">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Danger Modal</h4>
                </div>
                <div class="modal-body">
                    <p>One fine body…</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-outline">Save changes</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <template id="case-template" >
        <div class="box simple-box">
            <div class="box-body">
                <h4 class="title">@{{name}}</h4>
                <span class="text text-muted" >@{{date | dateFormat}}</span>
                <a type="button"  :href="url" style="display:table-caption" class="btn btn-block btn-primary">@{{buttonText}}</a>
            </div>
        </div>
    </template>
    <template id="student-template" >
        <div class="item seperation-border offline">
            <img src="{{asset('/img/user1-128x128.jpg')}}" alt="user image"><div class="status"></div></img>
            <p class="message">
                <span class="name">
                    <a href="#">@{{ name }}</a>
                    <span class="pull-right text-muted small" style="margin-top: 5px;">11:33</span>
                    </span><i class="fa fa-trophy text-blue"></i>'
                </p>
            </div>
    </template>
@endsection

@section('page-scripts')

    <script>
        Vue.component('case',{
            template: '#case-template',
            props: {
                name: {default: "test"},
                active: {default: true},
                url: {default: ""},
                date: {default: null}
            },
            computed: {
                buttonText: function () {
                    if(this.active){
                        return 'Se aktivitet';
                    }
                    return 'Se besvarelser';
                },
            },
            filters: {
                dateFormat: function (date) {
                    var date = new Date(date);
                    return  date.getDate() + '. ' + monthNames[date.getMonth()] + ' ' + date.getFullYear();
                }
            }
        });
        Vue.component('student',{
            template: '#student-template',
            props: {
                name: {default: "test"},
            }
        });

        new Vue({
            el: '#app',
            data: {
                cases: [],
                students: [],
            },
            created: function(){

                //Fetch cases
                var parameters = '?take=' + 50 + '&skip=' + 0 + '&order=' + 'desc';
                $.getJSON('{{URL::route('api') . '/case'}}' + parameters, function (response) {
                    this.cases = response['data'];
                }.bind(this));

                var parameters = '?collectionId={{$team->collection->id}}';
                $.getJSON('{{URL::route('api') . '/collection/students'}}' + parameters, function (response) {
                    this.students = response['data'];
                }.bind(this));


            },
        });

        $(function() {
            //When a new case is being added post it.
            $( "#newCaseModal .action" ).click(function() {
                modalPost(this);
            });
        });
    </script>
@endsection