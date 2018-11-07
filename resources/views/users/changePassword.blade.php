@extends('layouts.master')
@section('content') 
<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Change Password
        <small> </small>
      </h1>
      <ol class="breadcrumb">
        <li><a ><i class="fa fa-home"></i> Home</a></li>
        <li><a >Password</a></li>
        <li class="active">change</li>
      </ol>
    </section>

<!-- Main content -->
    <section class="content">   
		<div class="row">  
			@if($user->password==null)
				<form class="form-horizontal" method="post" action="/setpassword">
				{{csrf_field()}}
				<div class="col-md-8 col-md-offset-2">
					<div class="panel panel-success">
						<div class="panel-heading">Set Password</div>
						<div class="panel-body"> 
							<div class="form-group">
	                    		<label for="password" class="col-md-4 control-label">Password</label>
	                    		<div class="col-md-6">
	                            <input id="password" type="password" class="form-control" name="password" placeholder="Password">
	                            </div>
                    		</div>
                    		<div class="form-group">
	                    		<label for="password_confirmation" class="col-md-4 control-label">re-Enter Password</label>
	                    		<div class="col-md-6">
	                            <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" placeholder="Re-Enter Password">
	                            </div>
                    		</div>
                    		<div class="form-group">
                    			<div class="col-md-4"></div> 
	                    		<div class="col-md-6">
	                             <button class="btn btn-info">submit</button>
	                            </div>
                    		</div>
                    		@include('layouts.required')
						</div> 
					</div>
				</div>
				</form>
			@else
				<form class="form-horizontal" method="post" action="/updatepassword">
				{{csrf_field()}}
				<div class="col-md-8 col-md-offset-2">
					<div class="panel panel-success">
						<div class="panel-heading">Change Password</div>
						<div class="panel-body"> 
							<div class="form-group">
	                    		<label for="oldpassword" class="col-md-4 control-label">Old Password</label>
	                    		<div class="col-md-6">
	                            <input id="oldpassword" type="password" class="form-control" name="oldpassword" placeholder="Password">
	                            </div>
                    		</div>
							<div class="form-group">
	                    		<label for="newpassword" class="col-md-4 control-label">New Password</label>
	                    		<div class="col-md-6">
	                            <input id="newpassword" type="password" class="form-control" name="newpassword" placeholder="Password">
	                            </div>
                    		</div>
                    		<div class="form-group">
	                    		<label for="newpassword_confirmation" class="col-md-4 control-label">re-Enter Password</label>
	                    		<div class="col-md-6">
	                            <input id="newpassword_confirmation" type="password" class="form-control" name="newpassword_confirmation" placeholder="Re-Enter Password">
	                            </div>
                    		</div>
                    		<div class="form-group">
                    			<div class="col-md-4"></div> 
	                    		<div class="col-md-6">
	                             <button class="btn btn-info">submit</button>
	                            </div>
                    		</div>
                    		@include('layouts.required')
						</div> 
					</div>
				</div>
				</form>
			@endif

		</div> 
	</section>
@endsection