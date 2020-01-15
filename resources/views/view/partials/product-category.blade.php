<div class="row mb-3">
    <div class="col">
        {{ $category->name }}
    </div>
    <div class="col-auto d-flex">
        {{-- <a data-toggle="collapse" href="#category{{ $category->id }}collapse" class="btn btn-sm btn-primary"><i
                class="fa fa-edit"></i></a>
        <form action="{{ route('delete-product-category', ['id' => $category->id]) }}" method="POST"
            onsubmit="return confirmDelete(this, 'category')">
            @csrf
            @method("DELETE")
            <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
        </form> --}}
    </div>
</div>
<div class="collapse p-2 mb-2" id="category{{ $category->id }}collapse">
    <form action="{{ route('update-product-category', ['id' => $category->id]) }}" method="POST">
        @csrf
        @method("PUT")
        <div class="form-group">
            <label for="">Name</label>
            <input type="text" class="form-control" value="{{ $category->name }}" name="name" required>
        </div>
        <div class="row">
            <div class="col-auto">
                <div class="form-group">
                    <div class="form-group">
                        <label for="">Is Sub-Category</label> <br>
                        <!-- Rounded switch -->
                        <label class="switch">
                            <input type="checkbox" name="is_subcategory" @if($category->is_subcategory) checked @endif
                            v-model="isSubCategory">
                            <span class="slider round"></span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="form-group" v-if="isSubCategory">
                    <label for="">Parent Category</label>
                    <select name="product_category_id" id="" class="form-control" required>
                        @foreach($categories as $cat)
                        @if($cat->id !== $category->id)
                        <option value="{{ $cat->id }}" @if($cat->id === $category->product_category_id) selected
                            @endif>{{ $cat->name }}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <button class="btn btn-primary btn-block" type="submit">Update</button>
    </form>
</div>
@if(!empty($category->subcategories))
<div class="pl-3 subcategories" style="border-left: 1px solid lightgray;">
    @foreach($category->subcategories as $cat)
    @include('view.partials.product-category', ['category' => $cat])
    @endforeach
</div>
@endif