<x-loading-indicatore />
@extends('admin.layouts.main')

@section('title') @lang('create admin') @endsection

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
            <h4 class="mb-sm-0 font-size-18">Create Admin / Employee</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page" style="text-decoration-line: underline;">
                        Create Admin / Employee</li> 
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="row justify-content-center">

    @if (Session::has('message')) {{-- to show the message --}}
    <div class="alert alert-success">
        {{ Session::get('message') }}
    </div>
    @endif

    <div class="col-lg-10">
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('admin.create') }}">
                    @csrf

                    <!-- Name -->
                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-start">{{ __('Name') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="row mb-3">
                        <label for="email" class="col-md-4 col-form-label text-md-start">{{ __('Email Address') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <!-- Password -->
                    <div class="row mb-3">
                        <label for="password" class="col-md-4 col-form-label text-md-start">{{ __('Password') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="new-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <!-- Confirm Password -->
                    <div class="row mb-3">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-start">{{ __('Confirm
                            Password') }}</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control"
                                name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>

                    <!-- Choose User Role -->
                    <div class="row mb-3">
                        <label class='col-md-4 col-form-label text-md-start'>Choose User Role</label>
                        <div class='col-md-6'>
                            <select name="userRole" class="form-control @error('userRole') is-invalid @enderror">
                                <option value="{{ old('userRole') }}">Select User Role</option>

                                <option {{old('userRole')=="admin" ? 'selected' : '' }} value="admin">Admin</option>
                                <option {{old('userRole')=="employee" ? 'selected' : '' }} value="employee">Employee
                                </option>

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
                            <select name="categoryId" class="form-control @error('categoryId') is-invalid @enderror">
                                {{-- i think that it was error,check it please --}}
                                <option value="">Select Store</option>
                                @foreach ($categories as $category)
                                <option {{old('categoryId') == $category->id ? 'selected' : '' }} value="{{ $category->id
                                    }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('categoryId')
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