<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    {{-- My Style --}}
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    {{-- Notification --}}  <!--ليشش css بتضرب-->
    {{-- @notifyCss 
        <x:notify-messages />
    @notifyJs --}}
</head>
<body>
    <div id="app">
        
        <main class="pb-4" style="background-color: white;">
            @yield('content')
        </main>
    </div>
</body>

</html>
