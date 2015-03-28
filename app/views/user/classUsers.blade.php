@extends('user.layout.UserLayout')


@section('stylesheets')
<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/modifiedCss/user/classusers.css'); }}" />
<style>
</style>
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
<!-- Start: Page Content -->

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-white">
            <div class="panel-heading">
                <h4 class="panel-title">Export <span class="text-bold">Data</span> Table</h4>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <div class="card-container manual-flip">
                            <div class="card">
                                <div class="front">
                                    <div class="cover">
                                        <img src="{{ URL::asset('assets/projects/images/covers/rotating_card_thumb.png'); }}"/>
                                    </div>
                                    <div class="user">
                                        <img class="img-circle" src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/245657/t-shirt.png"/>
                                    </div>
                                    <div class="content">
                                        <div class="main">
                                            <h3 class="name">Sumit Singh</h3>
                                            <p class="profession">20098087</p>
                                        </div>
                                        <div class="footer">
                                            <button class="btn btn-simple" onclick="rotateCard(this)">
                                                <i class="fa fa-mail-forward"></i> Manual Flip
                                            </button>
                                        </div>
                                    </div>
                                </div> <!-- end front panel -->
                                <div class="back">
                                    <div class="header">
                                        <h5 class="motto">"Contact Details!"</h5>
                                    </div>
                                    <div class="content">
                                        <div class="main">
                                            <h4 class="text-center">Experince</h4>
                                            <p>Mike was working with our team since 2012.</p>
                                            <h4 class="text-center">Areas of Expertise</h4>
                                            <p>Web design, Adobe Photoshop, HTML5, CSS3, Corel and many others...</p>
                                        </div>
                                    </div>
                                    <div class="footer">
                                        <button class="btn btn-simple" rel="tooltip" title="Flip Card" onclick="rotateCard(this)">
                                            <i class="fa fa-reply"></i> Back
                                        </button>
                                        <div class="social-links text-center">
                                            <a href="http://cretive-tim.com" class="facebook"><i class="fa fa-facebook fa-fw"></i></a>
                                            <a href="http://cretive-tim.com" class="google"><i class="fa fa-google-plus fa-fw"></i></a>
                                            <a href="http://cretive-tim.com" class="twitter"><i class="fa fa-twitter fa-fw"></i></a>
                                        </div>
                                    </div>
                                </div> <!-- end back panel -->
                            </div> <!-- end card -->
                        </div> <!-- end card-container -->
                    </div> <!-- end col sm 3 -->
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
<script type="text/javascript">
    function rotateCard(btn){
        var $card = $(btn).closest('.card-container');
        console.log($card);
        if($card.hasClass('hover')){
            $card.removeClass('hover');
        } else {
            $card.addClass('hover');
        }
    }
</script>
<script src="{{ URL::asset('assets/js/modifiedJs/modernizr.js'); }}"></script>
@stop
