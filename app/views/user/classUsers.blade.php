@extends('user.layout.UserLayout')


@section('stylesheets')
<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/modifiedCss/user/classusers.css'); }}" />
<style>


    /* ============================================================
      GLOBAL
    ============================================================ */
    .effects .img {
        position: relative;
        float: left;
        margin-bottom: 5px;
        width: 100%;
        overflow: hidden;
    }
    .effects .img img {
        display: block;
        margin: 0;
        padding: 0;
        max-width: 100%;
        height: auto;
    }

    .overlay {
        display: block;
        position: absolute;
        z-index: 20;
        background: rgba(0, 0, 0, 0.8);
        overflow: hidden;
        -webkit-transition: all 0.5s;
        -moz-transition: all 0.5s;
        -o-transition: all 0.5s;
        transition: all 0.5s;
    }

    a.close-overlay {
        display: block;
        position: absolute;
        top: 0;
        right: 0;
        z-index: 100;
        width: 45px;
        height: 45px;
        font-size: 20px;
        font-weight: 700;
        color: #fff;
        line-height: 45px;
        text-align: center;
        background-color: #000;
        cursor: pointer;
    }
    a.close-overlay.hidden {
        display: none;
    }

    a.expand {
        display: block;
        position: absolute;
        z-index: 100;
        width: 60px;
        height: 60px;
        border: solid 5px #fff;
        text-align: center;
        color: #fff;
        line-height: 50px;
        font-weight: 700;
        font-size: 30px;
        -webkit-border-radius: 30px;
        -moz-border-radius: 30px;
        -ms-border-radius: 30px;
        -o-border-radius: 30px;
        border-radius: 30px;
    }


    /* ============================================================
      EFFECT 5 - ICON BORDER ANIMATE
    ============================================================ */
    #effect-5 .overlay {
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        opacity: 0;
    }
    #effect-5 .overlay a.expand {
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        margin: auto;
        width: 100%;
        height: 100%;
        -webkit-border-radius: 0;
        -moz-border-radius: 0;
        -ms-border-radius: 0;
        -o-border-radius: 0;
        border-radius: 0;
        -webkit-transition: all 0.5s;
        -moz-transition: all 0.5s;
        -o-transition: all 0.5s;
        transition: all 0.5s;
    }
    #effect-5 .img.hover .overlay {
        opacity: 1;
    }
    #effect-5 .img.hover .overlay a.expand {
        width: 60px;
        height: 60px;
        -webkit-border-radius: 30px;
        -moz-border-radius: 30px;
        -ms-border-radius: 30px;
        -o-border-radius: 30px;
        border-radius: 30px;
    }

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
                    <div class="col-md-3">
                        <div id="effect-5" class="effects clearfix">
                            <div class="img">
                                <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/245657/t-shirt.png" alt="" />
                                <div class="overlay">
                                    <a href="#" class="expand">+</a>
                                    <a class="close-overlay hidden">x</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div id="effect-5" class="effects clearfix">
                            <div class="img">
                                <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/245657/t-shirt.png" alt="" />
                                <div class="overlay">
                                    <a href="#" class="expand">+</a>
                                    <a class="close-overlay hidden">x</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div id="product-card">
                            <div id="product-front">
                                <div id="effect-5" class="effects clearfix">
                                    <div class="img">
                                        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/245657/t-shirt.png" alt="" />
                                        <div class="overlay">
                                            <a href="#" class="expand">+</a>
                                            <a class="close-overlay hidden">x</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="stats">        	
                                    <div class="stats-container">
                                        <span class="product_price">CS0157</span>
                                        <span class="product_name">Sumit Singh</span>    
                                        <p>Men's running shirt</p>                                                  

                                        <div class="product-options">
                                            <strong>SIZES</strong>
                                            <span>XS, S, M, L, XL, XXL</span>
                                            <strong>COLORS</strong>
                                            <div class="colors">
                                                <div class="c-blue"><span></span></div>
                                                <div class="c-red"><span></span></div>
                                                <div class="c-white"><span></span></div>
                                                <div class="c-green"><span></span></div>
                                            </div> 
                                        </div>                        
                                    </div>                         
                                </div>
                            </div>       
                            <div id="product-back">

                            </div>                     
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div id="product-card">
                            <div id="product-front">
                                <div id="effect-5" class="effects clearfix">
                                    <div class="img">
                                        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/245657/t-shirt.png" alt="" />
                                        <div class="overlay">
                                            <a href="#" class="expand">+</a>
                                            <a class="close-overlay hidden">x</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="stats">        	
                                    <div class="stats-container">
                                        <span class="product_price">CS0157</span>
                                        <span class="product_name">Sumit Singh</span>    
                                        <p>Men's running shirt</p>                                                  

                                        <div class="product-options">
                                            <strong>SIZES</strong>
                                            <span>XS, S, M, L, XL, XXL</span>
                                            <strong>COLORS</strong>
                                            <div class="colors">
                                                <div class="c-blue"><span></span></div>
                                                <div class="c-red"><span></span></div>
                                                <div class="c-white"><span></span></div>
                                                <div class="c-green"><span></span></div>
                                            </div> 
                                        </div>                        
                                    </div>                         
                                </div>
                            </div>       
                            <div id="product-back">

                            </div>                     
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- start: EXPORT DATA TABLE PANEL  -->
<!-- end: EXPORT DATA TABLE PANEL -->
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
<script src="{{ URL::asset('assets/js/modifiedJs/modernizr.js'); }}"></script>
<script>
    $(document).ready(function() {
        if (Modernizr.touch) {
            // show the close overlay button
            $(".close-overlay").removeClass("hidden");
            // handle the adding of hover class when clicked
            $(".img").click(function(e) {
                if (!$(this).hasClass("hover")) {
                    $(this).addClass("hover");
                }
            });
            // handle the closing of the overlay
            $(".close-overlay").click(function(e) {
                e.preventDefault();
                e.stopPropagation();
                if ($(this).closest(".img").hasClass("hover")) {
                    $(this).closest(".img").removeClass("hover");
                }
            });
        } else {
            // handle the mouseenter functionality
//            $().mouseenter(function() {
//                console.log(this);
//                $(this).addClass("animate");
//                $(this).find(".img").addClass("hover");
//            })
//                    .mouseleave(function() {
//                        $(this).removeClass("animate");
//                        $(this).find(".img").removeClass("hover");
//                    });
            $("#product-card").each(function(i){
                console.log(this);
            });
        }
    });
</script>
@stop
