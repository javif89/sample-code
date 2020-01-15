<div class="card shadow mb-1">
    <div class="card-header d-flex justify-content-between">
        <h3 class="mb-0">{{$event->type->name}} Content</h3>
        <button class="btn btn-success btn-sm" data-toggle="collapse"
                data-target="#new-event-content-form"><i class="fa fa-plus"></i>
        </button>
    </div>
</div>
<div class="row">
    <div class="col-12 collapse" id="new-event-content-form">
        <div class="card mb-2">
            <div class="card-header">
                <h3 class="mb-0">New {{$event->type->name}} Content</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('create-event-content') }}" method="POST">
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="">Text</label>
                        <textarea name="text" id="" class="form-control" required></textarea>
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
    @foreach($event->content as $content)
        <div class="col-lg-6">
            <div class="card shadow mb-2 position-relative">
                <div class="card-body">
                    <form action="{{ route('update-event-content', ['id' => $content->id]) }}"
                          method="POST">
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" class="form-control" name="name"
                                   value="{{ $content->name }}">
                        </div>
                        <ul class="nav nav-tabs nav-fill nav-justified" id="myTab" role="tablist">
                            @foreach($languages as $index => $lang)
                                <li class="nav-item">
                                    <a class="nav-link @if($index == '0') active @endif" data-toggle="tab"
                                       href="#lang{{ $lang->id }}{{ $content->id }}tab" role="tab">
                                        {{ $lang->name }} ({{ strtoupper($lang->code) }})
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                        <div class="tab-content mt-3">
                            @foreach($languages as $index => $lang)
                                <div class="tab-pane @if($index == '0') active @endif" id="lang{{ $lang->id }}{{ $content->id }}tab"
                                     role="tabpanel">
                                    <div class="form-group">
                                        <label for="">Content ({{ $lang->name }})</label>
                                        <textarea name="translations[{{ $lang->code }}]" id="" class="form-control">@if(!empty(json_decode(json_encode($content->translations), true)[$lang->code])){{ json_decode(json_encode($content->translations), true)[$lang->code] }}@else{{ $content->text }}@endif</textarea>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        @csrf
                        @method("PUT")
                        <input type="hidden" name="event_id" value="{{ $event->id }}">
                        <button class="btn btn-primary btn-block" type="submit">Update</button>
                    </form>
                </div>
                <form action="{{ route('delete-event-content', ['id' => $content->id]) }}" method="POST"
                      onsubmit="return confirmDelete(this, 'content')">
                    @method("DELETE")
                    @csrf
                    <button class="btn btn-sm btn-danger position-absolute" style="top: 0; right: 0;"><i
                                class="fa fa-trash"></i></button>
                </form>
            </div>
        </div>
    @endforeach
</div>