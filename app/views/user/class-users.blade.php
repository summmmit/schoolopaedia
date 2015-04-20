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
    <div class="col-sm-6 col-md-4">
        <div class="panel">
            <div class="panel-body">
                <div class="padding-5">
                    <div class="image pull-left img-responsive text-center">
                        <img width="90" height="91" class="" alt="" src="{{ URL::asset('assets/projects/images/rotating_card_profile2.png'); }}">
                    </div>
                    <div class="info pull-right">
                        <h4 class="padding-5">Sumit Prasad<span class="block text-left"> (20098087) </span></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-md-4">
        <div class="panel">
            <div class="panel-body">
                <div class="padding-5">
                    <div class="image pull-left img-responsive text-center">
                        <img width="90" height="91" class="" alt="" src="{{ URL::asset('assets/projects/images/rotating_card_profile2.png'); }}">
                    </div>
                    <div class="info pull-right">
                        <h4 class="padding-5">Sumit Prasad<span class="block text-left"> (20098087) </span></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-md-4">
        <div class="panel">
            <div class="panel-body">
                <div class="padding-5">
                    <div class="image pull-left img-responsive text-center">
                        <img width="90" height="91" class="" alt="" src="{{ URL::asset('assets/projects/images/rotating_card_profile2.png'); }}">
                    </div>
                    <div class="info pull-right">
                        <h4 class="padding-5">Sumit Prasad<span class="block text-left"> (20098087) </span></h4>
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
