<div class="container-fluid" id="container-wrapper">
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    {{-- <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
    </ol> --}}
</div>

<div class="row mb-3">

    @if(auth()->user()->user_role=='superadmin')

    <!--Number of Category Card -->
    <div class="col-12 mb-4">
    <div class="card h-100">
        <div class="card-body">
        <div class="row align-items-center">
            <div class="col mr-2">
            <div class="text-xs font-weight-bold text-uppercase mb-1">Number of Stores</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">{{App\Models\Category::get()->count()}}</div>
            {{-- <div class="mt-2 mb-0 text-muted text-xs">
                <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 5.65%</span>
                <span>Since last month</span>
            </div> --}}
            </div>
            <div class="col-auto">
            {{-- <i class="fas fa-calendar fa-2x text-primary"></i> --}}
            <i class="fas fa-store fa-2x text-primary"></i>

            </div>
        </div>
        </div>
    </div>
    </div>

    @endif
    
    @if(auth()->user()->user_role=='admin' || auth()->user()->user_role=='employee')
        <!--Number of Products Card -->
        <div class="col-12 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">Products</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{App\Models\Product::where('category_id', auth()->user()->category_id)->get()->count()}}</div>
                            {{-- <div class="mt-2 mb-0 text-muted text-xs">
                                <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                                <span>Since last month</span>
                            </div> --}}
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Number of Order Items Card -->
        <div class="col-12 mb-4">
            <div class="card h-100">
                <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-uppercase mb-1">Order Items</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{App\Models\OrderItem::where('category_id', auth()->user()->category_id)->get()->count()}}</div>
                    {{-- <div class="mt-2 mb-0 text-muted text-xs">
                        <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 12%</span>
                        <span>Since last years</span>
                    </div> --}}
                    </div>
                    <div class="col-auto">
                    <i class="fas fa-shopping-cart fa-2x text-success"></i>
                    </div>
                </div>
                </div>
            </div>
            </div>
    @endif

    @if(auth()->user()->user_role=='superadmin')

    <!-- Number of Orders Card -->
    <div class="col-12 mb-4">
    <div class="card h-100">
        <div class="card-body">
        <div class="row no-gutters align-items-center">
            <div class="col mr-2">
            <div class="text-xs font-weight-bold text-uppercase mb-1">Orders</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">{{App\Models\Order::get()->count()}}</div>
            {{-- <div class="mt-2 mb-0 text-muted text-xs">
                <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 12%</span>
                <span>Since last years</span>
            </div> --}}
            </div>
            <div class="col-auto">
            <i class="fas fa-shopping-cart fa-2x text-success"></i>
            </div>
        </div>
        </div>
    </div>
    </div>
    @endif


    <!-- New User Card  -->
    <div class="col-12 mb-4">
    <div class="card h-100">
        <div class="card-body">
        <div class="row no-gutters align-items-center">
            <div class="col mr-2">
            <div class="text-xs font-weight-bold text-uppercase mb-1">Number Of Customer</div>
            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{App\Models\User::where('user_role', 'customer')->get()->count()}}</div>
            {{-- <div class="mt-2 mb-0 text-muted text-xs">
                <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 20.4%</span>
                <span>Since last month</span>
            </div> --}}
            </div>
            <div class="col-auto">
            <i class="fas fa-users fa-2x text-info"></i>
            </div>
        </div>
        </div>
    </div>
    </div>

    @if(auth()->user()->user_role=='superadmin')

    <!-- Number of Admin & Employee Card  -->
    <div class="col-12 mb-4">
        <div class="card h-100">
            <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                <div class="text-xs font-weight-bold text-uppercase mb-1">Number of Admin</div>
                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{App\Models\User::where('user_role', 'admin')->get()->count()}}</div>
                {{-- <div class="mt-2 mb-0 text-muted text-xs">
                    <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 20.4%</span>
                    <span>Since last month</span>
                </div> --}}
                </div>
                <div class="col-auto">
                {{-- <i class="fas fa-users fa-2x text-info"></i> --}}
                <i class="fas fa-user-secret fa-2x text-info"></i>
                </div>
            </div>
            </div>
        </div>
    </div>

    <!-- Number of Employee Card  -->
    <div class="col-12 mb-4">
        <div class="card h-100">
            <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                <div class="text-xs font-weight-bold text-uppercase mb-1">Number of Employee</div>
                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{App\Models\User::where('user_role', 'employee')->get()->count()}}</div>
                {{-- <div class="mt-2 mb-0 text-muted text-xs">
                    <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 20.4%</span>
                    <span>Since last month</span>
                </div> --}}
                </div>
                <div class="col-auto">
                {{-- <i class="fas fa-users fa-2x text-info"></i> --}}
                <i class="fas fa-user-tie fa-2x text-info"></i>
                </div>
            </div>
            </div>
        </div>
    </div>
    
    @endif