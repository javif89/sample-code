<div class="menu-content" id="other-prod-menu">
    @php
        $heatpress = $cats->where('slug', 'heatpress')->first();
        $cutters = $cats->where('slug', 'cutters')->first();
        $domestic = $cats->where('slug', 'domestic-sewing-machines')->first();
        $industrial = $cats->where('slug', 'industrial-sewing-machines')->first();
        $motors = $cats->where('slug', 'sewing-machine-motors')->first();
        $otherProducts = $cats->where('slug', 'other-products')->first();
    @endphp
    <div class="section-container container">
        <div class="other-menu menu-section">
            <div class="menu-header">Heatpress</div>
            <div class="submenu-container">
                <div class="submenu-item">
                    <div class="menu-item">
                        @foreach ($heatpress->products->take(5) as $cat)
                            <a class="nav-link" href="{{$cat->link}}">
                                <div class="item">{{$cat->name}}</div>
                                <div class="item-description">{{$cat->getContent('short_description')}}</div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
            <a class="category-url"
                href="{{categoryLink('heatpress')}}">VIEW
                ALL  <i class="far fa-long-arrow-alt-right"></i></a>
        </div>
        <div class="side-border"></div>
        <div class="other-menu menu-section">
            <div class="menu-header">Cutters</div>
            <div class="submenu-container">
                <div class="submenu-item">
                    <div class="menu-item">
                        @foreach ($cutters->products->take(5) as $cat)
                        <a class="nav-link" href="{{$cat->link}}">
                            <div class="item">{{$cat->name}}</div>
                            <div class="item-description">{{$cat->getContent('short_description')}}</div>
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
            <a class="category-url"
                href="{{categoryLink('cutters')}}">VIEW
                ALL  <i class="far fa-long-arrow-alt-right"></i></a>
        </div>
        <div class="side-border"></div>
        <div class="other-menu menu-section">
            <div class="menu-header">Domestic Sewing Machines</div>
            <div class="submenu-container">
                <div class="submenu-item">
                    <div class="menu-item">
                        @foreach ($domestic->products->take(5) as $cat)
                            <a class="nav-link" href="{{$cat->link}}">
                                <div class="item">{{$cat->name}}</div>
                                <div class="item-description">{{$cat->getContent('short_description')}}</div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
            <a class="category-url"
                href="{{categoryLink('domestic-sewing-machines')}}">VIEW
                ALL  <i class="far fa-long-arrow-alt-right"></i></a>
        </div>
        <div class="side-border"></div>
        <div class="other-menu menu-section">
            <div class="menu-header">Industrial Sewing Machines</div>
            <div class="submenu-container">
                <div class="submenu-item">
                    <div class="menu-item">
                        @foreach ($industrial->products->take(5) as $cat)
                            <a class="nav-link" href="{{$cat->link}}">
                                <div class="item">{{$cat->name}}</div>
                                <div class="item-description">{{$cat->getContent('short_description')}}</div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
            <a class="category-url"
                href="{{categoryLink('industrial-sewing-machines')}}">VIEW
                ALL  <i class="far fa-long-arrow-alt-right"></i></a>
        </div>
        <div class="side-border"></div>
        <div class="other-menu menu-section">
            <div class="menu-header">Sewing Machine Motors</div>
            <div class="submenu-container">
                <div class="submenu-item">
                    <div class="menu-item">
                        @foreach ($motors->products->take(5) as $cat)
                            <a class="nav-link" href="{{$cat->link}}">
                                <div class="item">{{$cat->name}}</div>
                                <div class="item-description">{{$cat->getContent('short_description')}}</div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
            <a class="category-url"
                href="{{categoryLink('sewing-machine-motors')}}">VIEW
                ALL  <i class="far fa-long-arrow-alt-right"></i></a>
        </div>
        <div class="side-border"></div>
        <div class="other-menu menu-section">
            <div class="menu-header">Other Products</div>
            <div class="submenu-container">
                <div class="submenu-item">
                    <div class="menu-item">
                        @foreach ($otherProducts->products->take(5) as $cat)
                            <a class="nav-link" href="{{$cat->link}}">
                                <div class="item">{{$cat->name}}</div>
                                <div class="item-description">{{$cat->getContent('short_description')}}</div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
            <a class="category-url"
                href="{{categoryLink('other-products')}}">VIEW
                ALL  <i class="far fa-long-arrow-alt-right"></i></a>
        </div>

    </div>
    <div class="menu-border"></div>
</div>