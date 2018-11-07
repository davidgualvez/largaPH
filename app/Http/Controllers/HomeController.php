<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $posts = \DB::table('posts AS p')
            ->select(\DB::raw('p.id,p.title,p.users_id,p.bids_id,
                (SELECT description FROM vehicle_type WHERE id=p.vehicle_type_id) as vehicle,
                p.seats_need,
                (SELECT description FROM city_mun WHERE cityMunCode = p.fromCity) as fromCity,
                (SELECT description FROM brgy WHERE brgyCode = p.fromBrgy) as fromBrgy,
                (SELECT description FROM city_mun WHERE cityMunCode = p.toCity) as toCity,
                (SELECT description FROM brgy WHERE brgyCode = p.toBrgy) as toBrgy,
                p.departure,p.created_at,p.updated_at,p.message'))
            ->where('p.departure','>',\Carbon\Carbon::now())
            ->orderBy('p.created_at','desc')
            ->get(); 


            return view('home',compact('posts'));  
    }
}
