<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
//api  请求luyou
Route::group(['namespace' => 'Apis'], function(){
    //基于token  拿到用户信息
    Route::get('user/openid/{openid?}','UserController@getUserInfoByOpenid');
    //用户注册
    Route::post('user/register/openid/{openid?}','UserController@register');
    //用户编辑
    Route::post('user/edit/openid/{openid?}','UserController@edit');
    //拿到行业和种类信息
    Route::get('industry/type/{type?}','IndustryController@getIndustry');
    //需求一览
    Route::get('requirements/openid/{openid?}','RequirementController@getRequirements');
    //需求详情
    Route::get('requirement/detail/id/{id?}','RequirementController@detail');
    //留言一览
    Route::get('messages/id/{id?}','MessageController@getMessagesList');
    //回复
    Route::post('message/reply/id/{id?}','MessageController@reply');
    //留言
    Route::post('message/create','MessageController@create');




});


