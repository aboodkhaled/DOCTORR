<?php
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| site Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/ 
Route::get('/demo', 'ExampleController@index');
    Route::post('/setTarget', 'ExampleController@setTarget');
Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
  ], function () {
    Route::get('/', function () {
        return view('front.home');
    });
    Route::group(['namespace' => 'Auth', 'middleware' => 'guest:web'], function () {
    Route::get('registerinfo','RegisterController@reg')->name('registerinfo');
    Route::POST('save','RegisterController@creatt')->name('registerup');
});
    

Route::group(['namespace' => 'site', 'middleware' => 'guest:web'], function () {
    //guest  user
    
    route::get('/home', 'HomeController@mo')->name('homee');

    
       
        
});
Route::group(['namespace' => 'site', 'middleware' => ['auth', 'VerifiedUser']], function () {
    // must be authenticated user and verified
    Route::get('/pro', function () {
        return 'You Are Authenticated ';
    });
});

Route::group(['namespace' => 'site', 'middleware' =>  'auth:web'], function () {
    // must be authenticated user
    route::get('/', 'HomeController@index')->name('homee');
    Route::get('MarkAsRead_all', 'HomeController@MarkAsRead_all') -> name('MarkAsRead');
    route::get('department/{id}', 'DepartmenttController@departmentpyid')->name('department');
    route::get('departmentt/{id}', 'HDepartmenttController@departmentpyid')->name('hdepartment');
    route::get('fdepartmentt/{id}', 'FHDepartmenttController@departmentpyid')->name('fdepartment');
    route::get('hosbital/{id}', 'HosbitallController@hosbitalpyid')->name('hosbital');
    route::get('hosbital/{id}', 'HosbiitallController@hosbitalpyid')->name('hosbitall');
    route::get('fhosbital/{id}', 'FHosbiitallController@hosbitalpyid')->name('fhosbitall');
    route::get('clinicc/{id}', 'CliniccController@clinicpyid')->name('clinicc');
    route::get('doctor/{id}', 'DoctorrController@doctorbyid')->name('doctor.details');
    route::get('hdoctor/{id}', 'HosbiitallController@doctorbyid')->name('hdoctor.details');
    route::get('fdoctor/{id}', 'FHosbiitallController@doctorbyid')->name('fdoctor.details');
   
    Route::get('hcreate/{id}', 'HappoeminttController@create') -> name('happoemints');
    Route::get('fcreate/{id}', 'FHappoeminttController@create') -> name('fappoemints');
    Route::get('create/{id}', 'AppoeminttController@create') -> name('appoemintts');
    Route::get('ccreate/{id}', 'CappoeminttController@create') -> name('cappoemintts');
    Route::get('cccreatee/{id}', 'Cappoemintt2Controller@create') -> name('cappoemintt2s');
    Route::POST('cccpay', 'Cappoemintt2Controller@save') -> name('cappoemintt2s.save');
    Route::get('ccreatee3/{id}', 'Cappoemintt3Controller@create') -> name('cappoemintt3s');
    Route::POST('ccpay3', 'Cappoemintt3Controller@save') -> name('cappoemintt3s.save');
    Route::get('ccreatee4/{id}', 'Cappoemintt4Controller@create') -> name('cappoemintt4s');
    Route::POST('ccpay4', 'Cappoemintt4Controller@save') -> name('cappoemintt4s.save');
    Route::get('ccreatee5/{id}', 'Cappoemintt5Controller@create') -> name('cappoemintt5s');
    Route::POST('ccpay5', 'Cappoemintt5Controller@save') -> name('cappoemintt5s.save');
   
   
    Route::POST('hpay', 'HappoeminttController@save') -> name('happoemint.save');
    Route::POST('fpay', 'FHappoeminttController@save') -> name('fappoemint.save');
    Route::POST('pay', 'AppoeminttController@save') -> name('appoemintts.save');
    Route::POST('cpay', 'CappoeminttController@save') -> name('cappoemintts.save');
    Route::get('confirm', 'AppoeminttController@confirm') -> name('appoemints.confirm');
    Route::post('conf', 'AppoeminttController@conf') -> name('appoemints.conf');
    
    Route::get('/hdoctor_serve', 'HappoeminttController@hgetprice') -> name('hgetprice');
    Route::get('/fdoctor_serve', 'FHappoeminttController@fgetprice') -> name('fgetprice');
    Route::get('/doctor_serve', 'AppoeminttController@getprice') -> name('getprice');

    Route::get('/serve1_price', 'CappoeminttController@getpprice') -> name('getpprice');
    Route::get('/serve1_tprice', 'CappoeminttController@gettprice') -> name('gettprice');
    Route::get('/serve1_thin', 'CappoeminttController@gethprice') -> name('gethprice');
    Route::get('/serve1_total', 'CappoeminttController@getoprice') -> name('getoprice');

    Route::get('/serve2_price', 'Cappoemintt2Controller@getpprice') -> name('getppric2e');
    Route::get('/serve2_tprice', 'Cappoemintt2Controller@gettprice') -> name('gettpric2e');
    Route::get('/serve2_thin', 'Cappoemintt2Controller@gethprice') -> name('gethpric2e');
    Route::get('/serve2_total', 'Cappoemintt2Controller@getoprice') -> name('getopric2e');

    Route::get('/serve3_price', 'Cappoemintt3Controller@getpprice') -> name('getppric3e');
    Route::get('/serve3_tprice', 'Cappoemintt3Controller@gettprice') -> name('gettpric3e');
    Route::get('/serve3_thin', 'Cappoemintt3Controller@gethprice') -> name('gethpric3e');
    Route::get('/serve3_total', 'Cappoemintt3Controller@getoprice') -> name('getopric3e');

    Route::get('/serve4_price', 'Cappoemintt4Controller@getpprice') -> name('getppric4e');
    Route::get('/serve4_tprice', 'Cappoemintt4Controller@gettprice') -> name('gettpric4e');
    Route::get('/serve4_thin', 'Cappoemintt4Controller@gethprice') -> name('gethpric4e');
    Route::get('/serve4_total', 'Cappoemintt4Controller@getoprice') -> name('getopric4e');

    Route::get('/serve5_price', 'Cappoemintt5Controller@getpprice') -> name('getppric5e');
    Route::get('/serve5_tprice', 'Cappoemintt5Controller@gettprice') -> name('gettpric5e');
    Route::get('/serve5_thin', 'Cappoemintt5Controller@gethprice') -> name('gethpric5e');
    Route::get('/serve5_total', 'Cappoemintt5Controller@getoprice') -> name('getopric5e');


    Route::get('/show', 'sikssController@index') -> name('show');
    Route::post('verify-user/', 'VerificationCodeController@verify')->name('verify-user');
    Route::get('verify', 'VerificationCodeController@getVerifyPage')->name('get.verification.form');

    Route::group(['prefix' => 'profile'], function () {
        Route::get('edit', 'ProfileeController@editProfile')->name('edit.profile');
        Route::put('update', 'ProfileeController@updateprofile')->name('update.profile');
    });
   
    
});

});


