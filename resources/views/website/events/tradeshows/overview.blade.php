@extends('website.layouts.main')
@section('title') Trade Shows | Ricoma Embroidery Machines @endsection
@section('meta-description') Watch our embroidery machines in real-time by visiting us at a trade show near you. Click here for our full trade show
calendar. @endsection
{{-- @section('seo-keywords') {{ $product }} @endsection --}}
@section('image') {{ asset('/images/Events/tradeshow-hero.jpg') }} @endsection
@section('og-title') Trade Shows | Ricoma Embroidery Machines @endsection
@section('og-image') {{ asset('/images/Events/tradeshow-hero.jpg') }} @endsection
@section('og-description') Watch our embroidery machines in real-time by visiting us at a trade show near you. Click here for our full trade show
calendar. @endsection
@section('content')
    <div class="container-fluid" id="tradeshows-container">
        <div class="hero_wrapper">
            <div class="container">
                <div class="hero_header">
                    Visit us at a <br class="d-none d-lg-inline"> trade show!
                </div>
                <div class="hero_subheader">
                    Get your questions answered, watch our machines in action, and get to know us in-person at one of our upcoming trade
                    shows.
                </div>
            </div>
        </div>
        <div class="bg-white" style="border-bottom: 1px solid #D7D7D7;">
            <div class="container">
                <div class="region-select-container">
                    <div class="region {{empty($region) ? 'active-region' : ''}}"><a href="{{getRoute('tradeshows', ['region' => 'all'])}}">All
                            Tradeshows
                            <div class="active-line"></div></a></div>
                    @foreach ($regions as $reg)
                    <div class="divider"></div>
                    <div class="region {{$region == $reg->name ? 'active-region' : ''}}">
                        <a href="{{getRoute('tradeshows', ['region' => $reg->name])}}">
                            {{$reg->name}}
                            <div class="active-line"></div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        
        <div class="mobile-region-selector dropdown">
            <div class="dropdown-toggle region-dropdown" role="button" data-toggle="dropdown" aria-expanded="false" aria-haspopup="true">
                <div class="region-select">{{empty($region) ? "All Tradeshows" : $region}}</div>
                <div class="line"></div>
                <ul class="dropdown-menu" >
                    <li class="region-item">
                        <a href="{{getRoute('tradeshows', ['region' => 'all'])}}"><span class="region-item">All Tradeshows</span></a>
                    </li>
                    @foreach ($regions as $reg)
                        <li class="region-item">
                            <a href="{{getRoute('tradeshows', ['region' => $reg->name])}}">
                                {{$reg->name}}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
            
        <div class="regions-container">
            @foreach ($regions as $reg)
        <div class="form-group region-container {{in_array($reg->id, array_column($tradeshows->toArray(), 'region_id')) ? 'exists' : 'd-none'}}">
                    <div class="container">
                        @if (in_array($reg->id, array_column($tradeshows->toArray(), 'region_id')))
                        <div class="region-header mb-4">{{$reg->name}}</div>
                        @endif
                    </div>
                    <div class="shows-container container">
                        <div class="row">
                            @foreach ($tradeshows as $show)
                            <div class="col-lg-4 col-md-6 mb-3">
                                @if ($show->region_id == $reg->id)
                                <trade-show-card :country="{{json_encode(session('country'))}}" :show="{{json_encode($show)}}"
                                    :shareroute={{json_encode(getRoute("tradeshow-page", ['slug' => $show->slug]))}}
                                    :mainimage="{{json_encode($show->getMedia('tradeshow_thumbnail_image'))}}">
                                </trade-show-card>
                                @endif
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach

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