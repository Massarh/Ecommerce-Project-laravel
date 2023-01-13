<x-loading-indicatore />
@extends('admin.layouts.main')

@section('title') View store @endsection

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
                    <table class="table align-middle table-nowrap" style="font-size:13px">
                        <thead>
                            <tr>
                                <th colspan="2">#</th>

                                <th colspan="2">Image</th>

                                <th colspan="3">Name</th>

                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @if(auth()->user()->user_role=='superadmin')

                            @if (count($stores)>0)
                                @foreach ($stores as $key=>$store)
                                <tr>
                                    <td colspan="2">{{ $key+1 }}</td>

                                    <td colspan="2"><img src="{{ Storage::url($store->image) }}" alt=".." width="100"></td>

                                    <td colspan="3">{{ $store->name }}</td>

                                    <td>
                                        <a href=" {{route('admin.view',[ $store->slug])}} ">
                                            <button class="btn"  style="background-color: #232838;
                                            color: white;">view admins&employees</button>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            @else
                                <td>No stores created yet</td>
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