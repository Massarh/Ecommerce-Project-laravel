@extends('layouts.app')

@section('content')

<div class="container">
    <main role="main">

    {{-- dynamic Slider --}}
    <div>
        <div style="margin-top: 0px" id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
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
                                <h1 style="color: rgb(255, 255, 255) ; font-size: 50px;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">We are so happy to see you here</h1>
                            </b>
                            <h4 >beauty, clarity, functionality and sustainability.</h4>
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

    {{-- Category --}}
    <h2 class="pt-5">Category</h2>
        <div class="row">
            @foreach (App\Models\Category::all() as $category)
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <img src="{{ Storage::url($category->image) }}" height="300" style="width: 100%"> {{-- using height & width To make all images the same size --}}
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
    <div class="album py-5 bg-light">
        <div class="container">
            <h2>Top Selling Products</h2>
            <div class="row">
                @foreach ($products as $product)

                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <img src="{{ Storage::url($product->image) }}" height="300" style="width: 100%"> {{-- using height & width To make all images the same size --}}
                        <div class="card-body">
                            <p><b>{{ $product->name }}</b></p>
                            <p class="card-text">
                                {!! Str::limit($product->description, 120) !!} 
                                {{-- ^ In order to limit the length of a string directly in your blade files --}}
                            </p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="{{route('product.view',[$product->id])}}"> {{-- to go to 'show.blade.php' file --}}
                                    <button type="button" class="btn btn-sm btn-outline-success">View</button>
                                    </a>
                                    <a href="{{ route('add.cart', [$product->id]) }}">
                                        <button type="button" class="btn btn-sm btn-outline-primary">Add to cart</button>
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
                <a href="{{route('more.product')}}" >
                    <button style="text-align: center;" class="btn btn-success">All Product</button>
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
                <div class="col-lg-3 item social"><a href="#"><i class="icon ion-social-facebook"></i></a><a href="#"><i class="icon ion-social-twitter"></i></a><a href="#"><i class="icon ion-social-snapchat"></i></a><a href="#"><i class="icon ion-social-instagram"></i></a>
                    <p class="copyright">Plaza team © 2022</p>
                </div>
            </div>
        </div>
    </footer>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
<style>
    .footer-clean {
        padding:50px 0;
        background-color:#fff;
        color:#4b4c4d;
    }
    
    .footer-clean h3 {
        margin-top:0;
        margin-bottom:12px;
        font-weight:bold;
        font-size:16px;
    }
    
    .footer-clean ul {
        padding:0;
        list-style:none;
        line-height:1.6;
        font-size:14px;
        margin-bottom:0;
    }
    
    .footer-clean ul a {
        color:inherit;
        text-decoration:none;
        opacity:0.8;
    }
    
    .footer-clean ul a:hover {
        opacity:1;
    }
    
    .footer-clean .item.social {
        text-align:right;
    }
    
    @media (max-width:767px) {
        .footer-clean .item {
        text-align:center;
        padding-bottom:20px;
        }
    }
    
    @media (max-width: 768px) {
        .footer-clean .item.social {
        text-align:center;
        }
    }
    
    .footer-clean .item.social > a {
        font-size:24px;
        width:40px;
        height:40px;
        line-height:40px;
        display:inline-block;
        text-align:center;
        border-radius:50%;
        border:1px solid #ccc;
        margin-left:10px;
        margin-top:22px;
        color:inherit;
        opacity:0.75;
    }
    
    .footer-clean .item.social > a:hover {
        opacity:0.9;
    }
    
    @media (max-width:991px) {
        .footer-clean .item.social > a {
        margin-top:40px;
        }
    }
    
    @media (max-width:767px) {
        .footer-clean .item.social > a {
        margin-top:10px;
        }
    }
    
    .footer-clean .copyright {
        margin-top:14px;
        margin-bottom:0;
        font-size:13px;
        opacity:0.6;
    }
</style>
@endsection
