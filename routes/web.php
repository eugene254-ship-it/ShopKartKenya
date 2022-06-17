<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\payments\mpesa\MPESAController;
use App\Notification\SendEmailNotification;

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
    return view('/front/welcome');
});



require __DIR__.'/auth.php';

//HomePage Route
Route::get('welcome', 'AdminController@welcome');


// Admin Login Route
Route::prefix('/admin')->namespace('App\Http\Controllers\Admin', 'App\Http\Controllers\payments\mpesa')->group(function(){

    // Admin Login Route
    Route::match(['get','post'],'login', 'AdminController@login');
    Route::group(['middleware'=>['admin']],function(){
        // Admin Dashboard Route
        Route::get('dashboard', 'AdminController@dashboard');

        //Update Admin Password
        Route::match(['get','post'],'update-admin-password','AdminController@updateAdminPassword');

         //Edit Product Details
         Route::match(['get','post'],'edit-products','AdminController@editProducts');

          //Mpesa Controller
        Route::get('get-token', [MPESAController::class, 'getAccessToken']);

        Route::get('send',[HomeController::class, "sendnotification"]);

        //Update Password Check
        Route::post('check-admin-password','AdminController@checkAdminPassword');

        Route::get('mpesa', 'AdminController@mpesa');

         //Pricing Route
         Route::get('pricing', 'AdminController@pricing');

         //Profile Details
        Route::match(['get','post'],'profile','AdminController@profile');

        //Update Admin Details
        Route::match(['get','post'],'update-admin-details','AdminController@updateAdminDetails');

        //Admin Logout
        Route::get('logout', 'AdminController@logout');
    });
    
});





// User Login Route
// Route::prefix('/user')->namespace('App\Http\Controllers\User')->group(function(){
    //User Login Route



//User Dashboard Route





//User Update Password

//Product Edit


//Update Password Check


//User Login 


//})



