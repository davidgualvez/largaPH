<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Support\Facades\Storage; 
use Carbon\Carbon;
use Auth;
use DB;
use App\Driver;
use App\User;
use App\CityMun;
use Image;
class driverRegistrationController extends Controller
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
        $carbon = new Carbon(); 
        $carbon = $carbon->now()->subYears(18)->toDateString();
        $CityMun = CityMun::orderBy('description')->get();
        return view('drivers.driverRegistration',compact('carbon','CityMun'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $carbon = new Carbon(); 
        $id = Auth::user()->id;
        //
        $this->validate($request,[
            'firstName'=>'required|string|max:255',
            'lastName'=>'required|string|max:255',
            'birthDate'=>'required|date|before:'.$carbon->now()->subYears(18),  
            'cityFrom'=>'required',
            // 'cpNumber'=>'required|phone:PH',
            'licensePicture'=>'required'
            ]);  
        $file = $request->file('licensePicture');//upload the file   
        $file_ext = $file->guessClientExtension();//get the extension
        //file destination directory //storagee/app/
        $path = "licenses/".$id."/license.{$file_ext}";
        $s3 = Storage::disk('s3');
        $sfile = Image::make($file)->resize(400, 300); 
        $sfile->stream();
        $s3->put($path, $sfile->getEncoded(),'public');  
   
        // DB::table('users')
        //     ->where('id', $id)
        //     ->update(['isDriver' => 1]);

        DB::table('drivers') 
                ->insert([
                    'users_id' => $id,
                    'firstName' => $request->firstName,
                    'lastName' =>$request->lastName,
                    'birthDate' => Carbon::parse($request->birthDate),
                    'typeOfLicense' => $request->licenseType,
                    'targetCity' => $request->cityFrom,
                    'licensePath' => $path,
                    'created_at' => $carbon->now(),
                    'updated_at' => $carbon->now()
                    ]);
        //return to then settings 
        return redirect('/home');
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
        $carbon = new Carbon(); 
        //restriction
        $this->validate($request,[
            'firstName'=>'required|string|max:255',
            'lastName'=>'required|string|max:255',
            'birthDate'=>'required',
            'cityFrom' => 'required'
            //'licensePicture'=>'required'
            ]); 
        // 'users_id' => $id,
        //             'firstName' => $request->firstName,
        //             'lastName' =>$request->lastName,
        //             'birthDate' => $request->birthDate,
        //             'typeOfLicense' => $request->licenseType,
        //             'licensePath' => $path,
        //             'created_at' => $carbon->now(),
        //             'updated_at' => $carbon->now()
        $file = $request->file('licensePicture');//upload the file
        if($file == null){
            DB::table('drivers')
                ->where('id',$id)
                ->update([
                        'firstName' => $request->firstName,
                        'lastName' => $request->lastName,
                        'birthDate' => $request->birthDate,
                        'targetCity' => $request->cityFrom,
                        'typeOfLicense' => $request->licenseType,
                        'updated_at' => $carbon->now()
                    ]);

            //return to the settings
            return back();
        }else{
            $file_ext = $file->guessClientExtension();//get the extension
            //file destination directory //storagee/app/
            $path = "licenses/".$id."/license.{$file_ext}";
            $s3 = Storage::disk('s3');
            $sfile = Image::make($file)->resize(400, 300); 
            $sfile->stream();
            $s3->put($path, $sfile->getEncoded(),'public');  

            DB::table('drivers')
                ->where('id',$id)
                ->update([
                        'firstName' => $request->firstName,
                        'lastName' => $request->lastName,
                        'birthDate' => $request->birthDate,
                        'typeOfLicense' => $request->licenseType,
                        'licensePath' => $path,
                        'updated_at' => $carbon->now()
                    ]);

            //return to the settings
            return back();

        }
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
