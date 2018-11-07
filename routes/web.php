<?php
/*    
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/  
Route::get('/', function () {
    return view('welcome');
});
 
Auth::routes();
Route::get('/terms_of_use',function(){
        return view('agreements.terms_of_use');
    })->name('user.tou');

Route::get('/privacy_policy',function(){
        return view('agreements.privacy_policy');
    })->name('user.pp');
Route::get('/disclaimer',function(){
        return view('agreements.disclaimer');
    })->name('user.d');
 
 
Route::post('/userlogout','Auth\LoginController@userlogout')->name('user.logout');
  
Route::get('/home', 'HomeController@index');

//admin
Route::get('/admin/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
Route::post('/admin/login', 'Auth\AdminLoginController@login');
Route::post('/admin/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
Route::get('/admin/home', 'AdminController@index')->name('admin.home');
Route::get('/admin/vehicle_entry','AdminVehicleEntryController@index')->name('admin.vehicle_entry');
Route::post('/admin/approve_vehicle/{id}','AdminVehicleEntryController@update');
Route::get('/admin/messages','AdminMessageController@index')->name('admin.messages');
Route::get('/admin/commuters','AdminController@listofcommuters')->name('admin.commuters');
Route::get('/admin/drivers','AdminController@listofdrivers')->name('admin.drivers');
route::get('/admin/approve_driver/{id}','AdminController@approve_driver');
route::get('/admin/remove_driver/{id}','AdminController@remove_driver');
Route::get('/admin/unverified_drivers','AdminController@unverified_drivers')->name('admin.unverified_drivers');
Route::get('/admin/payment_request','AdminController@payment_request')->name('admin.payment_request');
Route::get('/admin/active_subs','AdminController@active_subs')->name('admin.active_subs');
Route::post('/admin/approve_payments/{id}','AdminController@approve_payments');
Route::post('/admin/remove_payments/{id}','AdminController@remove_payments');

//users Controller
Route::get('/myProfile','userProfileController@index');
Route::get('/createPost','PostsController@create'); //display the create page
Route::post('/storePost','PostsController@store'); //store the data from create page
Route::get('/posts/{id}','PostsController@show');
Route::get('/profile/{id}','userProfileController@show');
Route::post('/post/{postID}/bid/{bidID}','PostsController@updateForBid');
Route::post('/cancel/post/{postID}/bid/{bidID}','PostsController@cancelForBid');
Route::get('/posts/edit/{postid}','PostsController@edit');
Route::post('/editPost/{postid}','PostsController@update');
 
//drivers controller
Route::get('/driverRegistration','driverRegistrationController@create'); // dispaly the driver registration for a user
Route::post('/createDriver','driverRegistrationController@store');
Route::post('/updateDriver/{id}','driverRegistrationController@update');
Route::get('/driverProfile/{id}','DriverController@show');
Route::post('/driverRating/{driverid}/{userid}','DriverController@store');

//userSettings Controller
Route::get('/userSettings','userSettingsController@create'); //display the settings for the user account
Route::post('/updateSettings/{id}','userSettingsController@update');

// OAuth Routes for socialites
Route::get('/auth/{provider}', 'SocialiteController@redirectToProvider');
Route::get('/auth/{provider}/callback', 'SocialiteController@handleProviderCallback');

//Location , city , brgy
Route::get('/getBrgy','LocationController@returnBrgy');

//vehicle
Route::get('/newVehicle','VehicleController@create');
Route::post('/storeVehicle/{id}','VehicleController@store');
Route::post('/removeVehicle/{id}','VehicleController@destroy');

//bids
Route::get('/createBid/{postID}','BidsController@create');
Route::post('/storeBid/{postID}','BidsController@store');
Route::get('/bids','BidsController@index');

//user notification
Route::get('/notifications','NotificationController@index');

//contact us
Route::post('/contactus','ContactusController@store');

//change pass
Route::get('/changepassword','changePasswordController@cpassword');
Route::post('/setpassword','changePasswordController@setpassword');
Route::post('/updatepassword','changePasswordController@updatepassword');


Route::get('/subscription','SubscriptionController@create')->name('subscription');

Route::get('/plan/{plan_id}/payment','SubscriptionController@payment');
Route::post('/payment','SubscriptionController@store');