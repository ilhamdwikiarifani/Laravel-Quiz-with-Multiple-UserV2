<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>codeneko Dashboard - nekoserve™ </title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{ asset('backEnd/image/logo/icon.png') }}" />

    {{-- font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">


    {{-- logo --}}
    <script src="https://kit.fontawesome.com/2952392494.js" crossorigin="anonymous"></script>
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href={{ asset('backEnd/css/styles.css') }} rel="stylesheet" />
    <link href={{ asset('backEnd/css/main.css') }} rel="stylesheet" />

    <script src={{ asset('backEnd/js/jquery.js') }}></script>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
</head>

<body class="bg-gray">
    <div class="container-fluid bg-white border">
        @include('backEnd.components.navbar')
    </div>

    {{-- ADV --}}
    @include('backEnd.components.adv')

    <div class="d-flex container mt-lg-3" id="wrapper">
        <!-- Sidebar-->
        @include('backEnd.components.sidebar')

        <!-- Page content wrapper-->
        <div id="page-content-wrapper" class="pe-md-3 mb-5" style="padding-right: 50px">
            <!-- Page content-->
            @yield('content')
        </div>
    </div>

    @include('backEnd.components.footer')

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src={{ asset('backEnd/js/scripts.js') }}></script>
    <script>
        $(document).ready(function () {
            $('#example').DataTable();
        });
    </script>

    <script>
        $(document).ready(function() {
                $(".toast").toast('show');
            });
    </script>

    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.7.0/js/dataTables.select.min.js"></script>
</body>

</html>