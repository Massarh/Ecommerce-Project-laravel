@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="row">
            <aside class="col-md-6 border-right"> {{-- <aside>?? --}}
                <img src="{{Storage::url($product->image)}}" class="card-aside-img" style="width: 100%; height: 80%; display:block; margin-top:35px ">

            </aside>
            
            
            <aside class="col-md-6"> 
                <section class="card-body p-5">
                    {{-- Name --}}
                    <h3 class="title mb-3">{{ $product->name }}</h3>
                    {{-- Price --}}
                    <p class="price-detail-wrap">
                        <span class="price h3 text-danger">
                            <span class="currency">US $</span> {{ $product->price }}
                        </span>
                    </p>

                    <h3>Description</h3>
                    <p>{!! $product->description !!}</p>
                    {{-- using {!! !!} in description because 
                    اذا في اسكربت تاق ما بخليها زي ما هي بحولها لنص عادي --}} 

                    <h3>Additional Information</h3>
                    <p>{!! $product->additional_info !!}</p>

                    {{-- {{-- REMOVE هو عمله
                        ما زبط معي  --}
                        <div class="row">  
                        <div class="form-inline">
                            <h3>Quantity:</h3>
                            <input type="text" name="qty" class="form-control">
                            <input type="submit" class="btn btn-primary ml-2">
                        </div>
                    </div> --}}

                    <hr>
                    <a href="{{ route('add.cart', [$product->id]) }}" class="btn btn-lg btn-outline-primary text-uppercase">Add to cart</a>

                </section>
            </aside>
        </div>
    </div>

    @if (count($productFormSameCategories)>0)
        
    <div class="jumbotron" style="padding: 4rem 2rem; margin-bottom: 2rem; background-color: #e9ecef; border-radius: 0.3rem;">
        <h3>You may like</h3>
        <div class="row">
            @foreach ($productFormSameCategories as $product)

                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <img src="{{ Storage::url($product->image) }}" height="250" style="width: 100%"> {{-- using height & width To make all images the same size --}}
                        <div class="card-body">
                            <p><b>{{ $product->name }}</b></p>
                            <p class="card-text">
                                {!! Str::limit($product->description, 120) !!} 
                                {{-- ^ In order to limit the length of a string directly in your blade files --}}
                            </p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="{{ route('product.view', [$product->id]) }}"> {{-- to go to 'show.blade.php' file --}}
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

    </div>

    @endif

</div>
@endsection
