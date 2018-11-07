@extends('admin.layouts.app')
@section('content') 
	 <!-- Content Header (Page header) -->
	<section class="content-header">
	  <h1>  
	    Admin Panel
	    <small>Active Subscription</small>
	  </h1>
	  <ol class="breadcrumb">
	    <li><a href="/admin/home"><i class="fa fa-dashboard"></i> Dashboard</a></li>
	    <li>Subsciption</li>
	    <li class="active">Active Subscription</li>
	  </ol>
	</section> 

	<!-- Main content -->
	<section class="content container-fluid">

	 {{--  ------------------------ --}}
	 {{--    | Your Page Content Here | --}}
	 <!-- /.content -->
 	<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Active Subscription</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding"">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>User</th>
                  <th>Plan</th>
                  <th># of Months</th>
                  <th>Start</th>
                  <th>End</th> 
                </tr>
                </thead>

                <tbody> 
                @foreach($subscriptions as $s) 
                      <?php 
                        $user = \DB::table('users')->where('id',$s->users_id)->get();
                        $plan = \DB::table('plans')->where('id',$s->plan_id)->get(); 
                      ?>
                  <tr>
                    <td><a target="#" href="/profile/{{$user[0]->id}}">{{$user[0]->name}}</a></td>
                    <td>{{ucfirst($plan[0]->name)}}</td>
                    <td>{{$s->number_of_month}}</td>
                    <td>{{$s->start}}</td>
                    <td>{{$s->end}}</td>
                  </tr>  
                @endforeach
                </tbody>

                <tfoot>
                <tr>
                  <th>User</th>
                  <th>Plan</th>
                  <th># of Months</th>
                  <th>Start</th>
                  <th>End</th> 
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
   
        </div>
        <!-- /.col -->
      </div>

	 {{--    ------------------------ --}}

	</section>

@endsection