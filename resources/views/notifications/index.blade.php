@extends('layouts.master')
@section('content') 
<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1> 
        Notification's
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a ><i class="fa fa-home"></i> Home</a></li>
        <li><a >Notification</a></li>
        <li class="active">list</li>
      </ol>
    </section>

<!-- Main content -->
    <section class="content">   
		<div class="row" style="padding-left: 25px; padding-right: 25px;"> 
			<ul class="list-group">
			@forelse($notifications as $noti)
				<li class="list-group-item"> 
				  	<div class="card" id="noti">
					  <div class="card-header">
					   {{ \Carbon\Carbon::parse($noti->created_at)->diffForHumans() }}
					  </div>
					  <div class="card-body">
					    <blockquote class="blockquote mb-0">
					      <p>{{ $noti->data }}</p>
					      <footer class="blockquote-footer">
					      	<?php 
						    	$post = \App\Post::find($noti->posts_id);
						    	$user = \App\User::find($post->users_id);
						    ?>
					      	{{$user->name}} in 
					      	<cite title="Source Title">{{ ucfirst($post->title) }}</cite>
					      </footer>
					    </blockquote>
					  </div>
					  <a href="/posts/{{$post->id}}"><span></span></a>
					</div>
				</li>
			@empty
			<div class="center-block"><h4>No Notification</h4></div>
			@endforelse
			</ul> 
		</div> 
	</section>
@endsection