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
Route::post('/setTarget', 'DepartmentController@setTarget') -> name('setTarget');

Route::group([
  'prefix' => LaravelLocalization::setLocale(),
  'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
], function () {
 // define('PAGINATION_COUNT',1000000);
Route::group(['namespace' => 'hadmin', 'middleware' => 'auth:hadmin', 'prefix' => 'hadmin'], function(){
  Route::get('/', 'DashboardController@index') -> name('hadmin.dashboard');
  Route::get('logout', 'loginController@logout')->name('hadmin.logout');
    
  
  Route::group(['prefix' => 'profile'], function () {
    Route::get('edit', 'ProfileController@editProfile')->name('hadmin.edit.profile');
    Route::put('update', 'ProfileController@updateprofile')->name('hadmin.update.profile');
    Route::get('/cuontry', 'ProfileController@getcity') -> name('hadmin.hadmins.getcity');
});


 
  Route::group(['prefix' => 'siks'], function(){
    Route::get('/', 'SikController@index') -> name('hadmin.siks');
    Route::get('create', 'SikController@create') -> name('hadmin.siks.create');
    Route::post('save', 'SikController@save') -> name('hadmin.siks.save');
    Route::get('edit/{id}', 'SikController@edit') -> name('hadmin.siks.edit');
    Route::post('update/{id}', 'SikController@update') -> name('hadmin.siks.update');
    Route::get('delete/{id}', 'SikController@destroy') -> name('hadmin.siks.delete');
    Route::get('/cuontry', 'SikController@getcity') -> name('hadmin.siks.getcity');
    Route::get('show/{id}', 'SikController@showdetail') -> name('hadmin.siks.show');
  });

  
  Route::group(['prefix' => 'appoemint'], function(){
    Route::get('/', 'AppoemintController@index') -> name('hadmin.appoemints');
    Route::get('create', 'AppoemintController@create') -> name('hadmin.appoemints.create');
    Route::post('save', 'AppoemintController@save') -> name('hadmin.appoemints.save');
    Route::get('edit/{id}', 'AppoemintController@edit') -> name('hadmin.appoemints.edit');
    Route::post('update/{id}', 'AppoemintController@update') -> name('hadmin.appoemints.update');
    Route::get('delete/{id}', 'AppoemintController@destroy') -> name('hadmin.appoemints.delete');
    Route::get('/doctor_serve', 'AppoemintController@getprice') -> name('hadmin.appoemints.getprice');
    Route::get('show/{id}', 'AppoemintController@showdetail') -> name('hadmin.appoemints.show');
    Route::get('MarkAsRead_all', 'AppoemintController@MarkAsRead_all') -> name('hadmin.appoemints.MarkAsRead');
    Route::post('mate', 'AppoemintController@mate') -> name('hadmin.appoemints.mate');
  });
     Route::any('user/notification/get','NotificationController@getNotification');
     Route::any('user/notification/read','NotificationController@markAsRead');
     Route::any('user/notification/read/{id}','NotificationController@markAsReadRedirect');

  

 
 




Route::group(['prefix' => 'fhosbitals'  ], function () {
  Route::get('/', 'FHosbitalController@index')->name('hadmin.fhosbitals.index');
  Route::get('/create', 'FHosbitalController@create')->name('hadmin.fhosbitals.create');
  Route::post('/store', 'FHosbitalController@store')->name('hadmin.fhosbitals.store');
  Route::get('edit/{id}', 'FHosbitalController@edit') -> name('hadmin.fhosbitals.edit');
    Route::post('update/{id}', 'FHosbitalController@update') -> name('hadmin.fhosbitals.update');
    Route::get('delete/{id}', 'FHosbitalController@destroy') -> name('hadmin.fhosbitals.delete');
    Route::get('/cuontry', 'FHosbitalController@getcity') -> name('hadmin.fhosbitals.getcity');
    Route::get('show/{id}', 'FHosbitalController@showdetail') -> name('hadmin.fhosbitals.show');
    Route::get('print/{id}', 'FHosbitalController@print') -> name('hadmin.fhosbitals.print');
    Route::get('pdf/{id}', 'FHosbitalController@pdf') -> name('hadmin.fhosbitals.pdf');
});



Route::group(['prefix' => 'cuontries'  ], function () {
  Route::get('/', 'CuontryController@index')->name('hadmin.cuontries.index');
  Route::get('/create', 'CuontryController@create')->name('hadmin.cuontries.create');
  Route::post('/store', 'CuontryController@store')->name('hadmin.cuontries.store');
  Route::get('edit/{id}', 'CuontryController@edit') -> name('hadmin.cuontries.edit');
    Route::post('update/{id}', 'CuontryController@update') -> name('hadmin.cuontries.update');
    Route::get('delete/{id}', 'CuontryController@destroy') -> name('hadmin.cuontries.delete');
});

Route::group(['prefix' => 'plases'  ], function () {
  Route::get('/', 'PlaseController@index')->name('hadmin.plases.index');
  Route::get('/create', 'PlaseController@create')->name('hadmin.plases.create');
  Route::post('/store', 'PlaseController@store')->name('hadmin.plases.store');
  Route::get('edit/{id}', 'PlaseController@edit') -> name('hadmin.plases.edit');
    Route::post('update/{id}', 'PlaseController@update') -> name('hadmin.plases.update');
    Route::get('delete/{id}', 'PlaseController@destroy') -> name('hadmin.plases.delete');
});

Route::group(['prefix' => 'cities'  ], function () {
  Route::get('/', 'CityController@index')->name('hadmin.cities.index');
  Route::get('/create', 'CityController@create')->name('hadmin.cities.create');
  Route::post('/store', 'CityController@store')->name('hadmin.cities.store');
  Route::get('edit/{id}', 'CityController@edit') -> name('hadmin.cities.edit');
    Route::post('update/{id}', 'CityController@update') -> name('hadmin.cities.update');
    Route::get('delete/{id}', 'CityController@destroy') -> name('hadmin.cities.delete');
});
});



  Route::group(['namespace' => 'hadmin' ,'middlewware' => 'guest:hadmin', 'prefix' => 'hadmin'], function(){
    Route::get('/login', 'loginController@getlogin') -> name('get.hadmin.login');
    Route::post('/login', 'loginController@login') -> name('hadmin.login');
      
  });

});

  
#########
