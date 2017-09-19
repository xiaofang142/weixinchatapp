<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/19 0019
 * Time: 上午 11:12
 */

namespace App\Http\Controllers\Apis;


use App\Http\Controllers\Controller;
use App\Http\Models\Message;
use App\Http\Models\User;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public $messageModel;
    public function __construct()
    {
        $this->messageModel = new Message();
    }
    public function getMessagesList(Request $request,$id = null){
        if(empty($id)){
            return response()->json([
                'code'=>'0',
                'message'=>'需求id不能为空 ',
            ]);
        }
        $messages = $this->messageModel->getMessageListByRequirement($id);
        if (empty($messages)){
            return response()->json([
                'code'=>'0',
                'message'=>'该需求暂时没有留言，请更换需求id',
            ]);
        }else{
            return response()->json([
                'code'=>'0',
                'date'=>$messages,
            ]);
        }
    }
    //留言
    public function create(Request $request){
        $openid = $request->input('openid');
        if (empty($openid)){
            return response()->json([
                'code'=>'0',
                'message'=>'openid 不能为空'
            ]);
        }
        $requirementId = $request->input('requirementid');
        if (empty($requirementId)){
            return response()->json([
                'code'=>'0',
                'message'=>'requirement 不能为空'
            ]);
        }
        //
        $content = $request->input('content');
        if (empty($content)){
            return response()->json([
                'code'=>'0',
                'message'=>'content 不能为空'
            ]);
        }
        //检测用户    1 判断用户是否是注册用户
        $userModel = new User();
        $userInfo = $userModel->getUserInfoByOpenid($openid);
        if($userInfo->status != 1){
            return response()->json([
                'code'=>'0',
                'message'=>'该用户未注册'
            ]);
        }
        //检查  当日用户剩余留言次数  并返回 数据
        $newUserInfo = $userModel->checkMessages($openid);
        //更具  剩余留言次数 做出相关提示




    }

}