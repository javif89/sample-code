<div class="row section_9 pt-lg-0 pt-md-3">
    <div class="col-xl-6 d-none d-lg-block">
        <machine-hoop 
            topimg="{{$product->getMedia('hoop_top_img')->path}}" 
            midimg="{{$product->getMedia('hoop_middle_img')->path}}" 
            bottomimg="{{$product->getMedia('hoop_bottom_img')->path}}">
        </machine-hoop>
    </div>
    <div class="col-xl-5 d-flex flex-column justify-content-center text-center text-lg-left text-white px-lg-0 px-md-5 px-3 mx-lg-0 mx-md-5 mx-0">
        <div>
            <span class="small_title">{{__('Financing')}}</span>
        </div>
        <div>
            <span class="subtitle">{{__('0% financing.')}}</span>
        </div>
        <div>
            <span class="subtitle">{{__('0% hassle.')}}</span>
        </div>
        <div>
            <span class="subtitle">{{__('100% satisfaction.')}}</span>
        </div>
        <p class="pt-3">{{__("Save thousands and see a return on investment quicker with interest-free payments! When you qualify for 0% financing,
        you'll have the flexibility to grow your business with more equipment and tools than ever before. Apply for 0% financing
        and get started with little to no money down when you qualify.")}}</p>
        <div>
            <a class="btn orange_gradient_btn mt-4 m-auto ml-lg-0" href="{{getRoute('financing-page')}}" role="button">{{__('Learn more')}}</a>
        </div>
    </div>
    <div class="col-12 d-lg-none mt-3">
        <machine-hoop 
            topimg="{{$product->getMedia('hoop_top_img')->path}}"
            midimg="{{$product->getMedia('hoop_middle_img')->path}}"
            bottomimg="{{$product->getMedia('hoop_bottom_img')->path}}">
        </machine-hoop>
    </div>
</div>

<div class="row section_10 pt-lg-0 pt-md-3">
    <div class="col-xl-5 offset-xl-1 d-flex flex-column justify-content-center text-center text-lg-left text-white px-md-5 px-3 mx-lg-0 mx-md-5 mx-0">
        <div>
            <span class="small_title">{{__('Training')}}</span>
        </div>
        <div>
            <span class="subtitle">{{__('You’ll be an expert after our free Ricoma customer training')}}</span>
        </div>
        <p class="pt-3">{{__("No experience? No problem. Become an embroidery pro in no time with Ricoma's free training and unlimited 7-day support
        for the lifetime of your machine. You'll also get exclusive access to an online support group filled with helpful Ricoma
        machine owners and our certified Ricoma technicians.")}}</p>
        <div>
            <a class="btn orange_gradient_btn mt-4 m-auto ml-lg-0" href="{{getRoute('training-page')}}" role="button">{{__('Learn more')}}</a>
        </div>
    </div>

    <div class="col-xl-6">
        <machine-needle
            topimg="{{$product->getMedia('needle_top_img')->path}}" 
            midimg="{{$product->getMedia('needle_middle_img')->path}}" 
            bottomimg="{{$product->getMedia('needle_bottom_img')->path}}">
        </machine-needle>
    </div>
</div>

<div class="row section_12 pt-lg-0 pt-md-3 mb-lg-0 mb-1">
    <div class="col-xl-6 d-none d-xl-block">
        <machine-warranty src="{{$product->getMedia('warranty_img')->path}}"></machine-warranty>
    </div>
    <div class="col-xl-5 d-flex flex-column justify-content-center text-center text-lg-left text-white px-lg-0 px-md-5 px-3 mx-lg-0 mx-md-5 mx-0">
        <div>
            <span class="small_title">{{__('Warranty')}}</span>
        </div>
        <div>
            <span class="subtitle">{{__('You’ll get peace of mind with a 5-year limited warranty')}}</span>
        </div>
        <p class="pt-3">{{__("Keep your machine covered for the first 5 years with our included warranty. You can enjoy peace of mind knowing your
        business is backed by the industry's best support and warranty.")}}</p>
        <div>
            <a class="btn orange_gradient_btn mt-4 m-auto ml-lg-0" href="{{getRoute('contact-page')}}" role="button">{{__('Learn more')}}</a>
        </div>
    </div>
    <div class="col-xl-6 d-xl-none">
        <machine-warranty src="{{$product->getMedia('warranty_img')->path}}"></machine-warranty>
    </div>
</div>