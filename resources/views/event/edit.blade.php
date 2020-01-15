@extends('layouts.page')

@section('page-content')
<div id="event-edit-app">
    <div v-if="loading" class="alert alert-success"
        style="position: fixed; top: 0; left: 0; width: 100%; z-index: 1000; font-size: 24px; border-radius: 0;"
        role="alert">
        Loading <div class="spinner-border"></div>
    </div>
    <div class="row">
        <div class="col-5 col-lg-3">
            @include('partials.country-context')
                @if ($event->type->name == 'Virtual Demo')
                {{-- <edit-demo :event="{{ json_encode($event) }}" :events="{{ json_encode($events)}}"
                :languages="{{ json_encode($languages)}}"></edit-demo> --}}
                    @include('event.partials.edit-virtual-demo')
                @else
                    @include('event.partials.event-edit-form')
                    @if ($event->type->name == 'Trade Show' || $event->type->name == 'General')
                        @can('manage-events')
                           @include('event.partials.menu')
                        @endcan
                    @endif
            @endif
        </div>
        <div class="col">
            <div class="tab-content">
                <div class="tab-pane active" id="hero" role="tabpanel">
                    @include('event.tabs.content')
                </div>
                <div class="tab-pane" id="social-proof" role="tabpanel">
                    @include('event.tabs.media')
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

@include("partials.scripts.confirm-delete")
@include("partials.scripts.img-preview")
@include("partials.scripts.date-picker")
@if ($event->type->name == 'Virtual Demo')
    @push('js')
        <script src="{{ asset("js/events.js") }}"></script>
    @endpush    
@endif
@push('js')
<script>
    new window.Vue({
        name: 'event-edit',
        el: "#event-edit-app",
        data: {
            event: {!! $event !!},
            entity: "event",
            content: [],
            media: [],
            loading: false,
            location: {}
        },
        methods: {       
            getLocation(location){
                let {latlng} = location
                this.updateLatLng(latlng);
            },
            updateLatLng(latlng){
                let { lat, lng} = latlng;
                let latlon = this.getContent("tradeshow_latlon");
                let updateRoute = route('update-event-content', {id: latlon.id});
                let updateObj = {
                    event_id: "{{$event->id}}",
                    text: lat+','+lng,
                    country_code: $('#set_country_code').val(),
                    lang_code: $('#set_lang_code').val()
                }
                axios.put(updateRoute,
                    updateObj
                ).then(result => {
                    // console.log(result)
                }).catch(err => console.log(err));
            },                 
            getContent(name) {
                let content = this.content.find((element) => {
                    return element.name == name;
                });

                return content ? content : {text: '', name: name};
            },
            getMedia(name) {
                let media = this.media.find((element) => {
                    return element.name == name;
                });
                
                return media ? media : {path: '', name: name, type: {name: 'image'}};
            },
            updateMedia(data) {
                let index = this.media.findIndex(element => {
                    return element.name == data.name;
                });

                this.media[index] = data;

                this.$forceUpdate();
            },
            createMedia(data) {
                let createRoute = route('create-event-media');

                // Append the event id to the payload
                data.event_id = "{{$event->id}}";

                axios.post(createRoute, data).then(response => {
                    this.media.push(response.data);
                });
            },
            deleteMedia(media) {
                let deleteRoute = route('delete-event-media', {'id': media.id});
                
                axios.delete(deleteRoute).then(response => {
                    // update media
                    this.getAllMedia();
                });
            },
            getAllContent() {
                this.loading = true;
                window.axios.get(route('event.get-content', {event: '{{$event->id}}'}))
                .then(response => {
                    this.content = response.data;
                }).catch(err => console.log(err))
                .finally(() => this.loading = false);
            },
            getAllMedia() {
                this.loading = true;
                window.axios.get(route('event.get-media', {event: '{{$event->id}}'}))
                .then(response => {
                    this.media = response.data;
                }).catch(err => console.log(err))
                .finally(() => this.loading = false);
            },
        },
        mounted() {
            this.getAllContent();
            this.getAllMedia();
        }
    })
</script>
@endpush