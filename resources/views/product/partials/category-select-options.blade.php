@if(!empty($product) && !empty($categories))
    @foreach($categories as $cat)
        <div class="checkbox">
            <label>
                <input type="checkbox" name="categories[]" value="{{$cat->id}}" @if(in_array($cat->id, $product->categoryIds)) checked @endif @cannot('manage-products') readonly @endcannot>
                -{{ str_pad('', $cat->level, '-') }} {{$cat->name}}
            </label>
        </div>
    @endforeach
@endif
