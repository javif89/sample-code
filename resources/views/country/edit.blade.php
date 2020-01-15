@extends('layouts.page')

@section('page-content')
<div class="row">
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                Edit {{ $country->name }}
            </div>
            <div class="card-body">
                <form id="edit-country" action="{{route('update-country', ['id' => $country->id])}}" method="POST">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>Region</label>
                                <select name="region_id" id="" class="form-control" required>
                                    @foreach($regions as $region)
                                    <option value="{{ $region->id }}" @if($region->id == $country->region->id) selected
                                        @endif>{{ $region->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>Language</label>
                                <select name="language_id" id="" class="form-control" required>
                                    @foreach(App\Language::all() as $language)
                                    <option value="{{ $language->id }}" @if($language->id == $country->language->id)
                                        selected
                                        @endif>{{ $language->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    @csrf
                    @method("PUT")
                    <button type="submit" class="btn btn-primary btn-block">Update</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                Country Languages
            </div>
            <div class="card-body">
                <form action="{{route('update-country-languages', ['id' => $country->id])}}" method="POST"
                    id="languages-form">
                    <table class="table">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Name</th>
                                <th>Native Name</th>
                                <th>Code</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($languages as $lang)
                            <tr>
                                <td class="d-flex">
                                    <input type="checkbox" name="languages[]" value="{{ $lang->id }}"
                                        @if(!empty(collect($country->languages)->where('id',
                                    $lang->id)->first()))
                                    checked @endif>
                                </td>
                                <td>{{ $lang->name }}</td>
                                <td>{{ $lang->native_name }}</td>
                                <td>{{ strtoupper($lang->code) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @csrf
                    @method("PUT")
                    <button class="btn btn-lg btn-primary" type="submit">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script>
    $(document).ready(function () {
            var table = $('.datatable-nosort').DataTable({
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
            
            $('#languages-form').submit( function() {
                var form = this;
                
                // Encode a set of form elements from all pages as an array of names and values
                var params = table.$('input').serializeArray();
                
                // Iterate over all form elements
                $.each(params, function(){
                // If element doesn't exist in DOM
                    if(!$.contains(document, form[this.name])){
                    // Create a hidden element
                    $(form).append(
                        $('<input>')
                            .attr('type', 'hidden')
                            .attr('name', this.name)
                            .val(this.value)
                            );
                        }
                    });
                });
        });
</script>
@endpush