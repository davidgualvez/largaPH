@extends('admin.layouts.app')
@section('content')
	 <!-- Content Header (Page header) -->
	<section class="content-header">
	  <h1>
	    Admin Panel
	    <small>New vehicle entry for approval</small>
	  </h1>
	  <ol class="breadcrumb">
	    <li><a href="/admin/home"><i class="fa fa-dashboard"></i> Dashboard</a></li>
	    <li>Vehicle</li>
	    <li class="active">Vehicle entry</li>
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
              <h3 class="box-title">New entry of Registered Vehicle's</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding"">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Driver</th>
                  <th>Vehicle</th>
                  <th>Capacity</th>
                  <th>OR - Exp Date</th>
                  <th>CR - Exp Date</th>
                  <th>Created at</th>
                  <th>Action</th>
                </tr>
                </thead>

                <tbody> 
                @foreach($vs as $v) 
                <tr>
                  <td>
                  	<a href="/driverProfile/{{$v->drivers_id}}" target="_blank">
                  		<?php 
                  			$driver = \DB::table('drivers')->where('id',$v->drivers_id)->get();
                  		?>
                  		{{$driver[0]->firstName}}
                  	</a>
                  </td>
                  <td>
                  	<?php $vt = \DB::table('vehicle_type')->where('id',$v->vehicle_type_id)->get(); ?>
                  	{{$vt[0]->description}}
                  </td>
                  <td>{{$v->seatingCapacity}}</td>
                  {{-- <a href="{{\Storage::disk('s3')->url($vehicle->orPath)}}" data-fancybox data-caption="Vehicle O-R photo"> --}}
                  <td><a href="{{\Storage::disk('s3')->url($v->orPath)}}" data-fancybox data-caption="Vehicle O-R photo">view OR</a></td>
                  <td><a href="{{\Storage::disk('s3')->url($v->crPath)}}" data-fancybox data-caption="Vehicle C-R photo">view CR</a> - Exp Date: {{\Carbon\Carbon::parse($v->cr_exp)->toFormattedDateString()}}</td>
                  <td>{{\Carbon\Carbon::parse($v->created_at)->toDayDateTimeString()}}</td>
                  <td>
                    <form method="POST" action="/admin/approve_vehicle/{{$v->id}}">
                    {{csrf_field()}} 
                     <button type="submit" onclick="myFunction()">approve</button>
                    </form>
                  </td> 
                </tr>   
                @endforeach
                </tbody>

                <tfoot>
                <tr>
                  <th>Driver</th>
                  <th>Vehicle</th>
                  <th>Capacity</th>
                  <th>OR - Exp Date</th>
                  <th>CR - Exp Date</th>
                  <th>Created at</th>
                  <th>Action</th>
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