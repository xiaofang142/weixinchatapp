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

}