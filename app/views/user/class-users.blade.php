@extends('layouts.user-main-layout')

@section('stylesheets')
<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/modifiedCss/user/classusers.css'); }}" />
<style>
    .new-badge-icon .badge {
  border-radius: 12px 12px 12px 12px !important;
  border-style: solid;
  border-width: 0;
  box-shadow: none;
  color: #FFFFFF !important;
  font-size: 11px !important;
  font-weight: 300;
  padding: 3px 7px;
  position: absolute;
  right: -5px;
  text-shadow: none;
  top: -5px;
}
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
    <div class="col-md-4 col-lg-4 col-sm-6">
        <div class="panel panel-default panel-white core-box">
            <div class="panel-body no-padding">
                <div class="padding-20 text-center core-icon">
                     <img class="img-thumbnail" src="{{ URL::asset('assets/projects/images/rotating_card_profile2.png'); }}" style="width: 90px; height:90px;">
                </div>
                <div class="padding-20 core-content new-badge-icon">
                    <h4 class="title block no-margin text-right">Hardik Sondagar</h4>
                    <h5 class="text-right">( 20098087 )</h5>
                    <span class="badge badge-danger"> Happy Birthday </span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-lg-4 col-sm-6">
        <div class="panel panel-default panel-white core-box">
            <div class="panel-body no-padding">
                <div class="padding-20 text-center core-icon">
                     <img class="img-thumbnail" src="{{ URL::asset('assets/projects/images/rotating_card_profile2.png'); }}" style="width: 90px; height:90px;">
                </div>
                <div class="padding-20 core-content new-badge-icon">
                    <h4 class="title block no-margin text-right">Sumit Singh</h4>
                    <h5 class="text-right">( 20098087 )</h5>
                    <span class="label label-sm label-green pull-right">Monitor</span>
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
