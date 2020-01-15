<div class="card shadow mb-1">
    <div class="card-header d-flex justify-content-between">
        <h3 class="mb-0">Distributor Files</h3>
        <button class="btn btn-success btn-sm" data-toggle="collapse"
                data-target="#new-distributor-file-form">
            <i class="fa fa-plus"></i></button>
    </div>
    <div class="card-body collapse" id="new-distributor-file-form">
        <form action="{{ route('create-product-media') }}" id="dist-file-form" method="POST" @submit.prevent="createDistMedia"
              enctype="multipart/form-data">
            <div class="form-group">
                <label for="">Type</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                    </div>
                    <select name="caption">
                        <option value="machine_photos">Machine Photo</option>
                        <option value="brochure">Brochure</option>
                        <option value="editable_brochure">Editable Brochure</option>
                        <option value="parts_book">Parts Book</option>
                        <option value="operations_manual">Operations Manual</option>
                    </select>
                </div>
            </div>


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
            <input type="hidden" name="product_id" value="{{ $product->id }}">
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
                <th>File Type</th>
                <th>File Name</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($product->distributor_files as $media)
                <tr>
                    <td>{{ $media->type_name }}</td>
                    <td>{{ $media->file_name }}</td>
                    <td class="d-flex">
                        <a href="{{ $media->path }}" class="btn btn-sm btn-default" target="_blank"><i
                                class="fa fa-eye"></i></a>
                        <button class="btn btn-sm btn-danger" @click.prevent="deleteDistMedia('{{$media->id}}')"><i
                                    class="fa fa-trash"></i></button>

                    </td>
                </tr>

            @endforeach
            </tbody>
        </table>
    </div>
</div>

@push('js')
    <script>
        $(document).ready(function () {
            var distributor_files_table = $('#distributor-files-table').DataTable({
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
