@extends('layouts.app')

@section('title')
@lang('Login')
@endsection

@section('css')
<!-- owl.carousel css -->
<link rel="stylesheet" href="{{ URL::asset('/assets/libs/owl.carousel/owl.carousel.min.css') }}">
@endsection

@section('body')

<body class="auth-body-bg">
    @endsection

    @section('content')

    <div>
        <div class="container-fluid p-0">
            <div class="row g-0">

                <div class="col-xl-9">
                    <div class="auth-full-bg pt-lg-5 p-4">
                        <div class="w-100">
                            <div class="bg-overlay" style="background-color: #1A1A1A"></div>
                            <div class="d-flex h-100 flex-column">

                                <div class="p-4 mt-auto">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-7">
                                            <div class="text-center">

                                                <h4 class="mb-3" style="color: #fff"><i
                                                        class="bx bxs-quote-alt-left text-black h1 align-middle me-3"></i><span
                                                        class="text-black">1k</span>+ Satisfiable item</h4>

                                                <div dir="ltr" style="color: #fff">
                                                    <div class="owl-carousel owl-theme auth-review-carousel"
                                                        id="auth-review-carousel">
                                                        <div class="item">
                                                            <div class="py-3">
                                                                <p class="font-size-16 mb-4">" why multiple accounts on
                                                                    different websites when I can only use one to buy
                                                                    any thing from different places . "</p>

                                                                <div>
                                                                    <p class="font-size-14 mb-0">- Plaza-team</p>
                                                                </div>
                                                            </div>

                                                        </div>

                                                        <div class="item">
                                                            <div class="py-3">
                                                                <p class="font-size-16 mb-4">" why to create a separate
                                                                    website , and hire new employees when , there exists
                                                                    a ready platform called plaza ? "</p>

                                                                <div>
                                                                    <p class="font-size-14 mb-0">- Plaza-team</p>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col -->

                <div class="col-xl-3">
                    <div class="auth-full-page-content p-md-5 p-4">
                        <div class="w-100">

                            <div class="d-flex flex-column h-100">
                                <div class="mb-4 mb-md-5">
                                    <div class="d-block auth-logo">
                                        <img src="{{ URL::asset('/logo/logo.jpeg') }}" alt="" height="45">
                                        <img src="{{ URL::asset('/logo/goplaza.jpeg') }}" alt="" height="60">
                                    </div>
                                </div>
                                <div class="my-auto">

                                    <div>
                                        <h5 style="color: #1A1A1A">Welcome Back !</h5>
                                        <p class="text-muted">Sign in to continue to Go-plaza.</p>
                                    </div>

                                    <div class="mt-4">
                                        <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="email" class="form-label">{{ __('Email') }}</label>
                                                <input name="email" type="email"
                                                    class="form-control @error('email') is-invalid @enderror"
                                                    value="{{ old('email') }}" id="email" placeholder="Enter Email"
                                                    autocomplete="email" autofocus>
                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <div class="float-end">
                                                    @if (Route::has('password.request'))
                                                    <a href="{{ route('password.request') }}" class="text-muted">Forgot
                                                        password?</a>
                                                    @endif
                                                </div>

                                                <label class="form-label">{{ __('Password') }}</label>
                                                <div
                                                    class="input-group auth-pass-inputgroup @error('password') is-invalid @enderror">
                                                    <input type="password" name="password"
                                                        class="form-control  @error('password') is-invalid @enderror"
                                                        id="userpassword" placeholder="Enter password"
                                                        aria-label="Password" aria-describedby="password-addon">
                                                    <button class="btn btn-light " type="button" id="password-addon"><i
                                                            class="mdi mdi-eye-outline"></i></button>
                                                    @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="remember" {{
                                                    old('remember') ? 'checked' : '' }}>
                                                <label class="form-check-label" for="remember">
                                                    Remember me
                                                </label>
                                            </div>

                                            <div class="mt-3 d-grid">
                                                <button class="btn waves-effect waves-light"
                                                    style="background-color: #1A1A1A; color: #fff" type="submit">Log
                                                    In</button>
                                            </div>

                                            {{-- <div class="mt-4 text-center">
                                                <h5 class="font-size-14 mb-3">Sign in with</h5>

                                                <ul class="list-inline">
                                                    <li class="list-inline-item">
                                                        <a href="#"
                                                            class="social-list-item bg-primary text-white border-primary">
                                                            <i class="mdi mdi-facebook"></i>
                                                        </a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="#"
                                                            class="social-list-item bg-info text-white border-info">
                                                            <i class="mdi mdi-twitter"></i>
                                                        </a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="#"
                                                            class="social-list-item bg-danger text-white border-danger">
                                                            <i class="mdi mdi-google"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div> --}}
                                        </form>
                                        <div class="mt-5 text-center">
                                            <p>Don't have an account ? <a href="{{ url('register') }}"
                                                    class="fw-medium text-primary"> Signup now </a> </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-4 mt-md-5 text-center">
                                    <p class="mb-0">© <script>
                                            document.write(new Date().getFullYear())
                                        </script> Go-plaza. Created with <i class="mdi mdi-heart text-danger"></i> by
                                        plaza-team</p>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container-fluid -->
    </div>

    @endsection

    @section('script')
    <!-- owl.carousel js -->
    <script src="{{ URL::asset('/assets/libs/owl.carousel/owl.carousel.min.js') }}"></script>
    <!-- auth-2-carousel init -->
    <script src="{{ URL::asset('/assets/js/pages/auth-2-carousel.init.js') }}"></script>
    @endsection