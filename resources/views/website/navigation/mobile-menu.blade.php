<div id="mobile-menu" class="navbar navbar-light white">

    <div class="brand-container">
        <!-- Navbar brand -->
        <a class="navbar-brand" href="{{getRoute('website-home')}}"><img class="ricoma-mobile-logo" alt="" srcset=""></a>
            <!-- Collapse button -->
            <button 
            class="hamburger hamburger--spin" 
            type="button"
            data-target="#navbarMenuContent"
            data-toggle="collapse">
            <span class="hamburger-box">
                <span class="hamburger-inner"></span>
            </span>
        </button>
    </div>
    <!-- Collapsible content -->
    <div class="navbar-collapse collapse" id="navbarMenuContent" style="">

        <div class="search-container">
            <div class="search-bar-container">
                <search-box></search-box>
            </div>
            {{-- <hr> --}}
        </div>
        <!-- Links -->
        <div class="main-menu-section main-menu">
            <div class="nav-container">

                <div id="mobile-emb-toggle" class="nav-item active">
                    <a class="nav-link waves-effect waves-light" href="#">Embroidery <span
                    class="sr-only">(current)</span></a>
                    <i class="far fa-angle-right"></i>
                </div>
                <hr>
                <div id="mobile-other-toggle" class="nav-item">
                    <a class="nav-link waves-effect waves-light" href="#">Other Products</a>
                    <i class="far fa-angle-right"></i>
                </div>
                <hr>
                <div class="nav-item">
                <a class="nav-link waves-effect waves-light" href="{{getRoute('financing-page')}}">Financing</a>
                </div>
                <hr>
                <div class="nav-item active">
                    <a class="nav-link waves-effect waves-light" href="https://blog.ricoma.com/">Blog <span
                    class="sr-only">(current)</span></a>
                </div>
                <hr>
                <div id="mobile-tradeshows-toggle" class="nav-item">
                    <a class="nav-link waves-effect waves-light" href="#">Trade Shows & Events</a>
                    <i class="far fa-angle-right"></i>
                </div>
                <hr>
                <div id="mobile-contact-toggle" class="nav-item">
                    <a class="nav-link waves-effect waves-light" href="#">Contact</a>
                    <i class="far fa-angle-right"></i>
                </div>
                <hr>
                <div class="help-section">
                    <div class="help-text section-header">HELP & SETTINGS</div>
                    <div class="phone">Questions? Call <a href="tel:8882926282" class="phone-number">(888) 292-6282</a></div>
                </div>
                <hr>
                <div class="nav-item">
                <a class="nav-link waves-effect waves-light" href="{{getRoute('tech-support-page')}}">Talk to Support</a>
                </div>
                <hr>
                <div class="nav-item">
                    <div class="change-lang dropdown">
                        <div class="dropdown-toggle lang-select" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <div class="lang-selected"><i class='fal fa-globe'></i>
                                {{ucfirst($localedata['languages']->where('code',strtolower(session('locale')))->first()->name)}}</div>
                        </div>
                        <div class="dropdown-menu">
                            @foreach ($localedata['countries']->where('code',(session('country')))->first()->languages as $language)
                            <div class="dropdown-item"><a
                                    href="{{url()->current()."?lang=$language->code"}}">{{$language->name}}</a></div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <hr>
                <div class="nav-item">
                    <button class="btn country-select-btn" data-toggle="modal" data-target="#countrySelectModal">
                        <div class="active-country">
                            <div class="flag">{{country_flag($localedata['active_country']->code)}}</div>
                            <div class="country-name">{{$localedata['active_country']->name}}</div>
                        </div>
                    </button>
                </div>
                <div class="nav-item club-btn">
                    <button class="ricoma-club-mobile" data-toggle="modal" data-target="#ricomaClubModal"><div class="club-text mx-2">JOIN THE RICOMA CLUB</div> <i class="far fa-angle-right"></i></button>
                </div>
            </div>
        </div>
        <!-- Links -->
    </div>

    {{-- Embroidery Main Menu --}}
    <div class="sliding-menu-emb sliding-menu">
        <div class="main-return menu-return">
            <i class="far fa-long-arrow-alt-left"></i>
            <div class="main-return-text">MAIN MENU</div>
        </div>
        <hr>
        <div class="section-header">EMBROIDERY</div>
        <div id="emb-machines-toggle" class="nav-item">
        <a class="nav-link waves-effect waves-light" href="#">Embroidery Machines <span class="sr-only">(current)</span></a>
            <i class="far fa-angle-right"></i>
        </div>
        <hr>
        <div id="emb-accessories-toggle" class="nav-item">
            <a class="nav-link waves-effect waves-light" href="#">Accessories <span class="sr-only">(current)</span></a>
            <i class="far fa-angle-right"></i>
        </div>
        <hr>
        <div id="emb-machines-toggle" class="nav-item">
            <a class="nav-link waves-effect waves-light" href="{{getRoute('chroma-page')}}">Chroma Embroidery Software<span class="sr-only">(current)</span></a>
        </div>
        <hr>
    </div>
    {{-- Emb Machines Menu --}}
    <div class="sliding-menu-machines sliding-menu">
        @php
            $semi = $cats->where('slug', 'semi-commercial')->first();
            $singleCat = $cats->where('slug', 'single-head')->first();
            $multiCat = $cats->where('slug', 'multi-head')->first();
        @endphp
        <div class="emb-return menu-return">
            <i class="far fa-long-arrow-alt-left"></i>
            <div class="main-return-text">EMBROIDERY</div>
        </div>
        <hr>
        <div class="section-header">EMBROIDERY MACHINES</div>
        <div id="emb-machines-toggle" class="section-link">
            <a class="waves-effect waves-light" href="{{getRoute('category-overview-page',['category' => 'embroidery'])}}">All Embroidery Machines <span class="sr-only">(current)</span></a>
        </div>
        <hr>
        <div class="subsection">
            <div class="subheader">Single-Head Hobbyist Machine</div>
            @foreach ($semi->products as $p)
                <a class="section-link" href="{{$p->link}}">{{$p->name}}
                </a>
                <hr>
            @endforeach
        </div>
        <div class="subsection">
            <div class="subheader">Single-Head Commercial Machines</div>
            @foreach ($singleCat->products as $p)
            @if ($p->slug !== 'em-1010')
                <a class="section-link" href="{{$p->link}}">{{$p->name}}
                </a>
                <hr>
            @endif
            @endforeach
        </div>
        <div class="subsection">
            <div class="subheader">Multi-Head Commercial Machines</div>
            @foreach ($multiCat->products as $p)
                <a class="section-link" href="{{$p->link}}">{{$p->name}}
                </a>
                <hr>
            @endforeach
        </div>
    </div>
    {{-- Emb Accessories Menu --}}
    <div class="sliding-menu-accessories sliding-menu">
        <div class="emb-return menu-return">
            <i class="far fa-long-arrow-alt-left"></i>
            <div class="main-return-text">EMBROIDERY</div>
        </div>
        <hr>
        <div class="section-header">ACCESSORIES</div>
        <div id="emb-machines-toggle" class="section-link">
            <a class="waves-effect waves-light" href="{{getRoute('category-overview-page',['category' => 'accessories'])}}">All Accessories <span class="sr-only">(current)</span></a>
        </div>
        <hr>
        <div class="subsection">
            @foreach (App\Product::getAccessories() as $cat)
                <a class="section-link" href="{{$cat->link}}">{{$cat->name}}
                </a>
                <hr>
            @endforeach
        </div>
    </div>

    {{-- Other Products Menu --}}
    <div class="sliding-menu-other sliding-menu">
        <div class="main-return menu-return">
            <i class="far fa-long-arrow-alt-left"></i>
            <div class="main-return-text">MAIN MENU</div>
        </div>
        <hr>
        <div class="section-header">OTHER PRODUCTS</div>
        <div id="other-heatpress-toggle" class="nav-item">
            <a class="nav-link waves-effect waves-light" href="#">Heatpress <span
                    class="sr-only">(current)</span></a>
            <i class="far fa-angle-right"></i>
        </div>
        <hr>
        <div id="other-cutters-toggle" class="nav-item">
            <a class="nav-link waves-effect waves-light" href="#">Cutters <span class="sr-only">(current)</span></a>
            <i class="far fa-angle-right"></i>
        </div>
        <hr>
        <div id="other-domestic-toggle" class="nav-item">
            <a class="nav-link waves-effect waves-light" href="#">Domestic Sewing Machines <span
                    class="sr-only">(current)</span></a>
            <i class="far fa-angle-right"></i>
        </div>
        <hr>
        <div id="other-industrial-toggle" class="nav-item">
            <a class="nav-link waves-effect waves-light" href="#">Industrial Sewing Machines <span class="sr-only">(current)</span></a>
            <i class="far fa-angle-right"></i>
        </div>
        <hr>
        <div id="other-motors-toggle" class="nav-item">
            <a class="nav-link waves-effect waves-light" href="#">Sewing Machine Motors <span
                    class="sr-only">(current)</span></a>
            <i class="far fa-angle-right"></i>
        </div>
        <hr>
        <div id="other-otherprod-toggle" class="nav-item">
            <a class="nav-link waves-effect waves-light" href="#">Other Products <span class="sr-only">(current)</span></a>
            <i class="far fa-angle-right"></i>
        </div>
        <hr>
    </div>

    @php
        $heatpress = $cats->where('slug', 'heatpress')->first();
        $cutters = $cats->where('slug', 'cutters')->first();
        $domestic = $cats->where('slug', 'domestic-sewing-machines')->first();
        $industrial = $cats->where('slug', 'industrial-sewing-machines')->first();
        $motors = $cats->where('slug', 'sewing-machine-motors')->first();
        $otherProducts = $cats->where('slug', 'other-products')->first();
    @endphp
    {{-- Other Heatpress Menu --}}
    <div class="sliding-menu-heatpress sliding-menu">
        <div class="other-return menu-return">
            <i class="far fa-long-arrow-alt-left"></i>
            <div class="main-return-text">OTHER PRODUCTS</div>
        </div>
        <hr>
        <div class="section-header">HEATPRESSES</div>
        <div id="other-heatpress-toggle" class="section-link">
            <a class="waves-effect waves-light" href="{{getRoute('category-overview-page',['category' => 'heatpress'])}}">All Heatpresses <span class="sr-only">(current)</span></a>
        </div>
        <hr>
        <div class="subsection">
            <div class="subheader">Heatpress</div>
            @foreach ($heatpress->products as $p)
                <a class="section-link" href="{{$p->link}}">{{$p->name}}
                </a>
                <hr>
            @endforeach
        </div>
    </div>
    {{-- Other Cutters Menu --}}
    <div class="sliding-menu-cutters sliding-menu">
        <div class="other-return menu-return">
            <i class="far fa-long-arrow-alt-left"></i>
            <div class="main-return-text">OTHER PRODUCTS</div>
        </div>
        <hr>
        <div class="section-header">CUTTERS</div>
        <div id="other-cutters-toggle" class="section-link">
            <a class="waves-effect waves-light" href="{{getRoute('category-overview-page',['category' => 'cutters'])}}">All Cutters <span class="sr-only">(current)</span></a>
        </div>
        <hr>
        <div class="subsection">
            <div class="subheader">Cutters</div>
            @foreach ($cutters->products as $p)
                <a class="section-link" href="{{$p->link}}">{{$p->name}}
                </a>
                <hr>
            @endforeach
        </div>
    </div>
    {{-- Other Domestic Menu --}}
    <div class="sliding-menu-domestic sliding-menu">
        <div class="other-return menu-return">
            <i class="far fa-long-arrow-alt-left"></i>
            <div class="main-return-text">OTHER PRODUCTS</div>
        </div>
        <hr>
        <div class="section-header">DOMESTIC SEWING MACHINES</div>
        <div id="other-domestic-toggle" class="section-link">
            <a class="waves-effect waves-light" href="{{getRoute('category-overview-page',['category' => 'domestic-sewing-machines'])}}">All Domestic Sewing Machines <span class="sr-only">(current)</span></a>
        </div>
        <hr>
        <div class="subsection">
            <div class="subheader">Domestic Sewing Machines</div>
            @foreach ($domestic->products as $p)
                <a class="section-link" href="{{$p->link}}">{{$p->name}}
                </a>
                <hr>
            @endforeach
        </div>
    </div>

    {{-- Other Industrial Menu --}}
    <div class="sliding-menu-industrial sliding-menu">
        <div class="other-return menu-return">
            <i class="far fa-long-arrow-alt-left"></i>
            <div class="main-return-text">OTHER PRODUCTS</div>
        </div>
        <hr>
        <div class="section-header">INDUSTRIAL SEWING MACHINES</div>
        <div id="other-industrial-toggle" class="section-link">
            <a class="waves-effect waves-light" href="{{getRoute('category-overview-page',['category' => 'domestic-sewing-machines'])}}">All Industrial Sewing Machines <span class="sr-only">(current)</span></a>
        </div>
        <hr>
        <div class="subsection">
            <div class="subheader">Industrial Sewing Machines</div>
            @foreach ($domestic->products as $p)
                <a class="section-link" href="{{$p->link}}">{{$p->name}}
                </a>
                <hr>
            @endforeach
        </div>
    </div>

    {{-- Other Motors Menu --}}
    <div class="sliding-menu-motors sliding-menu">
        <div class="other-return menu-return">
            <i class="far fa-long-arrow-alt-left"></i>
            <div class="main-return-text">OTHER PRODUCTS</div>
        </div>
        <hr>
        <div class="section-header">SEWING MACHINE MOTORS</div>
        <div id="other-motors-toggle" class="section-link">
            <a class="waves-effect waves-light" href="{{getRoute('category-overview-page',['category' => 'sewing-machine-motors'])}}">All Sewing Machine Motors <span class="sr-only">(current)</span></a>
        </div>
        <hr>
        <div class="subsection">
            <div class="subheader">Sewing Machine Motors</div>
            @foreach ($domestic->products as $p)
                <a class="section-link" href="{{$p->link}}">{{$p->name}}
                </a>
                <hr>
            @endforeach
        </div>
    </div>

    {{-- Other OtherProducts Menu --}}
    <div class="sliding-menu-otherprod sliding-menu">
        <div class="other-return menu-return">
            <i class="far fa-long-arrow-alt-left"></i>
            <div class="main-return-text">OTHER PRODUCTS</div>
        </div>
        <hr>
        <div class="section-header">OTHER PRODUCTS</div>
        <div id="other-otherprod-toggle" class="section-link">
            <a class="waves-effect waves-light" href="{{getRoute('category-overview-page',['category' => 'other-products'])}}">All Other Products <span class="sr-only">(current)</span></a>
        </div>
        <hr>
        <div class="subsection">
            <div class="subheader">Other Products</div>
            @foreach ($otherProducts->products as $p)
                <a class="section-link" href="{{$p->link}}">{{$p->name}}
                </a>
                <hr>
            @endforeach
        </div>
    </div>

    {{-- Tradeshows & Events Menu --}}
    <div class="sliding-menu-tradeshows sliding-menu">
        <div class="main-return menu-return">
            <i class="far fa-long-arrow-alt-left"></i>
            <div class="main-return-text">MAIN MENU</div>
        </div>
        <hr>
        <div class="section-header">TRADE SHOWS & EVENTS</div>
        <div class="nav-item">
            <a class="nav-link waves-effect waves-light" href="{{getRoute('tradeshows')}}">View All Trade Shows<span
                    class="sr-only">(current)</span></a>
        </div>
        <hr>
        <div class="nav-item">
            <a class="nav-link waves-effect waves-light" href="{{getRoute('events')}}">View All Events<span
                    class="sr-only">(current)</span></a>
        </div>
        <hr>
    </div>

    {{-- Contact Menu --}}
    <div class="sliding-menu-contact sliding-menu">
        <div class="main-return menu-return">
            <i class="far fa-long-arrow-alt-left"></i>
            <div class="main-return-text">MAIN MENU</div>
        </div>
        <hr>
        <div class="section-header">CONTACT</div>
        <div class="nav-item">
            <a class="nav-link waves-effect waves-light" href="{{getRoute('virtual-demo-page')}}">Schedule A Virtual Demo<span
                    class="sr-only">(current)</span></a>
        </div>
        <hr>
        <div class="nav-item">
            <a class="nav-link waves-effect waves-light" href="{{getRoute('contact-page')}}">Get In Touch<span
                    class="sr-only">(current)</span></a>
        </div>
        <hr>
    </div>
</div>
