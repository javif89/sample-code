@extends('website.layouts.main')
@section('title') Events | Ricoma Embroidery Machines @endsection
@section('meta-description') View the official Ricoma events calendar to find upcoming opportunities to connect with us, learn more about the
embroidery industry and network with other industry professionals. @endsection
{{-- @section('seo-keywords') {{ $product }} @endsection --}}
@section('image') {{ asset('/images/Events/events-hero.jpg') }} @endsection
@section('og-title') Events | Ricoma Embroidery Machines @endsection
@section('og-image') {{ asset('/images/Events/events-hero.jpg') }} @endsection
@section('og-description') View the official Ricoma events calendar to find upcoming opportunities to connect with us, learn more about the
embroidery industry and network with other industry professionals. @endsection
@section('content')
<div class="container-fluid" id="events-container">
    <div class="hero_wrapper">
        <div class="container-fluid">    
            <div class="hero_header">
                Attend a <br class="d-none d-lg-inline"> Ricoma event
            </div>
            <div class="hero_subheader">
                Connect with us, learn more about the embroidery industry and network with other industry professionals at an upcoming
                Ricoma event.
            </div>
        </div>
    </div>
    {{-- <div class="region-select-container">
        <div class="region {{empty($region) ? 'active-region' : ''}}"><a href="{{getRoute('events')}}">All
                Events <div class="active-line"></div></a></div>
        @foreach ($regions as $reg)
        <div class="divider"></div>
        <div class="region {{$region == $reg->name ? 'active-region' : ''}}">
            <a href="{{getRoute('events', ['region' => $reg->name])}}">
                {{$reg->name}}
                <div class="active-line"></div>
            </a>
        </div>
        @endforeach
    </div>

    <div class="mobile-region-selector dropdown">
        <div class="dropdown-toggle region-dropdown" role="button" data-toggle="dropdown" aria-expanded="false"
            aria-haspopup="true">
            <div class="region-select">{{empty($region) ? "All Events" : $region}}</div>
            <div class="line"></div>
            <ul class="dropdown-menu">
                <li class="region-item">
                    <a href="{{getRoute('events')}}"><span class="region-item">All Tradeshows</span></a>
                </li>
                @foreach ($regions as $reg)
                <li class="region-item">
                    <a href="{{getRoute('events', ['region' => $reg->name])}}">
                        {{$reg->name}}
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
    </div> --}}

    <div class="regions-container">
        @if ($tradeshows->count() == 0)
            <p class="lead text-center">Sorry! There are no upcoming events at this time.</p>
            <p class="lead text-center">
                Want to be the first to know about upcoming events? 
                <a href="https://info.ricoma.com/newsletter" target="_blank" style="font-weight: normal;">Click here to join our newsletter.</a>
            </p>
        @else
            @foreach ($regions as $reg)
            <div class="form-group region-container">
                <div class="shows-container">
                    @foreach ($tradeshows as $show)
                    @if ($show->region_id == $reg->id)
                    <event-card :country="{{json_encode(session('country'))}}" :show="{{json_encode($show)}}"
                        :shareroute={{json_encode(getRoute("event-page", ['slug' => $show->slug]))}}
                        :mainimage="{{json_encode($show->getMedia('tradeshow_thumbnail_image'))}}">
                    </event-card>
                    @endif
                    @endforeach
                </div>
            </div>
            @endforeach
        @endif

    </div>
</div>

@endsection
@push('scripts')
<script type="text/javascript">
    $(document).ready(function() {
        $('.region-item > a').click(function () {
            window.location = $(this).attr('href');
        });
    });
</script>
@endpush