<?php

namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
 
use App\User;

class changePasswordController extends Controller
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

    //set or change 
    public function cpassword(){
        $user = \Auth::user();
        return view('users.changePassword',compact('user'));
    }

    public function setpassword(Request $request){

        $this->validate($request, [
            'password' => 'required|confirmed|min:6', 
        ]);

        $user = User::find(\Auth::user()->id);
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect('/myProfile');
    }

    public function updatepassword(Request $request){
        $this->validate($request,[
                'oldpassword' => 'required|min:6',
                'newpassword' => 'required|confirmed|min:6',
            ]);
        if (\Hash::check($request->oldpassword, \Auth::user()->password))
        {
            // The passwords match...
            $user = User::find(\Auth::user()->id);
            $user->password = bcrypt($request->newpassword);
            $user->save();
            \Auth::logout();
            return redirect('/login');
        }else{
            return \Redirect::back()->withErrors('Invalid Old Password!');
        }
         
    }

}
