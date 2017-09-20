<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/15 0015
 * Time: 上午 10:01
 */

namespace App\Http\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Message extends Model
{
    /**
     * 表明模型是否应该被打上时间戳
     *
     * @var bool
     */
    public $timestamps = false;

    public function  getMessageList(){
        $messages = $this->where('messages.deleted','0')
            ->leftJoin('users', 'messages.user_id', '=', 'users.id')
            ->leftJoin('requirements', 'messages.requirement_id', '=', 'requirements.id')
            ->select('messages.*','users.nickname','requirements.title')
            ->orderBy('id','desc')
            ->paginate(20);
        return $messages;
    }
    //更具需求id 拿到全部相关  留言
    public function getMessageListByRequirement($id){
        $messages = $this->where('messages.requirement_id',$id)
            ->leftJoin('users', 'messages.user_id', '=', 'users.id')
            ->leftJoin('requirements', 'messages.requirement_id', '=', 'requirements.id')
            ->select('messages.*','users.nickname','requirements.title')
            ->paginate(20);
        return $messages;

    }
    //跟新 字段
    public function saveUpdate($date,$id){
        $result = $this->where(['id'=>$id])
            ->update($date);
        return $result;
    }
    //拿到留言详细信息
    public function getMessageInfoByid($id){
        $info = $this->where('messages.id',$id)
            ->leftJoin('users', 'messages.user_id', '=', 'users.id')
            ->leftJoin('requirements', 'messages.requirement_id', '=', 'requirements.id')
            ->select('messages.*','users.nickname','requirements.title')
            ->first();
        return $info;
    }
    // 新增留言
    public function addMessage($date){
        $id = $this->insertGetId($date);
        return $id;
    }
}