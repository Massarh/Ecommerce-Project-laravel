<x-loading-indicatore />
@extends('admin.layouts.main')

@section('title') @lang('store') @endsection

@section('content')
<!-- Breadcrumb -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Stores Table</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}"">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page" style="text-decoration-line: underline;">Stores Table</li>
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
                    <table class="table align-middle table-nowrap">
                        <thead>
                            <tr>
                                <th>#</th>
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

                            @if (count($stores)>0)
                                @foreach ($stores as $key=>$store)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td></td>

                                    <td><img src="{{ Storage::url($store->image) }}" alt=".." width="100"></td>
                                    <td></td>

                                    <td>{{ $store->name }}</td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <a href=" {{route('admin.view',[ $store->slug])}} ">
                                            <button class="btn"  style="background-color: #232838;
                                            color: white;">view admins&employees</button>
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
</div>
    <!---Container Fluid-->

@endsection