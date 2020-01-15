<div class="menu-content" id="contact-menu">
    <div class="section-container container">
        <div class="menu-section2">
            <a class="menu-link" href="{{getRoute('virtual-demo-page', ['country'=> session('country')])}}">
                <div class="menu-img">
                    <img class="img-fluid" src="{{asset('/images/nav/Virtual Demo.png')}}" alt="">
                </div>
                <div class="section2-container">
                    <div class="menu-header">Virtual Demo</div>
                    <div class="submenu-container">
                        <div class="submenu-item">
                            <div class="menu-item">
                                <div class="item-description2">
                                    Schedule a live demo of any of our machines and view the machine in real-time, right from the comfort of your home!
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="category-url" href="{{getRoute('virtual-demo-page', ['country'=> session('country')])}}">SCHEDULE A VIRTUAL DEMO <i class="far fa-long-arrow-alt-right"></i></a>
                </div>
            </a>
        </div>
        <div class="side-border"></div>
        <div class="menu-section2">
            <a class="menu-link" href="{{getRoute('contact-page', ['country'=> session('country')])}}">
                <div class="menu-img">
                    <img class="img-fluid" src="{{asset('/images/nav/Get in Touch.png')}}" alt="">
                </div>
                <div class="section2-container">
                    <div class="menu-header">Get in Touch</div>
                    <div class="submenu-container">
                        <div class="submenu-item">
                            <div class="menu-item">
                                <div class="item-description2">
                                    Need assistance or are interested in speaking to one of our product specialists? Click here to contact us today!
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="category-url" href="{{getRoute('contact-page', ['country'=> session('country')])}}">CONTACT US NOW <i class="far fa-long-arrow-alt-right"></i></a>
                </div>
            </a>
        </div>
    </div>
    <div class="menu-border"></div>
</div>