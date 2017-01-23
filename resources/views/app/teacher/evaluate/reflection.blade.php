@extends('layouts.teacher')

@section('page_title', $data['edit'] ? 'Ændring af Refleksion' : 'Opret ny refleksion')

@section('content')
    <div id="app" class="page control" >

        <div class="container spark-screen" style="margin-left:0px; width: 100%;padding-top: 75px; max-width: 2000px;">
            <div class="option-panel box-header" style="left: 0px;width: 100%">
                <h1><i class="fa fa-lg fa-fw fa-th"></i></h1>
                <span style="vertical-align: 1px;"> > Reflektion</span>
                @if ($data['edit'])
                     > Ændring af Refleksion
                @else
                    > Opret ny refleksion
                @endif

                @include('layouts/partials/add-button')
            </div>

        <div class="row">
            <div class="col-md-12">
                <!-- Overblik -->
                <div class="row">

                    <div class="col-md-8">
                        <!-- Widget: user widget style 1 -->
                        <div class="box box-widget widget-user-2">
                            <div class="widget-user-header" style="background: #3c1f5e; color: #ffffff">
                                <div class="widget-user-image">
                                    <i class="fa fa-thumbs-o-up info-box-fa-icon" aria-hidden="true"></i>
                                </div>
                                <!-- /.widget-user-image -->
                                <h3 class="widget-user-username" style="margin-left:52px;">Reflektion</h3>
                                <h5 class="widget-user-desc" style="margin-left:52px; height: 15px"></h5>
                            </div>
                            <div class="box-footer no-padding">

                                <div class="box-body">
                                    @if ($data['edit'])

                                    @else


                                    @endif

                                    <div class="form-group">
                                        <label for="name">Navn på evaluering</label>
                                        <input type="text" class="form-control" id="name" placeholder="Navn på evaluering">
                                    </div>
                                    <div class="form-group">
                                        <label for="learning">Lektionens mål</label>
                                        <textarea class="form-control"  id="learning" rows="3" placeholder="Vi skal arbejde med ..."></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="tags">Tags</label>
                                        <select multiple="multiple" class="form-control" type="text" id="tags">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </div>

                                </div>
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
                                <h3 class="widget-user-username" style="margin-left:52px;">Opsætning</h3>
                                <h5 class="widget-user-desc" style="margin-left:52px;">for evalueringen</h5>
                            </div>
                            <div class="box-footer no-padding">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="course">Klasse</label>
                                        <select multiple="multiple" class="form-control" type="text" id="course">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="subject">Fag</label>
                                        <select multiple="multiple" class="form-control" type="text" id="subject">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="deadline">Deadline</label>
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" class="form-control pull-right" id="datepicker">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.widget-user -->
                    </div>

                </div>


                <div class="row">
                    <div class="col-md-12 center-block text-right">
                        <button type="submit" class="btn btn-success">
                            <i class="fa fa-save"></i>
                            {{ $data['edit'] ? 'Gem ændringer' : 'Udgiv' }}
                        </button>
                        <a href="test" class="btn btn-warning">
                            <i class="fa fa-arrow-left" aria-hidden="true"></i>
                            Annuller
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('after-scripts-end')
    <script type="text/javascript">
        $('select').select2({
            placeholder: "Søg og vælg fra listen"
        });
        //Date picker
        $('#datepicker').datepicker({
            days: ["Søndag", "Mandag", "Tirsdag", "Onsdag", "Torsdag", "Fredag", "Lørdag"],
            daysShort: ["Søn", "Man", "Tir", "Ons", "Tor", "Fre", "Lør"],
            daysMin: ["Sø", "Ma", "Ti", "On", "To", "Fr", "Lø"],
            months: ["Januar", "Februar", "Marts", "April", "Maj", "Juni", "Juli", "August", "September", "Oktober", "November", "December"],
            monthsShort: ["Jan", "Feb", "Mar", "Apr", "Maj", "Jun", "Jul", "Aug", "Sep", "Okt", "Nov", "Dec"],
            today: "I Dag",
            clear:"Nulstil",
            format:"dd-mm-yyyy",
            weekStart: 1,
            todayBtn: true,
            orientation: "bottom auto",
            daysOfWeekHighlighted: "1,2,3,4,5",
            calendarWeeks: true,
            todayHighlight: true,
            autoclose: true
        });
    </script>
@endsection



