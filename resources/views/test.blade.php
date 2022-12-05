@extends('layouts.app')

@section('content')
{{-- dynamic Slider --}}
<?php $sliders = App\Models\Slider::get()?>
<div class="video-home" >
    <div style="margin-top: 0px" id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            @foreach ($sliders as $key => $slider)
                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                    <img src="{{ Storage::url($slider->image) }}" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <b>
                            <h1 style="color: rgb(255, 255, 255) ; font-size: 50px;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">We are so happy to see you here</h1>
                        </b>
                        <h4 >beauty, clarity, functionality and sustainability.</h4>
                    </div>
                </div>
            @endforeach

        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
{{-- slider --}}
{{-- <div class="overlay"></div> --}}
<span class="absolute top-1 w-full" style="position: absolute">
    <span id="nav">

        <div class="navbar  nav-txt">
            <a href="/">
                <span>
                    Plaza
                </span>
                <span class=" text-white  logo">
                    Guide Book
                </span>
            </a>

            <div class="flex-none hidden px-2 mx-2 lg:flex">
                <div class="flex items-stretch">
                    <a>
                        <span class="btn btn-ghost btn-sm text-nav">
                            Become a guide
                        </span>
                    </a>

                    <a>
                        <span class="btn btn-ghost btn-sm text-nav">Signin</span>
                    </a>

                    <a>
                        <span class="btn btn-ghost btn-sm text-nav">
                            My Profile
                        </span>
                    </a>

                    <a>
                        <span class="btn btn-ghost btn-sm text-nav">
                            My Profile
                        </span>
                    </a>
                    <a class="btn btn-ghost btn-sm rounded-btn">
                        massarh
                    </a>

                </div>
            </div>
        </div>
    </span>
</span>

@endsection