<x-loading-indicatore />
@include('navLayout.navbar')

@extends('layouts.app')

@section('title') Checkout @endsection

@section('css')
<!-- select2 css -->
<link href="{{ URL::asset('/assets/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
{{-- CSS from "stripe DOCS"--}}

<style>
    .StripeElement {
        box-sizing: border-box;

        height: 40px;

        padding: 10px 12px;

        border: 1px solid transparent;
        border-radius: 4px;
        background-color: white;

        box-shadow: 0 1px 3px 0 #e6ebf1;
        -webkit-transition: box-shadow 150ms ease;
        transition: box-shadow 150ms ease;
    }

    .StripeElement--focus {
        box-shadow: 0 1px 3px 0 #cfd7df;
    }

    .StripeElement--invalid {
        border-color: #fa755a;
    }

    .StripeElement--webkit-autofill {
        background-color: #fefde5 !important;
    }
</style>

<style>
    /* loading style */
    /*!
   * Load Awesome v1.1.0 (http://github.danielcardoso.net/load-awesome/)
   * Copyright 2015 Daniel Cardoso <@DanielCardoso>
   * Licensed under MIT
   */
    .la-ball-spin,
    .la-ball-spin>div {
        position: relative;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
    }

    .la-ball-spin {
        display: block;
        font-size: 0;
        color: #fff;
    }

    .la-ball-spin.la-dark {
        color: #333;
    }

    .la-ball-spin>div {
        display: inline-block;
        float: none;
        background-color: currentColor;
        border: 0 solid currentColor;
    }

    .la-ball-spin {
        width: 32px;
        height: 32px;
    }

    .la-ball-spin>div {
        position: absolute;
        top: 50%;
        left: 50%;
        width: 8px;
        height: 8px;
        margin-top: -4px;
        margin-left: -4px;
        border-radius: 100%;
        -webkit-animation: ball-spin 1s infinite ease-in-out;
        -moz-animation: ball-spin 1s infinite ease-in-out;
        -o-animation: ball-spin 1s infinite ease-in-out;
        animation: ball-spin 1s infinite ease-in-out;
    }

    .la-ball-spin>div:nth-child(1) {
        top: 5%;
        left: 50%;
        -webkit-animation-delay: -1.125s;
        -moz-animation-delay: -1.125s;
        -o-animation-delay: -1.125s;
        animation-delay: -1.125s;
    }

    .la-ball-spin>div:nth-child(2) {
        top: 18.1801948466%;
        left: 81.8198051534%;
        -webkit-animation-delay: -1.25s;
        -moz-animation-delay: -1.25s;
        -o-animation-delay: -1.25s;
        animation-delay: -1.25s;
    }

    .la-ball-spin>div:nth-child(3) {
        top: 50%;
        left: 95%;
        -webkit-animation-delay: -1.375s;
        -moz-animation-delay: -1.375s;
        -o-animation-delay: -1.375s;
        animation-delay: -1.375s;
    }

    .la-ball-spin>div:nth-child(4) {
        top: 81.8198051534%;
        left: 81.8198051534%;
        -webkit-animation-delay: -1.5s;
        -moz-animation-delay: -1.5s;
        -o-animation-delay: -1.5s;
        animation-delay: -1.5s;
    }

    .la-ball-spin>div:nth-child(5) {
        top: 94.9999999966%;
        left: 50.0000000005%;
        -webkit-animation-delay: -1.625s;
        -moz-animation-delay: -1.625s;
        -o-animation-delay: -1.625s;
        animation-delay: -1.625s;
    }

    .la-ball-spin>div:nth-child(6) {
        top: 81.8198046966%;
        left: 18.1801949248%;
        -webkit-animation-delay: -1.75s;
        -moz-animation-delay: -1.75s;
        -o-animation-delay: -1.75s;
        animation-delay: -1.75s;
    }

    .la-ball-spin>div:nth-child(7) {
        top: 49.9999750815%;
        left: 5.0000051215%;
        -webkit-animation-delay: -1.875s;
        -moz-animation-delay: -1.875s;
        -o-animation-delay: -1.875s;
        animation-delay: -1.875s;
    }

    .la-ball-spin>div:nth-child(8) {
        top: 18.179464974%;
        left: 18.1803700518%;
        -webkit-animation-delay: -2s;
        -moz-animation-delay: -2s;
        -o-animation-delay: -2s;
        animation-delay: -2s;
    }

    .la-ball-spin.la-sm {
        width: 16px;
        height: 16px;
    }

    .la-ball-spin.la-sm>div {
        width: 4px;
        height: 4px;
        margin-top: -2px;
        margin-left: -2px;
    }

    .la-ball-spin.la-2x {
        width: 64px;
        height: 64px;
    }

    .la-ball-spin.la-2x>div {
        width: 16px;
        height: 16px;
        margin-top: -8px;
        margin-left: -8px;
    }

    .la-ball-spin.la-3x {
        width: 96px;
        height: 96px;
    }

    .la-ball-spin.la-3x>div {
        width: 24px;
        height: 24px;
        margin-top: -12px;
        margin-left: -12px;
    }

    /*
   * Animation
   */
    @-webkit-keyframes ball-spin {

        0%,
        100% {
            opacity: 1;
            -webkit-transform: scale(1);
            transform: scale(1);
        }

        20% {
            opacity: 1;
        }

        80% {
            opacity: 0;
            -webkit-transform: scale(0);
            transform: scale(0);
        }
    }

    @-moz-keyframes ball-spin {

        0%,
        100% {
            opacity: 1;
            -moz-transform: scale(1);
            transform: scale(1);
        }

        20% {
            opacity: 1;
        }

        80% {
            opacity: 0;
            -moz-transform: scale(0);
            transform: scale(0);
        }
    }

    @-o-keyframes ball-spin {

        0%,
        100% {
            opacity: 1;
            -o-transform: scale(1);
            transform: scale(1);
        }

        20% {
            opacity: 1;
        }

        80% {
            opacity: 0;
            -o-transform: scale(0);
            transform: scale(0);
        }
    }

    @keyframes ball-spin {

        0%,
        100% {
            opacity: 1;
            -webkit-transform: scale(1);
            -moz-transform: scale(1);
            -o-transform: scale(1);
            transform: scale(1);
        }

        20% {
            opacity: 1;
        }

        80% {
            opacity: 0;
            -webkit-transform: scale(0);
            -moz-transform: scale(0);
            -o-transform: scale(0);
            transform: scale(0);
        }
    }
</style>

@section('content')

{{-- loading --}}
<div id="spinnerDiv"
    style="visibility:hidden;display: flex; justify-content: center; align-items: center; background-color: white; position: fixed; top: 0px; left: 0px; z-index: 9999; width: 100%; height: 100%;">
    <div style="color:black" class="la-ball-spin la-3x">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
    </div>
</div>

<div class="checkout-tabs mt-4">
    <div class="row justify-content-center">

        <div class="col-xl-10 col-sm-9">
            <div class="card">
                <div class="card-body" style="border: 0 !important; box-shadow: 1px 1px 1px 1px #e4e4e4">

                    {{-- Order Summary class="tab-pane fade"--}}
                    <div id="v-pills-confir" role="tabpanel" aria-labelledby="v-pills-confir-tab">
                        <div class="card shadow-none mb-0">
                            <div class="card-body" style="border:0">
                                {{-- <h4 class="card-title mb-4">Order Summary</h4> --}}
                                <div>
                                    <div class="jumbotron"
                                        style="max-width:400px; margin-right:auto; margin-left:auto;">
                                        <h3 class="fontStyleHint2" style=" font-family:Marlina; font-size:20px">Order
                                            Summary</h3>
                                    </div>
                                </div>

                                <div class="table-responsive">
                                    <table class="table align-middle mb-0 table-nowrap">
                                        <thead style="background-color: #fff; color:#1A1A1A">
                                            <tr>
                                                <th scope="col">Image</th>
                                                <th scope="col">Product</th>
                                                <th scope="col">Quantity</th>
                                                <th scope="col">Price</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if($cart)

                                            @foreach($cart->items as $product)
                                            <tr>
                                                <th scope="row">
                                                    <img src="{{ Storage::url($product['image']) }}" alt="product-img"
                                                        title="product-img" class="avatar-md"
                                                        style="width: 70px ;height:103px">

                                                </th>
                                                <td>{{$product['name']}}</td>
                                                <td>{{ $product['qty'] }}</td>
                                                <td>{{ $product['price']*$product['qty'] }} JOD</td>

                                            </tr>
                                            @endforeach
                                            <tr>
                                                <td colspan="3">
                                                    <h6 class="m-0 " style="font-weight: bold;">Total Price: </h6>
                                                </td>
                                                <td style="font-weight: bold;">
                                                    {{$cart->totalPrice}} JOD
                                                </td>
                                            </tr>

                                            @endif

                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>


                    {{-- Shipping & Payment information --}}
                    <div class="col">
                        <div class="card">

                            <div class="card-body" style="border: 0 !important;">
                                <div class="tab-content" id="v-pills-tabContent">
                                    <div class="tab-pane fade show active" id="v-pills-shipping" role="tabpanel"
                                        aria-labelledby="v-pills-shipping-tab">
                                        <div>
                                            {{-- <h4 class="card-title">Delivery information</h4> --}}
                                            <div>
                                                <div class="jumbotron mt-2"
                                                    style="max-width:400px; margin-right:auto; margin-left:auto;">
                                                    <h3 class="fontStyleHint2"
                                                        style=" font-family:Marlina; font-size:20px">Delivery
                                                        information</h3>
                                                </div>
                                            </div>

                                            <p class="card-title-desc">Fill all information below</p>

                                            <form action="/charge" method="POST" id="payment-form">
                                                @csrf
                                                {{-- hereeeeee --}}
                                                {!! Toastr::message() !!}
                                                <!-- Name -->
                                                <div class="form-group row mb-4">
                                                    <label for="name" class="col-md-2 col-form-label">Name <span
                                                            style="color:#ef5b69"> *</span></label>
                                                    <div class="col-md-10">
                                                        <input type="text" name="name" id="name" class="form-control"
                                                            required value="{{auth()->user()->name}}"
                                                            placeholder="Enter your name">
                                                    </div>
                                                </div>

                                                <!-- Address -->
                                                <div class="form-group row mb-4">
                                                    <label for="address" class="col-md-2 col-form-label">Address <span
                                                            style="color:#ef5b69"> *</span></label>
                                                    <div class="col-md-10">
                                                        <input type="text" name="address" id="address"
                                                            class="form-control" placeholder="Enter your address"
                                                            required>
                                                    </div>
                                                </div>

                                                <!-- City -->
                                                <div class="form-group row mb-4">
                                                    <label for="city" class="col-md-2 col-form-label">City <span
                                                            style="color:#ef5b69"> *</span></label>
                                                    <div class="col-md-10">
                                                        <input type="text" name="city" id="city" class="form-control"
                                                            placeholder="Enter your city" required>
                                                    </div>
                                                </div>

                                                <!-- State -->
                                                <div class="form-group row mb-4">
                                                    <label for="state" class="col-md-2 col-form-label">State <span
                                                            style="color:#ef5b69"> *</span></label>
                                                    <div class="col-md-10">
                                                        <input type="text" name="state" id="state" class="form-control"
                                                            placeholder="Enter your state" required>
                                                    </div>
                                                </div>

                                                <!-- Postal code -->
                                                <div class="form-group row mb-4">
                                                    <label for="postalcode" class="col-md-2 col-form-label">Postal code
                                                        <span style="color:#ef5b69"> *</span></label>
                                                    <div class="col-md-10">
                                                        <input type="text" name="postalcode" id="postalcode"
                                                            class="form-control" placeholder="Enter your postalcode"
                                                            required>
                                                    </div>
                                                </div>
                                                {{-- Payment information --}}
                                                <div class="mt-5" id="v-pills-payment" role="tabpanel"
                                                    aria-labelledby="v-pills-payment-tab">
                                                    {{-- <h4 class="card-title">Payment information</h4> --}}
                                                    <div>
                                                        <div class="jumbotron mt-2"
                                                            style="max-width:400px; margin-right:auto; margin-left:auto;">
                                                            <h3 class="fontStyleHint2"
                                                                style=" font-family:Marlina; font-size:20px">Payment
                                                                information</h3>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div class="form-check form-check-inline font-size-16">
                                                            <input class="form-check-input" type="radio"
                                                                name="paymentoptionsRadio" value="credit"
                                                                id="paymentoptionsRadio1" checked>
                                                            <label class="form-check-label font-size-13"
                                                                for="paymentoptionsRadio1"><i
                                                                    class="fab fa-cc-mastercard me-1 font-size-20 align-top"></i>
                                                                Credit / Debit Card</label>
                                                        </div>
                                                    </div>
                                                </div>

                                                {{-- Stripe DOCS --}}
                                                <div class="stripe">
                                                    <label for="card-element"></label>
                                                    <div id="card-element">
                                                        <!-- A Stripe Element will be inserted here. -->
                                                    </div>
                                                    <!-- Used to display form errors. -->
                                                    <div id="card-errors" role="alert"></div>
                                                </div>

                                                <div class="text-end mt-4">
                                                    <button class="btn" type="submit" id="deliver"
                                                        style="background-color:#1A1A1A; color:#fff">
                                                        <i class="mdi mdi-truck-fast me-1"></i> Deliver
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>

                    {{-- --}}
                </div>
            </div>
        </div>
        <!-- end row -->
    </div>
</div>


{{-- JS from "stripe DOCS"--}}
<script src="https://js.stripe.com/v3/"></script>
<script type="text/javascript">
    // Create a Stripe client.
window.onload = function() { // 5.05m 162?
    // window.alert(env('STRIPE_API_KEY'));
        //Publishable key => pk_test_51M1qiJDRUJBpF05ymVjiWupEbgPznTBc7W9rAGLcf2GZJpRW0lc9R5cgt0Z8i1ZDjHfFpoOzjozZlsEMUIN7gI3E00ekojxtnZ
    var stripe = Stripe("pk_test_51M1qiJDRUJBpF05ymVjiWupEbgPznTBc7W9rAGLcf2GZJpRW0lc9R5cgt0Z8i1ZDjHfFpoOzjozZlsEMUIN7gI3E00ekojxtnZ");

    // Create an instance of Elements.
    var elements = stripe.elements();

    // Custom styling can be passed to options when creating an Element.
    // (Note that this demo uses a wider set of styles than the guide below.)
    var style = {
        base: {
            color: '#32325d',
            fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
            fontSmoothing: 'antialiased',
            fontSize: '16px',
            '::placeholder': {
                color: '#aab7c4'
            }
        },
        invalid: {
            color: '#fa755a',
            iconColor: '#fa755a'
        }
    };

    // Create an instance of the card Element.
    var card = elements.create('card', {style: style});

    // Add an instance of the card Element into the `card-element` <div>.
    card.mount('#card-element');

    // Handle real-time validation errors from the card Element.
    card.addEventListener('change', function(event) {
        var displayError = document.getElementById('card-errors');
        if (event.error) {
            displayError.textContent = event.error.message;
        } else {
            displayError.textContent = '';
        }
    });

    // Handle form submission.
    var form = document.getElementById('payment-form');
    form.addEventListener('submit', function(event) {
        event.preventDefault();

        var options={ 
        // 'name', 'address', 'city', 'state', 'postalcode' from <input id="..." >
            name:document.getElementById('name').value, 
            address_line1:document.getElementById('address').value,
            address_city:document.getElementById('city').value,
            address_state:document.getElementById('state').value,
            address_zip:document.getElementById('postalcode').value
        }

        stripe.createToken(card,options).then(function(result) {
            if (result.error) {
                // Inform the user if there was an error.
                var errorElement = document.getElementById('card-errors');
                errorElement.textContent = result.error.message;
            } else {
                $("#spinnerDiv").css({
                    visibility: "visible"
                });
                // Send the token to your server.
                stripeTokenHandler(result.token);
            }
        });
    });

    // Submit the form with the token ID.
    function stripeTokenHandler(token) {
        // Insert the token ID into the form so it gets submitted to the server
        var form = document.getElementById('payment-form');
        var hiddenInput = document.createElement('input');
        hiddenInput.setAttribute('type', 'hidden');
        hiddenInput.setAttribute('name', 'stripeToken'); // using in charge()??
        hiddenInput.setAttribute('value', token.id);
        form.appendChild(hiddenInput);

        // Submit the form
        form.submit();
    }

}
</script>

@endsection