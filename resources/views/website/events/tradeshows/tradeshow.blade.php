@extends('website.layouts.main')
@section('title') {{ $tradeshow->name }} | Ricoma @endsection
@section('meta-description') {!! $tradeshow->getContent('tradeshow_main_description')->text !!} @endsection
{{-- @section('seo-keywords') {{ $product }} @endsection --}}
@section('image') {{ $tradeshow->getMedia('tradeshow_hero_image')->path }} @endsection
@section('og-title') {{ $tradeshow->name }} | Ricoma @endsection
@section('og-image') {{ $tradeshow->getMedia('tradeshow_hero_image')->path }} @endsection
@section('og-description') {!! $tradeshow->getContent('tradeshow_main_description')->text !!} @endsection
@section('content')
<div class="container-fluid" id="tradeshow-container">
    <div class="hero_wrapper" style="background-image: url({{$tradeshow->getMedia('tradeshow_hero_image')->path ?? ''}})">
        <div class="redirect-fixed">
            @if ($tradeshow->type->name == 'Trade Show')
                <div class="tradeshows-link">
                    <a href="{{getRoute('tradeshows')}}">ALL TRADESHOWS</a>
                </div>
            @endif

            @if ($tradeshow->type->name == 'General')
            <div class="tradeshows-link">
                <a href="{{getRoute('events')}}">ALL EVENTS</a>
            </div>
            @endif
            <i class="fas fa-play"></i>
            <div class="small-name">{{$tradeshow->name}}</div>
        </div>
        <div class="hero_header">
            {{$tradeshow->name}}
        </div>
        <div class="hero_subheader">
            {{ \Carbon\Carbon::parse($tradeshow->start_datetime)->isoFormat('ddd, MMM D')}} -
            {{ \Carbon\Carbon::parse($tradeshow->end_datetime)->isoFormat('ddd, MMM D')}}
        </div>
    </div>
    <div class="social-links">
        <div class="share-text">SHARE</div>
        <a target="_blank" class="share-link" href="mailto:?subject={{$tradeshow->name}}&body={{url()->current()}}">
            <i style="font-size: 22px" class="fas fa-envelope"></i>
        </a>
        <div class="fb-share-button" data-href="{{url()->current()}}" data-layout="button"
            data-size="small">
            <a target="_blank"
                href="https://www.facebook.com/sharer/sharer.php?u={{url()->current()}}&amp;src=sdkpreparse"
                class="fb-xfbml-parse-ignore share-link"><i style="font-size: 22px" class="fab fa-facebook-f"></i>
            </a>
        </div>
        <a target="_blank" class="twitter-share share-link"><i style="font-size: 22px" class="fab fa-twitter"></i></a>
        <a target="_blank" href="http://pinterest.com/pin/create/button/?url={{url()->current()}}&media={{$tradeshow->getMedia('tradeshow_hero_image')->path ?? ''}}&description={!!$tradeshow->getContent('tradeshow_main_description')->path ?? ''!!}"
            class="pin-it-button share-link" count-layout="horizontal">
            <i style="font-size: 22px" class="fab fa-pinterest-p"></i>
        </a>
    </div>

    <div id="desktop-location-container" class="tradeshow-info-container">
        <div class="tradeshow-location-container">
            <div class="tradeshow-location-info">
                <div class="location">
                    <i class="fas fa-map-marker-alt"></i>
                    <div class="location-name">{{$tradeshow->getContent('tradeshow_location')->text ?? ''}}</div>
                </div>
                <div class="tradeshow-address">{{$tradeshow->getContent('tradeshow_address')->text ?? ''}}</div>
                <div class="tradeshow-booth">Booth number {{$tradeshow->getContent('tradeshow_booth')->text ?? ''}}
                </div>
            </div>
            <div class="tradeshow-description">
                {!!$tradeshow->getContent('tradeshow_main_description')->text ?? ''!!}
            </div>
            @if (!blank($tradeshow->getContent('tradeshow_promo')))
                <div class="tradeshow-promo">
                    @if (!blank($tradeshow->getContent('tradeshow_promo')->text))
                    {{$tradeshow->getContent('tradeshow_promo')->text ?? ''}}
                    @endif
                </div>
            @endif
            <div class="action-btns">
                <a class="register-btn" href="{{$tradeshow->getContent('tradeshow_url')->text ?? ''}}">
                    Register Here <i class="fas fa-external-link-alt"></i>
                </a>
                @if ($tradeshow->type->name == "Trade Show")
                <a class="redirect-btn" href="{{getRoute('tradeshows')}}">BACK TO TRADE SHOWS</a>
                @endif
                @if ($tradeshow->type->name == "General")
                <a class="redirect-btn" href="{{getRoute('events')}}">BACK TO EVENTS</a>
                @endif
            </div>
        </div>
        <div id="map-container1" class="tradeshow-map-container">
        </div>
    </div>
    <div id="mobile-location-container" class="tradeshow-info-container">
        <div class="tradeshow-location-container">
            <div class="tradeshow-location-info">
                <div class="mobile-location">
                    <div class="location">
                        <i class="fas fa-map-marker-alt"></i>
                        <div class="location-name">{{$tradeshow->getContent('tradeshow_location')->text ?? ''}}</div>
                    </div>
                    <div class="tradeshow-address">{{$tradeshow->getContent('tradeshow_address')->text ?? ''}}</div>
                    <div class="tradeshow-booth">Booth number {{$tradeshow->getContent('tradeshow_booth')->text ?? ''}}
                    </div>
                </div>
                <div id="map-container2" class="tradeshow-map-container">
                </div>
            </div>


            <div class="tradeshow-description">
                {!!$tradeshow->getContent('tradeshow_main_description')->text ?? ''!!}
            </div>
            @if (!blank($tradeshow->getContent('tradeshow_promo')))
            <div class="tradeshow-promo">
                @if (!blank($tradeshow->getContent('tradeshow_promo')->text))
                {{$tradeshow->getContent('tradeshow_promo')->text ?? ''}}
                @endif
            </div>
            @endif
            <div class="action-btns">
                <a class="register-btn text-uppercase" href="{{$tradeshow->getContent('tradeshow_url')->text ?? ''}}">
                    Register Here <i class="fas fa-external-link-alt"></i>
                </a>
                @if ($tradeshow->type->name == "Trade Show")
                    <a class="redirect-btn" href="{{getRoute('tradeshows')}}">BACK TO TRADE SHOWS</a>
                @endif
                @if ($tradeshow->type->name == "General")
                <a class="redirect-btn" href="{{getRoute('events')}}">BACK TO EVENTS</a>
                @endif
            </div>
        </div>
        
    </div>
    <div id="fb-root"></div>
</div>
@endsection
@push('scripts')
<script type="text/javascript"
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcpFG28KB9MpiSp5JTOKhdUjnfh3E0GmU"></script>
<script type="text/javascript">
    // When the window has finished loading create our google map below
    google.maps.event.addDomListener(window, 'load', init);

    function init() {
        var latLong = {!!json_encode($tradeshow->getContent('tradeshow_latlon')->text)!!};
        var lat = parseFloat(latLong.split(',')[0]) || 40.6700;
        var lon = parseFloat(latLong.split(',')[1]) || -73.9400;
        // Basic options for a simple Google Map
        // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
        var mapOptions = {
            // How zoomed in you want the map to start at (always required)
            zoom: 11,

            // The latitude and longitude to center the map (always required)
            center: new google.maps.LatLng(lat, lon), // New York

            // How you would like to style the map. 
            // This is where you would paste any style found on Snazzy Maps.
            styles: [
            {
            "featureType": "administrative.land_parcel",
            "elementType": "all",
            "stylers": [
            {
            "visibility": "off"
            }
            ]
            },
            {
            "featureType": "landscape.man_made",
            "elementType": "all",
            "stylers": [
            {
            "visibility": "off"
            }
            ]
            },
            {
            "featureType": "poi",
            "elementType": "labels",
            "stylers": [
            {
            "visibility": "off"
            }
            ]
            },
            {
            "featureType": "road",
            "elementType": "labels",
            "stylers": [
            {
            "visibility": "simplified"
            },
            {
            "lightness": 20
            }
            ]
            },
            {
            "featureType": "road.highway",
            "elementType": "geometry",
            "stylers": [
            {
            "hue": "#f49935"
            }
            ]
            },
            {
            "featureType": "road.highway",
            "elementType": "labels",
            "stylers": [
            {
            "visibility": "simplified"
            }
            ]
            },
            {
            "featureType": "road.arterial",
            "elementType": "geometry",
            "stylers": [
            {
            "hue": "#fad959"
            }
            ]
            },
            {
            "featureType": "road.arterial",
            "elementType": "labels",
            "stylers": [
            {
            "visibility": "off"
            }
            ]
            },
            {
            "featureType": "road.local",
            "elementType": "geometry",
            "stylers": [
            {
            "visibility": "simplified"
            }
            ]
            },
            {
            "featureType": "road.local",
            "elementType": "labels",
            "stylers": [
            {
            "visibility": "simplified"
            }
            ]
            },
            {
            "featureType": "transit",
            "elementType": "all",
            "stylers": [
            {
            "visibility": "off"
            }
            ]
            },
            {
            "featureType": "water",
            "elementType": "all",
            "stylers": [
            {
            "hue": "#a1cdfc"
            },
            {
            "saturation": 30
            },
            {
            "lightness": 49
            }
            ]
            }
            ],
            zoomControl: false,
            mapTypeControl: false,
            streetViewControl: false,
            fullscreenControl: false
        };

        // Get the HTML DOM element that will contain your map 
        // We are using a div with id="map" seen below in the <body>
        var mapDiv = document.createElement("div");
        mapDiv.setAttribute("id", "map");
        var mapContainer = document.getElementById("map-container1");
        if(mapContainer.offsetParent === null){
            document.getElementById("map-container2").appendChild(mapDiv);
        } else {
            document.getElementById("map-container1").appendChild(mapDiv);
        }

        // Create the Google Map using our element and options defined above
        var map = new google.maps.Map(mapDiv, mapOptions);

        // Let's also add a marker while we're at it
        var marker = new google.maps.Marker({
            position: new google.maps.LatLng(lat,lon),
            map: map,
            title: 'Snazzy!',
            icon: {
            url: "{{asset('icons/Orange pin.svg')}}"
            }
        });

        // Move map to container element based on screensize 
        function moveMap() {
            let mapEl = document.getElementById("map-container1");
            let mapElement = document.getElementById('map');

            if(mapEl.offsetParent === null){
                let map2 = document.getElementById("map-container2");
                    document.getElementById("map-container2").appendChild(mapElement);
                if (mapEl.hasChildNodes()) {
                    mapEl.removeChild(mapEl.childNodes[0]);
                }
            } else {
                let map2 = document.getElementById("map-container2");
                mapEl.appendChild(mapElement);
                if (map2.hasChildNodes()) {
                    map2.removeChild(map2.childNodes[0]);
                }
            }
        }
        window.onresize = moveMap;

        // Twitter button
        var getWindowOptions = function() {
            var width = 500;
            var height = 350;
            var left = (window.innerWidth / 2) - (width / 2);
            var top = (window.innerHeight / 2) - (height / 2);
            
            return [
                'resizable,scrollbars,status',
                'height=' + height,
                'width=' + width,
                'left=' + left,
                'top=' + top,
                ].join();
        };
        var twitterBtn = document.querySelector('.twitter-share');
        var text = encodeURIComponent('Check out');
        var shareUrl = 'https://twitter.com/intent/tweet?url=' + location.href + '&text=' + text;
        twitterBtn.href = shareUrl; // 1
        
        // twitterBtn.addEventListener('click', function(e) {
        // e.preventDefault();
        // var win = window.open(shareUrl, 'ShareOnTwitter', getWindowOptions());
        // win.opener = null; // 2
        // });
    }
</script>
@endpush