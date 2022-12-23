@extends('admin.layouts.main')

@section('title') @lang('update section') @endsection

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
            <h4 class="mb-sm-0 font-size-18">Update Section</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active" style="text-decoration-line: underline;">Section</li>
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
                <form action="{{ route('section.update', [$oldSubcategory->id]) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group mb-4 ">
                        <label for="">Choose Section</label>
                        <select name="subcategory" class="form-control @error('subcategory') is-invalid @enderror">
                            <option style="color:rgb(4, 249, 0)" value="{{$oldSubcategory->id}}">{{$oldSubcategory->name}}      (current) </option>

                            @foreach($restSubcategories as $key=>$subcategory)
                            <option value="{{$subcategory->id}}">{{$subcategory->name}}</option>
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