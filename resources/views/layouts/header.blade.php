<header class="main-header">  
      <!-- Logo -->
      <a href="home" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>L</b>PH</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg">Larga<b>PH</b></span>
      </a>

      <!-- Header Navbar -->
      <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav"> 

            <!-- Notifications Menu -->
            <li class="dropdown notifications-menu">
              <!-- Menu toggle button -->
              <?php $noti_unread = \App\Notification::
                where('users_id',Auth::user()->id)
                ->where('read_at',null)
                ->get(); 
            ?>
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-bell-o"></i>
                <span class="label label-warning">{{$noti_unread->count()}}</span>
              </a> 
              <ul class="dropdown-menu">
                <li class="header">You have {{$noti_unread->count()}} notifications</li>
                <li> 
                  <!-- Inner Menu: contains the notifications -->
                  <ul class="menu">
                    @if($noti_unread->count() <= 0)
                    <li><!-- start notification -->
                      <a>
                        <i class="text-aqua"></i>No Notification
                      </a>
                    </li>
                    <!-- end notification -->
                    @else
                        <?php 
                          $notifications = \App\Notification::where('users_id',\Auth::user()->id)->orderBy('created_at','desc')->get();
                        ?>
                      @foreach($notifications as $noti)
                        <li><!-- start notification -->
                          <a href="/notifications">
                            <i class="fa fa-users text-aqua"></i> {{ $noti->data }}
                          </a>
                        </li>
                      @endforeach
                      <!-- end notification -->
                    @endif
                  </ul>
                </li>
                <li class="footer"><a href="/notifications">View all</a></li>
              </ul>
            </li> 
            <!-- User Account Menu -->
            <li class="dropdown user user-menu">
              <!-- Menu Toggle Button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <!-- The user image in the navbar-->
                <img src="{{ \Storage::disk('s3')->url(Auth::user()->avatarPath)}}" class="user-image" alt="User Image">
                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                <span class="hidden-xs">{{ucfirst(Auth::user()->name)}}</span>
              </a>
              <ul class="dropdown-menu">
                <!-- The user image in the menu -->
                <li class="user-header">
                  <img src="{{ \Storage::disk('s3')->url(Auth::user()->avatarPath)}}" class="img-circle" alt="User Image">

                  <p>
                    {{ucfirst(Auth::user()->name)}} - <?php 
                        if(Auth::user()->isDriver == 1){
                            echo "Commuter/Driver";
                        }else{
                            echo "Commuter";
                        }
                    ?>
                    <small>Member since {{Auth::user()->created_at->toFormattedDateString()}}</small>
                  </p>
                </li> 
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="/myProfile" class="btn btn-default btn-flat">Profile</a>
                  </div>
                  <div class="pull-right">
                    <form method="post" action="{{ route('user.logout')}}">
                      {{csrf_field()}}
                      <button type="submit" class="btn btn-default btn-flat">Sign out</button>  
                    </form> 
                  </div>
                </li> 
              </ul>
            </li> 
            <li>
              <a href="/userSettings" ><i class="fa fa-gears"></i></a>
            </li>
          </ul>
        </div>
      </nav>
    </header>