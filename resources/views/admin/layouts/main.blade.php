    @include('admin.layouts.header')

    <div id="wrapper">

        <!-- Sidebar -->
        @include('admin.layouts.sidebar')
        <!-- Sidebar -->

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">

                <!-- TopBar -->
                @include('admin.layouts.navbar')
                <!-- Topbar -->

                <!-- Container Fluid-->
                {{-- @include('admin.layouts.container') --}}
                @yield('content') 
                <!---Container Fluid-->
                @notifyCss 
                    <x:notify-messages />
                @notifyJs 
            </div>

            <!-- Footer -->
            @include('admin.layouts.footer')
            <!-- Footer -->

        </div>
    </div>
