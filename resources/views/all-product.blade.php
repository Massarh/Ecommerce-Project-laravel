
@include('navLayout.navbar')

@extends('layouts.app')

@section('content')

<div class="container">
    <form action="{{route('more.product')}}" method="GET">
        <div class="form-row mb-3">
            <div class="col-md-10" style="display: inline-block;">
                <input type="text" name="search" class="form-control" placeholder="search...">
            </div>
            <div class="col-md-2" style="display: inline-block;">
                <button type="submit" class="btn btn-secondary">Search</button>
            </div>
        </div>
    </form>

    <div class="row">
        @foreach ($products as $product)

        <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
                <img src="{{ Storage::url($product->image) }}" height="300" style="width: 100%"> 
                <div class="card-body">
                    <p><b>{{ $product->name }}</b></p>
                    <p class="card-text">
                        {!! Str::limit($product->description, 120) !!} 
                        {{-- ^ In order to limit the length of a string directly in your blade files --}}
                    </p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            <a href="{{route('product.view',[$product->id])}}">{{-- to go to 'show.blade.php' file --}}
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
    {{$products->links()}} {{-- to make  --}}
</div>
@endsection
