<!DOCTYPE html>
<html>
<head>
    <html lang="{{ app()->getLocale() }}">
    <title>Grúas y Parqueaderos Bogotá - @yield('titulo')</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="HandheldFriendly" content="true">
    <meta name="MobileOptimized" content="width">
    <meta http-equiv="Cache-control" content="max-age=31536000">
    <link type="image/x-icon" rel="icon" href="{{asset("images/favicon.png")}}">
    <link rel="stylesheet" href="{{asset("adminlte/plugins/fontawesome-free/css/all.min.css")}}">
    {{-- <link rel="stylesheet" href="{{asset("adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css")}}">
    <link rel="stylesheet" href="{{asset("adminlte/plugins/jqvmap/jqvmap.min.css")}}"> --}}
    <link rel="stylesheet" href="{{asset("adminlte/css/adminlte.min.css")}}">
    <link rel="stylesheet" href="{{asset("adminlte/css/administracion.css")}}">
    <link rel="stylesheet" href="{{asset("css/bootstrap.min.css")}}">
    <link rel="stylesheet" href="{{asset("DataTables/DataTables/css/jquery.dataTables.min.css")}}">
    <link rel="stylesheet" href="{{asset("DataTables/DataTables/css/dataTables.bootstrap4.min.css")}}">
    <link rel="stylesheet" href="{{asset("DataTables/Responsive/css/responsive.bootstrap4.min.css")}}">
    <link rel="stylesheet" href="{{asset("DataTables/Buttons/css/buttons.dataTables.min.css")}}">
    <link rel="stylesheet" href="{{asset("DataTables/AutoFill/css/autofill.dataTables.min.css")}}">
    <link rel="stylesheet" href="{{asset("DataTables/RowReorder/css/rowReorder.dataTables.min.css")}}">
    <link rel="stylesheet" href="{{asset("DataTables/RowReorder/css/rowReorder.bootstrap.min.css")}}">
    <link rel="stylesheet" href="{{asset("css/toastr.min.css")}}">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    @yield('styles')
</head>
<body class="sidebar-mini layout-fixed accent-primary layout-footer-fixed sidebar-collapse layout-navbar-fixed">

    <div class="wrapper">
        @include("administracion/header")
        @include("administracion/aside")
        <div class="content-wrapper">
            <section class="content">
                @yield('contenido')
            </section>
        </div>
        @include("administracion/footer")
        <aside class="control-sidebar control-sidebar-dark">
        </aside>
    </div>
    <script src="{{asset("js/jquery.min.js")}}"></script>
    <script src="{{asset("js/jquery-migrate.min.js")}}"></script>
    <script src="{{asset("adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js")}}"></script>
    <script src="{{asset("adminlte/js/adminlte.js")}}"></script>
    <script src="{{asset("DataTables/DataTables/js/jquery.dataTables.min.js")}}"></script>
    <script src="{{asset("DataTables/DataTables/js/dataTables.bootstrap4.min.js")}}"></script>
    <script src="{{asset("DataTables/Responsive/js/dataTables.responsive.min.js")}}"></script>
    <script src="{{asset("DataTables/Responsive/js/responsive.bootstrap4.min.js")}}"></script>
    <script src="{{asset("DataTables/Buttons/js/dataTables.buttons.min.js")}}"></script>
    <script src="{{asset("DataTables/Buttons/js/buttons.html5.min.js")}}"></script>
    <script src="{{asset("DataTables/Buttons/js/buttons.print.min.js")}}"></script>
    <script src="{{asset("DataTables/JsZip/jszip.min.js")}}"></script>
    <script src="{{asset("DataTables/PdfMake/pdfmake.min.js")}}"></script>
    <script src="{{asset("DataTables/PdfMake/vfs_fonts.js")}}"></script>
    <script src="{{asset("DataTables/AutoFill/js/dataTables.autoFill.min.js")}}"></script>
    <script src="{{asset("DataTables/RowReorder/js/dataTables.rowReorder.min.js")}}"></script>
    <script src="{{asset("js/toastr.min.js")}}"></script>
    <script src="{{asset("adminlte/js/administracion.js")}}"></script>

    @yield('scripts')
</body>
</html>
