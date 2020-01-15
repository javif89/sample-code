@extends('layouts.page')

@section('page-content')
    <div class="row">
        <div class="col-xl-8 mb-5 mb-xl-0">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">Announcements</h3>
                        </div>
                        <div class="col text-right">
                            <a data-toggle="collapse" href="#new-ann" class="btn btn-sm btn-success"><i
                                    class="fa fa-plus"></i></a>
                        </div>
                    </div>
                    <div class="collapse mt-3" id="new-ann">
                        <p><b>New Announcement</b></p>
                        <form action="{{ route('create-announcement') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="">Type</label>
                                <select class="form-control" name="type">
                                    @foreach(\App\Announcement::$types as $type => $typeName)
                                        <option value="{{$type}}">{{$typeName}}</option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="form-group">
                                <label for="">Body</label>
                                <textarea type="text" name="body" class="form-control" required></textarea>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <div class="col d-flex flex-column justify-content-center">
                                            <div class="form-group">
                                                <label for="">For Super Admins</label> <br>
                                                <!-- Rounded switch -->
                                                <label class="switch">
                                                    <input type="checkbox" name="for_sa" checked value="1">
                                                    <span class="slider round"></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <div class="col d-flex flex-column justify-content-center">
                                            <div class="form-group">
                                                <label for="">For Country Specific Admins</label> <br>
                                                <!-- Rounded switch -->
                                                <label class="switch">
                                                    <input type="checkbox" name="for_csa" checked value="1">
                                                    <span class="slider round"></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <div class="col d-flex flex-column justify-content-center">
                                            <div class="form-group">
                                                <label for="">Send as Email</label> <br>
                                                <!-- Rounded switch -->
                                                <label class="switch">
                                                    <input type="checkbox" name="to_email" value="1">
                                                    <span class="slider round"></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="form-group">
                                <button class="btn btn-success" type="submit" id="button-addon2">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush datatable" id="promotions-table">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col">Type</th>
                            <th scope="col">Body</th>
                            <th scope="col">Target Users</th>
                            <th scope="col">Send as Email</th>
                            <th scope="col">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($items as $an)
                            <tr>
                                <td scope="row">
                                    {{ $an->type_name }}
                                </td>
                                <td>
                                    {{ $an->body }}
                                </td>
                                <td>
                                    @if($an->for_sa)
                                        Super Admins<br>
                                    @endif
                                    @if($an->for_csa)
                                        Country Admins
                                    @endif
                                </td>
                                <td>
                                    @if($an->to_email)
                                        Yes
                                    @else
                                        No
                                    @endif
                                </td>

                                <td class="d-flex">
                                    <form action="{{ route('delete-announcement', ['id' => $an->id]) }}" method="POST" onsubmit="return confirmDelete(this, 'announcement')">
                                        @csrf
                                        @method("DELETE")
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