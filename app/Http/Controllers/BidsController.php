<?php
 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Bid;
use App\Driver;
use Auth;
class BidsController extends Controller
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
        $driver = Driver::where('users_id',Auth::user()->id)->get();
        $bids = Bid::where('drivers_id',$driver[0]->id)->get();
        return view('drivers.bids',compact('bids'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($postID)
    {
        //
        $driver = Driver::where('users_id',Auth::user()->id)->get();

        $checker = Bid::where('drivers_id',$driver[0]->id)
                ->where('posts_id',$postID)
                ->get();

        if($checker->first()){
            //already bid. redirect to bids page
            return redirect('/bids');
        }else{
            $post = \DB::table('posts AS p')
            ->select(\DB::raw('p.id,p.title,p.users_id,p.bids_id,
                (SELECT description FROM vehicle_type WHERE id=p.vehicle_type_id) as vehicle,
                p.seats_need,
                (SELECT description FROM city_mun WHERE cityMunCode = p.fromCity) as fromCity,
                (SELECT description FROM brgy WHERE brgyCode = p.fromBrgy) as fromBrgy,
                (SELECT description FROM city_mun WHERE cityMunCode = p.toCity) as toCity,
                (SELECT description FROM brgy WHERE brgyCode = p.toBrgy) as toBrgy,
                p.departure,p.created_at,p.updated_at'))
            ->where('p.id',$postID)
            ->orderBy('p.created_at','desc')
            ->get(); 
            return view('drivers.createBid',compact('post')); 
        } 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$postID)
    {
         //restrict the field
        $this->validate($request,[
            'cost'=>'required',
            'shortMessage' => 'required',
            ]); 
        
        //
        $driverID = Driver::where('users_id',Auth::user()->id)->get();
        //dd($request,$postID,$driverID[0]->id);
        $bid = new Bid;
        $bid->drivers_id = $driverID[0]->id;
        $bid->posts_id = $postID;
        $bid->cost = $request->cost;
        $bid->shortMessage = $request->shortMessage;
        $bid->save();
        return redirect('/bids');
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
