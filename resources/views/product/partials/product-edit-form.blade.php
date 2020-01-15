<div class="card shadow">
    <div class="card-header border-primary" data-toggle="collapse" data-target="#product-general-info" style="border-bottom: none;">
        <h3 class="mb-0">General info <i class="fa fa-chevron-down"></i></h3>
    </div>
    <div class="card-body collapse" id="product-general-info">
        <form action="{{ route('update-product', ['id' => $product->id]) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name" class="form-control" value="{{ $product->name }}" @cannot('manage-products') disabled
                    @endcannot>
            </div>
            <div class="row">
                <div class="col-auto d-flex flex-column justify-content-center">
                    <div class="form-group">
                        <label for="">Active</label> <br>
                        <!-- Rounded switch -->
                        <label class="switch">
                            <input type="checkbox" @if($product->active) checked @endif name="active"  @cannot('manage-products') disabled @endcannot>
                            <span class="slider round"></span>
                        </label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="">Categories</label>
                        @include('product.partials.category-select-options', ['categories' => $categories, 'product' => $product])

                        {{--<select name="product_category_id" id="" class="form-control"  @cannot('manage-products') disabled @endcannot>--}}
                            {{--@foreach(collect($categories)->where('is_subcategory', false) as $cat)--}}
                                {{--@include('product.partials.category-select-options', ['cat' => $cat, 'parent' => ''])--}}
                            {{--@endforeach--}}
                        {{--</select>--}}
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-auto">
                    <div class="form-group text-center">
                        <label for="">Shopify Product</label> <br>
                        <!-- Rounded switch -->
                        <label class="switch">
                            <input type="checkbox" name="is_shopify_product" @if($product->is_shopify_product) checked @endif>
                            <span class="slider round"></span>
                        </label>
                    </div>
                </div>
            </div>
            @if ($product->is_shopify_product)
                <div class="form-group">
                    <label for="">Shopify Link</label>
                    <input type="url" name="shopify_link" value="{{$product->shopify_link}}" class="form-control" required>
                </div>
            @endif
            @can('manage-products')
            <button class="btn btn-primary btn-block" type="submit">Update</button>
            @endcan
        </form>
    </div>
</div>
