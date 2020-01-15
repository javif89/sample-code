<div class="row section_7">
    <div class="col p-0">
        {{--Tabs--}}
        <ul class="nav nav-tabs" id="machineDetailsTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
                    aria-selected="true">The Panel</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
                    aria-selected="false">What's Included</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="specs-tab" data-toggle="tab" href="#specs" role="tab" aria-controls="specs"
                    aria-selected="false">Machine Specs</a>
            </li>
        </ul>
        {{----}}
        {{--Tabbed content--}}
        <div class="tab-content" id="machineDetailsTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                @include('website.product.machine.panel', ['panel' => $product->getContent('panel_type')])
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <product-includes :media="{{json_encode($product->getIncludedMedia())}}"></product-includes>
            </div>
            <div class="tab-pane fade" id="specs" role="tabpanel" aria-labelledby="specs-tab">
                @include('website.product.machine.specs')
                {{-- <product-specs :specs="{{json_encode($product->getSpecs())}}"></product-specs> --}}
            </div>
        </div>
        {{----}}
    </div>
</div>