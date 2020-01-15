@extends('layouts.page')

@section('page-content')
    <div class="row">
        <div class="col-xl-8 mb-5 mb-xl-0">
            <div class="card shadow">
                <div class="card-header border-0">
                    {{--@include('partials.country-context')--}}
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">{{ $pageTitle }}</h3>
                        </div>
                        <div class="col text-right">
                            <a data-toggle="collapse" href="#new-product-category" class="btn btn-sm btn-success"><i
                                    class="fa fa-plus"></i></a>
                        </div>
                    </div>
                    <div class="collapse mt-3" id="new-product-category">
                        <p><b>New article</b></p>
                        <form action="{{ route('create-article') }}" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="type" value="{{$type}}" />
                            @csrf
                            <div class="form-group">
                                <label for="">Title</label>
                                <input type="text" class="form-control"  name="title" required>
                            </div>
                            <div class="form-group">
                                <label for="">Link</label>
                                <input type="text" class="form-control"  name="external_link" required>
                            </div>
                            <div class="form-group">
                                <label for="">Summary</label>
                                <input type="text" class="form-control"  name="summary" maxlength="173" required>
                            </div>
                            <div class="form-group">
                                <label for="">Date</label>
                                <div class="input-group">
                                    <input name="publish_date" type='text' class="form-control simple_date_picker"  />
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="">Banner Image</label><br>
                                <input type="file" name="banner_image">
                            </div>
                            <div class="form-group">
                                {{--<input type="hidden" name="country_code" value="{{ $countryContext->get() }}" />--}}
                                {{--<input type="hidden" name="lang_code" value="{{ $countryContext->getLang() }}" />--}}
                                <button class="btn btn-success" type="submit" id="button-addon2">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush datatable" id="articles-table">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col">Title</th>
                            <th scope="col">Date</th>
                            <th scope="col">Link</th>
                            <th scope="col">Summary</th>
                            <th scope="col">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($articles as $article)
                            <tr>
                                <th scope="row">
                                    {{ $article->title }}
                                </th>
                                <td>
                                    {{ \Carbon\Carbon::parse($article->publish_date)->format('m/d/Y')}}
                                </td>
                                <td>
                                    {{ $article->external_link }}
                                </td>
                                <td>
                                    {{ $article->summary }}
                                </td>

                                <td class="d-flex">
                                    <a href="{{ route('edit-article', ['id' => $article->id]) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                    <form action="{{ route('delete-article', ['id' => $article->id]) }}" method="POST" onsubmit="return confirmDelete(this, 'article')">
                                        @csrf
                                        @method("DELETE")
                                        <input type="hidden" name="name" value="{{$article->title}}" />
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
@include("partials.scripts.date-picker")
