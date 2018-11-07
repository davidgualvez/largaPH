<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input; 
use Illuminate\Http\Request;
 use App\Brgy;

class LocationController extends Controller
{
    //
    public function returnBrgy(){
    	$cityCode = Input::get('cityCode');
		$brgy = Brgy::where('cityMunCode','=',$cityCode)->orderBy('description')->get();
		//dd($brgy);
		return response()->json($brgy);
    }
}
