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
                    <li class="breadcrumb-item active" style="text-decoration-line: underline;">Stores Table</li>
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
                                <th>Email</th>
                                <th>View</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @if (count($stores)>0)
                                @foreach ($stores as $key=>$store)
                                    <tr>
                                        <td>{{ $key+1 }}</td> 
                                        <td style="text-transform: uppercase">{{ $store->name }}</td>
                                        <td>{{ $store->users[0]->email }}</td> 
                                        <td><a href="{{route('item.order', [$store->slug])}}"> <button class="btn"  style="background-color: #232838;
                                            color: white;">Ordered Items</button>
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