<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin</title>
    <script src="{{ asset('js/pace/pace.js') }}"></script>
    <link href="{{ asset('css/pace/themes/red/pace-theme-minimal.css') }}" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet"> 
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet"> 

    <link rel="stylesheet" href="{{ asset('css/admin/bower_components/Ionicons/css/ionicons.min.css') }}">

    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('css/admin/bower_components/datatables/dataTables.bootstrap.min.css') }}">

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('css/admin/dist/css/AdminLTE.min.css') }}">

    {{-- theme --}}
    <link rel="stylesheet" href="{{ asset('css/admin/dist/css/skins/skin-blue.min.css') }}">

    <link href="{{ asset('css/dist/jquery.fancybox.min.css') }}" rel="stylesheet">

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
   
</head>
<body class="hold-transition skin-blue sidebar-mini">
    <div id="app">
        <div class="wrapper">
            <!-- Main Header -->
            @include('admin.layouts.header')

            <!-- Left side column. contains the logo and sidebar -->
            @include('admin.layouts.aside')

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                @yield('content')
                {{-- @include('admin.layouts.contentwrapper') --}}
            </div>
            <!-- /.content-wrapper -->

            <!-- Main Footer -->
            @include('admin.layouts.footer')
        </div>


        
    </div>

    <!-- Scripts -->

    <!-- jQuery 3 -->
    <script src="{{ asset('js/admin/jquery.min.js') }}"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="{{ asset('js/admin/bootstrap.min.js') }}"></script>

    <!-- DataTables -->
    <script src="{{ asset('js/admin/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/admin/dataTables.bootstrap.min.js') }}"></script>
    <!-- SlimScroll -->
    <script src="{{ asset('js/admin/jquery.slimscroll.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('js/admin/fastclick.js') }}"></script> 
    <!-- AdminLTE App -->
    <script src="{{ asset('js/admin/adminlte.min.js') }}"></script>

    <script src="{{ asset('js/jquery.fancybox.min.js') }}"></script>
    <!-- page script -->
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })

 
</script>

</body>
</html>
