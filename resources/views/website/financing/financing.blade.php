@extends('website.layouts.main')
@section('title') Financing | Ricoma | Start your Embroidery Business with Ease @endsection
@section('meta-description') Join the thousands of embroiderers who started a business with Ricoma’s financing. With 0% financing options and leasing
opportunities, it's easier than ever to start (or expand) your embroidery business @endsection
{{-- @section('seo-keywords') {{ $product }} @endsection --}}
@section('image') {{ asset('/images/financing/hero-desktop.png') }} @endsection
@section('og-title') Financing | Ricoma | Start your Embroidery Business with Ease @endsection
@section('og-image') {{ asset('/images/financing/hero-desktop.png') }} @endsection
@section('og-description') Join the thousands of embroiderers who started a business with Ricoma’s financing. With 0% financing options and leasing
opportunities, it's easier than ever to start (or expand) your embroidery business @endsection
@section('content')
    <div id="financing">
        <div class="hero text-white">
            <div class="content">
                <p class="text-uppercase bold letter-spacing-2" style="opacity: 0.5;">Financing and Leasing</p>
                <h2>
                    Join the thousands <br class="d-none d-lg-inline">
                    of embroiderers who <br class="d-none d-lg-inline">
                    started a business <br class="d-none d-lg-inline"> 
                    with Ricoma’s financing
                </h2>
                <p style="font-size: 20px;">
                    Our flexible options make starting an embroidery <br class="d-none d-lg-inline">
                    business quick, easy and best of all, affordable!
                </p>
                <button class="btn apply-btn orange_gradient_btn mt-3 ml-lg-0 m-auto" data-toggle="modal" data-target="#form-modal">Apply Now</button>
            </div>
        </div>
        <div class="py-5">
            <h2 class="bold text-center mx-lg-0 mx-3">Start your embroidery business with ease</h2>
            <div class="mt-3">
                <div class="container bg-white py-lg-5 py-3 px-lg-5 px-3 text-left" style="border-radius: 16px;">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="checkmark-item">
                                <img src="{{asset(('/images/financing/1.svg'))}}" alt="" class="img-fluid">
                                <div class="content">
                                    <h3>Cash flow management</h3>
                                    <p class="">Low monthly payments and minimal up front cash outlay.</p>
                                </div>
                            </div>
                            <div class="checkmark-item">
                                <img src="{{asset('/images/financing/2.svg')}}" alt="" class="img-fluid">
                                <div class="content">
                                    <h3>Speed</h3>
                                    <p>Short one-page application with quick approvals. You’ll be closer to owning an embroidery machine in no time!</p>
                                </div>
                            </div>
                            <div class="checkmark-item">
                                <img src="{{asset('/images/financing/3.svg')}}" alt="" class="img-fluid">
                                <div class="content">
                                    <h3>Flexibility</h3>
                                    <p>100% financing of the invoice including any add-on items such as hardware or software.</p>
                                </div>
                            </div>
                            <div class="checkmark-item">
                                <img src="{{asset('/images/financing/4.svg')}}" alt="" class="img-fluid">
                                <div class="content">
                                    <h3>No blanket lien</h3>
                                    <p>Only the equipment is required as collateral. Your personal and business assets remain protected.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="checkmark-item">
                                <img src="{{asset('/images/financing/5.svg')}}" alt="" class="img-fluid">
                                <div class="content">
                                    <h3>Tax advantages</h3>
                                    <p>Qualifies for the Section 179 deduction.</p>
                                </div>
                            </div>
                            <div class="checkmark-item">
                                <img src="{{asset('/images/financing/6.svg')}}" alt="" class="img-fluid">
                                <div class="content">
                                    <h3>Fixed payments</h3>
                                    <p>Unlike financing with your line of credit or credit card, payments and interest rates are fixed.</p>
                                </div>
                            </div>
                            <div class="checkmark-item">
                                <img src="{{asset('/images/financing/7.svg')}}" alt="" class="img-fluid">
                                <div class="content">
                                    <h3>Protected lines of credit</h3>
                                    <p>Qualifies for the Section 179 deduction.</p> <br class="d-none d-lg-inline">
                                </div>
                            </div>
                            <div class="checkmark-item">
                                <img src="{{asset('/images/financing/8.svg')}}" alt="" class="img-fluid">
                                <div class="content">
                                    <h3>Avoid obsolescence</h3>
                                    <p>Financing affords you the best technology available today and allows the option to upgrade your equipment when it has
                                    outlived its use.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="review">
            <img src="{{asset('/images/financing/wendy.png')}}" alt="" class="customer-pic">
            <p class="quote">
                “Just filled out the paperwork yesterday…I qualified for the financing and <br class="d-none d-lg-inline">
                I have to say the young woman who
                contacted
                me after I sent my request <br class="d-none d-lg-inline">
                for more info was AMAZING. She called me and walked me through every <br class="d-none d-lg-inline">
                step of the process.
                I’m
                so excited! Now I’m just rearranging my workshop <br class="d-none d-lg-inline">
                and deciding where it will go once it gets here!”
            </p>
            <p class="name">Wendy SueAnn</p>
            <p class="machine">EM-1010 Machine Owner</p>
        </div>
        <div class="py-5">
            <div class="container text-lg-left text-center">
                <div class="row text-center text-md-left">
                    <div class="col-lg-6 verticenter">
                        <div class="d-md-flex">
                            <div class="verticenter">
                                <h1>Why finance <br class="d-none d-md-inline d-lg-none"> or lease?</h1>
                            </div>
                            <div class="d-lg-none text-right" style="width: 75%;">
                                <img src="/images/financing/why.png" alt="" class="img-fluid my-4"
                                    style="width: 70%; height: auto; margin: auto;">
                            </div>
                        </div>
                        <p class="">
                            With 0% financing options and leasing opportunities, it’s no wonder more people are starting (or expanding) their
                            embroidery business.  
                        </p>
                        <p class="">
                            And our flexible financing options allow even the smallest of businesses to see a return on investment quicker with
                            interest-free payments.
                        </p>
                        <p class="">
                            No hassle and little to no upfront costs means you have the chance to start profiting right away, stress free.
                        </p>
                        <p class="">
                            Learn more about our financing and leasing programs to see which option works for you!
                        </p>
                        <p><a data-toggle="modal" href="#form-modal" class="learn-more-link">Learn More <i class="fa fa-arrow-right"></i></a></p>
                    </div>
                    <div class="col-lg-6 d-none d-lg-block">
                        <img src="{{asset('/images/financing/why.png')}}" alt="" class="img-fluid">
                    </div>
                </div>
                <div class="row my-lg-0 my-5 text-center text-md-left">
                    <div class="col-lg-6 px-lg-5 d-none d-lg-block">
                        <img src="{{asset('/images/financing/financing.png')}}" alt="" class="img-fluid">
                    </div>
                    <div class="col-lg-6 verticenter">
                        <div class="d-md-flex">
                            <div class="d-lg-none d-md-block d-none text-left">
                                <img src="{{asset('/images/financing/financing.png')}}" alt="" class="img-fluid my-4"
                                    style="width: 70%; height: auto; margin: auto;">
                            </div>
                            <div class="verticenter">
                                <h1>Personal financing</h1>
                                <img src="{{asset('/images/financing/financing.png')}}" alt="" class="img-fluid d-md-none my-4"
                                    style="width: 70%; height: auto; margin: auto;">
                            </div>
                        </div>
                        <p class="">
                            Want to start or grow your embroidery business, but simply don’t have the upfront capital to make it happen?  
                        </p>
                        <p class="">
                            0% financing allows you to make interest-free payments, which means you’ll only cover the true cost of your machine. The
                            money you save on interest?
                        </p>
                        <p class="">
                            You can put right back into advertising and growing your business.
                        </p>
                        <p><a data-toggle="modal" href="#form-modal" class="learn-more-link">Apply Now <i class="fa fa-arrow-right"></i></a></p>
                    </div>
                </div>
                <div class="row text-center text-md-left">
                    <div class="col-lg-6 verticenter">
                        <div class="d-md-flex">
                            <div class="verticenter">
                                <h1>Leasing programs</h1>
                            </div>
                            <div class="d-lg-none text-md-right text-center">
                                <img src="{{asset('/images/financing/leasing.png')}}" alt="" class="img-fluid d-lg-none my-4"
                                    style="width: 70%; height: auto; margin: auto;">
                            </div>
                        </div>
                        <p class="">
                            Want to establish your business’ credit history and get low monthly payments at the same time?   
                        </p>
                        <p class="">
                            Our leasing programs help business owners secure their equipment through their business’ credit line and build the
                            credit history they need to grow their business.
                        </p>
                        <p class="">
                            And with a lease-to-own option, the machine is yours once you pay it off.
                        </p>
                        <p class="">
                            Simply submit an application and we’ll find you a bank to loan from that fits your current situation!
                        </p>
                        <p><a data-toggle="modal" href="#form-modal" class="learn-more-link">Apply Now <i class="fa fa-arrow-right"></i></a></p>
                    </div>
                    <div class="col-lg-6 d-none d-lg-block">
                        <img src="{{asset('/images/financing/leasing.png')}}" alt="" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
        <div class="review">
            <img src="{{asset('/images/financing/jamie.png')}}" alt="" class="customer-pic">
            <p class="quote">
                “Being able to finance the 6 head machine has been a blessing. We are <br class="d-none d-lg-inline">
                able to maximize our output on product, finish
                orders early and offer our <br class="d-none d-lg-inline">
                customers better than expected customer service. The quality and the <br class="d-none d-lg-inline">
                support that Ricoma
                offers is the best in the industry. Without financing, I <br class="d-none d-lg-inline">
                would not have been able to grow my company!”
            </p>
            <p class="name">Jaime Carnes</p>
            <p class="machine">CHT2-1506 Machine Owner</p>
        </div>
        <div class="py-5">
            <h1 class="text-center">Have questions about financing? <br class="d-none d-lg-inline"> <i class="">We got answers.</i></h1>
            <div id="faq-section" class="text-left mt-5">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 offset-lg-2">
                            <div class="accordion" id="faq-accordion">
                                @component('website.product.machine.components.faq-item', ['id' => 1])
                                @slot('title')
                                How do I start the financing process?
                                @endslot
                                <p>
                                    Starting the financing process is easy! Once your account representative helps you choose the machine that fits your
                                    needs, you’ll receive an online credit application, which you can fill out from your phone or computer.
                                </p>
                                @endcomponent
            
                                @component('website.product.machine.components.faq-item', ['id' => 2])
                                @slot('title')
                                Do you offer financing on all Ricoma equipment?
                                @endslot
                                <p>
                                    Ricoma offers financing for all of our equipment. Depending on the financing option you choose, you can receive up to
                                    $20,000 for personal credit or the full amount if you are doing lease-to-own financing.
                                </p>
                                @endcomponent

                                @component('website.product.machine.components.faq-item', ['id' => 3])
                                @slot('title')
                                Do I need to have an active business to qualify for financing?
                                @endslot
                                <p>
                                    You don't need to have an active business to qualify for financing. We have programs where you can use your personal
                                    credit to finance the equipment.
                                </p>
                                @endcomponent

                                @component('website.product.machine.components.faq-item', ['id' => 4])
                                @slot('title')
                                I don't have the best credit score. Can I still finance with Ricoma?
                                @endslot
                                <p>
                                    We work with all types of credits and based on your credit score, we will be able to give you an approval amount.
                                </p>
                                @endcomponent

                                @component('website.product.machine.components.faq-item', ['id' => 5])
                                @slot('title')
                                Can I get someone to co-sign for my machine financing?
                                @endslot
                                <p>
                                    Yes, you can have someone cosign to help increase the amount you qualify for.
                                </p>
                                @endcomponent

                                @component('website.product.machine.components.faq-item', ['id' => 6])
                                @slot('title')
                                What is the maximum amount I can get financed?
                                @endslot
                                <p>
                                    You can get financed up to $20,000.00 for personal credit or the whole amount if you are doing business financing.
                                </p>
                                @endcomponent

                                @component('website.product.machine.components.faq-item', ['id' => 7])
                                @slot('title')
                                How long are the leasing options?
                                @endslot
                                <p>
                                    Leasing options can range from 12 to 60 months.
                                </p>
                                @endcomponent

                                @component('website.product.machine.components.faq-item', ['id' => 8])
                                @slot('title')
                                Can I purchase my equipment after the lease is over?
                                @endslot
                                <p>
                                    If you chose the “lease to buy option” through business financing, you will have the option to buy your equipment for $1
                                    or fair market value when the lease is over. We do not offer leasing options for personal financing. If you chose
                                    personal financing, you will already own your machine the moment you purchase it and will make payments on your machine.
                                </p>
                                @endcomponent
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="form-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-body p-0 pt-3">
                        <div class="text-center">
                            <h3>Inquire about financing & leasing</h3>
                            <p class="">Please fill out your information and we will contact you shortly.</p>
                        </div>
                        <div id="hubspot-form" class="form-input-container mt-4">
                            <!--[if lte IE 8]>
                                                    <script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2-legacy.js"></script>
                                                    <![endif]-->
                            <script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2.js"></script>
                            <script>
                                hbspt.forms.create({
                                                    	portalId: "3019581",
                                                        formId: "fe50a319-4813-4f19-9443-5fc4869b2b24",
                                                    });
                            </script>
                        </div>
                    </div>
                </div>
                <div class="mt-3 text-center">
                    <p class="text-white text-center" style="opacity: 0.6; font-size: 14px;">
                        <i class="">*Financing only applies to applicants within the United States or with a U.S. SSN.</i>
                    </p>
                    <button class="btn text-white m-auto text-center" data-dismiss="modal">
                        <span style="font-size: 35px;" class="text-center"><i class="far fa-times-circle"></i></span> <br class="">
                        <span>CLOSE</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection