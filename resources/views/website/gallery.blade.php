@extends('website.layouts.main')
@section('main-container')

<!-- header -->
<div class="banner-area-wrapper">
    <div class="banner-area text-center">	
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="banner-content-wrapper">
                        <div class="banner-content">
                            <h2>Photo Gallery</h2> 
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>    

		
            
   
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
      
    

@endsection
