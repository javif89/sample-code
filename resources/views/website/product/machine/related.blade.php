<div class="row py-5" id="related-products" style="outline: 1px solid red;">
    <div class="col-lg-8 offset-lg-2">
        <h3 class="text-center text-white mb-5 subtitle">Some other great Ricoma <br class="d-none d-lg-inline"> embroidery
            machines</h3>
        <div class="product-container">
            <div class="row">
                @foreach ($product->relatedProducts() as $p)
                <div class="col-4">
                    <div class="card h-100 mb-lg-0">
                        <div class="card-body">
                            <div class="mt-4">
                                <img src="{{$p->getMedia('thumbnail')->path}}" alt="" style="height: 200px; width: auto; max-width: 100%;" class="m-auto d-block">
                            </div>
                            <h4 class="text-center mt-4">{{$p->name}}</h4>
                            <a href="{{getRoute('machine-page', ['slug' => $p->slug])}}" class="text-center d-block">
                                Check out the {{$p->name}} <i class="fa fa-chevron-right ml-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>