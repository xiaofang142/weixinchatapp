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
                if ($info->password == sha1($password)){
                    session(['info'=>$info]);
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

    public function loginout(){
        session_start();
        unset($_SESSION['info']);
        $url = 'http://'.$_SERVER['SERVER_NAME'].$_SERVER["REQUEST_URI"];
        $url =  dirname(dirname($url)).'/login/index';
        header("location:$url");
    }

}