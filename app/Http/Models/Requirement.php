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
        $requirements = $this->where('requirements.deleted','=','0')
            ->orderBy('id','desc')
            ->leftJoin('industrys as i', 'requirements.industry_id', '=', 'i.id')
            ->leftJoin('industrys as ii', 'requirements.species_id', '=', 'ii.id')
            ->leftJoin('users','requirements.user_id','=','users.id')
            ->select('requirements.*', 'i.name as industry_name','users.nickname','ii.name as species_name','users.avatar')
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
            ->select('requirements.*', 'i.name as industry_name','ii.name as species_name','users.nickname','users.avatar','users.company_name')
            ->first();
        return $info;
    }
    public function getRequirementInfo($id){
        $info = $this->where('requirements.id',$id)
            ->leftJoin('industrys as i', 'requirements.industry_id', '=', 'i.id')
            ->leftJoin('industrys as ii', 'requirements.species_id', '=', 'ii.id')
            ->leftJoin('users', 'requirements.user_id', '=', 'users.id')
            ->select('requirements.*', 'i.name as industry_name','ii.name as species_name','users.nickname','users.avatar','users.company_name')
            ->first();
        return $info;
    }
    //基于搜索 拿到数据
    //$search,需求标题
    //$industry_name, 行业名
    //$species_name,种类名
    //$order 排序方式
    public function getSearchList($search,$industry_id,$species_id,$order){
//        $sql = "select * from table_requirements  ";
//        $list = DB::select($sql)->paginate(20);
        $where =array();
        $value =array();
        if(!empty($search)){
            $where[] =['requirements.title','like','%'.$search.'%'];
            $value[] = $search;
        }
        if(!empty($industry_id)){
            $where[] =['i.id','=',$industry_id];
            $value[] = $industry_id;
        }
        if(!empty($species_id)){
            $where[] =['ii.id','=',$species_id];
            $value[] = $species_id;
        }
        if(empty($order)){
            $order = 'clicks';
        }
        $list = $this->select('requirements.*','users.nickname','users.id as user_id','users.avatar')
            ->where($where,['q',2.6])
            //->where('id >= :id and age > :age',[':id'=>3,':age'=>5])
            ->orderBy($order, 'desc')
            ->leftJoin('industrys as i', 'requirements.industry_id', '=', 'i.id')
            ->leftJoin('industrys as ii', 'requirements.species_id', '=', 'ii.id')
            ->leftJoin('users','requirements.user_id','=','users.id')
//            ->paginate(20);
        ->toSql();
        return $list;
        //如果 $search  为空  则  不加入 【排序条件

    }
    //保存发布的需求的信息
    public function saveRequirement($date){
        $id = $this->insertGetId($date);
        return $id;
    }
    //获取用户已经发布过的信息
    public function getUserHavedRequirement($userId){
        $list = $this->where('requirements.user_id','=',$userId)
            ->where('requirements.deleted','=','0')
            ->orderBy('clicks', 'desc')
            ->leftJoin('industrys as i', 'requirements.industry_id', '=', 'i.id')
            ->leftJoin('users','requirements.user_id','=','users.id')
            ->select('requirements.*', 'i.name','users.nickname')
            ->get();
        return $list;
    }




}