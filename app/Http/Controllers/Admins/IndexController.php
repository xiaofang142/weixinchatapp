<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/12 0012
 * Time: 下午 5:45
 */

namespace App\Http\Controllers\Admins;


use Illuminate\Http\Request;

class IndexController extends BaseController
{
    public function index(Request $request){
        return view('admin.index.index');
    }


}