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
                       
                     
                      <!-- User Account Menu -->
                      <li class="dropdown user user-menu">
                        <!-- Menu Toggle Button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                          <!-- The user image in the navbar-->
                          <img src="https://s3-us-west-1.amazonaws.com/largaph-files/admin-avatar.png" class="user-image" alt="User Image">
                          <!-- hidden-xs hides the username on small devices so only the image appears. -->
                          <span class="hidden-xs">{{ucfirst(Auth::user()->name)}}</span>
                        </a>
                        <ul class="dropdown-menu">
                          <!-- The user image in the menu -->
                          <li class="user-header">
                            <img src="https://s3-us-west-1.amazonaws.com/largaph-files/admin-avatar.png" class="img-circle" alt="User Image">

                            <p>
                              {{ucfirst(Auth::user()->name)}} - Web/Desktop Developer
                              <small>Member since Aug. 2017</small>
                            </p>
                          </li>
                          <!-- Menu Body -->
                          {{-- <li class="user-body">
                            <div class="row">
                              <div class="col-xs-4 text-center">
                                <a href="#">Followers</a>
                              </div>
                              <div class="col-xs-4 text-center">
                                <a href="#">Sales</a>
                              </div>
                              <div class="col-xs-4 text-center">
                                <a href="#">Friends</a>
                              </div>
                            </div>
                            <!-- /.row -->
                          </li> --}}
                          <!-- Menu Footer-->
                          <li class="user-footer">
                            {{-- <div class="pull-left">
                              <a href="#" class="btn btn-default btn-flat">Profile</a>
                            </div> --}}
                            <div class="pull-right">
                              <form method="post" action="{{ route('admin.logout')}}">
                                {{csrf_field()}}
                                <button type="submit" class="btn btn-default btn-flat">Sign out</button> 
                                
                              </form> 
                            </div>
                          </li>
                        </ul>
                      </li> 
                    </ul>
                  </div>
                </nav>
              </header>