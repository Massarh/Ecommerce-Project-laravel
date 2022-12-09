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

    {{-- @component('components.breadcrumb')
        @slot('li_1') Ecommerce @endslot
        @slot('title') Checkout @endslot
    @endcomponent --}}

    <div class="checkout-tabs">
        <div class="row justify-content-center">
            
            <div class="col-xl-10 col-sm-9">
                <div class="card">
                    <div class="card-body" >

                        {{-- Order Summary class="tab-pane fade"--}}
                        <div  id="v-pills-confir" role="tabpanel"
                        aria-labelledby="v-pills-confir-tab">
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
                                                    <img
                                                        src="{{ Storage::url($product['image']) }}"
                                                        alt="product-img" title="product-img" class="avatar-md">
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

                        <div class="card-header">Checkout</div>
        <div class="card-body">
            {{-- {{ route('cart.charge') }} or /charge --}}
            <form action="/charge" method="POST" id="payment-form">
                @csrf
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" id="name" class="form-control" required="" value="{{auth()->user()->name}}" readonly>
                </div>
                
                <div class="form-group">
                    <label>Adress</label>
                    <input type="text" name="address" id="address" class="form-control" required="">
                </div>

                <div class="form-group">
                    <label>City</label>
                    <input type="text" name="city" id="city" class="form-control" required="">
                </div>

                <div class="form-group">
                    <label>State</label>
                    <input type="text" name="state" id="state" class="form-control" required="">
                </div>

                <div class="form-group">
                    <label>Postal code</label>
                    <input type="text" name="postalcode" id="postalcode" class="form-control" required="">
                </div>

                <input type="hidden" name="amount" value="{{$amount}}">
                
                {{-- Stripe DOCS --}}
                <div class="">
                    <label for="card-element">Credit or debit card</label>
                    <div id="card-element">
                    <!-- A Stripe Element will be inserted here. -->
                    </div>

                    <!-- Used to display form errors. -->
                    <div id="card-errors" role="alert"></div>
                </div>
    
                <button class="btn btn-primary mt-4" type="submit">Submit Payment</button>
            </form>
                </div> <!-- end row -->
            </div>
        </div>
    </div>
    <!-- end row -->

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

@section('script')
    <!-- select 2 plugin -->
    <script src="{{ URL::asset('/assets/libs/select2/select2.min.js') }}"></script>

    <!-- init js -->
    <script src="{{ URL::asset('/assets/js/pages/ecommerce-select2.init.js') }}"></script>
@endsection

