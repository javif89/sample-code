<div class="card shadow mb-1">
    <div class="card-header d-flex justify-content-between">
        <h3 class="mb-0">Product Media</h3>
        <div class="d-flex">
            @if ($countryContext->get() !== "DEFAULT")
                <button class="btn btn-sm btn-primary" data-toggle="collapse" data-target="#import-media">import from default
                    media</button>
            @endif
            <button class="btn btn-success btn-sm" data-toggle="collapse" data-target="#new-product-media-form">
                <i class="fa fa-plus"></i></button>
        </div>
    </div>
</div>
<div class="row">
    @if ($countryContext->get() !== "DEFAULT")
        <div class="col-12 collapse" id="import-media">
            <div class="card mb-2">
                <div class="card-header">
                    <h3 class="mb-0">Import Media</h3>
                </div>
                <div class="card-body">
                    @foreach ($default_media as $m)
                    @if (!existsInCollection($m, collect($product->media), ['name']))
                        <div class="col-lg-6">
                            <div class="form-group">
                                <p class="">{{ $m->name }}</p>
                                <img src="{{ $m->path }}" alt="" class="img-fluid">
                            </div>
                            <form action="{{ route('create-product-media') }}" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="name" value="{{ $m->name }}">
                                <input type="hidden" name="path" value="{{ $m->path }}">
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <input type="hidden" name="country_code" value="{{ $countryContext->get() }}" />
                                @csrf
                                <div class="form-group">
                                    <button class="btn btn-default btn-sm" type="submit">import</button>
                                </div>
                            </form>
                        </div>
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
    @endif
    <div class="col-12 collapse" id="new-product-media-form">
        <div class="card mb-2">
            <div class="card-header">
                <h3 class="mb-0">New Product Media</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('create-product-media') }}" method="POST"
                      enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="">File</label> <br>
                        <input type="file" name="file" id="new_img"  required>
                        <img id="new_img_src" src="#" alt="" class="card-img-top">
                    </div>
                    <div class="form-group">
                        <label for="">Caption (optional)</label> <br>
                        <input type="text" name="caption" class="form-control">
                    </div>
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <input type="hidden" name="country_code" value="{{ $countryContext->get() }}" />
                    @csrf
                    <div class="form-group">
                        <button class="btn btn-default" type="submit">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @foreach($product->media as $media)
        <div class="col-lg-6">
            <div class="card card-stats mb-3 shadow position-relative">
                @if($media->type->name == "image")
                    <img src="{{ $media->path }}" alt="" class="card-img-top">
                @endif
                <div class="card-body">
                    <div class="row">
                        <div class="col-auto d-flex align-items-center">
                            @if($media->type->name == "image")
                                <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                                    <i class="fas fa-image"></i>
                                </div>
                            @else
                                <div class="icon icon-shape bg-success text-white rounded-circle shadow">
                                    <i class="fas fa-file"></i>
                                </div>
                            @endif
                        </div>
                        <div class="col">
                            <form action="{{ route('update-product-media', ['id' => $media->id]) }}"
                                  enctype="multipart/form-data" method="POST">
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" name="name" value="{{ $media->name }}"
                                           class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <p>Current file: {{ basename($media->path) }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="">File</label> <br>
                                    <input type="file" name="file">
                                </div>
                                <div class="form-group">
                                    <label for="">Caption (optional)</label> <br>
                                    <input type="text" name="caption" class="form-control" value="{{ $media->caption }}">
                                </div>
                                @if (Auth::user()->isSuper)
                                <div class="form-group">
                                    <label for="">Country</label>
                                    <select name="country_code" class="form-control">
                                        <option value="DEFAULT" @if($countryContext->get() == 'DEFAULT') selected @endif>DEFAULT</option>
                                        @foreach($countryContext->getAvailableCountries() as $country)
                                        <option value="{{$country->code}}" @if($countryContext->get() == $country->code) selected
                                            @endif>{{$country->name}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                @endif
                                @csrf
                                @method("PUT")
                                <input type="hidden" name="old_file_name" value="{{ $media->path }}">
                                <button class="btn btn-primary btn-block">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
                <form action="{{ route('delete-product-media', ['id' => $media->id]) }}" method="POST"
                      onsubmit="return confirmDelete(this, 'media')">
                    @method("DELETE")
                    @csrf
                    <input type="hidden" name="old_file_name" value="{{ $media->path }}">
                    <button class="btn btn-sm btn-danger position-absolute" style="top: 0; right: 0;"><i
                            class="fa fa-trash"></i></button>
                </form>
            </div>
        </div>
    @endforeach
</div>
