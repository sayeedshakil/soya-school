@extends('frontend.layouts.masterfrontend')
@section('main_slider')
<div class="row">
    <!-- #region Jssor Slider Begin -->
    <!-- Generator: Jssor Slider Composer -->
    <!-- Source: https://www.jssor.com/demos/banner-rotator.slider/=edit -->
    <script src="{{asset('frontend/assets/js/jssor.slider-28.1.0.min.js')}}" type="text/javascript"></script>
    <script type="text/javascript">
        window.jssor_1_slider_init = function() {

            var jssor_1_SlideshowTransitions = [
            {$Duration:500,$Delay:12,$Cols:10,$Rows:5,$Opacity:2,$Clip:15,$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationStraightStairs,$Assembly:2049,$Easing:$Jease$.$OutQuad},
            {$Duration:500,$Delay:40,$Cols:10,$Rows:5,$Opacity:2,$Clip:15,$SlideOut:true,$Easing:$Jease$.$OutQuad},
            {$Duration:1000,x:-0.2,$Delay:20,$Cols:16,$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationStraight,$Assembly:260,$Easing:{$Left:$Jease$.$InOutExpo,$Opacity:$Jease$.$InOutQuad},$Opacity:2,$Outside:true,$Round:{$Top:0.5}},
            {$Duration:1600,y:-1,$Delay:40,$Cols:24,$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationStraight,$Easing:$Jease$.$OutJump,$Round:{$Top:1.5}},
            {$Duration:1200,x:0.2,y:-0.1,$Delay:16,$Cols:10,$Rows:5,$Opacity:2,$Clip:15,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$Formation:$JssorSlideshowFormations$.$FormationStraightStairs,$Assembly:260,$Easing:{$Left:$Jease$.$InWave,$Top:$Jease$.$InWave,$Clip:$Jease$.$OutQuad},$Round:{$Left:1.3,$Top:2.5}},
            {$Duration:1500,x:0.3,y:-0.3,$Delay:20,$Cols:10,$Rows:5,$Opacity:2,$Clip:15,$During:{$Left:[0.2,0.8],$Top:[0.2,0.8]},$Formation:$JssorSlideshowFormations$.$FormationStraightStairs,$Assembly:260,$Easing:{$Left:$Jease$.$InJump,$Top:$Jease$.$InJump,$Clip:$Jease$.$OutQuad},$Round:{$Left:0.8,$Top:2.5}},
            {$Duration:1500,x:0.3,y:-0.3,$Delay:20,$Cols:10,$Rows:5,$Opacity:2,$Clip:15,$During:{$Left:[0.1,0.9],$Top:[0.1,0.9]},$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationStraightStairs,$Assembly:260,$Easing:{$Left:$Jease$.$InJump,$Top:$Jease$.$InJump,$Clip:$Jease$.$OutQuad},$Round:{$Left:0.8,$Top:2.5}}
            ];

            var jssor_1_options = {
            $AutoPlay: 1,
            $SlideshowOptions: {
                $Class: $JssorSlideshowRunner$,
                $Transitions: jssor_1_SlideshowTransitions,
                $TransitionsOrder: 1
            },
            $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$
            },
            $BulletNavigatorOptions: {
                $Class: $JssorBulletNavigator$,
                $SpacingX: 16,
                $SpacingY: 16
            }
            };

            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

            /*#region responsive code begin*/

            var MAX_WIDTH = 1320;

            function ScaleSlider() {
                var containerElement = jssor_1_slider.$Elmt.parentNode;
                var containerWidth = containerElement.clientWidth;

                if (containerWidth) {

                    var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);

                    jssor_1_slider.$ScaleWidth(expectedWidth);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }

            ScaleSlider();

            $Jssor$.$AddEvent(window, "load", ScaleSlider);
            $Jssor$.$AddEvent(window, "resize", ScaleSlider);
            $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
            /*#endregion responsive code end*/
        };
    </script>
    <style>
        /*jssor slider loading skin spin css*/
        .jssorl-009-spin img {
            animation-name: jssorl-009-spin;
            animation-duration: 1.6s;
            animation-iteration-count: infinite;
            animation-timing-function: linear;
        }

        @keyframes jssorl-009-spin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        /*jssor slider bullet skin 053 css*/
        .jssorb053 .i {position:absolute;cursor:pointer;}
        .jssorb053 .i .b {fill:#fff;fill-opacity:0.3;}
        .jssorb053 .i:hover .b {fill-opacity:.7;}
        .jssorb053 .iav .b {fill-opacity: 1;}
        .jssorb053 .i.idn {opacity:.3;}

        /*jssor slider arrow skin 093 css*/
        .jssora093 {display:block;position:absolute;cursor:pointer;}
        .jssora093 .c {fill:none;stroke:#fff;stroke-width:400;stroke-miterlimit:10;}
        .jssora093 .a {fill:none;stroke:#fff;stroke-width:400;stroke-miterlimit:10;}
        .jssora093:hover {opacity:.8;}
        .jssora093.jssora093dn {opacity:.6;}
        .jssora093.jssora093ds {opacity:.3;pointer-events:none;}
    </style>
    <div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:1320px;height:460px;overflow:hidden;visibility:hidden;">
        <!-- Loading Screen -->
        <div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
            <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="{{asset('storage/images/mainSlider/spin.svg')}}" />
        </div>
        <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:1320px;height:460px;overflow:hidden;">
            {{-- <div>
                <img data-u="image" src="{{asset('storage/images/mainSlider/011.jpeg')}}" />
            </div> --}}
            @foreach($sliderImage as $item)
            <div>
                @if($item->sliderImage)
                    <img data-u="image" src="{{ asset('storage/images/mainSlider/' . $item->sliderImage) }}"  alt="{{$item->sliderImage}} ">
                @else
                <img data-u="image" src="{{asset('storage/images/mainSlider/defaultsliderimage.jpeg')}}" />
                @endif
            </div>
            @endforeach
            {{-- <div>
                <img data-u="image" src="{{asset('storage/images/mainSlider/013.jpeg')}}" />
            </div> --}}

        </div>
        <!-- <a data-scale="0" href="https://www.jssor.com" style="display:none;position:absolute;">responsive slider</a> -->
        <!-- Bullet Navigator -->
        <div data-u="navigator" class="jssorb053" style="position:absolute;bottom:16px;right:16px;" data-autocenter="1" data-scale="0.5" data-scale-bottom="0.75">
            <div data-u="prototype" class="i" style="width:12px;height:12px;">
                <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                    <path class="b" d="M11400,13800H4600c-1320,0-2400-1080-2400-2400V4600c0-1320,1080-2400,2400-2400h6800 c1320,0,2400,1080,2400,2400v6800C13800,12720,12720,13800,11400,13800z"></path>
                </svg>
            </div>
        </div>
        <!-- Arrow Navigator -->
        <div data-u="arrowleft" class="jssora093" style="width:50px;height:50px;top:0px;left:30px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
            <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <circle class="c" cx="8000" cy="8000" r="5920"></circle>
                <polyline class="a" points="7777.8,6080 5857.8,8000 7777.8,9920 "></polyline>
                <line class="a" x1="10142.2" y1="8000" x2="5857.8" y2="8000"></line>
            </svg>
        </div>
        <div data-u="arrowright" class="jssora093" style="width:50px;height:50px;top:0px;right:30px;" data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
            <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <circle class="c" cx="8000" cy="8000" r="5920"></circle>
                <polyline class="a" points="8222.2,6080 10142.2,8000 8222.2,9920 "></polyline>
                <line class="a" x1="5857.8" y1="8000" x2="10142.2" y2="8000"></line>
            </svg>
        </div>
    </div>
    <script type="text/javascript">jssor_1_slider_init();
    </script>
    <!-- #endregion Jssor Slider End -->
</div>
@endsection
@section('marquee_notice')
    <!-- marquee section start -->
    <div class="row" style="background-color: #b12626;font-size: 1.3vmax;">
        <marquee scrollamount="8" scrolldelay="150" onmouseover="this.stop();"onmouseout="this.start();">
            @foreach ($notices as $item)
                <a style="" href="{{route('soya.viewnotice',$item->id)}}">{{$item->title}};  </a>
            @endforeach
        </marquee>
    </div>
<!-- marquee section end -->
@endsection
@section('body_content')
<div class="row ">

    <!-- left side start -->
    <div class="col-md-9">

        {{-- addmission link --}}
        <div class="p-3 mb-4 mt-4 bg-light rounded-3 text-center">
            <div class="container-fluid py-3 bg-white border border-1 border-warning rounded-3 shadow">
              <h3 class=" fw-bold">Online Addmission is Going On!</h3>
              <p class="col-md-8 fs-4"></p>
              <a class="btn btn-primary btn-lg" href="https://soya.biddalay.net/online-admission" type="button" target="_blank">Apply Online</a>
            </div>
        </div>
        {{-- addmission link --}}

        <div class="card my-4 mx-3 shadow-lg">
            <h4 class="card-header text-center fw-bold ">Notice Board</h4>
            <div class="card-body">
                <ol class="list-group list-group-numbered">
                    @foreach ($notices as $item)
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                      <div class="ms-2 me-auto">
                        <div class="fw-bold"><a class="text-decoration-none" href="{{route('soya.viewnotice',$item->id)}}">{{$item->title}}-({{$item->updated_at->format('d/m/Y')}})</a></div>
                        <div>{{$item->studentClass->name}}-{{$item->category->name}} </div>
                        {{-- <div>{{$item->description}}</div> --}}
                      </div>
                        <span class="">
                            @if ($item->attachment)
                                <a class="btn btn-secondary " href="{{asset('storage/images/attachment/'.$item->attachment)}}" download="{{$item->title}}-notice" >
                                    <i class="fas fa-download "></i>
                                    {{-- Download Notice --}}
                                </a>
                            @else
                                {{''}}
                            @endif
                        </span>
                    </li>
                    @endforeach

                </ol>

            </div>
        </div>


        <div class="row my-5 mx-3 ">
            @foreach ($featureBox as $item)
            <div class="col-sm-6 ">
                <div class="card mb-3 shadow border border-5 border-light" style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            {{-- <img src="{{asset('storage/images/siteImage/logosoya.png')}}" class="img-fluid rounded-start" alt="..."> --}}
                            @if($item->feature_image)
                                <img src="{{ asset('storage/images/featureBox/' . $item->feature_image) }}" class="img-fluid rounded-start" alt="{{$item->feature_title}}">
                            @else
                                <img src="{{ asset('storage/images/teachers/default.png') }}" class="img-fluid rounded-start"
                                alt="No Image found" >
                            @endif
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                            <h5 class="card-title bg-success text-light p-1 rounded text-center"> {{ $item->feature_title ?? '' }}</h5>
                            <ul type="a" class="list-group list-group-flush list-group-numbered">
                                <a href="{{ $item->feature_subtitle_link1 ?? '' }}" class="list-group-item list-group-item-action">{{ $item->feature_subtitle1 ?? '' }}</a>
                                <a href="{{ $item->feature_subtitle_link2 ?? '' }}" class="list-group-item list-group-item-action">{{ $item->feature_subtitle2 ?? '' }}</a>
                                <a href="{{ $item->feature_subtitle_link3 ?? '' }}" class="list-group-item list-group-item-action">{{ $item->feature_subtitle3 ?? '' }}</a>
                            </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>




    </div>
    <!-- left side end -->

    <!-- right side start -->
    <div class="col-md-3  p-4 text-center" style="background-color: rgb(219, 219, 219)">
        <!-- <div class="p-3 text-white">
            <h4 class=" p-2 bg-dark rounded">Head Teacher</h4>
            <img src="img/principal.png" alt="" height="200px" class="img-fluid rounded" style="border: 10px solid rgb(220, 233, 234);">
            <h4 class="pt-2" style="text-transform: uppercase;">Md. Jahangir Alam</h4>

        </div> -->

        @foreach ($frontPage as $item)
        @if ($item->headTeacherImage)
        <div class="card mb-3  shadow-sm border ">
            <h4 class="card-header fw-bold text-uppercase">Principal</h4>
            <img src="{{asset('storage/images/teachers/' .$item->headTeacherImage)}}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">{{$item->headTeacherName}}</h5>
              <!-- <h6 class="">Head Teacher</h6> -->
              <!-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> -->
            </div>
        </div>
        @endif



        <div class="card  mb-3 bg-light" style=" height: 250px;">
            <div class="card-header fw-bold text-success">LATEST NEWS</div>
            <marquee direction="up" scrollamount="3" scrolldelay="200" hspace="10px">
                <div class="card-body text-primary">
                    <!-- <h5 class="card-title">Success card title</h5> -->
                    <p class="card-text text-justify ">{{$item->latestNewsText}}</p>
                </div>
            </marquee>
        </div>
        @endforeach

        <div class="list-group">
            <h5 class="card-title list-group-item list-group-item-action bg-success text-white">Important Links</h5>
            <!-- <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
              The current link item
            </a> -->
            <a href="https://www.gsctd.edu.bd/" target="_blank" class="list-group-item list-group-item-action">জাতীয় তথ্য বাতায়ন</a>
            <a href="http://www.moedu.gov.bd/" target="_blank" class="list-group-item list-group-item-action">শিক্ষা মন্ত্রণালয়</a>
            <a href="http://www.dinajpureducationboard.gov.bd/" target="_blank" class="list-group-item list-group-item-action">মাধ্যমিক ও উচ্চ মাধ্যমিক শিক্ষা বোর্ড, দিনাজপুর</a>


        </div>



    </div>
    <!-- right side end -->

</div>
@endsection
