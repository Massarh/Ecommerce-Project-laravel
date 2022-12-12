
@include('navLayout.navbar')

@extends('layouts.app')

@section('css')
    <!-- ION Slider -->
    <link href="{{ URL::asset('/assets/libs/ion-rangeslider/ion-rangeslider.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')

    <div class="container">
        <form action="{{route('more.product')}}" method="GET">
            <div class="form-row mb-3">
                <div class="col-md-10" style="display: inline-block;">
                    <input type="text" name="search" class="form-control" placeholder="search">
                </div>
                <div class="col-md-2" style="display: inline-block;">
                    <button type="submit" class="btn btn-secondary">Search</button>
                </div>
            </div>
        </form>
    </div>
    
    <div class="album py-5 mt-5">
        <div class="container-fluid">
            
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
            
        </div>
    </div>

    {{$products->links()}} {{-- to make  --}}
@endsection

    @section('script')
    <!-- Ion Range Slider-->
    <script src="{{ URL::asset('/assets/libs/ion-rangeslider/ion-rangeslider.min.js') }}"></script>
    
    <!-- init js -->
    <script src="{{ URL::asset('/assets/js/pages/product-filter-range.init.js') }}"></script>
    @endsection
