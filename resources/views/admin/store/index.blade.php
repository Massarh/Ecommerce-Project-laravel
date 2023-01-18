@extends('admin.layouts.main')

@section('title') View store @endsection

<style>
    @media (max-width: 1550px) {
        .description-style {
            min-width: 325px;
        }
    }
</style>

@section('content')
<!-- Breadcrumb -->
<div class="row">
    <div class="col-12">
        {!! Toastr::message() !!}
        
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            @if(auth()->user()->user_role=='superadmin')
            <h4 class="mb-sm-0 font-size-18">Stores Table</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active" style="text-decoration-line: underline;">Stores Table</li>
                </ol>
            </div>
            @endif

            @if(auth()->user()->user_role=='admin' || auth()->user()->user_role=='employee')
            <h4 class="mb-sm-0 font-size-18">Store Table</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active" style="text-decoration-line: underline;">Store Table</li>
                </ol>
            </div>
            @endif

        </div>
    </div>
</div>
<!-- Breadcrumb -->

<div class="row">
    <div class="col-12">
        <div class="card">
            
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table align-middle table-nowrap"  style="font-size: 13px">
                        <thead>
                            <tr>
                                @if(auth()->user()->user_role=='superadmin')
                                    <th>#</th>
                                @endif
                                <th>Image</th>
                                <th>Name</th>
                                <th>Description</th>
                                @if(auth()->user()->user_role=='superadmin')
                                    <th>Email</th>
                                @endif
                                @if(auth()->user()->user_role=='superadmin' || auth()->user()->user_role=='admin')
                                    <th>Action</th>
                                @endif
                                @if(auth()->user()->user_role=='superadmin')
                                    <th></th>
                                    <th></th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Admin & Employee -->
                            @if (auth()->user()->user_role=='admin'||auth()->user()->user_role=='employee')
                                @if ($store)
                                    <tr>
                                        <td><img src="{{ Storage::url($store->image) }}" alt=".." width="100"></td>
                                        <td>{{ $store->name }}</td>
                                        <td class="description-style">{{ $store->description }}</td>
                                        @if(auth()->user()->user_role=='admin')   
                                            <td> 
                                                <a href=" {{route('store.edit', [$store->slug])}} ">
                                                    <button class="bg-color-btn" style="color:#198754; "><i class="fas fa-edit"></i></button>
                                                </a>
                                            </td>
                                        @endif
                                    </tr>
                                        
                                @else 
                                    <td>No Store created yet</td>
                                @endif
                            @endif

                            <!-- Superadmin -->
                            @if(auth()->user()->user_role=='superadmin')
                                
                                @if (count($stores)>0)
                                    @foreach ($stores as $key=>$store) 
                                        <tr >
                                            <td>{{ $key+1 }}</td> 
                                            <td><img src="{{ Storage::url($store->image) }}" alt=".." width="100"></td>
                                            <td style="text-transform: uppercase">{{ $store->name }}</td>
                                            <td class="description-style">{{ $store->description }}</td>
                                            <td> {{App\Models\User::where('store_id', $store->id)->where('user_role', 'admin')->first()->email}} </td>
                                            
                                            <!-- category Button-->
                                            <td> 
                                                <a href=" {{route('category.getCategoryByStoreSlug',[$store->slug])}} ">
                                                    <button class="btn" style="background-color: #232838; color:white; padding: 6px">category</button>
                                                </a>
                                            </td>

                                            <!-- product Button-->
                                            <td> 
                                                <a href=" {{route('product.getProductByStoreSlug',[$store->slug])}} ">
                                                    <button class="btn" style="background-color: #232838; color:white; padding: 6px">products</button>
                                                </a>
                                            </td>

                                            <!-- Delete Button-->
                                            <td> 
                                                <!-- Button trigger modal -->
                                                <button class="bg-color-btn" type="button" data-toggle="modal" data-target="#exampleModal{{$store->id}}" style="color: #dc3545;border:none">
                                                    <i class="mdi mdi-trash-can font-size-20"></i> 
                                                </button>
                                                
                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModal{{$store->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <form action=" {{ route('store.destroy', [$store->slug]) }} " method="POST">
                                                            @csrf
                                                            @method('DELETE') 
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel" style="white-space: pre-wrap;">Are you sure you want to delete store? All the categories, products, employees and admins that related to {{$store->name}} store will be removed.</h5>
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
                                    <td>No store created yet</td>
                                @endif

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