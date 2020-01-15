<div class="card shadow">
    <div class="card-header border-primary">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="mb-0">{{$event->type->name}}</h3>
            </div>
        </div>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('update-event', ["id" => $event->id]) }}">
            @csrf
            {{ method_field('PUT') }}
            <div class="form-group">
                <label for="eventName">{{$event->type->name}} Name</label>
                <input value="{{$event->name}}" type="text" class="form-control" name="name" id="eventName"
                    aria-describedby="emailHelp" placeholder="{{ $event->name }}">
            </div>
            <div class="form-group">
                <label for="">Start Date</label>
                <div class="input-group">
                    <input disabled="true" id="start_date" type='text' class="form-control"
                        value="{{ \Carbon\Carbon::parse($event->start_datetime)->isoFormat('LLLL')}}" />
                    <input name="start_datetime" type="hidden" value="{{$event->start_datetime}}">
                    <div id='datepicker' class="input-group-append">
                        <span class="input-group-text"><span class="mx-1" >
                                <i class="fa fa-calendar fa-lg calendar-logo" aria-hidden="true"></i>
                            </span></span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="">End Date</label>
                <input name="end_datetime" type="hidden" value="{{$event->end_datetime}}">
                <input disabled="true" id="end_date" type='text' class="form-control"
                    value="{{ \Carbon\Carbon::parse($event->end_datetime)->isoFormat('LLLL')}}" />
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Region</label>
                <select name="region_id" id="regionSelect" class="form-control">
                    @foreach ($regions as $region)
                        <option @if ($event->region_id == $region->id) selected @endif value="{{$region->id}}">{{$region->name}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>