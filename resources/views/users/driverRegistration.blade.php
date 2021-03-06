@extends('layouts.master')
@section('content') 
<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Driver
        <small>Registration</small>
      </h1>
      <ol class="breadcrumb">
        <li><a ><i class="fa fa-home"></i> Home</a></li>
        <li><a >Driver</a></li>
        <li class="active">Registration</li>
      </ol>
    </section>

<!-- Main content -->
    <section class="content">  
	<div class="row"> 
		<div class="col-md-8 col-md-offset-2">
			<form class="form-horizontal" method="post" action="/createDriver" enctype="multipart/form-data">
				{{ csrf_field() }}
	            <div class="panel panel-info">
	                <div class="panel-heading">Driver Registration</div> 
	                <div class="panel-body"> 
	                    <div class="form-group">
                    		<label for="firstName" class="col-md-4 control-label">First Name</label>
                    		<div class="col-md-6">
                            <input id="firstName" type="text" class="form-control" name="firstName" placeholder="First name" required autofocus>
                            </div>
                    	</div>

                    	<div class="form-group">
                    		<label for="lastName" class="col-md-4 control-label">Last Name</label>
                    		<div class="col-md-6">
                            <input id="lastName" type="text" class="form-control" name="lastName" placeholder="Last name" required autofocus>
                            </div>
                    	</div>

                    	<div class="form-group">
                    		<label for="birthDate" class="col-md-4 control-label">Birth Date</label>
                    		<div class="col-md-6">
                            <input id="birthDate" type="date" class="form-control" name="birthDate"  required autofocus max="{{ $carbon }}">
                            </div>
                    	</div> 

		                 <div class="form-group">
	                		<label for="name" class="col-md-4 control-label">Type of Driver's License</label>
	                		<div class="col-md-6"> 
	                			<!-- Single button -->
								<select id="licenseType" class="form-control  input-sm" name="licenseType">
									{{-- <option value="">Select Type</option> --}} 
				                    <option value="Non-Professional">Non-Professional</option>
				                    <option value="Professional">Professional</option>
				                </select>
                            </div> 
	                	</div>


	                	<div class="form-group">
                    		<label for="name" class="col-md-4 control-label">License Picture</label>
                    		<div class="col-md-6">
                    		<input type="file" name="licensePicture" id="licensePicture" accept="image/*"> 
                            </div>
                    	</div>
	                    @include('layouts.required')
	                </div>
	                <div class="panel-footer"><button type="submit" class="btn btn-info">Register as Driver</button></div>
	            </div>
	        </form>
        </div>
	</div> 
	</section>
@endsection
