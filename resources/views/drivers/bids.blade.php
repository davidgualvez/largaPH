@extends('layouts.master')
@section('content') 
<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Bid's
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="#">Bid</a></li>
        <li class="active">my Bid</li>
      </ol>
    </section>

<!-- Main content -->
    <section class="content">   
		<div class="row"> 
			@foreach($bids as $bid)
				<div class="panel panel-default">
				  <div class="panel-body">
				  	<div class="well well-sm">
				  		<p>Cost : <b>{{$bid->cost}}</b></p>
						<p>Message : <b>{{$bid->shortMessage}}</b></p> 
						<p>Status : <b>
						<?php 
							if($bid->isApprove==0){
								echo "Waiting to be Approve.";
							}else{
								echo "Approved!";
							}
						?>
				  	</div> 
				  </div>
				  <div class="panel-footer">
				  	Post:
				  	<?php 
				  		$post = \DB::table('posts')->where('id',$bid->posts_id)->get();
				  		echo "<a href='/posts/".$post[0]->id."'>".$post[0]->title."</a>";
				  	?>
				  	by 
				  	<?php 
				  		$post_user = \DB::table('users')->where('id',$post[0]->users_id)->get(); 
				  		echo "<a href='/profile/".$post_user[0]->id."'>".$post_user[0]->name."</a>";
				  	?>
				  </div>
				</div>
				
			@endforeach
		</div> 
	</section>
@endsection