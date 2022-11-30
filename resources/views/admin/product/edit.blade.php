@extends('admin.layouts.main')

@section('content')
    <!-- Breadcrumb -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 ml-4 text-gray-800">Product</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Product</li> <!-- what is aria? Accessible Rich Internet Applications (ARIA) -->
        </ol>
    </div>
    <!-- Breadcrumb -->

    <div class="row justify-content-center">

        @if (Session::has('message')) {{-- to show the message --}}
            <div class="alert alert-success">
                {{ Session::get('message') }}
            </div>
        @endif

        <div class="col-lg-10">
            <form action="{{ route('product.update', [$product->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card mb-6">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold" style="color: #344f63">Update Product</h6>
                    </div>
                    <div class="card-body">

                        {{-- Name --}}
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input id="name" name="name" type="text" class="form-control @error('name') is-invalid @enderror" aria-describedby="" value="{{ $product->name }}">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        {{-- Image --}}
                        <div class="form-group">
                            <label>Choose image</label> 
                            <div class="custom-file">
                                <label for="customFile" class="custom-file-label">Choose file</label>
                                <input id="customFile" name="image" type="file" class="custom-file-input @error('image') is-invalid @enderror">
                                <center>
                                    <img src="{{ Storage::url($product->image) }}" width="100">
                                </center>
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <br><br>  {{-- css لازم اشيلهم واعمل المسافات بـ --}}
                        {{-- Price --}} 
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input id="price" name="price" type="text" class="form-control @error('price') is-invalid @enderror" aria-describedby="" value="{{ $product->price }}">
                            @error('price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="row">
                            {{-- Description --}}
                            <div class="form-group col-6">
                                <label for="description">Description</label>
                                <textarea name="description" id="summernote" class="form-control @error('description') is-invalid @enderror">{!! $product->description !!}
                                </textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            {{-- Additional information --}}
                            <div class="form-group col-6">
                                <label for="additional_info">Additional information</label>
                                <textarea id="summernote1" name="additional_info" class="form-control @error('additional_info') is-invalid @enderror">{!! $product->additional_info !!}
                                </textarea>
                                @error('additional_info')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            {{-- Store [Category_id] --}} 
                            <?php $category = App\Models\Category::find(auth()->user()->category_id) ?>

                            <div class="form-group col-6">
                                <label for="stroeName">Your Store</label>
                                <input id="category" name="category" type="text"
                                    class="form-control @error('category') is-invalid @enderror" aria-describedby=""
                                    value="{{$category->name}}" readonly>

                                @error('category')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            {{-- Section [Subcategory_id] --}}
                            <?php $subcategories = App\Models\Subcategory::where('category_id', auth()->user()->category_id)->get() ?>

                            <div class="form-group col-6">
                                <div class="custom-file">
                                    <label>Choose Section</label>
                                    <select name="subcategory" class="form-control @error('subcategory') is-invalid @enderror">
                                        <option value="">Select</option>

                                        @foreach ($subcategories as $subcategory)
                                        <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        {{-- Submit button --}}
                        <button type="submit" class="btn btn-primary" style="background-color: #344f63">Submit</button>

                    </div>
                </div>
            </form>
        </div>

    </div>

    {{--To associate a category-field and a subcategory --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script type="text/javascript">

        $("document").ready(function() {

            $('select[name="category"]').on('change', function() {
                var catId = $(this).val(); //catId : category id
                // alert(catId);
                if(catId) {
                    $.ajax({

                        url:'/sections/'+catId,
                        type: "GET",
                        dataType: "json",
                        success:function(data) {
                            // alert(data) // 127v-13m
                            $('select[name="subcategory"]').empty();
                            $.each(data, function(key, value){ //key is a subcategory id, value is a  subcategory name 
                            $('select[name="subcategory"]').append('<option value=" '+key+'">'+value+'</option>');
                                
                            }) 
                        }

                    })
                } else{
                    $('select[name="subcategory"]').empty();
                }
            });
        });
    </script> --}}

@endsection