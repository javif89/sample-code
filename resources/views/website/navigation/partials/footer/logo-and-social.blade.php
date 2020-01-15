<div class="d-block d-md-none d-lg-block">
    <div class="container-fluid">
        <div class="row">
            <div class="col text-center px-lg-0 px-5">
                <img src="{{asset('images/Ricoma Logo.svg')}}" class="img-fluid logo" alt="">
            </div>
        </div>
        <div class="d-lg-none text-center my-4" style="padding: 0 15px;">
            @include('website.components.video', ['thumbnail' => '/images/footer-vid-thumbnail.png', 'src' =>
            'https://videos.sproutvideo.com/embed/a09addb71e19e1c228/eceb6e7e1f5850ae', 'playbtn' => 'none', 'id' => 'mobile'])
        </div>
        <div class="row pt-lg-4">
            <div class="col text-center p-0">
                <a href="https://www.facebook.com/ricoma.us" target="_blank">
                    <img src="{{asset('icons/Facebook White Icon.svg')}}" alt="" class="footer_social_icons">
                </a>
            </div>
            <div class="col text-center p-0">
                <a href="https://twitter.com/RicomaHQ" target="_blank">
                    <img src="{{asset('icons/Twitter White Icon.svg')}}" alt="" class="footer_social_icons">
                </a>
            </div>
            <div class="col text-center p-0">
                <a href="https://www.instagram.com/ricomahq/" target="_blank">
                    <img src="{{asset('icons/Instagram White Icon.svg')}}" alt="" class="footer_social_icons">
                </a>
            </div>
            <div class="col text-center p-0">
                <a href="https://www.youtube.com/user/RiCOMAmiami" target="_blank">
                    <img src="{{asset('icons/Youtube White Icon.svg')}}" alt="" class="footer_social_icons">
                </a>
            </div>
            <div class="col text-center p-0">
                <a href="https://www.pinterest.com/ricomahq/" target="_blank">
                    <img src="{{asset('icons/Pinterest White Icon.svg')}}" alt="" class="footer_social_icons">
                </a>
            </div>
        </div>
    </div>
</div>

<div class="d-none d-md-block d-lg-none">
    <div class="container-fluid">
        <div class="row">
            <div class="col-6 verticenter">
                <div class="mb-3">
                    <img src="{{asset('images/Ricoma Logo.svg')}}" class="img-fluid logo" alt="">
                </div>
                <div class="row pt-lg-4">
                    <div class="col text-center p-0">
                        <a href="https://www.facebook.com/ricoma.us" target="_blank">
                            <img src="{{asset('icons/Facebook White Icon.svg')}}" alt="" class="footer_social_icons">
                        </a>
                    </div>
                    <div class="col text-center p-0">
                        <a href="https://twitter.com/RicomaHQ" target="_blank">
                            <img src="{{asset('icons/Twitter White Icon.svg')}}" alt="" class="footer_social_icons">
                        </a>
                    </div>
                    <div class="col text-center p-0">
                        <a href="https://www.instagram.com/ricomahq/" target="_blank">
                            <img src="{{asset('icons/Instagram White Icon.svg')}}" alt="" class="footer_social_icons">
                        </a>
                    </div>
                    <div class="col text-center p-0">
                        <a href="https://www.youtube.com/user/RiCOMAmiami" target="_blank">
                            <img src="{{asset('icons/Youtube White Icon.svg')}}" alt="" class="footer_social_icons">
                        </a>
                    </div>
                    <div class="col text-center p-0">
                        <a href="https://www.pinterest.com/ricomahq/" target="_blank">
                            <img src="{{asset('icons/Pinterest White Icon.svg')}}" alt="" class="footer_social_icons">
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-6 d-flex justify-content-end">
                @include('website.components.video', ['thumbnail' => '/images/footer-vid-thumbnail.png', 'src' =>
                'https://videos.sproutvideo.com/embed/a09addb71e19e1c228/eceb6e7e1f5850ae', 'playbtn' => 'none', 'id' =>
                'tablet'])
            </div>
        </div>
    </div>
</div>