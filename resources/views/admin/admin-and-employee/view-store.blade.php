@extends('admin.layouts.main')

@section('content')
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Stores Table</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}"">Home</a></li>
            <li class=" breadcrumb-item">Store</li>
            <li class="breadcrumb-item active" aria-current="page">Store Tables</li>
        </ol>
    </div>

    <div class="row">
        <div class="col-lg-12 mb-4">
            <!-- Simple Tables -->
            <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold " style="color:  #344f63">All Stores </h6>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th>SN</th>
                                <th></th>

                                <th>Image</th>
                                <th></th>

                                <th>Name</th>
                                <th></th>
                                <th></th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @if(auth()->user()->user_role=='superadmin')

                                @if (count($categories)>0)
                                    @foreach ($categories as $key=>$category)
                                    <tr>
                                        <td><a href="#">{{ $key+1 }}</a></td>
                                        <td></td>

                                        <td><img src="{{ Storage::url($category->image) }}" alt=".." width="100"></td>
                                        <td></td>

                                        <td>{{ $category->name }}</td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <a href=" {{route('admin.view',[ $category->id])}} ">
                                                <button class="btn" style="background-color:#198754; color:white;">view admins/employees</button>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                @else
                                    <td>No Store created yet</td>
                                @endif

                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!--Row-->
</div>
@endsection