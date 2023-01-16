<x-loading-indicatore />
@extends('layouts.app')

@section('title') Our supplier @endsection
<style>
    @media (min-width: 768px) and (max-width: 992px) {
        .display {
            margin-top: 60px !important;
        }

        .change-position {
            position: relative;
            top: 40px;
        }
    }

    @media (max-width: 768px) {

        .card-aside-img3 {
            margin-left: auto;
            margin-right: auto;
        }
    }

    @media (min-width: 992px) {

        .card-aside-img3 {
            position: relative;
            left: 30%;
            top: 10%;
        }

        .change-position {
            position: relative;
            top: 75px;
        }

    }

    }
</style>
@section('content')
@include('navLayout.navbar')
<div class="container">
    <div>
        <div class="jumbotron mt-5" style="max-width:400px; margin-right:auto; margin-left:auto;">
            <h3 class="fontStyleHint2" style=" font-family:Marlina; font-size:20px">OUR SUPPLIER</h3>
        </div>
    </div>
    @foreach($stores as $store)

    <div class="row justify-content-center display">
        <div class="col-md-6 ">
            <a href="{{route('all.product',[$store->slug])}}">
                <img src="{{ Storage::url($store->image) }}" class="card-aside-img card-aside-img3 "
                    style=" height: 300px; display:block;" /></a>
        </div>
        <div class="col-md-6 change-position">
            <section class=" p-5 margin" style="padding-right: 18px !important; max-width: 472px;">

                {{-- Name --}}
                <h2 class="title mb-3">
                    <b style="font-weight: 600 !important;">{{ $store->name }} </b>
                </h2>
                {{-- DESCRIPTION --}}
                <p>{!! $store->description !!}</p>

            </section>
        </div>
        <hr style=" border: 0;
                        height: 1px;
                        background: #333;
                        background-image: linear-gradient(to right, #ccc, #333, #ccc);">
    </div>
    @endforeach

</div>
@endsection