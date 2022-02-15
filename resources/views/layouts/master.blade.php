<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Diskominfo | </title>
    <link rel="icon" type="image/png" href="vendor/img/madiun.png" />

    <!-- Bootstrap -->
    <link href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link href="{{ asset('assets/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('assets/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('assets/vendors/nprogress/nprogress.css" rel="stylesheet') }}">
    <!-- bootstrap-daterangepicker -->
    <link href="{{ asset('assets/vendors/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">
    <!-- Datatables -->

    <link href="{{ asset('assets/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css') }}" rel="stylesheet">


    <!-- Custom Theme Style -->
    <link href="{{ asset('assets/build/css/custom.min.css') }}" rel="stylesheet">
  </head>

   <!-- KETIKA ADA SESSION ERROR -->
   @if ($errors->any())
   <div class="alert alert-danger">
       <ul>
           @foreach ($errors->all() as $error)
               <li>{{$error}}</li>
           @endforeach
       </ul>
   </div>
   @endif


  <body class="nav-md">
    <div class="container body">
        @include('sweetalert::alert')
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                    <a href="#" class="site_title"><img src="{{asset('vendor/img/madiun.png')}}" class="img-responsive" style="margin-left: auto;margin-right: auto; margin-top: auto;margin-bottom: auto;width:20%;">  <span>DISKOMINFO</span></a>
                    </div>
                    <div class="clearfix"></div>

                    @if (auth()->user()->level=="Super Admin")
                        <!-- sidebar menu -->
                        @include('layouts.sidebar')
                        <!-- /sidebar menu -->
                             @elseif (auth()->user()->level=="Admin Informatika")
                                <!-- sidebar menu -->
                                @include('layouts.sidebar')
                                <!-- /sidebar menu -->
                            @elseif (auth()->user()->level=="Admin Informasi")
                                <!-- sidebar menu -->
                                @include('layouts.sidebar')
                                <!-- /sidebar menu -->
                            @elseif (auth()->user()->level=="Admin Persandian")
                                <!-- sidebar menu -->
                                @include('layouts.sidebar')
                                <!-- /sidebar menu -->
                            @elseif (auth()->user()->level=="Admin Statistika")
                                <!-- sidebar menu -->
                                @include('layouts.sidebar')
                                <!-- /sidebar menu -->
                                @else
                                @include('layouts.sidebar2')
                    @endif
                </div>
            </div>

                <!-- header -->
                @include('layouts.header')
                <!-- /header -->


                <!-- page content -->
                <div class="right_col" role="main">
                    @yield('content')
                </div>
                <!-- /page content -->


                <!-- footer content -->
                <footer>
                    <div class="pull-right">
                        E - Log Book  <a href="https://colorlib.com">| 2022 </a>
                    </div>
                    <div class="clearfix"></div>
                </footer>
                <!-- /footer content -->
        </div>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('assets/vendors/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
   <script src="{{ asset('assets/vendors/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('assets/vendors/fastclick/lib/fastclick.js') }}"></script>
    <!-- NProgress -->
    <script src="{{ asset('assets/vendors/nprogress/nprogress.js') }}"></script>
    <!-- Chart.js -->
    <script src="{{ asset('assets/vendors/Chart.js/dist/Chart.min.js') }}"></script>
    <!-- jQuery Sparklines -->
    <script src="{{ asset('assets/vendors/jquery-sparkline/dist/jquery.sparkline.min.js') }}"></script>
    <!-- Flot -->
    <script src="{{ asset('assets/vendors/Flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('assets/vendors/Flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset('assets/vendors/Flot/jquery.flot.time.js') }}"></script>
    <script src="{{ asset('assets/vendors/Flot/jquery.flot.stack.js') }}"></script>
    <script src="{{ asset('assets/vendors/Flot/jquery.flot.resize.js') }}"></script>
    <!-- Flot plugins -->
    <script src="{{ asset('assets/vendors/flot.orderbars/js/jquery.flot.orderBars.js') }}"></script>
    <script src="{{ asset('assets/vendors/flot-spline/js/jquery.flot.spline.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/flot.curvedlines/curvedLines.js') }}"></script>
    <!-- DateJS -->
    <script src="{{ asset('assets/vendors/DateJS/build/date.js') }}"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="{{ asset('assets/vendors/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
     <!-- Datatables -->
     <script src="{{ asset('assets/vendors/datatables.net/js/jquery.dataTables.min.js') }}"></script>
     <script src="{{ asset('assets/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
     <script src="{{ asset('assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
     <script src="{{ asset('assets/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js') }}"></script>
     <script src="{{ asset('assets/vendors/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
     <script src="{{ asset('assets/vendors/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
     <script src="{{ asset('assets/vendors/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
     <script src="{{ asset('assets/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js') }}"></script>
     <script src="{{ asset('assets/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
     <script src="{{ asset('assets/vendors/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
     <script src="{{ asset('assets/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js') }}"></script>
     <script src="{{ asset('assets/vendors/datatables.net-scroller/js/dataTables.scroller.min.js') }}"></script>
     <script src="{{ asset('assets/vendors/jszip/dist/jszip.min.js') }}"></script>
     <script src="{{ asset('assets/vendors/pdfmake/build/pdfmake.min.js') }}"></script>
     <script src="{{ asset('assets/vendors/pdfmake/build/vfs_fonts.js') }}"></script>

    <!-- Custom Theme Scripts -->
    <script src="{{ asset('assets/build/js/custom.min.js') }}"></script>

  </body>
</html>
