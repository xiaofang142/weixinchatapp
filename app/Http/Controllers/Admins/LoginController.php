<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/12 0012
 * Time: 下午 4:43
 */

namespace App\Http\Controllers\Admins;


use App\Http\Controllers\Controller;
use App\Http\Models\Admin;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(Request $request){
        if($request->isMethod('post')){
            $name = $request->input('name');
            $password = $request->input('password');
            $admin = new Admin();
            $info= $admin->findUser($name);
            if($info !== false){
                if ($info->password == md5($password)){
                    session_start();
                    $_SESSION['info'] = $info;
                    return redirect()->action('Admins\IndexController@index');
                }else{
                    return back();
                }
            }else{
                return back();
            }
        }else{
            return view('admin/login/index');
        }
    }

    public function loginout(Request $request){
        session_start();
        $_SESSION['info'] = null;
        $url = route('login');
        header("location:$url");
    }

}