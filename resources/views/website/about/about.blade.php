@extends('website.layouts.main')
@section('title') About Us | Leading Embroidery Manufacturer | Ricoma Embroidery Machines @endsection
@section('meta-description') Ricoma International Corporation is one of the world’s leading manufacturers of commercial and household embroidery
machines. Headquartered in Miami, FL, Ricoma is committed to providing top-of-the-line service and equipment. @endsection
{{-- @section('seo-keywords') {{ $product }} @endsection --}}
@section('image') {{ asset('/images/about/hero-desktop.png') }} @endsection
@section('og-title') About Us | Leading Embroidery Manufacturer | Ricoma Embroidery Machines @endsection
@section('og-image') {{ asset('/images/about/hero-desktop.png') }} @endsection
@section('og-description') Ricoma International Corporation is one of the world’s leading manufacturers of commercial and household embroidery
machines. Headquartered in Miami, FL, Ricoma is committed to providing top-of-the-line service and equipment. @endsection
@section('content')
<div id="about">
    <div class="hero text-white">
        <div class="content">
            <p class="text-uppercase bold letter-spacing-2" style="opacity: 0.5;">the ricoma way of life</p>
            <h2>
                Always <i class="">Thinking Beyond</i>
            </h2>
            <p style="font-size: 20px;">
                What started as an idea to fill a need for embroidery business owners <br class="d-none d-lg-inline">
                turned into a global operation - a brand built for
                creatives, business <br class="d-none d-lg-inline">
                savvy entrepreneurs and everyday people brought to you by a team of <br class="d-none d-lg-inline">
                thinkers, designers and
                engineers working together to create <br class="d-none d-lg-inline">
                something that will last a lifetime.
            </p>
        </div>
    </div>
    <div id="about-grid">
        <div class="d-md-none d-flex">
            <div id="cio-review" class="verticenter item">
                <img class="img-fluid" src="/images/about/cio-logo.svg"
                    style="width: 170px; height: auto; margin: 0 auto; margin-bottom: 20px;" class="" alt="">
                <p style="font-size: 23px; font-weight: bold;">
                    Top 10 Textile and Apparel <br class=""> Technology Companies of 2019
                </p>
            </div>
            <div id="power-75" class="verticenter item">
                <img class="img-fluid" src="/images/about/stitch-logo.svg"
                    style="width: 170px; height: auto; margin: 0 auto; margin-bottom: 20px;" class="" alt="">
                <p style="font-size: 23px; font-weight: bold;">
                    Most Powerful Companies in the <br class=""> Decorated Apparel Industry
                </p>
            </div>
        </div>
        <div id="cio-review" class="verticenter item d-none d-md-flex">
            <img class="img-fluid" src="/images/about/cio-logo.svg"
                style="width: 170px; height: auto; margin: 0 auto; margin-bottom: 20px;" class="" alt="">
            <p style="font-size: 23px; font-weight: bold;">
                Top 10 Textile and Apparel <br class=""> Technology Companies of 2019
            </p>
        </div>
        <div id="power-75" class="verticenter item d-none d-md-flex">
            <img class="img-fluid" src="/images/about/stitch-logo.svg"
                style="width: 170px; height: auto; margin: 0 auto; margin-bottom: 20px;" class="" alt="">
            <p style="font-size: 23px; font-weight: bold;">
                Most Powerful Companies in the <br class=""> Decorated Apparel Industry
            </p>
        </div>
        <div id="know-us" class="verticenter item">
            <h3>Get to know us</h3>
            <p class="">
                Ricoma International Corporation is one of the world’s leading manufacturers of commercial and household embroidery
                machines. We opened our doors with one priority: helping decorated apparel businesses quickly and affordably meet their
                goals. Since then, the Ricoma name has boasted a presence in every corner of the world.
            </p>
            <p class="">
                For many years, we’ve been a preferred source for embroidery equipment, digitizing software, stock designs and all other
                embroidery needs. Now, our products and services are distributed in over 150 countries and across six continents through
                our global network of distributors. Our constant growth can be attributed to our mindset. We think beyond in
                productivity, technology, strategy, marketing and customer service.
            </p>
        </div>
        <div id="universal-business" class="verticenter item">
            <h3>A Universal Business</h3>
            <p class="">
                As an American brand with Japanese technology and German engineering, Ricoma is a truly universal business. Our diverse
                staff is dedicated to creating business opportunities in every corner of the globe. Ricoma’s research and development
                team has established a strategic alliance with partners in the United States, Britain, Germany, Japan and South Korea.
            </p>
        </div>
        <div id="team" class="verticenter item">
            <h3>Rockstar Team</h3>
            <p class="">
                Our staff consists of a group of professionals with diverse skills that contribute to our ultimate goal:
                customer
                satisfaction.
            </p>
        </div>
    </div>
    <div id="globe" class="py-lg-5 py-3">
        <div class="text-center container">
            <h2>Global Footprint</h2>
            <p class="" style="font-size: 20px;">
                We began with an idea to fill a need in the decorated apparel industry: the need <br class="d-none d-lg-inline">
                 for quality equipment that’s both
                reliable and affordable. To better serve our <br class="d-none d-lg-inline">
                 customers abroad, we teamed up with the strongest regional distributors <br class="d-none d-lg-inline">

                worldwide. Now, Ricoma products and services are being distributed in over <br class="d-none d-lg-inline">
                 150 countries – and our network is still
                expanding.
            </p>
        </div>
        <div class="container-fluid">
            <about-globe></about-globe>
        </div>
    </div>
    <div class="py-lg-5 py-3">
        <h2 class="text-center">Ricoma Factory</h2>
        <p class="text-center" style="font-size: 20px;">
            Ricoma is headquartered in Miami, USA, and has its own <br class="d-none d-lg-inline"> manufacturing facility in Shenzhen, China
        </p>
        <div class="container">
            <div class="row mt-5">
                <div class="col-md-4 text-center">
                    <img class="img-fluid" src="/images/about/facility.svg" alt=""
                        style="width: 45px; height: auto; margin: auto; display: block;">
                    <p class="bold mt-3 text-uppercase" style="font-size: 21px;">STATE-OF-THE-ART FACILITY</p>
                    <p class="">
                        Our factory is a state-of-the-art production facility with a spacious plant that is operated efficiently to
                        fill
                        customers’ orders.
                    </p>
                </div>
                <div class="col-md-4 text-center">
                    <img class="img-fluid" src="/images/about/research.svg" alt=""
                        style="width: 45px; height: auto; margin: auto; display: block;">
                    <p class="bold mt-3 text-uppercase" style="font-size: 21px;">RESEARCH & DEVELOPMENT</p>
                    <p class="">
                        For more than a decade, we have been committed to research, development, design and production of
                        computerized
                        embroidery machines and software applications.
                    </p>
                </div>
                <div class="col-md-4 text-center">
                    <img class="img-fluid" src="/images/about/quality.svg" alt=""
                        style="width: 45px; height: auto; margin: auto; display: block;">
                    <p class="bold mt-3 text-uppercase" style="font-size: 21px;">QUALITY MANAGEMENT</p>
                    <p class="">
                        With the establishment of a strict and comprehensive quality management and control system, each product
                        undergoes a
                        rigorous inspection and testing process.
                    </p>
                </div>
            </div>
        </div>
        <div class="mt-3">
            @include('website.about.partials.factory-carousel')
        </div>
    </div>
    <div class="pt-5" id="a-message" style="background-color: #fafafa;">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 verticenter">
                    <h3>A message from <br class="d-md-none"> our president...</h3>
                    <p class="message">
                        As President of Ricoma, I would like to thank our worldwide network of customers and suppliers for your continued
                        support and business. Thanks to you, the Ricoma name is now present in over 150 countries – and it won’t end there. We
                        appreciate the trust and support you have placed in our company and will continue to grant our customers the competitive
                        advantage they deserve and expect from us. For many years, we’ve helped decorated apparel businesses make it to the top.
                        Only when our customers succeed with our products and services, can we succeed in our business! This is our company’s
                        foundation and what we continue to believe to this day. Now and always, we will maintain our commitment to excellent
                        quality, superior service and competitive pricing.
                    </p>
                    <div class="row">
                        <div class="col-md-6 verticenter">
                            <p class="bold mt-3 mb-0" style="font-size: 21px;">Frank Ma</p>
                            <p class="color-primary text-uppercase bold" style="font-size: 12px; font-weight: bold;	line-height: 32px;">
                                President of Ricoma
                            </p>
                            {{-- <img src="/images/about/signature.png" id="signature" style="width: 200px; height: auto;" alt="" class="mt-2"> --}}
                        </div>
                        <div class="col-md-6 d-lg-none">
                            <img src="/images/about/frank.png" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 offset-lg-1 d-none d-lg-block">
                    <img src="/images/about/frank.png" alt="" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection