<x-loading-indicatore />
@include('navLayout.navbar')

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center JustCenter" style="margin-bottom: 155px">
            <div class="col-md-6 ">
                <img src="{{ Storage::url($product->image) }}" class="card-aside-img card-aside-img2 "
                    style=" height: 507px; display:block;" />
            </div>
            <div class="col-md-6 cardTop">
                <section class=" p-5 MarginTop">
                    {{-- Name --}}
                    <h2 class="title mb-3">
                        <b style=" font-family: Times New Roman">{{ $product->name }} </b>
                    </h2>
                    {{-- DESCRIPTION --}}
                    <p style=" font-family: Times New Roman">{!! $product->description !!}</p>
                    <hr style=" border-top: 1px solid #1c1c1c;">
                    {{-- ITEM INFO --}}
                    <p style=" font-family: Times New Roman">{!! $product->additional_info !!}</p>
                    {{-- Price --}}
                    <p class="price-detail-wrap">
                        <span class="price h3 " style=" font-family: Times New Roman ; font-size:20px">
                            {{ $product->price }} JOD
                        </span>
                    </p>
                    <a href="{{ route('add.cart', [$product->id]) }}"
                        style="text-align: center;
                                            background: #000;
                                            border: #000;
                                            border-radius: 4px;
                                            --bs-btn-padding-x: 80px;
                                            font-family: Times New Roman"
                        class="btn btn-success">Add to Bag
                    </a>
                </section>
            </div>
        </div>
    </div>
    {{-- YOU MAY LIKE  --}}
    @if (count($productFromSameSubcategoryAndTopSelling) > 0)
        <div class="jumbotron"
            style="margin: 80px;">
            <h3 class="fontStyleHint2"  style=" font-family:Marlina; font-size:20px" >ITEMS YOU MAY LIKE </h3>
            <div class="row">
                @foreach ($productFromSameSubcategoryAndTopSelling as $product)
                <div class="col-md-4 col-lg-3 col-xl-3 mb-3">
                    <div style="width: 317px; margin: auto;">
                        <a href="{{ route('product.view', [$product->id]) }}">
                            <img src="{{ Storage::url($product->image) }}" style="width: 217px;" class="image-width">
                        </a>
                        <p style="margin-bottom: 0px !important;">{{ $product->name }}</p>
                        <p style="margin-bottom: 0px !important;">{{ $product->price }} JOD</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    @endif
    </div>
@endsection