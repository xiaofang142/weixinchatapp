<?php
/**
 * Created by PhpStorm.
 * User: xiaoh
 * Date: 2017/9/24
 * Time: 21:00
 */

namespace App\Http\Controllers\Apis;


use App\Http\Controllers\Controller;
use App\Http\Models\Code;
use Curder\LaravelAliyunSms\AliyunSms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class SendSmsController extends Controller
{
    public $codeMdel;
    public function __construct()
    {
        $this->codeMdel = new Code();
    }

    //发送短信 注意 此时是阿里云的短信服务   不是阿里大鱼短信
    public function sendAliyunSms(Request $request) {
        $mobile = $request->input('mobile');
        if(empty($mobile)){
            return response()->json([
                'code' =>0,
                'message' =>'电话不能为空',
            ]);
        }
        $code = $this->ceateCode();
        $params = [
            'code' =>$code,
        ];
        //$request->session()->put('code',$code);
        $smsService = App::make(AliyunSms::class);
        $tplId = config('aliyunsms.template_code');
        $result =  $smsService->send(strval($mobile),$tplId,$params);
        if($result->Code =='OK'){
            //将session 存入数据库
            $codeResult = $this->codeMdel->saveCode([
                'code' => $code,
                'mobile' =>$mobile,
                'created'=> date('Y-m-d H:i:s',time()),
            ]);
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
        $mobile = $request->input('mobile');

        if(empty($code)){
            return response()->json([
                'code' =>'0',
                'message' =>'短信验证码不能为空',
            ]);
        }
        if(empty($mobile)){
            return response()->json([
                'code' =>'0',
                'message' =>'电话号码不能为空',
            ]);
        }
        if ($this->codeMdel->isExpire($mobile) == false){
            return response()->json([
                'code' =>'0',
                'message' =>'短信验证码过期或已经验证过',
            ]);
        }
        if($this->codeMdel->checkCode($mobile,$code)){
            //删掉已成功数据   由表单提验证后在删除
//            $result = $this->codeMdel->deleteCode($mobile);
            return response()->json([
                'code' =>'200',
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
        $code = mt_rand(100000,999999);
        return $code;
    }

}