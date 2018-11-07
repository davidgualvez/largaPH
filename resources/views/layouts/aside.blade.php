 <aside class="main-sidebar"> 

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ \Storage::disk('s3')->url(Auth::user()->avatarPath)}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ucfirst(Auth::user()->name)}}</p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div> 
      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <?php 
          $check_driver = \App\Driver::where('users_id',Auth::user()->id)->get();
        ?>
      	@if(!$check_driver->first())
      	<li><a href="/driverRegistration"><i class="fa fa-share"></i> <span>Be a Driver</span></a></li>
      	@endif
        <li class="header">USER ACCESS</li>
        <!-- Optionally, you can add icons to the links -->
        {{-- <li class="active"><a href="#"><i class="fa fa-link"></i> <span>Link</span></a></li> --}}
        <li><a href="/home"><i class="fa fa-home"></i> <span>Home</span></a></li> 
        @if(!Auth::guest())
        	<li><a href="/createPost"><i class="fa fa-tripadvisor"></i> <span>Create a Trip</span></a></li>
        	 @if( Auth::user()->isDriver == 1)
        	 <li><a href="/bids"><i class="fa fa-money"></i> <span>My Bids</span></a></li>
        	 @endif
        @endif
       
      	@if(Auth::user()->isDriver == 1)  
      		<?php 
      			$driver = \App\Driver::where('users_id',Auth::user()->id)->get();
      		?>
        	<li><a href="/driverProfile/{{$driver[0]->id}}"><i class="fa fa-user"></i> <span>Driver Profile</span></a></li>  
      	@endif  
        <li><a href="{{route('subscription')}}"><i class="fa fa-ticket"></i> <span>Subscription</span></a></li>  
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>