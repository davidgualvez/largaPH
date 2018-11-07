@extends('layouts.master')
@section('content')  
<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Subscription
      </h1>
      <ol class="breadcrumb">
        <li><a ><i class="fa fa-home"></i> Home</a></li>
        <li class="active"> <a >Subcription</a></li> 
      </ol>
    </section>

<!-- Main content -->
    <section class="content">    
		<div class="row"> 
      @if($subscription != null)
        <div class="col-md-10 alert alert-success col-md-offset-1" role="alert">
          Your Subscription will end at " <b>{{\Carbon\Carbon::parse($subscription->end)->toDayDateTimeString()}}</b> "
        </div>
      @else
        <div class="col-md-10 alert alert-danger col-md-offset-1" role="alert">
          You have no Active Subscription
        </div>
      @endif

      <div class="col-md-8 col-md-offset-2" ">

        @foreach($plans as $plan)
        <div class="jumbotron">
          <h1 class="display-3">{{ucfirst($plan->name)}}</h1>
          <p class="lead">A 1 month subscription for Automatic SMS Notification for your need's</p>
          <hr class="my-4">
          <p>Features</p>
          <content>
            - A notification for incoming bids for your post <br>
            - A notification for accepted bids <br>
            - A notification for disapproval of your bids <br> <br>
          </content>
          <p class="lead">
            <a class="btn btn-success btn-lg" href="/plan/{{$plan->id}}/payment" role="button">Buy for as low as {{$plan->monthly_price}} per Month</a>
          </p>
        </div>
        @endforeach


      </div>
    </div>
    </section>
  @endsection