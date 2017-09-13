<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/13 0013
 * Time: 下午 6:03
 */

namespace App\Http\Controllers\Admins;


use Illuminate\Http\Request;

class IndustryController extends BaseController
{
    public function index(Request $request){
        return view('admin.industry.index');
    }

}