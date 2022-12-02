@extends('admin.layouts.main')

@section('content')
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <!-- breadcrumb -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Order Items Table</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
            <li class="breadcrumb-item">Order</li>
            <li class="breadcrumb-item active" aria-current="page">Order Items Table</li>
        </ol>
    </div>

    <div class="row">
        <div class="col-lg-12 mb-4">
            <!-- Simple Tables -->
            <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold " style="color:  #344f63">All {{$order->user->name}} Order Items  </h6>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th>SN</th>
                                <th>Store Name</th>
                                <th>Product Name</th>
                                <th>Price Per Item</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Image</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php $i=1 ?>

                            @foreach($order->orderItem as $item)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$item->category->name}}</td>
                                <td>{{$item->name}}</td>
                                <td>${{$item->price}}</td>
                                <td>{{$item->quantity}}</td>
                                <td>${{$item->price * $item->quantity}}</td>
                                <td><img src="{{ Storage::url($item->image) }}" width="100"></td>
                            </tr>
                            @endforeach

                        </tbody>
                        <tfoot>
                            <tr>
                                <td><b style="">Total price: </b></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><b>${{$order->total_price}} </b></td>
                                <td></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <div class="card-footer"></div>
        </div>
    </div>

</div>

@endsection