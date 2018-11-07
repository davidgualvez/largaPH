@extends('layouts.master')
@section('content')  
<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Subscription
      </h1>
      <ol class="breadcrumb">
        <li><a ><i class="fa fa-home"></i> Home</a></li>
        <li > <a >Subcription</a></li> 
        <li class="active"> <a >Payment</a></li> 

      </ol>
    </section>

<!-- Main content -->
    <section class="content">    
		<div class="row">   
      <div class="col-md-3" style="">
        <b>Plan</b> : {{ucfirst($plan[0]->name)}} <br>
        <b>Monthly Price</b> : {{$plan[0]->monthly_price}} Peso <br>
        --------------------------- <br>
        MODE OF PAYMENT <br>

        <b>Coins.PH</b> <br>
        0909-2253-890 <br>
        <b>GCash</b> <br>
        0956-894-6600 <br>
        <b>Smart Money Padala</b>  <br>
        5299-6765-2145-6109

      </div>
      <form class="form-horizontal" method="POST" action="/payment" enctype="multipart/form-data">
        {{ csrf_field() }}
      <div class="col-md-9" style="">
        <div class="panel panel-info form-horizontal">
          <div class="panel-heading">PAYMENT</div>
          <div class="panel-body">
          <input type="number" name="plans_id" hidden="" value="{{$plan[0]->id}}"> 
            <div class="form-group"> 
              <label class="col-md-4 control-label">How many Months?</label>
              <div class="col-md-6">
                <input class="form-control" type="number" name="how_many_months" min="1">
              </div>
            </div>

            <div class="form-group">
              <label for="name" class="col-md-4 control-label">Proof of Payment</label>
              <div class="col-md-6">
                <input type="file" name="proof" id="proof" accept="image/*"> 
                <span class="help-block">
                  <strong>[note: Please provide a receipt picture of your payment]</strong>
                </span>
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-4"></div>
              <div class="col-md-8"><button type="submit" class="btn btn-info">Submit</button></div>
            </div>
             
            @include('layouts.required')

          </div>
        </div> 
      </div>
      </form>

    </div>
    </section>
  @endsection