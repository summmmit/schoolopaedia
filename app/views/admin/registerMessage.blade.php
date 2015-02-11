@extends('layouts.adminLayout')

@section('stylesheets')
@stop

@section('page_header')
<h1><i class="fa fa-pencil-square"></i> Home <small></small></h1>
@stop

@section('page_breadcrumb')
<ol class="breadcrumb">
    <li>
        <a href="#">
            Dashboard
        </a>
    </li>
    <li class="active">
        Homet
    </li>
</ol>
@stop

@section('content')
<div class="row">
    <div class="col-md-12">
        <p></p>
        <div class="page-error animated shake">
            <div class="error-number text-azure">
                Thank You
            </div>
            <div class="error-details col-sm-6 col-sm-offset-3">
                <h3>{{ message }}</h3>
                <p>
                    <a href="index.html" class="btn btn-red btn-return">
                        Click To Register Another Person
                    </a>
                </p>
            </div>
        </div>
    </div>
</div>
@stop

@section('scripts')
<!-- Scripts for This page only -->
<script>
    jQuery(document).ready(function() {
        Main.init();
        SVExamples.init();
    });
</script>
@stop
