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
        return parent::__construct($request);
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
            //处理图片  处于路径考虑   只能在这里强写 不能调用
            $file = $request->file('avatar');
            if($file->isValid()){
                $originalName = $file->getClientOriginalName(); // 文件原名
                $ext = $file->getClientOriginalExtension();     // 扩展名
                $realPath = $file->getRealPath();   //临时文件的绝对路径
                $type = $file->getClientMimeType();     // image/jpeg
                // 上传文件
                $filename = date('Y-m-d-H-i-s') . '-' . uniqid() . '.' . $ext;
                // 使用我们新建的uploads本地存储空间（目录）
                $bool = Storage::disk('uploads')->put($filename, file_get_contents($realPath));

                $rootUrl = $request->getBasePath();
                //$url = Storage::url($filename);
//                if($rootUrl =='\\' || $rootUrl == '/' || $rootUrl =='\\\\' || $rootUrl == '//'){
//                    $rootUrl =null;
//                }
                //  $url = $rootUrl.$url;
                $host = \Illuminate\Support\Facades\Request::server('HTTP_HOST');
                $url = "http://".$host.''.$rootUrl.'/uploads/'.$filename;
//            var_dump($url);
//            $path = $request->avatar->store('images');
                //$url = Storage::url('app/'.$path);
            }
            $date['avatar'] = $url;
            $date['deleted'] = 0;  //默认有效
            $date['type'] = 2; //默认2 后台模拟
            $date['openid'] =time();
            $date['created']=date("Y-m-d H:i:s",time());
            unset($date['_token']);

            $id = (new User())->saveUser($date);
            return redirect()->action('Admins\UserController@index');

        }else{
            $industrysModel = new Industry();
            $industrys =$industrysModel->getIndustryList(1);
            return view('admin.user.add',['industrys'=>$industrys]);
        }
    }
    //存储图片
    public function saveImage($file){
        if($file->isValid()){
            $originalName = $file->getClientOriginalName(); // 文件原名
            $ext = $file->getClientOriginalExtension();     // 扩展名
            $realPath = $file->getRealPath();   //临时文件的绝对路径
            $type = $file->getClientMimeType();     // image/jpeg
            // 上传文件
            $filename = date('Y-m-d-H-i-s') . '-' . uniqid() . '.' . $ext;
            // 使用我们新建的uploads本地存储空间（目录）
            $bool = Storage::disk('uploads')->put($filename, file_get_contents($realPath));

            $rootUrl = (new Request())->getBasePath();
            //$url = Storage::url($filename);
//                if($rootUrl =='\\' || $rootUrl == '/' || $rootUrl =='\\\\' || $rootUrl == '//'){
//                    $rootUrl =null;
//                }
            //  $url = $rootUrl.$url;
            $host = \Illuminate\Support\Facades\Request::server('HTTP_HOST');
            $url = "http://".$host.''.$rootUrl.'/uploads/'.$filename;
            return $url;
//            var_dump($url);
//            $path = $request->avatar->store('images');
            //$url = Storage::url('app/'.$path);
        }else{
            return null;
        }
    }

}