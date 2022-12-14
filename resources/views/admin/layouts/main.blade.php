@include('admin.layouts.header')

<div id="layout-wrapper">

    <!-- TopBar -->
    @include('admin.layouts.navbar')

    <!-- Sidebar -->
    @include('admin.layouts.sidebar')

    <!-- ================================================= -->
    <!-- Start right Content here -->
    <!-- ================================================== -->
    <div class="main-content">
        <div class="page-content">

            <!-- Container Fluid-->
            <div class="container-fluid">
                @yield('content')
            </div>

            @notifyCss
            <x:notify-messages />
            @notifyJs
            
        </div>
        <!-- Footer -->
        @include('admin.layouts.footer')

    </div>
</div>

<!-- Right Sidebar -->
@include('admin.layouts.right-sidebar')

@include('layouts.vendor-scripts')