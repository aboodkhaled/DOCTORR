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
Route::group(['namespace' => 'clinic', 'middleware' => 'auth:clinic', 'prefix' => 'clinic'], function(){
  Route::get('/', 'DashboardController@index') -> name('clinic.dashboard');
  Route::get('logout', 'LoginController@logout')->name('clinic.logout');
    
  
  Route::group(['prefix' => 'profile'], function () {
    Route::get('edit', 'ProfileController@eeditProfile')->name('clinic.edit.profile');
    Route::put('update', 'ProfileController@updateprofile')->name('clinic.update.profile');
    Route::get('/cuontry', 'ProfileController@getcity') -> name('clinic.clinics.getcity');
});


 

  Route::group(['prefix' => 'meeting'], function(){
    Route::get('/', 'MateController@index') -> name('hosbital.meeting');
    Route::get('create', 'MateController@create') -> name('hosbital.meeting.create');
    Route::post('save', 'MateController@save') -> name('hosbital.meeting.save');
    Route::get('edit/{id}', 'MateController@edit') -> name('hosbital.meeting.edit');
    Route::post('update/{id}', 'MateController@update') -> name('hosbital.meeting.update');
    Route::get('delete/{id}', 'MateController@destroy') -> name('hosbital.meeting.delete');
  });

  


  
  
  

  Route::group(['prefix' => 'siks'], function(){
    Route::get('/', 'SikController@index') -> name('hosbital.siks');
    Route::get('create', 'SikController@create') -> name('hosbital.siks.create');
    Route::post('save', 'SikController@save') -> name('hosbital.siks.save');
    Route::get('edit/{id}', 'SikController@edit') -> name('hosbital.siks.edit');
    Route::post('update/{id}', 'SikController@update') -> name('hosbital.siks.update');
    Route::get('delete/{id}', 'SikController@destroy') -> name('hosbital.siks.delete');
    Route::get('/cuontry', 'SikController@getcity') -> name('hosbital.siks.getcity');
    Route::get('show/{id}', 'SikController@showdetail') -> name('hosbital.siks.show');
  });

  Route::group(['prefix' => 'serve1'], function(){
    Route::get('/', 'Serve1Controller@index') -> name('clinic.serve1s');
    Route::get('create', 'Serve1Controller@create') -> name('clinic.serve1s.create');
    Route::post('save', 'Serve1Controller@save') -> name('clinic.serve1s.save');
    Route::get('edit/{id}', 'Serve1Controller@edit') -> name('clinic.serve1s.edit');
    Route::post('update/{id}', 'Serve1Controller@update') -> name('clinic.serve1s.update');
    Route::get('delete/{id}', 'Serve1Controller@destroy') -> name('clinic.serve1s.delete');
  });

  Route::group(['prefix' => 'serve2'], function(){
    Route::get('/', 'Serve2Controller@index') -> name('clinic.serve2s');
    Route::get('create', 'Serve2Controller@create') -> name('clinic.serve2s.create');
    Route::post('save', 'Serve2Controller@save') -> name('clinic.serve2s.save');
    Route::get('edit/{id}', 'Serve2Controller@edit') -> name('clinic.serve2s.edit');
    Route::post('update/{id}', 'Serve2Controller@update') -> name('clinic.serve2s.update');
    Route::get('delete/{id}', 'Serve2Controller@destroy') -> name('clinic.serve2s.delete');
  });

  Route::group(['prefix' => 'x_ray'], function(){
    Route::get('/', 'XrayController@index') -> name('hosbital.x_rays');
    Route::get('create', 'XrayController@create') -> name('hosbital.x_rays.create');
    Route::post('save', 'XrayController@save') -> name('hosbital.x_rays.save');
    Route::get('edit/{id}', 'XrayController@edit') -> name('hosbital.x_rays.edit');
    Route::post('update/{id}', 'XrayController@update') -> name('hosbital.x_rays.update');
    Route::get('delete/{id}', 'XrayController@destroy') -> name('hosbital.x_rays.delete');
  });
  Route::group(['prefix' => 'appoemint'], function(){
    Route::get('/', 'AppoemintController@index') -> name('clinic.appoemints');
    Route::get('create', 'AppoemintController@create') -> name('clinic.appoemints.create');
    Route::post('save', 'AppoemintController@save') -> name('clinic.appoemints.save');
    Route::get('edit/{id}', 'AppoemintController@edit') -> name('clinic.appoemints.edit');
    Route::post('update/{id}', 'AppoemintController@update') -> name('clinic.appoemints.update');
    Route::get('delete/{id}', 'AppoemintController@destroy') -> name('clinic.appoemints.delete');
    Route::get('/doctor_serve', 'AppoemintController@getprice') -> name('clinic.appoemints.getprice');
    Route::get('show/{id}', 'AppoemintController@showdetail') -> name('clinic.appoemints.show');
    Route::get('MarkAsRead_all', 'AppoemintController@MarkAsRead_all') -> name('clinic.appoemints.MarkAsRead');
    Route::post('mate', 'AppoemintController@mate') -> name('clinic.appoemints.mate');
  });

  Route::group(['prefix' => 'appoemint2'], function(){
    Route::get('/', 'Appoemint2Controller@index') -> name('clinic.appoemint2s');
    Route::get('create', 'Appoemint2Controller@create') -> name('clinic.appoemint2s.create');
    Route::post('save', 'Appoemint2Controller@save') -> name('clinic.appoemint2s.save');
    Route::get('edit/{id}', 'Appoemint2Controller@edit') -> name('clinic.appoemint2s.edit');
    Route::post('update/{id}', 'Appoemint2Controller@update') -> name('clinic.appoemint2s.update');
    Route::get('delete/{id}', 'Appoemint2Controller@destroy') -> name('clinic.appoemint2s.delete');
    Route::get('/doctor_serve', 'Appoemint2Controller@getprice') -> name('clinic.appoemint2s.getprice');
    Route::get('show/{id}', 'Appoemint2Controller@showdetail') -> name('clinic.appoemint2s.show');
    Route::get('MarkAsRead_all', 'Appoemint2Controller@MarkAsRead_all') -> name('clinic.appoemint2s.MarkAsRead');
    Route::post('mate', 'Appoemint2Controller@mate') -> name('clinic.appoemint2s.mate');
  });


     Route::any('user/notification/get','NotificationController@getNotification');
     Route::any('user/notification/read','NotificationController@markAsRead');
     Route::any('user/notification/read/{id}','NotificationController@markAsReadRedirect');
  Route::group(['prefix' => 'serve'], function(){
    Route::get('/', 'ServeController@index') -> name('clinic.serves');
    Route::get('create', 'ServeController@create') -> name('clinic.serves.create');
    Route::post('save', 'ServeController@save') -> name('clinic.serves.save');
    Route::get('edit/{id}', 'ServeController@edit') -> name('clinic.serves.edit');
    Route::post('update/{id}', 'ServeController@update') -> name('clinic.serves.update');
    Route::get('delete/{id}', 'ServeController@destroy') -> name('clinic.serves.delete');
  });

  Route::group(['prefix' => 'doctorserves'], function(){
    Route::get('/', 'DoctorServeController@index') -> name('clinic.doctorserves');
    Route::get('create', 'DoctorServeController@create') -> name('clinic.doctorserves.create');
    Route::post('save', 'DoctorServeController@save') -> name('clinic.doctorserves.save');
    Route::get('edit/{id}', 'DoctorServeController@edit') -> name('clinic.doctorserves.edit');
    Route::post('update/{id}', 'DoctorServeController@update') -> name('clinic.doctorserves.update');
    Route::get('delete/{id}', 'DoctorServeController@destroy') -> name('clinic.doctorserves.delete');
  });

  Route::group(['prefix' => 'schedules'], function(){
    Route::get('/', 'ScheduleController@index') -> name('hosbital.schedules');
    Route::get('create', 'ScheduleController@create') -> name('hosbital.schedules.create');
    Route::post('save', 'ScheduleController@save') -> name('hosbital.schedules.save');
    Route::get('edit/{id}', 'ScheduleController@edit') -> name('hosbital.schedules.edit');
    Route::post('update/{id}', 'ScheduleController@update') -> name('hosbital.schedules.update');
    Route::get('delete/{id}', 'ScheduleController@destroy') -> name('hosbital.schedules.delete');
  });

  Route::group(['prefix' => 'bloods'], function(){
    Route::get('/', 'BloodController@index') -> name('clinic.bloods');
    Route::get('create', 'BloodController@create') -> name('clinic.bloods.create');
    Route::post('save', 'BloodController@save') -> name('clinic.bloods.save');
    Route::get('edit/{id}', 'BloodController@edit') -> name('clinic.bloods.edit');
    Route::post('update/{id}', 'BloodController@update') -> name('clinic.bloods.update');
    Route::get('delete/{id}', 'BloodController@destroy') -> name('clinic.bloods.delete');
  });
  Route::group(['prefix' => 'roles'], function () {
    Route::get('/', 'RolesController@index')->name('clinic.roles.index');
    Route::get('create', 'RolesController@create')->name('clinic.roles.create');
    Route::post('store', 'RolesController@saveRole')->name('clinic.roles.store');
    Route::get('/edit/{id}', 'RolesController@edit') ->name('clinic.roles.edit') ;
    Route::post('update/{id}', 'RolesController@update')->name('clinic.roles.update');
 });

 Route::group(['prefix' => 'users'  ], function () {
  Route::get('/index', 'UsersController@index')->name('clinic.users.index');
  Route::get('/create', 'UsersController@create')->name('clinic.users.create');
  Route::post('/store', 'UsersController@store')->name('clinic.users.store');
});

Route::group(['prefix' => 'hosbitals'  ], function () {
  Route::get('/', 'HosbitalController@index')->name('clinic.hosbitals.index');
  Route::get('/create', 'HosbitalController@create')->name('clinic.hosbitals.create');
  Route::post('/store', 'HosbitalController@store')->name('clinic.hosbitals.store');
  Route::get('edit/{id}', 'HosbitalController@edit') -> name('clinic.hosbitals.edit');
    Route::post('update/{id}', 'HosbitalController@update') -> name('clinic.hosbitals.update');
    Route::get('delete/{id}', 'HosbitalController@destroy') -> name('clinic.hosbitals.delete');
});

Route::group(['prefix' => 'venlabes'  ], function () {
  Route::get('/', 'VenlabeController@index')->name('clinic.venlabes.index');
  Route::get('/create', 'VenlabeController@create')->name('clinic.venlabes.create');
  Route::post('/store', 'VenlabeController@store')->name('clinic.venlabes.store');
  Route::get('edit/{id}', 'VenlabeController@edit') -> name('clinic.venlabes.edit');
    Route::post('update/{id}', 'VenlabeController@update') -> name('clinic.venlabes.update');
    Route::get('delete/{id}', 'VenlabeController@destroy') -> name('clinic.venlabes.delete');
    Route::get('/cuontry', 'VenlabeController@getcity') -> name('clinic.venlabes.getcity');
    Route::get('show/{id}', 'VnlabeDetailController@showdetail') -> name('clinic.venlabes.show');
});

Route::group(['prefix' => 'venpharmices'  ], function () {
  Route::get('/', 'VenpharmiceController@index')->name('hosbital.venpharmices.index');
  Route::get('/create', 'VenpharmiceController@create')->name('hosbital.venpharmices.create');
  Route::post('/store', 'VenpharmiceController@store')->name('hosbital.venpharmices.store');
  Route::get('edit/{id}', 'VenpharmiceController@edit') -> name('hosbital.venpharmices.edit');
    Route::post('update/{id}', 'VenpharmiceController@update') -> name('hosbital.venpharmices.update');
    Route::get('delete/{id}', 'VenpharmiceController@destroy') -> name('hosbital.venpharmices.delete');
    Route::get('/cuontry', 'VenpharmiceController@getcity') -> name('hosbital.venpharmices.getcity');
    Route::get('show/{id}', 'VnpharmiceDetailController@showdetail') -> name('hosbital.venpharmices.show');
    Route::get('print/{id}', 'VenpharmiceController@print') -> name('hosbital.venpharmices.print');
    Route::get('pdf/{id}', 'VenpharmiceController@pdf') -> name('hosbital.venpharmices.pdf');
});
Route::group(['prefix' => 'cuontries'  ], function () {
  Route::get('/', 'CuontryController@index')->name('clinic.cuontries.index');
  Route::get('/create', 'CuontryController@create')->name('clinic.cuontries.create');
  Route::post('/store', 'CuontryController@store')->name('clinic.cuontries.store');
  Route::get('edit/{id}', 'CuontryController@edit') -> name('clinic.cuontries.edit');
    Route::post('update/{id}', 'CuontryController@update') -> name('clinic.cuontries.update');
    Route::get('delete/{id}', 'CuontryController@destroy') -> name('clinic.cuontries.delete');
});
Route::group(['prefix' => 'cities'  ], function () {
  Route::get('/', 'CityController@index')->name('clinic.cities.index');
  Route::get('/create', 'CityController@create')->name('clinic.cities.create');
  Route::post('/store', 'CityController@store')->name('clinic.cities.store');
  Route::get('edit/{id}', 'CityController@edit') -> name('clinic.cities.edit');
    Route::post('update/{id}', 'CityController@update') -> name('clinic.cities.update');
    Route::get('delete/{id}', 'CityController@destroy') -> name('clinic.cities.delete');
});
});



  Route::group(['namespace' => 'clinic' ,'middlewware' => 'guest:clinic', 'prefix' => 'clinic'], function(){
    Route::get('/login', 'loginController@getlogin') -> name('get.clinic.login');
    Route::post('/login', 'loginController@login') -> name('clinic.login');
      
  });

});

  
#########
