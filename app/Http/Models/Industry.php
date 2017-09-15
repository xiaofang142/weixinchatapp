<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/14 0014
 * Time: 下午 3:09
 */

namespace App\Http\Models;


use Illuminate\Support\Facades\DB;

class Industry
{
    //拿到industry 信息
    public function getIndustryList($type = 1){
        $industrys = DB::table('industrys')
            ->where(['type'=>$type,'deleted'=>0])
            ->get();
        return $industrys;
    }
    //得到全部分类
    public function getAllList(){
        $industrys = DB::table('industrys')
            ->where(['deleted'=>0])
            ->paginate(20);
        return $industrys;
    }
    //修改字段值
    public function saveUpdate($date,$id){
        $result = DB::table('industrys')->where(['id'=>$id])
            ->update($date);
        return $result;
    }
    //拿到一条数据
    public function getOneIndustry($id){
        $info = DB::table('industrys')->where(['id'=>$id])
            ->first();
        return $info;
    }
    //更具名字 和类型检测是否重复 现在的规则是 同名但是不同类型也是合法的
    public function checckName($name,$type){
        $result = DB::table('industrys')->where(['name'=>$name,'type'=>$type])
            ->first();
        if (empty($result)){
            return true;
        }else{
            return false;
        }
    }
}