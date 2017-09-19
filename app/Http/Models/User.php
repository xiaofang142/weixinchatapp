<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/14 0014
 * Time: 上午 9:45
 */

namespace App\Http\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class User extends Model
{
    /**
     * 表明模型是否应该被打上时间戳
     *
     * @var bool
     */
    public $timestamps = false;
    //拿到首页列表页数据
    public function getList(){
        $list = $this->where(['deleted'=>0])->paginate(20);
        return $list;
    }
    //删除功能   修改delete  状态
    public function setUpdate($date,$id){
        $result = $this->where(['id'=>$id])->update($date);
    }
    //拿到用户全部信息
    public function getUserInfo($id){
        $info = $this->where('users.id',$id)
            ->leftJoin('industrys', 'users.industry_id', '=', 'industrys.id')
            ->select('users.*', 'industrys.name')
            ->first();
        return $info;
    }
    //保存用户信息
    public function saveUser($date){
        $id = $this->insertGetId($date);
        return $id;
    }
    //基于openid 检查用户是否存在
    public function checkUserByOpenid($openid = null){
        $userInfo = $this->where('openid',$openid)
            ->first();
        if (empty($userInfo)){
            return false;
        }else{
            return true;
        }
    }
    //基于openid 拿到用户全部信息
    public function getUserInfoByOpenid($openid){
        $userInfo = $this->where('openid',$openid)
            ->first();
        return $userInfo;
    }
    //检查用户当日剩余留言次数
    // 思路是  判断  更新时间
    //  如果更新时间 在零点之前 表示第一次留言  此时修改剩余留言次数
    //  如果更新时间在今日之类  则按照剩余留言数安排
    // 换言之 如果两个时间在同一天则按照messages字段 规定 剩余留言数  否则 更新留言数
    public function checkMessages($openid){
        $userInfo = $this->getUserInfoByOpenid($openid);
        $updated = $this->dealTime($userInfo->updated);
        $nowed = $this->dealTime(date('Y-m-d H:i:s',time()));
        if ( $this->isDiffDays($updated,$nowed)){
            //同一天啥也不做
        }else{
            //不在同一天 修改剩余数量 并更新时间
            $result = $this->setUpdate(['messages'=>10,'updated'=>date('Y-m-d H:i:s',time())],$userInfo->id);
        }
        $newUserInfo =$this->getUserInfoByOpenid($openid);
        $messages = $newUserInfo->messages;
        return $messages;
    }

    //判断两天是否是同一天
    function isDiffDays($last_date,$this_date){
        if(($last_date['year']===$this_date['year'])&&($this_date['yday']===$last_date['yday'])){
            return true;
        }else{
            return false;
        }
    }
    //将时间处理
    public function dealTime($time){
        $date = getdate(strtotime($time));
        return $date;
    }




}