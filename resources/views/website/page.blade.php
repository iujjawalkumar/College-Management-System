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
                            <h2>{{$page->name}}</h2> 
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>    

		
            
   
 <!-- Notice Start -->
 <section class="notice-area two three pt-140 pb-100">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                {!!$page->des!!}
            </div>
            <div class="col-md-4">
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
    

@endsection
