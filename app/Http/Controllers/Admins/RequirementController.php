<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/13 0013
 * Time: 下午 5:43
 */

namespace App\Http\Controllers\Admins;


use Illuminate\Http\Request;

class RequirementController extends BaseController
{
    public function index(Request $request){
        return view('admin.requirement.index');

    }

}