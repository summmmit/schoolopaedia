@extends('admin.layout.adminLayout')

@section('stylesheets')

<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/plugins/select2/select2.css'); }}" />
<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/plugins/bootstrap-modal/css/bootstrap-modal-bs3patch.css'); }}" />
<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/plugins/bootstrap-modal/css/bootstrap-modal.css'); }}" />

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
                        <button data-bb="prompt" class="btn btn-orange">
                            Add New Class <i class="fa fa-plus"></i>
                        </button>
                    </div>
                    <div class="col-md-3">
                        <button class="btn btn-orange add-row">
                            Add New Stream <i class="fa fa-plus"></i>
                        </button>
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
            <div class="col-md-12 space20">
                <form action="#" role="form" id="form">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="errorHandler alert alert-danger no-display">
                                <i class="fa fa-times-sign"></i> You have some form errors. Please check below.
                            </div>
                            <div class="successHandler alert alert-success no-display">
                                <i class="fa fa-ok"></i> Your form validation is successful!
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <input type="text" placeholder="Add New Class Name" class="form-control" id="firstname" name="class">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <button class="btn btn-yellow btn-block" type="submit">
                                Add New Class <i class="fa fa-arrow-circle-right"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop

@section('scripts')
<!-- Scripts for This page only -->
<script type="text/javascript" src="{{ URL::asset('assets/plugins/select2/select2.min.js'); }}"></script>
<script src="{{ URL::asset('assets/js/ui-subview.js'); }}"></script>             <!-- For Subview -->
<script type="text/javascript" src="{{ URL::asset('assets/plugins/bootstrap-modal/js/bootstrap-modal.js'); }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/plugins/bootstrap-modal/js/bootstrap-modalmanager.js'); }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/js/ui-modals.js'); }}"></script>  <!-- For Modals -->
<script>
jQuery(document).ready(function() {
    Main.init();
    SVExamples.init();
    UISubview.init();
    UIModals.init();
});
</script>
@stop