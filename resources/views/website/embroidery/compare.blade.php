@extends('website.layouts.main')

@section('content')
<div class="container-fluid">
    <product-compare :products="{{json_encode($products)}}" :country="{{json_encode($country)}}"
        :category="{{json_encode($productCategory)}}">
    </product-compare>
</div>
@endsection