@extends('layouts.page')

@section('page-content')
<div class="row mt-5">
    <div class="col-xs-12">
        @include('career.partials.career-edit-form')
    </div>

    @if (count($career->applicants) !== 0)
        <div class="col-xs-12">
            @include('career.partials.applicants')
        </div>
    @endif
</div>
@endsection

@include("partials.scripts.confirm-delete")