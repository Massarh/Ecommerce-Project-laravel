@extends('layouts.app')

@section('content')

<script>
    $(function () {
        $(document).scroll(function () {
        
            document.getElementById("main-nav").style.background = "white";
            document.getElementById("main-nav").style.position = "sticky";
            document.getElementById("main-nav").style.transition= "all 0.5s";
            
            if ($(this).scrollTop()  == 0 ) {
                console.log('massarh');
                document.getElementById("main-nav").style.background = "transparent";
                document.getElementById("main-nav").style.position = "absolute";
            }
        });
    });
</script>
<style>
    .navbar-fixed-top.scrolled {
    background-color: #000 !important;
    transition: background-color 200ms linear;
}
</style>
{{-- Nav --}}
{{-- navbar navbar-expand-md navbar-light bg-white --}}
<nav class="navbar navbar-expand-md" style="position: absolute; top:0; z-index: 10; background-color: transparent;width:100vw
        " id="main-nav">
    <div class="container">
        <div>
            <a class="navbar-brand" href="{{ url('/') }}">
                <b style="font-family: fangsong; font-size:25px;">PLAZA</b>
            </a>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent" style="margin-left:auto">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->

                {{-- Order --}}
                @if(Auth::check())
                <li class="nav-link">
                    <a class="dropdown-item" href="{{route('order')}}">Order</a>
                </li>
                @endif
                {{-- Order --}}

                {{-- Shopping Cart --}}
                <a href="{{ route('cart.show') }}" class="nav-link">
                    {{-- <i class="fas fa-shopping-bag fa-lg"></i> --}}
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
                {{-- Shopping Cart --}}

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

                        <!-- Profile -->
                        <a class="dropdown-item" href="{{ route('profile') }}">
                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                            Profile
                        </a>

                        <!-- Logout -->
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2"></i>
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
{{-- dynamic Slider --}}
<div>
    <div style="margin-top: 0px;" id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            @foreach ($sliders as $key => $slider)
            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                <img src="{{ Storage::url($slider->image) }}" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <b>
                        <h1
                            style="color: rgb(255, 255, 255) ; font-size: 50px;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">
                            We are so happy to see you here</h1>
                    </b>
                    <h4>beauty, clarity, functionality and sustainability.</h4>
                </div>
            </div>
            @endforeach

        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
{{-- slider --}}


<div class="container">
    <main role="main">

        {{-- Category --}}
        <div style="display:flex;justify-content:center;" class="pt-5" >
            <h4 style="font-size:18px; color: #4180b8; font-family:Quicksand;font-family:Sans-serif;">WHAT’S GOOD HERE</h4>
        </div>
        <div style="display:flex;justify-content:center">
        <h2 class="alaa">Browse our stores</h2>
        </div>
        <div class="row">
            @foreach (App\Models\Category::all() as $category)
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <img src="{{ Storage::url($category->image) }}" height="300" style="width: 100%"> {{-- using height
                    & width To make all images the same size --}}
                    <div class="card-body">
                        <p><b>{{ $category->name }}</b></p>
                        <p class="card-text">
                            {!! Str::limit($category->description, 120) !!}
                            {{-- ^ In order to limit the length of a string directly in your blade files --}}
                        </p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <a href="{{route('product.list',[$category->slug])}}">
                                    <button type="button" class="btn btn-sm btn-outline-success">View Products</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        {{-- product --}}
        <div class="album py-5">
            <div class="container">
                <h2>Top Selling Products</h2>
                <div class="row">
                    @foreach ($products as $product)

                    <div class="col-md-4">
                        <div class="card mb-4 shadow-sm">
                            <img src="{{ Storage::url($product->image) }}" height="300" style="width: 100%"> {{-- using
                            height & width To make all images the same size --}}
                            <div class="card-body">
                                <p><b>{{ $product->name }}</b></p>
                                <p class="card-text">
                                    {!! Str::limit($product->description, 120) !!}
                                    {{-- ^ In order to limit the length of a string directly in your blade files --}}
                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="{{route('product.view',[$product->id])}}"> {{-- to go to
                                            'show.blade.php' file --}}
                                            <button type="button" class="btn btn-sm btn-outline-success">View</button>
                                        </a>
                                        <a href="{{ route('add.cart', [$product->id]) }}">
                                            <button type="button" class="btn btn-sm btn-outline-primary">Add to
                                                cart</button>
                                        </a>
                                    </div>
                                    <small class="text-muted">${{ $product->price }}</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    @endforeach
                </div>
                <div style="display:flex;justify-content:center">
                    <a href="{{route('more.product')}}">
                        <button style="text-align: center; background: #233342;
                        border: #233342; border-radius: 4px; --bs-btn-padding-x: 50;" 
                        class="btn btn-success">All Product</button>
                    </a>
                </div>
            </div>
        </div>



    </main>

</div>

{{-- Footer Home page --}}
<div class="footer-clean">
    <footer>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-4 col-md-3 item">
                    <h3>Company info</h3>
                    <ul>
                        <li><a href="#">about Go-plaza</a></li>
                        <li><a href="#">Social Responsibility</a></li>
                        <li><a href="#">Supply Chain</a></li>
                        <li><a href="#">Careers</a></li>
                    </ul>
                </div>
                <div class="col-sm-4 col-md-3 item">
                    <h3>Help and suport</h3>
                    <ul>
                        <li><a href="#">How To Order</a></li>
                        <li><a href="#">Development</a></li>
                        <li><a href="#">Hosting</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 item social"><a href="#"><i class="icon ion-social-facebook"></i></a><a href="#"><i
                            class="icon ion-social-twitter"></i></a><a href="#"><i
                            class="icon ion-social-snapchat"></i></a><a href="#"><i
                            class="icon ion-social-instagram"></i></a>
                    <p class="copyright">Plaza team © 2022</p>
                </div>
            </div>
        </div>
    </footer>
</div>
@endsection
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
<style>
    .footer-clean {
        padding: 50px 0;
        background-color: #fff;
        color: #4b4c4d;
    }

    .footer-clean h3 {
        margin-top: 0;
        margin-bottom: 12px;
        font-weight: bold;
        font-size: 16px;
    }

    .footer-clean ul {
        padding: 0;
        list-style: none;
        line-height: 1.6;
        font-size: 14px;
        margin-bottom: 0;
    }

    .footer-clean ul a {
        color: inherit;
        text-decoration: none;
        opacity: 0.8;
    }

    .footer-clean ul a:hover {
        opacity: 1;
    }

    .footer-clean .item.social {
        text-align: right;
    }

    @media (max-width:767px) {
        .footer-clean .item {
            text-align: center;
            padding-bottom: 20px;
        }
    }

    @media (max-width: 768px) {
        .footer-clean .item.social {
            text-align: center;
        }
    }

    .footer-clean .item.social>a {
        font-size: 24px;
        width: 40px;
        height: 40px;
        line-height: 40px;
        display: inline-block;
        text-align: center;
        border-radius: 50%;
        border: 1px solid #ccc;
        margin-left: 10px;
        margin-top: 22px;
        color: inherit;
        opacity: 0.75;
    }

    .footer-clean .item.social>a:hover {
        opacity: 0.9;
    }

    @media (max-width:991px) {
        .footer-clean .item.social>a {
            margin-top: 40px;
        }
    }

    @media (max-width:767px) {
        .footer-clean .item.social>a {
            margin-top: 10px;
        }
    }

    .footer-clean .copyright {
        margin-top: 14px;
        margin-bottom: 0;
        font-size: 13px;
        opacity: 0.6;
    }
</style>