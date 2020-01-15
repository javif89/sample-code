@push('head')
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick-theme.css" />
@endpush

@push('scripts')
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.facebook-reviews-carousel').slick({
          respondTo: 'window',
          arrows: false,
          dots: true,
          slidesToShow: 3,
          centerMode: true,
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
            $('.facebook-reviews-carousel').slick('resize');
        });
        // $('.review-tabs .nav-link').on('shown.bs.tab', function (e) {
        //     e.target // newly activated tab
        //     e.relatedTarget // previous active tab
        //     $('.facebook-reviews-carousel').slick('setPosition');
        //     console.log('Event triggered');
        // });
    });
</script>
@endpush

<div class="facebook-reviews-carousel">
    @foreach ($product->getFacebookReviews() as $r)
        <div class="card facebook-card rounded-0 ml-3">
            <div class="card-header d-flex justify-content-between">
                <div class="d-flex align-items-center">
                    <img src="{{$r->customer_image}}" style="width: 40px; height: auto;" alt="" class="mr-2">
                    <p class="name mb-0">{{$r->customer_name}}</p>
                </div>
                <div>
                    <img class="img-fluid" src="/icons/facebook-blue.svg" style="width: 20px; height: auto;" alt="">
                </div>
            </div>
            <div class="card-body">
                <p class="">
                    {{$r->body}}
                </p>
            </div>
        </div>
    @endforeach
</div>