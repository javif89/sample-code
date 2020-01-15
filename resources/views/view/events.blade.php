@extends('layouts.page')
@section('page-content')
    <div id="events-container" class="row mt-5">
        <div class="col-xs-12">
            <div class="card shadow" id="events-table">
                <div class="card-header border-0">
                    {{-- @if($pageTitle === 'TRADE SHOWS')
                        @include('partials.country-context')
                    @endif --}}
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">{{$pageTitle}}</h3>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <!-- Virtual Demo table -->
                    <table class="table align-items-center table-flush datatable">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col">Event</th>
                            <th scope="col">Start Date</th>
                            <th scope="col">End Date</th>
                            <th scope="col">Region</th>
                            <th scope="col">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($events as $event)
                                <tr>
                                    <th scope="row">
                                        {{ $event->name }}
                                    </th>
                                    <td>
                                        {{ \Carbon\Carbon::parse($event->start_datetime)->isoFormat('LLLL')}}
                                    </td>
                                    <td>
                                        {{ \Carbon\Carbon::parse($event->end_datetime)->isoFormat('LLLL')}}
                                    </td>
                                    <td>
                                        {{ !empty($event->region->name) ? $event->region->name : ''}}
                                    </td>
                                    <td class="d-flex">
                                        <a href="{{ route('edit-event', ['id' => $event->id]) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                        <form action="{{ route('delete-event', ['id' => $event->id]) }}" method="POST" onsubmit="return confirmDelete(this, 'event')">
                                            @csrf
                                            @method("DELETE")
                                            <button class="btn btn-sm btn-danger" type="submit"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        @if (strtoupper($eventType->name) == "VIRTUAL DEMO")
            <create-demo :eventdata="{{ json_encode($eventType) }}" :products="{{ json_encode($products)}}" :languages="{{ json_encode($languages)}}"></create-demo>
        @else
            <div class="col-md-5">
                <div class="card shadow mb-3">
                    <div class="card-header border-primary">
                        <h3 class="mb-0">Create {{ $eventType->name }}</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('create-event') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>
            
                            <div class="form-group">
                                <label for="">Start Date</label>
                                <div class="input-group">
                                    <input disabled="true" id="start_date" type='text' class="form-control">
                                    <input name="start_datetime" type="hidden">
                                    <div id='datepicker' class="input-group-append">
                                        <span class="input-group-text"><span class="mx-1" >
                                                <i class="fa fa-calendar fa-lg calendar-logo" aria-hidden="true"></i>
                                            </span>
                                        </span>
                                    </div>
                                </div>
                            </div>
            
                            <div class="form-group">
                                <label for="">End Date</label>
                                <input name="end_datetime" type="hidden">
                                <input disabled="true" id="end_date" type='text' class="form-control" />
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Region</label>
                                <select name="region_id" id="regionSelect" class="form-control">
                                    @foreach ($regions as $region)
                                        <option value="{{$region->id}}">{{$region->name}}</option>
                                    @endforeach
                                </select>
                            </div>
            
                            <input type="hidden" name="event_type_id" value="{{$eventType->id}}">
                            {{-- @if (strtoupper($eventType->name) == "TRADE SHOW")
                                <input type="hidden" name="country_code" value="{{ $countryContext->get() }}" />
                                <input type="hidden" name="lang_code" value="{{ $countryContext->getLang() }}" />
                            @endif --}}

                            <button class="btn btn-primary btn-block" type="submit">Create</button>
                        </form>
                    </div>
                </div>
            </div>
        @endif

    </div>
@endsection
@include('partials.scripts/full-calender')

@push('js')
    <script src="{{ asset("js/events.js") }}"></script>
@endpush
@include("partials.scripts.confirm-delete")
@include("partials.scripts.date-picker")