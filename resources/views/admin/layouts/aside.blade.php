<aside class="main-sidebar"> 

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="https://s3-us-west-1.amazonaws.com/largaph-files/admin-avatar.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>T.A.D.A Solution</p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      {{-- <!-- search form (Optional) -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
        </div>
      </form>
      <!-- /.search form --> --}}

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <!-- Optionally, you can add icons to the links -->
        {{-- <li class="active"><a href="#"><i class="fa fa-link"></i> <span>Link</span></a></li> --}}
        <li><a href="/admin/home"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        <li class="treeview">
          <a href="#"><i class="fa fa-car"></i> <span>Vehicle</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('admin.vehicle_entry')}}"><i class="fa fa-plus-square-o"></i> New Entry</a></li>
           {{--  <li><a href="#"><i class="fa fa-history"></i> Entry History</a></li> --}}
          </ul>
        </li>
        {{-- <li><a href="/admin/home"><i class="fa fa-car"></i> <span>Vehicle</span></a></li> --}}
        <li><a href="/admin/messages"><i class="fa fa-commenting"></i> <span>Message's</span></a></li>

        <li class="treeview">
          <a href="#"><i class="fa fa-users"></i> <span>User's</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('admin.commuters')}}"><i class="fa fa-user"></i> Commuter</a></li>
            <li><a href="{{route('admin.drivers')}}"><i class="fa fa-user-secret"></i> Driver</a></li>
            <li><a href="{{route('admin.unverified_drivers')}}"><i class="fa fa-user-secret"></i> Unverified Driver</a></li>
           {{--  <li><a href="#"><i class="fa fa-history"></i> Entry History</a></li> --}}
          </ul>
        </li>
        <li class="treeview">
          <a href="#"><i class="fa fa-ticket"></i> <span>Subscription</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('admin.payment_request')}}"><i class="fa fa-ticket"></i> Payment Request</a></li>
            <li><a href="{{ route('admin.active_subs')}}"><i class="fa fa-ticket"></i> Active Subscription</a></li> 
          </ul>
        </li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>