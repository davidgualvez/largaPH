<?php 
	$checker = \DB::table('driver_ratings')
		->where('users_id',Auth::user()->id)
		->where('drivers_id',$driver->id)->get();
?>
@if($checker->first())
<div class="review-block"> 
	<div class="row">
		<div class="col-sm-3">
			<img src="{{ \Storage::disk('s3')->url(Auth::user()->avatarPath) }}" class="img-rounded" height="65" width="65">
			<div class="review-block-name"><a href="/profile/{{Auth::user()->id}}">{{ Auth::user()->name }}</a></div>
			<div class="review-block-date">{{ \Carbon\Carbon::parse($checker[0]->created_at)->toFormattedDateString() }}
			<br/>{{ \Carbon\Carbon::parse($checker[0]->created_at)->diffForHumans() }}</div>
		</div>
		<div class="col-sm-9">
			<div class="review-block-rate">
				 <div class="stars stars-example-fontawesome" >
				 	@for($x=0; $x<$checker[0]->rating;$x++)
		            <span class="fa fa-star fa-lg" style="color: orange;text-shadow: 1px 1px 1px #ccc;font-size: 1.5em;"></span>
		            @endfor
		         </div>
			</div>
			<div class="review-block-title">{{$checker[0]->title}}</div>
			<div class="review-block-description">{{$checker[0]->message}}</div>
		</div>
	</div> 
</div>
@else
<div class="review-block"> 
	<div class="row">
		<div class="col-sm-3">
			<img src="{{ \Storage::disk('s3')->url(Auth::user()->avatarPath) }}" class="img-rounded" height="52" width="52">
			<div class="review-block-name"><a href="/profile/{{Auth::user()->id}}">{{ Auth::user()->name }}</a></div>
			{{-- <div class="review-block-date">August 11, 2017<br/>1 Hour ago</div> --}}
		</div>
		<div class="col-sm-8">
			<form class="form-horizontal" method="post" action="/driverRating/{{$driver->id}}/{{Auth::user()->id}}">
				{{ csrf_field() }}
				<div class="review-block-title form-group">
					Title/Subject <input type="text" name="title" class="form-control">
				</div>
				<div class="review-block-description form-group" >
					Message <textarea class="form-control" name="message"></textarea>
				</div>
				<div class="review-block-rate">
					<div class="stars stars-example-fontawesome">
		                <select id="example-fontawesome" name="rating" autocomplete="off">
		                  <option value="1">1</option>
		                  <option value="2">2</option>
		                  <option value="3">3</option>
		                  <option value="4">4</option>
		                  <option value="5">5</option>
		                </select> 
		            </div>
				</div>
				<div class="form-group">
					<button class="form-control">submit</button>
				</div>
			</form> 
		</div>
	</div> 
</div>
@endif