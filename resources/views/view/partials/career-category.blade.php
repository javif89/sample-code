<div class="row mb-3">
    <div class="col">
        {{ $category->name }}
    </div>
    <div class="col-auto d-flex">
        <a data-toggle="collapse" href="#category{{ $category->id }}collapse" class="btn btn-sm btn-primary"><i
                class="fa fa-edit"></i></a>
        <form action="{{ route('delete-career-category', ['id' => $category->id]) }}" method="POST"
            onsubmit="return confirmDelete(this, 'category')">
            @csrf
            @method("DELETE")
            <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
        </form>
    </div>
</div>
<div class="collapse p-2 mb-2" id="category{{ $category->id }}collapse">
    <form action="{{ route('update-career-category', ['id' => $category->id]) }}" method="POST">
        @csrf
        @method("PUT")
        <div class="form-group">
            <label for="">Name</label>
            <input type="text" class="form-control" value="{{ $category->name }}" name="name" required>
        </div>
        <button class="btn btn-primary btn-block" type="submit">Update</button>
    </form>
</div>
