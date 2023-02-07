<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>{{ $title }}</title>
    <!-- Favicon icon -->

    <link href="/css/style.css" rel="stylesheet">

    {{-- SweetAlert CSS --}}
    <link href="/vendor/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">

    {{-- DataTables JQuery CSS --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.13.2/datatables.min.css" />

    {{-- Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    {{-- Select 2 --}}
    <link rel="stylesheet" type="text/css" href="/css/select2.css">

    {{-- Toast --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/css/toastr.css" rel="stylesheet" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/js/toastr.js"></script>


</head>

<body>

    @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])

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

    <!-- SweetAlert -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>

    <!-- Datatable -->
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.13.2/datatables.min.js"></script>

    <!-- My Scripts -->
    <script src="/js/script.js"></script>

    {{-- Select 2 --}}
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    {{-- Toast --}}
    <script>
         $(document).ready(function() {
            toastr.options.timeOut = 10000;
            @if (Session::has('error'))
                toastr.error('{{ Session::get('error') }}');
            @elseif(Session::has('success'))
                toastr.success('{{ Session::get('success') }}');
            @endif
        });
    </script>

</body>

</html>
