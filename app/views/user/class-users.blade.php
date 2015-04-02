@extends('layouts.main-layout')

@section('stylesheets')
<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/modifiedCss/user/classusers.css'); }}" />
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
                        <div class="thumbnail">
                            <img src="{{ URL::asset('assets/projects/images/covers/rotating_card_thumb.jpg'); }}" alt="">
                            <img src="{{ URL::asset('assets/projects/images/rotating_card_profile2.png'); }}" alt="" class="img-circle profile-img">
                            <div class="caption profile-img">
                                <h4 class="text-center">Sumit Singh<span> (CS018765) </span></h4>
                                <p>
                                    <a href="#" class="btn btn-blue btn-block">
                                        View Details
                                    </a>
                                </p>
                            </div>
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
<<<<<<< HEAD
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
=======
>>>>>>> 109f624c6d61de82f28e1cc7f681b0b4ebe1be43
@stop
