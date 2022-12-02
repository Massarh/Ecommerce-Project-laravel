@extends('admin.layouts.main')

@section('content')
<!-- Breadcrumb -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 ml-4 text-gray-800">Admin / Employee</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Admin / Employee</li> <!-- what is aria? Accessible Rich Internet Applications (ARIA) -->
    </ol>
</div>
<!-- Breadcrumb -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.create') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        {{-- choose user role --}}
                        <div class="row mb-3">
                            <label class='col-md-4 col-form-label text-md-end'>Choose User Role</label>
                            <div class='col-md-6'>
                            <select name="userRole"  class="form-control @error('userRole') is-invalid @enderror">
                                <option value="{{ old('userRole') }}">Select User Role</option>

                                    <option {{old('userRole')=="admin" ? 'selected' : '' }} value="admin">Admin</option>
                                    <option  {{old('userRole')=="employee" ? 'selected' : '' }} value="employee">Employee</option>

                                </select>
                                @error('userRole')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>

                        {{-- choose Store --}}
                        <div class="row mb-3">
                            <label class='col-md-4 col-form-label text-md-end'>Choose Store</label>
                            <div class='col-md-6'>
                                <select name="categoryId"  class="form-control @error('categoryId') is-invalid @enderror">
                                    <option value="{{ old('categoryId') }}">Select Store</option>
                                    @foreach (App\Models\Category::all() as $category)
                                        <option {{old('categoryId')== $category->id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
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
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
