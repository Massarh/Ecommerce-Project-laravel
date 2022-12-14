@include('navLayout.navbar')

@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Products</h2>
    <div class="row">
        <div class="col-md-2">
            
        <form action="{{ route('product.list', [$slug]) }}" method="GET">
            
            @foreach ($subcategories as $subcategory)
                {{-- Checkbox --}}
            <p><input type="checkbox" name="subcategory[]" value="{{ $subcategory->id }}"
                @if(isset($filterSubCategories)) {{-- Filter عشان يضل محدد مين السبكاتيقوري الي محطوت عليه صح بعد ما اكبس على  --}}
                    {{ in_array($subcategory->id, $filterSubCategories)?'checked="checked" ' : '' }} 
                @endif
                > {{ $subcategory->name }}</p>

            @endforeach
            
            <input type="submit" value="Filter" class="btn btn-success">
        </form>
        <hr>
        <h3>Filter by price</h3>

        <form action="{{ route('product.list', [$slug]) }}" method="GET">
            <input type="text" name="min" class="form-control" placeholder="minimum price" >
            <br>
            <input type="text" name="max" class="form-control" placeholder="maximum price" > 
            <input type="hidden" name="categoryId" value="{{ $categoryId }}">
            <br>
            <input type="submit" name="Filter" class="btn btn-secondary">
        </form>

            <hr>
            <a href="{{route('product.list', [$slug])}}">Back</a>

        </div>
        <div class="col-md-10">
            <div class="row">
                {{-- foreach products--}}
                @foreach ($products as $product)
                    
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <img src="{{ Storage::url($product->image) }}" height="200" style="width: 100%">
                        <div class="card-body">
                            <p><b>{{ $product->name }}</b></p>
                            <p class="card-text">
                                {!! Str::limit($product->description, 120) !!} 
                            </p>
                            
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="{{ route('product.view',[$product->id]) }}">
                                        <button type="button" class="btn btn-sm btn-outline-success">View</button>
                                    </a>
                                    <a href="{{ route('add.cart', [$product->id]) }}">
                                        <button type="button" class="btn btn-sm btn-outline-primary">Add ro card</button>
                                    </a>
                                </div>
                                <small class="text-muted">$ {{ $product->price }}</small>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- foreach --}}
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
