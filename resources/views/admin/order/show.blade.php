@extends('admin.layouts.main')

@section('content')
    <!-- Container Fluid-->
    <div class="container-fluid" id="container-wrapper">
        <!-- breadcrumb -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Order Tables</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                <li class="breadcrumb-item">Order</li>
                <li class="breadcrumb-item active" aria-current="page">Order Tables</li>
            </ol>
        </div>

        <div class="row">
            <div class="col-lg-12 mb-4">
                <!-- Simple Tables -->
                <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold " style="color:  #344f63"> </h6>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th>SN</th>
                                <th>Image</th>
                                <th>Store</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php $i=1 ?>

                            @foreach($carts as $cart)
                            
                                @foreach($cart->items as $item)
                                    <tr>
                                        <td>{{$i++}}</td> 
                                        {{-- <td>{{ $order->user }}</td> --}}
                                        <td><img src="{{ Storage::url($item['image']) }}" width="100"></td>
                                        <td>---</td>
                                        <td>{{$item['name']}}</td>
                                        <td>{{$item['price']}}</td>
                                        <td> {{$item['qty']}}</td>
                                    </tr>
                                @endforeach
                            
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
                </div>
                <div class="card-footer"></div>
            </div>
        </div>

    </div>

@endsection