<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/13 0013
 * Time: 下午 5:43
 */

namespace App\Http\Controllers\Admins;


use App\Http\Models\Industry;
use App\Http\Models\Requirement;
use App\Http\Models\User;
use Illuminate\Http\Request;

class RequirementController extends BaseController
{
    public $requireModel;
    public function __construct(Request $request)
    {
        parent::__construct($request);
        $this->requireModel = new Requirement();
    }
    //首页
    public function index(Request $request){
        $requireModel = $this->requireModel;
        $requirements = $requireModel->getList();
        return view('admin.requirement.index',['requirements'=>$requirements]);
    }
    //审核
    public function audit(Request $request,$id = null){
        $requirement = $this->requireModel;
        $result = $requirement->setUpdate(['status'=>2],$id);
        return back();
    }
    //删除
    public function delete(Request $request,$id = null){
        $requirement = $this->requireModel;
        $result =  $requirement->setUpdate(['deleted'=>1],$id);
        return back();
    }
    //详情
    public function detail(Request $request,$id = null){
        $requirement = $this->requireModel;
        $info = $requirement->getUserInfo($id);
        return view('admin.requirement.detail',['info'=>$info]);
    }
    //添加
    public function add(Request $request){
        if($request->isMethod('post')){
            $date['industry_id'] =$request->input('industry_id');
            $date['species_id'] =$request->input('species_id');
            $date['title'] = $request->input('title');
            $date['content'] = $request->input('content');
            $date['type'] =2;
            $date['created'] = date('Y-m-d H:i:s',time());
            $date['clicks'] =0;
            $date['messages'] = 0;
            $date['updated'] = date('Y-m-d H:i:s',time());
            $date['status'] = 2;
            $date['deleted'] =0;
            $date['user_id'] =$request->input('user_id');
            $result = $this->requireModel->saveRequirement($date);
            return redirect()->action("Admins\RequirementController@index");
        }else{
            $industrys = (new Industry())->where([['deleted','=','0'],['type','=','1']])->get();
            $species = (new Industry())->where([['deleted','=','0'],['type','=','2']])->get();
            $users = (new User())->where([['deleted','=','0'],['status','=','1']])->get();
            return view('admin.requirement.add',['industrys'=>$industrys,'species'=>$species,'users'=>$users]);
        }
    }


}