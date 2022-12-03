@extends('admin.layouts.main')

@section('content')
    <!-- Breadcrumb -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 ml-4 text-gray-800">Store</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page" style="text-decoration-line: underline;">Store</li> <!-- what is aria? Accessible Rich Internet Applications (ARIA) -->
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
            <form action="{{ route('store.update', [$category->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card mb-6">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold" style="color:  #344f63">Update Store</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input id="name" name="name" type="text" class="form-control @error('name') is-invalid @enderror" aria-describedby="" value="{{ $category->name }}">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror">{{ $category->description }}</textarea>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="custom-file">
                                <label for="customFile" class="custom-file-label">Choose file</label>
                                <input id="customFile" name="image" type="file" class="custom-file-input @error('image') is-invalid @enderror">
                                <br>
                                <img src=" {{ Storage::url($category->image) }} " width="100">
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <br><br><br>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary m-20" style="background-color:  #344f63">Update</button>
                        </div>

                    </div>
                </div>
            </form>
        </div>

    </div>

@endsection