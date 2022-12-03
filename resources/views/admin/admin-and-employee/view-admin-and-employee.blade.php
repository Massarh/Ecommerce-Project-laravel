@extends('admin.layouts.main')

@section('content')
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Admins & Employees Table</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
            <li class=" breadcrumb-item"><a href="{{route('store.view')}}">Stores Table</a></li>
            <li class="breadcrumb-item active" aria-current="page" style="text-decoration-line: underline;">Admins & Employees Table</li>
        </ol>
    </div>

    <div class="row">
        <div class="col-lg-12 mb-4">
            <!-- Simple Tables -->
            <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold " style="color: #344f63">All {{$adminsAndEmployees[0]->category->name}} Admins & Employees</h6>
                </div>
                
                @if(session()->has('status'))
                <div style="background-color:#ef5b69" class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{session()->get('status')}}</strong> 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif

                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th>SN</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>Address</th>
                                <th>Role</th>
                                <th>Action</th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($adminsAndEmployees as $key=>$adminOrEmployee)
                            <tr>
                                <td><a href="#">{{ $key+1 }}</a></td>
                                <td>{{ $adminOrEmployee->name }}</td>
                                <td>{{ $adminOrEmployee->email }}</td>
                                <td>{{ $adminOrEmployee->phone_number ? $adminOrEmployee->phone_number :'no phone number yet' }}</td>
                                <td>{{ $adminOrEmployee->address ? $adminOrEmployee->address : 'no address yet' }}</td>
                                <td>{{ $adminOrEmployee->user_role }}</td>
                                
                                <td>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-danger" data-toggle="modal"
                                        data-target="#exampleModal{{$adminOrEmployee->id}}">
                                        Delete
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal{{$adminOrEmployee->id}}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <form action=" {{ route('admin.delete', [$adminOrEmployee->id]) }} "
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Are you sure you
                                                            want to delete {{$adminOrEmployee->name}}? </h5>
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
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!--Row-->
</div>

<!---Container Fluid-->
@endsection