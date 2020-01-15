<div class="tab-pane @if($active) active @endif" id="products{{ $cat->id }}tab"
     role="tabpanel">
    <div class="table-responsive">
        <table class="table" id="distributor-files-table">
            <thead>
            <tr>
                <th>Product Name</th>
                <th>File Type</th>
                <th>File Name</th>
                <th>Language</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($cat->products as $product)
                @foreach($product->distributorFiles as $media)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ $media->type_name }}</td>
                        <td>{{ $media->name }}</td>
                        <td>{{ $media->lang_code }}</td>
                        <td class="d-flex">
                            <a href="{{ $media->path }}" class="btn btn-sm btn-default"
                               target="_blank"><i
                                        class="fa fa-eye"></i></a>

                        </td>
                    </tr>
                @endforeach
            @endforeach
            </tbody>
        </table>
    </div>
</div>