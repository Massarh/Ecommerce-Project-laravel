@include('navLayout.navbar')

@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach($orders as $order)
            <div class="card mb-3">
                <div class="card-body">
                    @foreach($order->orderItem as $item)
                        <span class="float-right">
                            <img src="{{ Storage::url($item['image']) }}" width="100">
                        </span>
                        <p>Name: {{$item['name']}}</p>
                        <p>Price:<span>JOD</span>{{$item['price']}}</p>
                        <p>Qty: {{$item['quantity']}}</p>
                    @endforeach
                <p>
                    <button type="button" class="btn btn-warning">
                        <span class="badge badge-light">
                            <span>JOD</span>{{$order->total_price}}
                        </span>
                    </button>
                </p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection