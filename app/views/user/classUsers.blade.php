@extends('user.layout.UserLayout')


@section('stylesheets')
<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/modifiedCss/user/classusers.css'); }}" />
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
                    <div class="col-md-3 col-xs-12 col-sm-6">
                        <div id="make-3D-space">
                            <div id="product-card">
                                <div id="product-front">
                                    <div class="shadow"></div>
                                    <img src="{{ URL::asset('assets/projects/images/profilepics/9e589fd4126287cabccecd995f26923c.png'); }}" alt="" class="thumbnail" />
                                    <div class="image_overlay"></div>
                                    <div id="view_details">View details</div>
                                    <div class="stats">        	
                                        <div class="stats-container">
                                            <span class="product_price">CS0157</span>
                                            <span class="product_name">Sumit Singh</span>    
                                            <p>Men's running shirt</p>    
                                        </div>                         
                                    </div>
                                </div>
                                <div id="product-back">
                                    <div class="shadow"></div>
                                    <div id="carousel">
                                        <ul>
                                            <li><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/245657/t-shirt-large.png" alt="" /></li>
                                            <li><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/245657/t-shirt-large2.png" alt="" /></li>
                                            <li><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/245657/t-shirt-large3.png" alt="" /></li>
                                        </ul>
                                        <div class="arrows-perspective">
                                            <div class="carouselPrev">
                                                <div class="y"></div>
                                                <div class="x"></div>
                                            </div>
                                            <div class="carouselNext">
                                                <div class="y"></div>
                                                <div class="x"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="flip-back">
                                        <div id="cy"></div>
                                        <div id="cx"></div>
                                    </div>
                                </div>	  
                            </div>	
                        </div>	
                    </div>
                    <div class="col-md-3 col-xs-12 col-sm-6">
                        <div id="make-3D-space">
                            <div id="product-card">
                                <div id="product-front">
                                    <div class="shadow"></div>
                                    <img src="{{ URL::asset('assets/projects/images/profilepics/9e589fd4126287cabccecd995f26923c.png'); }}" alt="" class="thumbnail" />
                                    <div class="image_overlay"></div>
                                    <div id="view_details">View details</div>
                                    <div class="stats">        	
                                        <div class="stats-container">
                                            <span class="product_price">CS0157</span>
                                            <span class="product_name">Sumit Singh</span>    
                                            <p>Men's running shirt</p>    
                                        </div>                         
                                    </div>
                                </div>
                                <div id="product-back">
                                    <div class="shadow"></div>
                                    <div id="carousel">
                                        <ul>
                                            <li><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/245657/t-shirt-large.png" alt="" /></li>
                                            <li><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/245657/t-shirt-large2.png" alt="" /></li>
                                            <li><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/245657/t-shirt-large3.png" alt="" /></li>
                                        </ul>
                                        <div class="arrows-perspective">
                                            <div class="carouselPrev">
                                                <div class="y"></div>
                                                <div class="x"></div>
                                            </div>
                                            <div class="carouselNext">
                                                <div class="y"></div>
                                                <div class="x"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="flip-back">
                                        <div id="cy"></div>
                                        <div id="cx"></div>
                                    </div>
                                </div>	  
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

        // Lift card and show stats on Mouseover
        $('#product-card').hover(function() {
            $(this).addClass('animate');
            $('div.carouselNext, div.carouselPrev').addClass('visible');
        }, function() {
            $(this).removeClass('animate');
            $('div.carouselNext, div.carouselPrev').removeClass('visible');
        });

        // Flip card to the back side
        $('#view_details').click(function() {
            $('div.carouselNext, div.carouselPrev').removeClass('visible');
            $('#product-card').addClass('flip-10');
            setTimeout(function() {
                $('#product-card').removeClass('flip-10').addClass('flip90').find('div.shadow').show().fadeTo(80, 1, function() {
                    $('#product-front, #product-front div.shadow').hide();
                });
            }, 50);

            setTimeout(function() {
                $('#product-card').removeClass('flip90').addClass('flip190');
                $('#product-back').show().find('div.shadow').show().fadeTo(90, 0);
                setTimeout(function() {
                    $('#product-card').removeClass('flip190').addClass('flip180').find('div.shadow').hide();
                    setTimeout(function() {
                        $('#product-card').css('transition', '100ms ease-out');
                        $('#cx, #cy').addClass('s1');
                        setTimeout(function() {
                            $('#cx, #cy').addClass('s2');
                        }, 100);
                        setTimeout(function() {
                            $('#cx, #cy').addClass('s3');
                        }, 200);
                        $('div.carouselNext, div.carouselPrev').addClass('visible');
                    }, 100);
                }, 100);
            }, 150);
        });

        // Flip card back to the front side
        $('#flip-back').click(function() {

            $('#product-card').removeClass('flip180').addClass('flip190');
            setTimeout(function() {
                $('#product-card').removeClass('flip190').addClass('flip90');

                $('#product-back div.shadow').css('opacity', 0).fadeTo(100, 1, function() {
                    $('#product-back, #product-back div.shadow').hide();
                    $('#product-front, #product-front div.shadow').show();
                });
            }, 50);

            setTimeout(function() {
                $('#product-card').removeClass('flip90').addClass('flip-10');
                $('#product-front div.shadow').show().fadeTo(100, 0);
                setTimeout(function() {
                    $('#product-front div.shadow').hide();
                    $('#product-card').removeClass('flip-10').css('transition', '100ms ease-out');
                    $('#cx, #cy').removeClass('s1 s2 s3');
                }, 100);
            }, 150);

        });


        /* ----  Image Gallery Carousel   ---- */

        var carousel = $('#carousel ul');
        var carouselSlideWidth = 335;
        var carouselWidth = 0;
        var isAnimating = false;

        // building the width of the casousel
        $('#carousel li').each(function() {
            carouselWidth += carouselSlideWidth;
        });
        $(carousel).css('width', carouselWidth);

        // Load Next Image
        $('div.carouselNext').on('click', function() {
            var currentLeft = Math.abs(parseInt($(carousel).css("left")));
            var newLeft = currentLeft + carouselSlideWidth;
            if (newLeft == carouselWidth || isAnimating === true) {
                return;
            }
            $('#carousel ul').css({'left': "-" + newLeft + "px",
                "transition": "300ms ease-out"
            });
            isAnimating = true;
            setTimeout(function() {
                isAnimating = false;
            }, 300);
        });

        // Load Previous Image
        $('div.carouselPrev').on('click', function() {
            var currentLeft = Math.abs(parseInt($(carousel).css("left")));
            var newLeft = currentLeft - carouselSlideWidth;
            if (newLeft < 0 || isAnimating === true) {
                return;
            }
            $('#carousel ul').css({'left': "-" + newLeft + "px",
                "transition": "300ms ease-out"
            });
            isAnimating = true;
            setTimeout(function() {
                isAnimating = false;
            }, 300);
        });
    });
</script>

@stop
