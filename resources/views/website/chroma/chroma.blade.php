@extends('website.layouts.main')
@section('title') Chroma | Ricoma’s Digitizing Software @endsection
@section('meta-description') For beginners and experts, create even the most intricate designs with ease and speed with Chroma, Ricoma's proprietary
digitizing software. Click here to learn more. @endsection
{{-- @section('seo-keywords') {{ $product }} @endsection --}}
@section('image') {{ asset('/images/chroma/hero-img.png') }} @endsection
@section('og-title') Chroma | Ricoma’s Digitizing Software @endsection
@section('og-image') {{ asset('/images/chroma/hero-img.png') }} @endsection
@section('og-description') For beginners and experts, create even the most intricate designs with ease and speed with Chroma, Ricoma's proprietary
digitizing software. Click here to learn more. @endsection
@section('content')
    <div id="chroma">
        @include('website.chroma.partials.hero')
        @include('website.chroma.partials.video')
        @include('website.chroma.partials.features')
        @include('website.chroma.partials.perfect-for')
        @include('website.chroma.partials.tabs')
        @include('website.chroma.partials.social-proof')
        @include('website.chroma.partials.try-it')
        @include('website.chroma.partials.faq')
        @include('website.chroma.partials.form-modal')
    </div>
@endsection