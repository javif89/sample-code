@extends('website.layouts.main')
@section('title') Contact Us | Ricoma Embroidery Machines @endsection
@section('meta-description') Want to learn more about our embroidery machines? Contact us today to speak with a product specialist! @endsection
{{-- @section('seo-keywords') {{ $product }} @endsection --}}
@section('image') {{ asset('/images/Contact_Us/Get in touch hero.jpg') }} @endsection
@section('og-title') Contact Us | Ricoma Embroidery Machines @endsection
@section('og-image') {{ asset('/images/Contact_Us/Get in touch hero.jpg') }} @endsection
@section('og-description') Want to learn more about our embroidery machines? Contact us today to speak with a product specialist! @endsection
@section('content')
<div class="container-fluid" id="contact-container">
    <div class="hero_wrapper">
        <div class="hero_header">{{__('contact-us.hero-header')}}</div>
        <div class="hero_subheader">
            Speak to a product specialist today
        </div>
    </div>

    <div class="contact-form-container">
        <div class="contact-form">
            <div class="contact-header">
                {{__('contact-us.contact-header')}}
            </div>
            <div class="contact-description">
                Want to learn more about our embroidery machines? Fill out the contact form below, and someone from our team will
                contact you as soon as possible!
            </div>
            <div id="hubspot-form" class="form-input-container">
                <!--[if lte IE 8]>
                            <script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2-legacy.js"></script>
                            <![endif]-->
                <script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2.js"></script>
                <script>
                    hbspt.forms.create({
                            	portalId: "3019581",
                                formId: "6145b537-8648-4cc3-80f7-0bc49202fdb5",
                            });
                </script>
            </div>
        </div>
        <div class="maps-container">
            <div class="mia-map-container">
                <div class="map">
                    <iframe class="snazzy-map" src="https://snazzymaps.com/embed/57717" width="371px" height="147px" style="border:none;">
                    </iframe>
                </div>
                <div class="office-info-container">
                    <div class="headquarters-header form-group">MIAMI HEADQUARTERS</div>
                    <div class="headquarters-body">
                        <div class="form-group info-container">
                            <div class="office-info">
                                <label for="">ADDRESS</label>
                                <div class="address">11555 NW 124th Street Miami, FL 33178</div>
                            </div>
                        </div>
                        <div class="form-group info-container">
                            <div class="office-info">
                                <label for="">PHONE</label>
                                <div class="info">305-418-4421</div>
                            </div>
                            <div class="office-info">
                                <label for="">TOLL-FREE</label>
                                <div class="info">1-888-292-6282</div>
                            </div>
                        </div>
                        <div class="info-container contact-container">
                            <div class="office-info">
                                <label for="">FAX</label>
                                <div class="info">305-418-5036</div>
                            </div>
                            <a href="{{getRoute('tech-support-page')}}" class="office-info">
                                <div class="contact-support-btn">
                                    Contact Support
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ca-map-container">
                <div class="map">
                    <iframe class="snazzy-map" src="https://snazzymaps.com/embed/59521" width="371px" height="147px"style="border:none;"></iframe>
                    </iframe>
                </div>
                <div class="office-info-container">
                    <div class="headquarters-header form-group">WEST COAST SERVICE CENTER</div>
                    <div class="headquarters-body">
                        <div class="form-group info-container">
                            <div class="office-info">
                                <label for="">ADDRESS</label>
                                <div class="address">10544 Progress Way, Unit E Cypress, CA 90630</div>
                            </div>
                        </div>
                        <div class="info-container contact-container">
                            <div class="office-info">
                                <label for="">PHONE</label>
                                <div class="info">305-418-4421</div>
                            </div>
                            <a href="{{getRoute('tech-support-page')}}" class="office-info">
                                <div class="contact-support-btn">
                                    Contact Support
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hours-container">
                <div class="form-group hour-info-container">
                    <hr>
                    <div class="office-info">
                        <label for="">HOURS</label>
                    </div>
                    <div class="form-group hours-info">
                        <label for="">Regular Hours:</label>
                        <div class="hours">
                            Monday-Friday 9:00am to 5:30pm
                        </div>
                    </div>
                    <div class="form-group hours-info">
                        <label for="">Weekday After Hours:</label>
                        <div class="hours">
                            Monday-Friday 5:30pm to 9:00pm
                        </div>
                    </div>
                    <div class="form-group hours-info">
                        <label for="">Weekend Hours:</label>
                        <div class="hours">
                            Saturday & Sunday 9:00am to 5:30pm
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="contact-footer-container">
        <div class="contact-footer-section">
            <div class="footer-section-group section-1">
                <div class="section-img">
                    <img class="img-fluid" src="{{asset("/images/Contact_Us/Need Support.jpg")}}" alt="" srcset="">
                </div>
                <div class="section-header">
                    Need Support?
                </div>
                <div class="section-text">
                    Reach out to our technical support team who can help you find answers.
                </div>
                <div class="section-link">
                <a href="{{getRoute('tech-support-page')}}">Talk to support <i class="fas fa-chevron-right"></i></a>
                </div>
            </div>
            <div class="footer-section-group">
                <div class="section-img">
                    <img class="img-fluid" src="{{asset("/images/Contact_Us/Community.jpg")}}" alt="" srcset="">
                </div>
                <div class="section-header">
                    Community
                </div>
                <div class="section-text">
                    You're never alone with our Facebook groups filled with Ricoma staff and customers who are ready to help.
                </div>
                <div class="section-link">
                    <a href="https://www.facebook.com/groups/embroiderymastery" target="_blank">Check out our Facebook page<i class="fas fa-chevron-right"></i></a>
                </div>
            </div>
            <div class="footer-section-group section-3">
                <div class="section-img">
                    <img class="img-fluid" src="{{asset("/images/Contact_Us/Watch & Learn.jpg")}}" alt="" srcset="">
                </div>
                <div class="section-header">
                    Watch & Learn
                </div>
                <div class="section-text">
                    Check out our Youtube chanel to learn how to get creative with your machine.
                </div>
                <div class="section-link">
                    <a href="https://www.youtube.com/user/RiCOMAmiami" target="_blank">Explore videos <i class="fas fa-chevron-right"></i></a>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection