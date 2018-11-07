@extends('layouts.master')
@section('content')  
<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Account Settings 
      </h1>
      <ol class="breadcrumb">
        <li><a ><i class="fa fa-home"></i> Home</a></li>
        <li><a >Account</a></li>
        <li class="active">settings</li>
      </ol>
    </section>

<!-- Main content -->
    <section class="content">    
		<div class="row">  
			<div class="col-md-8 col-md-offset-2">
				<form class="form-horizontal" method="POST" action="/updateSettings/{{ Auth::user()->id }}" enctype="multipart/form-data">
	            {{ csrf_field() }}
	            <div class="panel panel-info">
	                <div class="panel-heading">Account Settings</div> 
	                <div class="panel-body">  
                    	<div class="form-group">
                    		<label for="name" class="col-md-4 control-label">Name</label>
                    		<div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="name" value="{{ Auth::user()->name }}" required autofocus>
                            </div>
                    	</div>
                    	<div class="form-group">
                    		<label for="name" class="col-md-4 control-label">Email</label>
                    		<div class="col-md-6">
                            <input id="email" type="email" class="form-control" name="email" value="{{ Auth::user()->email }}" required autofocus>
                            </div>
                    	</div> 
                    	<div class="form-group">
                    		<label for="name" class="col-md-4 control-label">Mobile Number</label>
                    		<div class="col-md-6">
                            <input id="mobileNumber" type="text" class="form-control" name="mobileNumber" value="{{ Auth::user()->mobileNumber }}" required autofocus>
                            {{-- <br> --}}
                            <p for="mobileNumber">[Important] This is required for Notification!</p>
                            </div>
                            
                            {{-- [Important: for incoming notification from the app!] --}}
                    	</div>
                    	<div class="form-group">
                    		<label for="name" class="col-md-4 control-label">Profile Picture</label>
                    		<div class="col-md-6">
                    		<input type="file" name="avatarPath" id="avatarPath" accept="image/*"> 
                            </div>
                    	</div>
                    	@include('layouts.required')
	                </div>
	                <div class="panel-footer"><button type="submit" class="btn btn-info">Update</button></div>
	            </div>
	            </form>
	        </div>
		</div>
 
		@if(Auth::user()->isDriver == 1) 
		<div class="row">
			<div class="col-md-8 col-md-offset-2"> 
                <form class="form-horizontal" method="post" action="/updateDriver/{{$driver[0]->id}}" enctype="multipart/form-data">
					{{ csrf_field() }}
		            <div class="panel panel-danger">
		                <div class="panel-heading">Driver Settings</div> 
		                <div class="panel-body"> 
		                    <div class="form-group">
	                    		<label for="firstName" class="col-md-4 control-label">First Name</label>
	                    		<div class="col-md-6">
	                            <input id="firstName" type="text" class="form-control" name="firstName" value="{{$driver[0]->firstName}}" placeholder="First name" required autofocus>
	                            </div>
	                    	</div>
 
	                    	<div class="form-group">
	                    		<label for="lastName" class="col-md-4 control-label">Last Name</label>
	                    		<div class="col-md-6">
	                            <input id="lastName" type="text" class="form-control" name="lastName" value="{{$driver[0]->lastName}}" placeholder="Last name" required autofocus>
	                            </div>
	                    	</div>

	                    	<div class="form-group">
	                    		<label for="birthDate" class="col-md-4 control-label">Birth Date</label>
	                    		<div class="col-md-6">
	                            <input id="birthDate" type="date" class="form-control" name="birthDate" value="{{$driver[0]->birthDate}}"  required autofocus max="{{ \Carbon\Carbon::now() }}">
	                            </div>
	                    	</div> 
 
	                    	<div class="form-group">
		                		<label for="name" class="col-md-4 control-label">Target City</label>
		                		<div class="col-md-6"> 
		                			<select id="cityFrom" class="form-control  input-sm" name="cityFrom">
										<option value="">Select City {{ $driver[0]->targetCity }} </option>
										<?php 
											$CityMun = \App\CityMun::orderBy('description')->get();
										?>
										@foreach($CityMun as $city)
											@if($city->cityMunCode == $driver[0]->targetCity)
												<option value="{{ $city->cityMunCode }}" selected="selected">{{ $city->description }}</option>
											@else
												<option value="{{ $city->cityMunCode }}">{{ $city->description }}</option>
											@endif
					                    
					                    @endforeach
					                </select>
		                		</div>
		                	</div>
 
			                 <div class="form-group">
		                		<label for="name" class="col-md-4 control-label">Type of Driver's License</label>
		                		<div class="col-md-6"> 
		                			<!-- Single button -->
									<select id="licenseType" class="form-control  input-sm" name="licenseType"> 
										@if($driver[0]->typeOfLicense=="Non-Professional")
					                    	<option value="Non-Professional" selected="selected">Non-Professional</option>
					                    @else
					                    	<option value="Non-Professional">Non-Professional</option>
					                    @endif
					                    @if($driver[0]->typeOfLicense=="Professional")
					                    	<option value="Professional" selected="selected">Professional</option>
					                    @else
					                    	<option value="Professional">Professional</option>
					                    @endif
					                </select>
	                            </div> 
		                	</div>


		                	<div class="form-group">
	                    		<label for="name" class="col-md-4 control-label">Upload</label>
	                    		<div class="col-md-6">
	                    		<input type="file" name="licensePicture" id="licensePicture" accept="image/*"> 
	                            </div>
	                    	</div>
	                    	<div class="form-group">
	                    		<label for="currentLicense" class="col-md-4 control-label">Present License</label>
	                    		<div class="col-md-6"> 
	                    			<img src="{{\Storage::disk('s3')->url($driver[0]->licensePath)}}" width="100%" height="100%">
	                    		</div>
	                    	</div>

		                    @include('layouts.required')
		                </div>
		                <div class="panel-footer"><button type="submit" class="btn btn-info">update</button></div>
		            </div>
		        </form> 
	        </div>
		</div>
 
		<div class="row">
			<div class="col-md-8 col-md-offset-2">  
	            <div class="panel panel-info">
	                <div class="panel-heading">Vehicles 
	                <span class="pull-right"><a href="/newVehicle" class="glyphicon glyphicon-plus" data-toggle="tooltip" data-placement="top" title="Add Vehicle"></a></span>
	                </div> 
	                <div class="panel-body">  
                    	<div class="row">
                    		<?php $cctr = 1; ?>
                    		@foreach($vehicles as $vehicle)
	                    	 
		           		 		{{ csrf_field() }}
							  <div class="col-sm-6 col-md-4" > 
							    <div class="thumbnail">
							   		{{-- -------------------------- --}} 
							      	<div id="carousel-example-generic{{$cctr}}" class="carousel slide" data-ride="carousel">
	  								
									  <!-- Wrapper for slides -->
									  <div class="carousel-inner" role="listbox">
									  	<?php 
					                        $vImages = \DB::table('vehicle_images')->where('vehicles_id',$vehicle->id)->get();
					                    	$ctr = 0;
					                    ?> 
					                    
					                    @foreach($vImages as $vImage)
					                    	@if($ctr == 0)
					                    		<div class="item active">
											      <img src="{{\Storage::disk('s3')->url($vImage->imagePath)}}" width="100%" height="200px"> 
											    </div>
					                    	@else
					                    		<div class="item">
											      <img src="{{\Storage::disk('s3')->url($vImage->imagePath)}}" width="100%" height="200px"> 
											    </div>
					                    	@endif
					                    	<?php $ctr++; ?>
					                    @endforeach 
									  </div>

									  <!-- Controls -->
									  <a class="left carousel-control" href="#carousel-example-generic{{$cctr}}" role="button" data-slide="prev">
									    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
									    <span class="sr-only">Previous</span>
									  </a>
									  <a class="right carousel-control" href="#carousel-example-generic{{$cctr}}" role="button" data-slide="next">
									    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
									    <span class="sr-only">Next</span>
									  </a>
									</div>
							      	{{-- -------------------------- --}}
							      <div class="caption">
							        <h3>{{ $vehicle->title }}</h3>
							        <?php 
				                        $vType = \DB::table('vehicle_type')->where('id',$vehicle->vehicle_type_id)->get(); 
				                    ?> 
							        <p>Type : <b>{{ $vType[0]->description }}</b></p>
							        <p>Seats Capacity : <b> {{ $vehicle->seatingCapacity }} </b></p>
							        <p>
							        	@if($vehicle->status == 1)
							       		<div class="alert alert-success" role="alert">
										  <i class="fa fa-check-circle-o" aria-hidden="true"></i> Verified!
										</div>
										@else
										<div class="alert alert-danger" role="alert">
										  <i class="fa fa-times-circle-o" aria-hidden="true"></i> Not Verified!
										</div>
										@endif
							        </p>
							        <p>
							        	<form method="post" action="/removeVehicle/{{$vehicle->id}}" >
							        		{{csrf_field()}}
							        		<button type="submit" class="btn btn-primary">Remove</button>
							        		
							        	</form> 
							        </p>
							      </div>
							    </div> 
							  </div>
						 
							<?php $cctr++; ?>
							@endforeach

						</div>
	                </div>
	                <div class="panel-footer"></div>
	            </div>
	           
			</div>
		</div>
		@endif
 	</section>
@endsection