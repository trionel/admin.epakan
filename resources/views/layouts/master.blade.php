<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from myrathemes.com/xacton/vertical/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 15 Feb 2020 13:28:46 GMT -->
<head>
    @include('layouts.css')
</head>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">

        <header id="page-topbar">
            @include('layouts.topbar')
        </header>

        <!-- ========== Left Sidebar Start ========== -->
        @include('layouts.sidebar')
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">

                    <!-- start page title -->
                    @include('layouts.title')
                    <!-- end page title -->

                    {{-- CONTENT --}}
                    @yield('content')
                    {{-- END CONTENT --}}

                </div> <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            @include('layouts.footer')

        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    {{-- <!-- Overlay-->
    <div class="menu-overlay"></div> --}}


@include('layouts.js')
@yield('script')
</body>


<!-- Mirrored from myrathemes.com/xacton/vertical/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 15 Feb 2020 13:29:08 GMT -->
</html>