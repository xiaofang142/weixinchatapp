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
    //登录注册
    Route::match(['post','get'],'login/index','LoginController@index');
    Route::get('login/loginout','LoginController@loginout');

    //默认首页
    Route::match(['post','get'],'index/index','IndexController@index');

    //用户管理
    Route::get('User/index','UserController@index');

    //需求管理
    Route::get('Requirement/index','RequirementController@index');

    //留言管理
    Route::get('Message/index','MessageController@index');

    // 分类管理
    Route::get('Industry/index','IndustryController@index');



});


