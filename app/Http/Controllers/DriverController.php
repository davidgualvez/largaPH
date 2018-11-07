<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Support\Facades\Storage; 
use App\Driver;
use App\DriverRating;
use App\User;
use App\Vehicle;
class DriverController extends Controller
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
    public function store(Request $request,$driverid,$userid)
    {
        //
        $dr = new DriverRating;
        $dr->drivers_id = $driverid;
        $dr->users_id = $userid;
        $dr->rating = $request->rating;
        $dr->title = $request->title;
        $dr->message = $request->message;
        $dr->save();
        return back();
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
        $driver = Driver::find($id);
        $user_driver = User::find($driver->users_id);
        $ratings = DriverRating::where('drivers_id',$driver->id)
            ->where('users_id','!=',\Auth::user()->id)
            ->get();
        $r_breakdown_5 = \DB::table('driver_ratings')
            ->select(\DB::raw("IFNULL(COUNT(rating),0) as sum"))
            ->where('drivers_id',$driver->id)
            ->where('rating',5) 
            ->get();

        $r_breakdown_4 = \DB::table('driver_ratings')
            ->select(\DB::raw("IFNULL(COUNT(rating),0) as sum"))
            ->where('drivers_id',$driver->id)
            ->where('rating',4) 
            ->get();
        $r_breakdown_3 = \DB::table('driver_ratings')
            ->select(\DB::raw("IFNULL(COUNT(rating),0) as sum"))
            ->where('drivers_id',$driver->id)
            ->where('rating',3) 
            ->get(); 
        $r_breakdown_2 = \DB::table('driver_ratings')
            ->select(\DB::raw("IFNULL(COUNT(rating),0) as sum"))
            ->where('drivers_id',$driver->id)
            ->where('rating',2) 
            ->get();
        $r_breakdown_1 = \DB::table('driver_ratings')
            ->select(\DB::raw("IFNULL(COUNT(rating),0) as sum"))
            ->where('drivers_id',$driver->id)
            ->where('rating',1) 
            ->get();
        $r_average = @( 
            (($r_breakdown_5[0]->sum * 5) +
            ($r_breakdown_4[0]->sum * 4) +
            ($r_breakdown_3[0]->sum * 3) +
            ($r_breakdown_2[0]->sum * 2) +
            ($r_breakdown_1[0]->sum * 1)) /
            (($r_breakdown_5[0]->sum) +
                ($r_breakdown_4[0]->sum) +
                ($r_breakdown_3[0]->sum) +
                ($r_breakdown_2[0]->sum) +
                ($r_breakdown_1[0]->sum) 
                )
            );
        if(is_nan($r_average)) {
          $r_average = 0;
        }
       // dd($r_average);
        $maxV = max($r_breakdown_5[0]->sum,$r_breakdown_4[0]->sum,$r_breakdown_3[0]->sum,$r_breakdown_2[0]->sum,$r_breakdown_1[0]->sum); 

        $vehicles = Vehicle::where('drivers_id',$id)->get();
        return view('drivers.profile',compact(
            'driver',
            'user_driver',
            'ratings', 
            'r_average',
            'r_breakdown_5',
            'r_breakdown_4',
            'r_breakdown_3',
            'r_breakdown_2',
            'r_breakdown_1',
            'maxV',
            'vehicles'
            ));
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
