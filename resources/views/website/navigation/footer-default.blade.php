<div class="footer_wrapper pt-3">
    <div class="container py-lg-5 py-3">
        <div class="row">
            <div class="col-lg-2 mb-lg-0 mb-4">
                @include('website.navigation.partials.footer.logo-and-social')
            </div>
            <div class="col-lg-2 d-lg-flex justify-content-center">
                <div class="section-toggle collapsed" data-toggle="collapse" data-target="#products-footer">
                    <div>
                        <span class="column_title font-weight-bold">{{__('Products')}}</span>
                    </div>
                    <div>
                        <i class="fa fa-plus"></i>
                        <i class="fa fa-minus"></i>
                    </div>
                </div>
                <ul class="list-unstyled footer_col_list collapse pl-lg-5" id="products-footer">
                    <span class="column_title font-weight-bold d-none d-lg-block">{{__('Products')}}</span>
                    <li><a href="{{categoryLink('embroidery')}}">Embroidery</a></li>
                    <li><a href="{{categoryLink('heatpress')}}">Heat Press Machines</a></li>
                    <li><a href="{{categoryLink('cutters')}}">Fabric Cutters</a></li>
                    <li><a href="{{categoryLink('domestic-sewing-machines')}}">Domestic Sewing Machines</a></li>
                    <li><a href="{{categoryLink('industrial-sewing-machines')}}">Industrial Sewing Machines</a></li>
                </ul>
            </div>
            <div class="col-lg-2 d-lg-flex justify-content-center">
                <div class="section-toggle collapsed" data-toggle="collapse" data-target="#company-footer">
                    <div>
                        <span class="column_title font-weight-bold">{{__('Company')}}</span>
                    </div>
                    <div>
                        <i class="fa fa-plus"></i>
                        <i class="fa fa-minus"></i>
                    </div>
                </div>
                <ul class="list-unstyled footer_col_list collapse" id="company-footer">
                    <span class="column_title font-weight-bold d-none d-lg-block">{{__('Company')}}</span>
                    {{-- <li><a href="{{url('/admin')}}">Distributors</a></li> --}}
                    <li><a href="{{getRoute('about-page')}}">About</a></li>
                    {{-- <li><a href="{{getRoute('view-careers')}}">Careers</a></li> --}}
                    <li><a href="{{getRoute('press-page')}}">Press</a></li>
                    <li><a href="{{getRoute('warranty-page')}}">Warranty</a></li>
                    {{-- <li><a href="">Referral</a></li> --}}
                </ul>
            </div>
            <div class="col-lg-2 d-lg-flex justify-content-center">
                <div class="section-toggle collapsed" data-toggle="collapse" data-target="#contact-footer">
                    <div>
                        <span class="column_title font-weight-bold">{{__('Contact')}}</span>
                    </div>
                    <div>
                        <i class="fa fa-plus"></i>
                        <i class="fa fa-minus"></i>
                    </div>
                </div>
                <ul class="list-unstyled footer_col_list collapse" id="contact-footer">
                    <span class="column_title font-weight-bold d-none d-lg-block">{{__('Contact')}}</span>
                    <li><a href="{{getRoute('contact-page')}}">Get In Touch</a></li>
                    <li><a href="{{getRoute('virtual-demo-page')}}">Virtual Demo</a></li>
                    <li><a href="{{getRoute('tech-support-page')}}">Contact Support</a></li>
                    {{-- <li><a href="">Customer Portal</a></li> --}}
                </ul>
            </div>
            <div class="col-lg-4">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="section-toggle collapsed" style="border-bottom: none;" data-toggle="collapse" data-target="#explore-footer">
                            <div>
                                <span class="column_title font-weight-bold">{{__('Explore')}}</span>
                            </div>
                            <div>
                                <i class="fa fa-plus"></i>
                                <i class="fa fa-minus"></i>
                            </div>
                        </div>
                        <ul class="list-unstyled footer_col_list collapse" id="explore-footer">
                            <span class="column_title font-weight-bold d-none d-lg-block">{{__('Explore')}}</span>
                            <li><a href="https://garmeo.com">Garmeo</a></li>
                            <li><a href="https://hoopmade.com">Hoopmade</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-6 mt-lg-0 mt-4 text-center d-none d-lg-block">
                        @include('website.components.video', ['thumbnail' => '/images/footer-vid-thumbnail.png', 'src' =>
                        'https://videos.sproutvideo.com/embed/a09addb71e19e1c228/eceb6e7e1f5850ae', 'playbtn' => 'none', 'id' => 'desktop'])
                    </div>
                </div>
                {{--        todo: need to finish these last two sections--}}
            </div>
        </div>
        <div class="mt-4 d-none d-lg-block">
            @include('website.navigation.partials.footer.lang-and-country')
        </div>
    </div>
    <div class="bottom-footer pb-3 pt-4">
        <div class="d-block d-lg-none">
            @include('website.navigation.partials.footer.lang-and-country')
        </div>
        <div class="container mt-3 px-lg-0">
            <div class="row">
                <div class="col-lg-3">
                    <div class="px-lg-0 px-5 d-flex justify-content-between">
                        <p class="text-white bold"><a href="{{getRoute('terms-of-service-page')}}" style="font-weight: bold !important; font-size: 12px;">Terms
                                of Service</a></p>
                        <p class="text-white bold"><a href="{{getRoute('privacy-policy-page')}}" style="font-weight: bold !important; font-size: 12px;">Privacy
                                Policy</a></p>
                    </div>
                </div>
                <div class="col-lg-3 offset-lg-6 text-lg-right text-center">
                    <p class="text-white" style="font-size: 12px;">©{{Carbon\Carbon::now()->format('Y')}} Ricoma International Corporation</p>
                </div>
            </div>
        </div>
    </div>
</div>