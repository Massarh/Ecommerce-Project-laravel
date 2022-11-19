@extends('admin.layouts.main')

@section('content')
    <!-- Breadcrumb -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 ml-4 text-gray-800">Product Tables</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
            <li class="breadcrumb-item">Product</li> 
            <li class="breadcrumb-item active" aria-current="page">Product Tables</li>

            <!-- what is aria? 
                Accessible Rich Internet Applications (ARIA)-->
        </ol>
    </div>
    <!-- Breadcrumb -->

    <!-- Datatables -->
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold" style="color: #344f63">All Products</h6>
            </div>
            <div class="table-responsive p-3">
                <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                        <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Additional_info</th>
                            <th>Price</th>
                            <th>Category</th>
                            <th> </th>
                            <th> </th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @if(count($products)>0)
                            @foreach ($products as $product)
                                <tr>
                                    <td><img src="{{ Storage::url($product->image) }}" width="100"></td>
                                    <td>{{ $product->name }}</td>
                                    <td>{!! $product->description !!}</td> {{-- why use {!!  !!} ? --}}
                                    <td>{!! $product->additional_info !!}</td>
                                    <td>${{ $product->price }}</td>
                                    <td>{{ $product->category->name }}</td>
                                    <td>
                                        <a href="{{ route('product.edit', [$product->id]) }}" class="">
                                            <button class="btn" style="background-color:#198754; color:white;">Edit</button>
                                        </a>
                                    </td>
                                    <td>

                                    <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal{{$product->id}}">
                                            Delete 
                                        </button>
                                    {{-- Modals --}}
                                        <div class="modal fade" id="exampleModal{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <form action=" {{ route('product.destroy', [$product->id]) }} " method="POST">
                                                    @csrf
                                                    @method('DELETE') 
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to delete?</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-danger" data-dismiss="submit">Delete</button>
                                                        </div>
                                                    </div>
                                                </form> 
                                            </div>
                                        </div>
                                    </td>

                                </tr>
                            @endforeach
                        @else
                            <td>No any product</td>
                        @endif
                    </tbody>

                </table>
            </div>
        </div>
    </div>

@endsection