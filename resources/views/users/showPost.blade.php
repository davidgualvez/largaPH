@extends('layouts.master')
@section('content') 
<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Post
        <small>Show</small>
      </h1>
      <ol class="breadcrumb">
        <li><a ><i class="fa fa-home"></i> Home</a></li>
        <li><a >Post</a></li>
        <li class="active">Show</li>
      </ol>
    </section>

<!-- Main content -->
    <section class="content">   
		<div class="row"> 
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-success">
	                <div class="panel-heading">
		                {{$post[0]->title}} by 
		                <?php
		                	$user = \DB::table('users')->where('id',$post[0]->users_id)->get() ;
		                ?>
		                <a href="/profile/{{$user[0]->id}}">{{$user[0]->name}}</a>
		                <span class="pull-right">
		                	@if($post[0]->departure > \Carbon\Carbon::now())
		                	@if(Auth::user()->isDriver==1 && Auth::user()->id != $post[0]->users_id)
		                		<?php 
		                			//check if this driver is already bid for this post
		                		?>
			                    <div class="form-group">
			                        <a href="/createBid/{{$post[0]->id}}" class="btn btn-primary btn-xs">place Bid</a>
			                    </div>
			                @else
			                	<div class="form-group">
			                		<a href="/posts/edit/{{$post[0]->id}}">Edit</a>
			                	</div>
		                    @endif
		                    @else
		                    	Expired
		                    @endif
		                </span>
	                </div> 
	                <div class="panel-body"> 
	                    <div class="form-group">
	                      <label  class="col-md-4 control-label">Vehicle</label>
	                      <div class="col-md-6"> 
	                        <label>{{ $post[0]->vehicle }}</label>
	                      </div>
	                    </div> 
	                    <div class="form-group">
	                      <label  class="col-md-4 control-label">Seats Need</label>
	                      <div class="col-md-6"> 
	                        <label>{{ $post[0]->seats_need }}</label>
	                      </div>
	                    </div> 
	                    <div class="form-group">
	                      <label for="name" class="col-md-4 control-label">From City of</label>
	                      <div class="col-md-6"> 
	                        <label>{{ $post[0]->fromCity }}, Brgy. {{ $post[0]->fromBrgy }}</label>
	                      </div>
	                    </div> 
	                    <div class="form-group">
	                      <label for="name" class="col-md-4 control-label">To City of</label>
	                      <div class="col-md-6"> 
	                        <label>{{ $post[0]->toCity }}, Brgy. {{ $post[0]->toBrgy }}</label>
	                      </div>
	                    </div> 
	                    <div class="form-group">
	                      <label for="name" class="col-md-4 control-label">Departure</label>
	                      <div class="col-md-6"> 
	                        <label>{{ \Carbon\Carbon::parse($post[0]->departure)->toDayDateTimeString() }}</label>
	                      </div>
	                    </div> 

	                    <div class="form-group">
	                    	<label class="col-md-4 control-label">Notes</label>
	                    	<div class="col-md-6">
	                    		<div class="well well-sm"> 
	                    			{{ $post[0]->message}}
				  				</div> 
	                    	</div>
	                    </div>

	                </div>
	                <div class="panel-footer">{{ \Carbon\Carbon::parse($post[0]->created_at)->diffForHumans() }}

	                <span class="pull-right">  Status:  
                    @if($post[0]->bids_id == null)
                        Looking for Driver!
                    @else
                        Closed
                    @endif
                    </span>
	                </div>
	            </div>
	            {{-- ------- --}}

	            @if($post[0]->bids_id != null)
                	<div class="panel panel-info">
                		<div class="panel-heading"></div>
				    	<div class="panel-body"> 
			    			<div class="col-md-6">
			    				<div class="well well-sm">

			    				<p>Cost Offered : <b>{{$choosenBid[0]->cost}}</b></p>
								<p>Message : <b>{{$choosenBid[0]->shortMessage}}</b></p> 
								<p>Status : <b> 
								<?php 
									if($choosenBid[0]->isApprove==0){
										echo "Waiting for approval.";
									}else{
										echo "Approved!";
									}
								?> 
								</div>
			    			</div>
			    			<div class="col-md-6">
			    				<?php 
			    					$driver = \DB::Table('drivers')->where('id',$choosenBid[0]->drivers_id)->get();
			    					echo "Driver name : <a href='/driverProfile/".$driver[0]->id."'>".$driver[0]->firstName." ".$driver[0]->lastName."</a>";
			    					echo "<br>Birth Date : ".\Carbon\Carbon::parse($driver[0]->birthDate)->toFormattedDateString();
			    					echo "<br>License : ".$driver[0]->typeOfLicense;
			    				?>
			    				<br>
			    				@if($post[0]->departure > \Carbon\Carbon::now())
			    				<form method="post" action="/cancel/post/{{$post[0]->id}}/bid/{{$choosenBid[0]->id}}">{{csrf_field()}}<button class="btn btn-info">Cancel</button></form>
			    				@endif
			    			</div> 
				    		
				    	</div>
				    	<div class="panel-footer">
				    		{{ \Carbon\Carbon::parse($choosenBid[0]->created_at)->diffForHumans() }}
				    	</div>
				    </div>
                @endif

	            {{-- ------- --}}
	            @if(Auth::user()->id == $post[0]->users_id)
		            <h4>Bid's offer <span class="glyphicon glyphicon-arrow-down"></span><span class="glyphicon glyphicon-arrow-down"></span><span class="glyphicon glyphicon-arrow-down"></span></h4>
		            @forelse ($bids as $bid)
					    <div class="panel">
					    	<div class="panel-body"> 
				    			<div class="col-md-6">
				    				<div class="well well-sm">

				    				<p>Cost Offered : <b>{{$bid->cost}}</b></p>
									<p>Message : <b>{{$bid->shortMessage}}</b></p> 
									<p>Status : <b> 
									<?php 
										if($bid->isApprove==0){
											echo "Waiting for approval.";
										}else{
											echo "Approved!";
										}
									?> 
									</div>
				    			</div>
				    			<div class="col-md-6">
				    				<?php 
				    					$driver = \DB::Table('drivers')->where('id',$bid->drivers_id)->get();
				    					echo "Driver name : <a href='/driverProfile/".$driver[0]->id."'>".$driver[0]->firstName." ".$driver[0]->lastName."</a>";
				    					echo "<br>Birth Date : ".\Carbon\Carbon::parse($driver[0]->birthDate)->toFormattedDateString();
				    					echo "<br>License : ".$driver[0]->typeOfLicense;
				    				?>
				    				<br>
				    				@if($post[0]->departure > \Carbon\Carbon::now())
				    				@if($post[0]->bids_id == null)
				    				<form method="post" action="/post/{{$post[0]->id}}/bid/{{$bid->id}}">{{csrf_field()}}<button class="btn btn-info">Approve</button></form>
				    				@endif
				    				@endif
				    			</div>  
					    	</div>
					    	<div class="panel-footer">
					    		{{ \Carbon\Carbon::parse($bid->created_at)->diffForHumans() }}
					    	</div>
					    </div>
					@empty
					    <p>No Bids</p>
					@endforelse
 
				@else
					{{-- ---Guest User View--- --}}
					<?php

					?>
					Total Bids : <b>{{ $bids->count() }}</b> in counting..
				@endif
			</div> 
		</div> 
	</section>
@endsection