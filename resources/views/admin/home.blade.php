@extends('admin.layouts.app')
@section('content')
	 <!-- Content Header (Page header) -->
	<section class="content-header">
	  <h1>
	    Admin Panel
	    <small>All of stuff</small>
	  </h1>
	  <ol class="breadcrumb">
	    <li><a href="/admin/home"><i class="fa fa-dashboard"></i> Dashboard</a></li>
	    <li class="active">Your here</li>
	  </ol>
	</section>

	<!-- Main content -->
	<section class="content container-fluid">

	 {{--  ------------------------ --}}
	 {{--    | Your Page Content Here | --}}
	 <!-- /.content -->

		{{-- <div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<div class="panel panel-default">
						<div class="panel-heading">Admin Dashboard</div>
						<div class="panel-body">hi {{ Auth::guard('admin')->user()->name }} - with id of {{ Auth::user()->id}} <br>

						 
						</div>
					</div>
				</div>
			</div>
		</div> --}}

	 {{--    ------------------------ --}}

	</section>

@endsection