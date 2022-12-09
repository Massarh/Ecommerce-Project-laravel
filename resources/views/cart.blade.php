@include('navLayout.navbar')

@extends('layouts.app')

@section('title') @lang('Cart') @endsection

@section('css')
<!-- bootstrap-touchspin css -->
<link href="{{ URL::asset('/assets/libs/bootstrap-touchspin/bootstrap-touchspin.min.css') }}" rel="stylesheet" />
@endsection

@section('content')

{{-- @component('components.breadcrumb')
@slot('li_1') Ecommerce @endslot
@slot('title') Cart @endslot
@endcomponent --}}

<div class="row ">
    <div class="col-xl">
        <div class="card" >
            <div class="card-body" style="border: 0;">
                <div class="table-responsive">
                    <table class="table align-middle mb-0 table-nowrap">
                        <thead style="background-color: #1A1A1A; color:#fff">
                            <tr>
                                <th>Image</th>
                                <th>Product</th>
                                <th>Price</th>
                                <th >Quantity</th>
                                <th colspan="2">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($cart)
                                {{-- Foreach To display product in cart --}}
                                
                                @foreach($cart->items as $product)
                                <tr>
                                    <td>
                                        <img src="{{ Storage::url($product['image']) }}" alt="product-img"
                                            title="product-img" class="avatar-md" />
                                    </td>
                                    <td>{{$product['name']}}</td>
                                    <td>$ {{$product['price']}} </td>
                                    <td>
                                        <div style="width: 120px;">
                                            <input type="text" value="02" name="demo_vertical" >
                                        </div>
                                        {{-- <form action="{{route('cart.update', $product['id'])}}" method="POST">
                                            @csrf
                                            <input type="text" name="qty" value="{{ $product['qty'] }}">
                                            <button class="btn btn-secondary btn-sm p-1"><i class="fas fa-sync"></i></button>
                                        </form> --}}
                                    </td>
                                    <td>
                                        $ {{$product['price'] * $product['qty'] }}
                                    </td>
                                    <td>
                                        <form action="{{route('cart.remove', $product['id'])}}" method="POST">
                                            @csrf
                                            <button class="btn" style="color: #dc3545;"><i class="mdi mdi-trash-can font-size-18"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            <td colspan="5">Total Price: ${{$cart->totalPrice}}</td>
                            
                        </tbody>
                    </table>
                </div>
                <div class="row mt-4">
                    <div class="col-sm-6">
                        <a href="/" class="btn" style="background-color: #646464; color:#fff">
                            <i class="mdi mdi-arrow-left me-1"></i> Continue Shopping </a>
                    </div> <!-- end col -->
                    <div class="col-sm-6">
                        <div class="text-sm-end mt-2 mt-sm-0">
                            <a href="{{route('cart.checkout', $cart->totalPrice)}}" class="btn" style="background-color: #1A1A1A; color:#fff">
                                <i class="mdi mdi-cart-arrow-right me-1"></i> Checkout </a>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row-->
            </div>
            @else
                <td>No items in cart</td>
            @endif
        </div>
    </div>
    
</div>
<!-- end row -->

@endsection
@section('script')
<!-- bootstrap-touchspin -->
<script src="{{ URL::asset('/assets/libs/bootstrap-touchspin/bootstrap-touchspin.min.js') }}"></script>

<!-- init js -->
<script src="{{ URL::asset('/assets/js/pages/ecommerce-cart.init.js') }}"></script>
@endsection