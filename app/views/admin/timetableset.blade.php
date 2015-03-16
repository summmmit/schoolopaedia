@extends('admin.layout.adminLayout')

@section('stylesheets')
<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/plugins/select2/select2.css'); }}" />
@stop

@section('page_header')
<h1><i class="fa fa-pencil-square"></i> Time Table <small>Timining chart for teachers and classes.</small></h1>
@stop

@section('page_breadcrumb')
<ol class="breadcrumb">
    <li>
        <a href="#">
            Dashboard
        </a>
    </li>
    <li class="active">
        Time Table
    </li>
</ol>
@stop
@section('content')
<!-- start: PAGE CONTENT -->
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-white">
            <div class="panel-heading">
                <h4 class="panel-title">Session: <span class="text-bold">2015 - 2016</span></h4>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-3">
                        <a class="btn btn-green show-sv" href="#subview-add-classes" data-startFrom="right">
                            Show Right Subview <i class="fa fa-chevron-right"></i>
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a class="btn btn-green show-sv" href="#subview-add-streams" data-startFrom="right">
                            Add New Stream <i class="fa fa-plus"></i>
                        </a>
                    </div>
                    <div class="col-md-3">
                        <button class="btn btn-orange add-row">
                            Add New Section<i class="fa fa-plus"></i>
                        </button>
                    </div>
                    <div class="col-md-3">
                        <button class="btn btn-orange add-row">
                            Add New Subject<i class="fa fa-plus"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <!-- start: EXPORT DATA TABLE PANEL  -->
        <div class="panel panel-white">
            <div class="panel-heading">
                <h4 class="panel-title">Export <span class="text-bold">Data</span> Table</h4>
            </div>
            <div class="panel-body">
            </div>
        </div>
        <!-- end: EXPORT DATA TABLE PANEL -->
    </div>
</div>
<!-- end: PAGE CONTENT-->
@stop

@section('subview')
<div id="subview-add-classes" class="no-display">
    <div class="col-md-8 col-md-offset-2">
        <h3>Classes Present Now</h3>
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover table-full-width text-center" id="table-classes">
                        <thead >
                            <tr>
                                <th class="text-center">Class Name</th>
                                <th class="text-center">Edit</th>
                                <th class="text-center">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($classes as $class)
                            <tr>
                                <td>{{ $class->class }}</td>
                                <td>
                                    <a href="#">Edit</a>
                                </td>
                                <td>
                                    <a href="#">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form action="{{ URL::route('admin-time-table-add-classes-post'); }}" role="form" name="form-add-classes" method="post">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <input type="text" placeholder="Add New Class Name" class="form-control" id="input-add-classes" name="class">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <button class="btn btn-yellow btn-block" type="submit">
                                Add New Class <i class="fa fa-arrow-circle-right"></i>
                            </button>
                        </div>
                        <i class="fa fa-spinner fa-spin" style="display: none;" id="spinner-add-classes"></i>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div id="subview-add-streams" class="no-display">
    <div class="col-md-8 col-md-offset-2">
        <div class="row">
            <div class="col-md-12">
                <!-- start: DYNAMIC TABLE PANEL -->
                <div class="panel panel-white">
                    <div class="panel-heading">
                        <h3>Streams Present Now</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12 space20">
                                <button class="btn btn-green add-row">
                                    Add New <i class="fa fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="errorHandler alert alert-danger no-display">
                                    <i class="fa fa-remove-sign"></i> You have some form errors. Please check below.
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover" id="table-add-streams">
                                <thead>
                                    <tr>
                                        <th>Stream Name</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($streams as $stream)
                                    <tr id="{{ $stream->id }}">
                                        <td>{{ $stream->stream_name }}</td>
                                        <td>
                                            <a href="#" class="edit-row">
                                                Edit
                                            </a>
                                        </td>
                                        <td>
                                            <a href="#" class="delete-row">
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
    </div>
</div>
@stop

@section('scripts')
<!-- Scripts for This page only -->
<script src="{{ URL::asset('assets/plugins/select2/select2.min.js'); }}"></script>  
<script src="{{ URL::asset('assets/js/ui-subview.js'); }}"></script>                                                                  <!-- For Subview -->
<script src="{{ URL::asset('assets/js/modifiedJs/admin/timetable/table-data-streams.js'); }}"></script>                               <!-- For streams Table -->
<script src="{{ URL::asset('assets/js/modifiedJs/admin/timetable/table-data-classes.js'); }}"></script>                               <!-- For classes Table -->
<script>
jQuery(document).ready(function() {
    Main.init();
    SVExamples.init();
    UISubview.init();
    TableDataStreams.init();

});
</script>
@stop