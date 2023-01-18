@extends('admin.layouts.main')

@section('title') @lang('orders') @endsection

@section('content')
<!-- Breadcrumb -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Order Items Table</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                    @if(auth()->user()->user_role == 'superadmin')
                    <li class=" breadcrumb-item"><a href="{{route('order.store')}}">Stores Table </a></li>
                    @endif
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
            <!-- Simple Tables -->

            <form action="{{route('item.order', [$storeSlug])}}" method="GET">
                @csrf
                <div class="card-header py-3 calendar-parent">

                    {{-- Filter Date --}}
                    <div class="calendar-child">
                        <label for="date" class="h5 col-form-label" style="margin-right: 10px">From</label>
                        <div class="">
                            <input name="fromDate" type="date" class="form-control input-sm" id="fromdate"
                                value="{{$fromDate}}">
                        </div>
                    </div>
                    <div class="d-flex align-items-end">
                        <div class="calendar-child to-calendar-child">
                            <label for="date" class="h5 col-form-label margin-to" style="margin-right: 10px">To</label>
                            <div class="to-input">
                                <input name="toDate" type="date" class="form-control input-sm" id="todate"
                                    value="{{$toDate}}">
                            </div>
                        </div>

                        {{-- Filter Date --}}
                        <div class="" style="margin-left: 10px;">
                            <button class="mr-1 bg-color-btn h6"><i class="fas fa-search fa-fw"></i></button>
                            <a class="h6 mt-2" href="{{route('item.order', [$storeSlug])}}"
                                style="--bs-link-hover-color: #495057;">
                                <button id="clear" class="bg-color-btn h6"><i class="fas fa-sync"></i></button>
                            </a>
                        </div>
                    </div>
                </div>
            </form>

            <div class="card-body">

                <div class="table-responsive">
                    <table class="table align-middle table-nowrap" style="font-size: 13px">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Product Name</th>
                                <th>Price Per Item</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Image</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($filteredStoreItems)>0)
                            <?php $totalPrice = 0 ?>
                            @foreach ($filteredStoreItems as $key=>$item)

                            <tr>
                                <td>{{ $key+1 }}</td>

                                <td style="text-transform: uppercase">{{ $item['name'] }}</td>
                                <td>{{ $item['price'] }} JOD</td>
                                <td>{{ $item['quantity'] }}</td>
                                <td>{{ $item['price'] * $item['quantity'] }} JOD</td>
                                <td><img src="{{ Storage::url($item['image']) }}" width="100"></td>
                            </tr>
                            <?php $totalPrice += $item['price'] * $item['quantity'] ?>
                            @endforeach

                        </tbody>

                        <tfoot>
                            <tr>
                                <td><b style="">Total price: </b></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><b>{{$totalPrice}} JOD</b></td>
                                <td></td>
                            </tr>
                        </tfoot>
                        @else
                        <td>No Store Items To Show</td>
                        @endif

                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
<!---Container Fluid-->

@endsection
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).on('click', '#clear', function () {
    $('#fromdate').attr('value', ""); 
    $('#todate').attr('value', "");
});

</script>