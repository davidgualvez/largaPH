<?php
namespace App\Http\Controllers;
use Nexmo\Laravel\Facade\Nexmo;
use Auth;
use DB;
use App\Bid;
use App\Post;
use App\Driver;
use App\User;
use App\VehicleType;
use App\CityMun;
use App\Notification;
use Carbon\Carbon;
use App\Vehicle;
use Illuminate\Http\Request;
use App\Subscription;

class PostsController extends Controller
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
        $posts = Post::all();
        return view('users.posts',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $VehicleTypes = VehicleType::all(); 
        $CityMun = CityMun::orderBy('description')->get();
        $carbon = new Carbon;
        return view('users.createPost',compact('VehicleTypes','CityMun','carbon'));
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
        $this->validate($request,[
                'title' => 'required',
                'vehicleType' => 'required',
                'seatsNeed' => 'required|numeric',
                'cityFrom' => 'required',
                'brgyFrom' => 'required',
                'cityTo' => 'required',
                'brgyTo' => 'required', 
                'departure' => 'required|date|date_format:Y-m-d H:i:s|after:'.Carbon::now(),
                'message' => 'required',
            ]); 

        $id = Auth::user()->id;
        $post = new Post;
        $post->users_id = $id;
        $post->title = $request->title;
        $post->vehicle_type_id = $request->vehicleType;
        $post->seats_need = $request->seatsNeed;
        $post->fromCity = $request->cityFrom;
        $post->fromBrgy = $request->brgyFrom;
        $post->toCity = $request->cityTo;
        $post->toBrgy = $request->brgyTo;
        $post->departure = $request->departure;
        $post->message = $request->message;
        $post->save();

        //sending notification to a drivers
        $drivers = Driver::where('targetCity',$request->cityFrom)->get();
        foreach ($drivers as $driver) {
            # code... 
            $check_vehicle = Vehicle::
                where('drivers_id',$driver->id)
                ->where('vehicle_type_id',$request->vehicleType)
                ->where('seatingCapacity','>=',$request->seatsNeed)
                ->where('status',1)
                ->first();
            if($check_vehicle != null){
                $user = User::where('id',$id)->get();//to know the sender
                $vehicle = VehicleType::where('id',$request->vehicleType)->get();//to know the vehicle
                //toDatabase 
                $notify = new Notification;
                $notify->posts_id = $post->id;
                $notify->users_id = $driver->users_id; 
                $notify->data = $request->title.' by '.$user[0]->name.' looking for a '.$vehicle[0]->description;
                $notify->save();
                //toSMS
 
                $subscription = Subscription::
                    where('users_id',$driver->users_id)
                    ->where('start','<=',Carbon::now())
                    ->where('end','>=',Carbon::now())
                    ->first();
                if($subscription != null){
                    $checker = User::where('id',$driver->users_id)
                    ->where('mobileNumber','!=',null)
                    ->get();
                    if($checker->first()){
                        Nexmo::message()->send([
                            'to' => $checker[0]->mobileNumber,//$checker[0]->mobileNumber,
                            'from' => 'LargaPH',
                            'text' => $request->title.' post by '.$user[0]->name.', looking for a '.$vehicle[0]->description.', Please check your notification in your account for more Info!'
                        ]);
                    }
                } 
            } 
        }
        //

        return redirect('myProfile');
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
        $post = \DB::table('posts AS p')
            ->select(\DB::raw('p.id,p.title as title,p.users_id,p.bids_id,
                (SELECT description FROM vehicle_type WHERE id=p.vehicle_type_id) as vehicle,
                p.seats_need,
                (SELECT description FROM city_mun WHERE cityMunCode = p.fromCity) as fromCity,
                (SELECT description FROM brgy WHERE brgyCode = p.fromBrgy) as fromBrgy,
                (SELECT description FROM city_mun WHERE cityMunCode = p.toCity) as toCity,
                (SELECT description FROM brgy WHERE brgyCode = p.toBrgy) as toBrgy,
                p.departure,p.created_at,p.updated_at,p.message'))
            ->where('p.id',$id)
            ->orderBy('p.created_at','desc')
            ->get(); 
        if($post[0]->bids_id != null){
            //dd('time to change the result');
            $bids = Bid::where('posts_id',$id)
                ->where('id','!=',$post[0]->bids_id)
                ->orderBy('created_at','desc')->get(); //get the other bid that has not been choosed

            $choosenBid = Bid::Where('id',$post[0]->bids_id)->get();  
            
            return view('users.showPost',compact('post','bids','choosenBid')); 
        }else{
            $bids = Bid::where('posts_id',$id)->orderBy('created_at','desc')->get(); 
            return view('users.showPost',compact('post','bids'));
        } 
    }
 
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($postid)
    {
        //
        $post = Post::find($postid);
        $VehicleTypes = VehicleType::all(); 
        $CityMun = CityMun::orderBy('description')->get();
        $carbon = new Carbon;
        return view('users.editPost',compact('post','VehicleTypes','CityMun','carbon'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $postid)
    {
        $this->validate($request,[
                'title' => 'required',
                'vehicleType' => 'required',
                'seatsNeed' => 'required|numeric',
                'cityFrom' => 'required',
                'brgyFrom' => 'required',
                'cityTo' => 'required',
                'brgyTo' => 'required', 
                'departure' => 'required|date|date_format:Y-m-d H:i:s|after:'.Carbon::now(),
                'message' => 'required',
            ]); 
        
        $post = Post::find($postid);
        $post->title = $request->title;
        $post->vehicle_type_id = $request->vehicleType;
        $post->seats_need = $request->seatsNeed;
        $post->fromCity = $request->cityFrom;
        $post->fromBrgy = $request->brgyFrom;
        $post->toCity = $request->cityTo;
        $post->toBrgy = $request->brgyTo;
        $post->departure = $request->departure;
        $post->updated_at = Carbon::now();
        $post->message = $request->message;
        $post->save();
        return redirect('posts/'.$postid);
    }
    public function updateForBid($postID,$bidID){
        //dd($postID,$bidID);
        $post = Post::find($postID);
        $post->bids_id = $bidID;
        $post->save();

        $bid = Bid::find($bidID);
        $bid->isApprove = 1;
        $bid->save();
 
        $driver = Driver::where('id',$bid->drivers_id)->get();
        //toDatabase 
        $notify = new Notification;
        $notify->posts_id = $post->id;
        $notify->users_id = $driver[0]->users_id; 
        $notify->data = 'Hi! '.$driver[0]->firstName.'. Your propose bid from '.$post->title.' post was approved!. Please contact the user/commuter for immediate response.';
        $notify->save();

        $checker = User::where('id',$driver[0]->users_id)
            ->where('mobileNumber','!=',null)
            ->get();
        if($checker->first()){ 
            Nexmo::message()->send([
                'to' => $checker[0]->mobileNumber,//$checker[0]->mobileNumber,
                'from' => 'LargaPH',
                'text' => 'Hi! '.$driver[0]->firstName.'. Your propose bid from '.$post->title.' post was approved!. Please contact the user/commuter for immediate response.'
            ]);
        }

        return back();
    }
     public function cancelForBid($postID,$bidID){
        //dd($postID,$bidID);
        $post = Post::find($postID);
        $post->bids_id = null;
        $post->save();

        $bid = Bid::find($bidID);
        $bid->isApprove = 0;
        $bid->save();

        $driver = Driver::where('id',$bid->drivers_id)->get();
        //toDatabase 
        $notify = new Notification;
        $notify->posts_id = $post->id;
        $notify->users_id = $driver[0]->users_id; 
        $notify->data = 'Hi! '.$driver[0]->firstName.'. Your propose bid from '.$post->title.' post was cancelled!.';
        $notify->save();
        
        $checker = User::where('id',$driver[0]->users_id)
            ->where('mobileNumber','!=',null)
            ->get();
        if($checker->first()){ 
            Nexmo::message()->send([
                'to' => $checker[0]->mobileNumber,//$checker[0]->mobileNumber,
                'from' => 'LargaPH',
                'text' => 'Hi! '.$driver[0]->firstName.'. Your propose bid from '.$post->title.' post was cancelled!.'
            ]);
        }

        return back();
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
