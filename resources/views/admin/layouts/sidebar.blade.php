<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu">Menu</li>

                <!-- Dashboard -->
                <li>
                    <a href="{{ route('dashboard') }}" class="waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span key="dashboard">Dashboard</span>
                    </a>
                </li>

                <!-- Store -->
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-store"></i>
                        <span key="store">Store</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('store.index') }}" key="store-view">View</a></li>

                        @if((auth()->user()->user_role=='admin') && (!auth()->user()->store_id))
                        <li><a href="{{ route('store.create') }}" key="store-create">Create</a></li>
                        @endif
                    </ul>
                </li>

                <!-- Admin and Employee -->
                @if((auth()->user()->user_role=='admin'||auth()->user()->user_role=='employee') &&
                (auth()->user()->store_id))

                <!-- admin and employee Category -->
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-layout"></i>
                        <span key="category">Category</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">

                        <li><a href="{{ route('category.getCategoryByStoreSlug',[auth()->user()->store->slug])}}"
                                key="category-view">View</a></li>

                        @if(auth()->user()->user_role=='admin')
                        <li><a href="{{ route('category.create') }}" key="category-create">Create</a></li>
                        @endif

                    </ul>
                </li>

                @if(App\Models\Store::find(auth()->user()->store_id)->categories()->count())

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-shopping"></i>
                        <span key="product">All Products</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">

                        <li><a href="{{ route('product.index') }}" key="product-view">View</a></li>

                        @if(auth()->user()->user_role=='admin')
                        <li><a href="{{ route('product.create') }}" key="product-crea">Create</a></li>
                        @endif

                    </ul>
                </li>
                @endif

                @if(App\Models\OrderItem::where('store_id',auth()->user()->store_id)->count())

                <!-- Store Order Items -->
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-calendar-multiple-check"></i>
                        <span key="store-order-items">Ordered Items</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">

                        <li><a href="{{ route('item.order', [auth()->user()->store->slug]) }}"
                                key="t-light-sidebar">View</a></li>

                    </ul>
                </li>
                @endif

                @endif

                <!-- Superadmin -->
                @if(auth()->user()->user_role=='superadmin')

                <!-- Superadmin Category -->
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-layout"></i>
                        <span key="category">Category</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">

                        <li><a href="{{ route('category.index')}}" key="category-view">View</a></li>
                        <li><a href="{{ route('category.create') }}" key="category-create">Create</a></li>

                    </ul>
                </li>
                
                <!-- Sliders  -->
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="far fa-image"></i>
                        <span key="sliders">Sliders</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">

                        <li><a href="{{ route('slider.index') }}" key="t-light-sidebar">View</a></li>
                        <li><a href="{{ route('slider.create') }}" key="t-light-sidebar">Create</a></li>

                    </ul>
                </li>

                <!-- Order -->
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-package-variant-closed"></i>
                        <span key="users-orders">Orders</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">

                        <li><a href="{{ route('order.index') }}" key="t-light-sidebar">View</a></li>

                    </ul>
                </li>

                <!-- Store Order Items -->
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-calendar-multiple-check"></i>
                        <span key="store-order-items">Stores Ordered From</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">

                        <li><a href="{{ route('order.store') }}" key="t-light-sidebar">View</a></li>

                    </ul>
                </li>

                <!-- Add Admin -->
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-account"></i>
                        <span key="admin-employee">Admins & Employees</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">

                        <li><a href="{{ route('store.view') }}" key="t-light-sidebar">View</a></li>
                        <li><a href="{{ route('add.admin') }}" key="t-light-sidebar">Create</a></li>
                        <li><a href="{{ route('newAdmin.view')}}" key="t-light-sidebar">View New Admin & Employee</a></li>

                    </ul>
                </li>

                @endif
                
            </ul>

        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->