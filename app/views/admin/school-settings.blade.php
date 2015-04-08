@extends('layouts.main-layout')

@section('page_header')
<h1><i class="fa fa-pencil-square"></i> School </h1>
@stop

@section('page_breadcrumb')
<ol class="breadcrumb">
    <li>
        <a href="#">
            Dashboard
        </a>
    </li>
    <li class="active">
        school settings
    </li>
</ol>
@stop

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-white">
            <div class="panel-heading">
                <h4 class="panel-title">Panel <span class="text-bold">White</span></h4>
            </div>
            <div class="panel-body">
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
