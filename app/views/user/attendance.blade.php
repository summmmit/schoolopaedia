@extends('layouts.user-main-layout')

@section('stylesheets')
<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/plugins/calendario/css/calendar.css'); }}" />
<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/plugins/calendario/css/custom_2.css'); }}" />
@stop

@section('page_header')
<h1><i class="fa fa-pencil-square"></i>Home</h1>
@stop

@section('page_breadcrumb')
<ol class="breadcrumb">
    <li>
        <a href="#">
            Dashboard
        </a>
    </li>
    <li class="active">
        Home
    </li>
</ol>
@stop

@section('content')
<div class="row">
    <div class="col-md-12"><!-- Some Message to be Displayed start-->
        @if(Session::has('global'))
        <div class="alert alert-info">
            <i class="fa fa-remove-sign"></i>{{ Session::get('global') }}
        </div>
        @endif 
        @if ($errors->has())
        <div class="errorHandler alert alert-danger">
            @foreach ($errors->all() as $error)
            {{ $error }}<br>        
            @endforeach
        </div>
        @endif
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <!-- start: FULL CALENDAR PANEL -->
        <div class="panel panel-default" style="background: #f9f9f9 url({{ URL::asset('assets/plugins/calendario/images/bg.jpg'); }});">
            <div class="panel-body">
                <section class="main">
                    <div class="custom-calendar-wrap">
                        <div id="custom-inner" class="custom-inner">
                            <div class="custom-header clearfix">
                                <nav>
                                    <span id="custom-prev" class="custom-prev"></span>
                                    <span id="custom-next" class="custom-next"></span>
                                </nav>
                                <h2 id="custom-month" class="custom-month"></h2>
                                <h3 id="custom-year" class="custom-year no-margin"></h3>
                            </div>
                            <div id="calendar" class="fc-calendar-container"></div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <!-- end: FULL CALENDAR PANEL -->
    </div>
    <div class="col-sm-6">
        <div class="panel panel-bricky">
            <div class="panel-heading border-light">
                <h4 class="panel-title">Your <span class="text-bold">Attendances</span></h4>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="space20 padding-5 border-bottom border-light">
                            <h4 class="pull-left no-margin space5">This Week: </h4>
                            <span class="pull-right">(5/5) 100%</span>
                            <div class="clearfix"></div>
                        </div>
                        <div class="space20 padding-5 border-bottom border-light">
                            <h4 class="pull-left no-margin space5">This Month: </h4>
                            <span class="pull-right">(30/30) 100%</span>
                            <div class="clearfix"></div>
                        </div>
                        <div class="space20 padding-5 border-bottom border-light">
                            <h4 class="pull-left no-margin space5">This Year: </h4>
                            <span class="pull-right">(30/30) 100%</span>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel-footer partition-white">
                <div class="clearfix padding-5 space5">
                    <div class="col-xs-12 text-center no-padding">
                        <a href="#">
                            <span class="text-bold block text-extra-large">Report To Teacher About Your attendance</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                Leave Application
            </div>
            <div class="panel-body">
                <p class="text-center">
                    You Don't Have Any leave Applications.
                </p>
                <p class="pull-right">                    
                    <a href="#new-leave-application" class="btn btn-sm btn-transparent-white new-event"><i class="fa fa-plus"></i> New Leave Application </a>
                </p>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                Leave Application <span class="text-bold text-right">Accepted</span>
            </div>
            <div class="panel-body">
                <p class="text-center">
                    You Don't Have Any leave Applications.
                </p>
                <p class="pull-right">                    
                    <a href="#new-leave-application" class="btn btn-sm btn-transparent-white new-event"><i class="fa fa-plus"></i> New Leave Application </a>
                </p>
            </div>
        </div>
    </div>
</div>
@stop
@section('subview')
<!-- *** NEW EVENT *** -->
<div id="new-leave-application">
    <div class="noteWrap col-md-8 col-md-offset-2">
        <h3>Add new event</h3>
        <form action="#" method="post">
            <div class="row">
                <div class="col-md-12">
                    <h2>Choose Date Range..</h2>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <input type="checkbox" class="all-day" data-label-text="All-Day" data-on-text="True" data-off-text="False">
                    </div>
                </div>
                <div class="no-all-day-range">
                    <div class="col-md-8">
                        <div class="form-group">
                            <div class="form-group">
                                <span class="input-icon">
                                    <input type="text" class="event-range-date form-control" name="eventRangeDate" placeholder="Range date"/>
                                    <i class="fa fa-clock-o"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="all-day-range">
                    <div class="col-md-8">
                        <div class="form-group">
                            <div class="form-group">
                                <span class="input-icon">
                                    <input type="text" class="event-range-date form-control" name="ad_eventRangeDate" placeholder="Range date"/>
                                    <i class="fa fa-calendar"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="hide">
                    <input type="text" class="event-start-date" name="eventStartDate"/>
                    <input type="text" class="event-end-date" name="eventEndDate"/>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <select class="form-control selectpicker event-categories">
                            <option data-content="<span class='event-category event-cancelled'>Cancelled</span>" value="event-cancelled">Cancelled</option>
                            <option data-content="<span class='event-category event-home'>Home</span>" value="event-home">Home</option>
                            <option data-content="<span class='event-category event-overtime'>Overtime</span>" value="event-overtime">Overtime</option>
                            <option data-content="<span class='event-category event-generic'>Generic</span>" value="event-generic" selected="selected">Generic</option>
                            <option data-content="<span class='event-category event-job'>Job</span>" value="event-job">Job</option>
                            <option data-content="<span class='event-category event-offsite'>Off-site work</span>" value="event-offsite">Off-site work</option>
                            <option data-content="<span class='event-category event-todo'>To Do</span>" value="event-todo">To Do</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <textarea class="summernote" placeholder="Write note here..."></textarea>
                    </div>
                </div>
            </div>
            <div class="pull-right">
                <div class="btn-group">
                    <a href="#" class="btn btn-info close-subview-button">
                        Close
                    </a>
                </div>
                <div class="btn-group">
                    <button class="btn btn-info save-new-event" type="submit">
                        Save
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- *** READ EVENT *** -->
<div id="readEvent">
    <div class="noteWrap col-md-8 col-md-offset-2">
        <div class="row">
            <div class="col-md-12">
                <h2 class="event-title">Event Title</h2>
                <div class="btn-group options-toggle pull-right">
                    <button class="btn dropdown-toggle btn-transparent-grey" data-toggle="dropdown">
                        <i class="fa fa-cog"></i>
                        <span class="caret"></span>
                    </button>
                    <ul role="menu" class="dropdown-menu dropdown-light pull-right">
                        <li>
                            <a href="#newEvent" class="edit-event">
                                <i class="fa fa-pencil"></i> Edit
                            </a>
                        </li>
                        <li>
                            <a href="#" class="delete-event">
                                <i class="fa fa-times"></i> Delete
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6">
                <span class="event-category event-cancelled">Cancelled</span>
                <span class="event-allday"><i class='fa fa-check'></i> All-Day</span>
            </div>
            <div class="col-md-12">
                <div class="event-start">
                    <div class="event-day"></div>
                    <div class="event-date"></div>
                    <div class="event-time"></div>
                </div>
                <div class="event-end"></div>
            </div>
            <div class="col-md-12">
                <div class="event-content"></div>
            </div>
        </div>
    </div>
</div>
@stop
@section('scripts')
<script src="{{ URL::asset('assets/plugins/calendario/js/modernizr.custom.63321.js'); }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/plugins/calendario/js/jquery.calendario.js'); }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/plugins/calendario/js/data.js'); }}"></script>
<script type="text/javascript">
$(function() {

    var transEndEventNames = {
        'WebkitTransition': 'webkitTransitionEnd',
        'MozTransition': 'transitionend',
        'OTransition': 'oTransitionEnd',
        'msTransition': 'MSTransitionEnd',
        'transition': 'transitionend'
    },
    transEndEventName = transEndEventNames[ Modernizr.prefixed('transition') ],
            $wrapper = $('#custom-inner'),
            $calendar = $('#calendar'),
            cal = $calendar.calendario({
                onDayClick: function($el, $contentEl, dateProperties) {

                    if ($contentEl.length > 0) {
                        showEvents($contentEl, dateProperties);
                    }

                },
                caldata: codropsEvents,
                displayWeekAbbr: true
            }),
            $month = $('#custom-month').html(cal.getMonthName()),
            $year = $('#custom-year').html(cal.getYear());

    $('#custom-next').on('click', function() {
        cal.gotoNextMonth(updateMonthYear);
    });
    $('#custom-prev').on('click', function() {
        cal.gotoPreviousMonth(updateMonthYear);
    });

    function updateMonthYear() {
        $month.html(cal.getMonthName());
        $year.html(cal.getYear());
    }

    // just an example..
    function showEvents($contentEl, dateProperties) {

        hideEvents();

        var $events = $('<div id="custom-content-reveal" class="custom-content-reveal"><h4>Events for ' + dateProperties.monthname + ' ' + dateProperties.day + ', ' + dateProperties.year + '</h4></div>'),
                $close = $('<span class="custom-content-close"></span>').on('click', hideEvents);

        $events.append($contentEl.html(), $close).insertAfter($wrapper);

        setTimeout(function() {
            $events.css('top', '0%');
        }, 25);

    }
    function hideEvents() {

        var $events = $('#custom-content-reveal');
        if ($events.length > 0) {

            $events.css('top', '100%');
            Modernizr.csstransitions ? $events.on(transEndEventName, function() {
                $(this).remove();
            }) : $events.remove();

        }

    }

});
</script>
<!-- Scripts for This page only -->
<script>
    jQuery(document).ready(function() {
        Main.init();
        SVExamples.init();
    });
</script>

@stop
