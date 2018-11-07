<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Support\Facades\Storage; 
use App\VehicleType;
use App\Vehicle;
use Carbon\Carbon;
use Auth;
use DB; 
use App\Driver;
use Image; 
class VehicleController extends Controller
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
        $count = Driver::where('users_id','=',Auth::user()->id)->count();
        $driver = Driver::where('users_id','=',Auth::user()->id)->get(); 
        if($count == 0){
            return view('home');
        }else{
            $VehicleTypes = VehicleType::all();  
            $carbon = new Carbon;
            return view('drivers.newVehicle',compact('VehicleTypes','carbon','driver'));
        }
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        $carbon = new Carbon(); 
        //Page Variables
        // title
        // seatsCapacity
        // vehicleType
        // vehiclePicture[]
        // orPicture
        // crPicture
        //
        $this->validate($request,[
            'title'=>'required|string|max:255',  
            'seatsCapacity'=>'required',
            'vehicleType'=>'required',
            'vehiclePicture'=>'required',
            'orPicture'=>'required',
            'crPicture'=>'required', 
            'cr_exp'=>'required',
            ]);
        
        $v = new Vehicle;
        $v->drivers_id = $id;
        $v->title = $request->title;
        $v->vehicle_type_id = $request->vehicleType;
        $v->seatingCapacity = $request->seatsCapacity;
        $v->orPath = '';
        $v->crPath = ''; 
        $v->cr_exp = $request->cr_exp;
        $v->save();
        $vID = $v->id;

        $orfile = $request->file('orPicture');
        $or_ext = $orfile->guessClientExtension();//get the extension
        //file destination directory //storagee/app/ 
        $orpath = "or/".$id."/{$vID}/or.{$or_ext}"; 
        $ors3 = Storage::disk('s3');
        $sfile = Image::make($orfile);
        $sfile->stream();
        $ors3->put($orpath, $sfile->getEncoded(),'public');  

        $crfile = $request->file('crPicture');
        $cr_ext = $crfile->guessClientExtension();//get the extension
        //file destination directory //storagee/app/ 
        $crpath = "cr/".$id."/{$vID}/cr.{$cr_ext}";//format the file path to save into the database
        $crs3 = Storage::disk('s3');
        $sfile = Image::make($crfile);
        $sfile->stream();
        $crs3->put($crpath, $sfile->getEncoded(),'public');  

       

        $uv = Vehicle::find($vID);
        $uv->orPath = $orpath;
        $uv->crPath = $crpath;
        $uv->save();

        $getV_id = Vehicle::where('drivers_id',$id)->max('id');
        $vehiclePictures = $request->file('vehiclePicture');
        $ctr = 1;
        foreach ($vehiclePictures as $vehiclePicture) {
            //echo "".$vehiclePicture->getClientOriginalName()."<br>";
             $vi_ext = $vehiclePicture->guessClientExtension();//get the extension
            //file destination directory //storagee/app/ 
            $vipath = "vi/".$getV_id."/{$ctr}.{$vi_ext}";//format the file path to save into the database
            $s3 = Storage::disk('s3');
            $sfile = Image::make($vehiclePicture)->resize(200, 150); 
            $sfile->stream();
            $s3->put($vipath, $sfile->getEncoded(),'public');  
            
            DB::table('vehicle_images')
                ->insert([
                    'vehicles_id'=>$getV_id,
                    'imagePath'=>$vipath,
                    'created_at'=>$carbon->now(),
                    'updated_at'=>$carbon->now()
                    ]);
            $ctr++;
        }

        return redirect('userSettings');
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
        $v = Vehicle::find($id); 
        $v->delete();
        return back();
    }
}
