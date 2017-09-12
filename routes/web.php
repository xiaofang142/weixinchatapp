<?php

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

//定义后台管理模块
Route::group(['namespace' => 'Admins','prefix' => 'admin/'], function(){
    // 控制器在 "App\Http\Controllers\Admin" 命名空间下
    Route::match(['post','get'],'login','LoginController@index');
    Route::get('loginout','LoginController@loginout');
    Route::get('index','IndexController@index');
    Route::get('User/index','UserController@index');
    Route::get('User/recharge/id/{id?}','UserController@recharge');
    Route::post('User/setrecharge','UserController@setrecharge');
    Route::get('User/detail/id/{id?}','UserController@detail');
    Route::get('User/lockuser/id/{id?}','UserController@lockuser');
    Route::get('User/forbidden/id/{id?}','UserController@forbidden');
    Route::get('Order/index','OrderController@index');
    Route::get('Order/export','OrderController@export');
    Route::get('Order/detail/id/{id?}','OrderController@detail');


});


