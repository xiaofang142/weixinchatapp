<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/13 0013
 * Time: 下午 5:55
 */

namespace App\Http\Controllers\Admins;


use App\Http\Models\Message;
use App\Http\Models\Requirement;
use App\Http\Models\User;
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
    //添加
    public function add(Request $request){
        if($request->isMethod('post')){
            $date['user_id'] = $request->input('user_id');
            $date['requirement_id'] = $request->input('requirement_id');
            $date['content'] = $request->input('content');
            $date['status'] = 1;
            $date['type'] = $request->input('type');
            if(!empty($request->input('response'))){
                $date['response'] = $request->input('response');
                $date['recovery'] = date('Y-m-d H:i:s',time());
                $date['status'] = 2;
            }
            $date['created'] = date('Y-m-d H:i:s',time());
            $date['deleted'] = 0;
            $result = $this->messageModel->addMessage($date);
            return redirect()->action("Admins\MessageController@index");

        }else{
            $users = (new User())->where([['deleted','=','0'],['status','=','1']])->get();
            $requirements = (new Requirement())->where([['deleted','=','0'],['status','=','2']])->get();
            return view('admin.message.add',['users'=>$users,'requirements'=>$requirements]);

        }
    }

}