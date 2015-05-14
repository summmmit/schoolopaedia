@extends('layouts.main-layout')
@section('stylesheets')
<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/plugins/select2/select2.css'); }}" />
@stop
@section('page_header')
<h1><i class="fa fa-pencil-square"></i>Periods</h1>
@stop

@section('page_breadcrumb')
<ol class="breadcrumb">
    <li>
        <a href="#">
            Dashboard
        </a>
    </li>
    <li class="active">
        School Periods
    </li>
</ol>
@stop

@section('content')
<div class="row">
    <div class="col-sm-12">
        @if(Session::has('global'))
        <div class="errorHandler alert alert-success">
            <i class="fa fa-remove-sign"></i>{{ Session::get('global') }}
        </div>
        @endif
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <div class="panel panel-white panel-add-streams">
            <div class="panel-heading">
                <i class="fa fa-calendar"></i>
                Periods 
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="errorHandler alert alert-danger no-display">
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-hover" id="table-school-periods">
                        <thead>
                            <tr>
                                <th>Period</th>
                                <th>Start Time</th>
                                <th>End Time</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($periods as $period)
                            <tr>
                                <td>{{ $period->period_name }}</td>
                                <td>{{ date_format(date_create($period->start_time), "h:i A") }}</td>
                                <td>{{ date_format(date_create($period->end_time), "h:i A") }}</td>
                                <td>
                                    <a href="#" class="edit-row-periods">
                                        Edit
                                    </a>
                                </td>
                                <td>
                                    <a href="#" class="delete-row-periods">
                                        Delete
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
@section('scripts')
<!-- Scripts for This page only -->
<script src="{{ URL::asset('assets/plugins/select2/select2.min.js'); }}"></script>
<script src="{{ URL::asset('assets/js/modifiedJs/admin/school-settings/table-data-periods.js'); }}"></script>

<script>
jQuery(document).ready(function() {
    Main.init();
    SVExamples.init();
    TableDataPeriods.init();
});
</script>

@stop
