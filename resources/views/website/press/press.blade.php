@extends('website.layouts.main')
@section('title') Press | Features | Ricoma Embroidery Machines @endsection
@section('meta-description') Our press page is our main source for news about Ricoma. Read our latest press releases and news and download our press
kit for more information.
@endsection
{{-- @section('seo-keywords') {{ $product }} @endsection --}}
@section('image') {{ asset('/images/press/hero-desktop.png') }} @endsection
@section('og-title') Press | Features | Ricoma Embroidery Machines @endsection
@section('og-image') {{ asset('/images/press/hero-desktop.png') }} @endsection
@section('og-description') Our press page is our main source for news about Ricoma. Read our latest press releases and news and download our press
kit for more information.
@endsection
@section('content')
    <div id="press">
        <div class="hero">
            <h1>Press</h1>
            <p class="">Contact us directly at press@ricoma.com</p>
            <a class="btn orange_gradient_btn btn_round" href="https://www.dropbox.com/sh/98t3xog411r1ttc/AAB7mzRQFKCpHkR3rFcCChfna?dl=0" target="_blank">Download the Press Kit</a>
        </div>

        <div class="container py-5">
            <h2 class="text-center">Featured Articles</h2>

            <div class="row">
                @foreach (App\Article::all() as $a)
                    <div class="col-lg-4 col-md-6 col-12 mb-5">
                        <div class="card h-100 press-card">
                            <div class="logo">
                                <img src="{{$a->banner_image_path}}" alt="" class="">
                            </div>
                            <div class="card-body d-flex flex-column justify-content-between">
                                <div>
                                    <div class="date">
                                        {{Carbon\Carbon::parse($a->publish_date)->format("F d, Y")}}
                                    </div>
                                    <div class="title">
                                        {{$a->title}}
                                    </div>
                                </div>
                                <div class="body">
                                    {{$a->summary}}...
                                </div>
                                <a href="{{$a->external_link}}" target="_blank" class="btn link">VIEW FULL ARTICLE</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection