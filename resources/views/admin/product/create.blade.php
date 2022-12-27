@extends('admin.layouts.main')

@section('title') @lang('create product') @endsection

@section('css')
<!-- select2 css -->
<link href="{{ URL::asset('/assets/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />

<!-- dropzone css -->
<link href="{{ URL::asset('/assets/libs/dropzone/dropzone.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')

<style>
    .note-icon-caret:before {
        content: "";
    }
</style>


<!-- Breadcrumb -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Create Product</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">Product</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="row justify-content-center">

    <!-- to show the message -->
    @if (Session::has('message'))
    <div class="alert alert-success">
        {{ Session::get('message') }}
    </div>
    @endif

    <div class="col-lg-10">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    {!! Toastr::message() !!}

                    <!-- Name -->
                    <div class="mb-3">
                        <label for="name">Name</label>
                        <input id="name" name="name" type="text"
                            class="form-control @error('name') is-invalid @enderror" aria-describedby=""
                            placeholder="Enter name of product" value="{{ old('name') }}">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>


                    <!-- Image -->
                    <div class="mb-3">
                        <label>Choose image</label>
                        <div class="custom-file">
                            <label for="customFile" class="custom-file-label bg-color-transparent">Choose image</label>
                            <input id="customFile" name="image" type="file"
                                class="custom-file-input @error('image') is-invalid @enderror">
                            @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <!-- Price -->
                    <div class="mb-3">
                        <label for="price">Price</label>
                        <input id="price" name="price" type="text"
                            class="form-control @error('price') is-invalid @enderror" aria-describedby=""
                            value="{{ old('price') }}">
                        @error('price')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="row">

                        <!-- Description -->
                        <div class="mb-3 col-sm-6">
                            <label for="description">Description</label>
                            <textarea name="description" id="summernote"
                                class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <!-- Additional information -->
                        <div class="mb-3 col-sm-6">
                            <label for="additional_info">Additional information</label>
                            <textarea id="summernote1" name="additional_info"
                                class="form-control @error('additional_info') is-invalid @enderror">{{ old('additional_info') }}</textarea>
                            @error('additional_info')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                    </div>

                    <div class="row">

                        <!-- Section -->
                        <?php $subcategories = App\Models\Category::find(auth()->user()->category_id)->subcategory()->get() ?>

                        <div class="mb-3 col">
                            <div class="custom-file">
                                <label>Choose Section</label>
                                <select name="subcategory"
                                    class="form-control @error('subcategory') is-invalid @enderror">
                                    <option value="{{old('subcategory')}}">Select</option>

                                    @foreach ($subcategories as $subcategory)
                                    <option {{old('subcategory')==$subcategory->id ? 'selected' : '' }} value="{{
                                        $subcategory->id }}">{{ $subcategory->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    </div>

                    <!-- Button -->
                    <div class="mb-3">
                        <button type="submit" class="btn"
                            style="background-color:  #232838;; color: #fff">Submit</button>
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
@section('script')
<!-- select 2 plugin -->
<script src="{{ URL::asset('/assets/libs/select2/select2.min.js') }}"></script>

<!-- dropzone plugin -->
<script src="{{ URL::asset('/assets/libs/dropzone/dropzone.min.js') }}"></script>

<!-- init js -->
<script src="{{ URL::asset('/assets/js/pages/ecommerce-select2.init.js') }}"></script>
@endsection