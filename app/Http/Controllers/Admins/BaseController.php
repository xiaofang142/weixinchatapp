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
        if (empty($_SESSION['info'])){
            $base = $request->getBaseUrl();
            $domain = $request->getHost();
            $url = 'http://'.$domain.$base.'/admin/login/index';
//            $url = 'http://'.$_SERVER['SERVER_NAME'].$_SERVER["REQUEST_URI"];
//            $url =  dirname(dirname($url)).'/login/index';
            header("location:$url");
        }
    }

}