<?php

namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Plan;
use App\Payment;
use App\Subscription;
use Auth;
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Support\Facades\Storage; 
use Image;
use Carbon\Carbon;
class SubscriptionController extends Controller
{
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
        $subscription = Subscription::
            where('users_id',Auth::user()->id)
            ->where('start','<=',Carbon::now())
            ->where('end','>=',Carbon::now())
            ->first();
        $plans = Plan::all();
        return view('subscription.index',compact('plans','subscription'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  
     * @return \Illuminate\Http\Response
     */
    public function payment($plan_id){
        $plan = Plan::where('id',$plan_id)->get();
        return view('subscription.payment',compact('plan'));
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
         //restrict the field
        $this->validate($request,[
            'how_many_months'=>'required|numeric|min:1',
            'proof' => 'required|image',
            ]); 
        //
        $p = new Payment;
        $p->users_id = Auth::user()->id;
        $p->plans_id = $request->plans_id;
        $p->months = $request->how_many_months;
        $p->proof_of_payment = '.';
        $p->status = 'unverified';
        $p->save();

        $file = $request->file('proof');//upload the file
        $file_ext = $file->guessClientExtension();//get the extension
        //file destination directory //storagee/app/
        $path = "proof/".$p->id."/proof.{$file_ext}";//path foramt
        $s3 = Storage::disk('s3');
        $sfile = Image::make($file); 
        $sfile->stream();
        $s3->put($path, $sfile->getEncoded(),'public');  

        $p = Payment::find($p->id);
        $p->proof_of_payment = $path;
        $p->save();

        return redirect('/subscription');
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
