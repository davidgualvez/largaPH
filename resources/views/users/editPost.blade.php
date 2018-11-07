@extends('layouts.master')

@section('content') 
<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Post
        <small>Edit</small>
      </h1>
      <ol class="breadcrumb">
        <li><a ><i class="fa fa-home"></i> Home</a></li>
        <li><a >Post</a></li>
        <li class="active">Edit</li>
      </ol>
    </section>

<!-- Main content -->
    <section class="content">  
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<form class="form-horizontal" method="POST" action="/editPost/{{$post->id}}">
				{{ csrf_field() }}
				
				<div class="panel panel-info">
					<div class="panel-heading">Editing the post
					<span class="pull-right"><a href="/posts/{{$post->id}}" >Back</a></span>
					</div>
					<div class="panel-body">
						
						<div class="form-group">
                    		<label for="title" class="col-md-4 control-label">Title</label>
                    		<div class="col-md-6">
                            <input id="title" type="text" class="form-control" name="title" placeholder="Title" value="{{$post->title}}">
                            </div>
                    	</div>

                    	<div class="form-group">
	                		<label for="name" class="col-md-4 control-label">Vehicle type</label>
	                		<div class="col-md-6">  
								<select id="vehicleType" class="form-control  input-sm" name="vehicleType">
									{{-- <option value="">Select Type</option> --}} 
									@foreach($VehicleTypes as $vt)
										@if($vt->id == $post->vehicle_type_id)
				                    	<option value="{{ $vt->id }}" selected="selected">{{ $vt->description }}</option>
				                    	@else
				                    	<option value="{{ $vt->id }}">{{ $vt->description }}</option>
				                    	@endif
				                    @endforeach
				                </select>
                            </div> 
	                	</div>

	                	<div class="form-group">
	                		<label for="name" class="col-md-4 control-label">Seats need</label>
	                		<div class="col-md-6"> 
	                			{{-- <input class="form-control" type="number" name="seatsNeed" id="seatsNeed" value="1"  min="1" max="10" > --}}
	                			<select name="seatsNeed" id="seatsNeed" class="form-control input-sm">
				                    <option value="{{$post->seats_need}}">{{$post->seats_need}}</option>
				                </select>
	                		</div>
	                	</div>
	                	 

	                	<div class="form-group">
	                		<label for="name" class="col-md-4 control-label">From City</label>
	                		<div class="col-md-6"> 
	                			<select id="cityFrom" class="form-control  input-sm" name="cityFrom">
									<option value="">Select City</option>
									@foreach($CityMun as $city)
										@if($city->cityMunCode == $post->fromCity)
				                    	<option value="{{ $city->cityMunCode }}" selected="selected">{{ $city->description }}</option>
				                    	@else
										<option value="{{ $city->cityMunCode }}">{{ $city->description }}</option>
				                    	@endif
				                    @endforeach
				                </select>
	                		</div>
	                	</div>

	                	<div class="form-group">
	                		<label for="name" class="col-md-4 control-label">Brgy...</label>
	                		<div class="col-md-6"> 
	                			<select id="brgyFrom" class="form-control input-sm" name="brgyFrom">
				                    <option value=""></option>
				                    <?php $brgys_from = \DB::table('brgy')->where('cityMunCode',$post->fromCity)->get(); ?>
				                    @foreach($brgys_from as $brgyF)
				                    	@if($brgyF->brgyCode == $post->fromBrgy)
				                    	<option value="{{ $brgyF->brgyCode }}" selected="selected">{{ $brgyF->description }}</option>
				                    	@else 
				                    	<option value="{{ $brgyF->brgyCode }}">{{ $brgyF->description }}</option>
				                    	@endif
				                    @endforeach
				                </select>
	                		</div>
	                	</div>

	                	<div class="form-group">
	                		<label for="name" class="col-md-4 control-label">To City</label>
	                		<div class="col-md-6"> 
	                			<select id="cityTo" class="form-control  input-sm" name="cityTo">
									<option value="">Select City</option>
									@foreach($CityMun as $city)
				                    	@if($city->cityMunCode == $post->toCity)
				                    	<option value="{{ $city->cityMunCode }}" selected="selected">{{ $city->description }}</option>
				                    	@else
										<option value="{{ $city->cityMunCode }}">{{ $city->description }}</option>
				                    	@endif
				                    @endforeach
				                </select>
	                		</div>
	                	</div>

	                	<div class="form-group">
	                		<label for="name" class="col-md-4 control-label">Brgy...</label>
	                		<div class="col-md-6"> 
	                			<select id="brgyTo" class="form-control input-sm" name="brgyTo">
				                    <option value=""></option>
				                    <?php $brgys_to = \DB::table('brgy')->where('cityMunCode',$post->toCity)->get(); ?>
				                    @foreach($brgys_to as $brgyT)
				                    	@if($brgyT->brgyCode == $post->toBrgy)
				                    	<option value="{{ $brgyT->brgyCode }}" selected="selected">{{ $brgyT->description }}</option>
				                    	@else 
				                    	<option value="{{ $brgyT->brgyCode }}">{{ $brgyT->description }}</option>
				                    	@endif
				                    @endforeach
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
				                    <input class="form-control input-sm" size="16" type="text" value="{{$post->departure}}" readonly >
				                    <span class="input-group-addon"><span class="fa fa-times"></span></span>
									<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
				                </div>
								<input type="hidden" id="dtp_input1" name="departure" value="{{$post->departure}}" />
			               </div> 
			            </div>

			            <div class="form-group">
						    <label for="" class="col-md-4 control-label">Notes</label>
						    <div class="col-md-6">
							    <textarea class="form-control" name="message" id="message" rows="3" placeholder="Say something here..." style="resize:vertical;" maxlength="225">{{$post->message}}</textarea>
							</div>
						</div>


			            @include('layouts.required')

					</div>
					<div class="panel-footer"><button type="submit" class="btn btn-info">Update</button></div>
				</div>
			</form>
		</div>
	</div> 
	</section>
@endsection