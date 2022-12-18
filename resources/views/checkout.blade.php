<x-loading-indicatore />
@include('navLayout.navbar')

@extends('layouts.app')

@section('title') @lang('Checkout') @endsection

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

@section('content')
<div class="row mt-4">
    <div class="col-sm-6">
        <a href="{{url()->previous()}}" class="btn text-muted d-none d-sm-inline-block btn-link">
            <i class="mdi mdi-arrow-left me-1"></i> Back to Shopping Bag </a>
    </div> <!-- end col -->
    
</div> <!-- end row -->
<div class="checkout-tabs">
    <div class="row justify-content-center">

        <div class="col-xl-10 col-sm-9">
            <div class="card">
                <div class="card-body" style="border: 0 !important; box-shadow: 1px 1px 1px 1px #e4e4e4">

                    {{-- Order Summary class="tab-pane fade"--}}
                    <div id="v-pills-confir" role="tabpanel" aria-labelledby="v-pills-confir-tab">
                        <div class="card shadow-none mb-0">
                            <div class="card-body" style="border:0">
                                <h4 class="card-title mb-4">Order Summary</h4>

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
                                                        title="product-img" class="avatar-md" style="width: 70px ;height:103px">
                                                        
                                                </th>
                                                <td>{{$product['name']}}</td>
                                                <td>{{ $product['qty'] }}</td>
                                                <td>${{ $product['price']*$product['qty'] }}</td>

                                            </tr>
                                            @endforeach
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td>
                                                    <h6 class="m-0 ">Total Price: </h6>
                                                </td>
                                                <td style="font-weight: 500;">
                                                    ${{$cart->totalPrice}}
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
                                            <h4 class="card-title">Delivery information</h4>
                                            <p class="card-title-desc">Fill all information below</p>

                                            <form action="/charge" method="POST" id="payment-form">
                                                @csrf

                                                <!-- Name -->
                                                <div class="form-group row mb-4">
                                                    <label for="name" class="col-md-2 col-form-label">Name</label>
                                                    <div class="col-md-10">
                                                        <input type="text" name="name" id="name" class="form-control"
                                                            required value="{{auth()->user()->name}}"
                                                            placeholder="Enter your name">
                                                    </div>
                                                </div>

                                                <!-- Address -->
                                                <div class="form-group row mb-4">
                                                    <label for="address" class="col-md-2 col-form-label">Address</label>
                                                    <div class="col-md-10">
                                                        <input type="text" name="address" id="address"
                                                            class="form-control" placeholder="Enter your address"
                                                            required>
                                                    </div>
                                                </div>

                                                <!-- City -->
                                                <div class="form-group row mb-4">
                                                    <label for="city" class="col-md-2 col-form-label">City</label>
                                                    <div class="col-md-10">
                                                        <input type="text" name="city" id="city" class="form-control"
                                                            placeholder="Enter your city" required>
                                                    </div>
                                                </div>

                                                <!-- State -->
                                                <div class="form-group row mb-4">
                                                    <label for="state" class="col-md-2 col-form-label">State</label>
                                                    <div class="col-md-10">
                                                        <input type="text" name="state" id="state" class="form-control"
                                                            placeholder="Enter your state" required>
                                                    </div>
                                                </div>

                                                <!-- Postal code -->
                                                <div class="form-group row mb-4">
                                                    <label for="postalcode" class="col-md-2 col-form-label">Postal
                                                        code</label>
                                                    <div class="col-md-10">
                                                        <input type="text" name="postalcode" id="postalcode"
                                                            class="form-control" placeholder="Enter your postalcode"
                                                            required>
                                                    </div>
                                                </div>

                                                <input type="hidden" name="amount" value="{{$amount}}">

                                                {{-- Payment information --}}
                                                <div class="mt-5" id="v-pills-payment" role="tabpanel"
                                                    aria-labelledby="v-pills-payment-tab">
                                                    <h4 class="card-title">Payment information</h4>
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
                                                    <button class="btn" type="submit"
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


{{--  --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script type="text/javascript">
    $("document").ready(function() {

            $('input[name="paymentoptionsRadio"]').on('change', function() { 
                var redioValue = $(this).val(); 

                // const boxes = document.getElementsByClassName("stripe");
                // $(boxes[0]).toggle();
                // console.log(boxes[0])
            });
        });
</script>

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

        var options={ // 7:00m ?
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