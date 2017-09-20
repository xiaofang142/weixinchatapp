<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/14 0014
 * Time: 下午 5:18
 */

namespace App\Http\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Requirement extends Model
{
    /**
     * 表明模型是否应该被打上时间戳
     *
     * @var bool
     */
    public $timestamps = false;
    //拿到首页列表页数据
    public function getList(){
        $requirements = $this->where(['deleted'=>0])
            ->orderBy('id','desc')
            ->paginate(20);
        return $requirements;
    }
    //审核功能  修改字段
    public function setUpdate($date,$id){
        $result = $this->where(['id'=>$id])->update($date);
        return $result;
    }
    //拿到详情
    public function getUserInfo($id){
        $info = $this->where('requirements.id',$id)
            ->leftJoin('industrys as i', 'requirements.industry_id', '=', 'i.id')
            ->leftJoin('industrys as ii', 'requirements.species_id', '=', 'ii.id')
            ->leftJoin('users', 'requirements.user_id', '=', 'users.id')
            ->select('requirements.*', 'i.name as industry_name','ii.name as species_name','users.nickname')
            ->first();
        return $info;
    }
    public function getRequirementInfo($id){
        $info = $this->where('requirements.id',$id)
            ->leftJoin('industrys as i', 'requirements.industry_id', '=', 'i.id')
            ->leftJoin('industrys as ii', 'requirements.species_id', '=', 'ii.id')
            ->leftJoin('users', 'requirements.user_id', '=', 'users.id')
            ->select('requirements.*', 'i.name as industry_name','ii.name as species_name','users.nickname')
            ->first();
        return $info;
    }
    //基于搜索 拿到数据
    public function getSearchList($search,$type=1,$order ='clicks'){
        //如果 $search  为空  则  不加入 【排序条件
        if(empty($search)){
            //非搜索  列表
            $list = $this->where('i.deleted','=','0')
                ->orderBy('clicks', 'desc')
                ->leftJoin('industrys as i', 'requirements.industry_id', '=', 'i.id')
                ->select('requirements.*', 'i.name')
                ->paginate(20);
        }else{
            //搜索列表
            $list = $this->where('i.name', 'like','%'.$search.'%')
                ->where('i.type','=','1')
                ->where('i.deleted','=','0')
                ->orderBy($order, 'desc')
                ->leftJoin('industrys as i', 'requirements.industry_id', '=', 'i.id')
                ->select('requirements.*', 'i.name')
                ->paginate(20);
        }
        return $list;
    }




}