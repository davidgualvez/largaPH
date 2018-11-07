@extends('admin.layouts.app')

@section('content')
	<!-- Content Header (Page header) -->
	<section class="content-header">
	  <h1>
	    User's
	    <small>List of Commuter</small>
	  </h1>
	  <ol class="breadcrumb">
	    <li><a href="/admin/home"><i class="fa fa-dashboard"></i> Dashboard</a></li>
	    <li>Users</li>
	    <li class="active">Commuter</li>
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
              <h3 class="box-title">Commuters</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding"">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Avatar</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Mobile #</th>
                  <th>Member since</th>
                </tr>
                </thead>

                <tbody> 
                @foreach($commuters as $c) 
                <tr> 
                	<td><center><img src="{{\Storage::disk('s3')->url($c->avatarPath)}}" width="30" height="30"></center></td>
                	<td>{{ucfirst($c->name)}}</td>
                	<td>{{$c->email}}</td>
                	<td>{{$c->mobileNumber}}</td>
                	<td>{{\Carbon\Carbon::parse($c->created_at)->toDayDateTimeString()}}</td>
{{-- 
                  <td><a href="{{\Storage::disk('s3')->url($c->crPath)}}" data-fancybox data-caption="Vehicle C-R photo">view CR</a> - Exp Date: {{\Carbon\Carbon::parse($v->cr_exp)->toFormattedDateString()}}</td>
                  <td>{{\Carbon\Carbon::parse($v->created_at)->toDayDateTimeString()}}</td>  --}}

                </tr>   
                @endforeach
                </tbody>

                <tfoot>
                <tr>
                  <th>Avatar</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Mobile #</th>
                  <th>Member since</th>
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