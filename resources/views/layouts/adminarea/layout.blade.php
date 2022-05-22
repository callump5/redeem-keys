<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;500&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />


    <!-- Scripts -->
    @livewireScripts
    <script src="/js/lib/jquery/jquery.min.js"></script>
    <script src="/js/lib/jquery/jquery-ui.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    @stack('header-scripts')

    <!-- Core theme CSS (includes Bootstrap)-->
    @livewireStyles
    <link href="{{ asset('css/lib/jquery/jquery-ui.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/lib/jquery/jquery-ui.min.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="{{ asset('css/lib/ckeditor/ckeditor.css') }}" rel="stylesheet">

    <link href="{{ asset('css/lib/bootstrap/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/adminarea/main.css') }}" rel="stylesheet">


    <style>
        .select2-dropdown.select2-dropdown--above,
        .select2-dropdown,
        .select2-results__options {
            background-color: #151521 !important;
            border: none !important;
            color: #d0d0d0 !important;
        }

        .select2-container--default .select2-search--inline .select2-search__field {
            color: #d0d0d0 !important;
        }

        .select2-container--default .select2-results__option--selected{
            display: none;
        }
    </style>
</head>
<body class="min-h-screen">

<div class="d-flex h-100 d-inline-block">

    <x-adminarea.navigation></x-adminarea.navigation>

    <div class="col-10 bg-main">
        <div class="bg-dark p-3 shadow d-flex justify-content-between align-items-center sticky-top">
            @isset($pageTitle)
                <h1 class="text-white fs-4 mb-0">{{$pageTitle}}</h1>
            @endisset

            <div class="d-flex">
                @stack("actions")
            </div>
        </div>

        <main class="container p-5 text-white">
            @yield('content')
        </main>
    </div>
</div>

<div id="app">

</div>

<script src="/js/adminarea/main.js"></script>
@stack('footer-scripts')

</body>
</html>
