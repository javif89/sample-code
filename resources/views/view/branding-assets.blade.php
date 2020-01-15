@extends('layouts.page')

@section('page-content')
    <div class="row">
        <div class="col-xl-8 mb-5 mb-xl-0">
            <div class="card shadow mb-1">
                <div class="card-header d-flex justify-content-between">
                    <h3 class="mb-0">Branding Assets</h3>
                    <button class="btn btn-success btn-sm" data-toggle="collapse"
                            data-target="#new-distributor-file-form">
                        <i class="fa fa-plus"></i></button>
                </div>
                <div class="card-body collapse" id="new-distributor-file-form">
                    <form action="{{ route('create-product-media') }}" id="dist-file-form" method="POST" @submit.prevent="createDistMedia"
                          enctype="multipart/form-data">

                        <input type="hidden" name="caption" value="branding_assets" />
                        <input type="hidden" name="product_id" value="ricoma" />

                        <div class="form-group">
                            <label>Name</label>
                            <input name="name"  class="form-control" required type="text" />
                        </div>
                        <div class="form-group">
                            <label>Language</label>
                            <select name="lang_code"  class="form-control" required>
                                @foreach(App\Language::enabled()->get() as $language)
                                    <option value="{{ $language->code }}">{{ $language->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">File</label> <br>
                            <input type="file" name="file" required>
                        </div>
                        <input type="hidden" name="distributor_file" value="1">
                        @csrf
                        <button class="btn btn-default" type="submit" @click.prevent="createDistMedia">Create</button>
                    </form>
                </div>
            </div>
            <div class="card shadow">
                <div class="table-responsive">
                    <table class="table" id="distributor-files-table">
                        <thead>
                        <tr>
                            <th>File Name</th>
                            <th>File Language</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($brandingFiles as $media)
                            <tr>
                                <td>{{ $media->name }}</td>
                                <td>{{ $media->lang_code }}</td>
                                <td class="d-flex">
                                    <a href="{{ $media->path }}" class="btn btn-sm btn-default" target="_blank"><i
                                                class="fa fa-eye"></i></a>
                                    <form action="{{ route('delete-product-media', ['id' => $media->id]) }}"
                                          method="POST"
                                          onsubmit="return confirmDelete(this, 'distributor file')">
                                        @method("DELETE")
                                        @csrf
                                        <input type="hidden" name="old_file_name" value="{{ $media->path }}">
                                        <input type="hidden" name="distributor_file" value="1">
                                        <button class="btn btn-sm btn-danger"><i
                                                    class="fa fa-trash"></i></button>
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