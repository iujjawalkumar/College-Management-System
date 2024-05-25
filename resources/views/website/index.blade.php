@extends('website.layouts.main')
@section('main-container')

<!-- header -->

		<!-- Background Area Start -->
        <section id="slider-container" class="slider-area three"> 
            <div class="slider-owl owl-theme owl-carousel"> 
                <!-- Start Slingle Slide -->
                <div class="single-slide item" style="background-image: url({{url('website')}}/assets/img/slider/School_Building.jpg)">
                    <!-- Start Slider Content -->
                    <div class="slider-content-area">  
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-7"> 
                                    <div class="slide-content-wrapper">
                                        <div class="slide-content">
                                            <h3>EDUCATION MAKES </h3>
                                            <h2>PROPER HUMANITY </h2>
                                            <p>Sown the seeds of aspirations ,worked tirelessly to nurture</p>
                                            <a class="default-btn" href="{{url('/about')}}">Learn more</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <div class="slider-img">
                                        <img src="{{url('website')}}/assets/img/slider/home.png" alt="slider">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Start Slider Content -->
                </div>
                <!-- End Slingle Slide -->
                <!-- Start Slingle Slide -->
                <div class="single-slide item" style="background-image: url({{url('website')}}/assets/img/slider/School_Building2.jpg)">
                    <!-- Start Slider Content -->
                    <div class="slider-content-area">   
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-7"> 
                                    <div class="slide-content-wrapper">
                                        <div class="slide-content">
                                            <h3>Admission Open</h3>
                                            <h2>For 2024-25 </h2>
                                            <p>Registration forms can be obtained from the school office. Forms need to be fully complete and submitted
                                                within 7 days from the date of purchase</p>
                                            <a class="default-btn" href="{{url('/about')}}">Learn more</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <div class="slider-img">
                                        <img src="{{url('website')}}/assets/img/slider/home.png" alt="slider">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Start Slider Content -->
                </div>
                <!-- End Slingle Slide -->
                <!-- Start Slingle Slide -->
                <div class="single-slide item" style="background-image: url({{url('website')}}/assets/img/slider/School_Building3.jpg)">
                    <!-- Start Slider Content -->
                    <div class="slider-content-area">  
                        <div class="container">
                            <div class="row">
                                <div class="col-md-7"> 
                                    <div class="slide-content-wrapper">
                                        <div class="slide-content">
                                            <h3>OUR MOTTO</h3>
                                            <h2>ENVISAGE,ENLIGHTEN,EMPOWER</h2>
                                            <p>Our Emblem depicts the head of two lions, an open book and birds flight towards the rising sun.</p>
                                            <a class="default-btn" href="{{url('/about')}}">Learn more</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="slider-img">
                                        <img src="{{url('website')}}/assets/img/slider/home.png" alt="slider">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Start Slider Content -->
                </div>
                <!-- End Slingle Slide -->								
            </div>
        </section>
		<!-- Background Area End -->
   
        <!-- Notice Start -->
        <section class="notice-area two three pt-140 pb-100">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="notice-right-wrapper mb-25 pb-25">
                            <h3>TAKE A VIDEO TOUR</h3>
                            <div class="notice-video">
                                <div class="video-icon video-hover">
                                    <a class="video-popup" href="#">
                                        <i class="zmdi zmdi-play"></i>
                                    </a>
                                </div>
                            </div>
                        </div> 
                    </div>
                    <div class="col-md-6">
                        <div class="notice-left-wrapper">  
                            <h3>notice board</h3>
                            <div class="notice-left">
                                <marquee direction="up" scrollamount="2" behavior="alternate">
                                @foreach ($notice as $notice)

                                <div class="single-notice-left mb-23 pb-20">
                                    <h4>Published Date : {{$notice->created_at->format('d/m/Y')}}</h4>
                                    <p>{{$notice->title}}</p>
                                </div>

                                @endforeach
                                </marquee>
                              
                            </div>
                        </div>    
                    </div>
                </div>
            </div>
        </section>
        <!-- Notice End -->
        <!-- About Start -->
        <div class="about-area pb-135 pt-130 bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="about-content">
                            <h2>SARYU <span>INTERNATIONAL</span> SCHOOL</h2>
                            <p>Saryu International School, Ayodhya is a co-education school run on public school lines with tradition of providing quality education to all. The school provides good quality modern education including a strong component of culture, inculcation of values, awareness of environment, adventure activities and physical education. New programmes and innovative practices and activities are organized as a part of curriculum transaction for setting and maintaining higher standards of students’ performance.</p>
                            <a class="default-btn" href="{{url('/about')}}">Know More....</a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="about-img">
                            <img src="{{url('website')}}/assets/img/about/abt.png" alt="about">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->
        <!-- Event Area Start -->
        <div class="event-area three text-center pt-100 pb-115">
            <div class="container">
                <div class="row">
                     <div class="col-12">
                        <div class="section-title">
                            <img src="{{url('website')}}/assets/img/icon/section.png" alt="section-title">
                            <h2>Our Recent Gallery</h2>
                        </div>
                    </div>
                </div>
                <div class="row">

                    @foreach ($gallery as $photo)

                    <div class="col-lg-4 col-md-6">
                        <div class="single-event mb-35">
                            <div class="event-img">
                                <a href="#">
                                    <img src="{{asset('storage/gallery/'.substr($photo->file_image, 15))}}" alt="{{$photo->title}}">
                                    <div class="course-hover">
                                        <i class="fa fa-link"></i>
                                    </div>
                                </a>
                                <div class="event-date">
                                    <h3><span>Recent</span></h3>  
                                </div>
                            </div>
                            <div class="event-content text-start">
                                <h4><a href="#">{{$photo->title}}</a></h4>
                              
                                <div class="event-content-right">
                                    <a class="default-btn" href="{{url('/gallery')}}">More...</a>
                                </div>
                            </div>
                        </div>
                    </div>
 
                    @endforeach
                 


                </div>
            </div>
        </div>
        <!-- Event Area End -->
      
        <!-- Subscribe Start -->
        <div class="subscribe-area pt-60 pb-70">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <div class="subscribe-content section-title text-center">
                            <h2>subscribe our newsletter</h2>
                            <p>Subcribe now for update about Notification of Admission, etc...</p>
                        </div>
                        <div class="newsletter-form mc_embed_signup">
                            <form action="#" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                                <div id="mc_embed_signup_scroll" class="mc-form"> 
                                    <input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="Enter your e-mail address" required>
                                    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                                    <div class="mc-news" aria-hidden="true"><input type="text" name="b_6bbb9b6f5827bd842d9640c82_05d85f18ef" tabindex="-1" value=""></div>
                                    <button id="mc-embedded-subscribe" class="default-btn" type="submit" name="subscribe"><span>subscribe</span></button> 
                                </div>    
                            </form>
                            <!-- mailchimp-alerts Start -->
                            <div class="mailchimp-alerts">
                                <div class="mailchimp-submitting"></div><!-- mailchimp-submitting end -->
                                <div class="mailchimp-success"></div><!-- mailchimp-success end -->
                                <div class="mailchimp-error"></div><!-- mailchimp-error end -->
                            </div>
                            <!-- mailchimp-alerts end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Subscribe End -->

@endsection
