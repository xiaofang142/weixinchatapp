<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/13 0013
 * Time: 下午 3:51
 */

namespace App\Http\Controllers\Admins;


use Illuminate\Http\Request;

class UserController extends BaseController
{
    public function index(Request $request){
        return view('admin.user.index');
    }
    public function detail(Request $request){

    }
    public function update(Request $request,$id){

    }
    public function delete(Request $request,$id){

    }

}