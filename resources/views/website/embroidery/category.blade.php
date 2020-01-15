@extends('website.layouts.main')
@section('title') {{ $category->name }} | Ricoma @endsection
@section('meta-description') {{ $category->name }} @endsection
{{-- @section('seo-keywords') {{ $product }} @endsection --}}
{{-- @section('image') {{ asset('/images/chroma/hero-img.png') }} @endsection --}}
@section('og-title') {{ $category->name }} | Ricoma @endsection
{{-- @section('og-image') {{ asset('/images/chroma/hero-img.png') }} @endsection --}}
@section('og-description') {{ $category->name }} @endsection
@section('content')
@include('website.embroidery.partials.category-menu')
<div class="container-fluid category-container">
    <product-categories :categoryurl="{{json_encode(categoryLink($category->name))}}"
    :category="{{json_encode($category)}}" :country="{{json_encode($country)}}" :products="{{json_encode($products)}}"></product-categories>
</div>
@endsection