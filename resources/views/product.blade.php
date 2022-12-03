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
                                <h1 style="color: rgb(255, 255, 255) ; font-size: 85px;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">We are so happy to see you here</h1>
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
        </divclass=>
        {{-- slider --}}

    {{-- carousel --}}
    <h1 class="pt-5">Latest products</h1>

    <div class="jumbotron" {{--style="padding: 4rem 2rem; margin-bottom: 2rem; background-color: #e9ecef; border-radius: 0.3rem;"--}}>
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="row">

                        @foreach ($randomActiveProducts as $product)
                            <div class="col-3">
                                {{-- <div class="card mb-4 shadow-sm"> --}}
                                        <img src="{{ Storage::url($product->image) }}" height="200" style="width: 100%; border-radius: 50%; display:inline-block"> {{-- using height & width To make all images the same size --}}
                                    <p style="text-align: center; margin-top: 3px"><b>{{ $product->name }}</b></p>
                                    {{-- <div class="card-body">
                                        <p class="card-text">
                                            {!! Str::limit($product->description, 120) !!} 
                                            {{-- ^ In order to limit the length of a string directly in your blade files --}
                                        </p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="btn-group">
                                                <a href="{{ route('product.view', [$product->id]) }}"> {{-- to go to 'show.blade.php' file --}
                                                    <button type="button" class="btn btn-sm btn-outline-success">View</button>
                                                </a>
                                                <a href="{{ route('add.cart', [$product->id]) }}">
                                                    <button type="button" class="btn btn-sm btn-outline-primary">Add to cart</button>
                                                </a>
                                            </div>
                                            <small class="text-muted">${{ $product->price }}</small>
                                        </div>
                                    </div> --}}
                                {{-- </div> --}}
                            </div>
                        @endforeach
                        
                    </div>
                </div>

                <div class="carousel-item">
                    <div class="row">
                        
                        @foreach ($randomItemProducts as $product)
                            <div class="col-3">
                                {{-- <div class="card mb-4 shadow-sm"> --}}
                                    <img src="{{ Storage::url($product->image) }}" height="200" style="width: 100%; border-radius: 50%; display:inline-block "> {{-- using height & width To make all images the same size --}}
                                    <p style="text-align: center; margin-top: 3px"><b>{{ $product->name }}</b></p>
                                    {{-- <div class="card-body">
                                        <p class="card-text">
                                            {!! Str::limit($product->description, 120) !!} 
                                            {{-- ^ In order to limit the length of a string directly in your blade files --}
                                        </p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="btn-group">
                                                <a href="{{ route('product.view', [$product->id]) }}"> {{-- to go to 'show.blade.php' file --}
                                                <button type="button" class="btn btn-sm btn-outline-success">View</button>
                                                </a>
                                                <a href="{{ route('add.cart', [$product->id]) }}">
                                                    <button type="button" class="btn btn-sm btn-outline-primary">Add to cart</button>
                                                </a>
                                            </div>
                                            <small class="text-muted">${{ $product->price }}</small>
                                        </div>
                                    </div> --}}
                                {{-- </div> --}}
                            </div>
                        @endforeach
                        
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button> 
        </div>
    </div>
    {{-- end carousel --}}

    {{-- category --}}
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
            <h2>Products</h2>
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
            <a href="{{route('more.product')}}" >
                <button style="text-align: center;" class="btn btn-success">More Product</button>
            </a>
        </div>
    </div>



    </main>
    
</div>

<footer class="text-muted">
    <div class="container">
        <p class="float-right">
            <a href="#">Back to top</a>
        </p>
        <p>Album example is &copy; Bootstrap, but please download and customize it for yourself!</p>
        <p>New to Bootstrap? <a href="/">Visit the homepage</a> or read our <a href="/docs/4.6/getting-started/introduction/">getting started guide</a>.</p>
    </div>
</footer>
@endsection
