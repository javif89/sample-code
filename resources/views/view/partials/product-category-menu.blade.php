<ul class="list-group nav nav-tabs" id="product-category-menu">
    @foreach (App\ProductCategory::all() as $cat)
        <li class="list-group-item">
            <a data-toggle="tab" data-target="#products{{ $cat->id }}tab" class="nav-link"><span> {{$cat->name}} <span class="badge badge-primary">{{$cat->products()->count()}}</span></span> <i
                    class="fa fa-chevron-right"></i></a>
        </li>
    @endforeach
</ul>