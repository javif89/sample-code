<div class="my-3">
    <a href="{{getRoute('machine-page', ['slug' => $product->slug])}}" target="_blank">View product page <i class="fa fa-external-link-alt"></i></a>
</div>
<ul class="list-group nav nav-tabs" id="product-edit-menu">
    <li class="list-group-item">
        <a data-toggle="tab" data-target="#hero" class="nav-link active">Hero Section <i class="fa fa-chevron-right"></i></a>
    </li>
    <li class="list-group-item">
        <a data-toggle="tab" data-target="#gallery" class="nav-link">Gallery <i class="fa fa-chevron-right"></i></a>
    </li>
    <li class="list-group-item">
        <a data-toggle="tab" data-target="#videos" class="nav-link">Videos <i class="fa fa-chevron-right"></i></a>
    </li>
    <li class="list-group-item">
        <a data-toggle="tab" data-target="#project-collage" class="nav-link">Project Collage <i class="fa fa-chevron-right"></i></a>
    </li>
    <li class="list-group-item">
        <a data-toggle="tab" data-target="#instagram-photos" class="nav-link">Instagram photos <i class="fa fa-chevron-right"></i></a>
    </li>
    <li class="list-group-item">
        <a data-toggle="tab" data-target="#panel" class="nav-link">Panel <i
                class="fa fa-chevron-right"></i></a>
    </li>
    <li class="list-group-item">
        <a data-toggle="tab" data-target="#ipad-pic" class="nav-link">iPad pic <i class="fa fa-chevron-right"></i></a>
    </li>
    <li class="list-group-item">
        <a data-toggle="tab" data-target="#hoop-animation" class="nav-link">Hoop Animation <i class="fa fa-chevron-right"></i></a>
    </li>
    <li class="list-group-item">
        <a data-toggle="tab" data-target="#needle-animation" class="nav-link">Needle Animation <i class="fa fa-chevron-right"></i></a>
    </li>
    <li class="list-group-item">
        <a data-toggle="tab" data-target="#fade-animation" class="nav-link">Fade in Animation <i class="fa fa-chevron-right"></i></a>
    </li>
    <li class="list-group-item">
        <a data-toggle="tab" data-target="#customer-carousel" class="nav-link">Customer carousel <i class="fa fa-chevron-right"></i></a>
    </li>
    <li class="list-group-item">
        <a data-toggle="tab" data-target="#social-proof" class="nav-link">Social proof <i class="fa fa-chevron-right"></i></a>
    </li>
    <li class="list-group-item">
        <a data-toggle="tab" data-target="#thumbnail" class="nav-link">Thumbnail <i
                class="fa fa-chevron-right"></i></a>
    </li>
    <li class="list-group-item">
        <a data-toggle="tab" data-target="#accessories" class="nav-link">Accessories <i class="fa fa-chevron-right"></i></a>
    </li>
    <li class="list-group-item">
        <a data-toggle="tab" data-target="#product-specs-table" class="nav-link">Specifications <i class="fa fa-chevron-right"></i></a>
    </li>
    <li class="list-group-item">
        <a data-toggle="tab" data-target="#country-availability" class="nav-link">Country Availability <i
                class="fa fa-chevron-right"></i></a>
    </li>
    <li class="list-group-item">
        <a data-toggle="tab" data-target="#facebook-reviews" class="nav-link">Facebook reviews <i
                class="fa fa-chevron-right"></i></a>
    </li>
    <li class="list-group-item">
        <a data-toggle="tab" data-target="#whats-included" class="nav-link">What's Included <i
                class="fa fa-chevron-right"></i></a>
    </li>
    @can('manage-products')
    <li class="list-group-item">
        <a data-toggle="tab" data-target="#product-dist-files" class="nav-link"> Distributor Files<i
                class="fa fa-chevron-right"></i></a>
    </li>
    @endcan
</ul>

<div class="card mt-5">
    <div class="card-body">
        <form method="post" action="{{ route('product.bulk-media-upload', ['product' => $product->id]) }}" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">Bulk upload media</label>
                <p class="text-muted">
                    You can upload a zip file with the files following the correct naming convention and they will be
                    automatically
                    assigned to the correct fields.
                </p>
                <input class="form-control" type="file" name="zip_file" required>
                @csrf
                <button class="btn btn-primary btn-block mt-3" type="submit">Upload</button>
            </div>
        </form>
    </div>
</div>