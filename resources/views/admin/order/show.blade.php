@extends('admin.layouts.main')

@section('title') View order @endsection

@section('content')
<!-- Breadcrumb -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Order Items Table</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route('order.index')}}">Orders Table</a></li>
                    <li class="breadcrumb-item active" style="text-decoration-line: underline;">Order Items Table</li>
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
                            
                            @foreach($order->orderItems as $item)
                            <tr>
                                <td>{{$i++}}</td>
                                <td style="text-transform: uppercase">{{$item->store->name}}</td>
                                <td style="text-transform: uppercase">{{$item->name}}</td>
                                <td>{{$item->price}} JOD</td>
                                <td>{{$item->quantity}}</td>
                                <td>{{$item->price * $item->quantity}} JOD</td>
                                <td><img src="{{ Storage::url($item->image) }}" width="100"></td>
                            </tr>
                            @endforeach

                        </tbody>

                        <tfoot>
                            <tr>
                                <td colspan='5'><b>Total price: </b></td>
                                <td colspan='2'><b>{{$order->total_price}} JOD</b></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
<!---Container Fluid-->

@endsection