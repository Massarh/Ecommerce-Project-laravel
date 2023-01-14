<x-loading-indicatore />
@extends('admin.layouts.main')

@section('title') Update admin @endsection

@section('css')
<!-- select2 css -->
<link href="{{ URL::asset('/assets/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />

<!-- dropzone css -->
<link href="{{ URL::asset('/assets/libs/dropzone/dropzone.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<!-- Breadcrumb -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Update Admin / Employee</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page" style="text-decoration-line: underline;">
                        Update Admin / Employee</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="row justify-content-center">

    <div class="col-lg-10">
        <div class="card">

            <div class="card-body">
                <form method="POST" action="{{ route('admin.update', [$adminOrEmployee->id]) }}">
                    @csrf
                    @method('PUT')
                    {!! Toastr::message() !!}

                    <!-- Name -->
                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-start">{{ __('Name') }} <span
                                style="color:#ef5b69"> *</span></label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ $adminOrEmployee->name }}" required autocomplete="name" autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="row mb-3">
                        <label for="email" class="col-md-4 col-form-label text-md-start">{{ __('Email Address') }} <span
                                style="color:#ef5b69"> *</span></label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ $adminOrEmployee->email }}" required autocomplete="email">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <!-- Choose User Role -->
                    <div class="row mb-3">
                        <label class='col-md-4 col-form-label text-md-start'>Choose User Role <span
                                style="color:#ef5b69"> *</span></label>
                        <div class='col-md-6'>
                            <select name="userRole" class="form-control @error('userRole') is-invalid @enderror">
                                <option style="color:rgba(28, 161, 37, 0.992)" value="{{$adminOrEmployee->user_role}}">
                                    {{$adminOrEmployee->user_role}}
                                </option>

                                @foreach ( $roles as $key=>$role )
                                <option {{ old('userRole')==$key ? 'selected' : '' }} value="{{$key}}">{{$role}}
                                </option>
                                @endforeach

                            </select>
                            @error('userRole')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <!-- choose Store -->
                    <div class="row mb-3">
                        <label class='col-md-4 col-form-label text-md-start'>Choose Store</label>
                        <div class='col-md-6'>
                            <select name="storeId" class="form-control @error('storeId') is-invalid @enderror">

                                @if(isset($adminOrEmployee->store))
                                <option value="{{$adminOrEmployee->store->id}}" style="color:rgba(28, 161, 37, 0.992)">
                                    <p>{{$adminOrEmployee->store->name}}</p>
                                </option>
                                @else
                                <option value="">
                                    <span>Choose store</span>
                                </option>
                                @endif

                                @foreach ($stores as $store)
                                <option {{ old('storeId')==$store->id ? 'selected' : '' }} value="{{
                                    $store->id}}">{{ $store->name }}</option>
                                @endforeach
                            </select>

                            @error('storeId')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>
                    </div>

                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn" style="background-color:  #232838; color: #fff">
                                Submit
                            </button>
                        </div>
                    </div>

                </form>

            </div>
        </div>

    </div>
</div>
<!-- end row -->

@endsection
@section('script')
<!-- select 2 plugin -->
<script src="{{ URL::asset('/assets/libs/select2/select2.min.js') }}"></script>

<!-- dropzone plugin -->
<script src="{{ URL::asset('/assets/libs/dropzone/dropzone.min.js') }}"></script>

<!-- init js -->
<script src="{{ URL::asset('/assets/js/pages/ecommerce-select2.init.js') }}"></script>
@endsection