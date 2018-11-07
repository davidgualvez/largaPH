@extends('layouts.master') 
@section('content') 
<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        User Profile
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">User profile</li>
      </ol>
    </section>

<!-- Main content -->
    <section class="content"> 
      <div class="row">
      		<!-- Profile Image -->
      	<div class="col-md-8 col-md-offset-2">

          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="{{ \Storage::disk('s3')->url($user->avatarPath)}}" alt="User profile picture"> 
              <h3 class="profile-username text-center">{{ucfirst($user->name)}}</h3>

              <p class="text-muted text-center"><?php 
              	if($user->isDriver == 1){
                    echo "Commuter/Driver";
                }else{
                    echo "Commuter";
                }
              ?></p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Email</b> <a class="pull-right"><?php 
                  	if($user->email != null){
                  		echo "".$user->email;
                  	}else
                  	{
                  		echo "N/A";
                  	}
                  ?>
                  </a>
                </li>
                <li class="list-group-item">
                  <b>Mobile #</b> <a class="pull-right"><?php
                  	if($user->mobileNumber != null){
                  		echo "".$user->mobileNumber;
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
          <!-- /.box -->
         </div>
      </div>
    </section> 
@endsection