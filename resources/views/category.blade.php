{{-- use it any where --}}
<x-loading-indicatore />

@section('css')
<!-- ION Slider -->
<link href="{{ URL::asset('/assets/libs/ion-rangeslider/ion-rangeslider.min.css') }}" rel="stylesheet"
    type="text/css" />
@endsection

@section('script')
<!-- Ion Range Slider-->
<script src="{{ URL::asset('/assets/libs/ion-rangeslider/ion-rangeslider.min.js') }}"></script>

<!-- init js -->
<script src="{{ URL::asset('/assets/js/pages/product-filter-range.init.js') }}"></script>
@endsection
<style>
    
    .search-container {
        margin-top: 80px;

    }

    .filter-container {
        margin-bottom: 100px;
        

    }

    .no-product-style {
        height: 50px;
        width: 100%;
        max-width: 300px;
        color: #1a1a1a;
    }
    .search-with-name-store{
        display:flex; 
        justify-content:start;
        align-items:baseline
    }
    .font-style-hint{
        font-family: garamond sans-serif!important;
        font-style: italic !important;
        font-weight: 500;
        text-align: center

    }

    @media (max-width: 768px) {
        .search-with-name-store{
            display: block;
        }
        .filter-container {
            width: 294px !important;
            margin: auto !important;
        }
    }

    @media (min-width: 768px) {
        .no-product-style {
            margin-left: 50px;
        }
    }

    .search {
        margin: auto;
        width: fit-content
    }

    .p-style {
        color: #1a1a1a !important;
        font-weight: bold !important;
        font-size: 18px !important;
    }
</style>


@include('navLayout.navbar')

@extends('layouts.app')

@section('content')

{{-- start search --}}

<div class="search-with-name-store mt-4">
<div>
    <h2 class="font-style-hint ms-2 mt-4" style="font-size: 30px">{{ $category->name }}</h2>
</div>

<div class="container">

    <form action="{{route('product.list', [$slug])}}" method="GET">
        <div class="search">
            <div class="" style="display: inline-block">
                <input value="{{ $search ? $search: ''}}" type="text" name="search" class="form-control"
                    placeholder="search">
            </div>
            <div class="" style="display: inline-block;">
                <button type="submit" style="background-color:#1a1a1a; color: #fff" class="btn">Search</button>
            </div>
        </div>
    </form>

</div>
</div>

{{-- end search --}}

{{-- start filter --}}

<div class="container-fluid filter-container">
    <div class="row">
        <div class="col-md-2 filter-container mb-5">

            <form action="{{ route('product.list', [$slug]) }}" method="GET">
                <p class="p-style ms-2">Filter Products</p>
                <label class=" ms-2" for="">choose section</label>

                {{-- foreach subcategories--}}
                @foreach ($subcategories as $subcategory)
                {{-- Checkbox --}}
                <p><input class="ms-2" type="checkbox" name="subcategory[]" value="{{ $subcategory->id }}"
                    
                    {{-- عشان يضل محدد مين السبكاتيقوري الي محطوط عليه صح بعد ما اكبس على كبسة الفلتر --}} 
                    {{-- isset check variable is not null --}} 
                    @if(isset($filterSubCategories)) 
                    {{-- searches an array for a specific value --}} 
                    {{ in_array($subcategory->id, $filterSubCategories) ? 'checked="checked" ' : '' }}
                    @endif
                    > {{ $subcategory->name }}</p>

                @endforeach
                {{-- endforeach --}}

                <label class="ms-2" for="">price</label>

                <div class="price-style mb-5 ms-2" style="max-width:220px;">
                    <input value="{{ $price ? $price : '0;1000'}}" name="price" type="text" id="pricerange">
                </div>

                <div class="ms-2 ">
                    <button style="background-color:#1a1a1a; color: #fff" class="btn" type="submit">Filter</button>
                </div>
            </form>

        </div>
        {{-- end filter --}}

        {{-- start products --}}

        <div class="container-fluid col-md-10">
            <div class="row">
                @if(count($products)>0)
                @foreach ($products as $product)

                <div class="col-md-6 col-lg-4 col-xl-3 mb-4">
                    <div style="width: 250px; margin: auto;">
                        <a href="{{route('product.view',[$product->id])}}">
                            <img src="{{ Storage::url($product->image) }}" style="width: 250px;">
                        </a>
                        <p style="margin-bottom: 0px !important;">{{ $product->name }}</p>
                        <p style="margin-bottom: 0px !important;">{{ $product->price }} JOD</p>
                    </div>
                </div>

                @endforeach
                @else
                <div class="col-md-6 col-lg-4 col-xl-3 mb-4">
                    <p class="no-product-style">there is no matching products</p>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
{{$products->links()}} {{--to make pagination --}}

@endsection