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
    }
</style>

@include('navLayout.navbar')

@extends('layouts.app')

@section('title') @lang('Cart') @endsection

@section('content')


<div class="row">
    <div class="col">
        <a href="/" class="btn text-muted d-none d-sm-inline-block btn-link">
            <i class="mdi mdi-arrow-left me-1"></i> Go Back to Shopping </a>
    </div>
</div>
<div class="row ">
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

                            @foreach($cart->items as $product)
                            <tr>
                                <td>
                                    <img src="{{ Storage::url($product['image']) }}" alt="product-img"
                                        title="product-img" class="avatar-md" />
                                </td>
                                <td>{{$product['name']}}</td>
                                <td>
                                    <div class="checkout">
                                        <button type="button" class="decrease-btn">-</button>
                                        <input type="text" class="quantity" value="{{$product['qty']}}">
                                        <button type="button" class="increase-btn">+</button>
                                    </div>

                                </td>

                                <td>
                                    $ {{$product['price'] * $product['qty'] }} JOD
                                </td>
                                <td>
                                    <form action="{{route('cart.remove', $product['id'])}}" method="POST">
                                        @csrf
                                        <button class="btn"
                                            style="margin-top:1.5px; color: #dc3545;padding-top:20px;"><i
                                                class="mdi mdi-trash-can font-size-20"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            <td colspan="5">Total Price: ${{$cart->totalPrice}}</td>

                        </tbody>
                    </table>
                </div>
                <div class="row mt-4">
                    <div class="col"  style="display: grid ; justify-content: end">

                        <div class="text-sm-end mt-2 mt-sm-0">
                            <a href="{{route('cart.checkout', $cart->totalPrice)}}" class="btn"
                                style="background-color: #1A1A1A; color:#fff">
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


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
$(".checkout").on("input", ".quantity", function() {
var price = +$(".price").data("price");
var quantity = +$(this).val();
$("#total").text("$" + price * quantity);
})

var $buttonPlus = $('.increase-btn');
var $buttonMin = $('.decrease-btn');
var $quantity = $('.quantity');

/For plus and minus buttons/
$buttonPlus.click(function() {
$quantity.val(parseInt($quantity.val()) + 1).trigger('input');
});

$buttonMin.click(function() {
$quantity.val(Math.max(parseInt($quantity.val()) - 1, 0)).trigger('input');
});
})
</script>
<!-- end row -->

@endsection