@extends('website.layouts.main')
@section('title') Welcome to Ricoma @endsection
@section('meta-description') Start or grow a profitable custom apparel business with an embroidery machine package complete with unlimited support
and training. Ricoma is a leading brand in the embroidery industry and is committed to providing excellent service and
high-quality machines.
@endsection
{{-- @section('seo-keywords') {{ $product }} @endsection --}}
@section('image') {{asset('images/home/hero-desktop.png')}} @endsection
@section('og-title') Welcome to Ricoma @endsection
@section('og-image') {{asset('images/home/hero-desktop.png')}} @endsection
@section('og-description') Start or grow a profitable custom apparel business with an embroidery machine package complete with unlimited support
and training. Ricoma is a leading brand in the embroidery industry and is committed to providing excellent service and
high-quality machines.
@endsection
@section('content')
<div class="container-fluid homepage_wrapper">
    <div class="row banner_wrapper mb-0">
        <div class="col-12 col-md-6 col-lg-5 offset-xl-1 verticenter">
            <h1 class="banner_title">
                Run your embroidery business to its <br class="d-none d-md-inline"> fullest potential
            </h1>
            <p class="banner_text">{{__('Start or grow a profitable custom apparel business with an embroidery machine package complete with unlimited support
                                and training.')}}</p>
            <a class="btn orange_gradient_btn" href="{{getRoute('contact-page')}}" role="button">{{__('TELL ME MORE')}}</a>
        </div>

        <div class="col text-right offset-lg-1 pr-0">
            <img src="{{asset('images/home/hero-desktop.png')}}" class="img-fluid w-100 d-none d-lg-block" alt="">
            <img src="{{asset('images/home/hero-tablet.png')}}" class="img-fluid w-100 d-none d-md-block d-lg-none" alt="">
            <img src="{{asset('images/home/hero-mobile.png')}}" class="img-fluid w-100 d-md-none" alt="">
        </div>
    </div>

    <div class="row light_grey_bg section_1">
        <div class="col-md-6 col-xl-4 offset-xl-1 pr-md-5 d-flex flex-column justify-content-center text-lg-left text-center">
            <h3>{{__('Why Ricoma?')}}</h3>
            <p>{{__('You\'ll go from beginner to pro in no time with Ricoma. Our all-inclusive embroidery machines come equipped with all the
            accessories and tools you need to embroider flats and caps and get started on your first orders. Meanwhile, our free
            support and training has helped business owners deliver the highest quality, longest lasting embroidered products and
            keep their customers coming back.')}}</p>
        </div>
        <div class="col-md-6 offset-xl-1 text-right background verticenter align-items-center">
            <button class="play-btn" onclick="showHomeVideo()"><i class="fa fa-play"></i></button>
            <p class="mb-0 text-uppercase text-white mt-3 letter-spacing-2">Why Choose Ricoma</p>
        </div>
    </div>

    <div class="row pt-5 pb-5 section_2">
        <div class="col-12 col-xl-10 offset-xl-1">
            <div class="row">
                <div class="col-md-4 p-0">
                    <div class="icon">
                        <img src="{{asset('images/home/Customer Support.svg')}}" class="img-fluid" alt="">
                        <h4 class="mt-3 mb-3 text-uppercase title">{{__('SECOND-TO-NONE CUSTOMER SUPPORT')}}</h4>
                        <p>{{__("We'll be with you every step of the way. Ricoma customers enjoy a 5-year warranty, free training and lifetime access to
                        our service department 7 days a week — without paying an extra dime.")}}
                        </p>
                    </div>
                </div>
                <div class="col-md-4 p-0 my-md-0 my-3">
                    <div class="icon">
                        <img src="{{asset('images/home/Direct From Factory.svg')}}" class="img-fluid" alt="">
                        <h4 class="mt-3 mb-3 text-uppercase title">{{__('Direct from the factory to your doorstep')}}
                        </h4>
                        <p>{{__("Buying directly from the manufacturers means you're receiving the highest quality support and you're not paying more to
                        cut a middleman a check.")}}
                        </p>
                    </div>
                </div>
                <div class="col-md-4 p-0">
                    <div class="icon">
                        <img src="{{asset('images/home/Highest Quality.svg')}}" class="img-fluid" alt="">
                        <h4 class="mt-3 mb-3 text-uppercase title">
                            {{__('THE HIGHEST QUALITY IN GARMENT CUSTOMIZATION')}}</h4>
                        <p>{{__("Heavy duty and engineered to run 24/7, Ricoma machines will conquer every project with precision and speed.")}}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row section_3">
        <div class="col-md-6 background">
        </div>
        <div class="col-md-6 pr-lg-5 py-md-0 py-3 d-flex flex-column justify-content-center text-center text-lg-left text-white">
            <div>
                <span class="subtitle">{{__('0% financing.')}}</span>
            </div>
            <div>
                <span class="subtitle">{{__('0% hassle.')}}</span>
            </div>
            <div>
                <span class="subtitle">{{__('100% satisfaction.')}}</span>
            </div>
            <p class="pt-3">{{__("Just imagine starting or growing your business for the price of a phone or cable bill. With 0% financing, profiting from
            your business has never been easier. The upfront costs you save? Money in your pocket to advertise and expand your
            business.")}}</p>
            <a class="btn orange_gradient_btn" href="{{getRoute('financing-page')}}" role="button">{{__('Learn more')}}</a>
        </div>
    </div>

    <div class="row pt-5 mb-5 section_4 pb-lg-4 pb-3">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h2>{{__('Our rockstar lineup')}}</h2>
                    <span>
                        {{__("Whether you're a total newbie or certified embroidery wiz,")}}
                        <br class="d-none d-lg-inline"> {{__("our easy-to-use machines will help you get up and running in
                        no time.")}}
                    </span>
                </div>
            </div>

            <div class="row pt-5">
                <div class="col-md-4 pb-5 pb-sm-0 text-center d-lg-block d-md-flex flex-column justify-content-between">
                    <div>
                        <h4>{{__('Embroidery enthusiast')}}</h4>
                        <div class="pb-5">
                            <p>{{__("Create stunning multi-colored projects with this 10-needle entry-level embroidery machine.")}}
                            </p>
                            <a href="{{getRoute('machine-page', ['slug' => 'em-1010'])}}" class="icon">{{__('Check out the EM-1010')}} <img src="{{asset('images/Blue Arrow.svg')}}"
                                    class="img-fluid" alt=""></a>
                        </div>
                    </div>
                    <img src="{{asset('images/EM1010@2x.png')}}" class="img-fluid machine_img em_img" alt="">
                </div>

                <div class="col-md-4 pb-5 pb-sm-0 text-center">
                    <h4>{{__('First-time embroidery business owner')}}</h4>
                    <div class="pb-5">
                        <p>{{__("Embroider polo shirts, caps, bags, jackets and more from your home or shop with our versatile 15-needle commercial
                        machines.")}}
                        </p>
                        <a href="{{categoryLink('single-head')}}" class="icon">{{__('Check out single-head machines')}} <img
                                src="{{asset('images/Blue Arrow.svg')}}" class="img-fluid" alt=""></a>
                    </div>
                    <div>
                        <img src="{{asset('images/TC Machine@2x.png')}}" class="img-fluid machine_img" alt="">
                    </div>
                    <div class="mt-2 d-none d-lg-flex justify-content-between px-5 mx-2">
                        <img src="{{asset('images/home/swd.png')}}" class="img-fluid machine_img_xs" alt="">
                        <img src="{{asset('images/home/machine.png')}}" class="img-fluid machine_img_xs" alt="">
                    </div>
                </div>

                <div class="col-md-4 pb-5 pb-sm-0 text-center d-flex flex-column justify-content-between">
                    <div>
                        <h4>{{__('Embroidery business owner')}}</h4>
                        <div class="">
                            <p>{{__("Power through flat and cap orders with a 2, 4, 6 or 8-head 15-needle embroidery machine.")}}
                            </p>
                            <a href="{{categoryLink('multi-head')}}" class="icon">{{__('Check out multi-head machines')}} <img src="{{asset('images/Blue Arrow.svg')}}"
                                    class="img-fluid" alt=""></a>
                        </div>
                    </div>
                    <div class="mt-lg-0 mt-5">
                        <img src="{{asset('images/CHT2-4 Machine@2x.png')}}" class="img-fluid machine_img" alt="">
                    </div>
                    <div class="d-none d-lg-flex justify-content-between px-5 mx-2">
                        <img src="{{asset('images/home/mt-1502.png')}}" class="img-fluid machine_img_xs" alt="">
                        <img src="{{asset('images/home/flatbed.png')}}" class="img-fluid machine_img_xs" alt="">
                    </div>
                </div>
            </div>

            {{-- <div class="row pt-md-5">
                <div class="col-md-6 mb-lg-0 mb-5 text-center">
                    <h4>{{__('Heat Press')}}</h4>
                    <div class="pb-4"><a href="{{categoryLink('heatpress')}}" target="_blank">Check out heat presses <img src="{{asset('images/Blue Arrow.svg')}}" class="img-fluid" alt=""></a></div>
                    <img src="{{ asset('images/Heat Press@2x.png') }}" alt="" class="img-fluid machine_img_sm">
                </div>

                <div class="col-md-6 text-center">
                    <h4>{{__('Other Products')}}</h4>
                    <div class="pb-4"><a href="https://shop.ricoma.us/" target="_blank">Check out other products <img src="{{asset('images/Blue Arrow.svg')}}" class="img-fluid" alt=""></a></div>
                    <img src="{{ asset('images/Other Products@2x.png') }}" alt="" class="img-fluid machine_img_sm">
                </div>
            </div> --}}
        </div>
    </div>

    <div class="row section_5">
        <div class="col-md-6 offset-xl-1 d-sm-none text-right background"></div>
        <div
            class="col-md-6 col-xl-4 offset-xl-1 pt-4 pt-md-0 pr-md-5 d-flex flex-column text-center text-sm-left text-white justify-content-center">
            <h3>{{__('Start making money right away with free training and support')}}</h3>
            <p>{{__("Whether you're new to embroidery or purchasing a Ricoma machine for the first time, each Ricoma machine package includes
            free hands-on training and unlimited lifetime support 7 days a week. We'll get you up and running in no time, so you can
            start profiting from your investment right away.")}}</p>
            <div class="w-100 mt-4">
                <a class="btn orange_gradient_btn" href="{{getRoute('training-page')}}" role="button">{{__('BECOME A PRO')}}</a>
            </div>
        </div>
        <div class="col-md-6 offset-xl-1 d-none d-sm-block text-right background"></div>
    </div>

    <div class="row pt-5 pb-5 section_6">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 d-none d-lg-block">
                    <img src="{{ asset('images/Macbook.png') }}" class="img-fluid w-100" style="max-width: 550px"
                        alt="">
                </div>
                <div class="col-12 col-lg-6 verticenter">
                    <h3>{{__('Boost your embroidery design skills with Chroma')}}</h3>
                    <p>{{__("No experience? No problem. Newbies can digitize and edit designs with this beginner-friendly software with ease. Every
                    Ricoma embroidery machine includes Chroma Inspire, the software's basic version. Pros can upgrade to Chroma Luxe to
                    enjoy exclusive design features only available on Chroma.")}}</p>
                    <a class="btn orange_gradient_btn" href="{{getRoute('chroma-page')}}" role="button">{{__('Check out Chroma')}}</a>
                </div>

                <div class="col-12 d-lg-none">
                    <img src="{{ asset('images/Macbook.png') }}" class="img-fluid w-100" style="max-width: 550px"
                        alt="">
                </div>
            </div>
        </div>
    </div>

    <div class="row pt-5 pb-5 light_grey_bg section_7">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-xl-5 pb-5 text-center">
                    <div>
                        <span class="lg_title_text">{{__('Don\'t take our word for it...')}}</span>
                    </div>
                    <img src="{{ asset('images/5 Stars.svg') }}" class="img-fluid pt-4 pb-4" alt="stars">
                    <div class="description_text">
                        Join the thousands of embroiderers <br class="d-none d-lg-inline"> succeeding with our equipment and support.
                    </div>
                </div>

                <div class="col-12 reviews_box p-0">
                    <img src="{{ asset('images/FB Reviews@3x.png') }}" class="img-fluid" alt="">
                </div>

                <div class="col-12 pt-5">
                    <a class="btn orange_gradient_btn m-auto" href="{{getRoute('reviews-page')}}" role="button">{{__('READ MORE REVIEWS')}}</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row section_8">
        <div class="col-md-6 offset-xl-1 d-sm-none text-right background"></div>

        <div
            class="col-md-6 col-xl-4 offset-xl-1 pt-4 pt-sm-0 pr-md-5 d-flex flex-column text-center text-sm-left text-white justify-content-center">
            <h3>{{__('See our machines in action from the comfort of your home')}}</h3>
            <p>{{__("Need to see it running for yourself before making a decision? Well, the good news is you don't have to wait for a trade
            show near you. Schedule a private virtual demo with a product specialist to watch our machines running live from
            wherever you are. What happens next? We'll set up a video call where you can ask any questions you have.")}}</p>
            <div class="w-100 mt-4">
                <a class="btn orange_gradient_btn" href="{{getRoute('virtual-demo-page')}}" role="button">{{__('Schedule a Virtual Demo')}}</a>
            </div>
        </div>
        <div class="col-md-6 offset-xl-1 d-none d-sm-block text-right background"></div>
    </div>

    <div class="row section_9 pt-3 pb-2 pt-sm-5 pb-sm-4">
        <div class="container">
            <div class="row mb-2 mb-sm-4">
                <div class="col-12 text-center sm_title_text">{{ __('Trusted by the best') }}</div>
            </div>
            <div class="row align-items-center justify-content-center pt-2 pt-sm-4 pb-4">
                <div class="col business_icons"><img src="{{ asset('images/Adidas.svg') }}" class="img-fluid" alt="">
                </div>
                <div class="col business_icons"><img src="{{ asset('images/Gildan.svg') }}" class="img-fluid" alt="">
                </div>
                <div class="col business_icons"><img src="{{ asset('images/Neff.svg') }}" class="img-fluid" alt="">
                </div>
                <div class="col business_icons"><img src="{{ asset('images/Army.svg') }}" class="img-fluid" alt="">
                </div>
                <div class="col business_icons"><img src="{{ asset('images/Navy.svg') }}" class="img-fluid" alt="">
                </div>
            </div>
        </div>
    </div>


    <div class="section_10 pt-5 pb-5">
        @component('website.product.machine.components.circle-bg')
            <div class="container pt-4 pb-4">
                <div class="row mb-4">
                    <div class="col-12 col-xl-6 offset-xl-3 text-center text-white md_title_text">
                        {{ __('Are you in the club yet?') }}</div>
                    <div class="col-12 col-lg-8 offset-lg-2 col-xl-6 mt-4 offset-xl-3 text-center text-white description_text">
                        <p>{{__('Join the Ricoma Club to get exclusive access to tutorials, news, discounts and more. Why not?! It\'s free to be a member! ')}}
                        </p>
                    </div>
                    <div class="col-12 col-lg-8 offset-lg-2 col-xl-6 mt-4 offset-xl-3">
                        <form method="post" class="news_letter_wrapper" action="">
                            <div class="d-flex justify-content-center">
                                <div class="btn purple_btn rounded_btn d-flex align-items-center justify-content-center" data-toggle="modal" data-target="#ricomaClubModal">{{__('SIGN ME UP!')}}</div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endcomponent
    </div>

    @include('website.countries.default._instagram_carousel')

    <div class="row section_12 dark_grey_bg pt-5 pb-5 mt-lg-5 mt-3">
        <div class="container py-lg-5">
            <div class="row justify-content-between d-none d-lg-flex">
                <div class="col text-center accredited_icon">
                    <img src="{{asset('images/BBB Icon.svg')}}" alt="">
                </div>
                <div class="col text-center accredited_icon">
                    <img src="{{asset('images/ISO 14001.svg')}}" alt="">
                </div>
                <div class="col text-center accredited_icon">
                    <img src="{{asset('images/ISO 9001.svg')}}" alt="">
                </div>
                <div class="col text-center accredited_icon">
                    <img src="{{asset('images/GMC.svg')}}" alt="">
                </div>
                <div class="col text-center accredited_icon">
                    <img src="{{asset('images/SGS.svg')}}" alt="">
                </div>
                <div class="col text-center accredited_icon">
                    <img src="{{asset('images/RoHS.svg')}}" alt="">
                </div>
            </div>
            <div class="d-lg-none px-4">
                <img src="/images/home/certs-mobile.svg" alt="" class="img-fluid w-100">
            </div>
        </div>
    </div>
</div>

<div class="modal video-modal" tabindex="-1" role="dialog" id="home-video-modal">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <iframe id="home-video-iframe" src="" frameborder="0"
                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        function showHomeVideo() {
                $("#home-video-modal").modal('show');
                $("#home-video-iframe").attr('src', 'https://videos.sproutvideo.com/embed/a09addb71e19e1c228/eceb6e7e1f5850ae');
              }
            
              $('#home-video-modal').on('hidden.bs.modal', function (e) {
                $("#home-video-iframe").attr('src', '');
              });
    </script>
@endpush
@endsection