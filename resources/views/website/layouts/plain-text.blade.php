@extends('website.layouts.main')

@section('content')
    <div id="plain-text" class="py-5">
        <div class="container top">
            <h1 class="title mb-3">@yield('page-title')</h1>
            <p class="date-updated mb-lg-5">@yield('date-updated')</p>
            <hr class="">
        </div>
        <div class="container body mt-lg-5">
            @yield('body')
        </div>
    </div>
@endsection