<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/14 0014
 * Time: 下午 3:09
 */

namespace App\Http\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Industry extends Model
{
    /**
     * 关联到模型的数据表
     *
     * @var string
     */
    protected $table = 'industrys';
    /**
     * 表明模型是否应该被打上时间戳
     *
     * @var bool
     */
    public $timestamps = false;

    //拿到industry 信息
    public function getIndustryList($type = 1){
        $industrys = $this
            ->where(['type'=>$type,'deleted'=>0])
            ->orderBy('id','desc')
            ->get();
        return $industrys;
    }
    //得到全部分类
    public function getAllList(){
        $industrys = $this
            ->where(['deleted'=>0])
            ->orderBy('id','desc')
            ->paginate(20);
        return $industrys;
    }
    //修改字段值
    public function saveUpdate($date,$id){
        $result =$this->where(['id'=>$id])
            ->update($date);
        return $result;
    }
    //拿到一条数据
    public function getOneIndustry($id){
        $info = $this->where(['id'=>$id])
            ->first();
        return $info;
    }
    //更具名字 和类型检测是否重复 现在的规则是 同名但是不同类型也是合法的
    public function checckName($name,$type){
        $result = $this->where(['name'=>$name,'type'=>$type])
            ->first();
        if (empty($result)){
            return true;
        }else{
            return false;
        }
    }
}