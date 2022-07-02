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

Route::group(['namespace' => 'doctor', 'middleware' => 'auth:doctorr', 'prefix' => 'doctorr'], function(){
  Route::get('/', 'DashboardController@index') -> name('doctor.dashboard');
  Route::get('logout', 'LoginController@logout')->name('doctor.logout');
    

  Route::group(['prefix' => 'profile'], function () {
    Route::get('edit', 'ProfileeController@eeditProfile')->name('doctor.edit.profile');
    Route::put('update', 'ProfileeController@updateprofile')->name('doctor.update.profile');
    Route::get('/cuontry', 'ProfileeController@getcity') -> name('doctor.doctors.getcity');
});

Route::group(['prefix' => 'sikss'  ], function () {
  Route::get('/', 'sikssController@index')->name('doctor.sikss.index');
  Route::get('/create', 'sikssController@create')->name('doctor.sikss.create');
  Route::post('/store', 'sikssController@store')->name('doctor.sikss.store');
  Route::get('edit/{id}', 'sikssController@edit') -> name('doctor.sikss.edit');
    Route::post('update/{id}', 'sikssController@update') -> name('doctor.sikss.update');
    Route::get('delete/{id}', 'sikssController@destroy') -> name('doctor.sikss.delete');
    Route::get('/price', 'sikssController@getprice') -> name('doctor.sikss.getprice');
    Route::get('show/{id}', 'sikssController@showdetail') -> name('doctor.sikss.show');
    Route::post('upaxam', 'sikssController@upaxam') -> name('doctor.sikss.upaxam');
    Route::post('upxray', 'sikssController@upxray') -> name('doctor.sikss.upxray');
    Route::get('/xprice', 'sikssController@xprice') -> name('doctor.sikss.xprice');
    Route::post('upphar', 'sikssController@upphar') -> name('doctor.sikss.upphar');
    Route::get('/pprice', 'sikssController@pprice') -> name('doctor.sikss.pprice');
    Route::post('updia', 'sikssController@updia') -> name('doctor.sikss.updia');
    Route::get('print/{id}', 'sikssController@print') -> name('doctor.sikss.print');
    Route::get('pdf/{id}', 'sikssController@pdf') -> name('doctor.sikss.pdf');
});

});
  
  




  Route::group(['namespace' => 'doctor' ,'middlewware' => 'guest:doctorr', 'prefix' => 'doctorr'], function(){
    Route::get('login', 'loginController@getlogin') -> name('get.doctor.login');
   Route::post('login', 'loginController@login') -> name('doctorr.login');
      
  });

});

  
#########
