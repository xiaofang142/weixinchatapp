<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/19 0019
 * Time: 上午 11:02
 */

namespace App\Http\Controllers\Apis;


use App\Http\Controllers\Controller;
use App\Http\Models\Industry;
use Illuminate\Support\Facades\Request;

class IndustryController extends Controller
{
    public $industryModel;
    public function __construct()
    {
        $this->industryModel = new Industry();
    }

    public function getIndustry(Request $request,$type = null){
        if(empty($type)){
            return response()->json([
                'code' => '0',
                'message' =>'type 不能为空 1 行业  2 种类' ,
            ]);
        }
        $list = $this->industryModel->getIndustryList($type);
        return response()->json([
            'code' => '200',
            'date' =>$list ,
        ]);
    }

}