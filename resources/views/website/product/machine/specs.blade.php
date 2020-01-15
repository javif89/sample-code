<div id="product-specs" class="spec_tab_panel">
    @php
        $panel = $product->getMedia('spec_panel');
    @endphp
    <div class="specs-container">
        <div class="spec-subsection">
            <div class="spec-header quicklook-header">
                Quicklook
            </div>
            <div class="spec-container">
                <div class="spec">
                    <span class="item-value">{{$product->getContent('spec_heads')}}</span>
                    <span class="item-label">Head</span>
                </div>
                <div class="spec">
                    <span class="item-value">{{$product->getContent('spec_needles')}}</span>
                    <span class="item-label">Needles</span>
                </div>
                <div class="spec">
                    <span class="item-value">{{$product->getContent('spec_stitchesperminute')}}</span>
                    <span class="item-label">Maximum speed in <br> stitches per minute</span>
                </div>
                <div class="spec">
                    <img class="spec-icon" src="/icons/stitch_icon.svg" alt="">
                    <span class="item-label">{{$product->getContent('spec_memorycapacity')}}<br> Memory Capacity</span>
                </div>
                <div class="spec">
                    <img class="spec-icon" src="{{$panel->path}}" alt="">
                    <span class="item-label">{{$panel->caption}}</span>
                </div>
                <div class="spec" >
                    <img class="spec-icon" src="{{asset('/icons/Embroidery Area Icon.svg')}}" alt="">
                    <span class="item-label">{{$product->getContent('spec_embroideryarea')}}</span>
                </div>
                <div class="spec" >
                    <span class="item-value item-value-sm">{{$product->getContent('spec_hoops')}}</span>
                    <span class="item-label">Hoops</span>
                </div>
                <div class="spec" >
                    <img class="spec-icon" src="{{asset('/icons/Cap Ring Icon.svg')}}" alt="">
                    <span class="item-label">{{$product->getContent('spec_includes')}}</span>
                </div>
                <div class="spec">
                    <img class="spec-icon" src="{{asset('/icons/Shirt.svg')}}" alt="">
                    <span class="item-label">{{$product->getContent('spec_usability')}}</span>
                </div>
            </div>
        </div>
        <div class="spec-subsection">
            <div class="spec-header">
                Panel
            </div>
            <div class="spec-container">
                <div class="spec richspec">
                    <div class="item-label richspec-container">{!!$product->getContent('specpanel_specs')!!}</div>
                </div>
            </div>
        </div>
        <div class="spec-subsection">
            <div class="spec-header">
                Size & Weight
            </div>
            <div class="spec-container sw-container">
                <div class="spec mobile-spec">
                    <p class="item-label">{{$product->getContent('sizeweight_dimensions')}}</p>
                </div>
                <div class="spec mobile-spec">
                    <p class="item-label">{{$product->getContent('sizeweight_netweight')}}</p>
                </div>
                <div class="spec mobile-spec">
                    <p class="item-label">{{$product->getContent('sizeweight_shippingweight')}}</p>
                </div>
            </div>
        </div>
        <div class="spec-subsection">
            <div class="spec-header">
                Additional Features
            </div>
            <div class="spec-container">
                <div class="spec richspec">
                    <div class="item-label richspec-container">{!!$product->getContent('additional_features')!!}</div>
                </div>
            </div>
        </div>
    </div>
</div>