<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/12 0012
 * Time: 下午 4:44
 */

namespace App\Http\Controllers\Admins;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function __construct(Request $request){
        session_start();
        $info = empty($_SESSION['info']) ? null: $_SESSION['info'];
        if (empty($info)){
            $url = route('login');
            header("location:$url");
        }
    }

}