<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/12 0012
 * Time: 下午 5:45
 */

namespace App\Http\Controllers\Admins;


use App\Http\Models\Industry;
use App\Http\Models\Message;
use App\Http\Models\Requirement;
use App\Http\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends BaseController
{
    public function index(Request $request){
        //拿到相关的数据
        //拿到用户总数
        $user =(new User())->where(['deleted'=>0])->count('id');
        //需求总数
        $require =(new Requirement())->where(['deleted'=>0])->count('id');
        //分类总数
        $industry = (new Industry())->where(['deleted'=>0])->count('id');
        // 留言总数
        $message = (new Message())->where(['deleted'=>0])->count('id');
        return view('admin.index.index',['user'=>$user,'require'=>$require,'industry'=>$industry,'message'=>$message]);
    }


}