<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/14 0014
 * Time: 下午 5:18
 */

namespace App\Http\Models;


use Illuminate\Support\Facades\DB;

class Requirement
{
    //拿到首页列表页数据
    public function getList(){
        $requirements = DB::table('requirements')->where(['deleted'=>0])->paginate(20);
        return $requirements;
    }
    //审核功能  修改字段
    public function setUpdate($date,$id){
        $result = DB::table('requirements')->where(['id'=>$id])->update($date);
        return $result;
    }
    //拿到详情
    public function getUserInfo($id){
        $info = DB::table('requirements')->where('requirements.id',$id)
            ->leftJoin('industrys as i', 'requirements.industry_id', '=', 'i.id')
            ->leftJoin('industrys as ii', 'requirements.species_id', '=', 'ii.id')
            ->leftJoin('users', 'requirements.user_id', '=', 'users.id')
            ->select('requirements.*', 'i.name as industry_name','ii.name as species_name','users.nickname')
            ->first();
        return $info;
    }



}