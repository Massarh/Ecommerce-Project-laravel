@extends('admin.layouts.main')

@section('title') View product @endsection

<style>
    @media (max-width: 1200px) {
        .description-style {
            min-width: 200px;
        }
    }
</style>
@section('content')
<!-- Breadcrumb -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Products Table</h4>
            @if(auth()->user()->user_role=='superadmin')
            {{-- add if --}}
            {{-- else part --}}
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{route('store.index')}}">Stores Table</a></li>
                <li class="breadcrumb-item"><a href="{{ url()->previous() }}">Categories Table</a></li>
                <li class="breadcrumb-item active" aria-current="page" style="text-decoration-line: underline;">Products
                    Table</li>
            </ol>
            {{-- end else part --}}

            @endif

            @if(auth()->user()->user_role=='admin' || auth()->user()->user_role=='employee')
            {{-- else part --}}
            @if( app('router')->getRoutes()->match(app('request')->create(URL::previous()))->getName() !=
            'category.getCategoryByStoreSlug')
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                <li class="breadcrumb-item">Product</li>
                <li class="breadcrumb-item active" aria-current="page" style="text-decoration-line: underline;">Products
                    Table</li>
            </ol>
            @endif
            {{-- end else part --}}


            @if( app('router')->getRoutes()->match(app('request')->create(URL::previous()))->getName() ==
            'category.getCategoryByStoreSlug')
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                <li class="breadcrumb-item">Category</li>
                <li class="breadcrumb-item"><a href="{{ url()->previous()}}">Categories Table</a></li>
                <li class="breadcrumb-item active" aria-current="page" style="text-decoration-line: underline;">Products
                    Table</li>
            </ol>
            @endif
            @endif

        </div>
    </div>
</div>
<!-- Breadcrumb -->

<div class="row">
    <div class="col-12">
        <div class="card">

            <div class="card-body">
                {!! Toastr::message() !!}
                <div class="table-responsive">
                    <table class="table align-middle table-nowrap" style="font-size: 13px">

                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Additional_info</th>
                                <th>Price</th>
                                @if(auth()->user()->user_role=='superadmin')
                                <th>Store</th>
                                @endif
                                @if(auth()->user()->user_role=='admin' || auth()->user()->user_role=='employee')
                                <th>Category</th>
                                @endif
                                @if(auth()->user()->user_role=='admin')
                                <th>Action</th>
                                <th> </th>
                                @endif
                            </tr>
                        </thead>

                        <tbody>
                            @if(count($products)>0)
                            @foreach ($products as $product)
                            <tr>
                                <td><img src="{{ Storage::url($product->image) }}" width="100"></td>
                                <td>{{ $product->name }}</td>
                                <td class="description-style">{!! $product->description !!}</td>
                                <td class="description-style">{!! $product->additional_info !!}</td>
                                <td>{{ $product->price }} JOD</td>
                                @if(auth()->user()->user_role=='superadmin')
                                <td>{{ $product->store->name }}</td>
                                @endif

                                @if(auth()->user()->user_role=='admin' || auth()->user()->user_role=='employee')
                                <td>{{ $product->category->name }}</td>
                                @endif

                                @if(auth()->user()->user_role=='admin')
                                <td>
                                    <a href="{{ route('product.edit', [$product->id]) }}" class="">
                                        <button class="bg-color-btn" style="color:#198754;"><i
                                                class="fas fa-edit"></i></button>
                                    </a>
                                </td>
                                <td>

                                    <!-- Button trigger modal -->
                                    <button class="bg-color-btn" type="button" data-toggle="modal"
                                        data-target="#exampleModal{{$product->id}}" style="color: #dc3545;border:none">
                                        <i class="mdi mdi-trash-can font-size-20"></i>
                                    </button>
                                    <!-- Modals -->
                                    <div class="modal fade" id="exampleModal{{$product->id}}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <form action=" {{ route('product.destroy', [$product->id]) }} "
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
                                @endif
                            </tr>

                            @endforeach
                            @else
                            <td>No products created yet</td>
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