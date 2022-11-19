@extends('admin.layouts.main')

@section('content')
    <!-- Container Fluid-->
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Order Tables</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}"">Home</a></li>
            <li class="breadcrumb-item">Order</li>
            <li class="breadcrumb-item active" aria-current="page">Order Tables</li>
        </ol>
        </div>

        <div class="row">
        <div class="col-lg-12 mb-4">
            <!-- Simple Tables -->
            <div class="card">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold " style="color:  #344f63">All Order </h6>
            </div>
            <div class="table-responsive">
                <table class="table align-items-center table-flush">
                <thead class="thead-light">
                    <tr>
                        <th>SN</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Date</th>
                        <th>View</th>
                    </tr>
                </thead>
                <tbody>

                    @if (count($orders)>0)
                        @foreach ($orders as $key=>$order)
                            <tr>
                                <td><a href="#">{{ $key+1 }}</a></td> 
                                {{-- relationship between Order and User --}}
                                <td>{{ $order->user->name }}</td>
                                <td>---</td>
                                {{-- <td>{{ $order->user->email }}</td> --}}
                                <td>{{ date( 'd-M-y', strtotime($order->created_at))}}</td>
                                <td><a href="{{route('user.order', [$order->user_id, $order->id])}}">
                                    <button class="btn btn-info">View Order</button>
                                </a></td>
                            </tr>
                        @endforeach
                    @else 
                        <td>No any orders to show</td>
                    @endif
                    
                </tbody>
                </table>

            </div>
            <div class="card-footer"></div>
            </div>
        </div>
        </div>
        <!--Row-->
    </div>

    <!---Container Fluid-->

    <script type="text/javascript">
        function confirmDelete(){
            console.log("massarh");
            let a = confirm('Are you sure you want to delete?');
            console.log(a);
            return a;
        }
    </script>
@endsection