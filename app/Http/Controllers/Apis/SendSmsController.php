<?php
/**
 * Created by PhpStorm.
 * User: xiaoh
 * Date: 2017/9/24
 * Time: 21:00
 */

namespace App\Http\Controllers\Apis;


use App\Http\Controllers\Controller;
use Curder\LaravelAliyunSms\AliyunSms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class SendSmsController extends Controller
{
    //发送短信 注意 此时是阿里云的短信服务   不是阿里大鱼短信
    public function sendAliyunSms(Request $request) {
        $mobile = $request->input('mobile');
        $code = $this->ceateCode();
        $params = [
            'code' =>$code,
        ];
        session(['code'=>$code]);
        $smsService = App::make(AliyunSms::class);
        $tplId = config('aliyunsms.template_code');
        $result =  $smsService->send(strval('17748499189'),$tplId,$params);
        if($result->Code =='OK'){
            return response()->json([
                'code'=>'200',
                'data' =>[
                    'code'=>$code,
                ]
            ]);
        }else{
            return response()->json([
                'code'=>'0',
                'message' =>$result->Message,
            ]);
        }
    }
    // 验证短信验证码
    public function checkSms(Request $request){
        $code = $request->input('code');
        if(empty($code)){
            return response()->json([
                'code' =>'0',
                'message' =>'短信验证码不能为空',
            ]);
        }
        if(strtolower($code) == strtolower(session('code'))){
            return response()->json([
                'code' =>'0',
                'data' =>[
                    'code' =>$code,
                ]
            ]);
        }else{
            return response()->json([
                'code' =>'0',
                'message' =>'短信验证码错误',
            ]);
        }

    }

    protected function ceateCode(){
        $code = mt_rand(1000,9999);
        return $code;
    }

}