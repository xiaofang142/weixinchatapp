<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/13 0013
 * Time: 下午 5:55
 */

namespace App\Http\Controllers\Admins;


use App\Http\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MessageController extends BaseController
{
    public $messageModel;
    public function __construct(Request $request)
    {
        parent::__construct($request);
        $this->messageModel = new Message();
    }

    //首页列表页
    public function index(Request $request){
        $messageModel = $this->messageModel;
        $messages = $messageModel->getMessageList();
        return view('admin.message.index',['messages'=>$messages]);
    }
    //删除功能
    public function delete(Request $request,$id = null){
        $messageModel = $this->messageModel;
        $result = $messageModel->saveUpdate(['deleted'=>1],$id);
        return back();
    }
    //详情
    public function detail(Request $request,$id=null){
        $messageModel = $this->messageModel;
        $info = $messageModel->getMessageInfoByid($id);
        return view('admin.message.detail',['info'=>$info]);
    }

}