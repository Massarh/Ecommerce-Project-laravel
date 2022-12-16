@extends('admin.layouts.main')

@section('title') @lang('create slider') @endsection

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
            <h4 class="mb-sm-0 font-size-18">Create Slider</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page" style="text-decoration-line: underline;">Create Slider</li> <!-- what is aria? Accessible Rich Internet Applications (ARIA) -->
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
                <form action="{{ route('slider.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Image -->
                    <div class="mb-3">
                        <label for="name">Choose Image</label>
                        <div class="custom-file">
                            <label for="customFile" class="custom-file-label">Choose file</label>
                            <input id="customFile" name="image" type="file" class="custom-file-input @error('image') is-invalid @enderror">
                            
                            <img src="" value="{{ old('image') }}">
                            @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <!-- Button -->
                    <div class="mb-3">
                        <button type="submit" class="btn"
                            style="background-color:  #232838;; color: #fff">Submit</button>
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