<div class="row section_8 circular_ambiance_bg">
    <span class="circle bg-1"></span>
    <span class="circle bg-1-border"></span>
    <span class="circle bg-2"></span>
    <span class="circle bg-2-border"></span>
    <span class="circle bg-3"></span>
    <span class="circle bg-3-border"></span>
    <span class="circle bg-4"></span>
    <span class="circle bg-4-border"></span>

    <div class="col-lg-6 px-lg-0 px-md-5 px-0 mb-lg-0 mb-5 col-xl-4 offset-xl-1 pr-lg-5 pt-lg-0 pt-4 d-lg-flex flex-column align-items-sm-start justify-content-center text-white">
        <div class="text-lg-left text-center px-3">
            <h3 class="subtitle">View a live demo of the {{$product->name}} machine from the comfort of your home</h3>
            <p>
                You don't have to take our word for it! Watch the {{ $product->name }} in action for yourself when you schedule a free virtual demo with
                an embroidery expert. During your personal session, you can watch the full embroidery process live and ask any questions
                you have.
            </p>
            <a href="{{getRoute('virtual-demo-page')}}" class="btn purple_btn rounded_btn">{{__('Schedule a virtual demo')}}</a>
        </div>
    </div>
    <div class="col-lg-6 offset-xl-1 text-right position-relative">
        <img src="{{$product->getMedia('tablet_video')->path}}" class="img-fluid" alt="">
    </div>
</div>