<x-loading-indicatore />
@include('navLayout.navbar')

@extends('layouts.app')
@section('title') Order items @endsection

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-md-10">
            <p style="font-weight: 600; font-size: 14px">order number # {{$order->id}}</p>
            <p style="font-weight: 600; font-size: 14px">Date & time : {{$order->created_at}}</p>

            <p style="font-weight: 700; font-size: 18px">Products</p>
            @foreach($orderItems as $item)
            <hr style="border-top: 1px solid rgb(189 189 189);">

            <div style="display: flex ; justify-content: space-between">
                <span class="float-right">
                    <img src="{{ Storage::url($item->image) }}" style="width:6rem; height:7rem;">
                </span>
                <div style="width:70%;max-width:300px; font-weight: 600; font-size: 14px;margin-left:10px">
                    <p>{{$item->name}}</p>
                    <p>Quantity: {{$item->quantity}}</p>
                    <p>Price: {{$item->price * $item->quantity}} <span>JOD</span></p>
                </div>
            </div>
            @endforeach
            <hr style="border-top: 3px solid #000;">

            <div
                style="display: flex; justify-content: space-between; margin-top: 16px;font-weight: 600; font-size: 18px">
                <p>Total price </p>

                <p style="width:70%;max-width:300px;">{{$order->total_price}} JOD </p>
            </div>
        </div>
    </div>
</div>

@endsection