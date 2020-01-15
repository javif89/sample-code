<div class="row section_5">
    <div class="col-md-10 offset-md-1 col-xl-8 offset-xl-2 text-center">
        <h3 class="subtitle">A machine this nice is hard not to show off</h3>
        <span class="section_text">
            Your home or shop is waiting for a shiny new piece of equipment. Join the thousands of <br class="d-none d-lg-inline"> crafters and business owners who
            have started or expanded their businesses with Ricoma.
        </span>
    </div>
</div>

@push('head')
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick-theme.css" />
@endpush

@push('scripts')
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.instagram-carousel').slick({
          respondTo: 'window',
          arrows: false,
          dots: true,
          slidesToShow: 5,
          responsive: [
              {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 5,
                    touchMove: true
                }
              },
              {
                breakpoint: 770,
                settings: {
                    slidesToShow: 2,
                    centerMode: true,
                    touchMove: true,
                }
              },
              {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    centerMode: true,
                    touchMove: true,
                }
              }
          ]
        });
        $(window).on('resize', function() {
            $('.carousel').slick('resize');
        });
      });
</script>
@endpush

<div class="section_11 my-3">
    <div class="instagram-carousel">
        @foreach ($product->getInstagramPics() as $pic)
        <div class="card rounded-0 mx-3">
            <img class="img-fluid" class="img-fluid" src="{{$pic->path}}" alt="">
            <div class="card-footer bg-transparent d-flex justify-content-between"><span style="font-weight: 600;">{{'@'.$pic->caption}}</span>
                <img src="{{asset('icons/Instagram Heart Icon.svg')}}" alt="">
            </div>
        </div>
        @endforeach
    </div>
</div>