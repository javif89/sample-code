<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="google-site-verification" content="Q6D-pRl_QxJQa_a_kqVPGIX3Jk-2m06MrJr46dJSUXA" />
    {{--    todo: Need to make title and description page-specific--}}
    <meta charset="UTF-8">
    <meta name=viewport content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{--    todo: Need favicon--}}
    <link rel="shortcut icon" href="{{asset('/favicon.png')}}" type="image/x-icon">
    <link rel="icon" href="{{asset('/favicon.png')}}" type="image/x-icon">

    <!-- Bootstrap 4.* CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.11.2/css/all.css"
        integrity="sha384-zrnmn8R8KkWl12rAZFt4yKjxplaDaT7/EUkKm7AovijfrQItFWR7O/JJn4DAa/gx" crossorigin="anonymous">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">


    <link rel="stylesheet" href="{{ mix('/css/custom.css') }}">

    @include('website._marketing_scripts')
    
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-40715784-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', 'UA-40715784-1');
    </script>
    
    @stack('head')
    @include('website._seo-tags')
</head>

<body>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v5.0">
    </script>
    <div id="website">
        @if (!Route::is('locale-select'))
            <div class="sticky-top d-flex flex-column bg-white" id="sticky-bar">
                @include('website.partials.promo-banner')
                @include('website.navigation.main-menu')
            </div>
        @endif
        @yield('content')
        @if (!Route::is('locale-select'))
            @include('website.navigation.footer-default')
            <cookie-notice :country="'{{$localedata['active_country']->code}}'"></cookie-notice>
        @endif
        @include('website.partials.country-select')
        @include('website.partials/ricoma-club')

    </div>

    @yield('not-in-website-container')

    @routes

    <script src="{{mix('/js/website.js')}}"></script>

    @stack('scripts')
</body>

</html>
