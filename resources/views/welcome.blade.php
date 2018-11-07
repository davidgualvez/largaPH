<!doctype html>
<html lang="{{ app()->getLocale() }}">
 <head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="../assets/img/favicon.ico">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Larga PH</title>
 
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <script src="{{ asset('js/pace/pace.js') }}"></script>
    <link href="{{ asset('css/pace/themes/red/pace-theme-minimal.css') }}" rel="stylesheet" />
    
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet"> 
    <link href="{{ asset('css/paper-kit.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/demo.css') }}" rel="stylesheet" />

    <!--     Fonts and icons     -->
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,300,700' rel='stylesheet' type='text/css'> 
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{ asset('css/nucleo-icons.css') }}" rel="stylesheet"> 

    
</head>
<body>

<div id="fb-root"></div>
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '653483351516472',
      xfbml      : true,
      version    : 'v2.10'
    });
    FB.AppEvents.logPageView();
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>

    <nav class="navbar navbar-toggleable-md fixed-top navbar-transparent" color-on-scroll="300">
        <div class="container">
            <div class="navbar-translate">
                {{-- <button class="navbar-toggler navbar-toggler-right navbar-burger" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar"></span>
                    <span class="navbar-toggler-bar"></span>
                    <span class="navbar-toggler-bar"></span>
                </button> --}}
                <a class="navbar-brand" href="/">LargaPH</a> 
                 
            </div>
            {{-- <div class="collapse navbar-collapse" id="navbarToggler">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="../index.html" class="nav-link"><i class="nc-icon nc-layout-11"></i>Components</a>
                    </li>
                    <li class="nav-item">
                        <a href="../documentation/tutorial-components.html" target="_blank" class="nav-link"><i class="nc-icon nc-book-bookmark"></i>  Documentation</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" rel="tooltip" title="Follow us on Twitter" data-placement="bottom" href="https://twitter.com/CreativeTim" target="_blank">
                            <i class="fa fa-twitter"></i>
                            <p class="hidden-lg-up">Twitter</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" rel="tooltip" title="Like us on Facebook" data-placement="bottom" href="https://www.facebook.com/CreativeTim" target="_blank">
                            <i class="fa fa-facebook-square"></i>
                            <p class="hidden-lg-up">Facebook</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" rel="tooltip" title="Follow us on Instagram" data-placement="bottom" href="https://www.instagram.com/CreativeTimOfficial" target="_blank">
                            <i class="fa fa-instagram"></i>
                            <p class="hidden-lg-up">Instagram</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" rel="tooltip" title="Star on GitHub" data-placement="bottom" href="https://www.github.com/CreativeTimOfficial" target="_blank">
                            <i class="fa fa-github"></i>
                            <p class="hidden-lg-up">GitHub</p>
                        </a>
                    </li>
                </ul>
            </div> --}}
        </div>
    </nav>

        <div class="page-header section-dark" data-parallax="true" style="background-image: url('/img/street.jpg');">
            <div class="filter"></div>
            <div class="container">
                <div class="motto text-center"> 
                        <h1>LARGA PH</h1>
                        <h3>Another way for Commuter to bring your families and love ones to a special vacation!</h3>
                        <br />
                        @if(Auth::guest())
                        <a href="/login" class="btn btn-outline-neutral btn-round"><i class="fa fa-sign-in"></i>Login</a>
                        <a href="/register" class="btn btn-outline-neutral btn-round"><i class="fa fa-registered"></i>Register</a>
                        @else
                        <a href="/home" class="btn btn-outline-neutral btn-round"><i class="fa fa-sign-in"></i>Home</a>
                        @endif
                </div> 
            </div>
        </div>
        <div class="main">
            <div class="section text-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <h2 class="title">Let's talk about your Destination</h2>
                        <h5 class="description">Introducing the ultimate mobile web app
                            for looking best driver with your phone</h5>
                        <br>
                        <p style="text-align: justify;">
                            
                            Larga.Ph is an online application webpage that will help commuters to find their transportation on a given time and date, this is a modern renting of vehicles or “arkila” process but it will use an online application. </p><p style="text-align: justify;">
Commuters and drivers or vehicle owners will have a community wherein they can find each other; drivers can find local commuters that needs transportation. The application will look for the vehicle a commuter is in need automatically by contacting all available drivers around the area of the location the commuter set. Commuters must login to the website and create an account, drivers must also have an account and register for the application to find them. Vehicle owners are required to upload photo of their face, vehicle (car, truck, van), OR/CR of their vehicle and their valid driver’s license, this is for the commuters to check when a driver creates a bid. During registration the commuter shall select a city wherein the commuter can contact all automobile owners registered and has the same city recorded at once, this is for faster responses, the system will automatically send notifications to the driver’s account or the system will send SMS messages directly to the driver’s phones. Registered drivers can be rated (1-5 stars) by commuters based from the customers’ service satisfaction, a commuter can also create a comment on the drivers’ profile, this is to help other commuters during selection of drivers. 
                        </p>
                        {{-- <a href="#paper-kit" class="btn btn-danger btn-round">See Details</a> --}}
                    </div>
                </div>
                <br/><br/>
                <div class="row">
                    <div class="col-md-3">
                        <div class="info">
                            <div class="icon icon-danger">
                                <i class="nc-icon nc-album-2"></i>
                            </div>
                            <div class="description">
                                <h4 class="info-title">Beautiful Vehicles</h4>
                                <p class="description">A thing used for transporting people especially on land, such as SUV</p>
                                {{-- <a href="#" class="btn btn-link btn-danger">See more</a> --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="info">
                            <div class="icon icon-danger">
                                <i class="nc-icon nc-bulb-63"></i>
                            </div>
                            <div class="description">
                                <h4 class="info-title">User's Profile</h4>
                                <p>This is where the personal and useful data of the user is displayed. </p>
                                {{-- <a href="#" class="btn btn-link btn-danger">See more</a> --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="info">
                            <div class="icon icon-danger">
                                <i class="nc-icon nc-chart-bar-32"></i>
                            </div>
                            <div class="description">
                                <h4 class="info-title">Driver's Review</h4>
                                <p>This shows the reviews of how the service of the driver is to the commuters. </p>
                                {{-- <a href="#" class="btn btn-link btn-danger">See more</a> --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="info">
                            <div class="icon icon-danger">
                                <i class="nc-icon nc-sun-fog-29"></i>
                            </div>
                            <div class="description">
                                <h4 class="info-title">Fresh Bids & Post</h4>
                                <p>In here, posts from the commuters and bids from the drivers are updated/realtime</p>
                                {{-- <a href="#" class="btn btn-link btn-danger">See more</a> --}}
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="section section-dark text-center">
            <div class="container">
                <h2 class="title">Let's talk about us</h2>
                <div class="row">
                    <div class="col-md-3">
                        <div class="card card-profile card-plain">
                            <div class="card-avatar">
                                <a href="#"><img src="https://s3-us-west-1.amazonaws.com/largaph-files/tan.jpg" alt="..."></a>
                            </div>
                            <div class="card-block">
                                <a href="#">
                                    <div class="author">
                                        <h4 class="card-title">Tan</h4>
                                        <h6 class="card-category">Product Manager</h6>
                                    </div>
                                </a>
                                <p class="card-description text-center">
                                Teamwork is so important that it is virtually impossible for you to reach the heights of your capabilities or make the money that you want without becoming very good at it.
                                </p>
                            </div>
                            <div class="card-footer text-center">
                                {{-- <a href="#pablo" class="btn btn-link btn-just-icon btn-neutral"><i class="fa fa-twitter"></i></a>
                                <a href="#pablo" class="btn btn-link btn-just-icon btn-neutral"><i class="fa fa-google-plus"></i></a> --}}
                                <a href="https://www.facebook.com/tbarja" target="target_" class="btn btn-link btn-just-icon btn-neutral"><i class="fa fa-facebook"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card card-profile card-plain">
                            <div class="card-avatar">
                                <a href="#"><img src="https://s3-us-west-1.amazonaws.com/largaph-files/annr.jpg" alt="..."></a>
                            </div>
                            <div class="card-block">
                                <a href="#">
                                    <div class="author">
                                        <h4 class="card-title">Annarie</h4>
                                        <h6 class="card-category">Designer</h6>
                                    </div>
                                </a>
                                <p class="card-description text-center">
                                A group becomes a team when each member is sure enough of himself and his contribution to praise the skill of the others. No one can whistle a symphony. It takes an orchestra to play it.
                                </p>
                            </div>
                            <div class="card-footer text-center">
                                {{-- <a href="#pablo" class="btn btn-link btn-just-icon btn-neutral"><i class="fa fa-twitter"></i></a>
                                <a href="#pablo" class="btn btn-link btn-just-icon btn-neutral"><i class="fa fa-google-plus"></i></a> --}}
                                <a href="https://www.facebook.com/hanseonviv" target="target_" class="btn btn-link btn-just-icon btn-neutral"><i class="fa fa-facebook"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card card-profile card-plain">
                            <div class="card-avatar">
                                <a href="#"><img src="https://s3-us-west-1.amazonaws.com/largaph-files/david.jpg" alt="..."></a>
                            </div>
                            <div class="card-block">
                                <a href="#">
                                    <div class="author">
                                        <h4 class="card-title">David</h4>
                                        <h6 class="card-category">Developer</h6>
                                    </div>
                                </a>
                                <p class="card-description text-center">
                                The strength of each member is the team. If you can laugh together, you can work together, silence isn’t golden, it’s deadly.
                                </p>
                            </div>
                            <div class="card-footer text-center">
                                <a href="https://twitter.com/DGualvez" target="target_" class="btn btn-link btn-just-icon btn-neutral"><i class="fa fa-twitter"></i></a>
                                <a href="https://plus.google.com/u/0/115388001397327549563" target="target_" class="btn btn-link btn-just-icon btn-neutral"><i class="fa fa-google-plus"></i></a>
                                <a href="https://www.facebook.com/3vilsanta" target="target_" class="btn btn-link btn-just-icon btn-neutral"><i class="fa fa-facebook"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card card-profile card-plain">
                            <div class="card-avatar">
                                <a href="#"><img src="https://s3-us-west-1.amazonaws.com/largaph-files/lyz.jpg" alt="..."></a>
                            </div>
                            <div class="card-block">
                                <a href="#">
                                    <div class="author">
                                        <h4 class="card-title">Lyzle</h4>
                                        <h6 class="card-category">Designer</h6>
                                    </div>
                                </a>
                                <p class="card-description text-center">
                                An artist of considerable range, Lyzl — the name taken by Lee Min Ho, performs and records all of his own music, giving it a warm, intimate feel with a solid groove structure.
                                </p>
                            </div>
                            <div class="card-footer text-center">
                                {{-- <a href="#" class="btn btn-link btn-just-icon btn-neutral"><i class="fa fa-twitter"></i></a>
                                <a href="#" class="btn btn-link btn-just-icon btn-neutral"><i class="fa fa-google-plus"></i></a> --}}
                                <a href="https://www.facebook.com/Lyzle.Vicente23" target="target_" class="btn btn-link btn-just-icon btn-neutral"><i class="fa fa-facebook"></i></a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

            <div class="section landing-section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 offset-md-2">
                            <h2 class="text-center">Keep in touch?</h2>
                            <form class="contact-form" method="post" action="/contactus">
                                {{csrf_field()}}
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Name</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="nc-icon nc-single-02"></i>
                                            </span>
                                            <input type="text" class="form-control" placeholder="Name" name="name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Email</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="nc-icon nc-email-85"></i>
                                            </span>
                                            <input type="text" class="form-control" placeholder="Email" name="email">
                                        </div>
                                    </div>
                                </div>
                                <label>Message</label>
                                <textarea class="form-control" rows="4" name="message" placeholder="Tell us your thoughts and feelings..."></textarea> 
                                <div class="row">
                                    <div class="col-md-4 offset-md-4">
                                        <button type="submit" class="btn btn-danger btn-lg btn-fill">Send Message</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <footer class="footer section-dark">
        <div class="container">
            <div class="row">
                <nav class="footer-nav">
                    <ul>
                        <li>
                            <div
                              class="fb-like"
                              data-share="true"
                              data-layout="button_count"
                              {{-- data-width="450" --}}
                              data-show-faces="true">
                            </div>
                            {{-- <div class="fb-like" data-href="http://largaph.herokuapp.com" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div> --}}
                        </li>
                    </ul>
                </nav>
                <div class="credits ml-auto">
                    <span class="copyright">
                        © <script>document.write(new Date().getFullYear())</script>, made with <i class="fa fa-heart heart"></i> by t.a.d.a
                    </span>
                </div>
            </div>
        </div>
    </footer>
</body>

<!-- Core JS Files -->
<script src="{{ asset('js/jquery-3.2.1.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/jquery-ui-1.12.1.custom.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/tether.min.js') }}" type="text/javascript"></script> 
<script src="{{ asset('js/bootstrap.min.js')}}"></script>
<!--  Paper Kit Initialization snd functons -->
<script src="{{ asset('js/paper-kit.js?v=2.0.0')}}"></script>
<script src='https://www.google.com/recaptcha/api.js'></script>
</html>