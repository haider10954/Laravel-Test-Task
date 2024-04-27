<!doctype html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Dashboard FeedBack Tool" name="description">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

    @include('includes.style')
    @yield('custom-css')

</head>

<body data-sidebar="colored">


<!-- Loader -->
<div id="preloader"><div id="status"><div class="spinner"></div></div></div>

<!-- Begin page -->
<div    id="layout-wrapper">

    @include('includes.header')

    <!-- ========== Left Sidebar Start ========== -->
    @include('includes.sidebar')
    <!-- Left Sidebar End -->





    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                @yield('content')

            </div>
        </div>
        <!-- End Page-content -->



        @include('includes.footer')
    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->


<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>


<!-- JAVASCRIPT -->
@include('includes.script')
@yield('custom-js')
<script>
    // Wait for the document to be fully loaded
    document.addEventListener('DOMContentLoaded', function() {
        // Get the success message element
        let successMessage = document.getElementById('successMessage');

        // Check if the success message element exists
        if (successMessage) {
            // Hide the success message after 2 seconds
            setTimeout(function() {
                successMessage.style.display = 'none';
            }, 2000); // Change 2000 to the desired time interval in milliseconds
        }
    });
</script>

</body>

</html>
