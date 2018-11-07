@extends('layouts.master')
@section('content') 
<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Bid
        <small>	Create</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="#">Bid</a></li>
        <li class="active">create bid</li>
      </ol>
    </section>

<!-- Main content -->
    <section class="content">   
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
				  <div class="panel-heading">Post by  
				  <?php 
                        $name = \DB::table('users')->select('name')->where('id',$post[0]->users_id)->get();
                        echo "<a href='/profile/".$post[0]->users_id."'>".$name[0]->name."</a>";
                    ?> 
				  </div>
				  <div class="panel-body">
				    <div class="well well-sm">  
				    	<h4><small>Vehicle : </small> {{$post[0]->vehicle}}</h4> 
				    	<h4><small>Seats Need : </small> {{$post[0]->seats_need}}</h4> 
				    	<h4><small>From City of : </small> {{$post[0]->fromCity}}, Brgy.{{$post[0]->fromBrgy}}</h4> 
				    	<h4><small>To City of : </small> {{$post[0]->toCity}}, Brgy.{{$post[0]->toBrgy}}</h4> 
				    	<h4><small>Departure : </small> {{\Carbon\Carbon::parse($post[0]->departure)->toDayDateTimeString()}}}</h4>  
					</div>
					<i>{{ \Carbon\Carbon::parse($post[0]->created_at)->diffForHumans() }}</i>
				  </div>
				</div> 
			</div>
		</div>
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
			<form method="post" action="/storeBid/{{$post[0]->id}}">
			{{ csrf_field() }}
			  <div class="form-group">
			    <label for="formGroupExampleInput">Costing</label>
			    <input type="text" name="cost" class="form-control" id="cost" placeholder="Cost"> 
			    <span id="errmsg"></span>
			  </div>
			  <div class="form-group">
			    <label for="formGroupExampleInput2">Short Message</label>
			    <textarea class="form-control" name="shortMessage" id="shortMessage" rows="3" placeholder="Say something here..." style="resize:vertical;" maxlength="225"></textarea>
			  </div>
			  <div class="form-group">
			    <label for="formGroupExampleInput2"></label>
			    <button type="submit"  class="btn btn-info form-control">Submit</button>
			    {{-- <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Message"> --}}
			  </div>
			</form>
			</div>
		</div> 
	</section>
@endsection