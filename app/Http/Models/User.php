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

}