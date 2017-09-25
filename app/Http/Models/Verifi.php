<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/25 0025
 * Time: 下午 4:56
 */

namespace App\Http\Models;


use Illuminate\Database\Eloquent\Model;

class Verifi extends Model
{
    public function getVerifi($openid){
        $data = $this->where('openid',$openid)
            ->orderBy('created','desc')
            ->first();
        return $data;
    }
    public function saveVerifi($data){
        $result = $this->insertGetId($data);
        return $result;
    }
    public function isExpire($openid){
        $data = $this->getVerifi($openid);
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
            $id = $this->deleteVerifi($openid);
            return false;
        }
    }

    public function deleteVerifi($openid){
        $result = $this->where(['openid'=>$openid])->delete();
        return $result;
    }
    public function checkVerifi($openid,$verifi){
        $date = $this->getVerifi($openid);
        if (empty($date)){
            return false;
        }
        if(strtolower($verifi) == strtolower($date->verifi)){
            //图形验证码没有其他作用
            $id = $this->deleteVerifi($openid);
            return true;
        }else{
            return false;
        }
    }

}