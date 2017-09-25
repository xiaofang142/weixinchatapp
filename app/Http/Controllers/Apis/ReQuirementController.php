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
use Illuminate\Http\Request;

class RequirementController extends Controller
{
    public $requireModel;
    public $userModel;
    public function __construct()
    {
        $this->requireModel = new Requirement();
        $this->userModel = new User();
    }
    public function getRequirements(Request $request){
        $openid = $request->header('openid');
        if(empty($openid)){
            return response()->json([
                'code'=>'0',
                'message'=>'openid不能为空',
            ]);
        }
        //    由前台控制显示数据条数 这里只负责提供数据
        $userInfo = $this->userModel->getUserInfoByOpenid($openid);
        $search = $request->input('search',null);  //搜索内容
        $industry_id = $request->input('industry_id',null);//行业名
        $species_id =$request->input('species_id',null); //种类名
        $order = $request->input('order','clicks');   //   留言数   点击数  时间   均倒叙
        //如果  $serach  为空表示  正常下来列表   查询全部  倒叙排序
         $list = $this->requireModel->getSearchList($search,$industry_id,$species_id,$order);
         return response()->json([
             'code'=>200,
             'data'=>$list,
         ]);
    }
    //需求详情 信息
    public function detail(Request $request){
        $id = $request->input('requirement_id');
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
            //增加点击数
            $result = $this->addClicks($id);
            return response()->json([
                'code'=>'200',
                'data'=> $info,
            ]);
        }
    }
    //用户点击需求时增加该点击数
    public function addClicks($requirementId){
        if(!empty($requirementId)){
            $requirement = $this->requireModel->getRequirementInfo($requirementId);
            $clicks = $requirement->clicks;
            $result = $this->requireModel->setUpdate([
                'clicks'=>($clicks +1),
            ],$requirementId);
            return $result;
        }
    }
    //发布需求
    public function create(Request $request){
        $openid = $request->header('openid');
        if(empty($openid)){
            return response()->json([
                'code'=>'0',
                'message'=>'openid不能为空',
            ]);
        }
        $userInfo =(new User())->getUserInfoByOpenid($openid);
        if(empty($userInfo)){
            return response()->json([
                'code'=>'0',
                'message'=>'openid无效',
            ]);
        }
        $date['type'] = 1;
        $date['industry_id'] = $request->input('industry_id');
        if(empty($date['industry_id'] )){
            return response()->json([
                'code'=>'0',
                'message'=>'行业分类不能为空',
            ]);
        }
        $date['species_id'] = $request->input('species_id');
        if(empty($date['species_id'])){
            return response()->json([
                'code'=>'0',
                'message'=>'种类分类不能为空',
            ]);
        }
        $date['title'] = $request->input('title');
        if(empty($date['title'])){
            return response()->json([
                'code'=>'0',
                'message'=>'title不能为空',
            ]);
        }
        $date['content'] = $request->input('content');
        if(empty($date['content'])){
            return response()->json([
                'code'=>'0',
                'message'=>'内容不能为空',
            ]);
        }
        $date['created'] =date('Y-m-d H:i:s',time());
        $date['user_id'] = $userInfo->id;
        $date['clicks'] =0;
        $date['messages'] =0;
        $date['status'] =1;
        $date['deleted'] =0;
        $requirementId = $this->requireModel->saveRequirement($date);
        return response()->json([
            'code'=>200,
            'data'=>[
                'requirement_id'=>$requirementId,
            ]
        ]);
    }



}