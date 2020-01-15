<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Argon Dashboard') }}</title>
        <!-- Favicon -->
        <link href="{{ asset('argon') }}/img/brand/favicon.png" rel="icon" type="image/png">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
        <!-- Icons -->
        <link href="{{ asset('argon') }}/vendor/nucleo/css/nucleo.css" rel="stylesheet">
        <link href="{{ asset('argon') }}/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
        <!-- Argon CSS -->
        <link type="text/css" href="{{ asset('argon') }}/css/argon.css?v=1.0.0" rel="stylesheet">
        {{-- Datatables --}}
        <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css"/>
        {{-- Custom CSS --}}
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

        {{-- Typeahead --}}
        <link rel="stylesheet" href="{{ asset('argon') }}/vendor/jquery-typeahead/jquery.typeahead.min.css">

        @routes
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body class="{{ $class ?? '' }}">
        @auth()
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            @include('layouts.navbars.sidebar')
        @endauth
        
        <div class="main-content">
            @include('layouts.navbars.navbar')
            @yield('content')
        </div>

{{--        @guest()--}}
{{--            @include('layouts.footers.guest')--}}
{{--        @endguest--}}

        <script src="{{ asset('argon') }}/vendor/jquery/dist/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>

        {{-- Datatables --}}
        <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

        {{-- SweetAlert --}}
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

        {{-- Chart JS --}}
        <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
        <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>

        <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
        {{-- <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script> --}}

        {{-- Typeahead --}}
        <script src="{{ asset('argon') }}/vendor/jquery-typeahead/jquery.typeahead.min.js"></script>


        {{-- App JS--}}
        <script src="{{ asset("js/admin.js") }}"></script>



        <script>
            $(document).ready( function () {
                $('.datatable').DataTable({
                    "oLanguage": {
                        "oPaginate": {
                            "sFirst": "First page", // This is the link to the first page
                            "sPrevious": "<", // This is the link to the previous page
                            "sNext": ">", // This is the link to the next page
                            "sLast": "Last page" // This is the link to the last page
                        }
                    }
                });


            } );
            var countries = {!! $countryContext->getAvailableCountries()->toJson() !!}
        </script>

        @stack('js')
        
        <!-- Argon JS -->
        <script src="{{ asset('argon') }}/js/argon.js?v=1.0.0"></script>

        <div class="toast-container" style="position: fixed; top: 0; left: 0; z-index: 100000; width: 100%;">
            @if(session()->has('success'))
                <div class="toast success" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-header">
                        <strong class="mr-auto text-center" style="flex: 1;">Success</strong>
                        <button type="button" class="mr-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="toast-body">
                        {{ session()->get('success') }}
                    </div>
                </div>
            @endif
            @if(session()->has('error'))
                <div class="toast error" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-header">
                        <strong class="mr-auto text-center" style="flex: 1;">Error</strong>
                        <button type="button" class="mr-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="toast-body">
                        {{ session()->get('error') }}
                    </div>
                </div>
            @endif
        </div>


        {{-- Scripts --}}
        {{-- Initialize Toasts --}}
        <script>
            $(document).ready(function () {
                $('.toast').toast({
                    delay: 2000,
                });
                $('.toast').toast('show');
            })
        </script>
        @if(!empty($user_announcements) && $user_announcements->count())
            @include('announcement.popup', ['announcements' => $user_announcements])
        @endif
    </body>
</html>
