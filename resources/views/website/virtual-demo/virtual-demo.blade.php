@extends('website.layouts.main')
@section('title') Virtual Demo | Schedule a Free Virtual Demo | Ricoma @endsection
@section('meta-description') Sign up today for a free virtual demo to watch our embroidery machines running in real time from the comfort of your
home. @endsection
{{-- @section('seo-keywords') {{ $product }} @endsection --}}
@section('image') {{ asset('/images/virtual-demo-banner.jpg') }} @endsection
@section('og-title') Virtual Demo | Schedule a Free Virtual Demo | Ricoma @endsection
@section('og-image') {{ asset('/images/virtual-demo-banner.jpg') }} @endsection
@section('og-description') Sign up today for a free virtual demo to watch our embroidery machines running in real time from the comfort of your
home. @endsection
@section('content')
<div class="container-fluid" id="virtual-demo-container">
    <div class="hero_wrapper">
        <div class="hero_header">{{__('Schedule a free virtual demo')}}</div>
        <div class="hero_subheader">
            {{__(
                'Sign up for a free virtual demo to watch our machines running in real time from the comfort of your home. Ask our
                product specialists all of your embroidery machine questions during your free one-on-one session.'
            )}}
        </div>
    </div>

    <div class="contact-form-container">
        <div class="contact-form">
            <div class="contact-header">
                {{__('Reserve your spot')}}
            </div>
            <div class="contact-description">
                {{__('Select a machine, time and date to schedule your personal demo')}}.
            </div>

            <div id="hubspot-form" class="form-input-container hubspot-demo">
            <!--[if lte IE 8]>
            <script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2-legacy.js"></script>
            <![endif]-->
            <script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2.js"></script>
            <script>
                hbspt.forms.create({
            	portalId: "3019581",
            	formId: "fb8b428f-f97c-4917-ae33-ecbb1a49dd7b"
            });
            </script>
            </div>
        </div>
        <div class="maps-container bg-light px-5">
            <div class="my-4">
                @include('website.components.video', ['thumbnail' => '/images/virtual-demo-vid-thumb.png', 'src' =>
                'https://videos.sproutvideo.com/embed/489addb71e19edccc0/cf3e8752ddb11ca4'])
            </div>
            <p class="bold">
                {{__('
                    Why wait for a show to pop up in your area when you can get all the benefits of a trade show from the comfort of your
                    own home? Here’s how it works...
                ')}}
            </p>
            <ul class="mt-4 ricoma-ul p-0">
                <li class="mt-5">
                    {{__('
                        You’ll set up an appointment when it’s most convenient for you. At that time and date, we’ll give you a call through
                        FaceTime or Skype. 
                    ')}}
                </li>
                <li class="mt-5">
                    {{__('
                        During the call, we’ll show you anything you’d like to see on the machine. We’ll even run a design, so you can get the
                        experience of watching the machine live without having to spend any time or money going to a trade show.
                    ')}}
                </li>
                <li class="mt-5">
                    {{__('
                        We’ll also answer any and all of your embroidery machine questions. And don’t worry, there’s no commitment necessary.
                        We’re just here to help you learn more!
                    ')}}
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection