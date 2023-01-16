<x-loading-indicatore />
@extends('layouts.app')

@section('title') Register @endsection

@section('css')
<!-- owl.carousel css -->
<link rel="stylesheet" href="{{ URL::asset('/assets/libs/owl.carousel/owl.carousel.min.css') }}">
<link href="{{ URL::asset('/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet"
    type="text/css">
@endsection

<style>
    @media (min-width: 1200px){

        .auth-full-bg {
            min-height: 132vh;
        }

        .margin {
            margin-top: 170px!important;
        }
    }
</style>
    @section('content')

    <div>
        <div class="container-fluid p-0">
            <div class="row g-0">

                <div class="col-xl-9">
                    <div class="auth-full-bg pt-lg-5 p-4" style="background-color:#1A1A1A;">
                        <div class="w-100">
                            <div class="bg-overlay" ></div>
                            <div class="d-flex h-100 flex-column justify-content-center">

                                <div class="p-4 margin">
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
                    <div class="auth-full-page-content px-md-5 p-4">
                        <div class="w-100">

                            <div class="d-flex flex-column h-100">
                                <div class="mb-4 mb-md-5">
                                    <div class="d-block auth-logo">
                                        <img src="{{ URL::asset('logo/dark0.png')}}" alt="" height="60">

                                    </div>
                                </div>
                                <div class="my-auto">

                                    <div>
                                        <h5 style="color: #1A1A1A">Register account</h5>
                                        <p class="text-muted">Get your free account now.</p>
                                    </div>

                                    <div class="mt-4">
                                        <form method="POST" class="form-horizontal" action="{{ route('register') }}"
                                            enctype="multipart/form-data">
                                            @csrf
                                            {{-- Email --}}
                                            <div class="mb-3">
                                                <label for="useremail" class="form-label">Email</label>
                                                <input type="email"
                                                    class="form-control @error('email') is-invalid @enderror"
                                                    id="useremail" value="{{ old('email') }}" name="email"
                                                    placeholder="Enter email" autofocus required>
                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>

                                            {{-- Name --}}
                                            <div class="mb-3">
                                                <label for="username" class="form-label">Username</label>
                                                <input type="text"
                                                    class="form-control @error('name') is-invalid @enderror"
                                                    value="{{ old('name') }}" id="username" name="name" autofocus
                                                    required placeholder="Enter username">
                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>

                                            {{-- Password --}}
                                            <label class="form-label">{{ __('Password') }}</label>
                                            <div
                                                class=" mb-3 input-group auth-pass-inputgroup @error('password') is-invalid @enderror">
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

                                            <!-- Confirm Password -->
                                            <label for="password-confirm" >{{ __('Confirm Password') }}</label>

                                                <!-- Password -->
                                            <div class=" mb-3 input-group auth-pass-inputgroup @error('password-confirm') is-invalid @enderror">
                                                <input type="password" name="password_confirmation" required
                                                    class="form-control @error('password-confirm') is-invalid @enderror" id="password-confirm"
                                                    placeholder="Enter confirm password" aria-label="password-confirm" aria-describedby="password-addon">
                                                <button class="btn btn-light " type="button" id="password-confirm-addon"><i
                                                        class="mdi mdi-eye-outline"></i></button>
                                                @error('password-confirm')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>


                                            <div class="mt-4 d-grid">
                                                <button class="btn waves-effect waves-light" type="submit"
                                                    style="background-color: #1A1A1A; color:#fff;">Register</button>
                                            </div>

                                            <div class="mt-4 text-center">
                                                <p class="mb-0">By registering you agree to the Plaza Terms of Use</p>
                                            </div>
                                        </form>

                                        <div class="mt-3 text-center">
                                            <p>Already have an account ? <a href="{{ url('login') }}"
                                                    class="fw-medium text-primary"> Login</a> </p>
                                        </div>

                                        <div class="mt-5 text-center">
                                            <a href="/"><i class="fa-solid fa-house" style="font-size: 25px ;color:#1a1a1a;"></i></a>
                                            <div><a href="/" style="color: #1a1a1a;font-size:11px ; ">Explore Home page</a></div>
                                        </div>

                                    </div>
                                </div>

                                <div class="mt-4 mt-md-3 text-center">
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
    <script src="{{ URL::asset('/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <!-- owl.carousel js -->
    <script src="{{ URL::asset('/assets/libs/owl.carousel/owl.carousel.min.js') }}"></script>
    <!-- auth-2-carousel init -->
    <script src="{{ URL::asset('/assets/js/pages/auth-2-carousel.init.js') }}"></script>
    @endsection