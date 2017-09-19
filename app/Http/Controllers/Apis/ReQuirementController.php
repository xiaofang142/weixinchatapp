<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/19 0019
 * Time: 上午 11:09
 */

namespace App\Http\Controllers\Apis;


use App\Http\Controllers\Controller;
use App\Http\Models\Requirement;
use App\Http\Models\User;
use Illuminate\Support\Facades\Request;

class RequirementController extends Controller
{
    public $requireModel;
    public $userModel;
    public function __construct()
    {
        $this->requireModel = new Requirement();
        $this->userModel = new User();
    }
    public function getRequirements(Request $request,$openid =null){
        if(empty($openid)){
            return response()->json([
                'code'=>'0',
                'message'=>'openid不能为空',
            ]);
        }
        //  检查是否是注册用户  显示不同的界面
        $userInfo = $this->userModel->getUserInfoByOpenid($openid);
        $industryid = $request->input('industryid');   //行业分类id
        $requirementid = $request->input('requirementid');  //需求分类id
        $order = $request->input('order');   //这里需要凭借原生sql
        $sql = "select * from ";
        if ($userInfo->status == 1){
            //注册用户   做分页
            if(!empty($industryid)){

            }
            $users = DB::select('select * from users where active = ?', [1]);


        }else{
            //非注册用户   值返回20条
            echo 2;
        }

    }
    //需求详情 信息
    public function detail(Request $request, $id = null){
        if (empty($id)){
            return response()->json([
                'code'=>'0',
                'message'=>'id不能为空',
            ]);
        }
        $info = $this->requireModel->getRequirementInfo($id);
        if (empty($info)){
            return response()->json([
                'code'=>'0',
                'message'=>'该需求不存在或者id错误',
            ]);
        }else{
            return response()->json([
                'code'=>'200',
                'date'=> $info,
            ]);
        }
    }



}