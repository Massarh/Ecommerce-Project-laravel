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


<div class="container-fluid">
    <main role="main">

        {{-- Category --}}
        <div style="display:flex;justify-content:center;" class="pt-5">
            <h4 style="font-size:18px; color: #A6A6A6; font-family:Quicksand;font-family:Sans-serif;">WHAT’S GOOD HERE
            </h4>
        </div>
        <div style="display:flex; justify-content:center">
            <h2 class="fontStyleHint">Browse our stores</h2>
        </div>

        <div class="row align-items-end custom-media"> {{-- style="margin-left: 104px; margin-right: 104px;" --}}
            @foreach (App\Models\Category::all() as $category)
            <div class="col-md-6 col-lg-4 mb-4">

                <div class="card border-0" style="width: 317px; margin: auto;">
                    <img src="{{ Storage::url($category->image) }}" class="card-img-top" alt="...">
                    <div class="card-body p-0" style="border-width: 1px 0px 0px 0px;">
                        <a href="{{route('product.list',[$category->slug])}}">
                            <button class="card-footer"
                                style="background-color: #000; color:#fff;  border-radius: 0px; width:100%;">View</button>
                        </a>
                    </div>
                </div>

            </div>
            @endforeach
        </div>

        {{-- --}}

        <div class="row align-items-center mt-5 padding-xs" style="background: #272424; color:#fff; min-height:550px">
            <div class="col-md-8 col-12 p-0 align-self-center" style="text-align: center;">
                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor"
                    class="bi bi-instagram" viewBox="0 0 16 16">
                    <path
                        d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z" />
                </svg>
                <h2 style="font-family: garamond Serif; font-style: italic!important;">
                    @go_ plaza</h2>
                <p style="max-width: 550px; display: inline-block; font-size: 20px;">Like what you see? Shop the looks from your fave influencer of the moment
                    straight from the ‘Gram.
                </p>
                <div class="display-button" style="">
                    <a class="btn mt-2 button-margin"
                        style="background-color: #000; color:#fff; border-radius: 0px; --bs-btn-padding-x: 19;">Shop
                        instagram</a>
                    <a class="btn mt-2"
                        style="background-color: #000; color:#fff; border-radius: 0px; --bs-btn-padding-x: 50;">follow</a>
                </div>
            </div>

            <div class="col-md-4 col-12">
                <img src="{{asset('storage/files/goplaza.png')}}"  class="instagram-image">
            </div>

        </div>
        {{-- --}}

        {{-- product --}}
        <div class="album py-5 mt-5">
            <div class="container-fluid">
                <div style="display:flex; justify-content:center">
                    <h2 class="fontStyleHint">Top Selling Products</h2>
                </div>
                <div class="row custom-media">
                    @foreach ($products as $product)

                    <div class="col-md-6 col-lg-4 mb-4">
                        <div style="width: 317px; margin: auto;">
                            <a href="{{route('product.view',[$product->id])}}">
                                <img src="{{ Storage::url($product->image) }}" style="width: 317px;">
                            </a>
                            
                            <p style="margin-bottom: 0px !important;">{{ $product->name }}</p>
                            <p style="margin-bottom: 0px !important;">{{ $product->price }} JOD</p>
                        </div>
                    </div>

                    @endforeach
                </div>
                <div style="display:flex;justify-content:center">
                    <a href="{{route('more.product')}}">
                        <button style="text-align: center; background: #000;
                        border: #000; border-radius: 4px; --bs-btn-padding-x: 50;" class="btn btn-success">All
                            Products</button>
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
                    <h3>COMPANY INFO</h3>
                    <ul>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Social Responsibility</a></li>
                        <li><a href="#">Supply Chain</a></li>
                        <li><a href="#">Careers</a></li>
                    </ul>
                </div>
                <div class="col-sm-4 col-md-3 item">
                    <h3>HELP AND SUPPORT</h3> 
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