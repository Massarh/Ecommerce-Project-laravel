<x-loading-indicatore />
@extends('layouts.app')

@section('content')
@include('navLayout.navbar')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            @foreach($orders as $order)
            <div class="card mb-3">
                <div class="card-body" style="border: 0px !important; background-color: #86868614; border-radius: 7px;">
                    <div style="display: flex ; justify-content: space-between">
                        <p>order number #{{$order->id}}</p>
                        <a href="{{route('orderItems', [$order->id])}}" style="color:#1a1a1a">Order Details <i class="mdi mdi-arrow-right me-1"></i> </a>
                    </div>
                    <p>Date & time : {{$order->created_at}}</p>
                    <p>Total price : {{$order->total_price}} JOD</p>
                    @foreach($order->orderItem as $item)
                    <span style="margin-right: 10px !important;">
                        <img src="{{ Storage::url($item['image']) }}" style="width:4rem; height:5rem;">
                    </span>
                    @endforeach
                    <hr style="border-top: 1px solid rgb(189 189 189);">
                    <p class="mt-3" style="font-weight: 700;">{{$order->orderItem->count()}} product(s)</p>

                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection