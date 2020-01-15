<div class="card shadow mb-1 my-3">
    <div class="card-header d-flex justify-content-between">
        <h3 class="mb-0">{{$event->type->name}} Media</h3>
        <button class="btn btn-success btn-sm" data-toggle="collapse" data-target="#new-event-media-form">
            <i class="fa fa-plus"></i></button>
    </div>
</div>
<div class="row">
    <div class="col-12 collapse" id="new-event-media-form">
        <div class="card mb-2">
            <div class="card-header">
                <h3 class="mb-0">New {{$event->type->name}} Media</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('create-event-media') }}" method="POST"
                      enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="">File</label> <br>
                        <input type="file" name="file" id="new_img" required>
                        <img id="new_img_src" src="#" alt="" class="card-img-top">
                    </div>
                    <input type="hidden" name="event_id" value="{{ $event->id }}">
                    @csrf
                    <div class="form-group">
                        <button class="btn btn-default" type="submit">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @foreach($event->media as $media)
        {{--                    {{ var_dump($media) }}--}}
        <div class="col-lg-6">
            <div class="card card-stats mb-3 shadow position-relative">
                @if($media->type->name == "image")
                    <img src="{{ $media->path }}" alt="" class="card-img-top">
                @endif
                <div class="card-body">
                    <div class="row">
                        <div class="col-auto d-flex align-items-center">
                            @if($media->name == "image")
                                <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                                    <i class="fas fa-image"></i>
                                </div>
                            @else
                                <div class="icon icon-shape bg-success text-white rounded-circle shadow">
                                    <i class="fas fa-file"></i>
                                </div>
                            @endif
                        </div>
                        <div class="col">
                            <form action="{{ route('update-event-media', ['id' => $media->id]) }}"
                                  enctype="multipart/form-data" method="POST">
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" name="name" value="{{ $media->name }}"
                                           class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <p>Current file: {{ basename($media->path) }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="">File</label> <br>
                                    <input type="file" name="file">
                                </div>
                                @csrf
                                @method("PUT")
                                <input type="hidden" name="old_file_name" value="{{ $media->path }}">
                                <button class="btn btn-primary btn-block">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
                <form action="{{ route('delete-event-media', ['id' => $media->id]) }}" method="POST"
                      onsubmit="return confirmDelete(this, 'media')">
                    @method("DELETE")
                    @csrf
                    <input type="hidden" name="old_file_name" value="{{ $media->path }}">
                    <button class="btn btn-sm btn-danger position-absolute" style="top: 0; right: 0;"><i
                                class="fa fa-trash"></i>
                    </button>
                </form>
            </div>
        </div>
    @endforeach
</div>