<div class="row section_13 mt-lg-5 mb-5">
    <div class="col-lg-10 offset-lg-1 hobby_business_bg">
        <div class="row m-0">
            <div class="col p-md-5 bg-white">
                <div class="row">
                    <div class="col-12 col-xl-8 offset-xl-2 text-center pb-3">
                        <h3 class="section-title subtitle">Get started with everything you need to succeed</h3>
                        <span>
                            Learn as you grow with Ricoma's easy-to-use equipment, excellent <br
                                class="d-none d-lg-inline"> customer service and 0% financing options.
                        </span>
                    </div>

                    <div class="col-lg-4 mb-lg-0 mb-3 hobby_business">
                        <img src="{{ asset('images/Machine_Pages/hobby_business/business_girl1.png') }}" alt=""
                            class="img-fluid">
                        <div class="pt-3 pb-3">
                            <span class="title">{{__('Lifetime support')}}</span>
                        </div>
                        <span class="body">{{__(
                                "Most people who build a business from the ground up tend to work nights and weekends. That’s why we’re here for you 7
                                days a week, with weekend support and after-hours support on weekdays."
                            )}}</span>
                    </div>
                    <div class="col-lg-4 mb-lg-0 mb-3 hobby_business">
                        <img src="{{ asset('images/Machine_Pages/hobby_business/business_guy.png') }}" alt=""
                            class="img-fluid">
                        <div class="pt-3 pb-3">
                            <span class="title">{{__('All-inclusive embroidery machines')}}</span>
                        </div>
                        <span class="body">{{__(
                                                        "Create stunning designs on caps, polos, bags and plenty of finished items. With an included cap attachment, you can
                                                        increase your product selection without having to spend thousands on additional accessories."
                                                    )}}</span>
                    </div>
                    <div class="col-lg-4 mb-lg-0 mb-3 hobby_business">
                        <img src="{{ asset('images/Machine_Pages/hobby_business/business_girl2.png') }}" alt=""
                            class="img-fluid">
                        <div class="pt-3 pb-3">
                            <span class="title">{{__('0% financing with no money down')}}</span>
                        </div>
                        <span class="body">{{__(
                                                                                "When you purchase a single-head or two-head embroidery machine, you can start or grow your business with no money down
                                                                                when you qualify for 0% financing."
                                                                            )}}</span>

                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="col-lg-12 mt-lg-5">
        <div class="row">
            <div class="col-lg-10 offset-lg-1 p-lg-0 p-4">
                <div class="row align-items-center position-relative">
                    <div class="col-lg-8 text-lg-left text-center tc_customers_bg">
                        <div class="p-lg-0 p-4 pb-lg-0 pb-5">
                            <h3>Hear from some proud {{$product->name}} Customers</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                                ullamco
                                laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit
                                in
                                voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p>
                        </div>
                    </div>
                    <tc-carousel :images="{{ json_encode($product->getCarouselImages()) }}" class=""></tc-carousel>
                </div>
            </div>
        </div>
    </div> --}}

    <div class="col-lg-12 mt-lg-5 social-proof-collage">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <h3 class="text-center subtitle">
                    What are people <br class="d-none d-lg-inline"> saying about the {{$product->name}}?
                </h3>
                <div class="text-center mb-5">
                    <img class="img-fluid" src="/images/5 Stars.svg" alt="">
                </div>
                <div class="collage px-lg-5 mx-lg-5">
                    <img class="img-fluid" src="{{$product->getMedia('social_proof_collage')->path}}" alt="">
                </div>
            </div>
        </div>
    </div>
</div>