<div class="card shadow">
    <div class="card-header border-primary">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="mb-0">{{$career->position_title}}</h3>
            </div>
        </div>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('update-career', ["id" => $career->id]) }}">
            @csrf
            {{ method_field('PUT') }}
            <div class="form-group">
                <label for="position_title">Position Title</label>
                <input value="{{$career->position_title}}" type="text" class="form-control" name="position_title" id="position_title"
                    aria-describedby="emailHelp" placeholder="{{ $career->position_title }}">
            </div>
            <div class="form-group">
                <label for="description">Job Description</label>
                <div class="input-group">
                    <textarea id="description" name="description" rows="5" cols="100">{{ $career->description }}</textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="">Active</label> <br>
                <!-- Rounded switch -->
                <label class="switch">

                <input type="checkbox" name="active" @if($career->active) checked @endif>
                    <span class="slider round"></span>
                </label>
            </div>
            <div class="form-group">
                <label for="career_category_id">Category</label>
                <div class="input-group">
                    <select name="career_category_id" id="">
                        @foreach ($categories as $cat)
                            @if ($cat->id === $career->career_category_id)
                                <option value="{{$cat->id}}" selected>{{ $cat->name }}</option>
                            @else
                                <option value="{{$cat->id}}">{{ $cat->name }}</option>
                            @endif    
                        @endforeach
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>