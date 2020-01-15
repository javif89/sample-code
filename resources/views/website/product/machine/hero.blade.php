<div class="hero_wrapper">
    <div class="container py-lg-5 py-3">
        <div class="row">
            <div class="col-12 text-center col-lg-5 verticenter">
                <product-gallery :items="{{ $product->getGalleryItems()->toJson() }}"></product-gallery>
            </div>
            <div class="col-12 col-lg-6 offset-lg-1 verticenter mt-lg-0 mt-3">
                <div class="hero_header">
                    <div class="text-lg-left text-center">
                        <h1 class="hero-prod-name">{{$product->name}}</h1>
                        <span class="category">{{$product->getContent('short_description')}}</span>
                        <div class="border_break"></div>
                    </div>
                </div>
                <div class="hero_header_body">
                    <div class="text-lg-left text-center">
                        {!! $product->getContent('description') !!}
                    </div>

                    <div class="btn-container">
                        <a href="{{getRoute('contact-page')}}" class="btn orange_gradient_btn square_btn mt-2 w-100 m-0">{{__('Request a quote')}}</a>
                        <a href="{{categoryLink('embroidery')}}" class="btn d-flex flex-column justify-content-center transparent_btn square_btn mt-4 w-100 m-0">{{__('Compare models')}}</a>
                    </div>
                </div>
                <div class="hero_footer">
                    <div class="border_break"></div>
                    <a href="#" class="light_purple_text">Share product</a>
                    <div class="icons_wrapper">
                        <div class="icons_container">
                            <a target="_blank" href="mailto:?subject=Check out the {{$product->name}} on ricoma.com&body={{$product->link}}">
                                <img src="{{asset('icons/Email.svg')}}" class="img-fluid" alt="">
                            </a>
                        </div>
                        <div class="icons_container">
                            <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{$product->link}}&src=sdkpreparse">
                                <img src="{{asset('icons/Facebook White Icon.svg')}}" class="img-fluid" alt="">
                            </a>
                        </div>
                        <div class="icons_container">
                            <a target="_blank" href="https://twitter.com/intent/tweet?url={{$product->link}}&text=Check out the {{$product->name}} on ricoma.com">
                                <img src="{{asset('icons/Twitter White Icon.svg')}}" class="img-fluid" alt="">
                            </a>
                        </div>
                        <div class="icons_container">
                            <a target="_blank" href="http://pinterest.com/pin/create/button/?url={{$product->link}}&media={{$product->getMedia('hero_image')->path}}&description=Check out the {{$product->name}} on ricoma.com">
                                <img src="{{asset('icons/Pinterest White Icon.svg')}}" class="img-fluid" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>