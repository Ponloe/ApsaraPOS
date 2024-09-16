<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title style="font-family: 'Moulpali', sans-serif;">អប្សរាចម្លាក់ខ្មែរ</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet" />
        <link rel="icon" type="image/png" href="{{ asset('assets/img/apsara.jpg') }}" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Moulpali&family=Noto+Sans+Khmer:wght@100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
        </style>
    </head>
    <body class="sb-nav-fixed">
        <!-- Top Nav -->
         @include('layouts.top-nav')
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <!-- Side nav -->
                @include('layouts.side-nav')
            </div>
            <div id="layoutSidenav_content">
                <main>
                    @yield('content')
                </main>
                <!-- footer -->
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="assets/js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="{{ asset('assets/demo/chart-area-demo.js') }}"></script>
        <script src="{{ asset('assets/demo/chart-bar-demo.js')}}"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="assets/js/datatables-simple-demo.js"></script>
    </body>

</html>
