<x-loading-indicatore />
@extends('admin.layouts.main')

@section('title') @lang('new admin') @endsection

@section('content')
<!-- Breadcrumb -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">New Admins & Employees Table</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}"">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page" style="text-decoration-line: underline;">New Admins & Employees Tables</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb -->

<div class="row">
    <div class="col-12">
        <div class="card">
            
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table align-middle table-nowrap" style="font-size:13px">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @if (count($newAdmins)>0)

                            @foreach ($newAdmins as $key=>$admin)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $admin->name }}</td>
                                <td>{{ $admin->email }}</td>
                                <td>{{ $admin->user_role }}</td>
                                
                                <td>
                                    <!-- Button trigger modal -->
                                    <button class="bg-color-btn" type="button" data-toggle="modal" data-target="#exampleModal{{$admin->id}}" style="color: #dc3545;border:none">
                                        <i class="mdi mdi-trash-can font-size-20"></i> 
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal{{$admin->id}}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <form action=" {{ route('admin.delete', [$admin->id]) }} "
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Are you sure you
                                                            want to delete {{$admin->name}}? </h5>
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

                        @else 
                            <td>No new admin & employee created yet</td>
                        @endif
                            
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
    <!---Container Fluid-->

@endsection