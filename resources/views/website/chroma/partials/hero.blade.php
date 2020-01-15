<div class="hero_wrapper">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center col-lg-6">
                <img src="/images/chroma/hero-img.png" alt="" class="img-fluid">
            </div>
            <div class="col-12 col-lg-6 d-lg-flex justify-content-center align-items-start flex-column mt-lg-0 mt-3">
                <div class="hero_header">
                    <div class="col text-lg-left text-center">
                        <img src="/images/chroma/logo.svg" alt="" style="width: 55%; height: auto;" class="mb-3"> <br class="">
                        <span class="category">Premier Digitizing Software</span>
                        <div class="border_break"></div>
                    </div>
                </div>
                <div class="hero_header_body">
                    <p class="text-lg-left text-center">
                        Chroma, Ricoma's proprietary digitizing software, is designed to allow both the novice and experienced digitizer to
                        create even the most intricate designs with ease and speed. Become a digitizing pro in no time with an easy-to-use
                        interface, built-in styles and customization tools!
                    </p>

                    <div>
                        <a href="https://shop.ricoma.us/collections/embroidery-software/products/chroma" target="_blank"
                            class="btn green-on-hover orange_gradient_btn square_btn mt-2 w-100 m-0">{{__('Buy Now')}}</a>
                        <button data-toggle="modal" data-target="#form-modal" class="btn green-on-hover transparent_btn square_btn mt-4 w-100 m-0">{{__('Download a free trial')}}</button>
                    </div>
                </div>
                <div class="hero_footer">
                    <div class="border_break"></div>
                    <a href="#" class="light_purple_text">Share product</a>
                    <div class="icons_wrapper">
                        <div class="icons_container">
                            <a target="_blank"
                                href="mailto:?subject=Check out the Chroma on ricoma.com&body={{getRoute('chroma-page')}}">
                                <img src="{{asset('icons/Email.svg')}}" class="img-fluid" alt="">
                            </a>
                        </div>
                        <div class="icons_container">
                            <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{getRoute('chroma-page')}}&src=sdkpreparse">
                                <img src="{{asset('icons/Facebook White Icon.svg')}}" class="img-fluid" alt="">
                            </a>
                        </div>
                        <div class="icons_container">
                            <a target="_blank"
                                href="https://twitter.com/intent/tweet?url={{getRoute('chroma-page')}}&text=Check out Chroma on ricoma.com">
                                <img src="{{asset('icons/Twitter White Icon.svg')}}" class="img-fluid" alt="">
                            </a>
                        </div>
                        <div class="icons_container">
                            <a target="_blank"
                                href="http://pinterest.com/pin/create/button/?url={{getRoute('chroma-page')}}&media={{asset('images/chroma/hero-img.png')}}&description=Check out the chroma on ricoma.com">
                                <img src="{{asset('icons/Pinterest White Icon.svg')}}" class="img-fluid" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>