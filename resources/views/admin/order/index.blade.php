@extends('admin.layouts.main')

@section('title') View user @endsection

@section('content')
<!-- Breadcrumb -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Orders Table</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active" style="text-decoration-line: underline;">Orders Table</li>
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
                                <th>Customer Name</th>
                                <th>Email</th>
                                <th>Date</th>
                                <th>View</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @if (count($orders)>0)
                                @foreach ($orders as $key=>$order)
                                    <tr>
                                        <td>{{ $key+1 }}</td> 
                                        <td>{{ $order->user->name }}</td>
                                        <td>{{ $order->user->email }}</td>
                                        <td>{{ date( 'd-M-y', strtotime($order->created_at))}}</td>
                                        <td><a href="{{route('user.order', [$order->id])}}">
                                            <button class="btn" style="background-color: #232838;
                                            color: white;">View Order</button>
                                        </a></td>
                                    </tr>
                                @endforeach
                            @else 
                                <td>No orders are established yet</td>
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