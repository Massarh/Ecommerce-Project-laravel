<x-loading-indicatore />
@include('navLayout.navbar')

@extends('layouts.app')

@section('title') View product @endsection

@section('content')

{!! Toastr::message() !!}

<div class="container">
    <div class="row justify-content-center JustCenter" style="margin-bottom: 155px">
        <div class="col-md-6 ">
            <img src="{{ Storage::url($product->image) }}" class="card-aside-img card-aside-img2 "
                style=" height: 507px; display:block;" />
        </div>
        <div class="col-md-6 cardTop">
            <section class=" p-5 MarginTop" style="padding-right: 18px !important; max-width: 472px;">
                <h3 style="width:fit-content; text-transform: uppercase;">{{$product->store->name}} STORE</h3>

                {{-- Name --}}
                <h2 class="title mb-3">
                    <b style="font-weight: 600 !important; text-transform: uppercase;">{{ $product->name }} </b>
                </h2>
                {{-- DESCRIPTION --}}
                <p>{!! $product->description !!}</p>

                <hr style=" border: 0;
                        height: 1px;
                        background: #333;
                        background-image: linear-gradient(to right, #ccc, #333, #ccc);">
                {{-- ITEM INFO --}}
                <p>{!! $product->additional_info !!}</p>
                {{-- Price --}}
                <p class="price-detail-wrap">
                    <span class="price h3 " style="font-size:20px">
                        {{ $product->price }} JOD
                    </span>
                </p>
                <a href="{{ route('add.cart', [$product->id]) }}" style="text-align: center; color:#fff; background: #1a1a1a; border: #1a1a1a;
                    border-radius: 4px; --bs-btn-padding-x: 80px;" class="btn">Add to Bag
                </a>
                <a href="{{ route('cart.show') }}" style="color:#fff; background: #1a1a1a; border: #1a1a1a;
                    border-radius: 4px; --bs-btn-padding-x: 10px;" class="btn">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-bag"
                        viewBox="0 0 16 16">
                        <path
                            d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z" />
                    </svg>
                </a>
            </section>
        </div>
    </div>
</div>
{{-- YOU MAY LIKE --}}
@if (count($productFromSameCategoryAndTopSelling) > 0)
<div class="jumbotron" style="margin: 80px;">
    <h3 class="fontStyleHint2" style=" font-family:Marlina; font-size:20px">SIMILAR ITEMS FROM OTHER STORES</h3>
    <div class="row">
        @foreach ($productFromSameCategoryAndTopSelling as $product)
        <div class="col-md-4 col-lg-3 col-xl-3 mb-3">
            <div style="width: 317px; margin: auto;">
                <a href="{{ route('product.view', [$product->id]) }}">
                    <img src="{{ Storage::url($product->image) }}" style="width: 217px;" class="image-width">
                </a>
                <p style="margin-bottom: 0px !important; text-transform: uppercase;">{{ $product->name }}</p>
                <p style="margin-bottom: 0px !important;">{{ $product->price }} JOD</p>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endif
</div>
@endsection