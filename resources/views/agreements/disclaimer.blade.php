<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head> 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>LargaPH{{-- {{ config('app.name', 'Laravel') }} --}}</title>
    <script src="{{ asset('js/pace/pace.js') }}"></script>
    <link href="{{ asset('css/pace/themes/red/pace-theme-minimal.css') }}" rel="stylesheet" />
    <!-- Styles -->
    <!-- Latest compiled and minified CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet"> 
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet"> 
    
    <!-- Optional theme -->
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous"> --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"> 
   
</head>
<body style="padding-bottom: 70px;">
    <div id="app"> 
    <br>
    <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <center><b><h2>LargaPH</h2></b></center>
            <br>
            <div class="panel panel-default">
                <div class="panel-heading">Disclaimer <span class="pull-right" ><a href="/"><i class="fa fa-home fa-lg"></i></a></span></div>
                <div class="panel-body"> 
                	<div class="col-md-12" style=" text-indent: 5em; text-align: justify;">
                		Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                		<br>
                		Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                		proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                	</div>
                </div>
            </div>
        </div>
    </div>
</div> 
    </div> 
    <!-- Scripts -->
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>  
    <script src="{{ asset('js/app.js') }}"></script>  
</body>
</html>
