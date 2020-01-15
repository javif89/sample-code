@php
    // Make only one query for the categories that will be used for the rest of the menu
    $cats = \App\ProductCategory::with('products')->get();
@endphp
<div id="main-menu-container">
    <div id="expanded-menu" class="expanded-menu container">
        <div class="first-row to-hide">
            <a href="{{getRoute('website-home')}}" class="ricoma-logo">
                <img src="{{asset('/icons/Ricoma logo gray.svg')}}" alt="" srcset="">
            </a>
            <div class="support-container">
                <div class="phone mx-2">Questions? Call <a href="tel:8882926282" class="phone-number">(888) 292-6282</a></div>
                <div class="line"></div>
                <a class="support-link mx-2" href="{{getRoute('tech-support-page')}}">Talk to Support</a>
                <div class="line"></div>
                <div class="change-lang dropdown mx-2">
                    <button class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="lang-selected">{{strtoupper(session('locale'))}}<i class='fal fa-globe text-muted'></i></div>
                    </button>
                    <div class="dropdown-menu">
                        @foreach ($localedata['countries']->where('code',(session('country')))->first()->languages as $language)
                            <li class="dropdown-item"><a href="{{url()->current()."?lang=$language->code"}}">{{strtoupper($language->code)}}</a></li>
                        @endforeach
                    </div>
                </div>
                <a data-toggle="modal" data-target="#ricomaClubModal"class="ricoma-club-btn orange_gradient_btn square_btn">JOIN THE RICOMA CLUB<i class="fas fa-chevron-right"></i></a>
            </div>
        </div>
        <div class="sticky-nav">
            <div class="emb-dropdown hover-menu">
                <div id="embroidery-nav" class="embroidery nav-item">
                    Embroidery <span class="active-border"></span>
                </div>
                @include('website.navigation.embroidery-menu')
            </div>
            <div class="other-prod-dropdown hover-menu">
                <div id="other-products-nav" class="other-products nav-item">
                    Other Products <span class="active-border"></span>
                </div>
                @include('website.navigation/other-products')
            </div>
            <a class="hover-menu {{Route::currentRouteName() == 'financing-page' ? 'active': ''}}" href="{{getRoute('financing-page')}}">
                <div class="financing nav-item">Financing <span class="active-border"></span></div>
            </a>
            <a href="https://blog.ricoma.com/" target="_blank" class="hover-menu">
                <div class="blog nav-item">Blog <span class="active-border"></span></div>
            </a>
            <div class="events-dropdown hover-menu">
                <div id="events-nav" class="events nav-item">
                    Trade Shows & Events <span class="active-border"></span>
                </div>
                @include('website.navigation.events-menu')
            </div>
            <div class="contact-dropdown hover-menu">
                <div id="contact-nav" class="contact nav-item">
                    Contact <span class="active-border"></span>
                </div>
                @include('website.navigation.contact-menu')
            </div>
            <search-box></search-box>

        </div>
        {{-- <div class="menu-border"></div> --}}
    </div>
</div>
@include('website.navigation/mobile-menu')
