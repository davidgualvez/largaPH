 <!DOCTYPE html> 
 <html lang="{{ app()->getLocale() }}">
 <head>
 	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
 	<title>Larga PH</title>

 	{{-- default css --}}
 	<script src="{{ asset('js/pace/pace.js') }}"></script>
    <link href="{{ asset('css/pace/themes/red/pace-theme-minimal.css') }}" rel="stylesheet" />

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet"> 
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet"> 
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('themes/dist/css/AdminLTE.min.css') }}"> 
    {{-- theme --}}
    <link rel="stylesheet" href="{{ asset('themes/dist/css/skins/skin-yellow.min.css') }}">
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"> 
 	{{-- custom css --}}
 	@yield('css')
 </head>
 <body class="hold-transition skin-yellow sidebar-mini">
    <div id="app">
        <div class="wrapper">
            <!-- Main Header -->
            @include('layouts.header')

            <!-- Left side column. contains the logo and sidebar -->
            @include('layouts.aside')

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                @yield('content')
                {{-- @include('admin.layouts.contentwrapper') --}}
            </div>
            <!-- /.content-wrapper -->

            <!-- Main Footer -->
            @include('layouts.footer')
        </div>

 
        
    </div>
{{-- default js --}} 
<!-- jQuery 3 -->
<script src="{{ asset('themes/bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('themes/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
{{-- custom js --}}
@yield('js')
<!-- AdminLTE App -->
<script src="{{ asset('themes/dist/js/adminlte.min.js') }}"></script>
<!-- SlimScroll -->
<script src="{{ asset('js/admin/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('js/admin/fastclick.js') }}"></script> 
<script src="{{ asset('js/app.js') }}"></script>



</body>
 </html>