@extends('website.layouts.main')

@section('content')
<div id="reviews">
    <div class="hero">
        <div class="container">
            <h1 class="title mb-lg-4 mb-3">See why customers love Ricoma</h1>
            <p class="subtitle">
                We have helped thousands of embroidery businesses get started and expand in over 150 countries. With our
                unmatched
                industry support and top of the line equipment, there's a reason why our customers are choosing Ricoma.
            </p>
        </div>
    </div>
    <div class="badges">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-6 verticenter py-4">
                    <img src="/images/reviews/badge-1.svg"
                        style="height: 100%; width: auto;" alt="" class="my-lg-5">
                </div>
                <div class="col-lg-3 col-6 verticenter py-4">
                    <img src="/images/reviews/badge-2.svg"
                        style="height: 100%; width: auto;" alt="" class="my-lg-5">
                </div>
                <div class="col-lg-3 col-6 verticenter py-4">
                    <img src="/images/reviews/badge-3.svg"
                        style="height: 100%; width: auto;" alt="" class="my-lg-5">
                </div>
                <div class="col-lg-3 col-6 verticenter py-4">
                    <img src="/images/reviews/badge-4.svg"
                        style="height: 100%; width: auto;" alt="" class="my-lg-5">
                </div>
            </div>
        </div>
    </div>
    <div class="bg-light py-5 px-lg-5 collage">
        <div class="mx-lg-5">
            <img src="/images/reviews/collage.png" alt="" class="img-fluid">
        </div>
    </div>
    <div class="py-5">
        <div class="container">
            <h1 class="text-center">The road to success starts <br class="d-none d-lg-inline"> with a Ricoma machine…</h1>
            <div class="row my-5">
                <div class="col-lg-6 mb-lg-0 mb-3">
                    @include('website.components.video', ['thumbnail' => '/images/reviews/thumb-1.png', 'id' => 'vid-1', 'src' => 'https://videos.sproutvideo.com/embed/1c9cdcb51c1ceec494/56c00e0dec67aea1'])
                </div>
                <div class="col-lg-6 verticenter px-lg-5 text-lg-left text-center">
                    <h3 class="bold">From graphic design to a full time <br class="d-none d-lg-inline"> embroidery business</h3>
                    <p class="">With the combination of 0% financing and the technical support, that was basically an ease in making the decision!</p>
                    <div class="logo-section">
                        <img src="/images/reviews/logo-1.png" alt="" class="logo" style="width: 135px;">
                        <div class="text">
                            RCM-1501TC <br class="">
                            MACHINE OWNER
                        </div>
                    </div>
                </div>
            </div>

            <div class="row my-5 py-lg-5">
                <div class="col-lg-6 verticenter px-lg-5 order-lg-1 order-2 text-lg-left text-center">
                    <h3 class="bold">How these embroiderers hit <br class="d-none d-lg-inline"> 30,000 caps in 6 months</h3>
                    <p class="">I can easily set this machine up for any client, run any design on that machine, and I'll guarantee you, it will compete
                    with any machine on the market today.</p>
                    <div class="logo-section">
                        <img src="/images/reviews/logo-2.png" alt="" class="logo" style="width: 70px;">
                        <div class="text">
                            CHT2-1506 <br class="">
                            MACHINE OWNER
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-lg-0 mb-3 order-lg-2 order-1">
                    @include('website.components.video', ['thumbnail' => '/images/reviews/thumb-2.png', 'id' => 'vid-2', 'src' => 'https://videos.sproutvideo.com/embed/7c9dd7bc1215e5c3f4/72fc53747cb9d324'])
                </div>
            </div>

            <div class="row my-5 py-lg-5">
                <div class="col-lg-6 mb-lg-0 mb-3">
                    @include('website.components.video', ['thumbnail' => '/images/reviews/thumb-3.png', 'id' => 'vid-3', 'src' => 'https://videos.sproutvideo.com/embed/a49cdcb51c1ce0c42c/48a28c9c51be324b'])
                </div>
                <div class="col-lg-6 verticenter px-lg-5 text-lg-left text-center">
                    <h3 class="bold">When quality is key, <br class="d-none d-lg-inline"> Ricoma dominates</h3>
                    <p class="">We decided that Ricoma was our best bet. It's innovative, faster and more precise. You can see the difference in the
                    embroidery itself.</p>
                    <div class="logo-section">
                        <img src="/images/reviews/logo-3.png" alt="" class="logo" style="width: 80px;">
                        <div class="text">
                            MT-1502 <br class="">
                            MACHINE OWNER
                        </div>
                    </div>
                </div>
            </div>

            <div class="row my-5">
                <div class="col-lg-6 verticenter px-lg-5 order-lg-1 order-2 text-lg-left text-center">
                    <h3 class="bold">How this screen printer expanded to embroidery thanks to financing</h3>
                    <p class="">Ricoma has a great financing and it's part of what got me hooked up with them in the first place because like I could
                    sell one item basically and pretty much cover my machine!</p>
                    <div class="logo-section">
                        <img src="/images/reviews/logo-4.png" alt="" class="logo" style="width: 80px;">
                        <div class="text">
                            EM-1010 <br class="">
                            MACHINE OWNER
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-lg-0 mb-3 order-lg-2 order-1">
                    @include('website.components.video', ['thumbnail' => '/images/reviews/thumb-4.png', 'id' => 'vid-4', 'src' => 'https://videos.sproutvideo.com/embed/a09cdcb51c1ceecf28/5bc092cffbe5cc51'])
                </div>
            </div>
        </div>
    </div>
    <hr class="">
    <div class="mt-5">
        <h2 class="text-center" style="font-size: 36px; line-height: 52px;">Hear for yourself why <br class="d-none d-lg-inline"> customers are choosing Ricoma</h2>
        <p class="text-center">
            Our customers tell it best which is why their opinion means the most to us. <br class="d-none d-lg-inline"> No matter the machine model, there's a story
            to tell. <br class="d-none d-lg-inline"> Hear why they believe Ricoma comes out on top every time.
        </p>
        @php
            // Doing this so I only have to query once
            $embroideryProducts = App\Product::inCategory('embroidery')->get();
        @endphp
        <div class="mt-5">
            <div class="review-tabs">
                <div class="container">
                    <ul class="nav nav-tabs" role="tablist">
                        @foreach ($embroideryProducts as $i => $p)
                            <li class="nav-item">
                                <a class="nav-link verticenter @if($i == 0) active @endif" data-toggle="tab" href="#machine-{{$p->slug}}-tab" aria-selected="true">
                                    <img src="{{$p->getMedia('thumbnail')->path}}" alt="">
                                    <p class="bold">{{$p->name}}</p>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div class="tab-content py-5">
                    @foreach ($embroideryProducts as $i => $p)
                        <div class="tab-pane @if($i == 0) active @endif" id="machine-{{$p->slug}}-tab" role="tabpanel">
                            <div class="container-fluid">
                                <div class="d-flex justify-content-between align-items-center mb-5 info">
                                    <h3 class="mb-0 ml-lg-5 pl-lg-3">{{$p->name}} Reviews</h3>
                                    <a href="{{$p->link}}" class="btn orange_gradient_btn square_btn">Learn More</a>
                                </div>
                                @include('website.reviews.partials.review-carousel', ['product' => $p])
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</div>
@endsection