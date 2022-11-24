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
            <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card mb-6">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold" style="color: #344f63">Create Product</h6>
                    </div>
                    <div class="card-body">

                        {{-- Name --}}
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input id="name" name="name" type="text" class="form-control @error('name') is-invalid @enderror" aria-describedby="" placeholder="Enter name of product" value="{{ old('name') }}">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        {{-- Image --}}
                        <label>Choose image</label>
                        <div class="form-group">
                            <div class="custom-file">
                                <label for="customFile" class="custom-file-label">Choose file</label>
                                <input id="customFile" name="image" type="file" class="custom-file-input @error('image') is-invalid @enderror">                                 
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Price --}} 
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input id="price" name="price" type="number" class="form-control @error('price') is-invalid @enderror" aria-describedby="" value="{{ old('price') }}">
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
                                <textarea name="description" id="summernote" class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            {{-- Additional information --}}
                            <div class="form-group col-6">
                                <label for="additional_info">Additional information</label>
                                <textarea id="summernote1" name="additional_info" class="form-control @error('additional_info') is-invalid @enderror">{{ old('additional_info') }}</textarea>
                                @error('additional_info')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>

                        <div class="row">

                            {{-- Category_id --}}
                            <div class="form-group col-6">
                                <div class="custom-file">
                                    <label>Choose Category</label>
                                    <select name="category" class="form-control @error('category') is-invalid @enderror">
                                        <option value="">Select category</option>
                                        @foreach (App\Models\Category::all() as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Subcategory_id --}}
                            <div class="form-group col-6">
                                <div class="custom-file">
                                    <label>Choose Subcategory</label>
                                    <select name="subcategory" class="form-control @error('subcategory') is-invalid @enderror">
                                        <option value="">Select</option>
                                        
                                    </select>
                                </div>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script type="text/javascript">

        $("document").ready(function() {

            $('select[name="category"]').on('change', function() { // on change (بصير على) category 
                var catId = $(this).val(); //catId : category id
                // alert(catId);
                if(catId) {
                    $.ajax({

                        url:'/subcategories/'+catId,
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
    </script>

@endsection