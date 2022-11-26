@extends('admin.layouts.main')

@section('content')
    <!-- Container Fluid-->
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Store Order Tables</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}"">Home</a></li>
            <li class="breadcrumb-item">Store Order</li>
            <li class="breadcrumb-item active" aria-current="page">Store Order Tables</li>
        </ol>
        </div>
        <div class="row">
        <div class="col-lg-12 mb-4">
            <!-- Simple Tables -->
            <div class="card">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold " style="color:  #344f63">All Order </h6>
            </div>
            <div class="table-responsive">
                <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                        <tr>
                            <th>SN</th>
                            <th>Store Name</th>
                            <th>Email</th>
                            <th>View</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($categories)>0)
                            @foreach ($categories as $key=>$category)
                                <tr>
                                    <td><a href="#">{{ $key+1 }}</a></td> 
                                    {{-- relationship between category and User --}}
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->user[0]->email }}</td> 
                                    <td><a href="{{route('item.order', [$category->id])}}"> <button class="btn btn-info">View Order Items</button>
                                    </a></td> 
                                </tr>
                            @endforeach
                        @else 
                            <td>No any orders to show</td>
                        @endif
                    </tbody>
                </table>
            </div>
            <div class="card-footer"></div>
            </div>
        </div>
        </div>
        <!--Row-->
    </div>
    <!---Container Fluid-->
    
@endsection