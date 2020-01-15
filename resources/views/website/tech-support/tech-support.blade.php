@extends('website.layouts.main')
@section('title') Contact Support | Unlimited Technical Support | Ricoma @endsection
@section('meta-description') Have a technical question about your machine and need to speak to our service team? Click here to receive unlimited
technical support every day of the week. @endsection
{{-- @section('seo-keywords') {{ $product }} @endsection --}}
@section('image') {{ asset('/images/tech-support-banner.jpg') }} @endsection
@section('og-title') Contact Support | Unlimited Technical Support | Ricoma @endsection
@section('og-image') {{ asset('/images/tech-support-banner.jpg') }} @endsection
@section('og-description') Have a technical question about your machine and need to speak to our service team? Click here to receive unlimited
technical support every day of the week. @endsection
@section('content')
<div class="container-fluid" id="tech-support-container">
    <div class="hero_wrapper">
        <div class="hero_header">{{__('Contact our Service Team')}}</div>
        <div class="hero_subheader">
            {{__(
                    'Receive unlimited technical support every day of the week'
                )}}
        </div>
    </div>

    <div class="contact-form-container">
        <div class="contact-form">
            <div class="contact-header">
                {{__('Help us help you')}}
            </div>
            <div class="contact-description">
                {{__('Fill out the form and we\'ll get back to you with a solution to your problem shortly.')}}
            </div>
            <div id="hubspot-form" class="form-input-container support-form">

                <!--[if lte IE 8]>
                <script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2-legacy.js"></script>
                <![endif]-->
                <script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2.js"></script>
                <script>
                    hbspt.forms.create({
                        portalId: "3019581",
                        formId: "0c5c5d95-0c5c-4c13-b68f-d93e38aa69b1",
                    });
                </script>
            </div>
        </div>
        <div class="maps-container bg-light px-3">
            <div class="headquarters-header form-group ml-0 mt-3">EMAIL + PHONE SUPPORT</div>
            <p class="">
                Our factory trained and certified technical staff is ready to help at any time.
            </p>
            <div class="headquarters-body ml-0 pl-0">
                <div class="form-group info-container ml-0">
                    <div class="office-info ml-0">
                        <label for="">PHONE</label>
                        <div class="info">305-418-4421</div>
                    </div>
                </div>
                <div class="form-group info-container ml-0">
                    <div class="office-info ml-0">
                        <label for="">TOLL FREE</label>
                        <div class="info">1-888-292-6282</div>
                    </div>
                </div>
                <div class="form-group info-container ml-0">
                    <div class="office-info ml-0">
                        <label for="">FAX</label>
                        <div class="info">305-418-5036</div>
                    </div>
                </div>
            </div>
            <div class="hours-container px-0" style="background: transparent;">
                <div class="form-group hour-info-container">
                    <div class="office-info ml-0">
                        <label for="">HOURS</label>
                    </div>
                    <div class="form-group hours-info ml-0">
                        <label for="">Regular Hours:</label>
                        <div class="hours">
                            Monday-Friday 9:00am to 5:30pm
                        </div>
                    </div>
                    <div class="form-group hours-info ml-0">
                        <label for="">Weekday After Hours:</label>
                        <div class="hours">
                            Monday-Friday 5:30pm to 9:00pm
                        </div>
                    </div>
                    <div class="form-group hours-info ml-0">
                        <label for="">Weekend Hours:</label>
                        <div class="hours">
                            Saturday & Sunday 9:00am to 5:30pm
                        </div>
                    </div>
                </div>
            </div>
            <div class="my-4">
                <hr>
            </div>
            <div class="headquarters-header form-group ml-0">SKYPE SUPPORT</div>
            <p>
                If you have a webcam, contact us on Skype during our regular hours (Monday to Friday, 9 a.m. to 5:30
                p.m.).
            </p>
            <p>
                To do so, just add the following Skype name on your Skype contacts list: service.ricoma to start communicating with us
                instantly.
            </p>
            <p>
                If you do not have a Skype account, you may download and register at <a href="https://skype.com"
                    class="">www.skype.com</a>
            </p>
        </div>
    </div>
</div>
@endsection
@push('scripts')
    <script>
    $(document).ready(()=> {
        $("#hubspot-form").on('hsvalidatedsubmit', '.hs-form', function (e) {

        let data = $('.hs-form').serializeArray()
        let dataObj = assignData(data);
        submitSupportTicket(dataObj);
        });
        function assignData(formData) {
            let dataObj = {};
            
            for (let i = 0; i < formData.length; i++) { 
                dataObj[formData[i]['name']]=formData[i]['value']; 
            }
            dataObj['firstname'] = $('#firstname-0c5c5d95-0c5c-4c13-b68f-d93e38aa69b1').val();
            dataObj['lastname'] = $('#lastname-0c5c5d95-0c5c-4c13-b68f-d93e38aa69b1').val();
            dataObj['email'] = $('#email-0c5c5d95-0c5c-4c13-b68f-d93e38aa69b1').val();
            return dataObj;
        }
        function submitSupportTicket(dataObj) {
            $.ajax({
                async: true,
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: {!!json_encode(getRoute('submit-ticket'))!!},
                data: JSON.stringify(dataObj),
                contentType: "application/json; charset=utf-8",
                dataType: "json",
                success: function(response){
                    // console.log('response is: ', response)
                    if(response.status === 200){
                        window.location = {!!json_encode(getRoute('thank-you-page'))!!}
                    }
                },
                error: function(xhr, status, code) {
                    console.log(status);
                    console.log(code);
                }
            })
        }
    })
    </script>
@endpush