@extends('admin.layouts.app') 
@section('content')
	 <!-- Content Header (Page header) -->
	<section class="content-header">
	  <h1>
	    Admin Panel
	    <small>Contact us - messages</small>
	  </h1>
	  <ol class="breadcrumb">
	    <li><a href="/admin/home"><i class="fa fa-dashboard"></i> Dashboard</a></li>
	    <li>Messages</li>
	    <li class="active">List</li>
	  </ol>
	</section> 
	<!-- Main content -->
	<section class="content container-fluid">

	 {{--  ------------------------ --}}
	 {{--    | Your Page Content Here | --}}
	 <!-- /.content -->
    @forelse($messages as $m)
    <div class="row">
        <div class="col-md-12">
          <div class="box box-solid">
            <div class="box-header with-border">
              <i class="fa fa-commenting"></i>
              {{-- <i class="fa fa-text-width"></i>  --}}
              <h3 class="box-title">{{$m->name}}</h3>
              <span class="pull-right">
                 <cite title="Source Title">{{ \Carbon\Carbon::parse($m->created_at)->diffForHumans() }} <i class="fa fa-globe" aria-hidden="true"></i></cite>
              </span>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <blockquote>
                <p>{{$m->message}}</p>
                <small>{{$m->email}}</small>
              </blockquote>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
  </div>
  @empty
    <h3>Empty...</h3>
  @endforelse
	 {{--    ------------------------ --}}

	</section>

@endsection