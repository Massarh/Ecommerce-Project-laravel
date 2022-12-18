<x-loading-indicatore />
@extends('layouts.app')

@section('title')
@lang('Recover_Password')
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
                    <div class="auth-full-bg pt-lg-5 p-4" style="background-color: #1A1A1A">
                        <div class="w-100">
                            <div class="bg-overlay" ></div>
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
                                        <h5 style="color: #1A1A1A"> Reset Password</h5>
                                        <p class="text-muted">Re-Password with Go-plaza.</p>
                                    </div>

                                    <div class="mt-4">
                                        <form class="form-horizontal" method="POST"
                                            action="{{ route('password.update') }}">
                                            @csrf
                                            <input type="hidden" name="token" value="{{ $token }}">
                                            <div class="mb-3">
                                                <label for="useremail" class="form-label">Email</label>
                                                <input type="email"
                                                    class="form-control @error('email') is-invalid @enderror"
                                                    id="useremail" name="email" placeholder="Enter email"
                                                    value="{{ $email ?? old('email') }}" id="email">
                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <label for="userpassword">Password</label>
                                                <input type="password"
                                                    class="form-control @error('password') is-invalid @enderror"
                                                    name="password" id="userpassword" placeholder="Enter password">
                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <label for="userpassword">Confirm Password</label>
                                                <input id="password-confirm" type="password"
                                                    name="password_confirmation" class="form-control"
                                                    placeholder="Enter confirm password">
                                            </div>

                                            <div class="text-end">
                                                <button class="btn w-md waves-effect waves-light"
                                                    type="submit" style="background-color: #1A1A1A; color:#fff;">Reset</button>
                                            </div>

                                        </form>
                                        <div class="mt-5 text-center">
                                            <p>Remember It ? <a href="{{ url('login') }}"
                                                    class="font-weight-medium text-primary"> Sign In here</a> </p>
                                        </div>

                                        <div class="mt-5 text-center">
                                            <a href="/"><i class="fa-solid fa-house" style="font-size: 25px ;color:#1a1a1a;"></i></a>
                                            <div><a href="/" style="color: #1a1a1a;font-size:11px ; ">Explore Home page</a></div>
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