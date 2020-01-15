@extends('layouts.page')

@section('page-content')
<div class="row">
    <div class="col-lg-3">
        <div class="card">
            <div class="card-header">
                <h3 class="mb-0">Promotion</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('update-promotion', ['id' => $promotion->id]) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method("PUT")
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" class="form-control" placeholder="Promotion name..." name="name" required
                            value="{{ $promotion->name }}">
                    </div>
                    <div class="form-group">
                        <label for="">Top Banner Title</label>
                        <input type="text" class="form-control" name="title" value="{{ $promotion->title }}">
                    </div>
                    <div class="form-group">
                        <label for="">Top Banner Body</label>
                        <input type="text" class="form-control" name="body" value="{{ $promotion->body }}">
                    </div>
                    <div class="form-group">
                        <label for="">Top Banner Link</label>
                        <input type="url" class="form-control" name="link" value="{{ $promotion->link }}">
                    </div>
                    <div class="form-group">
                        <label for="">Image Banner Body</label>
                        <input type="text" class="form-control" name="banner_body"
                            value="{{ $promotion->banner_body }}">
                    </div>
                    <div class="form-group">
                        <label for="">Banner Image</label><br>
                        @if (!blank($promotion->banner_image_path))
                        <div class="my-3">
                            <img src="{{ $promotion->banner_image_path }}" alt="" class="img-fluid">
                        </div>
                        @endif
                        <input type="file" name="banner_image">
                    </div>
                    <div class="row">
                        <div class="col d-flex flex-column justify-content-center">
                            <div class="form-group">
                                <label for="">Discount</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">%</span>
                                    </div>
                                    <input type="number" name="discount" class="form-control" required
                                        value="{{ $promotion->discount }}">
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <div class="col d-flex flex-column justify-content-center">
                                    <div class="form-group">
                                        <label for="">Active</label> <br>
                                        <!-- Rounded switch -->
                                        <label class="switch">
                                            <input type="checkbox" name="active" @if($promotion->active) checked @endif>
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary btn-block" type="submit">Update</button>
                </form>
                @if (!blank($promotion->banner_image_path))
                <form action="{{ route('update-promotion', ['id' => $promotion->id]) }}" class="mt-3" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method("PUT")
                    <input type="hidden" name="banner_image" value="remove">
                    @if ($promotion->active)
                    <input type="hidden" name="active" value="{{ $promotion->active }}">
                    @endif
                    <button type="submit" class="btn btn-danger btn-block">Remove banner image</button>
                </form>
                @endif
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card shadow" id="products-table">

            <div class="card-header border-0">
                <h3 class="p-3">Products in promotion</h3>
                <ul class="nav nav-tabs nav-fill nav-justified" id="myTab" role="tablist">
                    @foreach($categories as $index => $cat)
                    <li class="nav-item">
                        <a class="nav-link @if($index == '0') active @endif" id="home-tab" data-toggle="tab"
                            href="#products{{ $cat->id }}tab" role="tab">
                            {{ $cat->name }}
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
            <form action="{{ route('add-promotion-products', ['id' => $promotion->id]) }}" method="POST">
                <div class="tab-content">
                    @foreach($categories as $index => $cat)
                    <div class="tab-pane @if($index == '0') active @endif" id="products{{ $cat->id }}tab"
                        role="tabpanel">
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush datatable"
                                id="products{{ $cat->id }}table">
                                <thead>
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Active</th>
                                        <th scope="col">In Promotion</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($cat->products as $product)
                                    <tr>
                                        <th scope="row">
                                            {{ $product->name }}
                                        </th>
                                        <td>
                                            <span class="color-green">$ {{ $product->price }}</span>
                                        </td>
                                        <td>
                                            @if($product->active)
                                            <span class="badge badge-success">Active</span>
                                            @else
                                            <span class="badge badge-danger">Inactive</span>
                                            @endif
                                        </td>
                                        <td class="d-flex">
                                            <div class="form-group">
                                                <input type="checkbox" name="products[]" value="{{ $product->id }}"
                                                    @if(in_array($product->id, $promotion_product_ids)) checked @endif>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @csrf
                        <div class="p-4">
                            <button class="btn btn-primary" type="submit">Save</button>
                        </div>
                    </div>
                    @endforeach
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@include("partials.scripts.confirm-delete")