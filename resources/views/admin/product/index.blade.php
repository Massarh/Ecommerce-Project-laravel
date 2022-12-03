@extends('admin.layouts.main')

@section('content')
    <!-- Breadcrumb -->
    
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 ml-4 text-gray-800">Products Table</h1>
        @if(auth()->user()->user_role=='admin' || auth()->user()->user_role=='employee')
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
            <li class="breadcrumb-item">Product</li> 
            <li class="breadcrumb-item active" aria-current="page" style="text-decoration-line: underline;">Products Table</li>
        </ol>
        @endif

        @if(auth()->user()->user_role=='superadmin')
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('store.index')}}">Stores Table</a></li> 
            <li class="breadcrumb-item"><a href="{{ url()->previous() }}">Sections Table</a></li> 
            <li class="breadcrumb-item active" aria-current="page" style="text-decoration-line: underline;">Products Table</li>
        </ol>
        @endif
    </div>
    <!-- Breadcrumb -->

    <!-- Datatables -->
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                @if(auth()->user()->user_role=='superadmin')
                <h6 class="m-0 font-weight-bold" style="color:  #344f63">All {{$products[0]->category->name}} Products </h6>
                @endif

                @if(auth()->user()->user_role=='admin' || auth()->user()->user_role=='employee')
                <h6 class="m-0 font-weight-bold" style="color: #344f63">All Products</h6>
                @endif
            </div>
            <div class="table-responsive p-3">
                <!-- id="dataTable" its show product number -->
                <table class="table align-items-center table-flush" id="dataTable"> 
                    <thead class="thead-light">
                        <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Additional_info</th>
                            <th>Price</th>
                            <th>Store</th>
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
                                    <td>{!! $product->description !!}</td>
                                    <td>{!! $product->additional_info !!}</td>
                                    <td>${{ $product->price }}</td>
                                    <td>{{ $product->category->name }}</td>

                                    @if(auth()->user()->user_role=='admin')
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
                                    @endif
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