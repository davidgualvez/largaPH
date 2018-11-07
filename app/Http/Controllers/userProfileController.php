<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use App\User; 
use App\Driver;
use App\Subscription;
use Carbon\Carbon;
class userProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 
        $subscription = Subscription::
            where('users_id',Auth::user()->id)
            ->where('start','<=',Carbon::now())
            ->where('end','>=',Carbon::now())
            ->first();

        $user = User::find(Auth::user()->id);
        $driver = Driver::where('users_id',$user->id)->get();
         
        //$posts = Post::where('users_id',$user->id)->orderBy('created_at','desc')->get();
        $posts = \DB::table('posts AS p')
            ->select(\DB::raw('p.id,p.title,p.users_id,p.bids_id,
                (SELECT description FROM vehicle_type WHERE id=p.vehicle_type_id) as vehicle,
                p.seats_need,
                (SELECT description FROM city_mun WHERE cityMunCode = p.fromCity) as fromCity,
                (SELECT description FROM brgy WHERE brgyCode = p.fromBrgy) as fromBrgy,
                (SELECT description FROM city_mun WHERE cityMunCode = p.toCity) as toCity,
                (SELECT description FROM brgy WHERE brgyCode = p.toBrgy) as toBrgy,
                p.departure,p.created_at,p.updated_at'))
            ->where('p.users_id',$user->id)
            ->orderBy('p.created_at','desc')
            ->get();
        return view('users.userProfile',compact('user','posts','driver','subscription'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $user = User::find($id);
        return view('users.profile',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
