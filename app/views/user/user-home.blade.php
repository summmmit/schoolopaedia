@extends('layouts.user-main-layout')

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
    <div class="col-sm-4">
        <!-- start: FULL CALENDAR PANEL -->
        <div class="panel panel-white">
            <div class="panel-heading">
                <h4 class="panel-title"><span class="text-bold">Monday </span>Schedule</h4>
            </div>
            <div class="panel-body">
                <table class="table table-striped table-hover" id="table-daily-schedule">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Timings</th>
                            <th>Subject</th>
                            <th>Teacher Name</th>
                            <th class="center">Teacher Pic</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td> 1 </td>
                            <td> 9:00 AM - 10:00 PM </td>
                            <td> Hindi </td>
                            <td>Peter Clark</td>
                            <td class="center"><img src="{{ URL::asset('assets/images/avatar-1.jpg'); }}" alt="image"/></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- end: FULL CALENDAR PANEL -->
    </div>
</div>
@stop

@section('scripts')
<script src="{{ URL::asset('assets/js/modifiedJs/user/home.js'); }}"></script>
<!-- Scripts for This page only -->
<script>
    jQuery(document).ready(function() {
        Main.init();
        SVExamples.init();
        Home.init();
    });
</script>

@stop
