@extends('layouts.user-main-layout')

@section('stylesheets')
<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/modifiedCss/user/classusers.css'); }}" />
<style>
</style>
@stop

@section('page_header')
<h1><i class="fa fa-pencil-square"></i> Class Members </h1>
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
<!-- Start: Page Content -->
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-white">
            <div class="panel-heading">
                <h4 class="panel-title">Export <span class="text-bold">Data</span> Table</h4>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-2">
                        <div class="port-weight-head">	
                            <div class="img pull-left">			
                                <img src="{{ URL::asset('assets/projects/images/rotating_card_profile2.png'); }}" height="90" width="91" alt="">
                            </div>
                            <div class="text pull-right">			
                                <h3>Arya Stark</h3>
                                <p>Winterfell</p>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>        
                    <div class="col-md-2">
                        <div class="port-weight-head">	
                            <div class="img pull-left">			
                                <img src="{{ URL::asset('assets/projects/images/rotating_card_profile2.png'); }}" height="90" width="91" alt="">
                            </div>
                            <div class="text pull-right">			
                                <h3>Arya Stark</h3>
                                <p>Winterfell</p>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>      
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End: Page Content -->
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
