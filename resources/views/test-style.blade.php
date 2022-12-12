
@include('navLayout.navbar')

@extends('layouts.app')

@section('title') @lang('translation.Products') @endsection

@section('css')
    <!-- ION Slider -->
    <link href="{{ URL::asset('/assets/libs/ion-rangeslider/ion-rangeslider.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')

    <div class="row">
        <div class="col-lg-3">
            <div class="card">
                {{-- <div class="card-body"> --}}
                    
                    <div class="mt-4 pt-3">
                        <h5 class="font-size-14 mb-3">Price</h5>
                        <input type="text" id="pricerange">
                    </div>

                    </div>                
                {{-- </div> --}}
            </div>
        </div>
    </div>
    <!-- end row -->

@endsection
@section('script')
    <!-- Ion Range Slider-->
    <script src="{{ URL::asset('/assets/libs/ion-rangeslider/ion-rangeslider.min.js') }}"></script>

    <!-- init js -->
    <script src="{{ URL::asset('/assets/js/pages/product-filter-range.init.js') }}"></script>
@endsection
