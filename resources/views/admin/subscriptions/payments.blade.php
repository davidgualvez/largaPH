@extends('admin.layouts.app')
@section('content') 
	 <!-- Content Header (Page header) -->
	<section class="content-header">
	  <h1> 
	    Admin Panel
	    <small>Payments</small>
	  </h1>
	  <ol class="breadcrumb">
	    <li><a href="/admin/home"><i class="fa fa-dashboard"></i> Dashboard</a></li>
	    <li>Subscription</li>
	    <li class="active">Payments</li>
	  </ol>
	</section> 

	<!-- Main content -->
	<section class="content container-fluid">

	 {{--  ------------------------ --}}
	 {{--    | Your Page Content Here | --}}
	 <!-- /.content -->
 	<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Payments</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding"">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>User</th>
                  <th>Plan</th>
                  <th># of Months</th>
                  <th>Proof of Payment</th>
                  <th>Total Amount</th>
                  <th>Approve</th>
                  <th>Remove</th> 
                </tr>
                </thead>

                <tbody> 
                @foreach($payments as $p) 
                      <?php 
                        $user = \DB::table('users')->where('id',$p->users_id)->get();
                        $plan = \DB::table('plans')->where('id',$p->plans_id)->get();

                        $totalAmount = $p->months * $plan[0]->monthly_price;
                      ?>
                  <tr>
                    <td> <a target="#" href="/profile/{{$user[0]->id}}">{{$user[0]->name}}</a> </td>
                    <td> {{ucfirst($plan[0]->name)}} </td>
                    <td> {{$p->months}} </td>
                    <td> <a href="{{\Storage::disk('s3')->url($p->proof_of_payment)}}" data-fancybox data-caption="Proof of Payment">Image/Picture</a></td>
                    <td> {{$totalAmount}}</td>
                     <td>
                        <form method="post" action="/admin/approve_payments/{{$p->id}}">
                        {{csrf_field()}}
                          <button type="submit" class="btn btn-info"><span class="fa fa-check"></span></button>
                        </form>  
                     </td>
                     <td>
                       <form method="post" action="/admin/remove_payments/{{$p->id}}">
                          {{csrf_field()}}
                          <button type="submit" class="btn btn-danger"><span class="fa fa-check"></span></button>
                        </form>
                     </td>
                  </tr>  
                
                @endforeach
                </tbody>

                <tfoot>
                <tr>
                  <th>User</th>
                  <th>Plan</th>
                  <th># of Months</th>
                  <th>Proof of Payment</th>
                  <th>Total Amount</th>
                  <th>Approve</th>
                  <th>Remove</th> 
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
   
        </div>
        <!-- /.col -->
      </div>

	 {{--    ------------------------ --}}

	</section>

@endsection