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
 // define('PAGINATION_COUNT',1000000);

Route::group(['namespace' => 'h_doctor', 'middleware' => 'auth:h_doctor', 'prefix' => 'h_doctor'], function(){
  Route::get('/', 'DashboardController@index') -> name('h_doctor.dashboard');
  Route::get('logout', 'LoginController@logout')->name('h_doctor.logout');
    

  Route::group(['prefix' => 'profile'], function () {
    Route::get('edit', 'ProfileeController@eeditProfile')->name('h_doctor.edit.profile');
    Route::put('update', 'ProfileeController@updateprofile')->name('h_doctor.update.profile');
    Route::get('/cuontry', 'ProfileeController@getcity') -> name('h_doctor.doctors.getcity');
});

Route::group(['prefix' => 'sikss'  ], function () {
  Route::get('/', 'sikssController@index')->name('h_doctor.sikss.index');
  Route::get('/create', 'sikssController@create')->name('h_doctor.sikss.create');
  Route::post('/store', 'sikssController@store')->name('h_doctor.sikss.store');
  Route::get('edit/{id}', 'sikssController@edit') -> name('h_doctor.sikss.edit');
    Route::post('update/{id}', 'sikssController@update') -> name('h_doctor.sikss.update');
    Route::get('delete/{id}', 'sikssController@destroy') -> name('h_doctor.sikss.delete');
    Route::get('/price', 'sikssController@getprice') -> name('h_doctor.sikss.getprice');
    Route::get('show/{id}', 'sikssController@showdetail') -> name('h_doctor.sikss.show');
    Route::post('upaxam', 'sikssController@upaxam') -> name('h_doctor.sikss.upaxam');
    Route::post('upxray', 'sikssController@upxray') -> name('h_doctor.sikss.upxray');
    Route::get('/xprice', 'sikssController@xprice') -> name('h_doctor.sikss.xprice');
    Route::post('upphar', 'sikssController@upphar') -> name('h_doctor.sikss.upphar');
    Route::get('/pprice', 'sikssController@pprice') -> name('h_doctor.sikss.pprice');
    Route::post('updia', 'sikssController@updia') -> name('h_doctor.sikss.updia');
    Route::get('print/{id}', 'sikssController@print') -> name('h_doctor.sikss.print');
    Route::get('pdf/{id}', 'sikssController@pdf') -> name('h_doctor.sikss.pdf');
    Route::get('MarkAsRead_all', 'sikssController@MarkAsRead_all') -> name('h_doctor.sikss.MarkAsRead');
});

});
  
  




  Route::group(['namespace' => 'h_doctor' ,'middlewware' => 'guest:h_doctor', 'prefix' => 'h_doctor'], function(){
    Route::get('login', 'loginController@getlogin') -> name('get.h_doctor.login');
   Route::post('login', 'loginController@login') -> name('h_doctor.login');
      
  });

});

  
#########
