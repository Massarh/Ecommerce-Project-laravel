<x-loading-indicatore />
<style>
    .decrease-btn,
    .increase-btn {
        /* border-radius: 50%;  */
        background-color: #1A1A1A;
        border-color: #1A1A1A;
        color: white;
        height: 30px;

    }

    .quantity {
        width: 70px;
        height: 30px;
        text-align: center;
        border: 1px solid rgb(189 189 189);
        margin-right: -5px;
        margin-left: -5px;
    }
</style>

@include('navLayout.navbar')

@extends('layouts.app')

@section('title') Bag @endsection

@section('content')

<div class="row mt-4">
    <div class="col-xl">
        <div class="card">
            <div class="card-body" style="border: 0;">
                <div class="table-responsive">
                    <table class="table align-middle mb-0 table-nowrap">
                        <thead style="background-color: #fff; color:#1A1A1A">
                            <tr>
                                <th>Image</th>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th colspan="2">Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($cart)
                            {{-- Foreach To display product in cart --}}                        
                            {!! Toastr::message() !!}
                            @foreach($cart->items as $product)
                            <tr>
                                <td>
                                    <img src="{{ Storage::url($product['image']) }}" alt="product-img"
                                        title="product-img" class="avatar-md" style="width:200px; height:300px" />
                                </td>
                                <td style="min-width: 230px">
                                    {{$product['name']}}
                                    <hr style="border-top: 1px solid #989898; max-width: 400px !important;">
                                    <p style="max-width: 400px !important; font-size:12px">{!!$product['description']!!}
                                    </p>
                                    <p style="max-width: 400px !important; font-size:12px">
                                        {!!$product['additional_info']!!}</p>
                                </td>
                                <td>
                                    <div class="checkout" style="margin-top:18px">
                                        <form action="{{route('cart.update', $product['id'])}}" method="POST">
                                            @csrf
                                            <div class="d-flex">
                                                <button id="{{$product['id']}}" type="button"
                                                    class="decrease-btn">-</button>
                                                <input id="{{$product['id']}}" name="qty" type="text" class="quantity"
                                                    value="{{ $product['qty'] }}">
                                                <button type="button" id="{{$product['id']}}"
                                                    class="increase-btn">+</button>

                                                <button type="submit"
                                                    style="border:none;background-color:transparent;cursor:pointer;margin-left:4px;color: #1e1e1e"
                                                    class="fa fa-refresh"></button>
                                            </div>
                                        </form>
                                    </div>
                                </td>

                                <td>
                                    {{$product['price'] * $product['qty'] }} JOD
                                </td>
                                <td>
                                    <form action="{{route('cart.remove', $product['id'])}}" method="POST">
                                        @csrf
                                        @method('PUT')

                                        <button class="bg-color-btn"
                                            style="margin-top:1.5px; color: #dc3545;padding-top:20px;"><i
                                                class="mdi mdi-trash-can font-size-20"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot style="font-weight: bold;">

                            <td colspan="3">Total Price: </td>
                            <td colspan="2">{{$cart->totalPrice}} JOD</td>

                        </tfoot>
                    </table>
                </div>
                <div class="row mt-4">
                    <div class="col" style="display: grid ; justify-content: end">

                        <div class="text-sm-end mt-2 mt-sm-0">
                            <a href="{{route('cart.checkout')}}" class="btn"
                                style="background-color: #1A1A1A; color:#fff">
                                <i class="mdi mdi-cart-arrow-right me-1"></i> Checkout </a>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row-->
            </div>
            @else
            <td>Add items to your cart</td>
            @endif
        </div>
    </div>

</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script>
    $(document).ready(function() {
        /*For plus and minus buttons*/
        $('.increase-btn').click(function(e) {
            var idForClickedButton = e.target.id;
            console.log( idForClickedButton);
            console.log( $(`input#${idForClickedButton}.quantity`));
            $(`input#${idForClickedButton}.quantity`).val(parseInt($(`input#${idForClickedButton}.quantity`).val()) + 1);
        });
        
        $('.decrease-btn').click(function(e) {
            var idForClickedButton = e.target.id;
            if($(`input#${idForClickedButton}.quantity`).val()>1){
                $(`input#${idForClickedButton}.quantity`).val(Math.max(parseInt($(`input#${idForClickedButton}.quantity`).val()) - 1, 0));
            }
            // .trigger('input');
        });
    })
</script>
<!-- end row -->

@endsection