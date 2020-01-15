<div class="factory-carousel">
    <div class="card-carousel-item">
        <div class="image-with-text-slide">
            <img src="https://cdn2.hubspot.net/hubfs/3019581/Getting%20ready%20for%20assembly@3x.png" alt="">
            <p class="slide-title">Getting ready for assembly</p>
        </div>
    </div>
    <div class="card-carousel-item">
        <div class="image-with-text-slide">
            <img src="https://cdn2.hubspot.net/hubfs/3019581/Assembly%20line@3x.png" alt="">
            <p class="slide-title">Assembly Line</p>
        </div>
    </div>
    <div class="card-carousel-item">
        <div class="image-with-text-slide">
            <img src="https://cdn2.hubspot.net/hubfs/3019581/Polishing%20Workshop@3x.png" alt="">
            <p class="slide-title">Polishing workshop</p>
        </div>
    </div>
    <div class="card-carousel-item">
        <div class="image-with-text-slide">
            <img src="https://cdn2.hubspot.net/hubfs/3019581/Fabrication@3x.png" alt="">
            <p class="slide-title">Fabrication</p>
        </div>
    </div>
    <div class="card-carousel-item">
        <div class="image-with-text-slide">
            <img src="https://cdn2.hubspot.net/hubfs/3019581/Quality%20control%20in%20factory@3x.png" alt="">
            <p class="slide-title">Quality control in factory</p>
        </div>
    </div>
    <div class="card-carousel-item">
        <div class="image-with-text-slide">
            <img src="https://cdn2.hubspot.net/hubfs/3019581/Ricoma%20production%20facility@3x.png" alt="">
            <p class="slide-title">Ricoma production facility</p>
        </div>
    </div>
    <div class="card-carousel-item">
        <div class="image-with-text-slide">
            <img src="https://cdn2.hubspot.net/hubfs/3019581/Packing@3x.png" alt="">
            <p class="slide-title">Packing</p>
        </div>
    </div>
    <div class="card-carousel-item">
        <div class="image-with-text-slide">
            <img src="https://cdn2.hubspot.net/hubfs/3019581/Customer%20Service@3x.png" alt="">
            <p class="slide-title">Customer Service</p>
        </div>
    </div>
    <div class="card-carousel-item">
        <div class="image-with-text-slide">
            <img src="https://cdn2.hubspot.net/hubfs/3019581/R%20&%20D%20team@3x.png" alt="">
            <p class="slide-title">Team</p>
        </div>
    </div>
</div>

@push('head')
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick-theme.css" />
@endpush

@push('scripts')
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script>
        $('.factory-carousel').slick({
            dots: true,
            arrows: true,
            infinite: true,
            centerMode: true,
            autoplay: true,
            autoplaySpeed: 3000,
            slidesToShow: 3,
            nextArrow: '<div class="next-arrow"><i class="fa fa-arrow-right"></i></div>',
            prevArrow: '<div class="prev-arrow"><i class="fa fa-arrow-left"></i></div>',
            responsive: [
                {
                    breakpoint: 1440,
                    settings: {
                        slidesToShow: 4,
                    }
                },
                {
                    breakpoint: 1200,
                    settings: {
                        slidesToShow: 3,
                    }
                },
                {
                breakpoint: 480,
                settings: {
                slidesToShow: 1,
                }
                }
            ]
        });
    </script>
@endpush