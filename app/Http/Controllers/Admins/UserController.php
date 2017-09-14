<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/13 0013
 * Time: 下午 3:51
 */

namespace App\Http\Controllers\Admins;


use App\Http\Models\Industry;
use App\Http\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

class UserController extends BaseController
{
    public $userMdel;
    public function __construct(Request $request)
    {
        parent::__construct($request);
        $this->userMdel = new User();
    }

    public function index(Request $request){
        $userModel = new User();
        $users = $userModel->getList();
        return view('admin.user.index',['users'=>$users]);
    }
    public function detail(Request $request,$id=null){
        $userModel = $this->userMdel;
        $info = $userModel->getUserInfo($id);
        return view('admin.user.detail',['info'=>$info]);
    }
    public function update(Request $request,$id){

    }
    public function delete(Request $request,$id = null){
        $userModel = $this->userMdel;
        $result = $userModel->setUpdate(['deleted'=>1],$id);
        return back();
    }
    //注册
    public function  register(Request $request, $id= null){
        $userModel = $this->userMdel;
        $result = $userModel->setUpdate(['status'=>1],$id);
        return back();
    }
    //不公开
    public function unpublic(Request $request,$id = null){
        $userModel = $this->userMdel;
        $result = $userModel->setUpdate(['public'=>0],$id);
        return back();
    }
    //公开
    public function setPublic(Request $request,$id = null){
        $userModel = $this->userMdel;
        $result = $userModel->setUpdate(['public'=>1],$id);
        return back();
    }
    //添加用户
    public function add(Request $request){
        $userModel = $this->userMdel;
        if($request->isMethod('post')){
            $date  = $request->input();
            //处理图片
            $file = Input::file('avatar');
            if($file->isValid()){
                $path = $request->avatar->store('images');
                $url = Storage::url('app/'.$path);
            }
            $date['avatar'] = $url;
            $date['deleted'] = 0;  //默认有效
            $date['type'] = 2; //默认2 后台模拟
            unset($date['_token']);
            //
            $id = $userModel->saveUser($date);
            return redirect()->action('Admins\UserController@index');

        }else{
            $industrysModel = new Industry();
            $industrys =$industrysModel->getIndustryList(1);
            return view('admin.user.add',['industrys'=>$industrys]);
        }
    }

}