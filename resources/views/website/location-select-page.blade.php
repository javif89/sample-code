@extends('website.layouts.main')

@push('head')
<style>
    body,
    html {
        background-color: black;
        height: 100%;
    }

    #location-select {
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .dropdown-item.active {
        background-color: #FF7200;
    }

    .dropdown-item.selected>.text {
        color: white !important;
    }

    .dropdown-item>.text {
        color: black !important;
        font-size: 20px;
        font-weight: 600;
    }

    .filter-option-inner-inner {
        font-size: 20px;
        font-weight: 600;
    }

    .form-control {
        height: 60px;
    }

    .form-control .dropdown-toggle {
        height: 100%;
    }

    .disabled-select {
        opacity: 0.3;
    }
</style>
@endpush

@section('not-in-website-container')
<div id="location-select">
    <img src="{{asset('images/location-select/mt.png')}}" class="position-fixed"
        style="bottom: 0; right: 0; height: 100%; width: auto; z-index: 0;" alt="">
    <div class="overlay position-fixed w-100 h-100 d-lg-none"
        style="top: 0; left: 0; z-index: 0; background: rgba(0,0,0,0.8);"></div>


    <div class="container h-100 d-flex flex-column justify-content-between" style="z-index: 2;">
        <div style="z-index: 10;" class="mt-4">
            <img src="{{asset('images/logo-no-slogan.svg')}}" alt="Ricoma" class="d-block ml-lg-0 m-auto"
                style="width: 150px; height: auto;">
        </div>
        
        <div class="row text-lg-left text-center" id="location-select-app">
            <div class="col-lg-5">
                <div class="text-white">
                    <p class="mb-0 welcome-text" style="font-size: 21px; font-weight: 600; font-style: italic;">Welcome.</p>
                    <p class="body-text" style="font-size: 21px;">Please choose a country and language to continue.</p>
                </div>
                <form action="{{ route('redirect-to-locale') }}" method="POST">
                    <div class="row mt-4 mb-5">
                        <div class="col-lg-6 mb-lg-0 mb-3">
                            <p class="text-muted text-left text-uppercase mb-1" style="font-size: 15px; font-weight: 600;">Country</p>
                            <select class="selectpicker form-control" name="country" v-model="country">
                                <option value="" selected disabled hidden>Select a country</option>
                                @foreach ($countries as $c)
                                <option value="{{ $c->code }}" @if($c->code == $current_country_code) selected
                                    @endif>{{ country_flag($c->code) }} {{ $c->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-6">
                            <p class="text-muted text-left text-uppercase mb-1" style="font-size: 15px; font-weight: 600;">Language</p>
                            <div v-show="country == ''">
                                <fieldset disabled="disabled">
                                    <select class="selectpicker form-control disabled-select">
                                        <option selected data-content="<i class='fal fa-globe text-muted'></i> Select a language"></option>
                                    </select>
                                </fieldset>
                            </div>
                            @foreach ($countries as $c)
                                <div v-show="country == '{{$c->code}}'">
                                    <select class="selectpicker form-control" v-model="language">
                                        @foreach ($c->languages as $l)
                                        <option value="{{ $l->code }}" @if($l->code == $current_lang) selected @endif
                                            data-content="<i class='fal fa-globe text-muted'></i> {{ $l->name }}">
                                            {{ $l->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            @endforeach
                            <input type="hidden" name="language" v-model="language">
                        </div>
                    </div>
                    @csrf
                    <fieldset disabled="disabled" v-if="!submitEnabled">
                        <button type="submit" class="btn btn-block orange_gradient_btn square_btn" style="font-size: 18px;">Enter Site</button>
                    </fieldset>
                    <button v-if="submitEnabled" type="submit" class="btn btn-block orange_gradient_btn square_btn" style="font-size: 18px;">Enter Site</button>
                </form>
            </div>
        </div>
        <div>&nbsp;</div>
    </div>
</div>
@endsection

@push('scripts')
    <script>
        new window.Vue({
            el: "#location-select-app",
            data: {
                country: '',
                language: ''
            },
            watch: {
                country(val) {
                    this.language = '';
                }
            },
            computed: {
                submitEnabled() {
                    if(this.language == '') {
                        return false;
                    }

                    return true;
                }
            }
        });
    </script>
@endpush