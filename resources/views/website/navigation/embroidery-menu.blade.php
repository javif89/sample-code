<div class="menu-content" id="embroidery-menu">
    @php
        $semi = $cats->where('slug', 'semi-commercial')->first();
        $singleCat = $cats->where('slug', 'single-head')->first();
        $multiCat = $cats->where('slug', 'multi-head')->first();
    @endphp
    <div class="section-container container">    
        <div class="machines-menu menu-section">
            <div class="menu-header">Machines</div>
            <div class="submenu-container">
                <div class="submenu-item">
                    <div class="menu-item">
                        <div class="item-header">SEMI-COMMERCIAL</div>
                            @foreach ($semi->products->take(5) as $p)
                                <a class="nav-link" href="{{$p->link}}">
                                    <div class="item">{{$p->name}}</div>
                                    <div class="item-description">{{$p->getContent('short_description')}}</div>
                                </a>
                            @endforeach
                    </div>
                </div>
                <div class="submenu-item">
                    <div class="menu-item">
                        <div class="item-header">SINGLE-HEAD COMMERCIAL</div>
                        @foreach ($singleCat->products->take(5) as $p)
                            @if ($p->slug !== 'em-1010')
                                <a class="nav-link" href="{{$p->link}}">
                                    <div class="item">{{$p->name}}</div>
                                    <div class="item-description">{{$p->getContent('short_description')}}</div>
                                </a>
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="submenu-item">
                    <div class="menu-item">
                        <div class="item-header">MULTI-HEAD COMMERCIAL</div>
                        @foreach ($multiCat->products->take(5) as $cat)
                            <a class="nav-link" href="{{$cat->link}}">
                                <div class="item">{{$cat->name}}</div>
                                <div class="item-description">{{$cat->getContent('short_description')}}</div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        <a class="category-url" href="{{categoryLink('embroidery')}}">VIEW ALL EMBROIDERY MACHINES <i class="far fa-long-arrow-alt-right"></i></a>
        </div>
        <div class="side-border"></div>
        <div class="accessories-menu menu-section">
            <div class="menu-header">Accessories</div>
            <div class="submenu-container">
                @foreach (App\Product::getAccessories()->take(5) as $cat)
                    <div class="menu-item">
                        <a class="nav-link" href="{{$cat->link}}">
                            <div class="item">{{$cat->name}}</div>
                            <div class="item-description">{{$cat->getContent('short_description')}}</div>
                        </a>
                    </div>
                @endforeach
            </div>
            <a class="category-url" href="{{categoryLink('accessories')}}">VIEW ALL EMBROIDERY ACCESSORIES <i class="far fa-long-arrow-alt-right"></i></a>
        </div>
        <div class="side-border"></div>
        <div class="software-menu menu-section">
            <div class="menu-header">Software</div>
            <a class="nav-link" href="{{getRoute('chroma-page')}}">
                <div class="submenu-container">
                    <div class="menu-item">
                        <div class="menu-img">
                            <img class="img-fluid" src="{{asset('/images/nav/Chroma.png')}}" alt="">
                        </div>
                        <div class="item">Chroma Digitizing Software</div>
                        <div class="item-description">
                            Design your next embroidery project with Chroma, Ricoma's proprietary digitizing software! Chroma comes equipped with an
                            easy-to-use interface, built-in styles and customization tools!
                        </div>
                        </div>
                    </div>
                </a>
        <a class="category-url" href="{{getRoute('chroma-page')}}">LEARN MORE ABOUT CHROMA <i class="far fa-long-arrow-alt-right"></i></a>
        </div>
    </div>
    <div class="menu-border"></div>
</div>