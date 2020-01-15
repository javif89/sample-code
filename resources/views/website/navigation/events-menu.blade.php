<div class="menu-content" id="events-menu">
    <div class="section-container container">
        <div class="menu-section2">
            <a class="menu-link" href="{{getRoute('tradeshows', ['country'=> session('country')])}}">
                <div class="menu-img">
                    <img class="img-fluid" src="{{asset('/images/nav/Trade Show.png')}}" alt="">
                </div>
                <div class="section2-container">
                    <div class="menu-header">Trade Shows</div>
                    <div class="submenu-container">
                        <div class="submenu-item">
                            <div class="menu-item">
                                <div class="item-description2">
                                    Come see our machines in action at our next tradeshow! We may be coming to a city <br class=""> near you!
                                </div>
                                </div>
                            </div>
                        </div>
                        <a class="category-url"
                        href="{{getRoute('tradeshows', ['country'=> session('country')])}}">VIEW ALL UPCOMING TRADE SHOWS <i class="far fa-long-arrow-alt-right"></i></a>
                </div>
            </a>
        </div>
        <div class="side-border"></div>
        <div class="menu-section2">
            <a class="menu-link" href="{{getRoute('events', ['country'=> session('country')])}}">
                <div class="menu-img">
                    <img class="img-fluid" src="{{asset('/images/nav/Events.png')}}" alt="">
                </div>
                <div class="section2-container">
                    <div class="menu-header">Events</div>
                    <div class="submenu-container">
                        <div class="submenu-item">
                            <div class="menu-item">
                                <div class="item-description2">
                                    Keep up-to-date with all of our upcoming company events!
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="category-url" href="{{getRoute('events', ['country'=> session('country')])}}">VIEW ALL UPCOMING
                        EVENTS <i class="far fa-long-arrow-alt-right"></i></a>
                </div>
            </a>
        </div>
    </div>
    <div class="menu-border"></div>
</div>