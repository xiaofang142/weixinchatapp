<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/22 0022
 * Time: 下午 4:49
 */

namespace App\Http\Controllers\Apis;


use App\Http\Controllers\Controller;
use App\Http\Models\Verifi;
use Gregwar\Captcha\CaptchaBuilder;
use Illuminate\Http\Request;

class SendVerifiController extends Controller
{
    public $verifiModel;
    public function __construct()
    {
        $this->verifiModel = new Verifi();
    }

    //发送图形验证码
    public function verifi(Request $request){
        $builder = new CaptchaBuilder();
        $openid = $request->header('openid');
        if(empty($openid)){
            return response()->json([
                'code' =>'0',
                'message' =>'用户openid 不能为空'
            ]);
        }
        $builder->build();
        $dateBase64 = $builder->inline();  //获取图形验证码的url
        $verifi = $builder->getPhrase();
//
//        $request->session()->put('verifi', $builder->getPhrase());  //将图形验证码的值写入到session中
        $rsult = $this->verifiModel->saveVerifi([
           'openid' =>$openid,
            'verifi' => $verifi,
            'created' =>date('Y-m-d H:i:s',time()),
        ]);
        return response()->json([
            'code' =>200,
            'data' =>[
                'verifi'=>$verifi,
                'base64' => $dateBase64,
            ]
        ]);
    }
    //验证图形验证码
    public function checkVerifi(Request $request){
        $verifi = $request->input('verifi');
        $openid = $request->header('openid');
        if(empty($verifi)){
            return response()->json([
                'code' =>0,
                'message' =>'验证码不能为空',
            ]);
        }
        if(empty($openid)){
            return response()->json([
                'code' =>0,
                'message' =>'用户openid不能为空',
            ]);
        }
//        $code = $request->session()->get('verifi');
        if($this->verifiModel->isExpire($openid) ==false){
            return response()->json([
                'code' =>0,
                'message' =>'验证码过期',
            ]);
        }
        if($this->verifiModel->checkVerifi($openid,$verifi)){
            return response()->json([
                'code' =>200,
                'data' => [
                    'verifi' =>$verifi,
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