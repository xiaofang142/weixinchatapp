<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/13 0013
 * Time: 下午 5:43
 */

namespace App\Http\Controllers\Admins;


use App\Http\Models\Requirement;
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


}