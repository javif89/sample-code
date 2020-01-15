<div class="card shadow mb-1">
    <div class="card-header d-flex justify-content-between">
        <h3 class="mb-0">Product Content</h3>
        <div class="d-flex">
            @if ($countryContext->get() !== "DEFAULT")
                <button class="btn btn-sm btn-primary" data-toggle="collapse" data-target="#import-content">import from default
                    content</button>
            @endif
            <button class="btn btn-success btn-sm" data-toggle="collapse" data-target="#new-product-content-form"><i
                    class="fa fa-plus"></i></button>
        </div>
    </div>
</div>
<div class="row">
    @if ($countryContext->get() !== "DEFAULT")
        <div class="col-12 collapse" id="import-content">
            <div class="card mb-2">
                <div class="card-header">
                    <h3 class="mb-0">Import Content</h3>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col">
                            <b class="">Name</b>
                        </div>
                        <div class="col">
                            <b class="">Content</b>
                        </div>
                        <div class="col text-right">
        
                        </div>
                    </div>
                    @foreach ($default_content as $c)
                    @if (!existsInCollection($c, collect($product->content), ['name', 'text']))
                        <form action="{{ route('create-product-content') }}" method="POST">
                            <div class="row">
                                <div class="col">
                                    <p>{{ $c->name }}</p>
                                </div>
                                <div class="col">
                                    {{ $c->text }}
                                </div>
                                <div class="col text-right">
                                    <button type="submit" class="btn btn-default btn-sm">import</button>
                                </div>
                            </div>
                            <input type="hidden" name="name" value="{{ $c->name }}">
                            <input type="hidden" name="text" value="{{ $c->text }}">
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <input type="hidden" name="country_code" value="{{ $countryContext->get() }}" />
                            @csrf
                        </form>
                        <hr>
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
    @endif
    <div class="col-12 collapse" id="new-product-content-form">
        <div class="card mb-2">
            <div class="card-header">
                <h3 class="mb-0">New Product Content</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('create-product-content') }}" method="POST">
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="">Text</label>
                        <textarea name="text" id="" class="form-control" required></textarea>
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
    @foreach($product->content as $content)
        <div class="col-lg-12">
            <div class="card shadow mb-2 position-relative">
                <div class="card-body">
                    <form action="{{ route('update-product-content', ['id' => $content->id]) }}"
                          method="POST" id="update-content-{{$content->id}}">
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" class="form-control" name="name"
                                   value="{{ $content->name }}">
                        </div>
                        {{--<ul class="nav nav-tabs nav-fill nav-justified" id="myTab" role="tablist">--}}
                            {{--@foreach($languages as $index => $lang)--}}
                                {{--<li class="nav-item">--}}
                                    {{--<a class="nav-link @if($index == '0') active @endif" data-toggle="tab"--}}
                                       {{--href="#lang{{ $lang->id }}{{ $content->id }}tab" role="tab">--}}
                                        {{--{{ $lang->name }} ({{ strtoupper($lang->code) }})--}}
                                    {{--</a>--}}
                                {{--</li>--}}
                            {{--@endforeach--}}
                        {{--</ul>--}}
                        <div class="tab-content mt-3">
                                <div class="tab-pane active"role="tabpanel">
                                    <div class="form-group">
                                        <label for="">Content</label>
                                        <textarea name="text" id="" class="form-control">{{ $content->text }}</textarea>
                                    </div>
                                </div>
                        </div>
                        @if (Auth::user()->isSuper)
                        <div class="form-group">
                            <label for="">Country</label>
                            <select name="country_code" class="form-control">
                                <option value="DEFAULT" @if($countryContext->get() == 'DEFAULT') selected @endif>DEFAULT</option>
                                @foreach($countryContext->getAvailableCountries() as $country)
                                <option value="{{$country->code}}" @if($countryContext->get() == $country->code) selected @endif>{{$country->name}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        @endif
{{--                        <div class="form-group">--}}
{{--                            <label for="">Content</label>--}}
{{--                            <textarea name="text" id="" class="form-control"--}}
{{--                                      required>{{ $content->text }}</textarea>--}}
{{--                        </div>--}}
                        @csrf
                        @method("PUT")
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <button class="btn btn-primary btn-block" type="submit">Update</button>
                    </form>
                </div>
                <form action="{{ route('delete-product-content', ['id' => $content->id]) }}" method="POST"
                      onsubmit="return confirmDelete(this, 'content')">
                    @method("DELETE")
                    @csrf
                    <button class="btn btn-sm btn-danger position-absolute" style="top: 0; right: 0;"><i
                            class="fa fa-trash"></i></button>
                </form>
            </div>
        </div>
    @endforeach
</div>
