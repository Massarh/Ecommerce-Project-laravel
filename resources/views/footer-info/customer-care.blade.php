<x-loading-indicatore />
@extends('layouts.app')

@section('title') Customer care @endsection

<style>
    @media (max-width: 768px) {

    .image-size {
        height: 300px;
        width: 300px;
        margin-left: 38px;
    }
    }
</style>

@section('content')
@include('navLayout.navbar')
<div class="container">
    <div>
        <div class="jumbotron mt-5"
            style="max-width:400px; margin-right:auto; margin-left:auto; margin-top: 6rem !important;">
            <h3 class="fontStyleHint2" style=" font-family:Marlina; font-size:20px">CUSTOMER CARE</h3>
        </div>
    </div>

    <div class="justify-content-center d-flex">
        <div class="card" style="max-width: 90rem;">
            <div class="card-body mt-5" style="font-size:18px; border:0px">

                <p class="card-text p-4">
                    For any questions don't hesitate to contact us on Instagram <a
                        href="https://www.instagram.com/go_plaza/" target="_blank"
                        style="text-decoration-line: underline !important; color: 
                        #7e7e7e">@ go_plaza</a>
                </p>
            </div>
            <div>
                <div class="mt-0" style="max-width:400px; margin-right:auto; margin-left:auto;">
                    <img class="image-size" src="{{ URL::asset('/logo/custome service.avif')}}" alt="image"
                        width="400" height="400">
                </div>
            </div>
        </div>
        <P></P>
    </div>

</div>
@endsection