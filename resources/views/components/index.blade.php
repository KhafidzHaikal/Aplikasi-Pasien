<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>{{ $title }}</title>
    <!-- Favicon icon -->
    <link rel="stylesheet" href="/vendor/owl-carousel/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/vendor/owl-carousel/css/owl.theme.default.min.css">
    <link href="/vendor/jqvmap/css/jqvmap.min.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">

</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    @include('components.load')
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        @include('components.navbar')
        <!--**********************************
            Nav header end
        ***********************************-->


        <!--**********************************
            Sidebar start
        ***********************************-->
        @include('components.sidebar')
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                @yield('body')
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->

        <!--**********************************
            Footer start
        ***********************************-->
        @include('components.footer')
        <!--**********************************
            Footer end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="/vendor/global/global.min.js"></script>
    <script src="/js/quixnav-init.js"></script>
    <script src="/js/custom.min.js"></script>


    <!-- Vectormap -->
    <script src="/vendor/raphael/raphael.min.js"></script>
    <script src="/vendor/morris/morris.min.js"></script>

    <script src="/vendor/gaugeJS/dist/gauge.min.js"></script>

    <!-- Owl Carousel -->
    <script src="/vendor/owl-carousel/js/owl.carousel.min.js"></script>

    <!-- Counter Up -->
    <script src="/vendor/jqvmap/js/jquery.vmap.min.js"></script>
    <script src="/vendor/jqvmap/js/jquery.vmap.usa.js"></script>
    <script src="/vendor/jquery.counterup/jquery.counterup.min.js"></script>

</body>

</html>
