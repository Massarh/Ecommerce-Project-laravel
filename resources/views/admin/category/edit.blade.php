@extends('admin.layouts.main')

@section('title') @lang('edit store') @endsection

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
            <h4 class="mb-sm-0 font-size-18">Update Store</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active" style="text-decoration-line: underline;">Store</li>
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
                <form action="{{ route('store.update', [$category->slug]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    {!! Toastr::message() !!}
                    
                    <div class="row">
                        <div class="col">

                            <!-- Name -->
                            <div class="mb-3">
                                <label for="name">Name</label>
                                <input id="name" name="name" type="text"
                                    class="form-control @error('name') is-invalid @enderror" aria-describedby=""
                                    placeholder="Enter name of store" value="{{ $category->name }}">

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <!-- Description -->
                            <div class="mb-3">
                                <label for="description">Description</label>
                                <textarea id="description" name="description"
                                    class="form-control @error('description') is-invalid @enderror">{{ $category->description }}</textarea>

                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="row">
                                <!-- Image -->
                                <div class="mb-3 col-12">
                                    <label for="name">Choose Image</label>
                                    <div class="custom-file">
                                        <label for="customFile" class="custom-file-label  bg-color-transparent">Choose Image</label>
                                        <input id="customFile" name="image" type="file"
                                            class="custom-file-input @error('image') is-invalid @enderror">
                                        
                                        @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                
                            </div>

                            <!-- Image -->
                            <div class="row">
                                <div class="mb-3 col-2 offset-sm-5">
                                    <img id="img" src="{{Storage::url($category->image) }}" style="width:6rem; height:7rem">
                                </div>
                            </div>

                            <!-- Button -->
                            <div class="mb-3 mt-5">
                                <button type="submit" class="btn"
                                    style="background-color:  #232838;; color: #fff;">Submit</button>
                            </div>
                        </div>

                    </div>

                </form>

            </div>
        </div>

    </div>
</div>
<!-- end row -->

@endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script type="text/javascript">
    $("document").ready(function() {
        $('.custom-file-input').on('change', function() {
            var input = this;
            var url  = $(this).val(); 
            var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
            if (input.files && input.files[0]) 
                    {
                        //  The FileReader function returns the file’s contents
                        var reader = new FileReader();
                        reader.onload = function (e) {
                            console.log(e);
                        $('#img').attr('src', e.target.result);
                        }
                    // The readAsDataURL method is used to read the contents of the specified File.
                    reader.readAsDataURL(input.files[0]);
                    }
                    
        });
    });
</script>

@section('script')
<!-- select 2 plugin -->
<script src="{{ URL::asset('/assets/libs/select2/select2.min.js') }}"></script>

<!-- dropzone plugin -->
<script src="{{ URL::asset('/assets/libs/dropzone/dropzone.min.js') }}"></script>

<!-- init js -->
<script src="{{ URL::asset('/assets/js/pages/ecommerce-select2.init.js') }}"></script>
@endsection