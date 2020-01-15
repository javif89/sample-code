@extends('website.layouts.main')

@section('content')
<div id="training">
    <div class="hero text-white">
        <div class="content">
            <p class="text-uppercase bold letter-spacing-2 mb-0" style="opacity: 0.5;">Ricoma training</p>
            <h2>
                Go from beginner to pro <br class="d-none d-lg-inline"> with our training program
            </h2>
            <p style="font-size: 20px;">
                Get to know your embroidery machine like the back of <br class="d-none d-lg-inline">
                your hand with our free onsite and online training options.
            </p>
            <a class="btn orange_gradient_btn mt-3 ml-lg-0 m-auto" href="{{getRoute('contact-page')}}">
                Contact Us
            </a>
        </div>
    </div>
    <div id="training-grid">
        <div id="onsite-training" class="text-white verticenter text-center item">
            <h3>Onsite Training</h3>
            <p class="">
                Gain first-hand embroidery experience with our free onsite training at our headquarters in Miami, Florida. You'll learn
                everything from the proper materials to use for high-quality embroidery to the right techniques for preparing your
                shirts, caps and more for an efficient embroidery run.
            </p>
        </div>
        <div id="online-training" class="text-white verticenter text-center item">
            <h3>Online Training</h3>
            <p class="">
                Convenience is key. That's why we provide hands-on online training, so you can work on your own machine from the comfort
                of your home. With detailed training on the embroidery process from start to finish, you'll get the full training
                experience, no matter where you are.
            </p>
        </div>
    </div>
    <div class="py-5">
        <div class="container text-lg-left text-center">
            <div class="row">
                <div class="col-lg-6 verticenter">
                    <div class="d-lg-none text-right" style="width: 75%;">
                        <img src="/images/training/pretraining.png" alt="" class="img-fluid my-4"
                            style="width: 70%; height: auto; margin: auto;">
                    </div>
                    <div class="verticenter text-lg-left text-center">
                        <h1>Courtesy <br class="d-none d-md-inline"> pre-training eCourse</h1>
                    </div>
                    <div class="text-md-left text-center">
                        <p class="mb-0">
                            Each Ricoma embroidery machine package grants you access to our FREE online pre-training course, which includes videos,
                            resources and quizzes to prepare you for your official hands-on training. You’ll learn embroidery basics and what to
                            expect before diving into your first project!
                        </p>
                    </div>
                </div>
                <div class="col-lg-6 d-none d-lg-block">
                    <img src="/images/training/pretraining.png" alt="" class="img-fluid">
                </div>
            </div>
            <div class="row my-lg-0 my-5">
                <div class="col-lg-6 px-lg-5 d-none d-lg-block">
                    <img src="/images/training/support.png" alt="" class="img-fluid">
                </div>
                <div class="col-lg-6 verticenter">
                    <div class="d-lg-none text-center">
                        <img src="/images/training/support.png" alt="" class="img-fluid my-4"
                            style="width: 70%; height: auto; margin: auto;">
                    </div>
                    <div class="verticenter text-lg-left text-center">
                        <h1>7-day customer support <br class="d-none d-lg-inline"> — even after hours</h1>
                    </div>
                    <div class="text-md-left text-center">
                        <p class="mb-0">
                            Working late nights and weekends? We’ll be there for you every step of the way with our customer support lines open 7
                            days a week, even after hours. You can rest assured that if you ever need a hand, we’re only one call away.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 verticenter">
                    <div class="d-lg-none text-center">
                        <img src="/images/training/online-community.png" alt="" class="img-fluid d-lg-none my-4"
                            style="width: 70%; height: auto; margin: auto;">
                    </div>
                    <div class="verticenter text-lg-left text-center">
                        <h1>Exclusive online <br class="d-none d-lg-inline"> support group</h1>
                    </div>
                    <div class="text-md-left text-center">
                        <p class="mb-0">
                            You'll never be alone with a growing online community of decorators in our exclusive Facebook support group for Ricoma
                            customers. In it, you’ll find thousands of decorators waiting to help you, no matter what part of your embroidery
                            journey you are in. You’ll also find Ricoma staff cheering you on and answering any questions you have.
                        </p>
                    </div>
                </div>
                <div class="col-lg-6 d-none d-lg-block">
                    <img src="/images/training/online-community.png" alt="" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
    <div class="py-5"
        style="background: url('/images/orange-circle-bg.png') no-repeat center center; background-size: cover;">
        @include('website.training.partials.carousel')
    </div>
    <div class="py-5">
        <h1 class="text-center">
            Endless resources <br class="d-none d-md-inline">
            <i class="">at your fingertips</i>
        </h1>
        <p class="text-center mt-3" style="font-size: 20px;">
            We've got you covered with the resources you <br class="d-none d-lg-inline"> need to learn everything you can about your business.
        </p>
        <div class="container">
            <div class="row mt-5">
                <div class="col-lg-4 text-lg-center text-md-left text-center resource mb-md-0 mb-3">
                    <div class="row">
                        <div class="col-lg-12 col-md-5 col-12 verticenter">
                            <img src="/images/training/embroidery-hub.png" alt="" class="img-fluid">
                        </div>
                        <div class="col-lg-12 col-md-7 col-12 verticenter">
                            <h4>Embroidery Hub</h4>
                            <p class="">
                                Discover creative embroidery ideas and learn the best practices for high-quality embroidery with our popular YouTube
                                series, Embroidery Hub!
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 text-lg-center text-md-left text-center resource mb-md-0 mb-3">
                    <div class="row">
                        <div class="col-lg-12 col-md-5 col-12 verticenter">
                            <img src="/images/training/blog.png" alt="" class="img-fluid">
                        </div>
                        <div class="col-lg-12 col-md-7 col-12 verticenter">
                            <h4>Ricoma Blog</h4>
                            <p class="">
                                Learn everything you need to know about running an embroidery business, from the best materials to source to tips on
                                growing your business.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 text-lg-center text-md-left text-center resource mb-md-0 mb-3">
                    <div class="row">
                        <div class="col-lg-12 col-md-5 col-12 verticenter">
                            <img src="/images/training/ricoma-club.png" alt="" class="img-fluid">
                        </div>
                        <div class="col-lg-12 col-md-7 col-12 verticenter">
                            <h4>Ricoma Club</h4>
                            <p class="">
                                Keep up to date with all of the useful blogs and videos we publish weekly when you sign up for the Ricoma club. (It’s
                                free!)
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="py-5" style="background-color: #fafafa;">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 verticenter order-lg-1 order-2">
                    <h1 class="text-lg-left text-center mt-lg-0 mt-4">Business support</h1>
                    <p class="">
                        Whether you're watching our business YouTube series, Apparel Academy, or getting business advice from our product
                        specialists, you don't have to start or grow your business alone. We've got you covered with all of the resources and
                        tips you need to take your business to the next level.
                    </p>
                </div>
                <div class="col-lg-5 order-lg-2 order-1 px-lg-2 px-5">
                    <img src="/images/training/business-support.png" alt="" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection