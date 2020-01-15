@extends('layouts.page')

@section('page-content')
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h3 class="mb-0">Edit Article</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('update-article', ['id' => $article->id]) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method("PUT")
                    <div class="form-group">
                        <label for="">Title</label>
                        <input type="text" class="form-control"  name="title" required value="{{$article->title}}">
                    </div>
                    <div class="form-group">
                        <label for="">Link</label>
                        <input type="text" class="form-control"  name="external_link" required  value="{{$article->external_link}}">
                    </div>
                    <div class="form-group">
                        <label for="">Summary</label>
                        <input type="text" class="form-control"  name="summary" maxlength="173" required value="{{$article->summary}}">
                    </div>
                    <div class="form-group">
                        <label for="">Date</label>
                        <div class="input-group">
                            <input name="publish_date" type='text' class="form-control simple_date_picker"  value="{{$article->publish_date->format('m/d/Y')}}" />

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Banner Image</label><br>
                        @if (!blank($article->banner_image_path))
                        <div class="my-3">
                            <img src="{{ $article->banner_image_path }}" style="max-width: 450px" alt="" class="img-fluid">
                        </div>
                        @endif
                        <input type="file" name="banner_image">
                    </div>

                    <button class="btn btn-primary" type="submit">Update</button>
                </form>
                @if (!blank($article->banner_image_path))
                <form action="{{ route('update-article', ['id' => $article->id]) }}" class="mt-3" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method("PUT")
                    <input type="hidden" name="banner_image" value="remove">
                    <button type="submit" class="btn btn-danger">Remove banner image</button>
                </form>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

@include("partials.scripts.confirm-delete")