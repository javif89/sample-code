<div class="container-fluid shop_wrapper">
    <div class="row pt-5 pb-5">
        @foreach($categories as $cat)
            @if(!$cat->is_subcategory)
                <div class="col">
                    <span>{{$cat->name}}</span>

                    @foreach($cat->products as $product)
                        <div class="row">
                            <div class="col">
                                <a href="{{route('get-product', [session('country'), $product->name])}}">{{$product->name}}</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        @endforeach
    </div>
</div>
