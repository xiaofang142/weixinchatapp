<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/25 0025
 * Time: 下午 4:03
 */

namespace App\Http\Models;


use Illuminate\Database\Eloquent\Model;

class Code extends Model
{
    public function getCode($mobile){
        $data = $this->where('mobile',$mobile)
            ->orderBy('created','desc')
            ->first();
        return $data;
    }
    public function saveCode($data){
        $result = $this->insertGetId($data);
        return $result;
    }
    public function isExpire($mobile){
        $data = $this->getCode($mobile);
        if(empty($data)){
            return false;
        }
        //计算两个时间差
        $startdate = $data->created;
        $enddate = date('Y-m-d H:i:s',time());
        $minute=floor((strtotime($enddate)-strtotime($startdate))%86400/60);
        if (abs($minute) <5){
            return true;
        }else{
            //删掉过期数据
            $id = $this->deleteCode($mobile);
            return false;
        }
    }
    public function checkCode($mobile,$code){
        $data = $this->getCode($mobile);
        if(empty($data)){
            return false;
        }
        if(strtolower($code) == strtolower($data->code)){
            return true;
        }else{
            return false;
        }
    }
    //当验证完成后 应该删除有关数据
    public function deleteCode($mobile){
        $result = $this->where(['mobile'=>$mobile])->delete();
        return $result;
    }


}