@extends('layouts.page')

@section('page-content')
    <div class="row">
        <div class="col-xl-8 mb-5 mb-xl-0">
            <div class="card shadow">
                <div class="card-header border-0">
                    @include('partials.country-context')
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">Promotions</h3>
                        </div>
                        <div class="col text-right">
                            <a data-toggle="collapse" href="#new-product-category" class="btn btn-sm btn-success"><i
                                    class="fa fa-plus"></i></a>
                        </div>
                    </div>
                    <div class="collapse mt-3" id="new-product-category">
                        <p><b>New promotion</b></p>
                        <form action="{{ route('create-promotion') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" class="form-control" placeholder="Promotion name..." name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="">Top Banner Title</label>
                                <input type="text" class="form-control" name="title" required>
                            </div>
                            <div class="form-group">
                                <label for="">Top Banner Body</label>
                                <input type="text" class="form-control" name="body" required>
                            </div>
                            <div class="form-group">
                                <label for="">Top Banner Link</label>
                                <input type="url" class="form-control" name="link" required>
                            </div>
                            <div class="form-group">
                                <label for="">Image Banner Body</label>
                                <input type="text" class="form-control" name="banner_body">
                            </div>
                            <div class="form-group">
                                <label for="">Banner Image</label><br>
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
                                            <input type="number" name="discount" class="form-control" required>
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
                                                    <input type="checkbox" name="active">
                                                    <span class="slider round"></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="country_code" value="{{ $countryContext->get() }}" />
                                <input type="hidden" name="lang_code" value="{{ $countryContext->getLang() }}" />
                                <button class="btn btn-success" type="submit" id="button-addon2">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush datatable" id="promotions-table">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Body</th>
                            <th scope="col">Products</th>
                            <th scope="col">Active</th>
                            <th scope="col">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($promotions as $promo)
                            <tr>
                                <th scope="row">
                                    {{ $promo->name }}
                                </th>
                                <th>
                                    {{ $promo->body }}
                                </th>
                                <th>
                                    {{ count($promo->products) }}
                                </th>
                                <td>
                                    @if($promo->active)
                                        <span class="badge badge-success">Active</span>
                                    @else
                                        <span class="badge badge-danger">Inactive</span>
                                    @endif
                                </td>
                                <td class="d-flex">
                                    <a href="{{ route('edit-promotion', ['id' => $promo->id]) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                    <form action="{{ route('delete-promotion', ['id' => $promo->id]) }}" method="POST" onsubmit="return confirmDelete(this, 'promotion')">
                                        @csrf
                                        @method("DELETE")
                                        <input type="hidden" name="name" value="{{$promo->name}}" />
                                        <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@include('partials.scripts.confirm-delete')
