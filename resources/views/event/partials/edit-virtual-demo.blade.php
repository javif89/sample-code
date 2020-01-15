<div id="edit-demo" class="card shadow">
    <div class="card-header border-primary">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="mb-0">{{$event->type->name}}</h3>
            </div>
        </div>
    </div>
    <div class="card-body">
        <form action="/event-products/{{$event->id}}" method="POST" id="update-demo">
            <div class="form-group">
                <label for="product-list">{{$event->type->name}} Name</label>
                <select class="form-control" name="product_id" id="product-list">
                    @foreach ($products as $p)
                    <option value="{{ $p->id }}" @if($event->products[0]->product_id == $p->id) selected @endif>{{ $p->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="start_date">Start Date</label>
                <div id='date-picker' class="input-group">
                    <input disabled="true" id="start_date" type='text' class="form-control"
                        value="{{ Carbon\Carbon::parse($event->start_datetime)->format("l, F d, Y h:m a") }}">
                    <input name="start_datetime" type="hidden" value="{{ $event->start_datetime }}">
                    <div class="input-group-append">
                        <span class="input-group-text"><span class="mx-1">
                                <i class="fa fa-calendar fa-lg calendar-logo" aria-hidden="true"></i>
                            </span></span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="end_date">End Date</label>
                <input disabled="true" id="end_date" type='text' class="form-control"
                    value="{{ Carbon\Carbon::parse($event->end_datetime)->format("l, F d, Y h:m a") }}" />
                <input name="end_datetime" type="hidden" value="{{ $event->end_datetime }}">
            </div>
            <div class="form-group">
                <label for="">Language</label>
                <select name="language_id" id="" class="form-control">
                    @foreach ($languages as $l)
                    <option value="{{ $l->id }}" @if($event->products[0]->language_id == $l->id) selected @endif>{{ $l->name }}</option>
                    @endforeach
                </select>
            </div>
            <input type="hidden" name="event_id" value="{{ $event->id }}">
            <input type="hidden" name="event_product_id" value="{{ $event->products[0]->id }}">
            <input type="hidden" name="event_type_id" value="{{ $event->type->id }}">
            @csrf
            @method("PUT")
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>

@push('js')
<script>
    $(document).ready(function () {
        
        $('#date-picker').daterangepicker({
            // singleDatePicker: true,
            opens: 'left',
            timePicker: true,
            startDate: moment().startOf('hour'),
            endDate: moment().startOf('hour').add(32, 'hour'),
            locale: {
            format: 'LLLL'
            }
        }, function(start, end, label) {
            $('input[name="start_datetime"]').val(start.format('YYYY-MM-DD HH:mm:ss'));
            $('#start_date').val(start.format('LLLL'));
            
            $('input[name="end_datetime"]').val(end.format('YYYY-MM-DD HH:mm:ss'));
            $('#end_date').val(end.format('LLLL'));
            // console.log("A new date selection was made: " + start.format('LLLL'));
        });
    });
</script>
@endpush