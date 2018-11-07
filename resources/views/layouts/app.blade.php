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
    <link href="{{ asset('css/datetimepicker.css') }}" rel="stylesheet">
    <link href="{{ asset('css/Footer-with-button-logo.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dist/fontawesome-stars.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dist/jquery.fancybox.min.css') }}" rel="stylesheet">
   
</head>
<body style="padding-bottom: 70px;">
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                    LargaPH    {{-- {{ config('app.name', 'Laravel') }} --}}
                    </a>

                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        <li><a href="/home">Home</a></li>
                        @if(!Auth::guest())
                            <li><a href="/createPost">Create a Trip</a></li>
                            @if( Auth::user()->isDriver == 1)
                            <li><a href="/bids">Bids</a></li>
                            @endif 
                        @endif
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            @if( Auth::user()->isDriver == 0)
                            <li><a href="/driverRegistration">Be a Driver</a></li>
                            @endif
                            <li><a href="/myProfile">Profile</a></li>
                            <li class="dropdown">

                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    Hi! {{ Auth::user()->name }} <span class="caret"></span> &nbsp; <img style="box-shadow: 0px 0px 1px 0px gray;" align="center" class="img-circle" 
                                    src="{{ \Storage::disk('s3')->url(Auth::user()->avatarPath)}}" width="24" height="24">
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="/userSettings">Account Settings</a></li>
                                    <li>
                                        <a href="/notifications">Notification 
                                            <?php $noti_unread = \App\Notification::
                                                where('users_id',Auth::user()->id)
                                                ->where('read_at',null)
                                                ->count(); 
                                            ?>
                                            <span class="badge">{{$noti_unread}}</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('user.logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('user.logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>

                                </ul>

                            </li> 

                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')

        {{-- @include('layouts.footer') --}}
    </div> 
    <!-- Scripts -->
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> 

    <script src="{{ asset('js/datetimepicker.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/jquery.barrating.js') }}"></script>
    <script src="{{ asset('js/examples.js') }}"></script>
    <script src="{{ asset('js/jquery.fancybox.min.js') }}"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
 
</body>
</html>
