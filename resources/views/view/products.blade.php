@extends('layouts.page')

@section('page-content')
    <div class="row mt-4">
        <div class="col-xl-8 mb-5 mb-xl-0">
            <div class="row">
                <div class="col-4">
                    @include('view.partials.product-category-menu')
                </div>
                <div class="col">
                    <div class="card shadow" id="products-table">
                        <div class="tab-content">
                            <div class="tab-pane active">
                                <div class="p-5">
                                    <h1>Select a category from the menu on the left</h1>
                                </div>
                            </div>
                            @foreach($categories as $index => $cat)
                            <div class="tab-pane" id="products{{ $cat->id }}tab" role="tabpanel">
                                <div class="table-responsive">
                                    <table class="table align-items-center table-flush datatable" id="products{{ $cat->id }}table">
                                        <thead>
                                            <tr>
                                                <th scope="col">Name</th>
                                                <th scope="col">Active</th>
                                                <th scope="col">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($cat->products as $product)
                                            <tr>
                                                <th scope="row">
                                                    {{ $product->name }}
                                                </th>
                                                <td>
                                                    @can('manage-products')
                                                    @if(count($product->countries))
                                                    <span class="badge badge-success">Active ({{count($product->countries)}})</span>
                                                    @else
                                                    <span class="badge badge-danger">Inactive</span>
                                                    @endif
                                                    @endcan
                                                    @cannot('manage-products')
                                                    @if(in_array($countryContext->get(),
                                                    collect($product->countries)->pluck('code')->toArray()))
                                                    <span class="badge badge-success">Active</span>
                                                    @else
                                                    <span class="badge badge-danger">Inactive</span>
                                                    @endif
                                                    @endcannot
                    
                                                </td>
                                                <td class="d-flex">
                                                    <a href="{{ route('edit-product', ['id' => $product->id]) }}"
                                                        class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                                    @can('manage-products')
                                                    <form action="{{ route('delete-product', ['id' => $product->id]) }}" method="POST"
                                                        onsubmit="return confirmDelete(this, 'product')">
                                                        @csrf
                                                        @method("DELETE")
                                                        <button class="btn btn-sm btn-danger" type="submit"><i
                                                                class="fa fa-trash"></i></button>
                                                    </form>
                                                    @endcan
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @can('manage-products')
        <div class="col-lg-4">
            <div class="card shadow mb-3">
                <div class="card-header border-primary">
                    <h3 class="mb-0">Create Product</h3>
                </div>
                <div class="card-body" id="product-create-form">
                    <form action="{{ route('create-product') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="row">
                            <div class="col-auto d-flex flex-column justify-content-center">
                                <div class="form-group">
                                    <label for="">Active</label> <br>
                                    <!-- Rounded switch -->
                                    <label class="switch">
                                        <input type="checkbox" name="active">
                                        <span class="slider round"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="form-group text-center">
                                    <label for="">Shopify Product</label> <br>
                                    <!-- Rounded switch -->
                                    <label class="switch">
                                        <input type="checkbox" name="is_shopify_product" v-model="isShopifyProduct">
                                        <span class="slider round"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group" v-if="isShopifyProduct">
                            <label for="">Shopify Link</label>
                            <input type="url" name="shopify_link" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Category</label>

                            @foreach($categories as $cat)
                            <div class="checkbox">
                                <label>
                                <input type="checkbox" name="categories[]" value="{{$cat->id}}">
                                  -{{ str_pad('', $cat->level, '-') }} {{$cat->name}}
                                </label>
                            </div>
                            @endforeach

                        </div>
                        <button class="btn btn-primary btn-block" type="submit">Create</button>
                    </form>
                </div>
            </div>
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">Product Categories</h3>
                        </div>
                        <div class="col text-right">
                            <a data-toggle="collapse" href="#new-product-category" class="btn btn-sm btn-success"><i
                                    class="fa fa-plus"></i></a>
                        </div>
                    </div>
                    <div class="mt-3 collapse" id="new-product-category">
                        <p><b>New product category</b></p>
                        <form action="{{ route('create-product-category') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="row">
                                <div class="col-auto">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label for="">Is Sub-Category</label> <br>
                                            <!-- Rounded switch -->
                                            <label class="switch">
                                                <input type="checkbox" name="is_subcategory" :checked="isSubCategory" v-model="isSubCategory">
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group" v-if="isSubCategory">
                                        <label for="">Parent Category</label>
                                        <select name="product_category_id" id="" class="form-control" required>
                                            @foreach($categories as $cat)
                                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-success" type="submit" id="button-addon2">Create</button>
                        </form>
                    </div>
                </div>
                <div class="card-body">
                    @foreach($parentCategories as $cat)
                    @include('view.partials.product-category', ['category' => $cat])
                    @endforeach
                </div>
            </div>
        </div>
        @endcan
    </div>
@endsection

@include('partials.scripts.confirm-delete')

@push('js')
    <script>
        const app = new window.Vue({
            el: "#product-create-form",
            data: {
                isShopifyProduct: false,
            }
        });

        const appCat = new window.Vue({
            el: "#new-product-category",
            data: {
                isSubCategory: false
            }
        });

    </script>

@endpush
