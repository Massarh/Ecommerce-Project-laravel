<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <link href="{{ URL::asset('logo/logo.png') }}" rel="icon">
    <link rel="shortcut icon" href="{{ URL::asset('logo/logo.png') }}"> --}}
    <title> @yield('title') - Go-plaza</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    {{-- My Style --}}
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss'])
    <!-- App favicon -->
    {{-- <link rel="shortcut icon" href="{{ URL::asset('logo/logo.png') }}"> --}}
    

    {{-- messege toastr--}}
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>

    
    @include('layouts.head-css')

    <livewire:styles />
</head>

<body style="background-color: white; overflow-x:hidden">
    <div id="app" >

        <main class="main-n ">
            @yield('content')
        </main>
    </div>
    @include('layouts.vendor-scripts')

    <livewire:scripts />
</body>


</html>