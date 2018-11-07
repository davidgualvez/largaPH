<?php

namespace App\Http\Controllers\Auth;
 
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminLoginController extends Controller
{
	public function __construct(){
		$this->middleware('guest:admin')->except('logout');
	}
    // 
    public function showLoginForm(){

    	return view('auth.admin-login');
    }

    public function login(Request $request){
    	//validate the admin
    	$this->validate($request,[
    			'email' => 'required|email',
    			'password' => 'required|min:6'
    		]);
 
    	//Attempt to log the user in
    	if( \Auth::guard('admin')->attempt(['email'=>$request->email, 'password'=>$request->password]) ){
    		//if succress
    		return redirect()->intended('/admin/home');
    	}
    	
    	return redirect()->back()->withinput($request->only('email'));
    }

    public function logout(){
    	\Auth::guard('admin')->logout();
    	return redirect('/admin/login');
    }
}
