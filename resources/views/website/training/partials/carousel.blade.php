@push('head')
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick-theme.css" />
@endpush

@push('scripts')
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.google-reviews-carousel').slick({
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
                breakpoint: 771,
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
            $('.google-reviews-carousel').slick('resize');
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

<div class="google-reviews-carousel">
    <div class="card facebook-card rounded-0 ml-3">
        <div class="card-header d-flex justify-content-between">
            <div class="d-flex align-items-center">
                <img src="/images/training/customers/jason.png" style="width: 40px; height: auto;" alt="" class="mr-2">
                <p class="name mb-0">Jason F. Pierson</p>
            </div>
            <div>
                <img class="img-fluid" src="/icons/facebook-blue.svg" style="width: 20px; height: auto;" alt="">
            </div>
        </div>
        <div class="card-body">
            <p class="">
                We had our EM1010 training today with Julia and WOW! She was so patient with the class and very knowledgeable! She took
                the time to go over things multiple times and was so pleasant! Great experience and just one more reason Ricoma has a
                customer now and going forward with us! Thank you!
            </p>
        </div>
    </div>
    <div class="card facebook-card rounded-0 ml-3">
        <div class="card-header d-flex justify-content-between">
            <div class="d-flex align-items-center">
                <img src="/images/training/customers/arnie.png" style="width: 40px; height: auto;" alt="" class="mr-2">
                <p class="name mb-0">Arnie Beamish</p>
            </div>
            <div>
                <img class="img-fluid" src="/images/training/google-icon.svg" style="width: 20px; height: auto;" alt="">
            </div>
        </div>
        <div class="card-body">
            <p class="">
                The training I got from Julia was excellent she was really patient with the people who were training in our session. She
                is truly a professional and knows the Ricoma machines!
            </p>
        </div>
    </div>
    <div class="card facebook-card rounded-0 ml-3">
        <div class="card-header d-flex justify-content-between">
            <div class="d-flex align-items-center">
                <img src="/images/training/customers/melissa.png" style="width: 40px; height: auto;" alt="" class="mr-2">
                <p class="name mb-0">Melissa Rothfus</p>
            </div>
            <div>
                <img class="img-fluid" src="/images/training/google-icon.svg" style="width: 20px; height: auto;" alt="">
            </div>
        </div>
        <div class="card-body">
            <p class="">
                The free training class targets everything you need to know to get started whether you are a beginner or have been
                embroidering for years. (Julia is an awesome instructor!) They truly want you to succeed! Thank you Ricoma!
            </p>
        </div>
    </div>
    <div class="card facebook-card rounded-0 ml-3">
        <div class="card-header d-flex justify-content-between">
            <div class="d-flex align-items-center">
                <img src="/images/training/customers/susan.png" style="width: 40px; height: auto;" alt="" class="mr-2">
                <p class="name mb-0">Susan Godlove</p>
            </div>
            <div>
                <img class="img-fluid" src="/images/training/google-icon.svg" style="width: 20px; height: auto;" alt="">
            </div>
        </div>
        <div class="card-body">
            <p class="">
                Julia was terrific during the training class and was extremely patient with all who were on the GoToMeeting for the
                class. Answered all the questions. I have even looked at a few YouTube videos to get answers about things that were not
                covered in training. These are extremely helpful as well.
            </p>
        </div>
    </div>
    <div class="card facebook-card rounded-0 ml-3">
        <div class="card-header d-flex justify-content-between">
            <div class="d-flex align-items-center">
                <img src="/images/training/customers/sandy.png" style="width: 40px; height: auto;" alt="" class="mr-2">
                <p class="name mb-0">Sandy White</p>
            </div>
            <div>
                <img class="img-fluid" src="/images/training/google-icon.svg" style="width: 20px; height: auto;" alt="">
            </div>
        </div>
        <div class="card-body">
            <p class="">
                I just received my MT1501 machine 2 weeks ago and I absolutely love it!!! Ricoma provides training FREE of charge and
                technical support. They truly are awesome and thanks to them, I am looking forward to a very successful embroidery
                business!
            </p>
        </div>
    </div>
    <div class="card facebook-card rounded-0 ml-3">
        <div class="card-header d-flex justify-content-between">
            <div class="d-flex align-items-center">
                <img src="/images/training/customers/ana.png" style="width: 40px; height: auto;" alt="" class="mr-2">
                <p class="name mb-0">Ana Santamaria Johnson</p>
            </div>
            <div>
                <img class="img-fluid" src="/icons/facebook-blue.svg" style="width: 20px; height: auto;" alt="">
            </div>
        </div>
        <div class="card-body">
            <p class="">
                The process of buying my machine has been wonderful. The ABSOLUTE BEST part was getting to come in and train in person
                with Sofia. She was extremely helpful and answered all my questions. Her suggestions and tips will definitely help me
                get started. I cannot thank her enough fro all her guidance.
            </p>
        </div>
    </div>
</div>