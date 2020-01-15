<div class="accessories row">
    <div class="container py-5">
        <div class="text-center mb-5">
            <div class="color-primary text-uppercase letter-spacing-2 bold mb-3" style="font-size: 15px;">Increase your offering</div>
            <h1 class="heading text-white">Go a step further and <br class="d-none d-lg-inline"> <i class="">maximize your investment</i></h1>
        </div>
        <div class="main-accessory text-white">
            @php
                $mainAccessory = $product->getMainAccessory();
            @endphp
            @if (!empty($mainAccessory))
                <div class="row">
                    <div class="col-lg-5 verticenter">
                        <div class="square-16by9 d-lg-none mb-3"
                            style="background-image: url('{{$mainAccessory->getMedia('thumbnail')->path}}'); border-radius: 8px;"></div>
                        <h3 class="weight-600">{{$mainAccessory->name}}</h3>
                        <p class="lead">
                            {!!$mainAccessory->getContent('description')!!}
                        </p>
                        <a href="{{$mainAccessory->shopify_link}}" class="btn orange_gradient_btn ml-0">Learn more</a>
                    </div>
                    <div class="col-lg-7">
                        <div class="square-16by9 d-none d-lg-block"
                            style="background-image: url('{{$mainAccessory->getMedia('hero_image')->path}}'); border-radius: 8px;"></div>
                    </div>
                </div>
            @endif
        </div>
        <div class="additional-accessories mt-5">
            <div class="d-md-flex justify-content-center">
                @foreach ($product->getOtherAccessories() as $accessory)
                    <div class="accessory mx-lg-3 mb-lg-0 mb-3 text-white">
                        <div class="h-100 d-md-flex flex-column justify-content-between">
                            <div>
                                <div class="square mb-3" style="background-image: url('{{$accessory->getMedia('hero_image')->path}}'); border-radius: 8px;"></div>
                                <p class="lead">{{$accessory->name}}</p>
                            </div>
                            <div class="d-flex h-100 justify-content-start">
                                <p class="">
                                    {!!$accessory->getContent('description')!!}
                                </p>
                            </div>
                            <a href="{{$accessory->shopify_link}}" target="_blank" class="">Shop now <i class="fa fa-chevron-right"></i></a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>