    

<!doctype html>
<html class="no-js" lang="en">
    
<!-- Mirrored from htmldemo.net/eduhome/eduhome/index-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 06 May 2023 07:54:04 GMT -->
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>{{$title}} | Saryu International School</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('storage/images/'.substr($data->school_image, 14))}}">

    <link rel="stylesheet" href="{{url('website')}}/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{url('website')}}/assets/css/animate.min.css">
    <link rel="stylesheet" href="{{url('website')}}/assets/css/meanmenu.css">
    <link rel="stylesheet" href="{{url('website')}}/assets/css/magnific-popup.css">
    <link rel="stylesheet" href="{{url('website')}}/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{url('website')}}/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{url('website')}}/assets/css/et-line-icon.css">
    <link rel="stylesheet" href="{{url('website')}}/assets/css/reset.css">
    <link rel="stylesheet" href="{{url('website')}}/assets/css/ionicons.min.css">
    <link rel="stylesheet" href="{{url('website')}}/assets/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="{{url('website')}}/assets/css/style.css">
    <link rel="stylesheet" href="{{url('website')}}/assets/css/responsive.css">
    <script src="{{url('website')}}/assets/js/vendor/modernizr-3.11.2.min.js"></script>
</head>
<body>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

    <!-- Header Area Start -->
    <header class="top">
        <div class="header-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-sm-8">
                        <div class="header-top-left">
                            <!-- <p><a href="tel:+917905181449" style="color:white">HAVE ANY QUESTION ?  +91 79051 81449</a> ||| <a style="color:white" href="{{url('/page/81')}}">FAQ</a> | <a style="color:white" href="{{url('/contact')}}">Contact</a></p> -->
                            <p>DEV.BY- NIKHIL,UJJAWAL,RUPA,KASHISH</p>
                      
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <div class="header-top-right text-md-end text-center">
                            <ul>
                                <!-- <li><a href="#">login</a></li> -->
                                <li><a href="#">COLLEGE MANAGEMENT SYSTEM</a></li>
                            </ul>
                            <!-- <p>WELCOME</p> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-area two header-sticky">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-5 col-6">
                        <div class="logo">
                            <a href="{{url('/index')}}"><img src="{{url('website')}}/assets/img/logo/logo2.png" alt="SIS" /></a>
                        </div>
                    </div>
                    <div class="col-md-9 col-sm-7 col-6">
                        <div class="content-wrapper text-end">
                            <!-- Main Menu Start -->
                            <div class="main-menu">
                                <nav>
                                    <ul>
                                        <li><a href="{{url('/index')}}">Home</a></li>
                                        <!-- <li><a href="#">About</a>
                                            <ul>
                                                @foreach ($custom_page as $page1)
                                                @if ($page1->page_menu==1)
                                                <li><a href="{{url('/page')}}/{{$page1->id}}">{{$page1->name}}</a></li>
                                                @endif    
                                                @endforeach 
                                            </ul>
                                        </li> -->

                                        <!-- <li><a href="#">Activities</a>
                                            <ul>
                                                @foreach ($custom_page as $page1)
                                                @if ($page1->page_menu==2)
                                                <li><a href="{{url('/page')}}/{{$page1->id}}">{{$page1->name}}</a></li>
                                                @endif    
                                                @endforeach 
                                            </ul>
                                        </li> -->

                                        <li><a href="#">More</a>
                                            <ul>
                                                @foreach ($custom_page as $page1)
                                                @if ($page1->page_menu==3)
                                                <li><a href="{{url('/page')}}/{{$page1->id}}">{{$page1->name}}</a></li>
                                                @endif    
                                                @endforeach 
                                            </ul>
                                        </li>
                                        <!-- <li><a href="#">Facilities & Infra</a>
                                            <ul>
                                                @foreach ($custom_page as $page1)
                                                @if ($page1->page_menu==4)
                                                <li><a href="{{url('/page')}}/{{$page1->id}}">{{$page1->name}}</a></li>
                                                @endif    
                                                @endforeach 
                                            </ul>
                                        </li> -->

                                        <!-- <li><a href="#">Gallery</a>
                                            <ul>
                                                <li><a href="{{url('/gallery')}}">Photo Gallery</a></li>
                                                <li><a href="{{url('/video')}}">Video Gallery</a></li>
                                                @foreach ($custom_page as $page1)
                                                @if ($page1->page_menu==5)
                                                <li><a href="{{url('/page')}}/{{$page1->id}}">{{$page1->name}}</a></li>
                                                @endif    
                                                @endforeach 
                                            </ul>
                                        </li> -->

                                        <!-- <li><a href="#">Student Zone</a>
                                            <ul>
                                                @foreach ($custom_page as $page1)
                                                @if ($page1->page_menu==6)
                                                <li><a href="{{url('/page')}}/{{$page1->id}}">{{$page1->name}}</a></li>
                                                @endif    
                                                @endforeach 
                                            </ul>
                                        </li> -->
                          
                                    
                                   
                                    </ul>
                                </nav>
                            </div>
                          
                            <!-- Main Menu End -->
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mobile-menu hidden-sm"></div> 
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header Area End -->