@extends('layouts.page')

@section('page-content')
<div class="row mt-4">
    <div class="col-xl-8 mb-5 mb-xl-0">
        <div class="card shadow" id="careers-table">

            <div class="card-header border-0">
                <ul class="nav nav-tabs nav-fill nav-justified" id="myTab" role="tablist">
                    @foreach($categories as $index => $cat)
                    <li class="nav-item">
                        <a class="nav-link @if($index == '0') active @endif" id="home-tab" data-toggle="tab"
                            href="#careers{{ $cat->id }}tab" role="tab">
                            {{ $cat->name }} <span
                                class="badge badge-primary badge-pill">{{ count($cat->careers) }}</span>
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>

            <div class="tab-content">
                @foreach($categories as $index => $cat)
                <div class="tab-pane @if($index == '0') active @endif" id="careers{{ $cat->id }}tab" role="tabpanel">
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush datatable career-table"
                            id="careers{{ $cat->id }}table">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Active</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cat->careers as $career)
                                <tr>
                                    <th scope="row">
                                        {{ $career->position_title }}
                                    </th>
                                    <td>
                                        <span class="desc">{{ $career->description }}</span>
                                    </td>
                                    <td>
                                        @if($career->active)
                                        <span class="badge badge-success">Active</span>
                                        @else
                                        <span class="badge badge-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <span class="d-flex">
                                            <a href="{{ route('edit-career', ['id' => $career->id]) }}"
                                                class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                            <form action="{{ route('delete-career', ['id' => $career->id]) }}"
                                                method="POST" onsubmit="return confirmDelete(this, 'career')">
                                                @csrf
                                                @method("DELETE")
                                                <button class="btn btn-sm btn-danger" type="submit"><i
                                                        class="fa fa-trash"></i></button>
                                            </form>
                                        </span>

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
    <div class="col-lg-4">
        <div class="card shadow mb-3">
            <div class="card-header border-primary">
                <h3 class="mb-0">Create Career</h3>
            </div>
            <div class="card-body" id="career-create-form">
                <form action="{{ route('create-career') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" name="position_title" class="form-control" required>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="">Description</label>
                                <div class="input-group mb-3">
                                    <textarea type="text" name="description" class="form-control" value=""
                                        required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto d-flex flex-column justify-content-center">
                            <div class="form-group">
                                <label for="">Active</label> <br>
                                <!-- Rounded switch -->
                                <label class="switch">
                                <input type="checkbox" name="active" value="1">
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Category</label>
                        <select name="career_category_id" id="" class="form-control" required>
                            @foreach($categories as $cat)
                            <option value="{{$cat->id}}">{{$cat->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <button class="btn btn-primary btn-block" type="submit">Create</button>
                </form>
            </div>
        </div>
        <div class="card shadow">
            <div class="card-header border-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="mb-0">Career Categories</h3>
                    </div>
                    <div class="col text-right">
                        <a data-toggle="collapse" href="#new-career-category" class="btn btn-sm btn-success"><i
                                class="fa fa-plus"></i></a>
                    </div>
                </div>
                <div class="mt-3 collapse" id="new-career-category">
                    <p><b>New career category</b></p>
                    <form action="{{ route('create-career-category') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>
                        <button class="btn btn-success" type="submit" id="button-addon2">Create</button>
                    </form>
                </div>
            </div>
            <div class="card-body">
                @foreach($categories as $cat)
                    @include('view.partials.career-category', ['category' => $cat])
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection

@include('partials.scripts.confirm-delete')