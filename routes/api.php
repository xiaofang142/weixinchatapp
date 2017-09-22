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
Route::group(['namespace' => 'Apis','middleware' => 'web'], function(){
    //基于token  拿到用户信息
    Route::get('user','UserController@getUserInfoByOpenid');
    //用户注册
    Route::post('user/register','UserController@register');
    //用户编辑
    Route::post('user/edit','UserController@edit');
    //查看其它用户信息
    Route::get('user/other','UserController@getOtherUserInfo');
    //拿到行业和种类信息
    Route::get('industry','IndustryController@getIndustry');
    //需求一览
    Route::get('requirements','RequirementController@getRequirements');
    //发布需求 create
    Route::post('requirement/create','RequirementController@create');
    //需求详情
    Route::get('requirement/detail','RequirementController@detail');
    //增加需求点击数
    Route::post('requirement/clicks','RequirementController@addClicks');
    //留言一览
    Route::get('messages','MessageController@getMessagesList');
    //回复
    Route::post('message/reply','MessageController@reply');
    //留言
    Route::post('message/create','MessageController@create');
    //发送短信
    Route::get('alidaRouyu','SendMessageController@alidayu');
    //发送图形验证码
    Route::get('verifi','SendMessageController@verifi');
    //检测图形验证码
    Route::get('verifi/check','SendMessageController@checkVerifi');
});


