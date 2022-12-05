<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center " href="index.html"
        style="background-color: #233744">
        <div class="sidebar-brand-icon">
            <img src="{{asset('admin/img/logo/logo.jfif')}}">
        </div>
        <div class="sidebar-brand-text mx-3">GO-plaza</div>
    </a>
    <hr class="sidebar-divider my-0">

    <!-- Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{route('dashboard')}}">
            {{-- <i class="fas fa-fw fa-tachometer-alt"></i> --}}
            {{-- <i class="fas fa-chart-bar"></i> --}}
            <i class="fas fa-home"></i>
            <span>Dashboard</span></a>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        {{-- Features --}}
    </div>

    <!-- Store -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap"
            aria-expanded="true" aria-controls="collapseBootstrap">
            <i class="far fa-fw fa-window-maximize"></i>
            <span>Store</span>
        </a>
        <div id="collapseBootstrap" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Store</h6>
                <a class="collapse-item" href=" {{ route('store.index') }}">View</a>
                @if((auth()->user()->user_role=='admin') && (!auth()->user()->category_id))
                        <a class="collapse-item" href=" {{ route('store.create') }} ">Create</a>
                @endif

            </div>
        </div>
    </li>

    @if((auth()->user()->user_role=='admin'||auth()->user()->user_role=='employee') && (auth()->user()->category_id))
    
    <!-- Section -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap1"
            aria-expanded="true" aria-controls="collapseBootstrap1">
            <i class="far fa-fw fa-window-maximize"></i>
            <span>Section</span>
        </a>
        <div id="collapseBootstrap1" class="collapse" aria-labelledby="headingBootstrap"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Section</h6>
                <a class="collapse-item" href=" {{ route('section.getSubcategoryByCatId',[auth()->user()->category_id])}} ">View</a>
                @if(auth()->user()->user_role=='admin')
                    <a class="collapse-item" href=" {{ route('section.create') }}">Create</a>
                @endif

            </div>
        </div>
    </li>

    @if(App\Models\Subcategory::where('category_id',auth()->user()->category_id)->count())

    <!-- Product -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap2"
            aria-expanded="true" aria-controls="collapseBootstrap2">
            <i class="far fa-fw fa-window-maximize"></i>
            <span>Products</span>
        </a>
        <div id="collapseBootstrap2" class="collapse" aria-labelledby="headingBootstrap"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Products</h6>
                <a class="collapse-item"
                    href=" {{ route('product.index') }} ">View</a>
                    @if(auth()->user()->user_role=='admin')
                        <a class="collapse-item" href=" {{ route('product.create') }} ">Create</a>
                    @endif
            </div>
        </div>
    </li>
    @endif

    <!-- Store Order Items -->
    @if(App\Models\OrderItem::where('category_id',auth()->user()->category_id)->count())
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap6"
            aria-expanded="true" aria-controls="collapseBootstrap6">
                <i class="far fa-fw fa-window-maximize"></i>
                <span>Store Order Items</span>
            </a>
            <div id="collapseBootstrap6" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Store Order Items</h6>
                    <a class="collapse-item" href=" {{ route('item.order', [auth()->user()->category_id]) }}">View</a>
                </div>
            </div>
        </li>
    @endif
    
    @endif

    {{-- Superadmin --}}
    @if(auth()->user()->user_role=='superadmin')

    <!-- Slider -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap3"
            aria-expanded="true" aria-controls="collapseBootstrap3">
            <i class="far fa-fw fa-window-maximize"></i>
            <span>Sliders</span>
        </a>
        <div id="collapseBootstrap3" class="collapse" aria-labelledby="headingBootstrap"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Sliders</h6>
                <a class="collapse-item" href=" {{ route('slider.index') }} ">View</a>
                <a class="collapse-item" href=" {{ route('slider.create') }} ">Create</a>
            </div>
        </div>
    </li>

    <!-- Order -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap5"
            aria-expanded="true" aria-controls="collapseBootstrap5">
            <i class="far fa-fw fa-window-maximize"></i>
            <span>Users Orders</span>
        </a>
        <div id="collapseBootstrap5" class="collapse" aria-labelledby="headingBootstrap"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Order</h6>
                <a class="collapse-item" href=" {{ route('order.index') }} ">View</a>
            </div>
        </div>
    </li>

    <!-- Store Orders -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap6"
        aria-expanded="true" aria-controls="collapseBootstrap6">
        <i class="far fa-fw fa-window-maximize"></i>
        <span>Store Order Items</span>
        </a>
        <div id="collapseBootstrap6" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Store Order Items</h6>
                <a class="collapse-item" href=" {{ route('order.store') }}">View</a>
            </div>
        </div>
    </li>

    <!-- Add Admin -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap7"
        aria-expanded="true" aria-controls="collapseBootstrap7">
        <i class="far fa-fw fa-window-maximize"></i>
        <span>Admins & Employees</span>
        </a>
        <div id="collapseBootstrap7" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Admin & Employee</h6>
                <a class="collapse-item" href=" {{ route('store.view') }}">View</a>
                <a class="collapse-item" href=" {{ route('add.admin') }}">Create</a>
                <a class="collapse-item" href=" {{ route('newAdmin.view')}}">View New Admin</a>
            </div>
        </div>
    </li>

    @endif

    {{-- Logout --}}
    <li class="nav-item mt-4">

        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
            <i class="fas fa-sign-out-alt"></i> Logout
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>

    </li>
</ul>