<?php

namespace App\Http\Controllers;
  
use App\Post;
use App\User;
use App\Driver;
use App\Payment;
use App\Subscription;
use Carbon\Carbon;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        return view('admin.home');  
    }

    public function listofcommuters(){
        $commuters = User::orderBy('created_at','desc')->get(); 
        return view('admin.users.commuters',compact('commuters'));
    }

    public function listofdrivers(){
        $drivers = Driver::where('status','verified')->orderBy('created_at','desc')->get();  
        return view('admin.users.drivers',compact('drivers'));
    }

    public function payment_request(){
        $payments = Payment::where('status','unverified')->get();
        return view('admin.subscriptions.payments',compact('payments'));
    }

    public function approve_payments($id){ 
         
        $p = Payment::find($id);
        $p->status = "approved";
        $p->updated_at = Carbon::now();
        $p->save(); 

        $check = Subscription::where('users_id',$p->users_id)
            ->where('start','<=',Carbon::now())
            ->where('end','>=',Carbon::now())
            ->first(); 

        if($check != null){
           // $check->
            $check = Subscription::find($check->id);
            $check->number_of_month = $check->number_of_month + $p->months;  
            $check->end = Carbon::parse($check->start)->addMonths($check->number_of_month);
            $check->save();
        }else{
            //save fresh subscription
            $s = new Subscription;
            $s->users_id = $p->users_id;
            $s->plan_id = $p->plans_id;
            $s->number_of_month = $p->months;
            $s->start = Carbon::now();
            $s->end = Carbon::now()->addMonths($p->months);
            $s->save();
        } 
        return back();
    }
    public function remove_payments($id){
        $p = Payment::find($id);
        $p->status = "removed";
        $p->updated_at = Carbon::now();
        $p->save();
        return back();
    }

    public function active_subs(){
        $subscriptions = Subscription::
            where('start','<=',Carbon::now())
            ->where('end','>=',Carbon::now())
            ->get();
        return view('admin.subscriptions.active_subscription',compact('subscriptions'));
    }

    public function unverified_drivers(){
        $drivers = Driver::where('status','unverified')->get();
        return view('admin.users.unverified_driver',compact('drivers'));
    }

    public function approve_driver($id){
        $d = Driver::find($id);
        $d->status = "verified";
        $d->save();
        $user = User::find($d->users_id);
        $user->isDriver = 1;
        $user->save();

        return back();
    }
    public function remove_driver($id){
        Driver::destroy($id);
        return back();
    }

}
