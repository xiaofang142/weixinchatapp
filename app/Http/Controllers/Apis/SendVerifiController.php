<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/22 0022
 * Time: 下午 4:49
 */

namespace App\Http\Controllers\Apis;


use App\Http\Controllers\Controller;
use Gregwar\Captcha\CaptchaBuilder;
use Illuminate\Http\Request;

class SendVerifiController extends Controller
{

    //发送图形验证码
    public function verifi(Request $request){
        $builder = new CaptchaBuilder();
        $builder->build();
        $dateBase64 = $builder->inline();  //获取图形验证码的url
        $code = $builder->getPhrase();
        $request->session()->put('verifi', $builder->getPhrase());  //将图形验证码的值写入到session中
        return response()->json([
            'code' =>200,
            'data' =>[
                'verifi'=>$code,
                'base64' => $dateBase64,
            ]
        ]);
    }
    //验证图形验证码
    public function checkVerifi(Request $request){
        $verifi = $request->input('verifi');
        if(empty($verifi)){
            return response()->json([
                'code' =>0,
                'message' =>'验证码不能为空',
            ]);
        }
        $code = $request->session()->get('verifi');
        if( !$request->session()->has('verifi')){
            return response()->json([
                'code' =>0,
                'message' =>'验证码过期',
            ]);
        }
        if(strtolower($verifi) == strtolower($code)){
            return response()->json([
                'code' =>200,
                'data' => [
                    'verifi' =>$code,
                ]
            ]);
        }else{
            return response()->json([
                'code' =>0,
                'message' =>'验证码错误',
            ]);
        }
    }


}