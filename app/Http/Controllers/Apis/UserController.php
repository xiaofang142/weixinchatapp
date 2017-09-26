<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/19 0019
 * Time: 上午 10:18
 */

namespace App\Http\Controllers\Apis;


use App\Http\Controllers\Controller;
use App\Http\Models\Code;
use App\Http\Models\Requirement;
use App\Http\Models\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public $userModel;
    public function __construct()
    {
       $this->userModel = new User();
    }
    //基于openid 拿到 用户信息 如果不存在则 新建
    public function getUserInfoByOpenid(Request $request){
        //两种情况 ，当有user_id 进来时 如果user_id 与openid 对应的不是同一组数据则表示  当前用户查看其它用户的数据
        $openid = $request->header('openid');

        if(empty($openid)){
            return response()->json([
                'code' => '0',
                'message' => 'openid不能为空',
            ]);
        }
        if(!empty($request->input('user_id'))){
            $userId = $request->input('user_id');
        }
        if($this->userModel->checkUserByOpenid($openid) ){
            //用户已经存在
            $userInfo = $this->userModel->getUserInfoByOpenid($openid);
            //两种情况 ，当有user_id 进来时 如果user_id 与openid 对应的不是同一组数据则表示  当前用户查看其它用户的数据
            if (!empty($userId) && $userInfo->id != $userId){
                //返回其他用户信息
               return  $this->getOtherUserInfo($openid,$userId);
            }
            if(empty($userInfo)){
                return response()->json([
                    'code' => '0',
                    'message' => '用户信息不存在，请检查openid',
                ]);
            }else{
                //此时表示在个人信息页面   同时需要拿到  该用户已经发布过的
                $userInfo['requirements'] =$this->getUserHavdRequirement($userInfo->id);
                return response()->json([
                    'code' => '200',
                    'data' => $userInfo,
                ]);
            }
        }else{
            //用户不存在  则保存用户信息
            $result = $this->userModel->saveUser([
                'openid'=> $openid,
                'updated' =>date('Y-m-d H:i:s'),
                'messages'=>10,
                'checks'=>5,
                'deleted'=>'0',
                'type'=>1,
                'created'=>date("Y-m-d H:i:s"),
                'status'=>'0',
            ]);
            $userInfo = $this->userModel->getUserInfoByOpenid($openid);
            $userInfo['requirements'] =$this->getUserHavdRequirement($userInfo->id);
            return response()->json([
                'code' => '200',
                'data' => $userInfo,
            ]);
        }
    }
    //注册用户 本质就是提交完整的数据
    public function register(Request $request){
        $openid = $request->header('openid');
        if(empty($openid)){
            return response()->json([
                'code' => '0',
                'message' => 'openid不能为空',
            ]);
        }
        $userInfo = $this->userModel->getUserInfoByOpenid($openid);
        //接收其他信息
        $date  = $request->input();
        //处理图片
//        $file = Input::file('avatar');
//        if($file->isValid()){
//            $path = $request->avatar->store('images');
//            $url = Storage::url('app/'.$path);
//            $date['avatar'] = $url;
//        }
        $date['deleted'] = 0;  //默认有效
        $date['type'] = 1; //默认2 后台模拟
        $date['status'] = 1; //默认2 后台模拟
        $date['updated'] =date('Y-m-d H:i:s');
        $result = $this->userModel->setUpdate($date,$userInfo->id);
        return response()->json([
            'code' => '0',
            'data' => ['user_id'=>$userInfo->id],
        ]);
    }
    //从逻辑上来讲  编辑和  注册功能基本一样
    public function edit(Request $request){
        $openid = $request->header('openid');
        if(empty($openid)){
            return response()->json([
                'code' => '0',
                'message' => 'openid不能为空',
            ]);
        }
        $mobile = $request->input('mobile');
        if(empty($mobile)){
            return response()->json([
                'code' => '0',
                'message' => '电话号不能为空',
            ]);
        }
        $result = $this->userModel->is_mobile($mobile);
        if($result == false){
            return response()->json([
                'code' => '0',
                'message' => '电话号码格式错误',
            ]);
        }
        $code = $request->input('code');
        if(empty($code)){
            return response()->json([
                'code' => '0',
                'message' => '验证码不能为空请输入验证码',
            ]);
        }
        $codeResult = $this->checkMobile($mobile,$code);
        if($codeResult == false){
            return response()->json([
                'code' => '0',
                'message' => '验证码错误',
            ]);
        }
        $userInfo = $this->userModel->getUserInfoByOpenid($openid);
        //接收其他信息
        $date  = $request->input();
        unset($date['code']);
        $result = $this->userModel->setUpdate($date,$userInfo->id);
        return response()->json([
            'code' => '200',
            'data' => ['user_id'=>$userInfo->id],
        ]);
    }
    //当前用户查看用户的信息
    public function getOtherUserInfo($openid, $userId){
//        $openid = $request->header('openid');
        if(empty($openid)){
            return response()->json([
                'code' => '0',
                'message' => 'openid不能为空',
            ]);
        }
//        $userId = $request->input('user_id');
        if (empty($userId)){
            return response()->json([
                'code' => '0',
                'message' => 'user_id不能为空',
            ]);
        }
        // 检查该用户是否注册
        $userInfo = $this->userModel->getUserInfoByOpenid($openid);
        if($userInfo->status != 1){
            return response()->json([
                'code'=>'0',
                'message'=>'该用户未注册'
            ]);
        }
        //检查 剩余查看数  并返回剩余查看数
        $checks = $this->userModel->checkChecks($openid);
        if($checks <1){
            return response()->json([
                'code'=>'0',
                'message'=>'当日查看用户信息已经用完'
            ]);
        }
        //拿到用户信息 并返回
        $date = $this->userModel->getUserInfoById($userId);
        //减少当前用户 查看别人信息的条数
        $checkResult = $this->userModel->setUpdate([
            'checks'=>($checks-1),
            'updated'=>date('Y-m-d H:i:s',time()),
        ],$userInfo->id);
        return response()->json([
            'code'=>'200',
            'data'=>$date,
        ]);
    }
    //获取用户已经发布过的信息
    public function getUserHavdRequirement($userId){
        $list = (new Requirement())->getUserHavedRequirement($userId);
        return $list;
    }
    //验证电话号码
    public function checkMobile($mobile,$code){
        $result = (new Code())->checkCode($mobile,$code);
        //如果验证正确  删除当前数据
        if($result == true){
            $resultId = (new Code())->deleteCode($mobile);
        }
        return $result;
    }


}