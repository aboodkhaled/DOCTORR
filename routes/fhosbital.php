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
Route::group(['namespace' => 'fhosbital', 'middleware' => 'auth:fhosbitall', 'prefix' => 'fhosbitall'], function(){
  Route::get('/', 'DashboardController@index') -> name('fhosbital.dashboard');
  Route::get('logout', 'LoginController@logout')->name('fhosbital.logout');
    
  
  Route::group(['prefix' => 'profile'], function () {
    Route::get('edit', 'ProfileController@eeditProfile')->name('fhosbital.edit.profile');
    Route::put('update', 'ProfileController@updateprofile')->name('fhosbital.update.profile');
    Route::get('/cuontry', 'ProfileController@getcity') -> name('fhosbital.hosbitals.getcity');
});


  Route::group(['prefix' => 'languages'], function(){
    Route::get('/', 'LanguageController@index') -> name('fhosbital.languages');
    Route::get('create', 'LanguageController@create') -> name('fhosbital.languages.create');
    Route::post('save', 'LanguageController@save') -> name('fhosbital.languages.save');
    Route::get('edit/{id}', 'LanguageController@edit') -> name('fhosbital.languages.edit');
    Route::post('update/{id}', 'LanguageController@update') -> name('fhosbital.languages.update');
    Route::get('delete/{id}', 'LanguageController@destroy') -> name('fhosbital.languages.delete');
  });

  Route::group(['prefix' => 'meeting'], function(){
    Route::get('/', 'MateController@index') -> name('fhosbital.meeting');
    Route::get('create', 'MateController@create') -> name('fhosbital.meeting.create');
    Route::post('save', 'MateController@save') -> name('fhosbital.meeting.save');
    Route::get('edit/{id}', 'MateController@edit') -> name('fhosbital.meeting.edit');
    Route::post('update/{id}', 'MateController@update') -> name('fhosbital.meeting.update');
    Route::get('delete/{id}', 'MateController@destroy') -> name('fhosbital.meeting.delete');
  });

  Route::group(['prefix' => 'departments'], function(){
    Route::get('/', 'DepartmentController@index') -> name('fhosbital.departments');
   
    Route::get('create', 'DepartmentController@create') -> name('fhosbital.departments.create');
    Route::post('save', 'DepartmentController@save') -> name('fhosbital.departments.save');
    Route::get('edit/{id}', 'DepartmentController@edit') -> name('fhosbital.departments.edit');
    Route::post('update/{id}', 'DepartmentController@update') -> name('fhosbital.departments.update');
    Route::get('delete/{id}', 'DepartmentController@destroy') -> name('fhosbital.departments.delete');
  });


  Route::group(['prefix' => 'specialtys'], function(){
    Route::get('/', 'SpecialtyController@index') -> name('fhosbital.specialtys');
    Route::get('create', 'SpecialtyController@create') -> name('fhosbital.specialtys.create');
    Route::post('save', 'SpecialtyController@save') -> name('fhosbital.specialtys.save');
    Route::get('edit/{id}', 'SpecialtyController@edit') -> name('fhosbital.specialtys.edit');
    Route::post('update/{id}', 'SpecialtyController@update') -> name('fhosbital.specialtys.update');
    Route::get('delete/{id}', 'SpecialtyController@destroy') -> name('fhosbital.specialtys.delete');
  });
  
  Route::group(['prefix' => 'doctors'], function(){
    Route::get('/', 'DoctorController@index') -> name('fhosbital.doctors');
    Route::get('create', 'DoctorController@create') -> name('fhosbital.doctors.create');
    Route::post('save', 'DoctorController@save') -> name('fhosbital.doctors.save');
    Route::get('edit/{id}', 'DoctorController@edit') -> name('fhosbital.doctors.edit');
    Route::post('update/{id}', 'DoctorController@update') -> name('fhosbital.doctors.update');
    Route::get('delete/{id}', 'DoctorController@destroy') -> name('fhosbital.doctors.delete');
    Route::get('/cuontry', 'DoctorController@getcity') -> name('fhosbital.doctors.getcity');
  });

  Route::group(['prefix' => 'siks'], function(){
    Route::get('/', 'SikController@index') -> name('fhosbital.siks');
    Route::get('create', 'SikController@create') -> name('fhosbital.siks.create');
    Route::post('save', 'SikController@save') -> name('fhosbital.siks.save');
    Route::get('edit/{id}', 'SikController@edit') -> name('fhosbital.siks.edit');
    Route::post('update/{id}', 'SikController@update') -> name('fhosbital.siks.update');
    Route::get('delete/{id}', 'SikController@destroy') -> name('fhosbital.siks.delete');
    Route::get('/cuontry', 'SikController@getcity') -> name('fhosbital.siks.getcity');
    Route::get('show/{id}', 'SikController@showdetail') -> name('fhosbital.siks.show');
  });

  Route::group(['prefix' => 'pharmice'], function(){
    Route::get('/', 'PharmiceController@index') -> name('fhosbital.pharmices');
    Route::get('create', 'PharmiceController@create') -> name('fhosbital.pharmices.create');
    Route::post('save', 'PharmiceController@save') -> name('fhosbital.pharmices.save');
    Route::get('edit/{id}', 'PharmiceController@edit') -> name('fhosbital.pharmices.edit');
    Route::post('update/{id}', 'PharmiceController@update') -> name('fhosbital.pharmices.update');
    Route::get('delete/{id}', 'PharmiceController@destroy') -> name('fhosbital.pharmices.delete');
  });

  Route::group(['prefix' => 'labe'], function(){
    Route::get('/', 'LabeController@index') -> name('fhosbital.labes');
    Route::get('create', 'LabeController@create') -> name('fhosbital.labes.create');
    Route::post('save', 'LabeController@save') -> name('fhosbital.labes.save');
    Route::get('edit/{id}', 'LabeController@edit') -> name('fhosbital.labes.edit');
    Route::post('update/{id}', 'LabeController@update') -> name('fhosbital.labes.update');
    Route::get('delete/{id}', 'LabeController@destroy') -> name('fhosbital.labes.delete');
  });

  Route::group(['prefix' => 'x_ray'], function(){
    Route::get('/', 'XrayController@index') -> name('fhosbital.x_rays');
    Route::get('create', 'XrayController@create') -> name('fhosbital.x_rays.create');
    Route::post('save', 'XrayController@save') -> name('fhosbital.x_rays.save');
    Route::get('edit/{id}', 'XrayController@edit') -> name('fhosbital.x_rays.edit');
    Route::post('update/{id}', 'XrayController@update') -> name('fhosbital.x_rays.update');
    Route::get('delete/{id}', 'XrayController@destroy') -> name('fhosbital.x_rays.delete');
  });
  Route::group(['prefix' => 'appoemint'], function(){
    Route::get('/', 'AppoemintController@index') -> name('fhosbital.appoemints');
    Route::get('create', 'AppoemintController@create') -> name('fhosbital.appoemints.create');
    Route::post('save', 'AppoemintController@save') -> name('fhosbital.appoemints.save');
    Route::get('edit/{id}', 'AppoemintController@edit') -> name('fhosbital.appoemints.edit');
    Route::post('update/{id}', 'AppoemintController@update') -> name('fhosbital.appoemints.update');
    Route::get('delete/{id}', 'AppoemintController@destroy') -> name('fhosbital.appoemints.delete');
    Route::get('/doctor_serve', 'AppoemintController@getprice') -> name('fhosbital.appoemints.getprice');
    Route::get('show/{id}', 'AppoemintController@showdetail') -> name('fhosbital.appoemints.show');
    Route::get('MarkAsRead_all', 'AppoemintController@MarkAsRead_all') -> name('fhosbital.appoemints.MarkAsRead');
    Route::post('mate', 'AppoemintController@mate') -> name('fhosbital.appoemints.mate');
  });
     Route::any('user/notification/get','NotificationController@getNotification');
     Route::any('user/notification/read','NotificationController@markAsRead');
     Route::any('user/notification/read/{id}','NotificationController@markAsReadRedirect');
  Route::group(['prefix' => 'serve'], function(){
    Route::get('/', 'ServeController@index') -> name('fhosbital.serves');
    Route::get('create', 'ServeController@create') -> name('fhosbital.serves.create');
    Route::post('save', 'ServeController@save') -> name('fhosbital.serves.save');
    Route::get('edit/{id}', 'ServeController@edit') -> name('fhosbital.serves.edit');
    Route::post('update/{id}', 'ServeController@update') -> name('fhosbital.serves.update');
    Route::get('delete/{id}', 'ServeController@destroy') -> name('fhosbital.serves.delete');
  });

  Route::group(['prefix' => 'doctorserves'], function(){
    Route::get('/', 'DoctorServeController@index') -> name('fhosbital.doctorserves');
    Route::get('create', 'DoctorServeController@create') -> name('fhosbital.doctorserves.create');
    Route::post('save', 'DoctorServeController@save') -> name('fhosbital.doctorserves.save');
    Route::get('edit/{id}', 'DoctorServeController@edit') -> name('fhosbital.doctorserves.edit');
    Route::post('update/{id}', 'DoctorServeController@update') -> name('fhosbital.doctorserves.update');
    Route::get('delete/{id}', 'DoctorServeController@destroy') -> name('fhosbital.doctorserves.delete');
  });

  Route::group(['prefix' => 'schedules'], function(){
    Route::get('/', 'ScheduleController@index') -> name('fhosbital.schedules');
    Route::get('create', 'ScheduleController@create') -> name('fhosbital.schedules.create');
    Route::post('save', 'ScheduleController@save') -> name('fhosbital.schedules.save');
    Route::get('edit/{id}', 'ScheduleController@edit') -> name('fhosbital.schedules.edit');
    Route::post('update/{id}', 'ScheduleController@update') -> name('fhosbital.schedules.update');
    Route::get('delete/{id}', 'ScheduleController@destroy') -> name('fhosbital.schedules.delete');
  });

  Route::group(['prefix' => 'bloods'], function(){
    Route::get('/', 'BloodController@index') -> name('fhosbital.bloods');
    Route::get('create', 'BloodController@create') -> name('fhosbital.bloods.create');
    Route::post('save', 'BloodController@save') -> name('fhosbital.bloods.save');
    Route::get('edit/{id}', 'BloodController@edit') -> name('fhosbital.bloods.edit');
    Route::post('update/{id}', 'BloodController@update') -> name('fhosbital.bloods.update');
    Route::get('delete/{id}', 'BloodController@destroy') -> name('fhosbital.bloods.delete');
  });
  Route::group(['prefix' => 'roles'], function () {
    Route::get('/', 'RolesController@index')->name('fhosbital.roles.index');
    Route::get('create', 'RolesController@create')->name('fhosbital.roles.create');
    Route::post('store', 'RolesController@saveRole')->name('fhosbital.roles.store');
    Route::get('/edit/{id}', 'RolesController@edit') ->name('fhosbital.roles.edit') ;
    Route::post('update/{id}', 'RolesController@update')->name('fhosbital.roles.update');
 });

 Route::group(['prefix' => 'users'  ], function () {
  Route::get('/', 'UsersController@index')->name('fhosbital.users.index');
  Route::get('/create', 'UsersController@create')->name('fhosbital.users.create');
  Route::post('/store', 'UsersController@store')->name('fhosbital.users.store');
  Route::get('/cuontry', 'UsersController@getcity') -> name('fhosbital.hosbitals.getcity');
});

Route::group(['prefix' => 'hosbitals'  ], function () {
  Route::get('/', 'HosbitalController@index')->name('fhosbital.hosbitals.index');
  Route::get('/create', 'HosbitalController@create')->name('fhosbital.hosbitals.create');
  Route::post('/store', 'HosbitalController@store')->name('fhosbital.hosbitals.store');
  Route::get('edit/{id}', 'HosbitalController@edit') -> name('fhosbital.hosbitals.edit');
    Route::post('update/{id}', 'HosbitalController@update') -> name('fhosbital.hosbitals.update');
    Route::get('delete/{id}', 'HosbitalController@destroy') -> name('fhosbital.hosbitals.delete');
});

Route::group(['prefix' => 'venlabes'  ], function () {
  Route::get('/', 'VenlabeController@index')->name('fhosbital.venlabes.index');
  Route::get('/create', 'VenlabeController@create')->name('fhosbital.venlabes.create');
  Route::post('/store', 'VenlabeController@store')->name('fhosbital.venlabes.store');
  Route::get('edit/{id}', 'VenlabeController@edit') -> name('fhosbital.venlabes.edit');
    Route::post('update/{id}', 'VenlabeController@update') -> name('fhosbital.venlabes.update');
    Route::get('delete/{id}', 'VenlabeController@destroy') -> name('fhosbital.venlabes.delete');
    Route::get('/cuontry', 'VenlabeController@getcity') -> name('fhosbital.venlabes.getcity');
    Route::get('show/{id}', 'VnlabeDetailController@showdetail') -> name('fhosbital.venlabes.show');
});

Route::group(['prefix' => 'venpharmices'  ], function () {
  Route::get('/', 'VenpharmiceController@index')->name('fhosbital.venpharmices.index');
  Route::get('/create', 'VenpharmiceController@create')->name('fhosbital.venpharmices.create');
  Route::post('/store', 'VenpharmiceController@store')->name('fhosbital.venpharmices.store');
  Route::get('edit/{id}', 'VenpharmiceController@edit') -> name('fhosbital.venpharmices.edit');
    Route::post('update/{id}', 'VenpharmiceController@update') -> name('fhosbital.venpharmices.update');
    Route::get('delete/{id}', 'VenpharmiceController@destroy') -> name('fhosbital.venpharmices.delete');
    Route::get('/cuontry', 'VenpharmiceController@getcity') -> name('fhosbital.venpharmices.getcity');
    Route::get('show/{id}', 'VnpharmiceDetailController@showdetail') -> name('fhosbital.venpharmices.show');
    Route::get('print/{id}', 'VenpharmiceController@print') -> name('fhosbital.venpharmices.print');
    Route::get('pdf/{id}', 'VenpharmiceController@pdf') -> name('fhosbital.venpharmices.pdf');
});
Route::group(['prefix' => 'cuontries'  ], function () {
  Route::get('/', 'CuontryController@index')->name('fhosbital.cuontries.index');
  Route::get('/create', 'CuontryController@create')->name('fhosbital.cuontries.create');
  Route::post('/store', 'CuontryController@store')->name('fhosbital.cuontries.store');
  Route::get('edit/{id}', 'CuontryController@edit') -> name('fhosbital.cuontries.edit');
    Route::post('update/{id}', 'CuontryController@update') -> name('fhosbital.cuontries.update');
    Route::get('delete/{id}', 'CuontryController@destroy') -> name('fhosbital.cuontries.delete');
});
Route::group(['prefix' => 'cities'  ], function () {
  Route::get('/', 'CityController@index')->name('fhosbital.cities.index');
  Route::get('/create', 'CityController@create')->name('fhosbital.cities.create');
  Route::post('/store', 'CityController@store')->name('fhosbital.cities.store');
  Route::get('edit/{id}', 'CityController@edit') -> name('fhosbital.cities.edit');
    Route::post('update/{id}', 'CityController@update') -> name('fhosbital.cities.update');
    Route::get('delete/{id}', 'CityController@destroy') -> name('fhosbital.cities.delete');
});
});



  Route::group(['namespace' => 'fhosbital' ,'middlewware' => 'guest:fhosbitall', 'prefix' => 'fhosbitall'], function(){
    Route::get('/login', 'loginController@getlogin') -> name('get.fhosbital.login');
    Route::post('/login', 'loginController@login') -> name('fhosbital.login');
      
  });

});

  
#########
