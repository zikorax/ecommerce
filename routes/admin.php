<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){

             Route::group(['namespace'=>'App\http\Controllers\Dashboard','middleware' => 'auth:admin','prefix'=> 'admin'], function () {

                     Route::get('/','DashboardController@index')->name('admin.dashboard');

             });


            Route::group(['namespace'=>'App\http\Controllers\Dashboard','middleware' => 'guest:admin','prefix'=> 'admin'    ], function () {

                    Route::get('login','LoginController@login') -> name('admin.login');
                    Route::post('login','LoginController@Postlogin') -> name('admin.post.login');

             });

});




