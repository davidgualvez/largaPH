@extends('layouts.master')
@section('css')
<link href="{{ asset('css/dist/fontawesome-stars.css') }}" rel="stylesheet">
<link href="{{ asset('css/dist/jquery.fancybox.min.css') }}" rel="stylesheet">
@endsection

@section('content')  
<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Driver Profile
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="#">Driver</a></li>
        <li class="active">profile</li>
      </ol>
    </section>

<!-- Main content -->
    <section class="content">  
		<div class="row"> 
			<div class="col-md-3">
				<div class="box box-primary">
		            <div class="box-body box-profile">
		              <img class="profile-user-img img-responsive img-circle" src="{{ \Storage::disk('s3')->url($user_driver->avatarPath)}}" alt="User profile picture"> 
		              <h3 class="profile-username text-center">{{ucfirst($driver->firstName.' '.$driver->lastName)}}</h3>
		  
		              <ul class="list-group list-group-unbordered">
		                <li class="list-group-item">
		                  <b>Email</b> <a class="pull-right"><?php 
		                    if($user_driver->email != null){
		                      echo "".$user_driver->email;
		                    }else
		                    {
		                      echo "N/A";
		                    }
		                  ?>
		                  </a>
		                </li>
		                <li class="list-group-item">
		                  <b>Mobile #</b> <a class="pull-right"><?php
		                    if($user_driver->mobileNumber != null){
		                      echo "".$user_driver->mobileNumber;
		                    }else{
		                      echo "N/A";
		                    }
		                  ?>
		                  </a>
		                </li>   
		                <li class="list-group-item">
		                  <b>Birthdate</b> <a class="pull-right"><?php
		                    if($driver->birthDate != null){
		                      echo "".$driver->birthDate;
		                    }else{
		                      echo "N/A";
		                    }
		                  ?>
		                  </a>
		                </li>    
		                <li class="list-group-item">
		                  <b>Type of License</b> <a class="pull-right"><?php
		                    if($driver->typeOfLicense != null){
		                      echo "".$driver->typeOfLicense;
		                    }else{
		                      echo "N/A";
		                    }
		                  ?>
		                  </a>
		                </li>   
 
		              </ul>

		              {{-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> --}}
		            </div>
            		<!-- /.box-body -->
          		</div>  
			</div> 
			<div class="col-md-9">
				<div class="nav-tabs-custom">
		            <ul class="nav nav-tabs">
		              <li class="active"><a href="#activity" data-toggle="tab">Ratings</a></li>
		              <li><a href="#timeline" data-toggle="tab">License Details</a></li>
		              <li><a href="#settings" data-toggle="tab">Vehicles</a></li>
		            </ul>
		            <div class="tab-content">
		            	<div class="active tab-pane" id="activity"> 
		            		{{-- ----- --}} 
		            		<div style="margin-left: 20px;">
		            			<div class="row">
								<div class="col-sm-4">
									<div class="rating-block">
										<h4>Average user rating</h4>
										<h2 class="bold padding-bottom-7">{{$r_average}}<small>/ 5</small></h2>
										<span class="fa fa-star fa-2x" style="color: orange;text-shadow: 1px 1px 1px #ccc;"></span>
										<span class="fa fa-star fa-2x" style="color: orange;text-shadow: 1px 1px 1px #ccc;"></span>
										<span class="fa fa-star fa-2x" style="color: orange;text-shadow: 1px 1px 1px #ccc;"></span>
										<span class="fa fa-star fa-2x" style="color: orange;text-shadow: 1px 1px 1px #ccc;"></span>
										<span class="fa fa-star fa-2x" style="color: orange;text-shadow: 1px 1px 1px #ccc;"></span>
									</div>
								</div>
								<div class="col-sm-6">
									<h4>Rating breakdown</h4>
									<div class="pull-left">
										<div class="pull-left" style="width:35px; line-height:1;">
											<div style="height:9px; margin:5px 0;">5 <span class="fa fa-star"></span></div>
										</div>
										<div class="pull-left" style="width:180px;">
											<div class="progress" style="height:9px; margin:8px 0;">
											  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="5" aria-valuemin="0" aria-valuemax="5" style="width: <?php 
											  if($maxV>0){
											  	echo "".(($r_breakdown_5[0]->sum/$maxV)*100);
											  }else{
											  	echo "0";
											  } 
											  ?>%">
												<span class="sr-only">80% Complete (danger)</span>
											  </div>
											</div>
										</div>
										<div class="pull-right" style="margin-left:10px;">{{ $r_breakdown_5[0]->sum }}</div>
									</div>
									<div class="pull-left">
										<div class="pull-left" style="width:35px; line-height:1;">
											<div style="height:9px; margin:5px 0;">4 <span class="fa fa-star"></span></div>
										</div>
										<div class="pull-left" style="width:180px;">
											<div class="progress" style="height:9px; margin:8px 0;">
											  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="4" aria-valuemin="0" aria-valuemax="5" style="width: <?php 
											  if($maxV>0){
											  	echo "".(($r_breakdown_4[0]->sum/$maxV)*100);
											  }else{
											  	echo "0";
											  } 
											  ?>%">
												<span class="sr-only">80% Complete (danger)</span>
											  </div>
											</div>
										</div>
										<div class="pull-right" style="margin-left:10px;">{{ $r_breakdown_4[0]->sum }}</div>
									</div>
									<div class="pull-left">
										<div class="pull-left" style="width:35px; line-height:1;">
											<div style="height:9px; margin:5px 0;">3 <span class="fa fa-star"></span></div>
										</div>
										<div class="pull-left" style="width:180px;">
											<div class="progress" style="height:9px; margin:8px 0;">
											  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="3" aria-valuemin="0" aria-valuemax="5" style="width: <?php 
											  if($maxV>0){
											  	echo "".(($r_breakdown_3[0]->sum/$maxV)*100);
											  }else{
											  	echo "0";
											  } 
											  ?>%">
												<span class="sr-only">80% Complete (danger)</span>
											  </div>
											</div>
										</div>
										<div class="pull-right" style="margin-left:10px;">{{ $r_breakdown_3[0]->sum }}</div>
									</div>
									<div class="pull-left">
										<div class="pull-left" style="width:35px; line-height:1;">
											<div style="height:9px; margin:5px 0;">2 <span class="fa fa-star"></span></div>
										</div>
										<div class="pull-left" style="width:180px;">
											<div class="progress" style="height:9px; margin:8px 0;">
											  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="2" aria-valuemin="0" aria-valuemax="5" style="width: <?php 
											  if($maxV>0){
											  	echo "".(($r_breakdown_2[0]->sum/$maxV)*100);
											  }else{
											  	echo "0";
											  } 
											  ?>%">
												<span class="sr-only">80% Complete (danger)</span>
											  </div>
											</div>
										</div>
										<div class="pull-right" style="margin-left:10px;">{{ $r_breakdown_2[0]->sum }}</div>
									</div>
									<div class="pull-left">
										<div class="pull-left" style="width:35px; line-height:1;">
											<div style="height:9px; margin:5px 0;">1 <span class="fa fa-star"></span></div>
										</div>
										<div class="pull-left" style="width:180px;">
											<div class="progress" style="height:9px; margin:8px 0;">
											  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="1" aria-valuemin="0" aria-valuemax="5" style="width: <?php 
											  if($maxV>0){
											  	echo "".(($r_breakdown_1[0]->sum/$maxV)*100);
											  }else{
											  	echo "0";
											  } 
											  ?>%">
												<span class="sr-only">80% Complete (danger)</span>
											  </div>
											</div>
										</div>
										<div class="pull-right" style="margin-left:10px;">{{ $r_breakdown_1[0]->sum }}</div>
									</div>
								</div>			
							</div>
			 
							<div class="row">
								<div class="col-sm-8">
									<br>


									@include('layouts.createRatings')


									<hr/>
									<div class="review-block"> 
										@foreach($ratings as $rating)
										<div class="row">
											<div class="col-sm-3">
												<img src="{{ \Storage::disk('s3')->url(Auth::user()->avatarPath) }}" class="img-rounded" height="65" width="65">
												<div class="review-block-name"><a href="/profile/{{Auth::user()->id}}">{{ Auth::user()->name }}</a></div>
												<div class="review-block-date">{{ \Carbon\Carbon::parse($rating->created_at)->toFormattedDateString() }}
												<br/>{{ \Carbon\Carbon::parse($rating->created_at)->diffForHumans() }}</div>
											</div>
											<div class="col-sm-9">
												<div class="review-block-rate">
													 <div class="stars stars-example-fontawesome" >
													 	@for($x=0; $x<$rating->rating;$x++)
											            <span class="fa fa-star fa-lg" style="color: orange;text-shadow: 1px 1px 1px #ccc;font-size: 1.5em;"></span>
											            @endfor
											         </div>
												</div>
												<div class="review-block-title">{{$rating->title}}</div>
												<div class="review-block-description">{{$rating->message}}</div>
											</div>
										</div> 
										<hr>
										@endforeach
									</div>
								</div>
							</div>

		            		</div>
						    
						    {{-- ----- --}}
		              	</div>
		              	<!-- /.tab-pane -->
		              	<div class="tab-pane" id="timeline"> 
		            		<div style="margin-left: 10px;">
		            			 <div class="row">
			      	<div class="col-md-10 col-md-offset-1">
			      		<img src="{{ \Storage::disk('s3')->url($driver->licensePath)}}" width="100%" height="300px">
			      	</div>
			      </div>
		            		</div>
		              	</div>
		              	<!-- /.tab-pane -->
		            	<div class="tab-pane" id="settings"> 
		            		<div style="margin-left: 10px;">
		            			{{-- ----------------- --}}
							      <div class="row">
				                		<?php $cctr = 1; ?>
				                		@foreach($vehicles as $vehicle)
				                    	<form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
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
														      <img src="{{\Storage::disk('s3')->url($vImage->imagePath)}}" width="100%" height="200"> 
														    </div>
								                    	@else
								                    		<div class="item">
														      <img src="{{\Storage::disk('s3')->url($vImage->imagePath)}}" width="100%" height="200"> 
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
										      </div>
										    </div> 
										  </div>
										</form>
										<?php $cctr++; ?>
										@endforeach

									</div>
							      {{-- ----------------- --}}
		            		</div>
		              	</div>
		              	<!-- /.tab-pane -->
		            </div>
		        </div>
			</div>
		</div>
 
	</section>
@endsection


@section('js')
 <script src="{{ asset('js/jquery.barrating.js') }}"></script>
 <script src="{{ asset('js/examples.js') }}"></script>
@endsection