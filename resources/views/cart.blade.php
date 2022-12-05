@include('navLayout.navbar')

@extends('layouts.app')

@section('content')

    <div class="container">
        @if($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger">{{$error}}</div>
            @endforeach
        @endif

        <table id="cart" class="table table-hover">
            <thead>
                
                <tr>
                    <th scope="col">#</th> {{--scope="col"??--}}
                    <th scope="col">Image</th>
                    <th scope="col">Product</th>
                    <th scope="col">Price</th>
                    <th scope="col">totalQuantity</th>
                    <th scope="col">Remove</th>
                </tr>
            </thead>
            <tbody>
                @if($cart)
                    {{-- Foreach To display product in cart --}}
                    @php $i=1 @endphp {{--i is Index--}}
                    @foreach($cart->items as $product)
                    <tr>
                        <th scope="row">{{$i++}}</th>
                        <td><img src="{{ Storage::url($product['image']) }}" width="100"></td>
                        <td>{{$product['name']}}</td>
                        <td>$ {{$product['price']}}</td>
                        <td>
                            <form action="{{route('cart.update', $product['id'])}}" method="POST">
                                @csrf
                                <input type="text" name="qty" value="{{ $product['qty'] }}">
                                <button class="btn btn-secondary btn-sm"><i class="fas fa-sync"></i>update</button>
                            </form>
                        </td>
                        <td>
                            <form action="{{route('cart.remove', $product['id'])}}" method="POST">
                                @csrf
                                <button class="btn btn-danger">Remove</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>	
            <hr>
            {{-- Footer --}}  
            <div class="card-footer">
                <a href="/">
                    <button class="btn btn-secondary">Continue Shopping</button>
                </a>
                <span style="margin-left:350px">Total Price: ${{$cart->totalPrice}}</span>{{--What is the alternative to using margin-left ??--}} 
                <a href="{{route('cart.checkout', $cart->totalPrice)}}">
                    <button class="btn btn-info float-right" style="background-color: #a6e9d5; margin-left:370px">Checkout</button> {{--  float-right?? --}}
                </a>
            </div>			
        </div>
        @else
            <td>No items in cart</td>
        @endif
@endsection