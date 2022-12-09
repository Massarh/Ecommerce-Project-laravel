
{{--navbar navbar-expand-md navbar-light bg-white shadow-sm --}}
<nav class="navbar navbar-expand-md navbar-light bg-white" style="position: sticky; top:0px; z-index: 10;">
    <div class="container">
        <div style="">
            <a class="navbar-brand" href="{{ url('/') }}">
                <b style="font-family: fangsong; font-size:25px;">PLAZA</b>
            </a>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->

                <!-- Order -->
                @if(Auth::check())
                <li class="nav-link">
                    <a class="dropdown-item" href="{{route('order')}}">Order</a>
                </li>
                @endif
                <!-- Order -->

                <!-- Shopping Cart -->
                <a href="{{ route('cart.show') }}" class="nav-link">
                    <!-- <i class="fas fa-shopping-bag fa-lg"></i> -->
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="bi bi-bag" viewBox="0 0 16 16">
                            <path
                                d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z" />
                        </svg>
                        <sup>
                            ({{session()->has('cart')?session()->get('cart')->totalQuantity:'0'}})
                        </sup>
                    </span>
                </a>
                <!-- Shopping Cart -->

                @guest
                @if (Route::has('login'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @endif

                @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
                @endif
                @else

                <!-- Profile -->
                <li class="nav-link">
                    <a class="dropdown-item" href="#">
                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                        Profile
                    </a>
                </li>

                <!-- Logout -->
                <li class="nav-link">
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2"></i>
                        {{ __('Logout') }}
                    </a>
                </li>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>

                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                        <!-- to access for admin panel -->
                        @if(auth()->user()->user_role=='superadmin' || auth()->user()->user_role=='admin' ||
                        auth()->user()->user_role=='employee')

                        <a class="dropdown-item" href="{{route('dashboard')}}">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Go to admin panel
                        </a>
                        @endif

                        
                    </div>
                </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
