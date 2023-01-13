@extends('admin.layouts.main')

@section('title') Update category @endsection

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
            <h4 class="mb-sm-0 font-size-18">Update Category</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active" style="text-decoration-line: underline;">Category</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="row justify-content-center">

    <div class="col-lg-10">
        <div class="card">

            @if(session()->has('status'))
                <div style="background-color:#ef5b69" class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="fas fa-exclamation-triangle pr-2"></i>
                    <strong>{{session()->get('status')}}</strong> 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="card-body">
                <form action="{{ route('category.update', [$oldCategory->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    {!! Toastr::message() !!}
                    
                    <div class="form-group mb-4 ">
                        <label for="">Choose Category</label>
                        <select name="categoryId" class="form-control @error('categoryId') is-invalid @enderror">
                            <option style="color:rgba(28, 161, 37, 0.992)" value="{{$oldCategory->id}}">{{$oldCategory->name}}      (current) </option>

                            @foreach($restCategories as $key=>$category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div> 

                    <!-- Button -->
                    <div class="mb-3">
                        <button type="submit" class="btn"
                            style="background-color:  #232838;; color: #fff">Update</button>
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