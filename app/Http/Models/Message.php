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
    public function  getMessageList(){
        $messages = DB::table('messages')->where('messages.deleted','0')
            ->leftJoin('users', 'messages.user_id', '=', 'users.id')
            ->leftJoin('requirements', 'messages.requirement_id', '=', 'requirements.id')
            ->select('messages.*','users.nickname','requirements.title')
            ->paginate(20);
        return $messages;
    }
    //跟新 字段
    public function saveUpdate($date,$id){
        $result = DB::table('messages')->where(['id'=>$id])
            ->update($date);
        return $result;
    }
    //拿到留言详细信息
    public function getMessageInfoByid($id){
        $info = DB::table('messages')->where('messages.id',$id)
            ->leftJoin('users', 'messages.user_id', '=', 'users.id')
            ->leftJoin('requirements', 'messages.requirement_id', '=', 'requirements.id')
            ->select('messages.*','users.nickname','requirements.title')
            ->first();
        return $info;
    }
}