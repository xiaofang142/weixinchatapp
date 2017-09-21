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
    Route::match(['post','get'],'Login/index','LoginController@index')->name('login');
    Route::get('Login/loginout','LoginController@loginout');

    //默认首页
    Route::match(['post','get'],'index/index','IndexController@index');

    //用户管理
    Route::get('User/index','UserController@index');
    Route::get('User/delete/id/{id?}','UserController@delete');
    Route::get('User/register/id/{id?}','UserController@register');
    Route::get('User/unpublic/id/{id?}','UserController@unpublic');
    Route::get('User/setPublic/id/{id?}','UserController@setPublic');
    Route::get('User/detail/id/{id?}','UserController@detail');
    Route::match(['post','get'],'User/add','UserController@add');

    //需求管理
    Route::get('Requirement/index','RequirementController@index');
    Route::get('Requirement/audit/id/{id?}','RequirementController@audit');
    Route::get('Requirement/delete/id/{id?}','RequirementController@delete');
    Route::get('Requirement/detail/id/{id?}','RequirementController@detail');
    Route::match(['post','get'],'Requirement/add','RequirementController@add');

    //留言管理
    Route::get('Message/index','MessageController@index');
    Route::get('Message/delete/id/{id?}','MessageController@delete');
    Route::get('Message/detail/id/{id?}','MessageController@detail');
    Route::match(['post','get'],'Message/add','MessageController@add');

    // 分类管理
    Route::get('Industry/index','IndustryController@index');
    Route::get('Industry/delete/id/{id?}','IndustryController@delete');
    Route::match(['post','get'],'Industry/update/id/{id?}','IndustryController@update');
    Route::match(['post','get'],'Industry/checkName','IndustryController@checkName');
    Route::match(['post','get'],'Industry/add','IndustryController@add');

});


