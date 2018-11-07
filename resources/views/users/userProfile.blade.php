@extends('layouts.master')
@section('content')
<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        My Profile
      </h1>
      <ol class="breadcrumb">
        <li><a ><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a >Profile</a></li>
        <li class="active">Me</li>
      </ol>
    </section>

<!-- Main content -->
    <section class="content"> 
      <div class="row"> 
        <div class="col-md-3" >
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="{{ \Storage::disk('s3')->url(Auth::user()->avatarPath)}}" alt="User profile picture"> 
              <h3 class="profile-username text-center">{{ucfirst(Auth::user()->name)}}</h3>

              <p class="text-muted text-center"><?php 
                if(Auth::user()->isDriver == 1){
                    echo "Commuter/Driver";
                }else{
                    echo "Commuter";
                }
              ?></p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Email</b> <a class="pull-right"><?php 
                    if(Auth::user()->email != null){
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
                    if(Auth::user()->mobileNumber != null){
                      echo "".Auth::user()->mobileNumber;
                    }else{
                      echo "N/A";
                    }
                  ?>
                  </a>
                </li>  

                @if(Auth::user()->provider != "")
                <li class="list-group-item">
                  <b>Login via</b> <a class="pull-right"><?php
                    if($user->mobileNumber != null){
                      echo "".Auth::user()->provider;
                    }else{
                      echo "N/A";
                    }
                  ?>
                  </a>
                </li>  
                @endif

                @if($subscription != null)
                  <li class="list-group-item">
                    <b>Subscription Exp:</b>
                    <a class="pull-right">{{\Carbon\Carbon::parse($subscription->end)->toFormattedDateString()}}</a>
                  </li>
                @endif

                <a href="/changepassword" class="btn btn-primary btn-block"><b>Change Password</b></a>
                @if(Auth::user()->isDriver) 
                <a href="/driverProfile/{{$driver[0]->id}}" class="btn btn-primary btn-block"><b>Driver Profile</b></a>
                @endif
              </ul>

              {{-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> --}}
            </div>
            <!-- /.box-body -->
          </div> 
        </div>
        <div class="col-md-9" > 
          @forelse($posts as $post)
            <div class="panel panel-success">
                <div class="panel-heading">{{$post->title}} <span class="pull-right"><a href="/posts/{{$post->id}}">View</a></span></div> 
                <div class="panel-body">
 
                    <div class="form-group">
                      <div class="col-md-4 ">Vehicle</div> 
                      <div class="col-md-6"> 
                        <label>{{ $post->vehicle }}</label>
                      </div>
                    </div> 
                    <div class="form-group">
                    <div class="col-md-4 ">Seats Need</div>  
                      <div class="col-md-6"> 
                        <label>{{ $post->seats_need }}</label>
                      </div>
                    </div> 
                    <div class="form-group">
                      <div class="col-md-4 ">From City of</div>   
                      <div class="col-md-6"> 
                        <label>{{ $post->fromCity }}, Brgy. {{ $post->fromBrgy }}</label>
                      </div>
                    </div> 
                    <div class="form-group">
                      <div class="col-md-4 ">To City of</div>  
                      <div class="col-md-6"> 
                        <label>{{ $post->toCity }}, Brgy. {{ $post->toBrgy }}</label>
                      </div>
                    </div> 
                    <div class="form-group">
                      <div class="col-md-4 ">Departure</div> 
                      <div class="col-md-6"> 
                        <label>{{ \Carbon\Carbon::parse($post->departure)->toDayDateTimeString() }}</label>
                      </div>
                    </div> 

                </div>
                <div class="panel-footer">{{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</div>
            </div>
          @empty
            <div class="alert alert-info" role="alert">Opps..! Theres no Trip to be display. please create your 1st Trip :) <a href="/createPost">Click here</a> 
            </div>
          @endforelse
        </div>
      </div>
    </section>
 
@endsection 