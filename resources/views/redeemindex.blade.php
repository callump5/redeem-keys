<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Redeem Keys</title>

    <!-- Styles -->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    @livewireStyles
    
    <!-- Header Scripts -->

</head>
<body>
<livewire:game-gallery class="\App\Models\Game"></livewire:game-gallery>

<!-- Footer Scripts -->
@livewireScripts
<script id="__bs_script__">
//<![CDATA[
    document.write("<script async src='http://HOST:3000/browser-sync/browser-sync-client.js?v=2.27.7'><\/script>".replace("HOST", location.hostname));
//]]>
</script>
</body>
</html>
