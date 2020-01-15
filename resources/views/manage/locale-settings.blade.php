@extends('layouts.page')

@section('page-content')
    <div class="row">
        <div class="col-4">
            <div class="card shadow my-3">
                <div class="card-header d-flex justify-content-between">
                    <h3 class="mb-0">Languages</h3>
                    <button class="btn btn-success btn-sm" data-toggle="collapse"
                            data-target="#add-language-table">
                        <i class="fa fa-plus"></i></button>
                </div>
                <div class="table-responsive collapse" id="add-language-table">
                    <table class="table datatable-nosort">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Native Name</th>
                            <th>Code</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($disabledLanguages as $lang)
                            <tr>
                                <td>{{ $lang->name }}</td>
                                <td>{{ $lang->native_name }}</td>
                                <td>{{ strtoupper($lang->code) }}</td>
                                <td class="d-flex">
                                    <form>
                                        <button
                                            id="toggle-locale"
                                            data-localeData="language"
                                            data-toggleStatus="1"
                                            type="button"
                                            value="{{$lang->id}}"
                                            class="btn btn-sm btn-success">Enable</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card shadow">
                <div class="table-responsive">
                    <table class="table datatable-nosort">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Native Name</th>
                            <th>Code</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($languages as $lang)
                            <tr>
                                <td>{{ $lang->name }}</td>
                                <td>{{ $lang->native_name }}</td>
                                <td>{{ strtoupper($lang->code) }}</td>
                                <td class="d-flex">
                                    <form>
                                        <button
                                            id="toggle-locale"
                                            data-localeData="language"
                                            data-toggleStatus="0" 
                                            type="button" 
                                            value="{{$lang->id}}"
                                            class="btn btn-sm btn-danger">Disable</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card shadow my-3">
                <div class="card-header d-flex justify-content-between">
                    <h3 class="mb-0">Countries</h3>
                    <button class="btn btn-success btn-sm" data-toggle="collapse"
                            data-target="#add-country-table">
                        <i class="fa fa-plus"></i></button>
                </div>
                <div class="table-responsive collapse" id="add-country-table">
                    <table class="table datatable-nosort">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Region</th>
                            <th>Default Language</th>
                            <th>Code</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($disabledCountries as $c)
                            <tr>
                                <td class="d-flex align-items-center"><span style="font-size: 24px;" class="mr-1">{{ country_flag($c->code) }}</span>{{ $c->name }}</td>
                                <td>{{ $c->region }}</td>
                                <td class="text-center">{{ $c->language }}</td>
                                <td>{{ $c->code }}</td>
                                <td class="d-flex position-absolute">
                                    <form>
                                        <button
                                            id="toggle-locale"
                                            data-localeData="country"
                                            data-toggleStatus="1"
                                            type="button"
                                            value="{{$c->id}}"
                                            class="btn btn-sm btn-success">Enable</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card shadow">
                <div class="table-responsive">
                    <table class="table datatable-nosort">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Region</th>
                            <th>Default Language</th>
                            <th>Code</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($countries as $c)
                            <tr>
                                <td class="d-flex align-items-center"><span style="font-size: 24px;" class="mr-1">{{ country_flag($c->code) }}</span>{{ $c->name }}</td>
                                <td>{{ $c->region }}</td>
                                <td class="text-center">{{ $c->language }}</td>
                                <td>{{ $c->code }}</td>
                                <td class="d-flex position-absolute">
                                    <a class="btn btn-sm btn-primary" href="{{route('edit-country', ['id' => $c->id])}}">
                                     <i class="fa fa-edit"></i></a>
                                    <form>
                                        <button 
                                            id="toggle-locale"
                                            data-localeData="country"
                                            data-toggleStatus="0"
                                            type="button"
                                            value="{{$c->id}}"
                                            class="btn btn-sm btn-danger">Disable</button>
                                    </form>
                                </td>
                            </tr>
                            {{--<tr class="collapse" id="edit-country-{{ $c->id }}">--}}
                                {{--<td colspan="5">--}}
                                    {{--<form data-localeData="country" data-id="{{$c->id}}" id="edit-country">--}}
                                        {{--<div class="row">--}}
                                            {{--<div class="col">--}}
                                                {{--<div class="form-group">--}}
                                                    {{--<label>Region</label>--}}
                                                    {{--<select name="region_id" id="" class="form-control" required>--}}
                                                        {{--@foreach($regions as $region)--}}
                                                            {{--<option value="{{ $region->id }}" @if($region->id == $c->region->id) selected @endif>{{ $region->name }}</option>--}}
                                                        {{--@endforeach--}}
                                                    {{--</select>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                            {{--<div class="col">--}}
                                                {{--<div class="form-group">--}}
                                                    {{--<label>Language</label>--}}
                                                    {{--<select name="language_id" id="" class="form-control" required>--}}
                                                        {{--@foreach(App\Language::all() as $language)--}}
                                                            {{--<option value="{{ $language->id }}" @if($language->id == $c->language->id) selected @endif>{{ $language->name }}</option>--}}
                                                        {{--@endforeach--}}
                                                    {{--</select>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<button type="submit" class="btn btn-primary btn-block">Update</button>--}}
                                    {{--</form>--}}
                                {{--</td>--}}
                                {{--<td colspan="0"></td>--}}
                                {{--<td colspan="0"></td>--}}
                                {{--<td colspan="0"></td>--}}
                                {{--<td colspan="0"></td>--}}
                            {{--</tr>--}}
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card shadow my-3">
                <div class="card-header d-flex justify-content-between">
                    <h3 class="mb-0">Regions</h3>
                    {{-- TODO: Uncomment this once roles are implemented and make it available only to the super-admin role --}}
{{--                    <button class="btn btn-success btn-sm" data-toggle="collapse"--}}
{{--                            data-target="#new-region-form">--}}
{{--                        <i class="fa fa-plus"></i></button>--}}
                </div>
                <div class="card-body collapse" id="new-region-form">
                    <form action="{{ route('create-region') }}" method="POST">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        @csrf
                        <button class="btn btn-default" type="submit">Create</button>
                    </form>
                </div>
            </div>
            <div class="card shadow">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Code</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($regions as $region)
                            <tr>
                                <td>{{ $region->name }}</td>
                                <td>{{ strtoupper($region->code) }}</td>
                                <td class="d-flex">
                                    @if($region->name !== "default")
                                        <button class="btn btn-sm btn-primary" data-toggle="collapse"
                                                data-target="#edit-region-{{ $region->id }}"><i
                                                class="fa fa-edit"></i></button>
                                        {{-- TODO: Uncomment this once roles are implemented and make it available only to the super-admin role --}}
{{--                                        <form action="{{ route('delete-region', ['id' => $region->id]) }}"--}}
{{--                                              method="POST"--}}
{{--                                              onsubmit="return confirmDelete(this, 'region')">--}}
{{--                                            @method("DELETE")--}}
{{--                                            @csrf--}}
{{--                                            <button class="btn btn-sm btn-danger"><i--}}
{{--                                                    class="fa fa-trash"></i></button>--}}
{{--                                        </form>--}}
                                    @endif
                                </td>
                            </tr>
                            @if($region->name !== 'default')
                                <tr class="collapse" id="edit-region-{{ $region->id }}">
                                    <td colspan="2">
                                        <form data-localeData="region" id="edit-region" data-id="{{$region->id}}">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Name</label>
                                                        <input type="text" name="name" class="form-control" value="{{ $region->name }}" required>
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <div class="form-group">
                                                        <label for="">Code</label>
                                                        {{-- TODO:  Once roles are implemented allow super admins to edit region code --}}
                                                        <fieldset disabled>
                                                            <input type="text" name="code" value="{{ strtoupper($region->code) }}" class="form-control">
                                                        </fieldset>
                                                    </div>
                                                </div>
                                            <button class="btn btn-default" type="submit">Update</button>
                                        </form>
                                    </td>
                                    <td colspan="0"></td>
                                    <td colspan="0"></td>
                                </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function () {
            $('.datatable-nosort').DataTable({
                ordering: false,
                "oLanguage": {
                    "oPaginate": {
                        "sFirst": "First page", // This is the link to the first page
                        "sPrevious": "<", // This is the link to the previous page
                        "sNext": ">", // This is the link to the next page
                        "sLast": "Last page" // This is the link to the last page
                    }
                }
            });
        });
    </script>
@endpush

@include('partials.scripts.confirm-delete')
@include('partials.scripts.locale-settings')
