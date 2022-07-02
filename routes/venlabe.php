<?php
use Illuminate\Support\Facades\Route; 
/*
|--------------------------------------------------------------------------
| admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group([
  'prefix' => LaravelLocalization::setLocale(),
  'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
], function () {
  
Route::group(['namespace' => 'venlabe', 'middleware' => 'auth:venlabe', 'prefix' => 'venlabe'], function(){
  Route::get('/', 'DashboardController@index') -> name('venlabe.dashboard');
  Route::get('logout', 'LoginController@logout')->name('venlabe.logout');
    
  
  
});



  Route::group(['namespace' => 'venlabe' ,'middlewware' => 'guest:venlabe', 'prefix' => 'venlabe'], function(){
   Route::get('/login', 'loginController@getlogin') -> name('get.venlabe.login');
   Route::post('/login', 'loginController@login') -> name('venlabe.login');
      
 });

});

  
#########
