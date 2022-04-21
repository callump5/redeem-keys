<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;500&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />

    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('css/lib/jquery-ui.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/lib/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/adminarea/main.css') }}" rel="stylesheet">
</head>
<body class="min-h-screen">

<div class="d-flex h-100 d-inline-block">

    <x-adminarea.navigation></x-adminarea.navigation>

    <div class="col-10 h-100 bg-main">
        <div class="bg-black py-3 px-3">
            <p class="no-marg text-white">This will be a quick search bar</p>
        </div>
        <main class="container py-4">
            @yield('content')
        </main>
    </div>
</div>

<div id="app">

</div>

<script src="/js/lib/jquery.min.js"></script>
<script src="/js/lib/bootstrap.js"></script>
<script src="/js/lib/jquery-ui.min.js"></script>
<script src="/js/lib/scripts.js"></script>
<script src="/js/adminarea/main.js"></script>

</body>
</html>
