@extends('layouts.master')

@section('content')

 
    <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Home
      <small>A page for all the post.</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="/home"><i class="fa fa-home"></i> Home</a></li>
      <li class="active">List</li> 
    </ol>
  </section> 
  <!-- Main content -->
  <section class="content">
    <!-- row -->
      <div class="row">
        <div class="col-md-12">
          @if($posts->count() > 0)
          <!-- The time line --> 
          <ul class="timeline">
            {{-- --------------------------- --}}
            @forelse($posts as $post)
              <!-- timeline item -->
               <?php 
                        $name = \DB::table('users')->where('id',$post->users_id)->get(); 
                    ?> 
              <li>  
                <div class="fa"><img class="img-circle bg-blue"   src="{{ \Storage::disk('s3')->url($name[0]->avatarPath)}}" width="30" height="30"></div>
                {{-- <i class="fa fa-envelope bg-blue"><img class="bg-yellow img-circle" height="30" width="30" src="{{ \Storage::disk('s3')->url(Auth::user()->avatarPath)}}"></i>  --}}
                <div class="timeline-item">
                  <span class="time"><i class="fa fa-clock-o"></i> {{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</span>  

                  <h3 class="timeline-header"><a href="/profile/{{$post->users_id}}">{{$name[0]->name}}</a> {{$post->title}}</h3>

                  <div class="timeline-body" style="padding-bottom: 0px;">
                    {{-- <div class="box "> 
                      <div class="box-body"> --}}
                        <dl style="margin-left: 20px; margin-right: 20px;">
                          <dt>Vehicle</dt>
                          <dd>{{ $post->vehicle }}</dd>

                          <dt>Seats Need</dt>
                          <dd>{{ $post->seats_need }}</dd> 

                          <dt>From City/Mun of</dt>
                          <dd>{{ $post->fromCity }}, Brgy. {{ $post->fromBrgy }}</dd>

                          <dt>To City/Mun of</dt>
                          <dd>{{ $post->toCity }}, Brgy. {{ $post->toBrgy }}</dd>

                          <dt>Departure date</dt>
                          <dd>{{ \Carbon\Carbon::parse($post->departure)->toDayDateTimeString() }}</dd> 

                          <dt>Notes</dt>
                          <dd class="well well-sm"> {{ $post->message}}</dd> 
                        </dl>
                      {{-- </div> --}}
                      <!-- /.box-body -->
                    {{-- </div> --}}
                    <!-- /.box -->
                  </div>
                  <div class="timeline-footer"  >
                   
                    @if(Auth::user()->id==$post->users_id) 
                      <a href="/posts/{{$post->id}}" class="btn btn-primary btn-xs">View</a>
                    @endif
                    @if(Auth::user()->isDriver==1 && Auth::user()->id != $post->users_id && $post->bids_id == null)
                      <a href="/createBid/{{$post->id}}" class="btn btn-primary btn-xs">place Bid</a>
                    @endif 
                    <a class="pull-right">
                    @if($post->bids_id == null)
                        Looking for Driver!
                    @else
                       Post Closed
                    @endif
                    </a> 
                  </div>
                </div>
              </li>
              <!-- END timeline item --> 
            @empty
              
            @endforelse  
            {{-- --------------------------- --}}
          </ul>
          
          @else
          <div class="alert alert-info" role="alert">Opps..! Theres no Trip to be display. please create your Trip :) <a href="/createPost">Click here</a>
          </div>
          @endif
            {{-- --------------------------------- --}}
        </div>
      </div> 
  </section>
 
@endsection  