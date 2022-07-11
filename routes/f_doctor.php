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

Route::group(['namespace' => 'f_doctor', 'middleware' => 'auth:f_doctor', 'prefix' => 'f_doctor'], function(){
  Route::get('/', 'DashboardController@index') -> name('f_doctor.dashboard');
  Route::get('logout', 'LoginController@logout')->name('f_doctor.logout');
    

  Route::group(['prefix' => 'profile'], function () {
    Route::get('edit', 'ProfileeController@eeditProfile')->name('f_doctor.edit.profile');
    Route::put('update', 'ProfileeController@updateprofile')->name('f_doctor.update.profile');
    Route::get('/cuontry', 'ProfileeController@getcity') -> name('f_doctor.doctors.getcity');
});

Route::group(['prefix' => 'sikss'  ], function () {
  Route::get('/', 'sikssController@index')->name('f_doctor.sikss.index');
  Route::get('/create', 'sikssController@create')->name('f_doctor.sikss.create');
  Route::post('/store', 'sikssController@store')->name('f_doctor.sikss.store');
  Route::get('edit/{id}', 'sikssController@edit') -> name('f_doctor.sikss.edit');
    Route::post('update/{id}', 'sikssController@update') -> name('f_doctor.sikss.update');
    Route::get('delete/{id}', 'sikssController@destroy') -> name('f_doctor.sikss.delete');
    Route::get('/price', 'sikssController@getprice') -> name('f_doctor.sikss.getprice');
    Route::get('show/{id}', 'sikssController@showdetail') -> name('f_doctor.sikss.show');
    Route::post('upaxam', 'sikssController@upaxam') -> name('f_doctor.sikss.upaxam');
    Route::post('upxray', 'sikssController@upxray') -> name('f_doctor.sikss.upxray');
    Route::get('/xprice', 'sikssController@xprice') -> name('f_doctor.sikss.xprice');
    Route::post('upphar', 'sikssController@upphar') -> name('f_doctor.sikss.upphar');
    Route::get('/pprice', 'sikssController@pprice') -> name('f_doctor.sikss.pprice');
    Route::post('updia', 'sikssController@updia') -> name('f_doctor.sikss.updia');
    Route::get('print/{id}', 'sikssController@print') -> name('f_doctor.sikss.print');
    Route::get('pdf/{id}', 'sikssController@pdf') -> name('f_doctor.sikss.pdf');
    Route::get('MarkAsRead_all', 'sikssController@MarkAsRead_all') -> name('f_doctor.sikss.MarkAsRead');
});

});
  
  




  Route::group(['namespace' => 'f_doctor' ,'middlewware' => 'guest:f_doctor', 'prefix' => 'f_doctor'], function(){
    Route::get('login', 'loginController@getlogin') -> name('get.f_doctor.login');
   Route::post('login', 'loginController@login') -> name('f_doctor.login');
      
  });

});

  
#########
