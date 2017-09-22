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
use iscms\Alisms\SendsmsPusher as Sms;
class SendMessageController extends Controller
{
    public function __construct(Sms $sms)
    {
        $this->sms=$sms;
    }
    //发送短信  验证码
    public function alidayu(Request $request){
        $phone = $request->input('phone', '17748499189'); // 用户手机号，接收验证码
        $name = '肖weichatapp';  // 短信签名,可以在阿里大鱼的管理中心看到
        $num = rand(100000, 999999); // 生成随机验证码
        $smsParams = [
            'number' => "$num"
        ];
        $content = json_encode($smsParams); // 转换成json格式的
        $code = "SMS_98930018";   // 阿里大于(鱼)短信模板ID
        //$request->session()->put('alidayu', $num);  // 存入session 后面做数据验证

        $result = $this->sms->send($phone, $name, $content, $code);
//        echo "验证码：" . session('alidayu') . '<br/>';
        if (property_exists($request, 'result')) {
            // 使用PHP函数json_encode方法将给定数组转化为JSON：
            return response()->json(['ResultData' => '成功', 'info' => '已发送']);
        } else {
            return response()->json(['ResultData' => '失败', 'info' => '重复发送']);
        }
    }
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