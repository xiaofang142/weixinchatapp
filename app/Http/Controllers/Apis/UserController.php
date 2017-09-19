<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/19 0019
 * Time: 上午 10:18
 */

namespace App\Http\Controllers\Apis;


use App\Http\Controllers\Controller;
use App\Http\Models\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Request;

class UserController extends Controller
{
    public $userModel;
    public function __construct()
    {
       $this->userModel = new User();
    }
    //基于openid 拿到 用户信息 如果不存在则 新建
    public function getUserInfoByOpenid(Request $request ,$openid = null){
        if(empty($openid)){
            return response()->json([
                'code' => '0',
                'message' => 'openid不能为空',
            ]);
        }
        if($this->userModel->checkUserByOpenid($openid) ){
            //用户已经存在
            $userInfo = $this->userModel->getUserInfoByOpenid($openid);
            if(empty($userInfo)){
                return response()->json([
                    'code' => '0',
                    'message' => '用户信息不存在，请检查openid',
                ]);
            }else{
                return response()->json([
                    'code' => '200',
                    'date' => $userInfo,
                ]);
            }
        }else{
            //用户不存在  则保存用户信息
            $result = $this->userModel->saveUser(['openid'=> $openid]);
            $userInfo = $this->userModel->getUserInfoByOpenid($openid);
            return response()->json([
                'code' => '200',
                'date' => $userInfo,
            ]);
        }
    }
    //注册用户 本质就是提交完整的数据
    public function register(Request $request,$openid = null){
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
        $file = Input::file('avatar');
        if($file->isValid()){
            $path = $request->avatar->store('images');
            $url = Storage::url('app/'.$path);
            $date['avatar'] = $url;
        }
        $date['deleted'] = 0;  //默认有效
        $date['type'] = 1; //默认2 后台模拟
        $date['status'] = 1; //默认2 后台模拟
        $date['updated'] =date('Y-m-d H:i:s');
        $result = $this->userModel->setUpdate($date,$userInfo->id);
        return response()->json([
            'code' => '0',
            'date' => $result,
        ]);
    }
    //从逻辑上来讲  编辑和  注册功能基本一样
    public function edit(Request $request, $openid){
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
        $file = Input::file('avatar');
        if($file->isValid()){
            $path = $request->avatar->store('images');
            $url = Storage::url('app/'.$path);
            $date['avatar'] = $url;
        }
        $result = $this->userModel->setUpdate($date,$userInfo->id);
        return response()->json([
            'code' => '200',
            'date' => $result,
        ]);
    }

}