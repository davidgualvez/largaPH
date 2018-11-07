@extends('layouts.master')
@section('content') 
<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Vehicle
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="#">Vehicle</a></li>
        <li class="active">new</li>
      </ol>
    </section>

<!-- Main content -->
    <section class="content">   
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<form class="form-horizontal" method="POST" action="/storeVehicle/{{ $driver[0]->id }}" enctype="multipart/form-data">
	            {{ csrf_field() }}
				<div class="panel panel-info">
					<div class="panel-heading">New Vehicle</div>
					<div class="panel-body"> 
                        <div class="alert alert-warning" role="alert">
                          [ Note ] A suggested year model for your vehicle is 2010 up to present, in order to approve faster than usual.
                        </div>
						<div class="form-group">
                    		<label for="title" class="col-md-4 control-label">Title</label>
                    		<div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="title" required autofocus>
                            </div>
                    	</div>
                    	<div class="form-group">
	                		<label for="name" class="col-md-4 control-label">Vehicle type</label>
	                		<div class="col-md-6">  
								<select id="vehicleType" class="form-control  input-sm" name="vehicleType">
									{{-- <option value="">Select Type</option> --}} 
									@foreach($VehicleTypes as $vt)
				                    <option value="{{ $vt->id }}">{{ $vt->description }}</option>
				                    @endforeach
				                </select>
                            </div> 
	                	</div>
	                	<div class="form-group">
	                		<label for="name" class="col-md-4 control-label">Seats Capacity</label>
	                		<div class="col-md-6">  
	                			<select name="seatsCapacity" id="seatsNeed" class="form-control input-sm">
				                    <option value=""></option>
				                </select>
	                		</div>
	                	</div> 

                    	<div class="form-group">
                    		<label class="col-md-4 control-label">Vehicle Picture</label>
                    		<div class="col-md-6">
                    		<input type="file" name="vehiclePicture[]" id="vehiclePicture" accept="image/*" multiple> 
                            </div>
                    	</div>
						<div class="form-group">
                    		<label  class="col-md-4 control-label">OR Picture</label>
                    		<div class="col-md-6">
                    		<input type="file" name="orPicture" id="orPicture" accept="image/*"> 
                            </div>
	                    </div> 

	                    <div class="form-group">
                    		<label class="col-md-4 control-label">CR Picture</label>
                    		<div class="col-md-6">
                    		<input type="file" name="crPicture" id="crPicture" accept="image/*"> 
                            </div>
	                    </div>
	                    <div class="form-group">
                    		<label for="birthDate" class="col-md-4 control-label">CR exp</label>
                    		<div class="col-md-6">
                            <input id="cr_exp" type="date" class="form-control" name="cr_exp"  required autofocus min="{{\Carbon\Carbon::now()->toDateString()}}">
                            </div>
                    	</div> 

                    	@include('layouts.required')
					</div>
					<div type="submit" class="panel-footer"><button>Submit</button></div>
				</div>
				</form>
			</div>
		</div> 
	</section>
@endsection