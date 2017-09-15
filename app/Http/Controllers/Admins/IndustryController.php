<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/13 0013
 * Time: 下午 6:03
 */

namespace App\Http\Controllers\Admins;


use App\Http\Models\Industry;
use Illuminate\Http\Request;

class IndustryController extends BaseController
{
    public $industryModel;
    public function __construct(Request $request)
    {
        parent::__construct($request);
        $this->industryModel = new Industry();
    }

    //首页  列表页  展示
    public function index(Request $request){
        $industryModel = $this->industryModel;
        $industrys = $industryModel->getAllList();
        return view('admin.industry.index',['industrys'=>$industrys]);
    }
    //删除
    public function delete(Request $request,$id){
        $industryModel = $this->industryModel;
        $result = $industryModel->saveUpdate(['deleted'=>1],$id);
        return back();
    }
    //修改
    public function update(Request $request,$id = null){
        $industryModel = $this->industryModel;
        if ($request->isMethod('post')){
            $date['name'] = $request->input('name');
            $date['type'] = $request->input('type');
            $id = $request->input('id');
            $result = $industryModel->saveUpdate($date,$id);
            return redirect()->action('Admins\IndustryController@index');
        }else{
            $info = $industryModel->getOneIndustry($id);
            return view('admin.industry.update',['info'=>$info]);
        }
    }
    //检测名字是否重复
    public function checkName(Request $request){
        $name = $request->input('name');
        $type = $request->input('type');
        $industryModel = $this->industryModel;
        $result = $industryModel->checckName($name,$type);
        if ($result === true){
            echo 1;
        }else{
            echo -1;
        }
    }

}