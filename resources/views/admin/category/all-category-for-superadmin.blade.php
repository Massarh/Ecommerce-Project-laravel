@extends('admin.layouts.main')

@section('title') @lang('Category') @endsection

@section('content')
<!-- Breadcrumb -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Categories Table</h4>

            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                <li class="breadcrumb-item">Category</li>
                <li class="breadcrumb-item active" style="text-decoration-line: underline;">Categories Table</li>
            </ol>


        </div>
    </div>
</div>
<!-- Breadcrumb -->

<div class="row">
    <div class="col-12">
        {!! Toastr::message() !!}
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

                <div class="table-responsive">
                    <table class="table align-middle table-nowrap">
                        <thead>
                            <tr>
                                <th>SN</th>
                                <th>Name</th>
                                <th>Action</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                         <tbody>
                            <!-- Admin & Employee -->
                            @if (count($categories)>0)
                            @foreach ($categories as $key=>$category)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $category->name }}</td>
                                 <!-- section Button-->
                                 <td> 
                                    <a href=" {{route('product.getProductByCategorySlug',[$category->slug])}}">
                                        <button class="btn" style="background-color: #232838; color:white; padding: 6px">product</button>
                                    </a>
                                </td>

                                <!-- Button Edit -->
                                <td>
                                    <a href=" {{route('category.edit', [$category->slug])}} ">
                                        <button class="bg-color-btn" style="color:#198754;"><i class="fas fa-edit"></i></button>
                                    </a>
                                </td>

                                <!-- Button Delete -->
                                <td>
                                    <!-- Button trigger modal -->
                                    <button type="button" data-toggle="modal" class="bg-color-btn"
                                        data-target="#exampleModal{{$category->id}}"
                                        style="color: #dc3545;border:none">
                                        <i class="mdi mdi-trash-can font-size-20"></i>
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal{{$category->id}}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <form action=" {{ route('category.destroy', [$category->id]) }} "
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Are you sure you
                                                            want to delete?</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-danger"
                                                            data-dismiss="submit">Delete</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                                <!-- Button Delete -->

                            </tr>

                            @endforeach
                            @else
                            <td>No Store created yet</td>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end row -->
@endsection



