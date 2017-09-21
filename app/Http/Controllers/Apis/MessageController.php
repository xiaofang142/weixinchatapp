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
use App\Http\Models\Requirement;
use App\Http\Models\User;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public $messageModel;
    public function __construct()
    {
        $this->messageModel = new Message();
    }
    public function getMessagesList(Request $request){

        $id = $request->input('requirement_id');  //这里id表示需求id
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
                'data'=>$messages,
            ]);
        }
    }
    //留言
    public function create(Request $request){
        $openid = $request->header('openid');
        if (empty($openid)){
            return response()->json([
                'code'=>'0',
                'message'=>'openid 不能为空'
            ]);
        }
        $requirementId = $request->input('requirement_id');
        if (empty($requirementId)){
            return response()->json([
                'code'=>'0',
                'message'=>'requirement 不能为空'
            ]);
        }
        //
        $content = $request->input('content');
        $type = empty($request->input('type')) ? 1:$request->input('type');
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
        //检查  当日用户剩余留言次数  并返回 剩余留言条数
        $messages = $userModel->checkMessages($openid);
        //更具  剩余留言次数 做出相关提示
        if ($messages <1){
            return response()->json([
                'code'=>'0',
                'message'=>'当日留言条数已用完'
            ]);
        }
        //保存用户的合法  留言
        $result = $this->messageModel->addMessage([
            'user_id'=>$userInfo->id,
            'requirement_id'=>$requirementId,
            'content' =>$content,
            'created'=>date('Y-m-d H:i:s',time()),
            'type'=>$type,
            'status'=>1,
            'deleted'=>0,
        ]);
        // 减少  该用户的留言次数
        $userMessage =$userModel->setUpdate([
            'messages'=>($messages-1),
            'updated' => date('Y-m-d H:i:s',time()),
        ],$userInfo->id);
        //在需求表里面 增加留言数
        $requirementModel = new Requirement();
        $requirement = $requirementModel->getRequirementInfo($requirementId);
        $messagesNumber = $requirement->messages;
        $resultRequirement = $requirementModel->setUpdate([
            'messages'=>($messagesNumber + 1),
            'updated'=>date('Y-m-d H:i:s',time()),
        ],$requirementId);
        return response()->json([
            'code'=>'200',
            'data'=>['message_id'=>$result],
        ]);
    }
    //回复 回复是基于某条留言的  并且回复者应该是发布者所以回复是没有限制的
    public function reply(Request $request){
        $response = $request->input('response');
        if(empty($request)){
            return response()->json([
                'code'=>'0',
                'message'=>'回复内容不能为空'
            ]);
        }
        $messagesId = $request->input('message_id');
        if (empty($messagesId)){
            return response()->json([
                'code'=>'0',
                'message'=>'针对那条留言的回复的留言id不能为空'
            ]);
        }
        $recovery = date('Y-m-d H:i:s',time());
        //保存数据
        $result = $this->messageModel->saveUpdate([
            'response'=>$response,
            'recovery' =>$recovery,
            'status'=>2,
        ],$messagesId);
        return response()->json([
            'code'=>'200',
            'data'=>[
                'message_id'=>$messagesId,
            ]
        ]);
    }


}