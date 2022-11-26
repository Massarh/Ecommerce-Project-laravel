@extends('admin.layouts.main')

@section('content')
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Store Order Items</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}"">Home</a></li>
            <li class=" breadcrumb-item">Store Order Items</li>
            <li class="breadcrumb-item active" aria-current="page">Store Order Items Tables</li>
        </ol>
    </div>
    <div class="row">
        <div class="col-lg-12 mb-4">

            <!-- Simple Tables -->
            <div class="card">
                <form action="{{route('item.order', [$storeItems[0]->category_id])}}" method="GET">@csrf
                    <div class="card-header py-3 calendar-parent">

                        <h6 class="m-0 font-weight-bold " style="color:  #344f63">All Order Items </h6>

                        {{-- Filter Date --}}
                        <div class="calendar-child">
                            <label for="date" class="col-form-label" style="margin-right: 10px">From</label>
                            <div class="">
                                <input name="fromdate" type="date" class="form-control input-sm" id="fromdate">
                            </div>
                        </div>

                        <div class="calendar-child">
                            <label for="date" class="col-form-label margin-to" style="margin-right: 10px">To</label>
                            <div class="">
                                <input name="todate" type="date" class="form-control input-sm" id="todate">
                            </div>
                        </div>

                        <div class="d-flex justify-content-between ">
                            {{-- <button class="btn mr-2" style="background-color: #2a3f4e; color:#fff"><i class="fas fa-search fa-fw"></i></button> --}}
                            <button class="mr-3" style=" color:#2a3f4e"><i class="fas fa-search fa-fw"></i></button>
                            <a  href="{{route('item.order', [$storeItems[0]->category_id])}}">
                                {{-- <button class="btn"style="background-color: #2a3f4e; color:#fff"><i class="fas fa-sync"></i></button> --}}
                                <button style="color:#2a3f4e"><i class="fas fa-sync"></i></button>
                            </a>
                        </div>
                        {{-- Filter Date --}}

                    </div>
                </form>

                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th>SN</th>
                                <th>Product Name</th>
                                <th>Price Per Item</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Image</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $totalPrice = 0 ?>
                            @foreach ($storeItems as $key=>$item)

                            <tr>
                                <td>{{ $key+1 }}</td>

                                <td>{{ $item->name }}</td>
                                <td>${{ $item->price }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>${{ $item->price * $item->quantity }}</td>
                                <td><img src="{{ Storage::url($item->image) }}" width="100"></td>
                            </tr>
                            <?php $totalPrice += $item->price * $item->quantity ?>
                            @endforeach
                        </tbody>

                        <tfoot>
                            <tr>
                                <td><b style="">Total price: </b></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><b>${{$totalPrice}} </b></td>
                                <td></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>

            </div>
        </div>
    </div>
    <!--Row-->
</div>
<!---Container Fluid-->

@endsection