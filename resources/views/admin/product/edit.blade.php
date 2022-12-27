@extends('admin.layouts.main')

@section('title') @lang('update product') @endsection

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
                    <!-- what is aria? Accessible Rich Internet Applications (ARIA) -->
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
                <form action="{{ route('product.update', [$product->id]) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    {!! Toastr::message() !!}

                    <!-- Name -->
                    <div class="mb-3">
                        <label for="name">Name</label>
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
                        <div class="mb-1 ">
                            <label>Choose image</label>
                            <div class="custom-file">
                                <label for="customFile" class="custom-file-label">Choose file</label>
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
                            <img id="img" src="{{Storage::url($product->image) }}" style="width:5rem; height:7rem">
                        </div>
                    </div>

                    <!-- Price -->
                    <div class="mb-3">
                        <label for="price">Price</label>
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
                            <label for="description">Description</label>

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
                            <label for="additional_info">Additional information</label>
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
                        <!-- Section -->
                        <?php $subcategories = App\Models\Category::find(auth()->user()->category_id)->subcategory()->get() ?>

                        <div class="mb-3 col">
                            <div class="custom-file">
                                <label>Choose Section</label>
                                <select name="subcategory"
                                    class="form-control @error('subcategory') is-invalid @enderror">
                                    <option value="{{$product->subcategory->id}}">{{$product->subcategory->name}}
                                    </option>

                                    @foreach ($subcategories as $subcategory)
                                    <option {{old('subcategory')==$subcategory->id ? 'selected' : '' }} value="{{
                                        $subcategory->id }}">{{ $subcategory->name }}</option>
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
            var url  = $(this).val(); 
            var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
            if (input.files && input.files[0]&& (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")) 
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
                    else
                    {
                        //you must put a photo in public
                    $('#img').attr('src', '/assets/no_preview.png');
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