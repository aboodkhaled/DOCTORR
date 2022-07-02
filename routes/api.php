<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Tymon\JWTAuth\Facades\JWTAuth;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//all routes / api here must be api authenticated
Route::group(['middleware' =>['api'/*,'checkPassword',*/,'changeLanguage'], 'namespace' => 'Api'], function () {
    Route::get('/get-all', 'HomeController@mo');
    Route::post('get-category-byId', 'HomeController@getCategoryById');
    Route::post('change-category-status', 'HomeController@changeStatus');

    Route::group(['prefix' => 'admin','namespace'=>'Admin'],function (){
        Route::post('login', 'AuthController@login');

        Route::post('logout','AuthController@logout') -> middleware(['auth.guard:admin-api']);
          //invalidate token security side

         //broken access controller user enumeration
    });

    Route::group(['prefix' => 'user','namespace'=>'User'],function (){
        Route::post('login','AuthController@Login') ;
    });


    Route::group(['prefix' => 'user' ,'middleware' => 'auth.guard:user-api'],function (){
       Route::post('profile',function(){
           return  \Auth::user(); // return authenticated user data
       }) ;


    });

});


Route::group(['middleware' => ['api','checkPassword','changeLanguage','checkAdminToken:admin-api'], 'namespace' => 'Api'], function () {
    Route::get('offers', 'CategoriesController@index');
});
