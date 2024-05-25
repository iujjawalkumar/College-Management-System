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
                            <h2>Video Gallery</h2> 
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
                            <h2>Our Recent Video Gallery</h2>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="col-lg-4">
                        <iframe width="560" height="315" src="#" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                        
                    </div>
 
             
                 


                </div>
            </div>
        </div>
        <!-- Event Area End -->
      
    

@endsection
