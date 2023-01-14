@extends('admin.layouts.main')

@section('title') Update product @endsection

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
            <h4 class="mb-sm-0 font-size-18">Update Product</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Product</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="row justify-content-center">

    <div class="col-lg-10">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('product.update', [$product->id]) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    {!! Toastr::message() !!}

                    <!-- Name -->
                    <div class="mb-3">
                        <label for="name">Name <span style="color:#ef5b69">  *</span></label>
                        <input id="name" name="name" type="text"
                            class="form-control @error('name') is-invalid @enderror" aria-describedby=""
                            value="{{ $product->name }}">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="row">

                        <!-- Image -->
                        <div class="mb-3 col-12">
                            <label>Choose Image <span style="color:#ef5b69">  *</span></label>
                            <div class="custom-file">
                                <label for="customFile" class="custom-file-label">Choose Image</label>
                                <input id="customFile" name="image" type="file"
                                    class="custom-file-input @error('image') is-invalid @enderror  bg-color-transparent">

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
                            <img id="img" src="{{Storage::url($product->image) }}" style="width:6rem; height:7rem">
                        </div>
                    </div>

                    <!-- Price -->
                    <div class="mb-3">
                        <label for="price">Price <span style="color:#ef5b69">  *</span></label>
                        <input id="price" name="price" type="text"
                            class="form-control @error('price') is-invalid @enderror" aria-describedby=""
                            value="{{ $product->price }}">
                        @error('price')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="row">

                        <!-- Description -->
                        <div class="mb-3 col-sm-6">
                            <label for="description">Description <span style="color:#ef5b69">  *</span></label>

                            <textarea name="description" id="summernote"
                                class="form-control @error('description') is-invalid @enderror"> {{$product->description }}</textarea>
                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <!-- Additional information -->
                        <div class="mb-3 col-sm-6">
                            <label for="additional_info">Additional information <span style="color:#ef5b69">  *</span></label>
                            <textarea id="summernote1" name="additional_info"
                                class="form-control @error('additional_info') is-invalid @enderror">{{ $product->additional_info  }}</textarea>
                            @error('additional_info')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                    </div>

                    <div class="row">
                        {{-- section --}}
                        <div class="mb-5 col-sm-6">
                            <div class="custom-file">
                                <label>Choose Section <span style="color:#ef5b69">  *</span></label>
                                <select name="section" class="form-control @error('section') is-invalid @enderror">
                                    <option  style="color:rgba(28, 161, 37, 0.992)" value="{{$product->section}}">
                                        {{$product->section}}
                                    </option>
                                    @foreach ( $sections as $key=>$section )
                                    <option {{ old('section') == $key ? 'selected' : ''}}
                                        value="{{$key}}">{{$section}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!-- Category -->
                        <div class="mb-3 col-sm-6">
                            <div class="custom-file">
                                <label>Choose Category <span style="color:#ef5b69">  *</span></label>
                                <select name="categoryId"
                                    class="form-control @error('categoryId') is-invalid @enderror">
                                    <option  style="color:rgba(28, 161, 37, 0.992)" value="{{$product->category->id}}">{{$product->category->name}}
                                    </option>

                                    @foreach ($categories as $category)
                                    <option {{old('category')==$category->id ? 'selected' : '' }} value="{{
                                        $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    </div>

                    <!-- Button -->
                    <div class="mb-3 mt-5">
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script type="text/javascript">
    $("document").ready(function() {

        $('.custom-file-input').on('change', function() {
            var input = this;
            if (input.files && input.files[0]) 
            {
                //  The FileReader function returns the file’s contents
                var reader = new FileReader();

                reader.onload = function (e) {
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