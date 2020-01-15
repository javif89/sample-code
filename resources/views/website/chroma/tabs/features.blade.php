<div class="container features-accordion">
    <div class="row header">
        <div class="col-6"></div>
        <div class="col-2">
            <div class="py-3 d-none d-lg-block bg inspire text-center" style="color: black;">
                <img class="img-fluid" src="/images/chroma/inspire.svg" style="width: 134px; height: auto;" alt="">
                <p class="mb-0 bold" style="opacity: 0.5;">$599</p>
            </div>
            <img src="/images/chroma/inspire-mobile.svg" style="width: 100%; height: auto;" alt="" class="d-lg-none">
        </div>
        <div class="col-2">
            <div class="py-3 d-none d-lg-block bg plus text-center" style="color: black;">
                <img class="img-fluid" src="/images/chroma/plus.svg" style="width: 100px; height: auto;" alt="">
                <p class="mb-0 bold" style="opacity: 0.5;">$1,299</p>
            </div>
            <img src="/images/chroma/plus-mobile.svg" style="width: 100%; height: auto;" alt="" class="d-lg-none">
        </div>
        <div class="col-2">
            <div class="py-3 d-none d-lg-block bg luxe text-center" style="color: black;">
                <img class="img-fluid" src="/images/chroma/luxe.svg" style="width: 100px; height: auto;" alt="">
                <p class="mb-0 bold" style="opacity: 0.5;">$1,999</p>
            </div>
            <img src="/images/chroma/luxe-mobile.svg" style="width: 100%; height: auto;" alt="" class="d-lg-none">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="heading d-flex justify-content-between collapsed" data-toggle="collapse" data-target="#file">
                <h3>File</h3>
                <h3 class="plus"><i class="fa fa-plus"></i></h3>
                <h3 class="minus"><i class="fa fa-minus"></i></h3>
            </div>
        </div>
    </div>
    <div class="collapse" id="file">
        @include('website.chroma.tabs.feature-tables.file')
    </div>
    
    <div class="row">
        <div class="col-lg-12">
            <div class="heading d-flex justify-content-between collapsed" data-toggle="collapse" data-target="#view">
                <h3>View</h3>
                <h3 class="plus"><i class="fa fa-plus"></i></h3>
                <h3 class="minus"><i class="fa fa-minus"></i></h3>
            </div>
        </div>
    </div>
    <div class="collapse" id="view">
        @include('website.chroma.tabs.feature-tables.view')
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="heading d-flex justify-content-between collapsed" data-toggle="collapse" data-target="#editing">
                <h3>Editing</h3>
                <h3 class="plus"><i class="fa fa-plus"></i></h3>
                <h3 class="minus"><i class="fa fa-minus"></i></h3>
            </div>
        </div>
    </div>
    <div class="collapse" id="editing">
        @include('website.chroma.tabs.feature-tables.editing')
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="heading d-flex justify-content-between collapsed" data-toggle="collapse" data-target="#lettering">
                <h3>Lettering</h3>
                <h3 class="plus"><i class="fa fa-plus"></i></h3>
                <h3 class="minus"><i class="fa fa-minus"></i></h3>
            </div>
        </div>
    </div>
    <div class="collapse" id="lettering">
        @include('website.chroma.tabs.feature-tables.lettering')
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="heading d-flex justify-content-between collapsed" data-toggle="collapse" data-target="#digitizing">
                <h3>Digitizing</h3>
                <h3 class="plus"><i class="fa fa-plus"></i></h3>
                <h3 class="minus"><i class="fa fa-minus"></i></h3>
            </div>
        </div>
    </div>
    <div class="collapse" id="digitizing">
        @include('website.chroma.tabs.feature-tables.digitizing')
    </div>
    
</div>