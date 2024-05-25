@extends('website.layouts.main')
@section('main-container')

	<!-- Banner Area Start -->
    <div class="banner-area-wrapper">
        <div class="banner-area text-center">	
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="banner-content-wrapper">
                            <div class="banner-content">
                                <h2>contact</h2> 
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>    
    <!-- Banner Area End -->
    <!-- Contact Start -->
    <div class="map-area">
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14246.006599871545!2d82.1999039!3d26.7921511!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x399a07ec94ec541d%3A0x712a0e8c6e91482a!2sSaryu%20International%20School!5e0!3m2!1sen!2sin!4v1706964435062!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></div>
    <div class="contact-area pt-150 pb-140"> 
        <div class="container">     
            <div class="row">
                <div class="col-lg-5 col-md-5">
                    <div class="contact-contents text-center">
                        <div class="single-contact mb-65">
                            <div class="contact-icon">
                                <img src="{{url('website')}}/assets/img/contact/contact1.png" alt="contact">
                            </div>
                            <div class="contact-add">
                                <h3>address</h3>
                                <p>Majha Barheta, near Police Booth, Ayodhya, Uttar Pradesh 224001</p>
                               
                            </div>
                        </div>
                        <div class="single-contact mb-65">
                            <div class="contact-icon">
                                <img src="{{url('website')}}/assets/img/contact/contact2.png" alt="contact">
                            </div>
                            <div class="contact-add">
                                <h3>Contact No.</h3>
                                <p>+91 7905181449</p>
                          
                            </div>
                        </div>
                        <div class="single-contact">
                            <div class="contact-icon">
                                <img src="{{url('website')}}/assets/img/contact/contact3.png" alt="contact">
                            </div>
                            <div class="contact-add">
                                <h3>E-Mail & Web</h3>
                                <p>info@saryuinternationalschool.com
                                    </p>
                             
                            </div>
                        </div>
                    </div>
                </div>    
                <div class="col-lg-7 col-md-7">
                    <div class="reply-area">
                        <h3>LEAVE A message</h3>
                        <p>Saryu International School, Ayodhya is a co-education school run on public school lines with tradition of providing quality education to all.</p>
                        <form id="contact-form" action="#">
                            <div class="row">
                                <div class="col-md-12">
                                    <p>Name</p>
                                    <input type="text" name="con_name">
                                </div>
                                <div class="col-md-12">
                                    <p>Email</p>
                                    <input type="text" name="con_email">
                                </div>
                                <div class="col-md-12">
                                    <p>Subject</p>
                                    <input type="text" name="con_subject">
                                    <p>Massage</p>
                                    <textarea name="con_message" cols="15" rows="10"></textarea>
                                </div>
                            </div>
                            <button class="reply-btn" type="submit"><span>send message</span></button>
                            <p class="form-message"></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->
  

@endsection
