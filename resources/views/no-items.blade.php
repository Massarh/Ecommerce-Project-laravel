@extends('layouts.app')

@section('content')

<div class="account-pages  pt-5" style="">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="text-center mb-5">
                    {{-- <h1 class="display-2 fw-medium">4<i class="bx bx-buoy bx-spin text-primary display-3"></i>4</h1> --}}
                    <h4 class="text-uppercase">No Items Yet</h4>

                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8 col-xl-6">
                <div>
                    <img src="{{ URL::asset('/assets/images/error-img.png') }}" alt="" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</div>

@endsection