@include('admin.layouts.header')

<body data-sidebar="dark">

    <div id="layout-wrapper" style="min-height:100vh; display:flex; flex-direction:column; 
    justify-content:space-between;">

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

            </div>
            <!-- Footer -->
            
        </div>
        @include('admin.layouts.footer')
    </div>

    <!-- Right Sidebar -->
    @include('admin.layouts.right-sidebar')
    @include('admin.layouts.vendor-scripts')

    @livewireScripts
</body>

</html>