<x-loading-indicatore />
@extends('layouts.app')

@section('title') Home page @endsection

@section('content')

<script>
    $(function () {
        $(document).scroll(function () {
        
            document.getElementById("main-nav").style.background = "white";
            document.getElementById("main-nav").style.position = "sticky";
            document.getElementById("main-nav").style.transition= "all 0.9s";
            
            if ($(this).scrollTop()  == 0 ) {
                console.log('up');
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

    @media(min-width:1350px) {
        /* .slider-image {
            height:100vh;
        } */
    }

    .top-selling {
        text-align: left !important;
        font-family: garamond !important;
        font-family: Serif;
        font-style: italic !important;
        font-size: 50px;
        font-weight: 500;
        margin-bottom: 25px;
        margin-top: -22px;
    }
</style>

{{-- Nav --}}
<nav class="navbar navbar-expand-md"
    style="position: absolute; top:0; z-index: 10; background-color: transparent; width: 100vw" id="main-nav">
    <div class="container-fluid" style="margin-top: -11px; margin-bottom: -11px;">
        <div>
            <a class="navbar-brand" href="{{ url('/') }}" style="margin-left: 50px">
                {{-- <b style="font-family: fangsong; font-size:36px;">PLAZA</b> --}}
                <img src="{{ URL::asset('logo/dark.png')}}" alt="" height="60">

            </a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarExample01"
            aria-controls="navbarExample01" aria-expanded="false" aria-label="Toggle navigation"
            style="margin-right: 15px;">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarExample01" style="margin-right: 60px">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto nav-align-items" style="font-family: fangsong;font-size: 17px;">
                <!-- Authentication Links -->

                <!-- Shopping Cart -->
                <a href="{{ route('cart.show') }}" class="nav-link" style=" margin-left: 10px !important;">
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

                {{-- @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
                @endif --}}
                @else

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>

                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" style="text-transform: uppercase"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <img class="rounded-circle header-profile-user mt-1" alt="profile image"
                            style="margin-bottom: 6px !important;"
                            src="{{ auth()->user()->image ?  Storage::url(auth()->user()->image):asset('/logo/user.png')}}">
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown"
                        style="background-color: #ffffffab!important; margin-top:3px">

                        <!-- to access for admin panel -->
                        @if(auth()->user()->user_role=='superadmin' || auth()->user()->user_role=='admin' ||
                        auth()->user()->user_role=='employee')

                        <a class="dropdown-item" href="{{route('dashboard')}}">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Go to admin panel
                        </a>
                        @endif

                        @if(auth()->user()->user_role=='customer')
                        <!-- Profile -->
                        <a class="dropdown-item" href="{{route('profile')}}">
                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                            Profile
                        </a>
                        @endif

                        <!-- Logout -->
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2"></i>
                            {{ __('Logout') }}
                        </a>
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
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3"
                aria-label="Slide 4"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4"
                aria-label="Slide 5"></button>

        </div>
        <div class="carousel-inner">
            @foreach ($sliders as $key => $slider)
            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                <img src="{{ Storage::url($slider->image) }}" class="d-block w-100" alt="...">
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
{{-- end slider --}}

{!! Toastr::message() !!}

<!--welcoming message-->
<section id="welcome" class="py-5 text-center" style="padding-top: 3rem!important;
padding-bottom: 3rem!important; background-color:#ffffff!important;">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-md">
                <img class="img-fluid w-75" src="{{ URL::asset('logo/us.png')}}">
            </div>
            <div class="col-md py-4">
                <h2> Yay! Be one of our official users now.</h2>
                <p>
                    Without our customers, we wouldn’t exist. </p>
                <p>
                    Welcome to our family. Explore this site to your heart’s content. We promise you will see everything
                    you desire! Your presence inspires us to do more.
                </p>
            </div>
        </div>
    </div>
</section>
<!--welcoming message end -->

<div class="container-fluid">
    <main role="main">

        {{-- Store --}}
        <div style="display:flex;justify-content:center;" class="pt-5">
            <h4 style="font-size:18px; color: #A6A6A6; font-family:Quicksand;font-family:Sans-serif;">WHAT’S
                GOOD HERE
            </h4>
        </div>
        <div style="display:flex; justify-content:center">
            <h2 class="fontStyleHint">Browse our stores</h2>
        </div>

        <div class="row align-items-end custom-media">
            @foreach ($stores as $store)
            <div class="col-md-6 col-lg-4 mb-4">

                <div class="card border-0" style="width: 317px; margin: auto;">
                    <img src="{{ Storage::url($store->image) }}" class="card-img-top" alt="...">
                    <div class="card-body p-0" style="border-width: 1px 0px 0px 0px;">
                        <a href="{{route('all.product',[$store->slug])}}">
                            <button class="card-footer"
                                style="background-color: #1a1a1a; color:#fff;  border-radius: 0px; width:100%;">View</button>
                        </a>
                    </div>
                </div>

            </div>
            @endforeach
        </div>

        <!--insta start -->
        <section id="welcome" class="py-5 text-center" style="padding-top: 3rem!important;
                padding-bottom: 3rem!important; background-color:#1a1a1a!important;">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md">
                        <img class="img-fluid w-75"
                            src="{{ URL::asset('logo/pngkit_follow-us-on-instagram_2658663.png')}}">

                    </div>
                    <div class="col-md py-4" style="color:rgb(234, 234, 234) ">

                        <h2> @ go_plaza </h2>
                        <p>
                            Let’s connect on Instagram!
                        </p>
                        <p>
                            Stay up to date on all that we've got going on through our social media channels! If you
                            haven't already, make sure to give us a follow!
                        </p>

                        <button type="button" class="btn btn-light">
                            <a href="https://www.instagram.com/go_plaza/" target="_blank" style="color: #1a1a1a">let's
                                go</a>
                        </button>
                    </div>
                </div>
            </div>
        </section>
        <!--insta end -->

        {{-- product --}}
        <div class="album py-5 mt-5">
            <div class="container-fluid">
                <div style="display:flex; justify-content:center">
                    <h2 class="top-selling">Top Selling Products</h2>
                </div>
                <div class="row custom-media">
                    @foreach ($products as $product)

                    <div class="col-md-6 col-lg-4 mb-4">
                        <div style="width: 317px; margin: auto;">
                            <a href="{{route('product.view',[$product->id])}}">
                                <img src="{{ Storage::url($product->image) }}" style="width: 317px;">
                            </a>

                            <p style="margin-bottom: 0px !important; text-transform: uppercase;">{{ $product->name }}</p>
                            <p style="margin-bottom: 0px !important;">{{ $product->price }} JOD</p>
                        </div>
                    </div>

                    @endforeach
                </div>
                <div style="display:flex;justify-content:center">
                    <a href="{{route('all.product')}}">
                        <button style="text-align: center; background: #1a1a1a; color:#fff;
                border: #1a1a1a; border-radius: 4px; --bs-btn-padding-x: 50;" class="btn ">All
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
                        <li><a href="{{route('about-us')}}">About Us</a></li>
                        <li><a href="{{route('our-supplier')}}">Our Supplier</a></li>
                        <li><a href="{{route('our-team')}}">Our Team</a></li>
                    </ul>
                </div>
                <div class="col-sm-4 col-md-3 item">
                    <h3>HELP AND SUPPORT</h3>
                    <ul>
                        <li><a href="{{route('customer-care')}}">Customer Care</a></li>
                        <li><a href="#">How To Order</a></li>
                        <li><a href="#">Hosting</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 text-center item social">
                    <a href="#"><i class="fab fa-facebook-square" style="font-size: 22px"></i></a>
                    <a href="mailto:goplaza.team22@gmail.com" target="_blank"><i class="mdi mdi-gmail"></i></a>
                    <a href="#"><i class="mdi mdi-linkedin"></i></a>
                    <a href="https://www.instagram.com/go_plaza/" target="_blank"><i class="fab fa-instagram"></i></a>

                    <div class="copyright text-center my-auto">
                        <span>developed by <b>plaza team</b> &copy; <script>
                                document.write(new Date().getFullYear()); 
                            </script>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>
@endsection
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js">
</script>
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
        font-size: 13px;
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
        border: 1px solid rgb(255, 255, 255);
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