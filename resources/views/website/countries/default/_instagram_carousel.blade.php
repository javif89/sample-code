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
          infinite: true,
          slidesToShow: 4,
          arrows: false,
          centerMode: true,
          responsive: [
              {
                  breakpoint: 771,
                  settings: {
                      slidesToShow: 2,
                      slidesToScroll: 1,
                      arrows: false,
                      dots: false,
                      centerMode: true,
                      touchMove: true,
                  }
              },
              {
                  breakpoint: 480,
                  settings: {
                      slidesToShow: 1,
                      slidesToScroll: 1,
                      arrows: false,
                      dots: false,
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

<div class="section_11 py-3">
    <div class="text-center">
        <div class="text-center md_title_text">
            {{ __('People love us on Instagram') }}
        </div>
        <div class="mt-4 text-center description_text">
            <p>
                Love your Ricoma? Tag @ricomahq on <br class=""> Instagram to be featured on our homepage!
            </p>
        </div>
    </div>
    <div class="instagram-carousel mt-5 row">
        <div class="card rounded-0 ml-3">
            <img class="img-fluid" src="{{asset('images/home/instagram/1.png')}}" alt="">
            {{-- <div class="card-footer bg-transparent d-flex justify-content-between">@dajeofinerprints <img
                    src="{{asset('icons/Instagram Heart Icon.svg')}}" alt="">
            </div> --}}
        </div>
    
        <div class="card rounded-0 ml-3">
            <img class="img-fluid" src="{{asset('images/home/instagram/2.png')}}" alt="">
            {{-- <div class="card-footer bg-transparent d-flex justify-content-between">@dajeofinerprints <img
                    src="{{asset('icons/Instagram Heart Icon.svg')}}" alt="">
            </div> --}}
        </div>
    
        <div class="card rounded-0 ml-3">
            <img class="img-fluid" src="{{asset('images/home/instagram/3.png')}}" alt="">
            {{-- <div class="card-footer bg-transparent d-flex justify-content-between">@dajeofinerprints <img
                    src="{{asset('icons/Instagram Heart Icon.svg')}}" alt="">
            </div> --}}
        </div>
    
        <div class="card rounded-0 ml-3">
            <img class="img-fluid" src="{{asset('images/home/instagram/4.png')}}" alt="">
            {{-- <div class="card-footer bg-transparent d-flex justify-content-between">@dajeofinerprints <img
                    src="{{asset('icons/Instagram Heart Icon.svg')}}" alt="">
            </div> --}}
        </div>
        <div class="card rounded-0 ml-3">
            <img class="img-fluid" src="{{asset('images/home/instagram/5.png')}}" alt="">
            {{-- <div class="card-footer bg-transparent d-flex justify-content-between">@dajeofinerprints <img
                    src="{{asset('icons/Instagram Heart Icon.svg')}}" alt="">
            </div> --}}
        </div>
        <div class="card rounded-0 ml-3">
            <img class="img-fluid" class="img-fluid" src="{{asset('images/home/instagram/6.png')}}" alt="">
            {{-- <div class="card-footer bg-transparent d-flex justify-content-between">@dajeofinerprints <img
                                        src="{{asset('icons/Instagram Heart Icon.svg')}}" alt="">
        </div> --}}
        </div>
    </div>
</div>