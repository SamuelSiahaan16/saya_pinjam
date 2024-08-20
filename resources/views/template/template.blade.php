<!DOCTYPE html>
<html lang="zxx">

<head>
    @include('template.head')
    @yield('custom_css')

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

</head>

<body class="defult-home">

    <!--Preloader area start here-->
    <div id="loader" class="loader orange-color">
        <div class="loader-container">
            <div class='loader-icon'>
                <img src="{{ asset('assets/img/favicon.ico') }}" alt="">
            </div>
        </div>
    </div>
    <!--Preloader area End here-->

    <!--Full width header Start-->
    <div class="full-width-header home8-style4">
        @include('template.header')
    </div>
    <!--Full width header End-->

    <!-- Main content Start -->
    <div class="main-content">

        {{ $slot }}

    </div>
    <!-- Main content End -->

    <!-- Footer Start -->
    @include('template.footer')
    <!-- Footer End -->

    <!-- start scrollUp  -->
    <div id="scrollUp" class="orange-color">
        <i class="fa fa-angle-up"></i>
    </div>
    <!-- End scrollUp  -->

    @include('template.js')
    @yield('custom_js')
</body>

</html>