<x-loading-indicatore />
@extends('layouts.app')

@section('title') About us @endsection

@section('content')
@include('navLayout.navbar')
<div class="container">
    <div>
        <div class="jumbotron mt-5" style="max-width:400px; margin-right:auto; margin-left:auto; margin-top: 6rem !important;">
            <h3 class="fontStyleHint2" style=" font-family:Marlina; font-size:20px">ABOUT US</h3>
        </div>
    </div>

    <div class="justify-content-center d-flex">
        <div class="card" style="max-width: 90rem;">
            <div class="card-body mt-5" style="font-size:18px; border:0px">

                <p class="card-text p-4" >
                    Online sales is a rapidly growing element for many businesses. However, few
                    industries utilize ecommerce quite as much as the fashion industry. GO-PLAZA is a local fashion and
                    lifestyle e-commerce committed to making the beauty of fashion accessible to all. We use on-demand
                    manufacturing technology (goods are produced only when they're needed and in the quantities
                    required. ) to connect to our suppliers . Reducing inventory waste and enabling us to deliver a
                    variety of affordable products to customers in Jordan .
                </p>

            </div>
        </div>
        <P></P>
    </div>

</div>
@endsection