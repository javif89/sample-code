@extends('layouts.app')

@section('content')
    @include('partials.header-default')
    <div class="container-fluid mt--7">
        @yield('page-content')
        {{-- @include('layouts.footers.auth') --}}
    </div>
@endsection
