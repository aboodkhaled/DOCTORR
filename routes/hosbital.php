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
Route::group(['namespace' => 'hosbital', 'middleware' => 'auth:hosbitall', 'prefix' => 'hosbitall'], function(){
  Route::get('/', 'DashboardController@index') -> name('hosbital.dashboard');
  Route::get('logout', 'LoginController@logout')->name('hosbital.logout');
    
  
  Route::group(['prefix' => 'profile'], function () {
    Route::get('edit', 'ProfileController@eeditProfile')->name('hosbital.edit.profile');
    Route::put('update', 'ProfileController@updateprofile')->name('hosbital.update.profile');
    Route::get('/cuontry', 'ProfileController@getcity') -> name('hosbital.hosbitals.getcity');
});


  Route::group(['prefix' => 'languages'], function(){
    Route::get('/', 'LanguageController@index') -> name('hosbital.languages');
    Route::get('create', 'LanguageController@create') -> name('hosbital.languages.create');
    Route::post('save', 'LanguageController@save') -> name('hosbital.languages.save');
    Route::get('edit/{id}', 'LanguageController@edit') -> name('hosbital.languages.edit');
    Route::post('update/{id}', 'LanguageController@update') -> name('hosbital.languages.update');
    Route::get('delete/{id}', 'LanguageController@destroy') -> name('hosbital.languages.delete');
  });

  Route::group(['prefix' => 'meeting'], function(){
    Route::get('/', 'MateController@index') -> name('hosbital.meeting');
    Route::get('create', 'MateController@create') -> name('hosbital.meeting.create');
    Route::post('save', 'MateController@save') -> name('hosbital.meeting.save');
    Route::get('edit/{id}', 'MateController@edit') -> name('hosbital.meeting.edit');
    Route::post('update/{id}', 'MateController@update') -> name('hosbital.meeting.update');
    Route::get('delete/{id}', 'MateController@destroy') -> name('hosbital.meeting.delete');
  });

  Route::group(['prefix' => 'departments'], function(){
    Route::get('/', 'DepartmentController@index') -> name('hosbital.departments');
   
    Route::get('create', 'DepartmentController@create') -> name('hosbital.departments.create');
    Route::post('save', 'DepartmentController@save') -> name('hosbital.departments.save');
    Route::get('edit/{id}', 'DepartmentController@edit') -> name('hosbital.departments.edit');
    Route::post('update/{id}', 'DepartmentController@update') -> name('hosbital.departments.update');
    Route::get('delete/{id}', 'DepartmentController@destroy') -> name('hosbital.departments.delete');
  });


  Route::group(['prefix' => 'specialtys'], function(){
    Route::get('/', 'SpecialtyController@index') -> name('hosbital.specialtys');
    Route::get('create', 'SpecialtyController@create') -> name('hosbital.specialtys.create');
    Route::post('save', 'SpecialtyController@save') -> name('hosbital.specialtys.save');
    Route::get('edit/{id}', 'SpecialtyController@edit') -> name('hosbital.specialtys.edit');
    Route::post('update/{id}', 'SpecialtyController@update') -> name('hosbital.specialtys.update');
    Route::get('delete/{id}', 'SpecialtyController@destroy') -> name('hosbital.specialtys.delete');
  });
  
  Route::group(['prefix' => 'doctors'], function(){
    Route::get('/', 'DoctorController@index') -> name('hosbital.doctors');
    Route::get('create', 'DoctorController@create') -> name('hosbital.doctors.create');
    Route::post('save', 'DoctorController@save') -> name('hosbital.doctors.save');
    Route::get('edit/{id}', 'DoctorController@edit') -> name('hosbital.doctors.edit');
    Route::post('update/{id}', 'DoctorController@update') -> name('hosbital.doctors.update');
    Route::get('delete/{id}', 'DoctorController@destroy') -> name('hosbital.doctors.delete');
    Route::get('/cuontry', 'DoctorController@getcity') -> name('hosbital.doctors.getcity');
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

  Route::group(['prefix' => 'pharmice'], function(){
    Route::get('/', 'PharmiceController@index') -> name('hosbital.pharmices');
    Route::get('create', 'PharmiceController@create') -> name('hosbital.pharmices.create');
    Route::post('save', 'PharmiceController@save') -> name('hosbital.pharmices.save');
    Route::get('edit/{id}', 'PharmiceController@edit') -> name('hosbital.pharmices.edit');
    Route::post('update/{id}', 'PharmiceController@update') -> name('hosbital.pharmices.update');
    Route::get('delete/{id}', 'PharmiceController@destroy') -> name('hosbital.pharmices.delete');
  });

  Route::group(['prefix' => 'labe'], function(){
    Route::get('/', 'LabeController@index') -> name('hosbital.labes');
    Route::get('create', 'LabeController@create') -> name('hosbital.labes.create');
    Route::post('save', 'LabeController@save') -> name('hosbital.labes.save');
    Route::get('edit/{id}', 'LabeController@edit') -> name('hosbital.labes.edit');
    Route::post('update/{id}', 'LabeController@update') -> name('hosbital.labes.update');
    Route::get('delete/{id}', 'LabeController@destroy') -> name('hosbital.labes.delete');
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
    Route::get('/', 'AppoemintController@index') -> name('hosbital.appoemints');
    Route::get('create', 'AppoemintController@create') -> name('hosbital.appoemints.create');
    Route::post('save', 'AppoemintController@save') -> name('hosbital.appoemints.save');
    Route::get('edit/{id}', 'AppoemintController@edit') -> name('hosbital.appoemints.edit');
    Route::post('update/{id}', 'AppoemintController@update') -> name('hosbital.appoemints.update');
    Route::get('delete/{id}', 'AppoemintController@destroy') -> name('hosbital.appoemints.delete');
    Route::get('/doctor_serve', 'AppoemintController@getprice') -> name('hosbital.appoemints.getprice');
    Route::get('show/{id}', 'AppoemintController@showdetail') -> name('hosbital.appoemints.show');
    Route::get('MarkAsRead_all', 'AppoemintController@MarkAsRead_all') -> name('hosbital.appoemints.MarkAsRead');
    Route::post('mate', 'AppoemintController@mate') -> name('hosbital.appoemints.mate');
  });
     Route::any('user/notification/get','NotificationController@getNotification');
     Route::any('user/notification/read','NotificationController@markAsRead');
     Route::any('user/notification/read/{id}','NotificationController@markAsReadRedirect');
  Route::group(['prefix' => 'serve'], function(){
    Route::get('/', 'ServeController@index') -> name('hosbital.serves');
    Route::get('create', 'ServeController@create') -> name('hosbital.serves.create');
    Route::post('save', 'ServeController@save') -> name('hosbital.serves.save');
    Route::get('edit/{id}', 'ServeController@edit') -> name('hosbital.serves.edit');
    Route::post('update/{id}', 'ServeController@update') -> name('hosbital.serves.update');
    Route::get('delete/{id}', 'ServeController@destroy') -> name('hosbital.serves.delete');
  });

  Route::group(['prefix' => 'doctorserves'], function(){
    Route::get('/', 'DoctorServeController@index') -> name('hosbital.doctorserves');
    Route::get('create', 'DoctorServeController@create') -> name('hosbital.doctorserves.create');
    Route::post('save', 'DoctorServeController@save') -> name('hosbital.doctorserves.save');
    Route::get('edit/{id}', 'DoctorServeController@edit') -> name('hosbital.doctorserves.edit');
    Route::post('update/{id}', 'DoctorServeController@update') -> name('hosbital.doctorserves.update');
    Route::get('delete/{id}', 'DoctorServeController@destroy') -> name('hosbital.doctorserves.delete');
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
    Route::get('/', 'BloodController@index') -> name('hosbital.bloods');
    Route::get('create', 'BloodController@create') -> name('hosbital.bloods.create');
    Route::post('save', 'BloodController@save') -> name('hosbital.bloods.save');
    Route::get('edit/{id}', 'BloodController@edit') -> name('hosbital.bloods.edit');
    Route::post('update/{id}', 'BloodController@update') -> name('hosbital.bloods.update');
    Route::get('delete/{id}', 'BloodController@destroy') -> name('hosbital.bloods.delete');
  });
  Route::group(['prefix' => 'roles'], function () {
    Route::get('/', 'RolesController@index')->name('hosbital.roles.index');
    Route::get('create', 'RolesController@create')->name('hosbital.roles.create');
    Route::post('store', 'RolesController@saveRole')->name('hosbital.roles.store');
    Route::get('/edit/{id}', 'RolesController@edit') ->name('hosbital.roles.edit') ;
    Route::post('update/{id}', 'RolesController@update')->name('hosbital.roles.update');
 });

 Route::group(['prefix' => 'users'  ], function () {
  Route::get('/', 'UsersController@index')->name('hosbital.users.index');
  Route::get('/create', 'UsersController@create')->name('hosbital.users.create');
  Route::post('/store', 'UsersController@store')->name('hosbital.users.store');
  Route::get('/cuontry', 'UsersController@getcity') -> name('hosbital.hosbitals.getcity');
});

Route::group(['prefix' => 'hosbitals'  ], function () {
  Route::get('/', 'HosbitalController@index')->name('hosbital.hosbitals.index');
  Route::get('/create', 'HosbitalController@create')->name('hosbital.hosbitals.create');
  Route::post('/store', 'HosbitalController@store')->name('hosbital.hosbitals.store');
  Route::get('edit/{id}', 'HosbitalController@edit') -> name('hosbital.hosbitals.edit');
    Route::post('update/{id}', 'HosbitalController@update') -> name('hosbital.hosbitals.update');
    Route::get('delete/{id}', 'HosbitalController@destroy') -> name('hosbital.hosbitals.delete');
});

Route::group(['prefix' => 'venlabes'  ], function () {
  Route::get('/', 'VenlabeController@index')->name('hosbital.venlabes.index');
  Route::get('/create', 'VenlabeController@create')->name('hosbital.venlabes.create');
  Route::post('/store', 'VenlabeController@store')->name('hosbital.venlabes.store');
  Route::get('edit/{id}', 'VenlabeController@edit') -> name('hosbital.venlabes.edit');
    Route::post('update/{id}', 'VenlabeController@update') -> name('hosbital.venlabes.update');
    Route::get('delete/{id}', 'VenlabeController@destroy') -> name('hosbital.venlabes.delete');
    Route::get('/cuontry', 'VenlabeController@getcity') -> name('hosbital.venlabes.getcity');
    Route::get('show/{id}', 'VnlabeDetailController@showdetail') -> name('hosbital.venlabes.show');
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
  Route::get('/', 'CuontryController@index')->name('hosbital.cuontries.index');
  Route::get('/create', 'CuontryController@create')->name('hosbital.cuontries.create');
  Route::post('/store', 'CuontryController@store')->name('hosbital.cuontries.store');
  Route::get('edit/{id}', 'CuontryController@edit') -> name('hosbital.cuontries.edit');
    Route::post('update/{id}', 'CuontryController@update') -> name('hosbital.cuontries.update');
    Route::get('delete/{id}', 'CuontryController@destroy') -> name('hosbital.cuontries.delete');
});
Route::group(['prefix' => 'cities'  ], function () {
  Route::get('/', 'CityController@index')->name('hosbital.cities.index');
  Route::get('/create', 'CityController@create')->name('hosbital.cities.create');
  Route::post('/store', 'CityController@store')->name('hosbital.cities.store');
  Route::get('edit/{id}', 'CityController@edit') -> name('hosbital.cities.edit');
    Route::post('update/{id}', 'CityController@update') -> name('hosbital.cities.update');
    Route::get('delete/{id}', 'CityController@destroy') -> name('hosbital.cities.delete');
});
});



  Route::group(['namespace' => 'hosbital' ,'middlewware' => 'guest:hosbitall', 'prefix' => 'hosbitall'], function(){
    Route::get('/login', 'loginController@getlogin') -> name('get.hosbital.login');
    Route::post('/login', 'loginController@login') -> name('hosbital.login');
      
  });

});

  
#########
