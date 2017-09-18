<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/12 0012
 * Time: 下午 5:03
 */

namespace App\Http\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Admin extends Model
{
    public function findUser($name){
        $userinfo  =  $this->where('name',$name)->first();
        if(!empty($userinfo)){
            return $userinfo;
        }else{
            return false;
        }

    }

}