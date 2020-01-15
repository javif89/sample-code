@extends('website.layouts.main')
@section('title') {{ $product->name }} | Ricoma @endsection
@section('meta-description') {{ $product->getContent('short_description') }} @endsection
{{-- @section('seo-keywords') {{ $product }} @endsection --}}
@section('image') {{ $product->getMedia('thumbnail')->path }} @endsection
@section('og-title') {{ $product->name }} | Ricoma @endsection
@section('og-image') {{ $product->getMedia('thumbnail')->path }} @endsection
@section('og-description') {{ $product->getContent('short_description') }} @endsection
@section('content')
    <div class="container-fluid product_wrapper tc_wrapper {{$product->slug}}-wrapper">
        @include('website.product.machine.hero')
        @include('website.product.machine.videos')
        @include('website.product.machine.projects')
        @include('website.product.machine.ig-carousel')
        @include('website.product.machine.panel-and-specs')
        @include('website.product.machine.view-live-demo')
        @include('website.product.machine.financing-training-warranty')
        @include('website.product.machine.social-proof') 
        @include('website.product.machine.accessories') 
        @include('website.product.machine.faq')
        @component('website.product.machine.components.circle-bg')
            @include('website.product.machine.related')
        @endcomponent
    </div>
@endsection