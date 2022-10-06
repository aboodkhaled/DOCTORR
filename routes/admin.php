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
  define('PAGINATION_COUNT',1000000);
Route::group(['namespace' => 'admin', 'middleware' => 'auth:admin', 'prefix' => 'admin'], function(){
  Route::get('/', 'DashboardController@index') -> name('admin.dashboard');
  Route::get('logout', 'loginController@logout')->name('admin.logout');
    
  
  Route::group(['prefix' => 'profile'], function () {
    Route::get('edit', 'ProfileController@editProfile')->name('admin.edit.profile');
    Route::put('update', 'ProfileController@updateprofile')->name('admin.update.profile');
});


  Route::group(['prefix' => 'languages'], function(){
    Route::get('/', 'LanguageController@index') -> name('admin.languages');
    Route::get('create', 'LanguageController@create') -> name('admin.languages.create');
    Route::post('save', 'LanguageController@save') -> name('admin.languages.save');
    Route::get('edit/{id}', 'LanguageController@edit') -> name('admin.languages.edit');
    Route::post('update/{id}', 'LanguageController@update') -> name('admin.languages.update');
    Route::get('delete/{id}', 'LanguageController@destroy') -> name('admin.languages.delete');
  });

  Route::group(['prefix' => 'meeting'], function(){
    Route::get('/', 'MateController@index') -> name('admin.meeting');
    Route::get('create', 'MateController@create') -> name('admin.meeting.create');
    Route::post('save', 'MateController@save') -> name('admin.meeting.save');
    Route::get('edit/{id}', 'MateController@edit') -> name('admin.meeting.edit');
    Route::post('update/{id}', 'MateController@update') -> name('admin.meeting.update');
    Route::get('delete/{id}', 'MateController@destroy') -> name('admin.meeting.delete');
  });

  Route::group(['prefix' => 'departments', 'middleware' =>'can:departments'], function(){
    Route::get('/', 'DepartmentController@index') -> name('admin.departments');
   
    Route::get('create', 'DepartmentController@create') -> name('admin.departments.create');
    Route::post('save', 'DepartmentController@save') -> name('admin.departments.save');
    Route::get('edit/{id}', 'DepartmentController@edit') -> name('admin.departments.edit');
    Route::post('update/{id}', 'DepartmentController@update') -> name('admin.departments.update');
    Route::get('delete/{id}', 'DepartmentController@destroy') -> name('admin.departments.delete');
  });


  Route::group(['prefix' => 'specialtys'], function(){
    Route::get('/', 'SpecialtyController@index') -> name('admin.specialtys');
    Route::get('create', 'SpecialtyController@create') -> name('admin.specialtys.create');
    Route::post('save', 'SpecialtyController@save') -> name('admin.specialtys.save');
    Route::get('edit/{id}', 'SpecialtyController@edit') -> name('admin.specialtys.edit');
    Route::post('update/{id}', 'SpecialtyController@update') -> name('admin.specialtys.update');
    Route::get('delete/{id}', 'SpecialtyController@destroy') -> name('admin.specialtys.delete');
  });
  
  Route::group(['prefix' => 'doctors'], function(){
    Route::get('/', 'DoctorController@index') -> name('admin.doctors');
    Route::get('create', 'DoctorController@create') -> name('admin.doctors.create');
    Route::post('save', 'DoctorController@save') -> name('admin.doctors.save');
    Route::get('edit/{id}', 'DoctorController@edit') -> name('admin.doctors.edit');
    Route::post('update/{id}', 'DoctorController@update') -> name('admin.doctors.update');
    Route::get('delete/{id}', 'DoctorController@destroy') -> name('admin.doctors.delete');
    Route::get('/cuontry', 'DoctorController@getcity') -> name('admin.doctors.getcity');
  });


  Route::group(['prefix' => 'hadmins'], function(){
    Route::get('/', 'HadminController@index') -> name('admin.hadmins');
    Route::get('create', 'HadminController@create') -> name('admin.hadmins.create');
    Route::post('save', 'HadminController@save') -> name('admin.hadmins.save');
    Route::get('edit/{id}', 'HadminController@edit') -> name('admin.hadmins.edit');
    Route::post('update/{id}', 'HadminController@update') -> name('admin.hadmins.update');
    Route::get('delete/{id}', 'HadminController@destroy') -> name('admin.hadmins.delete');
    Route::get('/cuontry', 'HadminController@getcity') -> name('admin.hadmins.getcity');
  });

  Route::group(['prefix' => 'siks'], function(){
    Route::get('/', 'SikController@index') -> name('admin.siks');
    Route::get('create', 'SikController@create') -> name('admin.siks.create');
    Route::post('save', 'SikController@save') -> name('admin.siks.save');
    Route::get('edit/{id}', 'SikController@edit') -> name('admin.siks.edit');
    Route::post('update/{id}', 'SikController@update') -> name('admin.siks.update');
    Route::get('delete/{id}', 'SikController@destroy') -> name('admin.siks.delete');
    Route::get('/cuontry', 'SikController@getcity') -> name('admin.siks.getcity');
    Route::get('show/{id}', 'SikController@showdetail') -> name('admin.siks.show');
  });

  Route::group(['prefix' => 'pharmice'], function(){
    Route::get('/', 'PharmiceController@index') -> name('admin.pharmices');
    Route::get('create', 'PharmiceController@create') -> name('admin.pharmices.create');
    Route::post('save', 'PharmiceController@save') -> name('admin.pharmices.save');
    Route::get('edit/{id}', 'PharmiceController@edit') -> name('admin.pharmices.edit');
    Route::post('update/{id}', 'PharmiceController@update') -> name('admin.pharmices.update');
    Route::get('delete/{id}', 'PharmiceController@destroy') -> name('admin.pharmices.delete');
  });

  Route::group(['prefix' => 'labe'], function(){
    Route::get('/', 'LabeController@index') -> name('admin.labes');
    Route::get('create', 'LabeController@create') -> name('admin.labes.create');
    Route::post('save', 'LabeController@save') -> name('admin.labes.save');
    Route::get('edit/{id}', 'LabeController@edit') -> name('admin.labes.edit');
    Route::post('update/{id}', 'LabeController@update') -> name('admin.labes.update');
    Route::get('delete/{id}', 'LabeController@destroy') -> name('admin.labes.delete');
  });

  Route::group(['prefix' => 'x_ray'], function(){
    Route::get('/', 'XrayController@index') -> name('admin.x_rays');
    Route::get('create', 'XrayController@create') -> name('admin.x_rays.create');
    Route::post('save', 'XrayController@save') -> name('admin.x_rays.save');
    Route::get('edit/{id}', 'XrayController@edit') -> name('admin.x_rays.edit');
    Route::post('update/{id}', 'XrayController@update') -> name('admin.x_rays.update');
    Route::get('delete/{id}', 'XrayController@destroy') -> name('admin.x_rays.delete');
  });
  Route::group(['prefix' => 'appoemint'], function(){
    Route::get('/', 'AppoemintController@index') -> name('admin.appoemints');
    Route::get('create', 'AppoemintController@create') -> name('admin.appoemints.create');
    Route::post('save', 'AppoemintController@save') -> name('admin.appoemints.save');
    Route::get('edit/{id}', 'AppoemintController@edit') -> name('admin.appoemints.edit');
    Route::post('update/{id}', 'AppoemintController@update') -> name('admin.appoemints.update');
    Route::get('delete/{id}', 'AppoemintController@destroy') -> name('admin.appoemints.delete');
    Route::get('/doctor_serve', 'AppoemintController@getprice') -> name('admin.appoemints.getprice');
    Route::get('show/{id}', 'AppoemintController@showdetail') -> name('admin.appoemints.show');
    Route::get('MarkAsRead_all', 'AppoemintController@MarkAsRead_all') -> name('admin.appoemints.MarkAsRead');
    Route::post('mate', 'AppoemintController@mate') -> name('admin.appoemints.mate');
  });
     Route::any('user/notification/get','NotificationController@getNotification');
     Route::any('user/notification/read','NotificationController@markAsRead');
     Route::any('user/notification/read/{id}','NotificationController@markAsReadRedirect');
  Route::group(['prefix' => 'serve'], function(){
    Route::get('/', 'ServeController@index') -> name('admin.serves');
    Route::get('create', 'ServeController@create') -> name('admin.serves.create');
    Route::post('save', 'ServeController@save') -> name('admin.serves.save');
    Route::get('edit/{id}', 'ServeController@edit') -> name('admin.serves.edit');
    Route::post('update/{id}', 'ServeController@update') -> name('admin.serves.update');
    Route::get('delete/{id}', 'ServeController@destroy') -> name('admin.serves.delete');
  });

  Route::group(['prefix' => 'doctorserves'], function(){
    Route::get('/', 'DoctorServeController@index') -> name('admin.doctorserves');
    Route::get('create', 'DoctorServeController@create') -> name('admin.doctorserves.create');
    Route::post('save', 'DoctorServeController@save') -> name('admin.doctorserves.save');
    Route::get('edit/{id}', 'DoctorServeController@edit') -> name('admin.doctorserves.edit');
    Route::post('update/{id}', 'DoctorServeController@update') -> name('admin.doctorserves.update');
    Route::get('delete/{id}', 'DoctorServeController@destroy') -> name('admin.doctorserves.delete');
  });

  Route::group(['prefix' => 'schedules'], function(){
    Route::get('/', 'ScheduleController@index') -> name('admin.schedules');
    Route::get('create', 'ScheduleController@create') -> name('admin.schedules.create');
    Route::post('save', 'ScheduleController@save') -> name('admin.schedules.save');
    Route::get('edit/{id}', 'ScheduleController@edit') -> name('admin.schedules.edit');
    Route::post('update/{id}', 'ScheduleController@update') -> name('admin.schedules.update');
    Route::get('delete/{id}', 'ScheduleController@destroy') -> name('admin.schedules.delete');
  });

  Route::group(['prefix' => 'bloods'], function(){
    Route::get('/', 'BloodController@index') -> name('admin.bloods');
    Route::get('create', 'BloodController@create') -> name('admin.bloods.create');
    Route::post('save', 'BloodController@save') -> name('admin.bloods.save');
    Route::get('edit/{id}', 'BloodController@edit') -> name('admin.bloods.edit');
    Route::post('update/{id}', 'BloodController@update') -> name('admin.bloods.update');
    Route::get('delete/{id}', 'BloodController@destroy') -> name('admin.bloods.delete');
  });
  Route::group(['prefix' => 'roles'], function () {
    Route::get('/', 'RolesController@index')->name('admin.roles.index');
    Route::get('create', 'RolesController@create')->name('admin.roles.create');
    Route::post('store', 'RolesController@saveRole')->name('admin.roles.store');
    Route::get('/edit/{id}', 'RolesController@edit') ->name('admin.roles.edit') ;
    Route::post('update/{id}', 'RolesController@update')->name('admin.roles.update');
 });

 Route::group(['prefix' => 'users'  ], function () {
  Route::get('/', 'UsersController@index')->name('admin.users.index');
  Route::get('/create', 'UsersController@create')->name('admin.users.create');
  Route::post('/store', 'UsersController@store')->name('admin.users.store');
});

Route::group(['prefix' => 'hosbitals'  ], function () {
  Route::get('/', 'HosbitalController@index')->name('admin.hosbitals.index');
  Route::get('/create', 'HosbitalController@create')->name('admin.hosbitals.create');
  Route::post('/store', 'HosbitalController@store')->name('admin.hosbitals.store');
  Route::get('edit/{id}', 'HosbitalController@edit') -> name('admin.hosbitals.edit');
    Route::post('update/{id}', 'HosbitalController@update') -> name('admin.hosbitals.update');
    Route::get('delete/{id}', 'HosbitalController@destroy') -> name('admin.hosbitals.delete');
    Route::get('/cuontry', 'HosbitalController@getcity') -> name('admin.hosbitals.getcity');
    Route::get('show/{id}', 'HosbitalController@showdetail') -> name('admin.hosbitals.show');
    Route::get('print/{id}', 'HosbitalController@print') -> name('admin.hosbitals.print');
    Route::get('pdf/{id}', 'HosbitalController@pdf') -> name('admin.hosbitals.pdf');
});


Route::group(['prefix' => 'fhosbitals'  ], function () {
  Route::get('/', 'FHosbitalController@index')->name('admin.fhosbitals.index');
  Route::get('/create', 'FHosbitalController@create')->name('admin.fhosbitals.create');
  Route::post('/store', 'FHosbitalController@store')->name('admin.fhosbitals.store');
  Route::get('edit/{id}', 'FHosbitalController@edit') -> name('admin.fhosbitals.edit');
    Route::post('update/{id}', 'FHosbitalController@update') -> name('admin.fhosbitals.update');
    Route::get('delete/{id}', 'FHosbitalController@destroy') -> name('admin.fhosbitals.delete');
    Route::get('/cuontry', 'FHosbitalController@getcity') -> name('admin.fhosbitals.getcity');
    Route::get('show/{id}', 'FHosbitalController@showdetail') -> name('admin.fhosbitals.show');
    Route::get('print/{id}', 'FHosbitalController@print') -> name('admin.fhosbitals.print');
    Route::get('pdf/{id}', 'FHosbitalController@pdf') -> name('admin.fhosbitals.pdf');
});


Route::group(['prefix' => 'clinics'  ], function () {
  Route::get('/', 'ClinicController@index')->name('admin.clinics.index');
  Route::get('/create', 'ClinicController@create')->name('admin.clinics.create');
  Route::post('/store', 'ClinicController@store')->name('admin.clinics.store');
  Route::get('edit/{id}', 'ClinicController@edit') -> name('admin.clinics.edit');
    Route::post('update/{id}', 'ClinicController@update') -> name('admin.clinics.update');
    Route::get('delete/{id}', 'ClinicController@destroy') -> name('admin.clinics.delete');
    Route::get('/cuontry', 'ClinicController@getcity') -> name('admin.clinics.getcity');
    Route::get('show/{id}', 'ClinicController@showdetail') -> name('admin.clinics.show');
    Route::get('print/{id}', 'ClinicController@print') -> name('admin.clinics.print');
    Route::get('pdf/{id}', 'ClinicController@pdf') -> name('admin.clinics.pdf');
});

Route::group(['prefix' => 'venlabes'  ], function () {
  Route::get('/', 'VenlabeController@index')->name('admin.venlabes.index');
  Route::get('/create', 'VenlabeController@create')->name('admin.venlabes.create');
  Route::post('/store', 'VenlabeController@store')->name('admin.venlabes.store');
  Route::get('edit/{id}', 'VenlabeController@edit') -> name('admin.venlabes.edit');
    Route::post('update/{id}', 'VenlabeController@update') -> name('admin.venlabes.update');
    Route::get('delete/{id}', 'VenlabeController@destroy') -> name('admin.venlabes.delete');
    Route::get('/cuontry', 'VenlabeController@getcity') -> name('admin.venlabes.getcity');
    Route::get('show/{id}', 'VnlabeDetailController@showdetail') -> name('admin.venlabes.show');
});

Route::group(['prefix' => 'venpharmices'  ], function () {
  Route::get('/', 'VenpharmiceController@index')->name('admin.venpharmices.index');
  Route::get('/create', 'VenpharmiceController@create')->name('admin.venpharmices.create');
  Route::post('/store', 'VenpharmiceController@store')->name('admin.venpharmices.store');
  Route::get('edit/{id}', 'VenpharmiceController@edit') -> name('admin.venpharmices.edit');
    Route::post('update/{id}', 'VenpharmiceController@update') -> name('admin.venpharmices.update');
    Route::get('delete/{id}', 'VenpharmiceController@destroy') -> name('admin.venpharmices.delete');
    Route::get('/cuontry', 'VenpharmiceController@getcity') -> name('admin.venpharmices.getcity');
    Route::get('show/{id}', 'VnpharmiceDetailController@showdetail') -> name('admin.venpharmices.show');
    Route::get('print/{id}', 'VenpharmiceController@print') -> name('admin.venpharmices.print');
    Route::get('pdf/{id}', 'VenpharmiceController@pdf') -> name('admin.venpharmices.pdf');
});
Route::group(['prefix' => 'cuontries'  ], function () {
  Route::get('/', 'CuontryController@index')->name('admin.cuontries.index');
  Route::get('/create', 'CuontryController@create')->name('admin.cuontries.create');
  Route::post('/store', 'CuontryController@store')->name('admin.cuontries.store');
  Route::get('edit/{id}', 'CuontryController@edit') -> name('admin.cuontries.edit');
    Route::post('update/{id}', 'CuontryController@update') -> name('admin.cuontries.update');
    Route::get('delete/{id}', 'CuontryController@destroy') -> name('admin.cuontries.delete');
});

Route::group(['prefix' => 'plases'  ], function () {
  Route::get('/', 'PlaseController@index')->name('admin.plases.index');
  Route::get('/create', 'PlaseController@create')->name('admin.plases.create');
  Route::post('/store', 'PlaseController@store')->name('admin.plases.store');
  Route::get('edit/{id}', 'PlaseController@edit') -> name('admin.plases.edit');
    Route::post('update/{id}', 'PlaseController@update') -> name('admin.plases.update');
    Route::get('delete/{id}', 'PlaseController@destroy') -> name('admin.plases.delete');
});

Route::group(['prefix' => 'cities'  ], function () {
  Route::get('/', 'CityController@index')->name('admin.cities.index');
  Route::get('/create', 'CityController@create')->name('admin.cities.create');
  Route::post('/store', 'CityController@store')->name('admin.cities.store');
  Route::get('edit/{id}', 'CityController@edit') -> name('admin.cities.edit');
    Route::post('update/{id}', 'CityController@update') -> name('admin.cities.update');
    Route::get('delete/{id}', 'CityController@destroy') -> name('admin.cities.delete');
});
});



  Route::group(['namespace' => 'admin' ,'middlewware' => 'guest:admin', 'prefix' => 'admin'], function(){
    Route::get('/login', 'loginController@getlogin') -> name('get.admin.login');
    Route::post('/login', 'loginController@login') -> name('admin.login');
      
  });

});

  
#########
