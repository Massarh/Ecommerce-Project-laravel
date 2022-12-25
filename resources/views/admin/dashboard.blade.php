@include('admin.layouts.header')

<div id="layout-wrapper" style="min-height:100vh; display:flex; flex-direction:column; 
justify-content:space-between;">

    <!-- TopBar -->
    @include('admin.layouts.navbar')

    <!-- Sidebar -->
    @include('admin.layouts.sidebar')

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">
        <div class="page-content">

            <!-- Container Fluid-->
            <div class="container-fluid">
                @include('admin.layouts.container')
            </div>


        </div>
        <!-- Footer -->
        
    </div>
    @include('admin.layouts.footer')
</div>

<!-- Right Sidebar -->
@include('admin.layouts.right-sidebar')

@include('admin.layouts.vendor-scripts')

<!-- Scroll to top -->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>