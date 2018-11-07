<?php

namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Support\Facades\Storage; 
use Auth;
use DB;
use Carbon\Carbon;
use App\Vehicle;
use Image;
class userSettingsController extends Controller
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
        $driver = DB::table('drivers')->where('users_id','=',Auth::user()->id)->get();
        if($driver->first()){
            //dd('This is not null');
            $vehicles = Vehicle::where('drivers_id',$driver[0]->id)->get();
            return view('users.accountSettings',compact('driver','vehicles'));
        }else{
            //dd('this is Null'); 
            return view('users.accountSettings',compact('driver'));
        }
         
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
    //public function update(Request $request, $id)
    public function update(Request $request,$id)
    {
        $carbon = new Carbon(); 
        //list of variable names in the form
        //name
        //email
        //mobileNumber
        //avatarPath 

         //restrict the field
        $this->validate($request,[
            'name'=>'required|string|max:255',
            'email'=>'required|string|email|max:255',
            // 'email'=>'required|string|email|max:255|unique:users',
            'mobileNumber'=>'required|phone:PH',
            // 'avatarPath'=>'required',
            ]); 

        //filter mobile number
        $mobNumber_length = strlen($request->mobileNumber);;
        $mobNumber = substr($request->mobileNumber,$mobNumber_length - 10);
        $new_mobNumber = '63'.$mobNumber;
        //dd('orig:'.$request->mobileNumber,'trimed:'.$mobNumber,'new format: '.$new_mobNumber);
        
        //$id is the id of current logged user 
        $file = $request->file('avatarPath');//upload the file
        if($file == null){
            //save and update the data
            DB::table('users')
                ->where('id', $id)
                ->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'mobileNumber' => $new_mobNumber,
                    'updated_at' => $carbon->now()
                    ]);
            //return to then settings
            return back();
        } 
        
        
        $file_ext = $file->guessClientExtension();//get the extension
        //file destination directory //storagee/app/
        $path = "avatars/".$id."/avatar.{$file_ext}";//path foramt
        $s3 = Storage::disk('s3');
        $sfile = Image::make($file)->resize(150, 150); 
        $sfile->stream();
        $s3->put($path, $sfile->getEncoded(),'public'); 
        //$file->storeAs('public/'.$path, "avatar.{$file_ext}");//save the file into the directory of storage/app/{id}/avatar.{ext} 
    
        //save and update the data
        DB::table('users')
            ->where('id', $id)
            ->update([
                'name' => $request->name,
                'email' => $request->email,
                'mobileNumber' => $new_mobNumber,
                'avatarPath' => $path,
                'updated_at' => $carbon->now()
                ]);

        //return to then settings
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
