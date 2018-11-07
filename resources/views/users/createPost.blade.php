@extends('layouts.master')

@section('content')  
<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Post
        <small>Create</small>
      </h1>
      <ol class="breadcrumb">
        <li><a ><i class="fa fa-home"></i> Home</a></li>
        <li><a >Post</a></li>
        <li class="active">Create</li>
      </ol>
    </section>

<!-- Main content -->
    <section class="content">   
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<form class="form-horizontal" method="POST" action="storePost">
				{{ csrf_field() }}
				<div class="panel panel-info">
					<div class="panel-heading">Creating a Trip</div>
					<div class="panel-body">
						
						<div class="form-group">
                    		<label for="title" class="col-md-4 control-label">Title</label>
                    		<div class="col-md-6">
                            <input id="title" type="text" class="form-control" name="title" placeholder="Title">
                            </div>
                    	</div>

                    	<div class="form-group">
	                		<label for="name" class="col-md-4 control-label">Vehicle type</label>
	                		<div class="col-md-6">  
								<select id="vehicleType" class="form-control  input-sm" name="vehicleType">
									<option value="">Select Vehicle</option>
									@foreach($VehicleTypes as $vt)
				                    <option value="{{ $vt->id }}">{{ $vt->description }}</option>
				                    @endforeach
				                </select>
                            </div> 
	                	</div>

	                	<div class="form-group">
	                		<label for="name" class="col-md-4 control-label">Seats need</label>
	                		<div class="col-md-6"> 
	                			{{-- <input class="form-control" type="number" name="seatsNeed" id="seatsNeed" value="1"  min="1" max="10" > --}}
	                			<select name="seatsNeed" id="seatsNeed" class="form-control input-sm">
				                    <option value=""></option>
				                </select>
	                		</div>
	                	</div>

	                	<div class="form-group">
	                		<label for="name" class="col-md-4 control-label">From City</label>
	                		<div class="col-md-6"> 
	                			<select id="cityFrom" class="form-control  input-sm" name="cityFrom">
									<option value="">Select City</option>
									@foreach($CityMun as $city)
				                    <option value="{{ $city->cityMunCode }}">{{ $city->description }}</option>
				                    @endforeach
				                </select>
	                		</div>
	                	</div>

	                	<div class="form-group">
	                		<label for="name" class="col-md-4 control-label">Brgy...</label>
	                		<div class="col-md-6"> 
	                			<select id="brgyFrom" class="form-control input-sm" name="brgyFrom">
				                    <option value=""></option>
				                </select>
	                		</div>
	                	</div>

	                	<div class="form-group">
	                		<label for="name" class="col-md-4 control-label">To City</label>
	                		<div class="col-md-6"> 
	                			<select id="cityTo" class="form-control  input-sm" name="cityTo">
									<option value="">Select City</option>
									@foreach($CityMun as $city)
				                    <option value="{{ $city->cityMunCode }}">{{ $city->description }}</option>
				                    @endforeach
				                </select>
	                		</div>
	                	</div>

	                	<div class="form-group">
	                		<label for="name" class="col-md-4 control-label">Brgy...</label>
	                		<div class="col-md-6"> 
	                			<select id="brgyTo" class="form-control input-sm" name="brgyTo">
				                    <option value=""></option>
				                </select>
	                		</div>
	                	</div>

	                	<div class="form-group">
			                <label for="dtp_input1" class="col-md-4 control-label">Departure</label>
			                {{-- <div class="col-md-6">
			                	 <input size="16" type="text" value="2012-06-15 14:45" readonly class=" form-control input-sm form_datetime">
			                </div> --}}
			               <div class="col-md-5">
			               		<div class="input-group date form_datetime" data-date="{{ date("d-m-Y H:i:s") }}" data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input1">
				                    <input class="form-control input-sm" size="16" type="text" value="" readonly >
				                    <span class="input-group-addon"><span class="fa fa-times"></span></span>
									<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
				                </div>
								<input type="hidden" id="dtp_input1" name="departure" value="" /><br/>
			               </div>

			                
			            </div>

			            <div class="form-group">
						    <label for="" class="col-md-4 control-label">Notes</label>
						    <div class="col-md-6">
							    <textarea class="form-control" name="message" id="message" rows="3" placeholder="Say something here..." style="resize:vertical;" maxlength="225"></textarea>
							</div>
						</div>

			            @include('layouts.required')

					</div>
					<div class="panel-footer"><button type="submit" class="btn btn-info">Create</button></div>
				</div>
			</form>
		</div>
	</div>  
	</section>
@endsection
@section('css')
<link href="{{ asset('css/datetimepicker.css') }}" rel="stylesheet">
@endsection
@section('js')
<script src="{{ asset('js/datetimepicker.js') }}"></script>
@endsection