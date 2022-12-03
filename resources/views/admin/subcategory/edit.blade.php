@extends('admin.layouts.main')

@section('content')
    <!-- Breadcrumb -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 ml-4 text-gray-800">Section</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Section</li> <!-- what is aria? Accessible Rich Internet Applications (ARIA) -->
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
            <form action="{{ route('section.update', [$subcategory->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card mb-6">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold" style="color: #344f63">Update Section</h6>
                    </div>
                    {{-- Name --}}
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input id="name" name="name" type="text" class="form-control @error('name') is-invalid @enderror" aria-describedby="" value="{{ $subcategory->name }}">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        {{-- Store [Category_id] --}} 
                        <?php $category = App\Models\Category::find(auth()->user()->category_id) ?>

                        <div class="form-group">
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

                        <button type="submit" class="btn btn-primary" style="background-color:  #344f63">Update</button>

                    </div>
                </div>
            </form>
        </div>

    </div>

@endsection